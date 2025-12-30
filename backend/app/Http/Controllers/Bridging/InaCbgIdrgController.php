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
                $url = $item->nilaifield;
                // $url = "http://10.70.0.114/E-Klaim/ws.php?mode=debug";
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
            // ->leftJoin(DB::raw("
            //     (SELECT DISTINCT ON (no_sep) *
            //     FROM idrg_gruping
            //     ORDER BY no_sep DESC
            //     ) AS igp
            // "), 'igp.no_sep', '=', 'pas.nosep')
            // ->leftjoin('inacbg_gruping as ipg', 'ipg.no_sep', '=', 'pas.nosep')
            ->leftjoin('asuransipasien_m as asu', 'asu.noasuransi', '=', 'ps.nobpjs')
            ->leftjoin('kelas_m as kls', 'kls.id', '=', 'pd.objectkelasfk')
            ->leftjoin('kelas_m as kls2', 'kls2.id', '=', 'asu.objectkelasdijaminfk')
            ->leftjoin('hasilgrouping_t as hg', 'hg.noregistrasifk', '=', 'pd.norec')
            ->leftjoin('diagnosaberatbadanbayi_t as dbb', 'dbb.noregistrasifk', '=', 'pd.norec')
            ->leftjoin('rekanan_m as rk', 'rk.id', '=', 'pd.objectrekananfk')
            // ->leftjoin('apgarscore_t as aps', 'aps.noregistrasifk', '=', 'pd.norec')
            ->leftjoin('statuspulang_m as stp', 'stp.id', '=', 'pd.objectstatuspulangfk')
            ->leftjoin('dokklaim_t as dok', 'dok.noregistrasifk', '=', 'pd.norec')
            ->distinct()
            ->select(
                'pd.norec',
                'pd.objectruanganlastfk',
                'pd.tglregistrasi',
                'ps.nocm',
                'pd.noregistrasi',
                // 'ipg.norec as norec_gruping_inacbg',
                // 'ipg.cbg_code',
                // 'ipg.cbg_description',
                // 'ipg.base_tariff',
                // 'ipg.tariff',
                // 'ipg.kelas',
                // 'ipg.inacbg_version',
                // 'ipg.stage',
                // 'igp.norec as norec_gruping_idrg',
                // 'igp.mdc_number',
                // 'igp.mdc_description',
                // 'igp.drg_code',
                // 'igp.drg_description',
                // 'igp.script_version',
                // 'igp.logic_version',
                'ru.namaruangan',
                'ps.namapasien',
                'kp.kelompokpasien',
                'pd.tglpulang',
                'pd.statuspasien',
                'apd.norec as norec_apd',
                'rsm.norec as norec_resume',
                'stp.namaexternal as statuspulang',
                // 'usiakehamilan',
                // 'gravida',
                // 'partus',
                // 'abortus',
                // 'pd.pegawaikirim',
                // 'pd.pegawaisimpan',
                // 'pd.pegawaigrouper',
                // 'pd.pegawaifinalklaim',
                // 'pd.pegeditklaim',
                // 'pd.tgledit',
                // 'pd.tglklaim',
                'pg.id as pgid',
                'pg.namalengkap as namadokter',
                'kp.id as kpid',
                // 'asl.caramasuk_inacbg',
                'stp.kodeexternal',
                'ru.objectdepartemenfk',
                // 'hg.tglgrouping',
                // 'hg.special_cmg',
                // 'hg.response',
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
                // 'aps.1menit_appear as menit1_appear',
                // 'aps.1menit_pulse as menit1_pulse',
                // 'aps.1menit_grimace as menit1_grimace',
                // 'aps.1menit_activity as menit1_activity',
                // 'aps.1menit_resp as menit1_resp',
                // 'aps.5menit_appear as menit5_appear',
                // 'aps.5menit_pulse as menit5_pulse',
                // 'aps.5menit_grimace as menit5_grimace',
                // 'aps.5menit_activity as menit5_activity',
                // 'aps.5menit_resp as menit5_resp',
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
            // 'ipg.norec',
            // 'ipg.cbg_code',
            // 'ipg.cbg_description',
            // 'ipg.base_tariff',
            // 'ipg.tariff',
            // 'ipg.kelas',
            // 'ipg.inacbg_version',
            // 'ipg.stage',
            // 'igp.norec',
            // 'igp.mdc_number',
            // 'igp.mdc_description',
            // 'igp.drg_code',
            // 'igp.drg_description',
            // 'igp.script_version',
            // 'igp.logic_version',
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
            // 'usiakehamilan',
            // 'gravida',
            // 'partus',
            // 'abortus',
            'pg.id',
            'pg.namalengkap',
            'kp.id',
            // 'asl.caramasuk_inacbg',
            // 'pd.tglklaim',
            // 'pd.tgledit',
            // 'pd.pegawaikirim',
            // 'pd.pegawaisimpan',
            // 'pd.pegawaigrouper',
            // 'pd.pegawaifinalklaim',
            // 'pd.pegeditklaim',
            'stp.kodeexternal',
            'ru.objectdepartemenfk',
            // 'hg.tglgrouping',
            // 'hg.special_cmg',
            // 'hg.response',
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
            // 'aps.1menit_appear',
            // 'aps.1menit_pulse',
            // 'aps.1menit_grimace',
            // 'aps.1menit_activity',
            // 'aps.1menit_resp',
            // 'aps.5menit_appear',
            // 'aps.5menit_pulse',
            // 'aps.5menit_grimace',
            // 'aps.5menit_activity',
            // 'aps.5menit_resp'
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


        $ventilator = DB::select(DB::raw("
                SELECT x.noregistrasifk, '1' as use_ind,case when x.ventilator_hour<1 then 1 ELSE x.ventilator_hour end as ventilator_hour, x.stop_dttm,x.start_dttm FROM(SELECT ep.noregistrasifk,epd.emrpasienfk, EXTRACT(HOUR FROM (lps.stop_dttm::TIMESTAMP - epd.value::TIMESTAMP)) AS ventilator_hour, epd.value as start_dttm,lps.stop_dttm FROM emrpasiend_t as epd
                INNER JOIN (SELECT emrpasienfk,
                 value as stop_dttm FROM emrpasiend_t 
                WHERE emrfk = 291042 and emrdfk in (318182)) as lps ON lps.emrpasienfk = epd.emrpasienfk
                INNER JOIN emrpasien_t as ep on ep.noemr = epd.emrpasienfk
                WHERE epd.emrfk = 291042 and epd.emrdfk in (318179)) as x 
        "));



        // foreach ($data as $item) {
        //     $item->response = json_decode($item->response);
        //     $item->sistole = 0;
        //     $item->diastole = 0;
        //     $item->birth_weight = 0;
        //     foreach ($VitalSign as $item2) {
        //         if ($item->noregistrasi == $item2->noregistrasi) {
        //             if ($item2->emrdfk == 4241) {
        //                 if (str_contains($item2->value, '/')) {
        //                     $tekanandarah = explode("/", $item2->value);
        //                     $item->sistole = is_nan((float)$tekanandarah[0]) ? 0 : (float)$tekanandarah[0];
        //                     $item->diastole = is_nan((float)$tekanandarah[1]) ? 0 : (float)$tekanandarah[1];
        //                 }
        //             }
        //             if ($item2->emrdfk == 4243) {
        //                 $item->birth_weight = is_nan((float)$item2->value) ? 0 : (float)$item2->value;
        //             }
        //         }
        //     }
        // }

    //     $dataDiagnosa = \DB::table('detaildiagnosapasien_t as dp')
    //         ->leftJoin('diagnosa_idrg_m as dg', 'dg.id', '=', 'dp.diagnosa_idrg_id')
    //         ->leftJoin('diagnosa_inacbg_m as dgi', 'dgi.id', '=', 'dp.diagnosa_inacbg_id')
    //         ->join('antrianpasiendiperiksa_t as apd', 'apd.norec', '=', 'dp.noregistrasifk')
    //         ->join('pasiendaftar_t as pd', 'pd.norec', '=', 'apd.noregistrasifk')
    //         ->select(
    //             // 'dg.code_satu as kddiagnosa', 
    //             'apd.objectasalrujukanfk', 
    //             'pd.norec', 
    //             // 'dg.nama_diagnosa as namadiagnosa',
    //             \DB::raw("COALESCE(dg.code_satu, dgi.code_satu) as kddiagnosa"),
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
    //         // ->join('diagnosa_idrg_m as dg', 'dg.id', '=', 'dp.objectdiagnosatindakanfk')
    //         ->leftJoin('diagnosa_idrg_m as dg', 'dg.id', '=', 'dp.diagnosa_idrg_id')
    //         ->leftJoin('diagnosa_inacbg_m as dgi', 'dgi.id', '=', 'dp.diagnosa_inacbg_id')
    //         ->join('antrianpasiendiperiksa_t as apd', 'apd.norec', '=', 'dpa.objectpasienfk')
    //         ->join('pasiendaftar_t as pd', 'pd.norec', '=', 'apd.noregistrasifk')
    //         ->select(
    //             // 'dg.code_satu as kddiagnosatindakan', 
    //    \DB::raw("COALESCE(dg.code_satu, dgi.code_satu) as kddiagnosatindakan"),
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
}
