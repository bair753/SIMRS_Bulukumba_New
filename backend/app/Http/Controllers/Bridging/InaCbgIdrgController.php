<?php

namespace App\Http\Controllers\Bridging;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;

use App\Master\DiagnosaKeperawatan;
use App\Master\KelompokTransaksi;
use App\Master\AsuransiPasien;
use App\Transaksi\InformasiTanggungan;
use App\Transaksi\PasienDaftar;
use App\Master\Pasien;
use App\Transaksi\AntrianPasienDiperiksa;
use App\Transaksi\KelengkapanDokumen;
use App\Transaksi\PelayananPasien;
use App\Transaksi\HasilGrouping;
use App\Transaksi\PemakaianAsuransi;
use App\Transaksi\StrukPelayanan;
use App\Transaksi\BridgingIdrgResReq;
use App\Transaksi\IdrgGruping;
use App\Transaksi\InaCbgGruping;
use DB;
use App\Transaksi\DetailDiagnosaPasien;
use App\Traits\Valet;
use phpDocumentor\Reflection\Types\Null_;
use Webpatser\Uuid\Uuid;
class InaCbgIdrgController extends ApiController
{
    use Valet;

    public function __construct()
    {
        parent::__construct($skip_authentication = false);
    }

    public function saveBridgingINACBGTools(Request $request)
    {
        $data  = \DB::table('settingdatafixed_m')
            ->select('namafield', 'nilaifield')
            ->where('keteranganfungsi', 'inacbg')
            ->get();
        //        return $data;
        foreach ($data as $item) {
            if ($item->namafield == 'codernik') {
                $codernik = $item->nilaifield;
            }
            if ($item->namafield == 'key') {
                $key = $item->nilaifield;
            }
            if ($item->namafield == 'url') {
                // $url = $item->nilaifield;
                $url = "http://10.10.10.92/E-Klaim/ws.php?mode=debug";
            }
        }

        $dataReq = $request['data'];
        $responseArr = [];
        foreach ($dataReq as $dataLoop) {
            $json_request = json_encode($dataLoop);
            $payload = $this->inacbg_encrypt($json_request, $key);
            $header = array("Content-Type: application/x-www-form-urlencoded");

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
            $response = curl_exec($ch);
            // dd($response);
            $err = curl_error($ch);
            if ($err) {
                return $this->setStatusCode(400)->respond($err, $err);
            }
            $first  = strpos($response, "\n") + 1;
            $last   = strrpos($response, "\n") - 1;
            $response  = substr(
                $response,
                $first,
                strlen($response) - $first - $last
            );
            $response = $this->inacbg_decrypt($response, $key);
            // $jsonInaCbg = json_decode($response);
            $responseArr[] = array(
                'datarequest' => $dataLoop,
                'dataresponse' =>   $response
            );
        }
        $result = array(
            "status" => 201,
            "dataresponse" => $responseArr,
            "as" => 'as@epic',
        );
        return $this->setStatusCode($result['status'])->respond($result, "Bridging InaCBG");
    }

     // Encryption Function
    function inacbg_encrypt($data, $key)
    {
        /// make binary representasion of $key
        $key = hex2bin($key);
        /// check key length, must be 256 bit or 32 bytes
        if (mb_strlen($key, "8bit") !== 32) {
            throw new \Exception("Needs a 256-bit key!");
        }
        /// create initialization vector
        $iv_size = openssl_cipher_iv_length("aes-256-cbc");
        $iv = openssl_random_pseudo_bytes($iv_size);
        // dengan catatan dibawah
        /// encrypt
        $encrypted = openssl_encrypt(
            $data,
            "aes-256-cbc",
            $key,
            OPENSSL_RAW_DATA,
            $iv
        );
        /// create signature, against padding oracle attacks
        $signature = mb_substr(hash_hmac(
            "sha256",
            $encrypted,
            $key,
            true
        ), 0, 10, "8bit");
        /// combine all, encode, and format
        $encoded = chunk_split(base64_encode($signature . $iv . $encrypted));
        return $encoded;
    }
    // Decryption Function
    function inacbg_decrypt($str, $strkey)
    {
        /// make binary representation of $key
        $key = hex2bin($strkey);
        /// check key length, must be 256 bit or 32 bytes
        if (mb_strlen($key, "8bit") !== 32) {
            throw new \Exception("Needs a 256-bit key!");
        }
        /// calculate iv size
        $iv_size = openssl_cipher_iv_length("aes-256-cbc");
        /// breakdown parts
        $decoded = base64_decode($str);
        $signature = mb_substr($decoded, 0, 10, "8bit");
        $iv = mb_substr($decoded, 10, $iv_size, "8bit");
        $encrypted = mb_substr($decoded, $iv_size + 10, NULL, "8bit");
        /// check signature, against padding oracle attack
        $calc_signature = mb_substr(hash_hmac(
            "sha256",
            $encrypted,
            $key,
            true
        ), 0, 10, "8bit");
        if ($this->inacbg_compare($signature, $calc_signature)) {
            //            return "SIGNATURE_NOT_MATCH"; /// signature doesn't match
        }
        $decrypted = openssl_decrypt(
            $encrypted,
            "aes-256-cbc",
            $key,
            OPENSSL_RAW_DATA,
            $iv
        );
        $dtdtd = json_decode($decrypted);
        return $dtdtd;
    }
    /// Compare Function
    function inacbg_compare($a, $b)
    {
        /// compare individually to prevent timing attacks
        /// compare length
        if (strlen($a) !== strlen($b)) return false;
        /// compare individual
        $result = 0;
        for ($i = 0; $i < strlen($a); $i++) {
            $result |= ord($a[$i]) ^ ord($b[$i]);
        }
        return $result == 0;
    }

    public function getDaftarPasienIdrgIna(Request $request)
    {
        $dataLogin = $request->all();
        $kdProfile = (int)$this->getDataKdProfile($request);
        $deptRanap = explode(',', $this->settingDataFixed('kdDepartemenRanapFix', $kdProfile));
        $number = 0;
        ini_set('max_execution_time', $number);
        ini_set('memory_limit', '4048M');
        $kdDepartemenRawatInap = [];
        foreach ($deptRanap as $itemRanap) {
            $kdDepartemenRawatInap[] =  (int)$itemRanap;
        }
        $data  = \DB::table('settingdatafixed_m')
            ->select('namafield', 'nilaifield')
            ->where('keteranganfungsi', 'inacbg')
            ->where('kdprofile', $kdProfile)
            ->get();
        // $dataPegawaiUser = DB::select(
        //     DB::raw("select pg.id,pg.namalengkap,pg.noidentitas from loginuser_s as lu
        //         INNER JOIN pegawai_m as pg on lu.objectpegawaifk=pg.id
        //         where lu.id=:idLoginUser"),
        //     array(
        //         'idLoginUser' => $dataLogin['userData']['id'],
        //     )
        // );
        foreach ($data as $item) {
            if ($item->namafield == 'codernik') {
                $codernik = $item->nilaifield;
            }
            if ($item->namafield == 'key') {
                $key = $item->nilaifield;
            }
            if ($item->namafield == 'url') {
                $url = $item->nilaifield;
            }
            if ($item->namafield == 'kodetarif') {
                $kodetarif = $item->nilaifield;
            }
        }

        $data = \DB::table('pasiendaftar_t as pd')
            ->join('pasien_m as ps', 'ps.id', '=', 'pd.nocmfk')
            ->join('ruangan_m as ru', 'ru.id', '=', 'pd.objectruanganlastfk')
            ->join('departemen_m as dp', 'dp.id', '=', 'ru.objectdepartemenfk')
            ->leftjoin('pegawai_m as pg', 'pg.id', '=', 'pd.objectpegawaifk')
            ->leftJoin('kelompokpasien_m as kp', 'kp.id', '=', 'pd.objectkelompokpasienlastfk')
            ->leftJoin('departemen_m as dept', 'dept.id', '=', 'ru.objectdepartemenfk')
            // ->join('antrianpasiendiperiksa_t as apd', function ($join) {
            //     $join->on('apd.noregistrasifk', '=', 'pd.norec');
            //     $join->on('apd.objectruanganfk', '=', 'pd.objectruanganlastfk');
            // })
            ->leftJoin(
                DB::raw("
                    LATERAL (
                        SELECT
                            apd.norec,
                            apd.tglmasuk,
                            apd.noregistrasifk,
                            apd.objectruanganfk,
                            apd.objectasalrujukanfk
                        FROM antrianpasiendiperiksa_t apd
                        WHERE apd.noregistrasifk = pd.norec
                        AND apd.objectruanganfk = pd.objectruanganlastfk
                        ORDER BY apd.tglmasuk DESC
                        LIMIT 1
                    ) apd
                "),
                DB::raw('TRUE'),
                '=',
                DB::raw('TRUE')
            )
            // ->leftJoin(DB::raw("
            //     (
            //         SELECT *
            //         FROM (
            //             SELECT 
            //                 apd.norec, 
            //                 apd.tglmasuk, 
            //                 apd.noregistrasifk, 
            //                 apd.objectruanganfk,
            //                 apd.objectasalrujukanfk,
            //                 ROW_NUMBER() OVER (
            //                     PARTITION BY apd.noregistrasifk, apd.objectruanganfk
            //                     ORDER BY apd.tglmasuk DESC
            //                 ) AS rn
            //             FROM antrianpasiendiperiksa_t AS apd
            //         ) AS sub
            //         WHERE sub.rn = 1
            //     ) AS apd
            // "), function ($join) {
            //     $join->on('apd.noregistrasifk', '=', 'pd.norec');
            //     $join->on('apd.objectruanganfk', '=', 'pd.objectruanganlastfk');
            // })

            ->leftjoin('asalrujukan_m as asl', 'asl.id', '=', 'apd.objectasalrujukanfk')
            ->leftjoin('resumemedis_t as rsm', 'apd.norec', '=', 'rsm.noregistrasifk')
            ->leftjoin('pemakaianasuransi_t as pas', 'pas.noregistrasifk', '=', 'pd.norec')
            ->leftJoin(DB::raw("
                (SELECT DISTINCT ON (no_sep) *
                FROM idrg_gruping
                ORDER BY no_sep DESC
                ) AS igp
            "), 'igp.no_sep', '=', 'pas.nosep')
            ->leftjoin('inacbg_gruping as ipg', 'ipg.no_sep', '=', 'pas.nosep')
            ->leftjoin('asuransipasien_m as asu', 'asu.noasuransi', '=', 'ps.nobpjs')
            ->leftjoin('kelas_m as kls', 'kls.id', '=', 'pd.objectkelasfk')
            ->leftjoin('kelas_m as kls2', 'kls2.id', '=', 'asu.objectkelasdijaminfk')
            ->leftjoin('hasilgrouping_t as hg', 'hg.noregistrasifk', '=', 'pd.norec')
            ->leftjoin('diagnosaberatbadanbayi_t as dbb', 'dbb.noregistrasifk', '=', 'pd.norec')
            ->leftjoin('rekanan_m as rk', 'rk.id', '=', 'pd.objectrekananfk')
            ->leftjoin('apgarscore_t as aps', 'aps.noregistrasifk', '=', 'pd.norec')
            ->leftjoin('riwayatpemberkasan_t as rp', 'rp.noregistrasifk', '=', 'pd.norec')
            ->leftjoin('statuspulang_m as stp', 'stp.id', '=', 'pd.objectstatuspulangfk')
            ->leftjoin('dokklaim_t as dok', 'dok.noregistrasifk', '=', 'pd.norec')
            ->distinct()
            ->select(
                'pd.norec',
                'pd.objectruanganlastfk',
                'pd.tglregistrasi',
                'ps.nocm',
                'pd.noregistrasi',
                'ipg.norec as norec_gruping_inacbg',
                'ipg.cbg_code',
                'ipg.cbg_description',
                'ipg.base_tariff',
                'ipg.tariff',
                'ipg.kelas',
                'ipg.inacbg_version',
                'ipg.stage',
                'igp.norec as norec_gruping_idrg',
                'igp.mdc_number',
                'igp.mdc_description',
                'igp.drg_code',
                'igp.drg_description',
                'igp.script_version',
                'igp.logic_version',
                'ru.namaruangan',
                'ps.namapasien',
                'kp.kelompokpasien',
                'pd.tglpulang',
                'pd.statuspasien',
                'apd.norec as norec_apd',
                'rsm.norec as norec_resume',
                'stp.namaexternal as statuspulang',
                'usiakehamilan',
                'gravida',
                'partus',
                'abortus',
                'pd.pegawaikirim',
                'pd.pegawaisimpan',
                'pd.pegawaigrouper',
                'pd.pegawaifinalklaim',
                'pd.pegeditklaim',
                'pd.tgledit',
                'pd.tglklaim',
                'pg.id as pgid',
                'pg.namalengkap as namadokter',
                'kp.id as kpid',
                'asl.caramasuk_inacbg',
                'stp.kodeexternal',
                'ru.objectdepartemenfk',
                'hg.tglgrouping',
                'hg.special_cmg',
                'hg.response',
                'dp.namadepartemen',
                'pd.objectruanganlastfk as ruanganid',
                DB::raw("case when pas.nosep is null then '-' else pas.nosep end as nosep"),
                'pas.norec as norec_pa',
                DB::raw("null as los, null as jam"),
                DB::raw(" EXTRACT ( YEAR FROM AGE( pd.tglregistrasi, ps.tgllahir ) )|| ' Tahun ' as umur"),
                'ps.nobpjs as nokepesertaan',
                'ps.tgllahir',
                'ps.objectjeniskelaminfk',
                'dept.id as deptid',
                'kls.nourut as nokelasdaftar',
                'kls2.nourut as nokelasdijamin',
                'kls.reportdisplay as namakelasdaftar',
                'kls2.reportdisplay as namakelas',
                'pd.objectstatuspulangfk',
                'hg.biayanaikkelas',
                'dbb.beratbadan',
                'rk.id as idrekanan',
                'hg.status as statusgrouping',
                'pas.statuscovid',
                'ps.noidentitas',
                'aps.1menit_appear as menit1_appear',
                'aps.1menit_pulse as menit1_pulse',
                'aps.1menit_grimace as menit1_grimace',
                'aps.1menit_activity as menit1_activity',
                'aps.1menit_resp as menit1_resp',
                'aps.5menit_appear as menit5_appear',
                'aps.5menit_pulse as menit5_pulse',
                'aps.5menit_grimace as menit5_grimace',
                'aps.5menit_activity as menit5_activity',
                'aps.5menit_resp as menit5_resp',
                'rp.penerimaan',
                'rp.scanning',
                'rp.pemberkasan',
                'rp.koding',
                'rp.kirimjkn',
                'rp.kelengkapanberkas',
                'rp.verifikasi',
                'rp.input',
                'rp.kirimonline',
                DB::raw(" 'verifikasi'  as status, pas.loscovid,pd.statusklaim"),
                DB::raw("case when hg.totalpiutangpenjamin is null then '-1' else hg.totalpiutangpenjamin end as totalpiutangpenjamin,statuskelengkapandok, COUNT ( dok.* ) || ' Dokumen' as hitungdok")
            )
            ->where('pd.statusenabled', true)
            ->where('pd.kdprofile', $kdProfile)
            ->whereNotNull('pd.tglpulang');
        
        
        $filter = $request->all();

        if (isset($filter['ispulang']) && $filter['ispulang'] == true) {
            if (isset($filter['tglAwal']) && $filter['tglAwal'] != "" && $filter['tglAwal'] != "undefined") {
                $data = $data->where('pd.tglpulang', '>=', $filter['tglAwal']);
            }
        } else {
            if (isset($filter['tglAwal']) && $filter['tglAwal'] != "" && $filter['tglAwal'] != "undefined") {
                $data = $data->where('pd.tglregistrasi', '>=', $filter['tglAwal']);
            }
        }

        if (isset($filter['ispulang']) && $filter['ispulang'] == true) {
            if (isset($filter['tglAkhir']) && $filter['tglAkhir'] != "" && $filter['tglAkhir'] != "undefined") {
                $tgl = $filter['tglAkhir'];
                $data = $data->where('pd.tglpulang', '<=', $tgl);
            }
        } else {

            if (isset($filter['tglAkhir']) && $filter['tglAkhir'] != "" && $filter['tglAkhir'] != "undefined") {
                $tgl = $filter['tglAkhir'];
                $data = $data->where('pd.tglregistrasi', '<=', $tgl);
            }
        }
        if (isset($filter['deptId']) && $filter['deptId'] != "" && $filter['deptId'] != "undefined") {
            $data = $data->where('dept.id', '=', $filter['deptId']);
        }
        if (isset($filter['ruangId']) && $filter['ruangId'] != "" && $filter['ruangId'] != "undefined") {
            $data = $data->where('ru.id', '=', $filter['ruangId']);
        }
        $paramKel  = '';
        if (isset($request['kelId']) && $request['kelId'] != "" && $request['kelId'] != "undefined") {
            $arrKel = explode(',', $request['kelId']);
            $kodeKel = [];
            foreach ($arrKel as $item) {
                $kodeKel[] = (int) $item;
            }
            $paramKel = ' and kp.id in (' . $request['kelId'] . ')';
            $data = $data->whereIn('kp.id', $kodeKel);
        }
        if (isset($filter['dokId']) && $filter['dokId'] != "" && $filter['dokId'] != "undefined") {
            $data = $data->where('pg.id', '=', $filter['dokId']);
        }
        if (isset($filter['sttts']) && $filter['sttts'] != "" && $filter['sttts'] != "undefined") {
            $data = $data->where('pd.statuspasien', '=', $filter['sttts']);
        }
        if (isset($filter['noreg']) && $filter['noreg'] != "" && $filter['noreg'] != "undefined") {
            $data = $data->where('pd.noregistrasi', 'ilike', '%' . $filter['noreg'] . '%');
        }
        if (isset($filter['norm']) && $filter['norm'] != "" && $filter['norm'] != "undefined") {
            $data = $data->where('ps.nocm', 'ilike', '%' . $filter['norm'] . '%');
        }
        if (isset($filter['nama']) && $filter['nama'] != "" && $filter['nama'] != "undefined") {
            $data = $data->where('ps.namapasien', 'ilike', '%' . $filter['nama'] . '%');
        }
        if (isset($filter['nosep']) && $filter['nosep'] != "" && $filter['nosep'] != "undefined") {
            $data = $data->where('pas.nosep', 'ilike', '%' . $filter['nosep'] . '%');
        }
        if (!empty($filter['statuspemberkasan'])) {

            $map = [
                'penerimaan'        => 'rp.penerimaan',
                'scanning'          => 'rp.scanning',
                'pemberkasan'       => 'rp.pemberkasan',
                'koding'            => 'rp.koding',
                'kirimjkn'          => 'rp.kirimjkn',
                'kelengkapanberkas' => 'rp.kelengkapanberkas',
                'verifikasi'        => 'rp.verifikasi',
                'input'             => 'rp.input',
                'kirimonline'       => 'rp.kirimonline',
            ];

            $status = $filter['statuspemberkasan'];

            if (isset($map[$status])) {
                // 🔥 FILTER BARU AKTIF DI SINI
                $data->whereNotNull($map[$status])
                    ->where($map[$status], '!=', 0);

            }
        }


        
        if (isset($filter['status']) && $filter['status'] !== "" && $filter['status'] !== "undefined") {

            if ($filter['status'] === null || $filter['status'] === "null") {
                // Status = null → cari yg NULL
                $data = $data->whereNull('pd.statusklaim');
            } else {
                // Status punya nilai valid
                $data = $data->where('pd.statusklaim', $filter['status']);
            }
        }


        if (isset($filter['pegklaim']) && $filter['pegklaim'] != "" && $filter['pegklaim'] != "undefined") {
            $data = $data->where('pd.pegawaifinalklaim', 'ilike', '%' . $filter['pegklaim'] . '%');
        }

        $data = $data->orderBy('pd.noregistrasi');
        $data = $data->groupBy(
            'ipg.norec',
            'ipg.cbg_code',
            'ipg.cbg_description',
            'ipg.base_tariff',
            'ipg.tariff',
            'ipg.kelas',
            'ipg.inacbg_version',
            'ipg.stage',
            'igp.norec',
            'igp.mdc_number',
            'igp.mdc_description',
            'igp.drg_code',
            'igp.drg_description',
            'igp.script_version',
            'igp.logic_version',
            'pd.norec',
            'pd.tglregistrasi',
            'pd.objectruanganlastfk',
            'ps.nocm',
            'pd.noregistrasi',
            'ru.namaruangan',
            'ps.namapasien',
            'kp.kelompokpasien',
            'pd.tglpulang',
            'pd.statuspasien',
            'apd.norec',
            'rsm.norec',
            'stp.namaexternal',
            'usiakehamilan',
            'gravida',
            'partus',
            'abortus',
            'pg.id',
            'pg.namalengkap',
            'kp.id',
            'asl.caramasuk_inacbg',
            'pd.tglklaim',
            'pd.tgledit',
            'pd.pegawaikirim',
            'pd.pegawaisimpan',
            'pd.pegawaigrouper',
            'pd.pegawaifinalklaim',
            'pd.pegeditklaim',
            'stp.kodeexternal',
            'ru.objectdepartemenfk',
            'hg.tglgrouping',
            'hg.special_cmg',
            'hg.response',
            'dp.namadepartemen',
            'pd.objectruanganlastfk',
            'pas.nosep',
            'pas.norec',
            'ps.nobpjs',
            'ps.tgllahir',
            'ps.objectjeniskelaminfk',
            'dept.id',
            'kls.nourut',
            'kls2.nourut',
            'hg.totalpiutangpenjamin',
            'kls.reportdisplay',
            'kls2.reportdisplay',
            'pd.objectstatuspulangfk',
            'hg.biayanaikkelas',
            'dbb.beratbadan',
            'rk.id',
            'hg.status',
            'pas.statuscovid',
            'ps.noidentitas',
            'aps.1menit_appear',
            'aps.1menit_pulse',
            'aps.1menit_grimace',
            'aps.1menit_activity',
            'aps.1menit_resp',
            'aps.5menit_appear',
            'aps.5menit_pulse',
            'aps.5menit_grimace',
            'aps.5menit_activity',
            'aps.5menit_resp',
            'rp.penerimaan',
            'rp.scanning',
            'rp.pemberkasan',
            'rp.koding',
            'rp.kirimjkn',
            'rp.kelengkapanberkas',
            'rp.verifikasi',
            'rp.input',
            'rp.kirimonline'
        );
        $data = $data->get();

        // dd($data);
        foreach ($data as $key => $d) {
            $selisih = date_diff(date_create($d->tglregistrasi), date_create($d->tglpulang));
            $selisih2 = strtotime($d->tglpulang) - strtotime($d->tglregistrasi);
            $jam   = floor($selisih2 / (60 * 60));

            $d->jam = $jam . ':' . $selisih->i;
            $d->los = $selisih->days + 1;
        }

        $noregistrasi = '';
        $norecaPd = '';
        foreach ($data as $item) {
            $noregistrasi = $noregistrasi . ",'" . $item->noregistrasi . "'";
            $norecaPd = $norecaPd . ",'" . $item->norec_apd . "'";
        }
        $noregistrasi = substr($noregistrasi, 1, strlen($noregistrasi) - 1);
        $norecaPd = substr($norecaPd, 1, strlen($norecaPd) - 1);

        if ($noregistrasi != '') {
            $dataTotalBill = DB::select(DB::raw("
                select pd.noregistrasi, sum(((case when pp.hargajual is null then 0 else pp.hargajual  end - case when pp.hargadiscount is null then 0 else pp.hargadiscount end) * pp.jumlah) + case when pp.jasa is null then 0 else pp.jasa end) as total
                from pasiendaftar_t as pd
                INNER JOIN antrianpasiendiperiksa_t as apd on apd.noregistrasifk=pd.norec
                INNER JOIN pelayananpasien_t as pp on pp.noregistrasifk=apd.norec
                where pd.kdprofile = $kdProfile and pd.noregistrasi in ($noregistrasi) and pp.produkfk not in (402611)
                group by pd.noregistrasi;
            "));
            $i = 0;
            foreach ($data as $h) {
                $data[$i]->totalbiayars = 0;
                foreach ($dataTotalBill as $d) {
                    if ($data[$i]->noregistrasi == $d->noregistrasi) {
                        $data[$i]->totalbiayars = ceil($d->total);
                    }
                }
                $i++;
            }
        }

        $i = 0;
        $dtdt = '';
        $tglawalawal = $filter['tglAwal'];
        $tglakhirakhir = $filter['tglAkhir'];
        if (isset($filter['ispulang']) && $filter['ispulang'] == true) {
            $periode = " and pd.tglpulang >= '$tglawalawal' and pd.tglpulang <= '$tglakhirakhir' ";
        } else {
            $periode = " and pd.tglregistrasi >= '$tglawalawal' and pd.tglregistrasi <= '$tglakhirakhir' ";
        }

        $VitalSign = DB::select(DB::raw("
            SELECT* FROM (
                SELECT epd.VALUE, epd.emrdfk, pd.noregistrasi,
                    ROW_NUMBER ( ) OVER ( PARTITION BY epd.emrdfk, pd.noregistrasi ORDER BY epd.tgl DESC ) AS nourut 
                    FROM emrpasiend_t AS epd
                        LEFT JOIN emrpasien_t AS ep ON ep.noemr = epd.emrpasienfk 
                        INNER JOIN pasiendaftar_t AS pd ON pd.noregistrasi = ltrim(rtrim(ep.noregistrasifk))
                    WHERE
                        epd.kdprofile = $kdProfile
                        AND epd.emrfk=147
                        $periode
                        AND ep.statusenabled = TRUE 
                    ORDER BY
                        epd.emrdfk DESC   
                    ) AS x 
                WHERE
                    x.nourut = 1 
                ORDER BY
            x.emrdfk
        "));


        // $ventilator = DB::select(DB::raw("
        //         SELECT x.noregistrasifk, '1' as use_ind,case when x.ventilator_hour<1 then 1 ELSE x.ventilator_hour end as ventilator_hour, x.stop_dttm,x.start_dttm FROM(SELECT ep.noregistrasifk,epd.emrpasienfk, EXTRACT(HOUR FROM (lps.stop_dttm::TIMESTAMP - epd.value::TIMESTAMP)) AS ventilator_hour, epd.value as start_dttm,lps.stop_dttm FROM emrpasiend_t as epd
        //         INNER JOIN (SELECT emrpasienfk,
        //          value as stop_dttm FROM emrpasiend_t 
        //         WHERE emrfk = 291042 and emrdfk in (318182)) as lps ON lps.emrpasienfk = epd.emrpasienfk
        //         INNER JOIN emrpasien_t as ep on ep.noemr = epd.emrpasienfk
        //         WHERE epd.emrfk = 291042 and epd.emrdfk in (318179)) as x 
        // "));



        foreach ($data as $item) {
            $item->response = json_decode($item->response);
            $item->sistole = 0;
            $item->diastole = 0;
            $item->birth_weight = 0;
            foreach ($VitalSign as $item2) {
                if ($item->noregistrasi == $item2->noregistrasi) {
                    if ($item2->emrdfk == 4241) {
                        if (str_contains($item2->value, '/')) {
                            $tekanandarah = explode("/", $item2->value);
                            $item->sistole = is_nan((float)$tekanandarah[0]) ? 0 : (float)$tekanandarah[0];
                            $item->diastole = is_nan((float)$tekanandarah[1]) ? 0 : (float)$tekanandarah[1];
                        }
                    }
                    if ($item2->emrdfk == 4243) {
                        $item->birth_weight = is_nan((float)$item2->value) ? 0 : (float)$item2->value;
                    }
                }
            }
        }

        $dataDiagnosa = \DB::table('detaildiagnosapasien_t as dp')
            ->leftJoin('diagnosa_idrg_new_m as dg', 'dg.id', '=', 'dp.diagnosa_idrg_id')
            ->leftJoin('diagnosa_inacbg_new_m as dgi', 'dgi.id', '=', 'dp.diagnosa_inacbg_id')
            ->join('antrianpasiendiperiksa_t as apd', 'apd.norec', '=', 'dp.noregistrasifk')
            ->join('pasiendaftar_t as pd', 'pd.norec', '=', 'apd.noregistrasifk')
            ->select(
                // 'dg.code as kddiagnosa', 
                'apd.objectasalrujukanfk', 
                'pd.norec', 
                // 'dg.nama_diagnosa as namadiagnosa',
                \DB::raw("COALESCE(dg.code, dgi.code) as kddiagnosa"),
                \DB::raw("COALESCE(dg.nama_diagnosa, dgi.nama_diagnosa) as namadiagnosa"),
            )
            ->wherein('dp.objectjenisdiagnosafk', array(8, 9))
            ->where('pd.kdprofile', $kdProfile)
            ->where('dp.keterangan', 'INAcbg')
            ->orderBy('dp.objectjenisdiagnosafk', 'asc');

        if (isset($filter['noreg']) && $filter['noreg'] != "" && $filter['noreg'] != "undefined") {
            $dataDiagnosa = $dataDiagnosa->where('pd.noregistrasi', 'ilike', '%' . $filter['noreg'] . '%');
        }
        if (isset($filter['ispulang']) && $filter['ispulang'] == true) {
            if (isset($filter['tglAwal']) && $filter['tglAwal'] != "" && $filter['tglAwal'] != "undefined") {
                $dataDiagnosa = $dataDiagnosa->where('pd.tglpulang', '>=', $filter['tglAwal']);
            }
        } else {
            if (isset($filter['tglAwal']) && $filter['tglAwal'] != "" && $filter['tglAwal'] != "undefined") {
                $dataDiagnosa = $dataDiagnosa->where('pd.tglregistrasi', '>=', $filter['tglAwal']);
            }
        }

        if (isset($filter['ispulang']) && $filter['ispulang'] == true) {
            if (isset($filter['tglAkhir']) && $filter['tglAkhir'] != "" && $filter['tglAkhir'] != "undefined") {
                $tgl = $filter['tglAkhir'];
                $dataDiagnosa = $dataDiagnosa->where('pd.tglpulang', '<=', $tgl);
            }
        } else {

            if (isset($filter['tglAkhir']) && $filter['tglAkhir'] != "" && $filter['tglAkhir'] != "undefined") {
                $tgl = $filter['tglAkhir'];
                $dataDiagnosa = $dataDiagnosa->where('pd.tglregistrasi', '<=', $tgl);
            }
        }
        $dataDiagnosa = $dataDiagnosa->get();
        foreach ($data as $item) {
            $dtdt = '';
            $asalRujukan = '';
            $covid19_status_cd = '';
            foreach ($dataDiagnosa as $item2) {
                if ($item2->norec == $data[$i]->norec) {
                    $dtdt = $dtdt . '#' .  $item2->kddiagnosa;
                    $asalRujukan = $item2->objectasalrujukanfk;
                }
            }
            $data[$i]->icd10 = substr($dtdt, 1, strlen($dtdt) - 1);
            $data[$i]->codernik =  $codernik;
            $data[$i]->objectasalrujukanfk = $asalRujukan;
            $data[$i]->kodetarif = $kodetarif;
            $i = $i + 1;
        }

        $i = 0;
        $dtdt = '';

        $dataICD9 = \DB::table('diagnosatindakanpasien_t as dpa')
            ->join('detaildiagnosatindakanpasien_t as dp', 'dpa.norec', '=', 'dp.objectdiagnosatindakanpasienfk')
            // ->join('diagnosa_idrg_new_m as dg', 'dg.id', '=', 'dp.objectdiagnosatindakanfk')
            ->leftJoin('diagnosa_idrg_new_m as dg', 'dg.id', '=', 'dp.diagnosa_idrg_id')
            ->leftJoin('diagnosa_inacbg_new_m as dgi', 'dgi.id', '=', 'dp.diagnosa_inacbg_id')
            ->join('antrianpasiendiperiksa_t as apd', 'apd.norec', '=', 'dpa.objectpasienfk')
            ->join('pasiendaftar_t as pd', 'pd.norec', '=', 'apd.noregistrasifk')
            ->select(
                // 'dg.code as kddiagnosatindakan', 
       \DB::raw("COALESCE(dg.code, dgi.code) as kddiagnosatindakan"),
                \DB::raw("COALESCE(dg.nama_diagnosa, dgi.nama_diagnosa) as namadiagnosatindakan"),
                'pd.norec'
            )
            ->where('dp.ketdiagnosa', 'INAcbg')
            ->where('pd.kdprofile', $kdProfile);
        if (isset($filter['noreg']) && $filter['noreg'] != "" && $filter['noreg'] != "undefined") {
            $dataICD9 = $dataICD9->where('pd.noregistrasi', 'ilike', '%' . $filter['noreg'] . '%');
        }

        if (isset($filter['ispulang']) && $filter['ispulang'] == true) {
            if (isset($filter['tglAwal']) && $filter['tglAwal'] != "" && $filter['tglAwal'] != "undefined") {
                $dataICD9 = $dataICD9->where('pd.tglpulang', '>=', $filter['tglAwal']);
            }
        } else {
            if (isset($filter['tglAwal']) && $filter['tglAwal'] != "" && $filter['tglAwal'] != "undefined") {
                $dataICD9 = $dataICD9->where('pd.tglregistrasi', '>=', $filter['tglAwal']);
            }
        }

        if (isset($filter['ispulang']) && $filter['ispulang'] == true) {
            if (isset($filter['tglAkhir']) && $filter['tglAkhir'] != "" && $filter['tglAkhir'] != "undefined") {
                $tgl = $filter['tglAkhir'];
                $dataICD9 = $dataICD9->where('pd.tglpulang', '<=', $tgl);
            }
        } else {

            if (isset($filter['tglAkhir']) && $filter['tglAkhir'] != "" && $filter['tglAkhir'] != "undefined") {
                $tgl = $filter['tglAkhir'];
                $dataICD9 = $dataICD9->where('pd.tglregistrasi', '<=', $tgl);
            }
        }

        $dataICD9 = $dataICD9->get();
        foreach ($data as $item) {
            $data[$i]->jenis_rawat = 2;
            foreach ($kdDepartemenRawatInap as $kddept) {
                if ($kddept == $item->deptid) {
                    $data[$i]->jenis_rawat = 1;
                }
            }
            $dtdt = '';
            foreach ($dataICD9 as $item2) {
                if ($item2->norec == $data[$i]->norec) {
                    $dtdt = $dtdt . '#' . $item2->kddiagnosatindakan;
                }
            }
            $data[$i]->icd9 = substr($dtdt, 1, strlen($dtdt) - 1);
            $i = $i + 1;
        }

        $tglawalawal = $filter['tglAwal'];
        $tglakhirakhir = $filter['tglAkhir'];
        $kelompokPasien = $filter['kelId'];
        $noregs = '';
        $norms = '';
        $namas = '';
        if (isset($filter['noreg']) && $filter['noreg'] != "" && $filter['noreg'] != "undefined") {
            $noregs = " and pd.noregistrasi='$filter[noreg]'";
        }
        if (isset($filter['norm']) && $filter['norm'] != "" && $filter['norm'] != "undefined") {
            $norms = " and ps.nocm='$filter[norm]'";
        }
        if (isset($filter['nama']) && $filter['nama'] != "" && $filter['nama'] != "undefined") {
            $namas = " and ps.namapasien ilike '%" . $filter['nama'] . "%'";
        }

        if (isset($filter['ispulang']) && $filter['ispulang'] == true) {
            $periode = " and pd.tglpulang >= '$tglawalawal' and pd.tglpulang <= '$tglakhirakhir' ";
        } else {
            $periode = " and pd.tglregistrasi >= '$tglawalawal' and pd.tglregistrasi <= '$tglakhirakhir' ";
        }

        // $dataTarif16 = DB::select(
        //     DB::raw("select pd.norec, sum(((pp.hargajual - case when pp.hargadiscount is null then 0 else pp.hargadiscount end) * pp.jumlah)+ case when pp.jasa is null then 0 else pp.jasa end) as ttl,kpb.namaexternal
        //     from pasiendaftar_t as pd
        //     inner join pasien_m as ps on ps.id = pd.nocmfk
        //     INNER JOIN antrianpasiendiperiksa_t as apd on apd.noregistrasifk=pd.norec
        //     INNER JOIN pelayananpasien_t as pp on pp.noregistrasifk=apd.norec
        //     INNER JOIN produk_m as pr on pr.id=pp.produkfk
        //     INNER JOIN kelompokprodukbpjs_m as kpb on kpb.id=pr.objectkelompokprodukbpjsfk
        //     left join kelompokpasien_m as kp on kp.id = pd.objectkelompokpasienlastfk
        //     left join batalregistrasi_t as br on br.pasiendaftarfk = pd.norec
        //     where br.norec is null   
        //     and pd.kdprofile=$kdProfile
        //     and kp.id in ($kelompokPasien) and  pr.id <> 402611
        //     $periode
        //     $noregs
        //     $namas
        //     $norms
        //     group  by pd.norec,kpb.namaexternal
        //     UNION ALL
        //     select pd.norec, sum(pp.jumlah) as ttl,kpb.namaexternal
        //     from pasiendaftar_t as pd
        //     inner join pasien_m as ps on ps.id = pd.nocmfk
        //     INNER JOIN antrianpasiendiperiksa_t as apd on apd.noregistrasifk=pd.norec
        //     INNER JOIN pelayananpasien_t as pp on pp.noregistrasifk=apd.norec
        //     INNER JOIN produk_m as pr on pr.id=pp.produkfk
        //     INNER JOIN kelompokprodukbpjs_m as kpb on kpb.id=16
        //     left join kelompokpasien_m as kp on kp.id = pd.objectkelompokpasienlastfk
        //     left join batalregistrasi_t as br on br.pasiendaftarfk = pd.norec
        //     where br.norec is null   
        //     and pd.kdprofile=$kdProfile
        //     and kp.id in ($kelompokPasien) and  pr.id <> 402611
        //     $periode
        //     $noregs
        //     $namas
        //     $norms
        //     group  by pd.norec,kpb.namaexternal
        //     ")
        // );
        $dataTarif16 = DB::select(DB::raw("select pd.norec, sum(((pp.hargajual - case when pp.hargadiscount is null then 0 else pp.hargadiscount end) * pp.jumlah)+ case when pp.jasa is null then 0 else pp.jasa end) as ttl,kpb.namaexternal
            from pasiendaftar_t as pd
            inner join pasien_m as ps on ps.id = pd.nocmfk
            INNER JOIN antrianpasiendiperiksa_t as apd on apd.noregistrasifk=pd.norec
            INNER JOIN pelayananpasien_t as pp on pp.noregistrasifk=apd.norec
            INNER JOIN produk_m as pr on pr.id=pp.produkfk
            INNER JOIN kelompokprodukbpjs_m as kpb on kpb.id=pr.objectkelompokprodukbpjsfk
            left join kelompokpasien_m as kp on kp.id = pd.objectkelompokpasienlastfk
            left join batalregistrasi_t as br on br.pasiendaftarfk = pd.norec
            where br.norec is null  and 
            pd.tglregistrasi >= '$tglawalawal' and pd.tglregistrasi <= '$tglakhirakhir'  
            $paramKel
            group  by pd.norec,kpb.namaexternal order by pd.norec")
        );
        $i = 0;
        $prosedur_non_bedah = '';
        $prosedur_bedah = '';
        $konsultasi = '';
        $tenaga_ahli = '';
        $keperawatan = '';
        $penunjang = '';
        $radiologi = '';
        $laboratorium = '';
        $pelayanan_darah = '';
        $rehabilitasi = '';
        $kamar = '';
        $rawat_intensif = '';
        $obat = '';
        $obat_kronis = '';
        $obat_kemoterapi = '';
        $alkes = '';
        $bmhp = '';
        $sewa_alat = '';
        foreach ($data as $item) {
            $norecpd = $data[$i]->norec;
            foreach ($dataTarif16 as $itm) {
                if ($itm->norec == $norecpd) {
                    if ($itm->namaexternal == 'prosedur_non_bedah') {
                        $prosedur_non_bedah = (float)$itm->ttl;
                    }
                    if ($itm->namaexternal == 'prosedur_bedah') {
                        $prosedur_bedah = (float)$itm->ttl;
                    }
                    if ($itm->namaexternal == 'konsultasi') {
                        $konsultasi = (float)$itm->ttl;
                    }
                    if ($itm->namaexternal == 'tenaga_ahli') {
                        $tenaga_ahli = (float)$itm->ttl;
                    }
                    if ($itm->namaexternal == 'keperawatan') {
                        $keperawatan = (float)$itm->ttl;
                    }
                    if ($itm->namaexternal == 'penunjang') {
                        $penunjang = (float)$itm->ttl;
                    }
                    if ($itm->namaexternal == 'radiologi') {
                        $radiologi = (float)$itm->ttl;
                    }
                    if ($itm->namaexternal == 'laboratorium') {
                        $laboratorium = (float)$itm->ttl;
                    }
                    if ($itm->namaexternal == 'pelayanan_darah') {
                        $pelayanan_darah = (float)$itm->ttl;
                    }
                    if ($itm->namaexternal == 'rehabilitasi') {
                        $rehabilitasi = (float)$itm->ttl;
                    }
                    if ($itm->namaexternal == 'kamar') {
                        $kamar = (float)$itm->ttl;
                    }
                    if ($itm->namaexternal == 'rawat_intensif') {
                        $rawat_intensif = (float)$itm->ttl;
                    }
                    if ($itm->namaexternal == 'obat') {
                        $obat = (float)$itm->ttl;
                    }
                    if ($itm->namaexternal == 'obat_kronis') {
                        $obat_kronis = (float)$itm->ttl;
                    }
                    if ($itm->namaexternal == 'obat_kemoterapi') {
                        $obat_kemoterapi = (float)$itm->ttl;
                    }
                    if ($itm->namaexternal == 'alkes') {
                        $alkes = (float)$itm->ttl;
                    }
                    if ($itm->namaexternal == 'bmhp') {
                        $bmhp = (float)$itm->ttl;
                    }
                    if ($itm->namaexternal == 'sewa_alat') {
                        $sewa_alat = (float)$itm->ttl;
                    }
                }
            }

            $datatatat = array(
                'prosedur_non_bedah' => (float)$prosedur_non_bedah,
                'prosedur_bedah' => (float)$prosedur_bedah,
                'konsultasi' => (float)$konsultasi,
                'tenaga_ahli' => (float)$tenaga_ahli,
                'keperawatan' => (float)$keperawatan,
                'penunjang' => (float)$penunjang,
                'radiologi' => (float)$radiologi,
                'laboratorium' => (float)$laboratorium,
                'pelayanan_darah' => (float)$pelayanan_darah,
                'rehabilitasi' => (float)$rehabilitasi,
                'kamar' => (float)$kamar,
                'rawat_intensif' => (float)$rawat_intensif,
                'obat' => (float)$obat,
                'obat_kronis' => (float)$obat_kronis,
                'obat_kemoterapi' => (float)$obat_kemoterapi,
                'alkes' => (float)$alkes,
                'bmhp' => (float)$bmhp,
                'sewa_alat' => (float)$sewa_alat,
            );
            $prosedur_non_bedah = 0;
            $prosedur_bedah = 0;
            $konsultasi = 0;
            $tenaga_ahli = 0;
            $keperawatan = 0;
            $penunjang = 0;
            $radiologi = 0;
            $laboratorium = 0;
            $pelayanan_darah = 0;
            $rehabilitasi = 0;
            $kamar = 0;
            $rawat_intensif = 0;
            $obat = 0;
            $obat_kronis = 0;
            $obat_kemoterapi = 0;
            $alkes = 0;
            $bmhp = 0;
            $sewa_alat = 0;
            $data[$i]->tarif_rs = $datatatat;

            $i = $i + 1;
        }
        return $this->respond($data);
    }
   public function getDaftarPasienIdrgIna2(Request $request)
    {
        $dataLogin = $request->all();
        $kdProfile = (int)$this->getDataKdProfile($request);
        $deptRanap = explode(',', $this->settingDataFixed('kdDepartemenRanapFix', $kdProfile));
        $number = 0;
        ini_set('max_execution_time', $number);
        $kdDepartemenRawatInap = [];
        foreach ($deptRanap as $itemRanap) {
            $kdDepartemenRawatInap[] =  (int)$itemRanap;
        }
        $data  = \DB::table('settingdatafixed_m')
            ->select('namafield', 'nilaifield')
            ->where('keteranganfungsi', 'inacbg')
            ->where('kdprofile', $kdProfile)
            ->get();
        $dataPegawaiUser = DB::select(
            DB::raw("select pg.id,pg.namalengkap,pg.noidentitas from loginuser_s as lu
                INNER JOIN pegawai_m as pg on lu.objectpegawaifk=pg.id
                where lu.id=:idLoginUser"),
            array(
                'idLoginUser' => $dataLogin['userData']['id'],
            )
        );
        foreach ($data as $item) {
            if ($item->namafield == 'codernik') {
                $codernik = $item->nilaifield;
            }
            if ($item->namafield == 'key') {
                $key = $item->nilaifield;
            }
            if ($item->namafield == 'url') {
                $url = $item->nilaifield;
            }
            if ($item->namafield == 'kodetarif') {
                $kodetarif = $item->nilaifield;
            }
        }

        $data = \DB::table('pasiendaftar_t as pd')
            ->join('pasien_m as ps', 'ps.id', '=', 'pd.nocmfk')
            ->join('ruangan_m as ru', 'ru.id', '=', 'pd.objectruanganlastfk')
            ->join('departemen_m as dp', 'dp.id', '=', 'ru.objectdepartemenfk')
            ->leftjoin('pegawai_m as pg', 'pg.id', '=', 'pd.objectpegawaifk')
            ->leftJoin('kelompokpasien_m as kp', 'kp.id', '=', 'pd.objectkelompokpasienlastfk')
            ->leftJoin('departemen_m as dept', 'dept.id', '=', 'ru.objectdepartemenfk')
            // ->join('antrianpasiendiperiksa_t as apd', function ($join) {
            //     $join->on('apd.noregistrasifk', '=', 'pd.norec');
            //     $join->on('apd.objectruanganfk', '=', 'pd.objectruanganlastfk');
            // })
            ->leftJoin(DB::raw("
                (
                    SELECT *
                    FROM (
                        SELECT 
                            apd.norec, 
                            apd.tglmasuk, 
                            apd.noregistrasifk, 
                            apd.objectruanganfk,
                            apd.objectasalrujukanfk,
                            ROW_NUMBER() OVER (
                                PARTITION BY apd.noregistrasifk, apd.objectruanganfk
                                ORDER BY apd.tglmasuk DESC
                            ) AS rn
                        FROM antrianpasiendiperiksa_t AS apd
                    ) AS sub
                    WHERE sub.rn = 1
                ) AS apd
            "), function ($join) {
                $join->on('apd.noregistrasifk', '=', 'pd.norec');
                $join->on('apd.objectruanganfk', '=', 'pd.objectruanganlastfk');
            })

            ->leftjoin('asalrujukan_m as asl', 'asl.id', '=', 'apd.objectasalrujukanfk')
            ->leftjoin('resumemedis_t as rsm', 'apd.norec', '=', 'rsm.noregistrasifk')
            ->leftjoin('pemakaianasuransi_t as pas', 'pas.noregistrasifk', '=', 'pd.norec')
            ->leftJoin(DB::raw("
                (SELECT DISTINCT ON (no_sep) *
                FROM idrg_gruping
                ORDER BY no_sep DESC
                ) AS igp
            "), 'igp.no_sep', '=', 'pas.nosep')
            ->leftjoin('inacbg_gruping as ipg', 'ipg.no_sep', '=', 'pas.nosep')
            ->leftjoin('asuransipasien_m as asu', 'asu.noasuransi', '=', 'ps.nobpjs')
            ->leftjoin('kelas_m as kls', 'kls.id', '=', 'pd.objectkelasfk')
            ->leftjoin('kelas_m as kls2', 'kls2.id', '=', 'asu.objectkelasdijaminfk')
            ->leftjoin('hasilgrouping_t as hg', 'hg.noregistrasifk', '=', 'pd.norec')
            ->leftjoin('diagnosaberatbadanbayi_t as dbb', 'dbb.noregistrasifk', '=', 'pd.norec')
            ->leftjoin('rekanan_m as rk', 'rk.id', '=', 'pd.objectrekananfk')
            ->leftjoin('apgarscore_t as aps', 'aps.noregistrasifk', '=', 'pd.norec')
            ->leftjoin('riwayatpemberkasan_t as rp', 'rp.noregistrasifk', '=', 'pd.norec')
            ->leftjoin('statuspulang_m as stp', 'stp.id', '=', 'pd.objectstatuspulangfk')
            ->leftjoin('dokklaim_t as dok', 'dok.noregistrasifk', '=', 'pd.norec')
            ->distinct()
            ->select(
                'pd.norec',
                'pd.objectruanganlastfk',
                'pd.tglregistrasi',
                'ps.nocm',
                'pd.noregistrasi',
                'ipg.norec as norec_gruping_inacbg',
                'ipg.cbg_code',
                'ipg.cbg_description',
                'ipg.base_tariff',
                'ipg.tariff',
                'ipg.kelas',
                'ipg.inacbg_version',
                'ipg.stage',
                'igp.norec as norec_gruping_idrg',
                'igp.mdc_number',
                'igp.mdc_description',
                'igp.drg_code',
                'igp.drg_description',
                'igp.script_version',
                'igp.logic_version',
                'ru.namaruangan',
                'ps.namapasien',
                'kp.kelompokpasien',
                'pd.tglpulang',
                'pd.statuspasien',
                'apd.norec as norec_apd',
                'rsm.norec as norec_resume',
                'stp.namaexternal as statuspulang',
                'usiakehamilan',
                'gravida',
                'partus',
                'abortus',
                'pd.pegawaikirim',
                'pd.pegawaisimpan',
                'pd.pegawaigrouper',
                'pd.pegawaifinalklaim',
                'pd.pegeditklaim',
                'pd.tgledit',
                'pd.tglklaim',
                'pg.id as pgid',
                'pg.namalengkap as namadokter',
                'kp.id as kpid',
                'asl.caramasuk_inacbg',
                'stp.kodeexternal',
                'ru.objectdepartemenfk',
                'hg.tglgrouping',
                'hg.special_cmg',
                'hg.response',
                'dp.namadepartemen',
                'pd.objectruanganlastfk as ruanganid',
                DB::raw("case when pas.nosep is null then '-' else pas.nosep end as nosep"),
                'pas.norec as norec_pa',
                DB::raw("null as los, null as jam"),
                DB::raw(" EXTRACT ( YEAR FROM AGE( pd.tglregistrasi, ps.tgllahir ) )|| ' Tahun ' as umur"),
                'ps.nobpjs as nokepesertaan',
                'ps.tgllahir',
                'ps.objectjeniskelaminfk',
                'dept.id as deptid',
                'kls.nourut as nokelasdaftar',
                'kls2.nourut as nokelasdijamin',
                'kls.reportdisplay as namakelasdaftar',
                'kls2.reportdisplay as namakelas',
                'pd.objectstatuspulangfk',
                'hg.biayanaikkelas',
                'dbb.beratbadan',
                'rk.id as idrekanan',
                'hg.status as statusgrouping',
                'pas.statuscovid',
                'ps.noidentitas',
                'aps.1menit_appear as menit1_appear',
                'aps.1menit_pulse as menit1_pulse',
                'aps.1menit_grimace as menit1_grimace',
                'aps.1menit_activity as menit1_activity',
                'aps.1menit_resp as menit1_resp',
                'aps.5menit_appear as menit5_appear',
                'aps.5menit_pulse as menit5_pulse',
                'aps.5menit_grimace as menit5_grimace',
                'aps.5menit_activity as menit5_activity',
                'aps.5menit_resp as menit5_resp',
                'rp.penerimaan',
                'rp.scanning',
                'rp.pemberkasan',
                'rp.koding',
                'rp.kirimjkn',
                'rp.kelengkapanberkas',
                'rp.verifikasi',
                'rp.input',
                'rp.kirimonline',
                DB::raw(" 'verifikasi'  as status, pas.loscovid,pd.statusklaim"),
                DB::raw("case when hg.totalpiutangpenjamin is null then '-1' else hg.totalpiutangpenjamin end as totalpiutangpenjamin,statuskelengkapandok, COUNT ( dok.* ) || ' Dokumen' as hitungdok")
            )
            ->where('pd.statusenabled', true)
            ->where('pd.kdprofile', $kdProfile)
            ->whereNotNull('pd.tglpulang');

        $filter = $request->all();

        if (isset($filter['ispulang']) && $filter['ispulang'] == true) {
            if (isset($filter['tglAwal']) && $filter['tglAwal'] != "" && $filter['tglAwal'] != "undefined") {
                $data = $data->where('pd.tglpulang', '>=', $filter['tglAwal']);
            }
        } else {
            if (isset($filter['tglAwal']) && $filter['tglAwal'] != "" && $filter['tglAwal'] != "undefined") {
                $data = $data->where('pd.tglregistrasi', '>=', $filter['tglAwal']);
            }
        }

        if (isset($filter['ispulang']) && $filter['ispulang'] == true) {
            if (isset($filter['tglAkhir']) && $filter['tglAkhir'] != "" && $filter['tglAkhir'] != "undefined") {
                $tgl = $filter['tglAkhir'];
                $data = $data->where('pd.tglpulang', '<=', $tgl);
            }
        } else {

            if (isset($filter['tglAkhir']) && $filter['tglAkhir'] != "" && $filter['tglAkhir'] != "undefined") {
                $tgl = $filter['tglAkhir'];
                $data = $data->where('pd.tglregistrasi', '<=', $tgl);
            }
        }
        if (isset($filter['deptId']) && $filter['deptId'] != "" && $filter['deptId'] != "undefined") {
            $data = $data->where('dept.id', '=', $filter['deptId']);
        }
        if (isset($filter['ruangId']) && $filter['ruangId'] != "" && $filter['ruangId'] != "undefined") {
            $data = $data->where('ru.id', '=', $filter['ruangId']);
        }
        $paramKel  = '';
        if (isset($request['kelId']) && $request['kelId'] != "" && $request['kelId'] != "undefined") {
            $arrKel = explode(',', $request['kelId']);
            $kodeKel = [];
            foreach ($arrKel as $item) {
                $kodeKel[] = (int) $item;
            }
            $paramKel = ' and kp.id in (' . $request['kelId'] . ')';
            $data = $data->whereIn('kp.id', $kodeKel);
        }
        if (isset($filter['dokId']) && $filter['dokId'] != "" && $filter['dokId'] != "undefined") {
            $data = $data->where('pg.id', '=', $filter['dokId']);
        }
        if (isset($filter['sttts']) && $filter['sttts'] != "" && $filter['sttts'] != "undefined") {
            $data = $data->where('pd.statuspasien', '=', $filter['sttts']);
        }
        if (isset($filter['noreg']) && $filter['noreg'] != "" && $filter['noreg'] != "undefined") {
            $data = $data->where('pd.noregistrasi', 'ilike', '%' . $filter['noreg'] . '%');
        }
        if (isset($filter['norm']) && $filter['norm'] != "" && $filter['norm'] != "undefined") {
            $data = $data->where('ps.nocm', 'ilike', '%' . $filter['norm'] . '%');
        }
        if (isset($filter['nama']) && $filter['nama'] != "" && $filter['nama'] != "undefined") {
            $data = $data->where('ps.namapasien', 'ilike', '%' . $filter['nama'] . '%');
        }
        if (isset($filter['nosep']) && $filter['nosep'] != "" && $filter['nosep'] != "undefined") {
            $data = $data->where('pas.nosep', 'ilike', '%' . $filter['nosep'] . '%');
        }
        if (!empty($filter['statuspemberkasan'])) {

            $map = [
                'penerimaan'        => 'rp.penerimaan',
                'scanning'          => 'rp.scanning',
                'pemberkasan'       => 'rp.pemberkasan',
                'koding'            => 'rp.koding',
                'kirimjkn'          => 'rp.kirimjkn',
                'kelengkapanberkas' => 'rp.kelengkapanberkas',
                'verifikasi'        => 'rp.verifikasi',
                'input'             => 'rp.input',
                'kirimonline'       => 'rp.kirimonline',
            ];

            $status = $filter['statuspemberkasan'];

            if (isset($map[$status])) {
                // 🔥 FILTER BARU AKTIF DI SINI
                $data->whereNotNull($map[$status])
                    ->where($map[$status], '!=', 0);

            }
        }


        
        if (isset($filter['status']) && $filter['status'] !== "" && $filter['status'] !== "undefined") {

            if ($filter['status'] === null || $filter['status'] === "null") {
                // Status = null → cari yg NULL
                $data = $data->whereNull('pd.statusklaim');
            } else {
                // Status punya nilai valid
                $data = $data->where('pd.statusklaim', $filter['status']);
            }
        }


        if (isset($filter['pegklaim']) && $filter['pegklaim'] != "" && $filter['pegklaim'] != "undefined") {
            $data = $data->where('pd.pegawaifinalklaim', 'ilike', '%' . $filter['pegklaim'] . '%');
        }
        $data = $data->orderBy('pd.noregistrasi');
        $data = $data->groupBy(
            'ipg.norec',
            'ipg.cbg_code',
            'ipg.cbg_description',
            'ipg.base_tariff',
            'ipg.tariff',
            'ipg.kelas',
            'ipg.inacbg_version',
            'ipg.stage',
            'igp.norec',
            'igp.mdc_number',
            'igp.mdc_description',
            'igp.drg_code',
            'igp.drg_description',
            'igp.script_version',
            'igp.logic_version',
            'pd.norec',
            'pd.tglregistrasi',
            'pd.objectruanganlastfk',
            'ps.nocm',
            'pd.noregistrasi',
            'ru.namaruangan',
            'ps.namapasien',
            'kp.kelompokpasien',
            'pd.tglpulang',
            'pd.statuspasien',
            'apd.norec',
            'rsm.norec',
            'stp.namaexternal',
            'usiakehamilan',
            'gravida',
            'partus',
            'abortus',
            'pg.id',
            'pg.namalengkap',
            'kp.id',
            'asl.caramasuk_inacbg',
            'pd.tglklaim',
            'pd.tgledit',
            'pd.pegawaikirim',
            'pd.pegawaisimpan',
            'pd.pegawaigrouper',
            'pd.pegawaifinalklaim',
            'pd.pegeditklaim',
            'stp.kodeexternal',
            'ru.objectdepartemenfk',
            'hg.tglgrouping',
            'hg.special_cmg',
            'hg.response',
            'dp.namadepartemen',
            'pd.objectruanganlastfk',
            'pas.nosep',
            'pas.norec',
            'ps.nobpjs',
            'ps.tgllahir',
            'ps.objectjeniskelaminfk',
            'dept.id',
            'kls.nourut',
            'kls2.nourut',
            'hg.totalpiutangpenjamin',
            'kls.reportdisplay',
            'kls2.reportdisplay',
            'pd.objectstatuspulangfk',
            'hg.biayanaikkelas',
            'dbb.beratbadan',
            'rk.id',
            'hg.status',
            'pas.statuscovid',
            'ps.noidentitas',
            'aps.1menit_appear',
            'aps.1menit_pulse',
            'aps.1menit_grimace',
            'aps.1menit_activity',
            'aps.1menit_resp',
            'aps.5menit_appear',
            'aps.5menit_pulse',
            'aps.5menit_grimace',
            'aps.5menit_activity',
            'aps.5menit_resp',
            'rp.penerimaan',
            'rp.scanning',
            'rp.pemberkasan',
            'rp.koding',
            'rp.kirimjkn',
            'rp.kelengkapanberkas',
            'rp.verifikasi',
            'rp.input',
            'rp.kirimonline'
        );
        $data = $data->get();

        // dd($data);
        // foreach ($data as $key => $d) {
        //     $selisih = date_diff(date_create($d->tglregistrasi), date_create($d->tglpulang));
        //     $selisih2 = strtotime($d->tglpulang) - strtotime($d->tglregistrasi);
        //     $jam   = floor($selisih2 / (60 * 60));

        //     $d->jam = $jam . ':' . $selisih->i;
        //     $d->los = $selisih->days + 1;
        // }

        // $noregistrasi = '';
        // $norecaPd = '';
        // foreach ($data as $item) {
        //     $noregistrasi = $noregistrasi . ",'" . $item->noregistrasi . "'";
        //     $norecaPd = $norecaPd . ",'" . $item->norec_apd . "'";
        // }
        // $noregistrasi = substr($noregistrasi, 1, strlen($noregistrasi) - 1);
        // $norecaPd = substr($norecaPd, 1, strlen($norecaPd) - 1);

        // if ($noregistrasi != '') {
        //     $dataTotalBill = DB::select(DB::raw("
        //         select pd.noregistrasi, sum(((case when pp.hargajual is null then 0 else pp.hargajual  end - case when pp.hargadiscount is null then 0 else pp.hargadiscount end) * pp.jumlah) + case when pp.jasa is null then 0 else pp.jasa end) as total
        //         from pasiendaftar_t as pd
        //         INNER JOIN antrianpasiendiperiksa_t as apd on apd.noregistrasifk=pd.norec
        //         INNER JOIN pelayananpasien_t as pp on pp.noregistrasifk=apd.norec
        //         where pd.kdprofile = $kdProfile and pd.noregistrasi in ($noregistrasi) and pp.produkfk not in (402611)
        //         group by pd.noregistrasi;
        //     "));
        //     $i = 0;
        //     foreach ($data as $h) {
        //         $data[$i]->totalbiayars = 0;
        //         foreach ($dataTotalBill as $d) {
        //             if ($data[$i]->noregistrasi == $d->noregistrasi) {
        //                 $data[$i]->totalbiayars = ceil($d->total);
        //             }
        //         }
        //         $i++;
        //     }
        // }

        // $i = 0;
        // $dtdt = '';
        // $tglawalawal = $filter['tglAwal'];
        // $tglakhirakhir = $filter['tglAkhir'];
        // if (isset($filter['ispulang']) && $filter['ispulang'] == true) {
        //     $periode = " and pd.tglpulang >= '$tglawalawal' and pd.tglpulang <= '$tglakhirakhir' ";
        // } else {
        //     $periode = " and pd.tglregistrasi >= '$tglawalawal' and pd.tglregistrasi <= '$tglakhirakhir' ";
        // }

        // $VitalSign = DB::select(DB::raw("
        //     SELECT* FROM (
        //         SELECT epd.VALUE, epd.emrdfk, pd.noregistrasi,
        //             ROW_NUMBER ( ) OVER ( PARTITION BY epd.emrdfk, pd.noregistrasi ORDER BY epd.tgl DESC ) AS nourut 
        //             FROM emrpasiend_t AS epd
        //                 LEFT JOIN emrpasien_t AS ep ON ep.noemr = epd.emrpasienfk 
        //                 INNER JOIN pasiendaftar_t AS pd ON pd.noregistrasi = ltrim(rtrim(ep.noregistrasifk))
        //             WHERE
        //                 epd.kdprofile = $kdProfile
        //                 AND epd.emrfk=147
        //                 $periode
        //                 AND ep.statusenabled = TRUE 
        //             ORDER BY
        //                 epd.emrdfk DESC   
        //             ) AS x 
        //         WHERE
        //             x.nourut = 1 
        //         ORDER BY
        //     x.emrdfk
        // "));


        // $ventilator = DB::select(DB::raw("
        //         SELECT x.noregistrasifk, '1' as use_ind,case when x.ventilator_hour<1 then 1 ELSE x.ventilator_hour end as ventilator_hour, x.stop_dttm,x.start_dttm FROM(SELECT ep.noregistrasifk,epd.emrpasienfk, EXTRACT(HOUR FROM (lps.stop_dttm::TIMESTAMP - epd.value::TIMESTAMP)) AS ventilator_hour, epd.value as start_dttm,lps.stop_dttm FROM emrpasiend_t as epd
        //         INNER JOIN (SELECT emrpasienfk,
        //          value as stop_dttm FROM emrpasiend_t 
        //         WHERE emrfk = 291042 and emrdfk in (318182)) as lps ON lps.emrpasienfk = epd.emrpasienfk
        //         INNER JOIN emrpasien_t as ep on ep.noemr = epd.emrpasienfk
        //         WHERE epd.emrfk = 291042 and epd.emrdfk in (318179)) as x 
        // "));



        foreach ($data as $item) {
            $item->response = json_decode($item->response);
            // $item->sistole = 0;
            // $item->diastole = 0;
            // $item->birth_weight = 0;
            // foreach ($VitalSign as $item2) {
            //     if ($item->noregistrasi == $item2->noregistrasi) {
            //         if ($item2->emrdfk == 4241) {
            //             if (str_contains($item2->value, '/')) {
            //                 $tekanandarah = explode("/", $item2->value);
            //                 $item->sistole = is_nan((float)$tekanandarah[0]) ? 0 : (float)$tekanandarah[0];
            //                 $item->diastole = is_nan((float)$tekanandarah[1]) ? 0 : (float)$tekanandarah[1];
            //             }
            //         }
            //         if ($item2->emrdfk == 4243) {
            //             $item->birth_weight = is_nan((float)$item2->value) ? 0 : (float)$item2->value;
            //         }
            //     }
            // }
        }

    //     $dataDiagnosa = \DB::table('detaildiagnosapasien_t as dp')
    //         ->leftJoin('diagnosa_idrg_new_m as dg', 'dg.id', '=', 'dp.diagnosa_idrg_id')
    //         ->leftJoin('diagnosa_inacbg_new_m as dgi', 'dgi.id', '=', 'dp.diagnosa_inacbg_id')
    //         ->join('antrianpasiendiperiksa_t as apd', 'apd.norec', '=', 'dp.noregistrasifk')
    //         ->join('pasiendaftar_t as pd', 'pd.norec', '=', 'apd.noregistrasifk')
    //         ->select(
    //             // 'dg.code as kddiagnosa', 
    //             'apd.objectasalrujukanfk', 
    //             'pd.norec', 
    //             // 'dg.nama_diagnosa as namadiagnosa',
    //             \DB::raw("COALESCE(dg.code, dgi.code) as kddiagnosa"),
    //             \DB::raw("COALESCE(dg.nama_diagnosa, dgi.nama_diagnosa) as namadiagnosa"),
    //         )
    //         ->wherein('dp.objectjenisdiagnosafk', array(8, 9))
    //         ->where('pd.kdprofile', $kdProfile)
    //         ->where('dp.keterangan', 'INAcbg')
    //         ->orderBy('dp.objectjenisdiagnosafk', 'asc');

    //     if (isset($filter['noreg']) && $filter['noreg'] != "" && $filter['noreg'] != "undefined") {
    //         $dataDiagnosa = $dataDiagnosa->where('pd.noregistrasi', 'ilike', '%' . $filter['noreg'] . '%');
    //     }
    //     if (isset($filter['ispulang']) && $filter['ispulang'] == true) {
    //         if (isset($filter['tglAwal']) && $filter['tglAwal'] != "" && $filter['tglAwal'] != "undefined") {
    //             $dataDiagnosa = $dataDiagnosa->where('pd.tglpulang', '>=', $filter['tglAwal']);
    //         }
    //     } else {
    //         if (isset($filter['tglAwal']) && $filter['tglAwal'] != "" && $filter['tglAwal'] != "undefined") {
    //             $dataDiagnosa = $dataDiagnosa->where('pd.tglregistrasi', '>=', $filter['tglAwal']);
    //         }
    //     }

    //     if (isset($filter['ispulang']) && $filter['ispulang'] == true) {
    //         if (isset($filter['tglAkhir']) && $filter['tglAkhir'] != "" && $filter['tglAkhir'] != "undefined") {
    //             $tgl = $filter['tglAkhir'];
    //             $dataDiagnosa = $dataDiagnosa->where('pd.tglpulang', '<=', $tgl);
    //         }
    //     } else {

    //         if (isset($filter['tglAkhir']) && $filter['tglAkhir'] != "" && $filter['tglAkhir'] != "undefined") {
    //             $tgl = $filter['tglAkhir'];
    //             $dataDiagnosa = $dataDiagnosa->where('pd.tglregistrasi', '<=', $tgl);
    //         }
    //     }
    //     $dataDiagnosa = $dataDiagnosa->get();
    //     foreach ($data as $item) {
    //         $dtdt = '';
    //         $asalRujukan = '';
    //         $covid19_status_cd = '';
    //         foreach ($dataDiagnosa as $item2) {
    //             if ($item2->norec == $data[$i]->norec) {
    //                 $dtdt = $dtdt . '#' .  $item2->kddiagnosa;
    //                 $asalRujukan = $item2->objectasalrujukanfk;
    //             }
    //         }
    //         $data[$i]->icd10 = substr($dtdt, 1, strlen($dtdt) - 1);
    //         $data[$i]->codernik =  $codernik;
    //         $data[$i]->objectasalrujukanfk = $asalRujukan;
    //         $data[$i]->kodetarif = $kodetarif;
    //         $i = $i + 1;
    //     }

    //     $i = 0;
    //     $dtdt = '';

    //     $dataICD9 = \DB::table('diagnosatindakanpasien_t as dpa')
    //         ->join('detaildiagnosatindakanpasien_t as dp', 'dpa.norec', '=', 'dp.objectdiagnosatindakanpasienfk')
    //         // ->join('diagnosa_idrg_new_m as dg', 'dg.id', '=', 'dp.objectdiagnosatindakanfk')
    //         ->leftJoin('diagnosa_idrg_new_m as dg', 'dg.id', '=', 'dp.diagnosa_idrg_id')
    //         ->leftJoin('diagnosa_inacbg_new_m as dgi', 'dgi.id', '=', 'dp.diagnosa_inacbg_id')
    //         ->join('antrianpasiendiperiksa_t as apd', 'apd.norec', '=', 'dpa.objectpasienfk')
    //         ->join('pasiendaftar_t as pd', 'pd.norec', '=', 'apd.noregistrasifk')
    //         ->select(
    //             // 'dg.code as kddiagnosatindakan', 
    //    \DB::raw("COALESCE(dg.code, dgi.code) as kddiagnosatindakan"),
    //             \DB::raw("COALESCE(dg.nama_diagnosa, dgi.nama_diagnosa) as namadiagnosatindakan"),
    //             'pd.norec'
    //         )
    //         ->where('dp.ketdiagnosa', 'INAcbg')
    //         ->where('pd.kdprofile', $kdProfile);
    //     if (isset($filter['noreg']) && $filter['noreg'] != "" && $filter['noreg'] != "undefined") {
    //         $dataICD9 = $dataICD9->where('pd.noregistrasi', 'ilike', '%' . $filter['noreg'] . '%');
    //     }

    //     if (isset($filter['ispulang']) && $filter['ispulang'] == true) {
    //         if (isset($filter['tglAwal']) && $filter['tglAwal'] != "" && $filter['tglAwal'] != "undefined") {
    //             $dataICD9 = $dataICD9->where('pd.tglpulang', '>=', $filter['tglAwal']);
    //         }
    //     } else {
    //         if (isset($filter['tglAwal']) && $filter['tglAwal'] != "" && $filter['tglAwal'] != "undefined") {
    //             $dataICD9 = $dataICD9->where('pd.tglregistrasi', '>=', $filter['tglAwal']);
    //         }
    //     }

    //     if (isset($filter['ispulang']) && $filter['ispulang'] == true) {
    //         if (isset($filter['tglAkhir']) && $filter['tglAkhir'] != "" && $filter['tglAkhir'] != "undefined") {
    //             $tgl = $filter['tglAkhir'];
    //             $dataICD9 = $dataICD9->where('pd.tglpulang', '<=', $tgl);
    //         }
    //     } else {

    //         if (isset($filter['tglAkhir']) && $filter['tglAkhir'] != "" && $filter['tglAkhir'] != "undefined") {
    //             $tgl = $filter['tglAkhir'];
    //             $dataICD9 = $dataICD9->where('pd.tglregistrasi', '<=', $tgl);
    //         }
    //     }

    //     $dataICD9 = $dataICD9->get();
    //     foreach ($data as $item) {
    //         $data[$i]->jenis_rawat = 2;
    //         foreach ($kdDepartemenRawatInap as $kddept) {
    //             if ($kddept == $item->deptid) {
    //                 $data[$i]->jenis_rawat = 1;
    //             }
    //         }
    //         $dtdt = '';
    //         foreach ($dataICD9 as $item2) {
    //             if ($item2->norec == $data[$i]->norec) {
    //                 $dtdt = $dtdt . '#' . $item2->kddiagnosatindakan;
    //             }
    //         }
    //         $data[$i]->icd9 = substr($dtdt, 1, strlen($dtdt) - 1);
    //         $i = $i + 1;
    //     }

    //     $tglawalawal = $filter['tglAwal'];
    //     $tglakhirakhir = $filter['tglAkhir'];
    //     $kelompokPasien = $filter['kelId'];
    //     $noregs = '';
    //     $norms = '';
    //     $namas = '';
    //     if (isset($filter['noreg']) && $filter['noreg'] != "" && $filter['noreg'] != "undefined") {
    //         $noregs = " and pd.noregistrasi='$filter[noreg]'";
    //     }
    //     if (isset($filter['norm']) && $filter['norm'] != "" && $filter['norm'] != "undefined") {
    //         $norms = " and ps.nocm='$filter[norm]'";
    //     }
    //     if (isset($filter['nama']) && $filter['nama'] != "" && $filter['nama'] != "undefined") {
    //         $namas = " and ps.namapasien ilike '%" . $filter['nama'] . "%'";
    //     }

    //     if (isset($filter['ispulang']) && $filter['ispulang'] == true) {
    //         $periode = " and pd.tglpulang >= '$tglawalawal' and pd.tglpulang <= '$tglakhirakhir' ";
    //     } else {
    //         $periode = " and pd.tglregistrasi >= '$tglawalawal' and pd.tglregistrasi <= '$tglakhirakhir' ";
        // }

        // $dataTarif16 = DB::select(DB::raw("select pd.norec, sum(((pp.hargajual - case when pp.hargadiscount is null then 0 else pp.hargadiscount end) * pp.jumlah)+ case when pp.jasa is null then 0 else pp.jasa end) as ttl,kpb.namaexternal
        //     from pasiendaftar_t as pd
        //     inner join pasien_m as ps on ps.id = pd.nocmfk
        //     INNER JOIN antrianpasiendiperiksa_t as apd on apd.noregistrasifk=pd.norec
        //     INNER JOIN pelayananpasien_t as pp on pp.noregistrasifk=apd.norec
        //     INNER JOIN produk_m as pr on pr.id=pp.produkfk
        //     INNER JOIN kelompokprodukbpjs_m as kpb on kpb.id=pr.objectkelompokprodukbpjsfk
        //     left join kelompokpasien_m as kp on kp.id = pd.objectkelompokpasienlastfk
        //     left join batalregistrasi_t as br on br.pasiendaftarfk = pd.norec
        //     where br.norec is null  and 
        //     pd.tglregistrasi >= '$tglawalawal' and pd.tglregistrasi <= '$tglakhirakhir'  
        //     $paramKel
        //     group  by pd.norec,kpb.namaexternal order by pd.norec")
        // );
        // $i = 0;
        // $prosedur_non_bedah = '';
        // $prosedur_bedah = '';
        // $konsultasi = '';
        // $tenaga_ahli = '';
        // $keperawatan = '';
        // $penunjang = '';
        // $radiologi = '';
        // $laboratorium = '';
        // $pelayanan_darah = '';
        // $rehabilitasi = '';
        // $kamar = '';
        // $rawat_intensif = '';
        // $obat = '';
        // $obat_kronis = '';
        // $obat_kemoterapi = '';
        // $alkes = '';
        // $bmhp = '';
        // $sewa_alat = '';
        // foreach ($data as $item) {
        //     $norecpd = $data[$i]->norec;
        //     foreach ($dataTarif16 as $itm) {
        //         if ($itm->norec == $norecpd) {
        //             if ($itm->namaexternal == 'prosedur_non_bedah') {
        //                 $prosedur_non_bedah = (float)$itm->ttl;
        //             }
        //             if ($itm->namaexternal == 'prosedur_bedah') {
        //                 $prosedur_bedah = (float)$itm->ttl;
        //             }
        //             if ($itm->namaexternal == 'konsultasi') {
        //                 $konsultasi = (float)$itm->ttl;
        //             }
        //             if ($itm->namaexternal == 'tenaga_ahli') {
        //                 $tenaga_ahli = (float)$itm->ttl;
        //             }
        //             if ($itm->namaexternal == 'keperawatan') {
        //                 $keperawatan = (float)$itm->ttl;
        //             }
        //             if ($itm->namaexternal == 'penunjang') {
        //                 $penunjang = (float)$itm->ttl;
        //             }
        //             if ($itm->namaexternal == 'radiologi') {
        //                 $radiologi = (float)$itm->ttl;
        //             }
        //             if ($itm->namaexternal == 'laboratorium') {
        //                 $laboratorium = (float)$itm->ttl;
        //             }
        //             if ($itm->namaexternal == 'pelayanan_darah') {
        //                 $pelayanan_darah = (float)$itm->ttl;
        //             }
        //             if ($itm->namaexternal == 'rehabilitasi') {
        //                 $rehabilitasi = (float)$itm->ttl;
        //             }
        //             if ($itm->namaexternal == 'kamar') {
        //                 $kamar = (float)$itm->ttl;
        //             }
        //             if ($itm->namaexternal == 'rawat_intensif') {
        //                 $rawat_intensif = (float)$itm->ttl;
        //             }
        //             if ($itm->namaexternal == 'obat') {
        //                 $obat = (float)$itm->ttl;
        //             }
        //             if ($itm->namaexternal == 'obat_kronis') {
        //                 $obat_kronis = (float)$itm->ttl;
        //             }
        //             if ($itm->namaexternal == 'obat_kemoterapi') {
        //                 $obat_kemoterapi = (float)$itm->ttl;
        //             }
        //             if ($itm->namaexternal == 'alkes') {
        //                 $alkes = (float)$itm->ttl;
        //             }
        //             if ($itm->namaexternal == 'bmhp') {
        //                 $bmhp = (float)$itm->ttl;
        //             }
        //             if ($itm->namaexternal == 'sewa_alat') {
        //                 $sewa_alat = (float)$itm->ttl;
        //             }
        //         }
        //     }

        //     $datatatat = array(
        //         'prosedur_non_bedah' => (float)$prosedur_non_bedah,
        //         'prosedur_bedah' => (float)$prosedur_bedah,
        //         'konsultasi' => (float)$konsultasi,
        //         'tenaga_ahli' => (float)$tenaga_ahli,
        //         'keperawatan' => (float)$keperawatan,
        //         'penunjang' => (float)$penunjang,
        //         'radiologi' => (float)$radiologi,
        //         'laboratorium' => (float)$laboratorium,
        //         'pelayanan_darah' => (float)$pelayanan_darah,
        //         'rehabilitasi' => (float)$rehabilitasi,
        //         'kamar' => (float)$kamar,
        //         'rawat_intensif' => (float)$rawat_intensif,
        //         'obat' => (float)$obat,
        //         'obat_kronis' => (float)$obat_kronis,
        //         'obat_kemoterapi' => (float)$obat_kemoterapi,
        //         'alkes' => (float)$alkes,
        //         'bmhp' => (float)$bmhp,
        //         'sewa_alat' => (float)$sewa_alat,
        //     );
        //     $prosedur_non_bedah = 0;
        //     $prosedur_bedah = 0;
        //     $konsultasi = 0;
        //     $tenaga_ahli = 0;
        //     $keperawatan = 0;
        //     $penunjang = 0;
        //     $radiologi = 0;
        //     $laboratorium = 0;
        //     $pelayanan_darah = 0;
        //     $rehabilitasi = 0;
        //     $kamar = 0;
        //     $rawat_intensif = 0;
        //     $obat = 0;
        //     $obat_kronis = 0;
        //     $obat_kemoterapi = 0;
        //     $alkes = 0;
        //     $bmhp = 0;
        //     $sewa_alat = 0;
        //     $data[$i]->tarif_rs = $datatatat;

        //     $i = $i + 1;
        // }
        return $this->respond($data);
    }
    
    public function getDaftarRiwayatRegistrasiNew2(Request $request)
    {
        $kdProfile = $this->getDataKdProfile($request);
        $data = \DB::table('pasien_m as ps')
            ->join('pasiendaftar_t as pd', 'pd.nocmfk', '=', 'ps.id')
            ->join('ruangan_m as ru', 'ru.id', '=', 'pd.objectruanganlastfk')
            ->join('kelompokpasien_m as kp', 'kp.id', '=', 'pd.objectkelompokpasienlastfk')
            ->leftjoin('pegawai_m as pg', 'pg.id', '=', 'pd.objectpegawaifk')
            ->select(DB::raw("pd.norec,pd.tglregistrasi,ps.nocm,pd.noregistrasi,ps.namapasien,pd.objectruanganlastfk,kp.kelompokpasien,ru.namaruangan,pd.nocmfk,
        pd.objectpegawaifk,pg.namalengkap as namadokter,pd.tglpulang,ru.objectdepartemenfk, null as diagnosa, null as kddiagnosatindakan, null as diagnosaina
        "))
            ->where('pd.statusenabled', true)
            ->where('ps.kdprofile', (int)$kdProfile)
            ->where('ps.nocm', '=', $request['nocm'])
            ->where('ps.statusenabled', true)
            ->orderBy('pd.tglregistrasi', 'desc')
            ->distinct()
            ->take(30)
            ->get();

        foreach ($data as $d) {
            $diagnosa = \DB::table('antrianpasiendiperiksa_t as apd')
                ->leftjoin('detaildiagnosapasien_t AS ddp', function ($join) {
                    $join->on('ddp.noregistrasifk', '=', 'apd.norec')
                        ->whereIn('ddp.objectjenisdiagnosafk', [1, 2]);
                })
                ->leftjoin('jenisdiagnosa_m as jd', 'jd.id', '=', 'ddp.objectjenisdiagnosafk')
                ->join('diagnosa_idrg_new_m as dg', 'dg.id', '=', 'ddp.diagnosa_idrg_id')
                ->select(DB::raw("dg.nama_diagnosa as namadiagnosa, dg.code as kddiagnosa, jd.jenisdiagnosa"))
                ->where('apd.noregistrasifk', '=', $d->norec)

                ->orderBy('ddp.objectjenisdiagnosafk', 'asc')
                ->get();
            foreach ($diagnosa as $key => $dg) {
                $d->diagnosa .= $dg->kddiagnosa;
            }
            $diagnosaINACBG = \DB::table('antrianpasiendiperiksa_t as apd')
                ->leftjoin('detaildiagnosapasien_t AS ddp', function ($join) {
                    $join->on('ddp.noregistrasifk', '=', 'apd.norec')
                        ->whereIn('ddp.objectjenisdiagnosafk', [8, 9, 10, 11]);
                })
                ->leftjoin('jenisdiagnosa_m as jd', 'jd.id', '=', 'ddp.objectjenisdiagnosafk')
                ->join('diagnosa_idrg_new_m as dg', 'dg.id', '=', 'ddp.diagnosa_idrg_id')
                ->select(DB::raw("dg.nama_diagnosa as namadiagnosa, dg.code as kddiagnosa, jd.jenisdiagnosa"))
                ->where('apd.noregistrasifk', '=', $d->norec)

                ->orderBy('ddp.objectjenisdiagnosafk', 'asc')
                ->get();
            foreach ($diagnosaINACBG as $key => $dgINA) {
                $d->diagnosaina .= $dgINA->kddiagnosa;
            }


            $dataICD9 = \DB::table('diagnosatindakanpasien_t as dpa')
                ->join('detaildiagnosatindakanpasien_t as dp', 'dpa.norec', '=', 'dp.objectdiagnosatindakanpasienfk')
                ->join('diagnosa_idrg_new_m as dg', 'dg.id', '=', 'dp.objectdiagnosatindakanfk')
                ->join('antrianpasiendiperiksa_t as apd', 'apd.norec', '=', 'dpa.objectpasienfk')
                ->join('pasiendaftar_t as pd', 'pd.norec', '=', 'apd.noregistrasifk')
                ->select('dg.code as kddiagnosatindakan', 'pd.norec')
                ->orWhere('apd.noregistrasifk', '=', $d->norec)
                ->get();
            foreach ($dataICD9 as $key => $dg) {
                $d->kddiagnosatindakan .= $dg->kddiagnosatindakan . ', ';
            }

            $dataEMR = DB::select(DB::raw("
                SELECT * FROM (
                    SELECT
                        epd.VALUE,
                        epd.emrdfk,
                        epd.emrpasienfk,
                        ROW_NUMBER() OVER (PARTITION BY epd.emrdfk ORDER BY epd.tgl DESC) AS nourut
                    FROM emrpasiend_t AS epd
                    LEFT JOIN emrpasien_t AS ep ON ep.noemr = epd.emrpasienfk
                    LEFT JOIN pasiendaftar_t AS pd ON ep.noregistrasifk = pd.noregistrasi
                    LEFT JOIN pasien_m AS ps ON ps.id = pd.nocmfk
                    WHERE
                        epd.kdprofile = :kdProfile
                        AND epd.emrfk IN (470093, 470092, 470098, 470099, 470304, 470305,470209)
                        AND ep.statusenabled = TRUE
                        AND ps.nocm = :nocm
                        AND ep.noregistrasifk = :noregistasi
                ) AS x
                WHERE x.nourut = 1
                ORDER BY x.emrdfk
            "), [
                'kdProfile' => $kdProfile,
                'nocm' => $d->nocm,
                'noregistasi' => $d->noregistrasi,
            ]);

            $d->diagnosadokter = null;

            foreach ($dataEMR as $emr) {
                switch ($emr->emrdfk) {
                    case 47001593: // asesmen awal mata
                        $d->diagnosadokter = $emr->value;
                        break;
                    case 47001653: // asesmen ulang mata
                        $d->diagnosadokter = $emr->value;
                        break;
                    case 47001073: // asesmen awal rj
                        $d->diagnosadokter = $emr->value;
                        break;
                    case 47000956: // asesmen ulang rj
                        $d->diagnosadokter = $emr->value;
                        break;
                    case 1902344078: // asesmen awal rj bpc
                        $d->diagnosadokter = $emr->value;
                        break;
                    case 1902344116: // asesmen ulang rj bpc
                        $d->diagnosadokter = $emr->value;
                        break;
                    case 1901311483: // asesmen awal rj rehab medik
                        $d->diagnosadokter = $emr->value;
                        break;
                    case 1902364811: // asesmen ulang rj rehab medik
                        $d->diagnosadokter = $emr->value;
                        break;
                        
                }
            }
        }

        $result = array(
            'data' => $data,
            'message' => 'ea@epic',
        );
        return $this->respond($result);
    }

    public function getDiagnosaPasienByNoregInaCbgNew(Request $request)
    {
        $kdProfile = $this->getDataKdProfile($request);
        $inacbg = [];
        $iDRG = [];
        $emr = [];
        $dtdt = '';
        $diagnosa_idrg = '';
        $diagnosaawal = '';
        $data = \DB::table('pasiendaftar_t as pd')
            ->select(
                'dg.id',
                'pd.noregistrasi',
                'pd.tglregistrasi',
                'apd.objectruanganfk',
                'ru.namaruangan',
                'apd.norec as norec_apd',
                'ddp.diagnosa_idrg_id',
                'dg.code as kddiagnosa',
                'dg.nama_diagnosa as namadiagnosa',
                'ddp.objectjenisdiagnosafk',
                'jd.id as jd_id',
                'jd.jenisdiagnosa',
                'dp.norec as norec_diagnosapasien',
                'ddp.norec as norec_detaildpasien',
                'dp.ketdiagnosis',
                'ddp.keterangan',
                'ddp.tglinputdiagnosa',
                'pg.namalengkap',
                DB::raw("case when dp.iskasusbaru = 't' then 'Baru' when dp.iskasuslama = 't' then 'Lama' end as iskasus")
            )
            ->join('antrianpasiendiperiksa_t as apd', 'apd.noregistrasifk', '=', 'pd.norec')
            ->join('ruangan_m as ru', 'ru.id', '=', 'apd.objectruanganfk')
            ->join('diagnosapasien_t as dp', 'dp.noregistrasifk', '=', 'apd.norec')
            ->join('detaildiagnosapasien_t as ddp', 'ddp.objectdiagnosapasienfk', '=', 'dp.norec')
            ->leftJoin('diagnosa_idrg_new_m as dg', 'dg.id', '=', 'ddp.diagnosa_idrg_id')
            ->leftJoin('jenisdiagnosa_m as jd', 'jd.id', '=', 'ddp.objectjenisdiagnosafk')
            ->leftjoin('pegawai_m as pg', 'pg.id', '=', 'ddp.objectpegawaifk')
            ->where('pd.kdprofile', (int)$kdProfile);

        if (isset($request['noReg']) && $request['noReg'] != "" && $request['noReg'] != "undefined") {
            $data = $data->where('pd.noregistrasi', '=', $request['noReg']);
        };
        $data = $data->whereIn('jd.id', [1, 2, 4, 7])->orderBy('ddp.tglinputdiagnosa', 'asc')->get();

        if (isset($request['inacbg']) && $request['inacbg'] == 'true') {
            // LAMA
            // $inacbg = \DB::table('pasiendaftar_t as pd')
            //     ->select(
            //         'dg.id',
            //         'pd.noregistrasi',
            //         'pd.tglregistrasi',
            //         'apd.objectruanganfk',
            //         'ru.namaruangan',
            //         'apd.norec as norec_apd',
            //         'ddp.diagnosa_idrg_id',
            //         // 'dg.code as kddiagnosa',
            //         // 'dg.nama_diagnosa as namadiagnosa',
            //         \DB::raw("COALESCE(dg.code, dgi.code) as kddiagnosa"),
            //         \DB::raw("COALESCE(dg.nama_diagnosa, dgi.nama_diagnosa) as namadiagnosa"),
            //         'dg.im',
            //         'ddp.objectjenisdiagnosafk',
            //         'jd.id as jd_id',
            //         'jd.jenisdiagnosa',
            //         'ddp.norec as norec_detaildpasien',
            //         'ddp.keterangan',
            //         'ddp.tglinputdiagnosa',
            //         'pg.namalengkap',
            //     )
            //     ->join('antrianpasiendiperiksa_t as apd', 'apd.noregistrasifk', '=', 'pd.norec')
            //     ->join('ruangan_m as ru', 'ru.id', '=', 'apd.objectruanganfk')
            //     // ->join('diagnosapasien_t as dp', 'dp.noregistrasifk', '=', 'apd.norec')
            //     ->join('detaildiagnosapasien_t as ddp', 'ddp.noregistrasifk', '=', 'apd.norec')
            //     ->leftJoin('diagnosa_idrg_new_m as dg', 'dg.id', '=', 'ddp.diagnosa_idrg_id')
            //     ->leftJoin('diagnosa_inacbg_new_m as dgi', 'dgi.id', '=', 'ddp.diagnosa_inacbg_id')
            //     ->leftJoin('jenisdiagnosa_m as jd', 'jd.id', '=', 'ddp.objectjenisdiagnosafk')
            //     ->leftjoin('pegawai_m as pg', 'pg.id', '=', 'ddp.objectpegawaifk')
            //     ->where('pd.kdprofile', (int)$kdProfile)
            //     ->where('pd.noregistrasi', '=', $request['noReg'])
            //     ->whereIn('jd.id', [8, 9])
            //     ->where('ddp.keterangan', '=', 'INAcbg')
            //     // ->orderBy('ddp.tglinputdiagnosa', 'asc')
            //     // ->orderByRaw("CASE WHEN jd.id = 8 THEN 0 ELSE 1 END")
            //     // ->orderBy('jd.id', 'ASC')
            //     // ->orderBy('ddp.tglinputdiagnosa', 'asc')
            //     ->orderByRaw("CASE WHEN jd.id = 8 THEN 0 ELSE 1 END, ddp.tglinputdiagnosa ASC")
            //     ->get();

            // BARU
            $inacbg = DB::table('pasiendaftar_t as pd')
                ->select([
                    DB::raw('DISTINCT ON (ddp.objectdiagnosapasienfk) dg.id'),
                    DB::raw('COALESCE(dm.id, dg.id, dgi.id) as id'),
                    // 'dg.id',
                    'pd.noregistrasi',
                    'pd.tglregistrasi',
                    'apd.objectruanganfk',
                    'ru.namaruangan',
                    'apd.norec as norec_apd',
                    'ddp.diagnosa_idrg_id',
                    DB::raw('COALESCE(dgi.code,dm.kddiagnosa, dg.code) as kddiagnosa'),
                    DB::raw('COALESCE(dgi.nama_diagnosa,dm.namadiagnosa, dg.nama_diagnosa) as namadiagnosa'),
                    
                    // DB::raw("COALESCE(dg.code, dgi.code) as kddiagnosa"),
                    // DB::raw("COALESCE(dg.nama_diagnosa, dgi.nama_diagnosa) as namadiagnosa"),
                    'dg.im',
                    'ddp.objectjenisdiagnosafk',
                    'jd.id as jd_id',
                    'jd.jenisdiagnosa',
                    'ddp.norec as norec_detaildpasien',
                    'ddp.keterangan',
                    'ddp.tglinputdiagnosa',
                    'pg.namalengkap',
                    'dp.iskasusbaru',
                    'dp.iskasuslama',
                    DB::raw("
                        CASE
                            WHEN dp.iskasuslama = true THEN 'Lama'
                            WHEN dp.iskasusbaru = true THEN 'Baru'
                            ELSE '-'
                        END AS iskasus
                    "),
                ])
                ->join('antrianpasiendiperiksa_t as apd', 'apd.noregistrasifk', '=', 'pd.norec')
                ->join('ruangan_m as ru', 'ru.id', '=', 'apd.objectruanganfk')
                ->join('diagnosapasien_t as dp', 'dp.noregistrasifk', '=', 'apd.norec')
                ->join('detaildiagnosapasien_t as ddp', 'ddp.noregistrasifk', '=', 'apd.norec')
                ->leftJoin('diagnosa_m as dm', 'dm.id', '=', 'ddp.objectdiagnosafk')
                ->leftJoin('diagnosa_idrg_new_m as dg', 'dg.id', '=', 'ddp.diagnosa_idrg_id')
                ->leftJoin('diagnosa_inacbg_new_m as dgi', 'dgi.id', '=', 'ddp.diagnosa_inacbg_id')
                ->leftJoin('jenisdiagnosa_m as jd', 'jd.id', '=', 'ddp.objectjenisdiagnosafk')
                ->leftJoin('pegawai_m as pg', 'pg.id', '=', 'ddp.objectpegawaifk')
                ->where('pd.kdprofile', (int)$kdProfile)
                ->where('pd.noregistrasi', $request['noReg'])
                ->whereIn('jd.id', [8, 9])
                ->where('ddp.keterangan', 'INAcbg')
                ->where('dp.statusenabled', true)
                ->where(function ($q) {
                    $q->whereNotNull('dp.iskasuslama')
                    ->orWhereNotNull('dp.iskasusbaru');
                })
                ->orderByRaw('
                    ddp.objectdiagnosapasienfk,
                    CASE WHEN jd.id = 8 THEN 0 ELSE 1 END,
                    ddp.tglinputdiagnosa ASC
                ')
                ->get();

            // foreach ($inacbg as $ina) {
            //     $dtdt = $dtdt . '#' .  $ina->kddiagnosa;
            // }
            // $codes = [];
            // foreach ($inacbg as $ina) {
            //     $codes[] = $ina->kddiagnosa;
            // }

            // support php 7.4
            // $dtdt = implode('#', $codes);
            // $codes = collect($inacbg)
            //     ->sortBy(fn($item) => $item->objectjenisdiagnosafk == 7 ? 0 : 1)
            //     ->map(fn($item) => trim((string) $item->kddiagnosa)) // pastikan string
            //     ->values()
            //     ->toArray();

            // $dtdt = implode('#', $codes);

            // support php 7.3
            $codes = collect($inacbg)
                ->sortBy(function ($item) {
                    return $item->objectjenisdiagnosafk == 8 ? 0 : 1;
                })
                ->map(function ($item) {
                    return trim((string) $item->kddiagnosa);
                })
                ->values()
                ->toArray();

            $dtdt = implode('#', $codes);
        }

        if (isset($request['iDRG']) && $request['iDRG'] == 'true') {
            $iDRG = \DB::table('pasiendaftar_t as pd')
                ->select(
                    'dg.id',
                    'pd.noregistrasi',
                    'pd.tglregistrasi',
                    'apd.objectruanganfk',
                    'ru.namaruangan',
                    'apd.norec as norec_apd',
                    'ddp.diagnosa_idrg_id',
                    'dg.code as kddiagnosa',
                    //   \DB::raw("CAST(dg.code AS VARCHAR) as kddiagnosa"),
                    'dg.nama_diagnosa as namadiagnosa',
                    'dg.im',
                    'ddp.objectjenisdiagnosafk',
                    'jd.id as jd_id',
                    'jd.jenisdiagnosa',
                    'ddp.norec as norec_detaildpasien',
                    'ddp.keterangan',
                    'ddp.tglinputdiagnosa',
                    'pg.namalengkap',
                )
                ->join('antrianpasiendiperiksa_t as apd', 'apd.noregistrasifk', '=', 'pd.norec')
                ->join('ruangan_m as ru', 'ru.id', '=', 'apd.objectruanganfk')
                // ->join('diagnosapasien_t as dp', 'dp.noregistrasifk', '=', 'apd.norec')
                ->join('detaildiagnosapasien_t as ddp', 'ddp.noregistrasifk', '=', 'apd.norec')
                ->leftJoin('diagnosa_idrg_new_m as dg', 'dg.id', '=', 'ddp.diagnosa_idrg_id')
                ->leftJoin('jenisdiagnosa_m as jd', 'jd.id', '=', 'ddp.objectjenisdiagnosafk')
                ->leftjoin('pegawai_m as pg', 'pg.id', '=', 'ddp.objectpegawaifk')
                ->where('pd.kdprofile', (int)$kdProfile)
                ->where('pd.noregistrasi', '=', $request['noReg'])
                ->whereIn('jd.id', [8, 9])
                ->where('ddp.keterangan', '=', 'iDRG')
                // ->orderBy('ddp.tglinputdiagnosa', 'asc')
                // ->orderByRaw("CASE WHEN jd.id = 8 THEN 0 ELSE 1 END")
                // ->orderBy('jd.id', 'ASC')
                // ->orderBy('ddp.tglinputdiagnosa', 'asc')
                ->orderByRaw("CASE WHEN jd.id = 8 THEN 0 ELSE 1 END, ddp.tglinputdiagnosa ASC")
                ->get();
            // foreach ($iDRG as $ina_idrg) {
            //     $diagnosa_idrg = $diagnosa_idrg . '#' .  $ina_idrg->kddiagnosa;
            // }
            //             $codes = collect($iDRG)
            //                 ->sortBy(fn($item) => $item->objectjenisdiagnosafk == 7 ? 0 : 1)
            //                 ->map(fn($item) => [
            //                     'original' => $item->kddiagnosa,
            //                     'string'   => strval($item->kddiagnosa),
            //                     'trimmed'  => trim((string)$item->kddiagnosa),
            //                 ])
            //                 ->values()
            //                 ->toArray();

            //             // dd($codes);

            // $diagnosa_idrg = implode('#', $codes);

            // dd($diagnosa_idrg);

            // support php 7.4
            // $codes = collect($iDRG)
            //     ->sortBy(fn($item) => $item->objectjenisdiagnosafk == 7 ? 0 : 1)
            //     ->map(fn($item) => trim((string) $item->kddiagnosa)) // pastikan string
            //     ->values()
            //     ->toArray();

            // $diagnosa_idrg = implode('#', $codes);

            // support php 7.3
            $codes = collect($iDRG)
                ->sortBy(function ($item) {
                    return $item->objectjenisdiagnosafk == 8 ? 0 : 1;
                })
                ->map(function ($item) {
                    return trim((string) $item->kddiagnosa);
                })
                ->values()
                ->toArray();

            $diagnosa_idrg = implode('#', $codes);

            // dd($diagnosa_idrg);
            // $codes = [];
            // foreach ($iDRG as $ina_idrg) {
            //     $codes[] = $ina_idrg->kddiagnosa;
            // }
            // $diagnosa_idrg = implode('#', $codes);
        }

        if (isset($request['emr']) && $request['emr'] == 'true') {
            $emr = \DB::table('pasiendaftar_t as pd')
                ->select(
                    'dg.id',
                    'pd.noregistrasi',
                    'pd.tglregistrasi',
                    'apd.objectruanganfk',
                    'ru.namaruangan',
                    'apd.norec as norec_apd',
                    'ddp.diagnosa_idrg_id',
                    'dg.code as kddiagnosa',
                    'dg.nama_diagnosa as namadiagnosa',
                    'ddp.objectjenisdiagnosafk',
                    'jd.id as jd_id',
                    'jd.jenisdiagnosa',
                    'dp.norec as norec_diagnosapasien',
                    'ddp.norec as norec_detaildpasien',
                    'dp.ketdiagnosis',
                    'ddp.keterangan',
                    'ddp.tglinputdiagnosa',
                    'pg.namalengkap'
                )
                ->join('antrianpasiendiperiksa_t as apd', 'apd.noregistrasifk', '=', 'pd.norec')
                ->join('ruangan_m as ru', 'ru.id', '=', 'apd.objectruanganfk')
                ->join('diagnosapasien_t as dp', 'dp.noregistrasifk', '=', 'apd.norec')
                ->join('detaildiagnosapasien_t as ddp', 'ddp.objectdiagnosapasienfk', '=', 'dp.norec')
                ->leftJoin('diagnosa_idrg_new_m as dg', 'dg.id', '=', 'ddp.diagnosa_idrg_id')
                ->leftJoin('jenisdiagnosa_m as jd', 'jd.id', '=', 'ddp.objectjenisdiagnosafk')
                ->leftjoin('pegawai_m as pg', 'pg.id', '=', 'ddp.objectpegawaifk')
                ->where('pd.kdprofile', (int)$kdProfile)
                ->where('pd.noregistrasi', '=', $request['noReg'])
                ->whereIn('jd.id', [5])
                ->orderBy('ddp.tglinputdiagnosa', 'asc')->get();
        }

        foreach ($emr as $kode) {
            $diagnosaawal = $diagnosaawal . $kode->kddiagnosa . '-' . $kode->namadiagnosa . ', ';
        }

        $d = [];
        $i = 0;

        $data_import = [];
        $p = 0;

        foreach ($inacbg as $item) {
            if ($item->jd_id == 8 || $item->jd_id == 9) {
                $d[$i]['id_diagnosa'] =   $item->id;
                $d[$i]['jd_id'] =   $item->jd_id;
                $d[$i]['kdNama'] =  $item->kddiagnosa . ' - ' . $item->namadiagnosa;
            }
            $i++;
        }

        foreach ($iDRG as $idrg_diagnosa) {
            if ($idrg_diagnosa->jd_id == 8 || $idrg_diagnosa->jd_id == 9) {
                $data_import[$i]['id_diagnosa'] =   $idrg_diagnosa->id;
                $data_import[$i]['jd_id'] =   $idrg_diagnosa->jd_id;
                $data_import[$i]['kdNama'] =  $idrg_diagnosa->kddiagnosa . ' - ' . $idrg_diagnosa->namadiagnosa;
            }
            $i++;
        }

        // $icd10 =  substr($dtdt, 1, strlen($dtdt) - 1);

        // $idrg_icd_10 =  substr($diagnosa_idrg, 1, strlen($diagnosa_idrg) - 1);

        $icd10unu = '';
        $dataunu = [];
        if ($request['unu'] == "true") {
            $dataunu = \DB::table('pasiendaftar_t as pd')
                ->select(
                    'dg.id',
                    'pd.noregistrasi',
                    'pd.tglregistrasi',
                    'apd.objectruanganfk',
                    'ru.namaruangan',
                    'apd.norec as norec_apd',
                    'ddp.diagnosa_idrg_id',
                    'dg.code as kddiagnosa',
                    'dg.nama_diagnosa as namadiagnosa',
                    'ddp.objectjenisdiagnosafk',
                    'jd.jenisdiagnosa',
                    'dp.norec as norec_diagnosapasien',
                    'ddp.norec as norec_detaildpasien',
                    'dp.ketdiagnosis',
                    'ddp.keterangan',
                    'ddp.tglinputdiagnosa',
                    'pg.namalengkap'
                )
                ->join('antrianpasiendiperiksa_t as apd', 'apd.noregistrasifk', '=', 'pd.norec')
                ->join('ruangan_m as ru', 'ru.id', '=', 'apd.objectruanganfk')
                ->join('diagnosapasien_t as dp', 'dp.noregistrasifk', '=', 'apd.norec')
                ->join('detaildiagnosapasien_t as ddp', 'ddp.objectdiagnosapasienfk', '=', 'dp.norec')
                ->leftJoin('diagnosa_idrg_new_m as dg', 'dg.id', '=', 'ddp.diagnosa_idrg_id')
                ->leftJoin('jenisdiagnosa_m as jd', 'jd.id', '=', 'ddp.objectjenisdiagnosafk')
                ->leftjoin('pegawai_m as pg', 'pg.id', '=', 'ddp.objectpegawaifk')
                ->where('pd.kdprofile', (int)$kdProfile)
                ->whereIn('jd.id', [10, 11]);

            if (isset($request['noReg']) && $request['noReg'] != "" && $request['noReg'] != "undefined") {
                $dataunu = $dataunu->where('pd.noregistrasi', '=', $request['noReg']);
            };
            $dataunu = $dataunu->orderBy('ddp.tglinputdiagnosa', 'asc');
            $dataunu = $dataunu->get();

            $dt = '';
            foreach ($dataunu as $item) {

                $dt = $dt . '#' .  $item->kddiagnosa;
            }
            $icd10unu =  substr($dt, 1, strlen($dt) - 1);
            if ($dt == null) {
                $icd10unu = $dtdt;
            } else {
                $icd10unu;
            }
        }

        $result = array(
            'datas' => $data,
            'icd10' => $dtdt,
            'idrg_diagnosa' => $diagnosa_idrg,
            'idrg_dg' => $iDRG,
            'd' => $d,
            'data_import_idrg' => $data_import,
            'inacbg' => $inacbg,
            'icd10unu' => $icd10unu,
            'dataunu' => $dataunu,
            'dgemr' => $emr,
            'semptenan' => $diagnosaawal,
            'message' => 'Cepot',
        );
        return $this->respond($result);
    }
     public function getStatusPemberkasan(Request $request)
    {
        $kdProfile = $this->getDataKdProfile($request);
        $data = \DB::table('riwayatpemberkasan_t as rp')
            ->join('pasiendaftar_t as pd', 'pd.norec', '=', 'rp.noregistrasifk')
            ->join('antrianpasiendiperiksa_t as apd', 'apd.noregistrasifk', '=', 'pd.norec')
            ->select(
                'pd.noregistrasi',
                'pd.tglregistrasi',
                'rp.penerimaan',
                'rp.scanning',
                'rp.pemberkasan',
                'rp.koding',
                'rp.kirimjkn',
                'rp.kelengkapanberkas',
                'rp.verifikasi',
                'rp.input',
                'rp.kirimonline'
            )
            ->where('pd.kdprofile', (int)$kdProfile);

        if (!empty($request['norec']) && $request['norec'] !== 'undefined') {
            $data->where('pd.norec', $request['norec']);
        }

        $data = $data->first(); // ⬅️ pakai first(), bukan get()



        $result = array(
            'datas' => $data,
            'message' => 'Cepot',
        );
        return $this->respond($result);
    }

    public function getDiagnosaPasienByNoregICD9InaCbgNew(Request $request)
    {
        $inacbg = [];
        $diagnosa_idrg_icd_9 = [];
        $dtdt = '';
        $icd9 = '';
        $diagnosa_idrg = '';
        $data = \DB::table('pasiendaftar_t as pd')
            ->select(
                'pd.noregistrasi',
                'pd.tglregistrasi',
                'apd.objectruanganfk',
                'ru.namaruangan',
                'apd.norec as norec_apd',
                'ddt.diagnosa_idrg_id',
                'dt.code as kddiagnosatindakan',
                'dt.nama_diagnosa as namadiagnosatindakan',
                'dtp.norec as norec_diagnosapasien',
                'ddt.ketdiagnosa',
                'dt.id',
                'ddt.norec as norec_detaildpasien',
                'dt.*',
                'ddt.keterangantindakan',
                'pg.namalengkap',
                'ddt.multiplicity'
            )
            ->join('antrianpasiendiperiksa_t as apd', 'apd.noregistrasifk', '=', 'pd.norec')
            ->join('ruangan_m as ru', 'ru.id', '=', 'apd.objectruanganfk')
            ->join('diagnosatindakanpasien_t as dtp', 'dtp.objectpasienfk', '=', 'apd.norec')
            ->join('detaildiagnosatindakanpasien_t as ddt', 'ddt.objectdiagnosatindakanpasienfk', '=', 'dtp.norec')
            ->join('diagnosa_idrg_new_m as dt', 'dt.id', '=', 'ddt.diagnosa_idrg_id')
            ->leftjoin('pegawai_m as pg', 'pg.id', '=', 'ddt.objectpegawaifk')
            ->whereNull('ddt.ketdiagnosa');
        if (isset($request['noCm']) && $request['noCm'] != "" && $request['noCm'] != "undefined") {
            $data = $data->where('ps.nocm', '=', $request['noReg']);
        };
        if (isset($request['noReg']) && $request['noReg'] != "" && $request['noReg'] != "undefined") {
            $data = $data->where('pd.noregistrasi', '=', $request['noReg']);
        };
        if (isset($request['idRuangan']) && $request['idRuangan'] != "" && $request['idRuangan'] != "undefined") {
            $data = $data->where('apd.objectruanganfk', '=', $request['idRuangan']);
        };
        if (isset($request['idDept']) && $request['idDept'] != "" && $request['idDept'] != "undefined") {
            $data = $data->where('apd.objectruanganfk', '=', $request['idDept']);
        };
        if (isset($request['kddiagnosatindakan']) && $request['kddiagnosatindakan'] != "" && $request['kddiagnosatindakan'] != "undefined") {
            $data = $data->where('dt.code as kddiagnosatindakan', '=', $request['kddiagnosatindakan']);
        }
        $data = $data->orderBy(DB::raw("ddt.tglinputdiagnosa"))->get();

        if (isset($request['inacbg']) && [$request['inacbg'] == 'true']) {
            $inacbg = \DB::table('pasiendaftar_t as pd')
                ->select(
                    'pd.noregistrasi',
                    'pd.tglregistrasi',
                    'apd.objectruanganfk',
                    'ru.namaruangan',
                    'apd.norec as norec_apd',
                    'ddt.diagnosa_idrg_id',
                    // 'dt.code as kddiagnosatindakan',
                    // 'dt.nama_diagnosa as namadiagnosatindakan',
                     \DB::raw("COALESCE(dt.code, dgi.code) as kddiagnosatindakan"),
                    \DB::raw("COALESCE(dt.nama_diagnosa, dgi.nama_diagnosa) as namadiagnosatindakan"),
                    'dtp.norec as norec_diagnosapasien',
                    'ddt.ketdiagnosa',
                    'dt.id',
                    'ddt.norec as norec_detaildpasien',
                    'dt.*',
                    'ddt.keterangantindakan',
                    'jd.id as jd_id',
                    'jd.jenisdiagnosa',
                    'ddt.objectjenisdiagnosafk',
                    'pg.namalengkap',
                    'ddt.tglinputdiagnosa',
                    'ddt.multiplicity'
                )
                ->join('antrianpasiendiperiksa_t as apd', 'apd.noregistrasifk', '=', 'pd.norec')
                ->join('ruangan_m as ru', 'ru.id', '=', 'apd.objectruanganfk')
                ->join('diagnosatindakanpasien_t as dtp', 'dtp.objectpasienfk', '=', 'apd.norec')
                ->join('detaildiagnosatindakanpasien_t as ddt', 'ddt.objectdiagnosatindakanpasienfk', '=', 'dtp.norec')
                ->leftJoin('jenisdiagnosa_m as jd', 'jd.id', '=', 'ddt.objectjenisdiagnosafk')
                ->leftJoin('diagnosa_idrg_new_m as dt', 'dt.id', '=', 'ddt.diagnosa_idrg_id')
                ->leftJoin('diagnosa_inacbg_new_m as dgi', 'dgi.id', '=', 'ddt.diagnosa_inacbg_id')
                ->leftjoin('pegawai_m as pg', 'pg.id', '=', 'ddt.objectpegawaifk')
                ->where('ddt.keterangantindakan', '=', 'INAcbg')
                ->where('pd.noregistrasi', '=', $request['noReg'])
                ->whereIn('jd.id', [8, 9])
                ->orderByRaw("(CASE WHEN jd.id = 8 THEN 1 ELSE 0 END), ddt.tglinputdiagnosa ASC");
            // ->orderBy(DB::raw("ddt.tglinputdiagnosa"));
            if (isset($request['idRuangan']) && $request['idRuangan'] != "" && $request['idRuangan'] != "undefined") {
                $inacbg = $inacbg->where('apd.objectruanganfk', '=', $request['idRuangan']);
            };
            $inacbg = $inacbg->get();
            // foreach ($inacbg as $ina) {
            //     // $dtdt = $dtdt . '#' .  $ina->kddiagnosatindakan;
            //     $kode = $ina->kddiagnosatindakan;
            //     if (!empty($ina->multiplicity)) {
            //         $kode .= '+' . $ina->multiplicity;
            //     }
            //     $dtdt .= '#' . $kode;
            // }
            $codes = collect($inacbg)
                ->sortBy(function ($item) {
                    // kalau jenis diagnosa = 7, kasih ranking 0 (paling depan), selain itu ranking 1
                    return $item->objectjenisdiagnosafk == 8 ? 0 : 1;
                })
                ->map(function ($item) {
                    // bikin format kode + multiplicity kalau ada
                    $kode = trim((string) $item->kddiagnosatindakan);
                    if (!empty($item->multiplicity)) {
                        $kode;
                    }
                    return $kode;
                })
                ->values()
                ->toArray();

            $dtdt = implode('#', $codes);
        }

        if (isset($request['iDRG']) && [$request['iDRG'] == 'true']) {
            $diagnosa_idrg_icd_9 = \DB::table('pasiendaftar_t as pd')
                ->select(
                    'pd.noregistrasi',
                    'pd.tglregistrasi',
                    'apd.objectruanganfk',
                    'ru.namaruangan',
                    'apd.norec as norec_apd',
                    'ddt.diagnosa_idrg_id',
                    'dt.code as kddiagnosatindakan',
                    'dt.nama_diagnosa as namadiagnosatindakan',
                    'dtp.norec as norec_diagnosapasien',
                    'ddt.ketdiagnosa',
                    'dt.id',
                    'ddt.norec as norec_detaildpasien',
                    'dt.*',
                    'ddt.keterangantindakan',
                    'jd.id as jd_id',
                    'jd.jenisdiagnosa',
                    'ddt.objectjenisdiagnosafk',
                    'pg.namalengkap',
                    'ddt.tglinputdiagnosa',
                    'ddt.multiplicity'
                )
                ->join('antrianpasiendiperiksa_t as apd', 'apd.noregistrasifk', '=', 'pd.norec')
                ->join('ruangan_m as ru', 'ru.id', '=', 'apd.objectruanganfk')
                ->join('diagnosatindakanpasien_t as dtp', 'dtp.objectpasienfk', '=', 'apd.norec')
                ->join('detaildiagnosatindakanpasien_t as ddt', 'ddt.objectdiagnosatindakanpasienfk', '=', 'dtp.norec')
                ->leftJoin('jenisdiagnosa_m as jd', 'jd.id', '=', 'ddt.objectjenisdiagnosafk')
                ->join('diagnosa_idrg_new_m as dt', 'dt.id', '=', 'ddt.diagnosa_idrg_id')
                ->leftjoin('pegawai_m as pg', 'pg.id', '=', 'ddt.objectpegawaifk')
                ->where('ddt.keterangantindakan', '=', 'iDRG')
                ->where('pd.noregistrasi', '=', $request['noReg'])
                ->whereIn('jd.id', [8, 9])
                ->orderByRaw("(CASE WHEN jd.id = 8 THEN 1 ELSE 0 END), ddt.tglinputdiagnosa ASC");
            // ->orderBy(DB::raw("ddt.tglinputdiagnosa"));
            if (isset($request['idRuangan']) && $request['idRuangan'] != "" && $request['idRuangan'] != "undefined") {
                $diagnosa_idrg_icd_9 = $diagnosa_idrg_icd_9->where('apd.objectruanganfk', '=', $request['idRuangan']);
            };
            $diagnosa_idrg_icd_9 = $diagnosa_idrg_icd_9->get();
            // foreach ($diagnosa_idrg_icd_9 as $ina) {
            //     // $diagnosa_idrg = $diagnosa_idrg . '#' .  $ina->kddiagnosatindakan;
            //     $kode = $ina->kddiagnosatindakan;
            //     if (!empty($ina->multiplicity)) {
            //         $kode .= '+' . $ina->multiplicity;
            //     }
            //     $diagnosa_idrg .= '#' . $kode;
            // }
            $codes = collect($diagnosa_idrg_icd_9)
                ->sortBy(function ($item) {
                    // kalau jenis diagnosa = 7, kasih ranking 0 (paling depan), selain itu ranking 1
                    return $item->objectjenisdiagnosafk == 8 ? 0 : 1;
                })
                ->map(function ($item) {
                    // bikin format kode + multiplicity kalau ada
                    $kode = trim((string) $item->kddiagnosatindakan);
                    if (!empty($item->multiplicity)) {
                        $kode .= '+' . $item->multiplicity;
                    }
                    return $kode;
                })
                ->values()
                ->toArray();

            $diagnosa_idrg = implode('#', $codes);
        }

        $d = [];
        $i = 0;

        foreach ($inacbg as $item) {
            if ($item->keterangantindakan == 'INAcbg') {
                $d[$i]['id_diagnosa'] =  $item->id;
                $d[$i]['ketdiagnosa'] = $item->ketdiagnosa;
                $d[$i]['kdNama'] =  $item->kddiagnosatindakan . ' - ' . $item->namadiagnosatindakan;
            }
            $i++;
        }

        $data_import = [];
        foreach ($diagnosa_idrg_icd_9 as $item) {
            if ($item->keterangantindakan == 'iDRG') {
                $data_import[$i]['id_diagnosa'] =  $item->id;
                $data_import[$i]['ketdiagnosa'] = $item->ketdiagnosa;
                $data_import[$i]['objectjenisdiagnosafk'] = $item->objectjenisdiagnosafk;
                $data_import[$i]['multiplicity'] = $item->multiplicity;
                $data_import[$i]['kdNama'] =  $item->kddiagnosatindakan . ' - ' . $item->namadiagnosatindakan;
            }
            $i++;
        }

        // $icd9 =  substr($dtdt, 1, strlen($dtdt) - 1);

        // $idrg_icd_9_diagnosa =  substr($diagnosa_idrg, 1, strlen($diagnosa_idrg) - 1);

        $icd9unu = '';
        $dataunu = [];
        if ($request['unu'] == "true") {
            $dataunu = \DB::table('pasiendaftar_t as pd')
                ->select(
                    'pd.noregistrasi',
                    'pd.tglregistrasi',
                    'apd.objectruanganfk',
                    'ru.namaruangan',
                    'apd.norec as norec_apd',
                    'ddt.diagnosa_idrg_id',
                    'dt.code as kddiagnosatindakan',
                    'dt.nama_diagnosa as namadiagnosatindakan',
                    'dtp.norec as norec_diagnosapasien',
                    'ddt.norec as norec_detaildpasien',
                    'dt.*',
                    'ddt.keterangantindakan',
                    'pg.namalengkap',
                    'ddt.tglinputdiagnosa',
                    'ddt.multiplicity'
                )
                ->join('antrianpasiendiperiksa_t as apd', 'apd.noregistrasifk', '=', 'pd.norec')
                ->join('ruangan_m as ru', 'ru.id', '=', 'apd.objectruanganfk')
                ->join('diagnosatindakanpasien_t as dtp', 'dtp.objectpasienfk', '=', 'apd.norec')
                ->join('detaildiagnosatindakanpasien_t as ddt', 'ddt.objectdiagnosatindakanpasienfk', '=', 'dtp.norec')
                ->join('diagnosa_idrg_new_m as dt', 'dt.id', '=', 'ddt.diagnosa_idrg_id')
                ->leftjoin('pegawai_m as pg', 'pg.id', '=', 'ddt.objectpegawaifk')
                ->where('pd.noregistrasi', '=', $request['noReg'])
                ->where('ddt.ketdiagnosa', '=', 'unugrouper')
                ->orderBy('kddiagnosatindakan', 'asc')
                ->get();


            $dt = '';
            foreach ($dataunu as $item) {

                $dt = $dt . '#' .  $item->kddiagnosatindakan;
            }
            if ($dt == null) {
                $icd9unu = $icd9;
            } else {
                $icd9unu =  substr($dt, 1, strlen($dt) - 1);
            }
        };

        $result = array(
            'datas' => $data,
            'inacbg' => $inacbg,
            'icd9' => $dtdt,
            'idrg_diagnosa_icd_9' => $diagnosa_idrg,
            'diagnosa_idrg' => $diagnosa_idrg_icd_9,
            'icd9unu' => $icd9unu,
            'dataunu' => $dataunu,
            'data_import' => $data_import,
            'd' => $d,
            'message' => 'giw@cepot',
        );
        return $this->respond($result);
    }

    public function getRiwayatVitalSign(Request $request)
    {
        $kdProfile = $this->getDataKdProfile($request);
        $noregistrasi = $request['noregistrasi'];

        $data = DB::select(DB::raw("
                SELECT DISTINCT
                emr.id,
                ept.value,
                em.caption,
                ep.norec_apd,
                ep.norec 
            FROM
                emrpasien_t AS ep
                LEFT JOIN emrpasiend_t AS ept ON ept.emrpasienfk = ep.noemr
                LEFT JOIN emr_t AS em ON em.ID = ep.emrfk 
                LEFT JOIN emrd_t as emr on emr.id = ept.emrdfk
            WHERE
                ep.emrfk = 147
                and ep.kdprofile = $kdProfile
                and ep.noregistrasifk = '$noregistrasi'
                AND ep.statusenabled = TRUE
                "));

        $result = array(
            'data' => $data,
        );

        return $this->respond($result);
    }

    public function getRiwayatTindakanRajal(Request $request)
    {
        $kdProfile = $this->getDataKdProfile($request);
        $noregistrasi = $request['noregistrasi'];

        $data = DB::select(DB::raw("
                    SELECT
                    pp.norec,
                    pp.tglpelayanan,
                    pp.rke,
                    pr.ID AS prid,
                    pr.namaproduk,
                    pp.jumlah,
                    kl.ID AS klid,
                    kl.namakelas,
                    ru.ID AS ruid,
                    ru.namaruangan,
                    --dpm.id,
                    --dpm.namadepartemen,
                    pp.produkfk,
                    pp.hargajual,
                    pp.hargadiscount,
                    --sp.nostruk,
                    --sp.tglstruk,
                    apd.norec AS norec_apd,
                    pg.ID AS pgid,
                    pg.namalengkap,
                    --sbm.nosbm,
                    --sp.norec AS norec_sp,
                    pp.jasa,
                    pd.nocmfk,
                    ru2.objectdepartemenfk AS deptid,
                    pd.nocmfk,
                    pd.nostruklastfk,
                    --ag.ID AS agid,
                    --ag.agama,
                    pas.tgllahir,
                    kp.ID AS kpid,
                    kp.kelompokpasien,
                    pas.objectstatusperkawinanfk,
                    pas.namaayah,
                    pas.namasuamiistri,
                    pas.ID AS pasid,
                    pas.nocm,
                    --jkel.ID AS jkelid,
                    --jkel.jeniskelamin,
                    --jkel.reportdisplay AS jk,
                    pd.noregistrasi,
                    pas.namapasien,
                    pd.tglregistrasi,
                    pd.norec AS norec_pd,
                    pd.tglpulang,
                    pas.notelepon,
                    kls.ID AS klsid,
                    kls.namakelas,
                    pd.objectrekananfk AS rekananid,
                    ru2.namaruangan AS ruanganlast,
                    kls2.ID AS klsid2,
                    kls2.namakelas AS namakelas2,
                    sr.noresep,
                    --rk.namarekanan,
                    --rusr.namaruangan AS ruanganfarmasi,
                    --pgsr.namalengkap AS penulisresep,
                    --jp.jenisproduk,
                    --kpBpjs.kelompokprodukbpjs AS kelompokprodukbpjs,
                    pgpj.namalengkap AS dokterpj,
                    pp.jasa,
                    --kamar.namakamar,
                    --sp.totalharusdibayar,
                    --sp.totalprekanan,
                    --sppj.totalppenjamin,
                    --sp.totalbiayatambahan,
                    --pgsbm.namalengkap AS namalengkapsbm,
                    pd.kdprofile,
                    pp.aturanpakai,
                    pp.iscito,
                    pd.statuspasien,
                    pp.isparamedis,
                    ru2.ID AS ruanganlastid,
                    pp.istarifdetault,
                    pp.hargadijamin,
                    pp.strukresepfk 
                FROM
                    pasiendaftar_t AS pd
                    LEFT JOIN antrianpasiendiperiksa_t AS apd ON apd.noregistrasifk = pd.norec
                    LEFT JOIN pelayananpasien_t AS pp ON pp.noregistrasifk = apd.norec
                    LEFT JOIN produk_m AS pr ON pr.ID = pp.produkfk
                    --LEFT JOIN detailjenisproduk_m AS djp ON djp.ID = pr.objectdetailjenisprodukfk
                    --LEFT JOIN jenisproduk_m AS jp ON jp.ID = djp.objectjenisprodukfk
                    --LEFT JOIN kelompokprodukbpjs_m AS kpBpjs ON kpBpjs.ID = pr.objectkelompokprodukbpjsfk
                    LEFT JOIN kelas_m AS kl ON kl.ID = apd.objectkelasfk
                    LEFT JOIN ruangan_m AS ru ON ru.ID = apd.objectruanganfk
                    INNER JOIN ruangan_m AS ru2 ON ru2.ID = pd.objectruanganlastfk
                    INNER JOIN pasien_m AS pas ON pas.ID = pd.nocmfk
                    --LEFT JOIN departemen_m as dpm on dpm.id = ru.objectdepartemenfk
                    --LEFT JOIN agama_m AS ag ON ag.ID = pas.objectagamafk
                    --LEFT JOIN jeniskelamin_m AS jkel ON jkel.ID = pas.objectjeniskelaminfk
                    LEFT JOIN kelompokpasien_m AS kp ON kp.ID = pd.objectkelompokpasienlastfk
                    LEFT JOIN kelas_m AS kls ON kls.ID = apd.objectkelasfk
                    LEFT JOIN kelas_m AS kls2 ON kls2.ID = pd.objectkelasfk
                    LEFT JOIN pegawai_m AS pg ON pg.ID = apd.objectpegawaifk
                    LEFT JOIN pegawai_m AS pgpj ON pgpj.ID = pd.objectpegawaifk
                    --LEFT JOIN rekanan_m AS rk ON rk.ID = pd.objectrekananfk
                    LEFT JOIN strukresep_t AS sr ON sr.norec = pp.strukresepfk
                    --LEFT JOIN ruangan_m AS rusr ON rusr.ID = sr.ruanganfk
                    --LEFT JOIN kamar_m AS kamar ON kamar.ID = apd.objectkamarfk
                    --LEFT JOIN pegawai_m AS pgsr ON pgsr.ID = sr.penulisresepfk
                    --LEFT JOIN strukpelayanan_t AS sp ON sp.norec = pp.strukfk
                    --LEFT JOIN strukpelayananpenjamin_t AS sppj ON sp.norec = sppj.nostrukfk
                    --LEFT JOIN strukbuktipenerimaan_t AS sbm ON sp.nosbmlastfk = sbm.norec
                    --LEFT JOIN pegawai_m AS pgsbm ON pgsbm.ID = sbm.objectpegawaipenerimafk 
                WHERE
                    pd.kdprofile = $kdProfile 
                    --and dpm.id = 18
                    AND pd.noregistrasi = '$noregistrasi'
                    --AND pp.strukresepfk IS NULL 
                ORDER BY
                    pp.tglpelayanan DESC
                "));

        $result = array(
            'data' => $data,
        );

        return $this->respond($result);
    }

    public function getRiwayatResep(Request $request)
    {
        $kdProfile = $this->getDataKdProfile($request);
        $noregistrasi = $request['noregistrasi'];

        $data = DB::select(DB::raw("
                    SELECT
                    ps.nocm,
                    ps.namapasien,
                    jk.jeniskelamin,
                    pp.tglpelayanan,
                    pp.produkfk,
                    pr.namaproduk,
                    ss.satuanstandar,
                    ss.id AS satuanstandarfk,
                    pp.jumlah,
                    pp.hargasatuan,
                    pp.hargadiscount,
                    sp.nostruk,
                    pd.noregistrasi,
                    pp.keteranganpakai,
                    ks.nilaikonversi,
                    ss2.satuanstandar AS satuanstandar2,
                    ss2.id AS satuanstandar2fk,
                    sr.noresep,
                    sr.norec AS norec_resep,
                    pp.rke,
                    jkm.jeniskemasan,
                    jk.id AS jkid,
                    jkm.id AS jkmid,
                    pp.jenisobatfk,
                    jra.jenisracikan,
                    pp.jasa,
                    ru2.id AS ruangandepoid,
                    ru2.namaruangan AS ruangandepo,
                    pp.aturanpakai,
                    ru.namaruangan,
                    dok.namalengkap AS dokter,
                    pp.ispagi,
                    pp.issiang,
                    pp.ismalam,
                    pp.issore,
                    pp.iskronis,
                    sr.isreseppulang AS reseppulang,
                CASE
                        
                        WHEN pr.kekuatan IS NOT NULL 
                        AND rs.NAME IS NOT NULL THEN
                            pr.kekuatan || ' ' || rs.NAME ELSE'' 
                            END AS kekuatan,
                        sn.satuanresep,
                        pp.satuanresepfk,
                        pp.tglkadaluarsa,
                        pp.dosis,
                        djp.detailjenisproduk,
                        jp.jenisproduk,
                        sr.pasienfk 
                    FROM
                        pelayananpasien_t AS pp
                        INNER JOIN antrianpasiendiperiksa_t AS apd ON apd.norec = pp.noregistrasifk
                        INNER JOIN pasiendaftar_t AS pd ON pd.norec = apd.noregistrasifk
                        INNER JOIN pasien_m AS ps ON ps.id = pd.nocmfk
                        INNER JOIN jeniskelamin_m AS jk ON jk.id = ps.objectjeniskelaminfk
                        INNER JOIN produk_m AS pr ON pr.id = pp.produkfk
                        INNER JOIN ruangan_m AS ru ON ru.id = apd.objectruanganfk
                        INNER JOIN jeniskemasan_m AS jkm ON jkm.id = pp.jeniskemasanfk
                        LEFT JOIN jenisracikan_m AS jra ON jra.id = pp.jenisobatfk
                        LEFT JOIN satuanstandar_m AS ss ON ss.id = pp.satuanviewfk
                        LEFT JOIN satuanstandar_m AS ss2 ON ss2.id = pr.objectsatuanstandarfk
                        INNER JOIN detailjenisproduk_m AS djp ON djp.id = pr.objectdetailjenisprodukfk
                        INNER JOIN jenisproduk_m AS jp ON jp.id = djp.objectjenisprodukfk
                        LEFT JOIN strukpelayanan_t AS sp ON sp.norec = pp.strukfk
                        LEFT JOIN konversisatuan_t AS ks ON ks.objekprodukfk = pr.id 
                        AND ks.satuanstandar_tujuan = pp.satuanviewfk
                        LEFT JOIN strukresep_t AS sr ON sr.norec = pp.strukresepfk
                        LEFT JOIN ruangan_m AS ru2 ON ru2.id = sr.ruanganfk
                        LEFT JOIN pegawai_m AS dok ON dok.id = sr.penulisresepfk
                        LEFT JOIN rm_sediaan_m AS rs ON rs.id = pr.objectsediaanfk
                        LEFT JOIN satuanresep_m AS sn ON sn.id = pp.satuanresepfk 
                    WHERE
                        pp.kdprofile = $kdProfile 
                        AND jp.id = 97 
                        AND pd.noregistrasi = '$noregistrasi' 
                ORDER BY
                    pp.tglpelayanan DESC
                "));

        $result = array(
            'data' => $data,
        );

        return $this->respond($result);
    }

    public function getDiagnosaDaftarAntrianKdNm(Request $request)
    {
        $req = $request->all();
        $icdIX = \DB::table('diagnosa_idrg_new_m as dg')
            ->select('dg.id', 'dg.code as kddiagnosa', 'dg.nama_diagnosa as namadiagnosa', 'dg.kddiagnosa as kdDiagnosa', 'dg.nama_diagnosa as namaDiagnosa')
            ->where('dg.statusenabled', true);


        if (
            isset($req['filter']['filters'][0]['value']) &&
            $req['filter']['filters'][0]['value'] != "" &&
            $req['filter']['filters'][0]['value'] != "undefined"
        ) {
            $icdIX = $icdIX->where(function ($q) use ($req) {
                $q->where('dg.nama_diagnosa as namadiagnosa', 'ilike', '%' . $req['filter']['filters'][0]['value'] . '%')
                    ->orWhere('dg.code as kddiagnosa', 'ilike', $req['filter']['filters'][0]['value'] . '%');
            });
        }
        $icdIX = $icdIX->orderBy('dg.kddiagnosa');
        $icdIX = $icdIX->take(10);
        $icdIX = $icdIX->get();

        $data = [];
        if (count($icdIX) > 0) {
            foreach ($icdIX as $item) {
                $data[] = array(
                    'kodeNama' => $item->kdDiagnosa . ' - ' . $item->namaDiagnosa,
                    'id' => $item->id,
                    'kdDiagnosa' => $item->kdDiagnosa,
                    'namaDiagnosa' => $item->namaDiagnosa,

                );
            }
        }

        return $this->respond($data);
    }

    public function deleteDiagnosaPasienInacbg(Request $request)
    {
        $dataLogin = $request->all();
        $kdProfile = $this->getDataKdProfile($request);
        DB::beginTransaction();
        if ($request['diagnosa']['norec_dp'] != '') {
            try {
                $data1 = DetailDiagnosaPasien::where('norec', $request['diagnosa']['norec_dp'])->where('kdprofile', (int)$kdProfile)->delete();
                $transStatus = 'true';
            } catch (\Exception $e) {
                $transStatus = false;
            }
        }
        if ($transStatus = 'true') {
            DB::commit();
            $transMessage = "Data Terhapus";
        } else {
            DB::rollBack();
            $transMessage = "Data Gagal Dihapus";
        }

        return $this->setStatusCode(201)->respond([], $transMessage);
    }

    public function saveToReqRes(Request $request)
    {
        $data_request = $request->all();
        DB::beginTransaction();

        try {
            $req_res = BridgingIdrgResReq::where('no_sep', $data_request['no_sep'])->first();

            if (!$req_res) {
                $req_res = new BridgingIdrgResReq();
                $req_res->norec = $req_res->generateNewId();
                $req_res->no_sep = $data_request['no_sep'];
            }

            $jsonColumns = [
                'json_idrg_new_claim',
                'json_idrg_set_claim_data',
                'json_idrg_diagnosa_set',
                'json_idrg_procedure_set',
                'json_idrg_grouper',
                'json_idrg_grouper_final',
                'json_idrg_grouper_reedit',
                'json_idrg_to_inacbg_import',
                'json_inacbg_diagnosa_set',
                'json_inacbg_procedure_set',
                'json_inacbg_grouper_stage_satu',
                'json_inacbg_grouper_stage_dua',
                'json_inacbg_grouper_final',
                'json_inacbg_grouper_reedit',
                'json_claim_final',
                'json_reedit_claim',
                'json_send_claim_individual',
            ];

            foreach ($jsonColumns as $col) {
                if (array_key_exists($col, $data_request)) {
                    $req_res->$col = $data_request[$col];
                }
            }

            $req_res->save();

            DB::commit();
            return $this->setStatusCode(201)->respond([], "Data Berhasil Disimpan");
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->setStatusCode(500)->respond(['error' => $e->getMessage()], "Data Gagal Disimpan");
        }
    }

    public function saveResGruping(Request $request)
    {
        $data_request = $request->all();
        DB::beginTransaction();
        try {
            $req_res = IdrgGruping::where('no_sep', $data_request['no_sep'])->first();

            if ($req_res) {
                $req_res->mdc_number = $data_request['mdc_number'];
                $req_res->mdc_description = $data_request['mdc_description'];
                $req_res->drg_code = $data_request['drg_code'];
                $req_res->drg_description = $data_request['drg_description'];
                // $req_res->script_version = $data_request['script_version'];
                $req_res->script_version = isset($data_request['script_version']) ? $data_request['script_version'] : null;
                // $req_res->logic_version = $data_request['logic_version'];
                $req_res->logic_version = isset($data_request['logic_version']) ? $data_request['logic_version'] : null;
                $req_res->gruping_respons = $data_request['gruping_respons'];
                $req_res->save();
                $transMessage = "Data Berhasil Diupdate";
            } else {
                $req_res = new IdrgGruping();
                $req_res->norec = $req_res->generateNewId();
                $req_res->no_sep = $data_request['no_sep'];
                $req_res->mdc_number = $data_request['mdc_number'];
                $req_res->mdc_description = $data_request['mdc_description'];
                $req_res->drg_code = $data_request['drg_code'];
                $req_res->drg_description = $data_request['drg_description'];
                // $req_res->script_version = $data_request['script_version'];
                $req_res->script_version = isset($data_request['script_version']) ? $data_request['script_version'] : null;
                // $req_res->logic_version = $data_request['logic_version'];
                $req_res->logic_version = isset($data_request['logic_version']) ? $data_request['logic_version'] : null;
                $req_res->gruping_respons = $data_request['gruping_respons'];
                $req_res->save();
                $transMessage = "Data Berhasil Disimpan";
            }

            DB::commit();
            return $this->setStatusCode(201)->respond([], $transMessage);
        } catch (\Exception $e) {
            DB::rollBack();
            $transMessage = "Data Gagal Disimpan";
            return $this->setStatusCode(500)->respond(['error' => $e->getMessage()], $transMessage);
        }
    }

    public function deleteResGruping(Request $request)
    {
        DB::beginTransaction();
        try {
            $no_sep = $request->input('nosep');
            $req_res = IdrgGruping::where('no_sep', $no_sep)->first();

            if ($req_res) {
                $req_res->delete();
                DB::commit();
                return $this->setStatusCode(200)->respond(["data" => 'Data Berhasil Dihapus'], "Data Berhasil Dihapus");
            } else {
                return $this->setStatusCode(404)->respond([], "Data Tidak Ditemukan");
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->setStatusCode(500)->respond(['error' => $e->getMessage()], "Data Gagal Dihapus");
        }
    }

    public function saveResGrupingInacbg(Request $request)
    {
        $data_request = $request->all();
        DB::beginTransaction();
        try {
            $req_res = InaCbgGruping::where('no_sep', $data_request['no_sep'])->first();

            if ($req_res) {
                $req_res->cbg_code = $data_request['cbg_code'] ?? null;
                $req_res->cbg_description = $data_request['cbg_description'] ?? null;
                $req_res->base_tariff = $data_request['base_tariff'] ?? null;
                $req_res->tariff = $data_request['tariff'] ?? null;
                $req_res->kelas = $data_request['kelas'] ?? null;
                $req_res->inacbg_version = $data_request['inacbg_version'] ?? null;
                $req_res->stage = $data_request['stage'] ?? null;
                $req_res->gruping_respons = $data_request['gruping_respons'] ?? null;
                $req_res->save();
                $transMessage = "Data Berhasil Diupdate";
            } else {
                $req_res = new InaCbgGruping();
                $req_res->norec = $req_res->generateNewId();
                $req_res->no_sep = $data_request['no_sep'] ?? null;
                $req_res->cbg_code = $data_request['cbg_code'] ?? null;
                $req_res->cbg_description = $data_request['cbg_description'] ?? null;
                $req_res->base_tariff = $data_request['base_tariff'] ?? null;
                $req_res->tariff = $data_request['tariff'] ?? null;
                $req_res->kelas = $data_request['kelas'] ?? null;
                $req_res->inacbg_version = $data_request['inacbg_version'] ?? null;
                $req_res->stage = $data_request['stage'] ?? null;
                $req_res->gruping_respons = $data_request['gruping_respons'] ?? null;
                $req_res->save();
                $transMessage = "Data Berhasil Disimpan";
            }

            DB::commit();
            return $this->setStatusCode(201)->respond([], $transMessage);
        } catch (\Exception $e) {
            DB::rollBack();
            $transMessage = "Data Gagal Disimpan";
            return $this->setStatusCode(500)->respond(['error' => $e->getMessage()], $transMessage);
        }
    }
}
