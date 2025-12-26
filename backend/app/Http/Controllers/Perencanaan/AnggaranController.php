<?php
/**
 * Created by PhpStorm.
 * User: Efan Andrian
 * Date: 01/10/2021
 * Time: 10:21 AM
 */

namespace App\Http\Controllers\Perencanaan;
use App\Http\Controllers\ApiController;
use App\Master\ChartOfAccount;
use App\Master\PerencanaanAnggaran;
use App\Master\PerencanaanAnggaranRevisi;
use App\Traits\Valet;
use DB;
use Illuminate\Http\Request;

class AnggaranController extends ApiController{
    use Valet;
    public function __construct(){
        parent::__construct($skip_authentication = false);
    }

    public function getDataComboSatuanAnggaran(Request $request) {
        $kdProfile = (int)$this->getDataKdProfile($request);
        $data = \DB::table('satuananggaran_m as sw')
            ->select('sw.id','sw.reportdisplay')
            ->where('sw.statusenabled', true)
            ->where('sw.kdprofile', $kdProfile)
            ->orderBy('sw.id','desc')
            ->get();

        $datakelompok = collect(DB::select("
            select id,kelompok from kelompokanggaran_m where statusenabled = true;
        "));

        $revisi = collect(DB::select("
            select max(revisi) AS revisi from perencanaananggaran_m
        "))->first();

        $result = array(
            'satuan'=> $data,
            'kelompok' => $datakelompok,
            'revisi' => $revisi,
            'message' => 'ea@epic',
        );

        return $this->respond($result);        
    }

    public function SaveDataMasterAnggaran(Request $request) {
        $idProfile =  (int) $this->getDataKdProfile($request);
        DB::beginTransaction();
        $dataLogin = $request->all();
        try {
            if ($request['id'] == ''){
                $lasID =  PerencanaanAnggaran::max('id');
                $newID = $lasID + 1;

                $newPA = new PerencanaanAnggaran();
                $norecHead = $newPA->generateNewId();
                $newPA->id = $newID;
                $newPA->kdprofile = $idProfile;
                $newPA->norec = $norecHead;
                $newPA->statusenabled = true;
                $newPA->namaexternal = 'Master Anggaran';

                $lasIDrev =  PerencanaanAnggaranRevisi::max('id');
                $newIDrev = $lasIDrev + 1;

                $newPAr = new PerencanaanAnggaranRevisi();
                $norecHeads = $newPAr->generateNewId();
                $newPAr->id = $newIDrev;
                $newPAr->kdprofile = $idProfile;
                $newPAr->norec = $norecHeads;
                $newPAr->statusenabled = true;
                $newPAr->namaexternal = 'Revisi Master Anggaran';
                $newPAr->kodeexternal = $request['kdrekening'];
                $newPAr->kdrekening = $request['kdrekening'];
                $newPAr->kode = $request['kode'];
                $newPAr->mataanggaran = $request['namaanggaran'];
                $newPAr->tahun = $request['tahun'];
                $newPAr->volume = $request['volume'];
                $newPAr->satuan = $request['satuananggaran'];
                $newPAr->hargasatuan = (float) ( str_replace(".","", $request['hargasatuan']));
                $newPAr->saldoawalblu = (float) ( str_replace(".","", $request['saldoblud']));
                $newPAr->revisi = $request['revisi'];
                $newPAr->turunan = $request['turunan'];
                if (isset($request['keterangan'])){
                    $newPAr->keterangan = $request['keterangan'];
                }
                $newPAr->save();

            }else{
                $newPA =  PerencanaanAnggaran::where('id',$request['id'])->where('kdprofile', $idProfile)->first();
            }
                $newPA->kodeexternal = $request['kdrekening'];
                $newPA->kdrekening = $request['kdrekening'];
                $newPA->kode = $request['kode'];
                $newPA->mataanggaran = $request['namaanggaran'];
                $newPA->tahun = $request['tahun'];
                $newPA->volume = $request['volume'];
                $newPA->satuan = $request['satuananggaran'];
                $newPA->pengendalifk = $request['statusenabled'];
                $newPA->hargasatuan = (float) ( str_replace(".","", $request['hargasatuan']));
                $newPA->saldoawalblu = (float) ( str_replace(".","", $request['saldoblud']));
                $newPA->revisi = $request['revisi'];
                $newPA->turunan = $request['turunan'];
                if (isset($request['keterangan'])){
                    $newPA->keterangan = $request['keterangan'];
                }
//                $newPA->saldoawalrm = $request['salBlud'];
                $newPA->save();

            $transStatus = 'true';
        } catch (\Exception $e) {
            $transStatus = 'false';
            $transMessage = "Simpan Gagal";
        }

        if ($transStatus == 'true') {
            $transMessage = "Simpan Berhasil" ;
            DB::commit();
            $result = array(
                "status" => 201,
                "data" => $newPA,
                "as" => 'ea@epic',
            );
        } else {
            $transMessage = "Simpan Gagal!!";
            DB::rollBack();
            $result = array(
                "status" => 400,
                "as" => 'ea@epic',
            );
        }
        return $this->setStatusCode($result['status'])->respond($result, $transMessage);
    }

    public function getDaftarMasterPerencanaan(Request $request) {
        $kdProfile = $this->getDataKdProfile($request);
        $idProfile = (int) $kdProfile;
        $tahun = $request['tahun'];
        $data = \DB::table('perencanaananggaran_m as pa')
            ->select(DB::raw("
                pa.*,ss.reportdisplay AS satuanstandar,ka.kelompok
            "))
            ->leftJOIN('satuananggaran_m AS ss','ss.id','=','pa.satuan')
            ->JOIN('kelompokanggaran_m AS ka','ka.id','=','pa.turunan')
            ->where('pa.kdprofile',$idProfile)
            ->where('pa.statusenabled',true)
            ->where('pa.tahun', $tahun)
            ->where('pa.isaktif', true)
            ->orderBy('pa.kdrekening');


        if(isset($request['kdrekening']) && $request['kdrekening']!="" && $request['kdrekening']!="undefined"){
            $data = $data->where('pa.kdrekening','ilike',''. $request['kdrekening'].'%');
        }
        if(isset($request['mataanggaran']) && $request['mataanggaran']!="" && $request['mataanggaran']!="undefined"){
            $data = $data->where('pa.mataanggaran','ilike','%'. $request['mataanggaran'].'%');
        }
        if(isset($request['jmlRows']) && $request['jmlRows']!="" && $request['jmlRows']!="undefined"){
            $data = $data->take($request['jmlRows']);
        }
        $data = $data->get();
        return $this->respond($data);
    }

    public function HapusDataMasterAnggaran(Request $request) {
        $idProfile =  (int) $this->getDataKdProfile($request);
        DB::beginTransaction();
        $dataLogin = $request->all();
        try {

            $newPA =  PerencanaanAnggaran::where('id',$request['id'])
                      ->where('kdprofile', $idProfile)
                      ->update([
                          'statusenabled' => false,
                      ]);

            $transStatus = 'true';
        } catch (\Exception $e) {
            $transStatus = 'false';
            $transMessage = "Hapus Gagal";
        }

        if ($transStatus == 'true') {
            $transMessage = "Hapus Berhasil" ;
            DB::commit();
            $result = array(
                "status" => 201,
                "data" => $newPA,
                "as" => 'ea@epic',
            );
        } else {
            $transMessage = "Hapus Gagal!!";
            DB::rollBack();
            $result = array(
                "status" => 400,
                "as" => 'ea@epic',
            );
        }
        return $this->setStatusCode($result['status'])->respond($result, $transMessage);
    }

    public function SaveDataMasterAnggaranRevisi(Request $request) {
        $idProfile =  (int) $this->getDataKdProfile($request);
        DB::beginTransaction();
        $dataLogin = $request->all();
        try {
            if ($request['id'] == ''){
                $lasID =  PerencanaanAnggaran::max('id');
                $newID = $lasID + 1;

                $newPA = new PerencanaanAnggaran();
                $norecHead = $newPA->generateNewId();
                $newPA->id = $newID;
                $newPA->kdprofile = $idProfile;
                $newPA->norec = $norecHead;
                $newPA->statusenabled = true;
                $newPA->namaexternal = 'Master Anggaran';
            }else{
                $newPA =  PerencanaanAnggaran::where('id',$request['id'])->where('kdprofile', $idProfile)->first();
            }
                $newPA->kodeexternal = $request['kdrekening'];
                $newPA->kdrekening = $request['kdrekening'];
                $newPA->kode = $request['kdrekening'];
                $newPA->mataanggaran = $request['namaanggaran'];
                $newPA->tahun = $request['tahun'];
                $newPA->volume = $request['volume'];
                $newPA->satuan = $request['satuananggaran'];
                $newPA->pengendalifk = $request['statusenabled'];
                $newPA->hargasatuan = (float) ( str_replace(".","", $request['hargasatuan']));
                $newPA->saldoawalblu = (float) ( str_replace(".","", $request['saldoblud']));
                $newPA->revisi = $request['revisi'];
                $newPA->turunan = $request['turunan'];
                if (isset($request['keterangan'])){
                    $newPA->keterangan = $request['keterangan'];
                }
    //                $newPA->saldoawalrm = $request['salBlud'];
                $newPA->save();

            $lasIDr =  PerencanaanAnggaranRevisi::max('id');
            $newIDr = $lasIDr + 1;

            $newPAr = new PerencanaanAnggaranRevisi();
            $norecHeads = $newPAr->generateNewId();
            $newPAr->id = $newIDr;
            $newPAr->kdprofile = $idProfile;
            $newPAr->norec = $norecHeads;
            $newPAr->statusenabled = true;
            $newPAr->namaexternal = 'Revisi Master Anggaran';
            $newPAr->kodeexternal = $request['kdrekening'];
            $newPAr->kdrekening = $request['kdrekening'];
            $newPAr->kode = $request['kode'];
            $newPAr->mataanggaran = $request['namaanggaran'];
            $newPAr->tahun = $request['tahun'];
            $newPAr->volume = $request['volume'];
            $newPAr->satuan = $request['satuananggaran'];
            $newPAr->pengendalifk = $request['statusenabled'];
            $newPAr->hargasatuan = (float) ( str_replace(".","", $request['hargasatuan']));
            $newPAr->saldoawalblu = (float) ( str_replace(".","", $request['saldoblud']));
            $newPAr->revisi = $request['revisi'];
            $newPAr->turunan = $request['turunan'];
            if (isset($request['keterangan'])){
                $newPAr->keterangan = $request['keterangan'];
            }
            $newPAr->save();

//            $nilairevisi = $request['revisi'] - 1;
//            $dataUp = PerencanaanAnggaranRevisi::where('kdrekening', $request['kdrekening'])
//                                                ->where('statusenabled', true)
//                                                ->where('kdprofile', $idProfile)
//                                                ->where('revisike', $nilairevisi)
//                                                ->update([
//                                                    'isaktif' => false
//                                                ]);

            $transStatus = 'true';
        } catch (\Exception $e) {
            $transStatus = 'false';
            $transMessage = "Simpan Gagal";
        }

        if ($transStatus == 'true') {
            $transMessage = "Simpan Revisi Berhasil" ;
            DB::commit();
            $result = array(
                "status" => 201,
                "data" => $newPA,
                "as" => 'ea@epic',
            );
        } else {
            $transMessage = "Simpan Revisi Gagal!!";
            DB::rollBack();
            $result = array(
                "status" => 400,
                "as" => 'ea@epic',
            );
        }
        return $this->setStatusCode($result['status'])->respond($result, $transMessage);
    }

    public function getDaftarMasterPerencanaanRevisi(Request $request) {
        $kdProfile = $this->getDataKdProfile($request);
        $idProfile = (int) $kdProfile;
        $tahun = $request['tahun'];
        $dataAnggaran = \DB::table('perencanaananggaran_m as pa')
            ->select(DB::raw("
                pa.*,ss.reportdisplay AS satuanstandar
            "))
            ->leftJOIN('satuananggaran_m AS ss','ss.id','=','pa.satuan')
            ->where('pa.kdprofile',$idProfile)
            ->where('pa.statusenabled',true)
            ->where('pa.tahun', $tahun)
            ->orderBy('pa.kdrekening', 'ASC');
        $dataAnggaran = $dataAnggaran->get();

        $data = \DB::table('perencanaananggaran_revisi_m as pa')
            ->select(DB::raw("
                pa.*,ss.reportdisplay AS satuanstandar,false as beda
            "))
            ->leftJOIN('satuananggaran_m AS ss','ss.id','=','pa.satuan')
            ->where('pa.kdprofile',$idProfile)
            ->where('pa.statusenabled',true)
            ->where('pa.tahun', $tahun)
            ->orderBy('pa.kdrekening', 'ASC');

        if(isset($request['kdrekening']) && $request['kdrekening']!="" && $request['kdrekening']!="undefined"){
            $data = $data->where('pa.kdrekening','ilike',''. $request['kdrekening'].'%');
        }
        if(isset($request['mataanggaran']) && $request['mataanggaran']!="" && $request['mataanggaran']!="undefined"){
            $data = $data->where('pa.mataanggaran','ilike','%'. $request['mataanggaran'].'%');
        }
//        if(isset($request['jmlRows']) && $request['jmlRows']!="" && $request['jmlRows']!="undefined"){
//            $data = $data->take($request['jmlRows']);
//        }
        $data = $data->get();
//        $d[0]=$dataAnggaran;
//        $d[1]=$dataAnggaran;
//        dd($d);
        foreach ($data AS $items){
            foreach ($dataAnggaran AS $itemu){
                $beda = false;
                if ($items->kdrekening === $itemu->kdrekening && $items->revisi != $itemu->revisi){
                    if ($items->volume != $itemu->volume){
                        $beda = true;
                    }elseif ($items->hargasatuan != $itemu->hargasatuan){
                        $beda = true;
                    }elseif ($items->saldoawalblu != $itemu->saldoawalblu){
                        $beda = true;
                    }else{
                        $beda = false;
                    }
                }else{
                    $beda = true;
                }
            }

            $result[] = array(
                'id'=> $items->id,
                'kdrekening'=> $items->kdrekening,
                'kode'=> $items->kode,
                'mataanggaran'=> $items->mataanggaran,
                'volume'=> $items->volume,
                'satuan'=> $items->satuan,
                'satuanstandar'=> $items->satuanstandar,
                'hargasatuan'=> $items->hargasatuan,
                'saldoawalblu'=> $items->saldoawalblu,
                'turunan'=> $items->turunan,
                'revisi'=> $items->revisi,
                'beda'=> $beda,
            );
        }
        return $this->respond($result);
    }

    public function getDaftarRealisasiPerencanaan(Request $request) {
        $kdProfile = (int) $this->getDataKdProfile($request);
        $tahun = $request['tahun'];
        $paramKdRekening = "";
        if(isset($request['kdrekening']) && $request['kdrekening']!="" && $request['kdrekening']!="undefined"){
            $paramKdRekening = " AND pa.kdrekening ilike '%" . $request['kdrekening'] . "%'";
        }
        $paramMataAnggaran = "";
        if(isset($request['mataanggaran']) && $request['mataanggaran']!="" && $request['mataanggaran']!="undefined"){
            $paramKdRekening = " AND pa.mataanggaran ilike '%" . $request['mataanggaran'] . "%'";
        }
        $data = collect(DB::select("
            SELECT pa.id,pa.kdrekening,pa.kode,pa.turunan,pa.mataanggaran,pa.hargasatuan,pa.saldoawalblu,pa.volume,pa.satuan,sa.reportdisplay AS satuananggaran
            FROM perencanaananggaran_m AS pa
            LEFT JOIN satuananggaran_m AS sa ON sa.id = pa.satuan
            WHERE pa.kdprofile = $kdProfile AND pa.statusenabled = true AND pa.tahun = '$tahun' AND pa.isaktif = true
            $paramKdRekening
            $paramMataAnggaran
        "));

        $realisasi = collect(DB::select("
            SELECT pa.id,pa.kdrekening,pa.kode,pa.turunan,pa.mataanggaran,pa.volume,pa.satuan,sa.reportdisplay AS satuananggaran,
                    SUM(rp.jumlah) AS jumlah
            FROM realisasiperencanaan_t AS rp 
            INNER JOIN perencanaananggaran_m AS pa ON pa.kdrekening = rp.kdrekening
            LEFT JOIN satuananggaran_m AS sa ON sa.id = pa.satuan
            WHERE pa.kdprofile = $kdProfile AND pa.statusenabled = true 
            AND rp.statusenabled = true
            AND pa.tahun = '$tahun'
            AND pa.isaktif = true
            $paramKdRekening
            $paramMataAnggaran
            GROUP BY pa.id,pa.kdrekening,pa.kode,pa.turunan,pa.mataanggaran,pa.volume,pa.satuan,sa.reportdisplay
        "));

//        $result=[];
        foreach ($data as $item){
            $nilaiRealisasi = 0;
            $total = 0;
            $satuan = 1;
            $tothargasatuan = 0;
            foreach ($realisasi as $real) {
                if ($item->id == $real->id) {
                    $nilaiRealisasi = (float)$real->jumlah;
                }
            }
            if ($item->volume != null){
                $satuan = (float)$item->volume;
                $tothargasatuan = $satuan * (float) $item->hargasatuan;
            }else{
                $tothargasatuan = (float)$item->saldoawalblu;
            }
            $total = $tothargasatuan - $nilaiRealisasi;
            $result[] = array(
                'id' => $item->id,
                'kdrekening' => $item->kdrekening,
                'kode' => $item->kode,
                'turunan' => $item->turunan,
                'mataanggaran' => $item->mataanggaran,
                'volume' => $item->volume,
                'satuananggaran' => $item->satuananggaran,
                'hargasatuan' => (float)$item->hargasatuan,
                'saldoawalblu' => (float)$item->saldoawalblu,
                'realiasi' => $nilaiRealisasi,
                'jumlah' => $tothargasatuan,
                'total' => $total
            );
        }
        return $this->respond($result);
    }
}