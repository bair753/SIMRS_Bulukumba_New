<?php

/**
 * Created by PhpStorm.
 * User: as@epic
 * Date: 19/02/2019
 * Time: 14.54
 */

namespace App\Http\Controllers\Bridging;

use Carbon\Carbon;
use App\Http\Controllers\ApiController;
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
use Illuminate\Http\Request;
use App\Transaksi\DiagnosaPasien;
use App\Transaksi\DetailDiagnosaPasien;
use App\Transaksi\DetailDiagnosaTindakanPasien;
use App\Transaksi\DiagnosaTindakanPasien;
use App\Traits\Valet;
use phpDocumentor\Reflection\Types\Null_;
use Webpatser\Uuid\Uuid;
use Illuminate\Support\Str;
// use Illuminate\Support\Facades\DB;


class DiagnosaIdrGController   extends ApiController
{

    use Valet;

    public function __construct()
    {
        parent::__construct($skip_authentication = false);
    }

    public function getDiagnosaIcdInacbgTen(Request $request)
    {
        $req = $request->all();
        $icdIX = \DB::table('diagnosa_inacbg_new_m as dg')
            ->select('dg.id', 'dg.code', 'dg.nama_diagnosa', 'dg.valid_code', 'dg.casemix_code')
            ->where('dg.statusenabled', true);

        if (
            isset($req['filter']['filters'][0]['value']) &&
            $req['filter']['filters'][0]['value'] != "" &&
            $req['filter']['filters'][0]['value'] != "undefined"
        ) {
            $icdIX = $icdIX->where(function ($q) use ($req) {
                $q->where('dg.nama_diagnosa', 'ilike', '%' . $req['filter']['filters'][0]['value'] . '%')
                    ->orWhere('dg.casemix_code', 'ilike', $req['filter']['filters'][0]['value'] . '%');
            });
        }
        $icdIX = $icdIX->orderBy('dg.code');
        $icdIX = $icdIX->where('dg.system', 'ICD_10_2010');
        $icdIX = $icdIX->take(10);
        $icdIX = $icdIX->get();

        $data = [];
        if (count($icdIX) > 0) {
            foreach ($icdIX as $item) {
                $nama = $item->nama_diagnosa;
                $data[] = array(
                    'kodeNama' => $item->code . ' - ' . $nama,
                    'id' => $item->id,
                    'kdDiagnosa' => $item->code,
                    'namaDiagnosa' => $item->nama_diagnosa,
                    'valid_code' => $item->valid_code,
                );
            }
        }

        return $this->respond($data);
    }

    public function getDiagnosaIcdNenInacbg(Request $request)
    {
        $req = $request->all();
        $icdIX = \DB::table('diagnosa_inacbg_new_m as dg')
            ->select('dg.id', 'dg.code', 'dg.nama_diagnosa', 'dg.valid_code', 'dg.casemix_code')
            ->where('dg.statusenabled', true);


        if (
            isset($req['filter']['filters'][0]['value']) &&
            $req['filter']['filters'][0]['value'] != "" &&
            $req['filter']['filters'][0]['value'] != "undefined"
        ) {
            $icdIX = $icdIX->where(function ($q) use ($req) {
                $q->where('dg.nama_diagnosa', 'ilike', '%' . $req['filter']['filters'][0]['value'] . '%')
                    ->orWhere('dg.casemix_code', 'ilike', $req['filter']['filters'][0]['value'] . '%');
            });
        }
        $icdIX = $icdIX->orderBy('dg.code');
        $icdIX = $icdIX->where('dg.system', 'ICD_9CM_2010');
        $icdIX = $icdIX->take(10);
        $icdIX = $icdIX->get();

        $data = [];
        if (count($icdIX) > 0) {
            foreach ($icdIX as $item) {
                $data[] = array(
                    'kodeNama' => $item->code . ' - ' . $item->nama_diagnosa,
                    'id' => $item->id,
                    'kdDiagnosa' => $item->code,
                    'namaDiagnosa' => $item->nama_diagnosa,
                    'valid_code' => $item->valid_code,

                );
            }
        }

        return $this->respond($data);
    }

    public function getDiagnosaIcdTen(Request $request)
    {
        $req = $request->all();
        $icdIX = \DB::table('diagnosa_idrg_new_m as dg')
            ->select('dg.id', 'dg.code', 'dg.nama_diagnosa', 'dg.valid_code', 'dg.accpdx', 'dg.asterisk', 'dg.im', 'dg.casemix_code')
            ->where('dg.statusenabled', true);

        if (
            isset($req['filter']['filters'][0]['value']) &&
            $req['filter']['filters'][0]['value'] != "" &&
            $req['filter']['filters'][0]['value'] != "undefined"
        ) {
            $icdIX = $icdIX->where(function ($q) use ($req) {
                $q->where('dg.nama_diagnosa', 'ilike', '%' . $req['filter']['filters'][0]['value'] . '%')
                    ->orWhere('dg.casemix_code', 'ilike', $req['filter']['filters'][0]['value'] . '%');
            });
        }
        $icdIX = $icdIX->orderBy('dg.code');
        $icdIX = $icdIX->where('dg.system', 'ICD_10_2010_IM');
        $icdIX = $icdIX->take(10);
        $icdIX = $icdIX->get();

        $data = [];
        if (count($icdIX) > 0) {
            foreach ($icdIX as $item) {
                $nama = $item->nama_diagnosa;
                if ($item->asterisk) {
                    $nama .= ' ( * )';
                }
                $data[] = array(
                    // 'kodeNama' => $item->code . ' - ' . $item->nama_diagnosa,
                    'kodeNama' => $item->code . ' - ' . $nama,
                    'id' => $item->id,
                    'kdDiagnosa' => $item->code,
                    'namaDiagnosa' => $item->nama_diagnosa,
                    'valid_code' => $item->valid_code,
                    'accpdx' => $item->accpdx,
                    'asterisk' => $item->asterisk,
                    'im' => $item->im,

                );
            }
        }

        return $this->respond($data);
    }

    public function getDiagnosaIcdNen(Request $request)
    {
        $req = $request->all();
        $icdIX = \DB::table('diagnosa_idrg_new_m as dg')
            ->select('dg.id', 'dg.code', 'dg.nama_diagnosa', 'dg.valid_code', 'dg.accpdx', 'dg.asterisk', 'dg.im', 'dg.casemix_code')
            ->where('dg.statusenabled', true);


        if (
            isset($req['filter']['filters'][0]['value']) &&
            $req['filter']['filters'][0]['value'] != "" &&
            $req['filter']['filters'][0]['value'] != "undefined"
        ) {
            $icdIX = $icdIX->where(function ($q) use ($req) {
                $q->where('dg.nama_diagnosa', 'ilike', '%' . $req['filter']['filters'][0]['value'] . '%')
                    ->orWhere('dg.casemix_code', 'ilike', $req['filter']['filters'][0]['value'] . '%');
            });
        }
        $icdIX = $icdIX->orderBy('dg.code');
        $icdIX = $icdIX->where('dg.system', 'ICD_9CM_2010_IM');
        $icdIX = $icdIX->take(10);
        $icdIX = $icdIX->get();

        $data = [];
        if (count($icdIX) > 0) {
            foreach ($icdIX as $item) {
                $data[] = array(
                    'kodeNama' => $item->code . ' - ' . $item->nama_diagnosa,
                    'id' => $item->id,
                    'kdDiagnosa' => $item->code,
                    'namaDiagnosa' => $item->nama_diagnosa,
                    'valid_code' => $item->valid_code,
                    'accpdx' => $item->accpdx,
                    'asterisk' => $item->asterisk,
                    'im' => $item->im,

                );
            }
        }

        return $this->respond($data);
    }


    public function getDiagnosaIcdO(Request $request)
    {
        $req = $request->all();
        $icdIX = \DB::table('diagnosa_idrg_new_m as dg')
            ->select('dg.id', 'dg.code', 'dg.nama_diagnosa', 'dg.valid_code', 'dg.accpdx', 'dg.asterisk', 'dg.im', 'dg.casemix_code')
            ->where('dg.statusenabled', true);


        if (
            isset($req['filter']['filters'][0]['value']) &&
            $req['filter']['filters'][0]['value'] != "" &&
            $req['filter']['filters'][0]['value'] != "undefined"
        ) {
            $icdIX = $icdIX->where(function ($q) use ($req) {
                $q->where('dg.nama_diagnosa', 'ilike', '%' . $req['filter']['filters'][0]['value'] . '%')
                    ->orWhere('dg.casemix_code', 'ilike', $req['filter']['filters'][0]['value'] . '%');
            });
        }
        $icdIX = $icdIX->orderBy('dg.code');
        $icdIX = $icdIX->where('dg.system', 'ICD_O_MORFOLOGY');
        $icdIX = $icdIX->take(10);
        $icdIX = $icdIX->get();

        $data = [];
        if (count($icdIX) > 0) {
            foreach ($icdIX as $item) {
                $data[] = array(
                    'kodeNama' => $item->code . ' - ' . $item->nama_diagnosa,
                    'id' => $item->id,
                    'kdDiagnosa' => $item->code,
                    'namaDiagnosa' => $item->nama_diagnosa,
                    'valid_code' => $item->valid_code,
                    'accpdx' => $item->accpdx,
                    'asterisk' => $item->asterisk,
                    'im' => $item->im,

                );
            }
        }

        return $this->respond($data);
    }


    public function saveDiagnosaPasienInacbg(Request $request)
    {
        $dataLogin = $request->all();
        $kdProfile = $this->getDataKdProfile($request);
        $idProfile = (int) $kdProfile;
        DB::beginTransaction();
        $dataPegawaiUser = DB::select(
            DB::raw("select pg.id,pg.namalengkap from loginuser_s as lu
                    INNER JOIN pegawai_m as pg on lu.objectpegawaifk=pg.id
                    where pg.kdprofile = $idProfile and lu.id=:idLoginUser"),
            array(
                'idLoginUser' => $dataLogin['userData']['id'],
            )
        );
        $datadd = null;

        if ($request['detaildiagnosapasien']['norec_dp'] == '' && $request['detaildiagnosapasien']['norec_ddp'] == '') {
            $dataDiagnosa = new DiagnosaPasien();
            $dataDiagnosa->norec = $dataDiagnosa->generateNewId();
            $dataDiagnosa->kdprofile = $idProfile;
            $dataDiagnosa->statusenabled = true;
        } else {
            $datadd = DetailDiagnosaPasien::where('norec', $request['detaildiagnosapasien']['norec_ddp'])->first();
            
            $dataDiagnosa = DiagnosaPasien::where('norec', $datadd->objectdiagnosapasienfk)->first();
        }
        $dataDiagnosa->noregistrasifk = $request['detaildiagnosapasien']['noregistrasifk'];
        
        $dataDiagnosa->ketdiagnosis = 'Diagnosa Pasien';
        $dataDiagnosa->tglregistrasi = null;
        $dataDiagnosa->tglpendaftaran = $request['detaildiagnosapasien']['tglregistrasi'];
        if (isset($request['detaildiagnosapasien']['kasusbaru'])) {
            $dataDiagnosa->iskasusbaru = $request['detaildiagnosapasien']['kasusbaru'];
        }
        if (isset($request['detaildiagnosapasien']['kasuslama'])) {
            $dataDiagnosa->iskasuslama = $request['detaildiagnosapasien']['kasuslama'];
        }
        try {
            $dataDiagnosa->save();
            $transStatus = 'true';
        } catch (\Exception $e) {
            $transStatus = 'false';
            $transMessage = "simpan Diagnosa Baru" . $e->getMessage();
        }

        if ($request['detaildiagnosapasien']['norec_dp'] == '' &&
            $request['detaildiagnosapasien']['norec_ddp'] == '') {

            // BARU → buat object baru
            $dataDetailDiagnosa = new DetailDiagnosaPasien();
            $dataDetailDiagnosa->norec = $dataDetailDiagnosa->generateNewId();
            $dataDetailDiagnosa->kdprofile = $idProfile;
            $dataDetailDiagnosa->statusenabled = true;
            $dataDetailDiagnosa->objectpegawaifk = $dataPegawaiUser[0]->id;
            $dataDetailDiagnosa->tglinputdiagnosa = date('Y-m-d H:i:s');

        } else {

            // EDIT → load object lama
            $dataDetailDiagnosa = DetailDiagnosaPasien::where(
                'norec',
                $request['detaildiagnosapasien']['norec_ddp']
            )->first();

        // dd( $request['detaildiagnosapasien']['objectdiagnosafk']);
            if (!$dataDetailDiagnosa) {
                return response()->json(['error' => 'Detail diagnosa tidak ditemukan'], 404);
            }

            // tglinput tetap pakai yang lama
            // $dataDetailDiagnosa->tglinputdiagnosa sudah ada dari DB, jadi tidak perlu diset ulang
        }

        
        $dataDetailDiagnosa->noregistrasifk = $request['detaildiagnosapasien']['noregistrasifk'];
        $dataDetailDiagnosa->tglregistrasi = $request['detaildiagnosapasien']['tglregistrasi'];
        $dataDetailDiagnosa->norec = $dataDetailDiagnosa->generateNewId();
        $dataDetailDiagnosa->diagnosa_idrg_id = null;
        $dataDetailDiagnosa->objectdiagnosapasienfk = $dataDiagnosa->norec;
        $dataDiagnosaina = DB::table('diagnosa_inacbg_new_m')->where('id', $request['detaildiagnosapasien']['objectdiagnosafk'])->first();

        $dataDiagnosainaa = null;
        // dd($dataDiagnosaina->code);
        if ($dataDiagnosaina && $dataDiagnosaina->code) {
            $dataDiagnosainaa = DB::table('diagnosa_idrg_new_m')
                ->where('code', $dataDiagnosaina->code)
                ->first();
            $dataDiagnosai = DB::table('diagnosa_m')
                ->where('kddiagnosa', $dataDiagnosaina->code)
                ->first();
        }

        if (!is_null($dataDiagnosainaa)) {
            $dataDetailDiagnosa->diagnosa_idrg_id = $dataDiagnosainaa->id;
            $dataDetailDiagnosa->objectdiagnosafk = $dataDiagnosai->id;
            // dd($request['detaildiagnosapasien']['objectdiagnosafk']);
            $dataDetailDiagnosa->diagnosa_inacbg_id = $request['detaildiagnosapasien']['objectdiagnosafk'];
        } else {
            $dataDetailDiagnosa->objectdiagnosafk = null;
        }


        $dataDetailDiagnosa->objectjenisdiagnosafk = $request['detaildiagnosapasien']['objectjenisdiagnosafk'];


        // $dataDetailDiagnosa->tglinputdiagnosa = date('Y-m-d H:i:s'); //$request['detaildiagnosapasien']['tglinputdiagnosa'];
        $dataDetailDiagnosa->keterangan = $request['detaildiagnosapasien']['keterangan'];
        $dataDetailDiagnosa->objectpegawaifk = $dataPegawaiUser[0]->id; // $this->getCurrentLoginID();

        $errMsg = "";
        try {
            $dataDetailDiagnosa->save();
            $transStatus = 'true';
        } catch (\Exception $e) {
            $transStatus = 'false';
            $transMessage = "simpan Pasien Baru";
            $errMsg = $e->getMessage();
        }

        if ($transStatus == 'true') {
            $transMessage = "Data Tersimpan";
            DB::commit();
            $result = array(
                'status' => 201,
                'message' => $transMessage,
                'data' => $dataDiagnosa,
                'as' => 'egie@ramdan',
            );
        } else {
            $transMessage = "Data Gagal Disimpan";
            DB::rollBack();
            $result = array(
                'status' => 400,
                'message' => $transMessage,
                'errMsg' => $errMsg,
                'data' => $dataDiagnosa,
                'as' => 'egie@ramdan',
            );
        }
        return $this->setStatusCode($result['status'])->respond($result, $transMessage);
    }

    public function saveDiagnosaPasienIdrg(Request $request)
    {
        $dataLogin = $request->all();
        $kdProfile = $this->getDataKdProfile($request);
        $idProfile = (int) $kdProfile;
        DB::beginTransaction();
        $dataPegawaiUser = DB::select(
            DB::raw("select pg.id,pg.namalengkap from loginuser_s as lu
                    INNER JOIN pegawai_m as pg on lu.objectpegawaifk=pg.id
                    where pg.kdprofile = $idProfile and lu.id=:idLoginUser"),
            array(
                'idLoginUser' => $dataLogin['userData']['id'],
            )
        );

        $datadd = null;

        if ($request['detaildiagnosapasien']['norec_dp'] == '' && $request['detaildiagnosapasien']['norec_ddp'] == '') {
            $dataDiagnosa = new DiagnosaPasien();
            $dataDiagnosa->norec = $dataDiagnosa->generateNewId();
            $dataDiagnosa->kdprofile = $idProfile;
            $dataDiagnosa->statusenabled = true;
        } else {
            $datadd = DetailDiagnosaPasien::where('norec', $request['detaildiagnosapasien']['norec_ddp'])->first();
            $dataDiagnosa = DiagnosaPasien::where('norec', $datadd->objectdiagnosapasienfk)->first();
        }
        
        $dataDiagnosa->noregistrasifk = $request['detaildiagnosapasien']['noregistrasifk'];
        $dataDiagnosa->ketdiagnosis = 'Diagnosa Pasien';
        $dataDiagnosa->tglregistrasi = null;
        $dataDiagnosa->tglpendaftaran = $request['detaildiagnosapasien']['tglregistrasi'];
        if (isset($request['detaildiagnosapasien']['kasusbaru'])) {
            $dataDiagnosa->iskasusbaru = $request['detaildiagnosapasien']['kasusbaru'];
        }
        if (isset($request['detaildiagnosapasien']['kasuslama'])) {
            $dataDiagnosa->iskasuslama = $request['detaildiagnosapasien']['kasuslama'];
        }
        try {
            $dataDiagnosa->save();
            $transStatus = 'true';
        } catch (\Exception $e) {
            $transStatus = 'false';
            $transMessage = "simpan Diagnosa Baru" . $e->getMessage();
        }


        if ($request['detaildiagnosapasien']['norec_dp'] == '' && $request['detaildiagnosapasien']['norec_ddp'] == '') {
            $dataDetailDiagnosa = new DetailDiagnosaPasien();
            $dataDetailDiagnosa->norec = $dataDetailDiagnosa->generateNewId();
            $dataDetailDiagnosa->kdprofile = $idProfile;
            $dataDetailDiagnosa->statusenabled = true;
            $dataDetailDiagnosa->objectpegawaifk = $dataPegawaiUser[0]->id; // $this->getCurrentLoginID();

        } else {
            $dataDetailDiagnosa = DetailDiagnosaPasien::where('norec', $request['detaildiagnosapasien']['norec_ddp'])->first();
        }
        
        $dataDetailDiagnosa->noregistrasifk = $request['detaildiagnosapasien']['noregistrasifk'];
        $dataDetailDiagnosa->tglregistrasi = $request['detaildiagnosapasien']['tglregistrasi'];
        $dataDetailDiagnosa->norec = $dataDetailDiagnosa->generateNewId();
        $dataDetailDiagnosa->diagnosa_idrg_id = $request['detaildiagnosapasien']['objectdiagnosafk'];
        $dataDetailDiagnosa->objectdiagnosapasienfk = $dataDiagnosa->norec;
        $dataDetailDiagnosa->objectjenisdiagnosafk = $request['detaildiagnosapasien']['objectjenisdiagnosafk'];
        // $dataDetailDiagnosa->objectdiagnosafk = $request['detaildiagnosapasien']['objectdiagnosafk'];
        if($datadd){
            $dataDetailDiagnosa->tglinputdiagnosa = $datadd->tglinputdiagnosa;
        }else{
            $dataDetailDiagnosa->tglinputdiagnosa = date('Y-m-d H:i:s'); //$request['detaildiagnosapasien']['tglinputdiagnosa'];
        }
        
        $dataDetailDiagnosa->keterangan = $request['detaildiagnosapasien']['keterangan'];
        $dataDetailDiagnosa->objectpegawaifk = $dataPegawaiUser[0]->id; // $this->getCurrentLoginID();

        $errMsg = "";
        try {
            $dataDetailDiagnosa->save();
            $transStatus = 'true';
        } catch (\Exception $e) {
            $transStatus = 'false';
            $transMessage = "simpan Pasien Baru";
            $errMsg = $e->getMessage();
        }

        if ($transStatus == 'true') {
            $transMessage = "Data Tersimpan";
            DB::commit();
            $result = array(
                'status' => 201,
                'message' => $transMessage,
                'data' => $dataDiagnosa,
                'as' => 'egie@ramdan',
            );
        } else {
            $transMessage = "Data Gagal Disimpan";
            DB::rollBack();
            $result = array(
                'status' => 400,
                'message' => $transMessage,
                'errMsg' => $errMsg,
                'data' => $dataDiagnosa,
                'as' => 'egie@ramdan',
            );
        }
        return $this->setStatusCode($result['status'])->respond($result, $transMessage);
    }

    public function saveDiagnosaTindakanPasienIdrg(Request $request)
    {
        $dataLogin = $request->all();
        $kdProfile = $this->getDataKdProfile($request);
        $idProfile = (int) $kdProfile;
        DB::beginTransaction();
        $dataPegawaiUser = DB::select(
            DB::raw("select pg.id,pg.namalengkap from loginuser_s as lu
                INNER JOIN pegawai_m as pg on lu.objectpegawaifk=pg.id
                where lu.id=:idLoginUser and pg.kdprofile = $idProfile"),
            array(
                'idLoginUser' => $dataLogin['userData']['id'],
            )
        );

        //        try{
        if ($request['detaildiagnosatindakanpasien']['norec_dp'] == '') {
            $dataDiagnosa = new DiagnosaTindakanPasien();
            $dataDiagnosa->norec = $dataDiagnosa->generateNewId();
            $dataDiagnosa->kdprofile = $idProfile;
            $dataDiagnosa->statusenabled = true;
        } else {
            $dataDiagnosa = DiagnosaTindakanPasien::where('norec', $request['detaildiagnosatindakanpasien']['norec_dp'])->first();
        }
        $dataDiagnosa->objectpasienfk = $request['detaildiagnosatindakanpasien']['objectpasienfk'];
        $dataDiagnosa->tglpendaftaran = $request['detaildiagnosatindakanpasien']['tglpendaftaran'];


        try {
            $dataDiagnosa->save();
            $transStatus = 'true';
        } catch (\Exception $e) {
            $transStatus = 'false';
            $transMessage = "simpan Diagnosa Baru";
        }


        if ($request['detaildiagnosatindakanpasien']['norec_dp'] == '') {
            $dataDetailDiagnosa = new DetailDiagnosaTindakanPasien();
            $dataDetailDiagnosa->norec = $dataDetailDiagnosa->generateNewId();
            $dataDetailDiagnosa->kdprofile = $idProfile;
            $dataDetailDiagnosa->statusenabled = true;
            $dataDetailDiagnosa->objectpegawaifk = $dataPegawaiUser[0]->id; // $this->getCurrentLoginID();
            if (isset($request['detaildiagnosatindakanpasien']['ketdiagnosa'])) {
                $dataDetailDiagnosa->ketdiagnosa = $request['detaildiagnosatindakanpasien']['ketdiagnosa'];
            }
        } else {
            $dataDetailDiagnosa = DetailDiagnosaTindakanPasien::where('objectdiagnosatindakanpasienfk', $request['detaildiagnosatindakanpasien']['norec_dp'])->first();
        }

        $dataDetailDiagnosa->diagnosa_idrg_id = $request['detaildiagnosatindakanpasien']['objectdiagnosatindakanfk'];
        // $dataDetailDiagnosa->diagnosa_inacbg_id = $request['detaildiagnosatindakanpasien']['objectdiagnosatindakanfk'];
        $dataDetailDiagnosa->objectjenisdiagnosafk = $request['detaildiagnosatindakanpasien']['objectjenisdiagnosafk'];
        // $dataDetailDiagnosa->multiplicity = $request['detaildiagnosatindakanpasien']['multiplicity'];
        if (isset($request['detaildiagnosatindakanpasien']['multiplicity'])) {
            $dataDetailDiagnosa->multiplicity = $request['detaildiagnosatindakanpasien']['multiplicity'];
        }
        $dataDetailDiagnosa->objectdiagnosatindakanpasienfk = $dataDiagnosa->norec;
        $dataDetailDiagnosa->jumlah = null;
        $dataDetailDiagnosa->objectpegawaifk = $dataPegawaiUser[0]->id; // $this->getCurrentLoginID()

        if (isset($request['detaildiagnosatindakanpasien']['keterangantindakan'])) {
            $dataDetailDiagnosa->keterangantindakan = $request['detaildiagnosatindakanpasien']['keterangantindakan'];
        }

        $dataDetailDiagnosa->tglinputdiagnosa = date('Y-m-d H:i:s');

        try {
            $dataDetailDiagnosa->save();
            $transStatus = 'true';
        } catch (\Exception $e) {
            $transStatus = 'false';
            $transMessage = "simpan Pasien Baru";
        }

        if ($transStatus == 'true') {
            $transMessage = "Data Tersimpan";
            DB::commit();
            $result = array(
                'status' => 201,
                'message' => $transMessage,
                'data' => $dataDiagnosa,
                'as' => 'egie@ramdan',
            );
        } else {
            $transMessage = "Data Gagal Disimpan";
            DB::rollBack();
            $result = array(
                'status' => 400,
                'message' => $transMessage,
                'data' => $dataDiagnosa,
                'as' => 'egie@ramdan',
            );
        }
        return $this->setStatusCode($result['status'])->respond($result, $transMessage);
    }
    public function saveDiagnosaTindakanPasienInaCbg(Request $request)
    {
        $dataLogin = $request->all();
        $kdProfile = $this->getDataKdProfile($request);
        $idProfile = (int) $kdProfile;
        DB::beginTransaction();
        $dataPegawaiUser = DB::select(
            DB::raw("select pg.id,pg.namalengkap from loginuser_s as lu
                INNER JOIN pegawai_m as pg on lu.objectpegawaifk=pg.id
                where lu.id=:idLoginUser and pg.kdprofile = $idProfile"),
            array(
                'idLoginUser' => $dataLogin['userData']['id'],
            )
        );

        //        try{
        if ($request['detaildiagnosatindakanpasien']['norec_dp'] == '') {
            $dataDiagnosa = new DiagnosaTindakanPasien();
            $dataDiagnosa->norec = $dataDiagnosa->generateNewId();
            $dataDiagnosa->kdprofile = $idProfile;
            $dataDiagnosa->statusenabled = true;
        } else {
            $dataDiagnosa = DiagnosaTindakanPasien::where('norec', $request['detaildiagnosatindakanpasien']['norec_dp'])->first();
        }
        $dataDiagnosa->objectpasienfk = $request['detaildiagnosatindakanpasien']['objectpasienfk'];
        $dataDiagnosa->tglpendaftaran = $request['detaildiagnosatindakanpasien']['tglpendaftaran'];


        try {
            $dataDiagnosa->save();
            $transStatus = 'true';
        } catch (\Exception $e) {
            $transStatus = 'false';
            $transMessage = "simpan Diagnosa Baru";
        }


        if ($request['detaildiagnosatindakanpasien']['norec_dp'] == '') {
            $dataDetailDiagnosa = new DetailDiagnosaTindakanPasien();
            $dataDetailDiagnosa->norec = $dataDetailDiagnosa->generateNewId();
            $dataDetailDiagnosa->kdprofile = $idProfile;
            $dataDetailDiagnosa->statusenabled = true;
            $dataDetailDiagnosa->objectpegawaifk = $dataPegawaiUser[0]->id; // $this->getCurrentLoginID();
            if (isset($request['detaildiagnosatindakanpasien']['ketdiagnosa'])) {
                $dataDetailDiagnosa->ketdiagnosa = $request['detaildiagnosatindakanpasien']['ketdiagnosa'];
            }
        } else {
            $dataDetailDiagnosa = DetailDiagnosaTindakanPasien::where('objectdiagnosatindakanpasienfk', $request['detaildiagnosatindakanpasien']['norec_dp'])->first();
        }

        $dataDetailDiagnosa->diagnosa_idrg_id = null;
        $dataDetailDiagnosa->diagnosa_inacbg_id = $request['detaildiagnosatindakanpasien']['objectdiagnosatindakanfk'];
        $dataDetailDiagnosa->objectjenisdiagnosafk = $request['detaildiagnosatindakanpasien']['objectjenisdiagnosafk'];
        // $dataDetailDiagnosa->multiplicity = $request['detaildiagnosatindakanpasien']['multiplicity'];
        if (isset($request['detaildiagnosatindakanpasien']['multiplicity'])) {
            $dataDetailDiagnosa->multiplicity = $request['detaildiagnosatindakanpasien']['multiplicity'];
        }
        $dataDetailDiagnosa->objectdiagnosatindakanpasienfk = $dataDiagnosa->norec;
        $dataDetailDiagnosa->jumlah = null;
        $dataDetailDiagnosa->objectpegawaifk = $dataPegawaiUser[0]->id; // $this->getCurrentLoginID()

        if (isset($request['detaildiagnosatindakanpasien']['keterangantindakan'])) {
            $dataDetailDiagnosa->keterangantindakan = $request['detaildiagnosatindakanpasien']['keterangantindakan'];
        }

        $dataDetailDiagnosa->tglinputdiagnosa = date('Y-m-d H:i:s');

        try {
            $dataDetailDiagnosa->save();
            $transStatus = 'true';
        } catch (\Exception $e) {
            $transStatus = 'false';
            $transMessage = "simpan Pasien Baru";
        }

        if ($transStatus == 'true') {
            $transMessage = "Data Tersimpan";
            DB::commit();
            $result = array(
                'status' => 201,
                'message' => $transMessage,
                'data' => $dataDiagnosa,
                'as' => 'egie@ramdan',
            );
        } else {
            $transMessage = "Data Gagal Disimpan";
            DB::rollBack();
            $result = array(
                'status' => 400,
                'message' => $transMessage,
                'data' => $dataDiagnosa,
                'as' => 'egie@ramdan',
            );
        }
        return $this->setStatusCode($result['status'])->respond($result, $transMessage);
    }

    public function saveDiagnosaPasienIdrgImport(Request $request)
    {
        $dataLogin = $request->all();
        $kdProfile = $this->getDataKdProfile($request);
        $idProfile = (int) $kdProfile;
        DB::beginTransaction();
        $dataPegawaiUser = DB::select(
            DB::raw("select pg.id,pg.namalengkap from loginuser_s as lu
                    INNER JOIN pegawai_m as pg on lu.objectpegawaifk=pg.id
                    where pg.kdprofile = $idProfile and lu.id=:idLoginUser"),
            array(
                'idLoginUser' => $dataLogin['userData']['id'],
            )
        );

        // return $this->respond($dataPegawaiUser);

        $result = array(
            'status' => 400,
            'as' => 'madep',
        );
        $transMessage = "Data Gagal Disimpan";

        $diagnosaImported = $this->getDiagnosaImportedIcd10($request['detaildiagnosapasien']['no_registrasi']);
        $data = $diagnosaImported->getContent();
        $decodedData = json_decode($data, true);
        if (is_array($decodedData) && count($decodedData) > 0) {
            foreach ($decodedData as $item) {
                // hapus berdasarkan norec_detaildpasien
                if (!empty($item['norec_detaildpasien'])) {
                    $detail = DetailDiagnosaPasien::where('norec', $item['norec_detaildpasien'])->first();
                    if ($detail) {
                        $detail->delete();
                    }
                }
            }
        }

        // Hindari duplikat id_diagnosa
        $processedIds = [];

        foreach ($request['detaildiagnosapasien']['data'] as $key => $d) {
            if (in_array($d['id_diagnosa'], $processedIds)) {
                continue; // skip duplikat
            }
            $processedIds[] = $d['id_diagnosa'];

            $dataDiagnosa = new DiagnosaPasien();
            $dataDiagnosa->norec = $dataDiagnosa->generateNewId();
            $dataDiagnosa->kdprofile = $idProfile;
            $dataDiagnosa->statusenabled = true;
            $dataDiagnosa->noregistrasifk = $request['detaildiagnosapasien']['noregistrasifk'];
            $dataDiagnosa->ketdiagnosis = 'Diagnosa Pasien';
            $dataDiagnosa->tglregistrasi = null;
            $dataDiagnosa->tglpendaftaran = $request['detaildiagnosapasien']['tglregistrasi'];
            if (isset($request['detaildiagnosapasien']['kasusbaru'])) {
                $dataDiagnosa->iskasusbaru = $request['detaildiagnosapasien']['kasusbaru'];
            }
            if (isset($request['detaildiagnosapasien']['kasuslama'])) {
                $dataDiagnosa->iskasuslama = $request['detaildiagnosapasien']['kasuslama'];
            }
            try {
                $dataDiagnosa->save();
                $transStatus = 'true';
            } catch (\Exception $e) {
                $transStatus = 'false';
                $transMessage = "simpan Diagnosa Baru";
            }

            $dataDetailDiagnosa = new DetailDiagnosaPasien();
            $dataDetailDiagnosa->norec = $dataDetailDiagnosa->generateNewId();
            $dataDetailDiagnosa->kdprofile = $idProfile;
            $dataDetailDiagnosa->statusenabled = true;
            $dataDetailDiagnosa->objectpegawaifk = $dataPegawaiUser[0]->id; // $this->getCurrentLoginID();
            $dataDetailDiagnosa->noregistrasifk = $request['detaildiagnosapasien']['noregistrasifk'];
            $dataDetailDiagnosa->tglregistrasi = $request['detaildiagnosapasien']['tglregistrasi'];
            $dataDetailDiagnosa->norec = $dataDetailDiagnosa->generateNewId();
            $dataDetailDiagnosa->diagnosa_idrg_id = $d['id_diagnosa'];
            $dataDetailDiagnosa->objectdiagnosapasienfk = $dataDiagnosa->norec;
            // if ($d['jd_id'] == 1) {
            //     $dataDetailDiagnosa->objectjenisdiagnosafk = 7;
            // } else {
            //     $dataDetailDiagnosa->objectjenisdiagnosafk = 8;
            // }
            $dataDetailDiagnosa->objectjenisdiagnosafk = $d['jd_id'];
            $dataDetailDiagnosa->tglinputdiagnosa = date('Y-m-d H:i:s'); //$request['detaildiagnosapasien']['tglinputdiagnosa'];
            if (isset($request['detaildiagnosapasien']['keterangan'])) {
                $dataDetailDiagnosa->keterangan = $request['detaildiagnosapasien']['keterangan'];
            }

            if (isset($d['keterangan'])) {
                $dataDetailDiagnosa->keterangan = $d['keterangan'];
            }
            $dataDetailDiagnosa->objectpegawaifk = $dataPegawaiUser[0]->id; // $this->getCurrentLoginID();

            try {
                $dataDetailDiagnosa->save();
                $transStatus = 'true';
            } catch (\Exception $e) {
                $transStatus = 'false';
                $transMessage = "simpan Pasien Baru";
            }

            if ($transStatus == 'true') {
                $transMessage = "Data Tersimpan";
                DB::commit();
                $result = array(
                    'status' => 201,
                    'message' => $transMessage,
                    'data' => $dataDiagnosa,
                    'as' => 'madep',
                );
            } else {
                $transMessage = "Data Gagal Disimpan";
                DB::rollBack();
                $result = array(
                    'status' => 400,
                    'message' => $transMessage,
                    'data' => $dataDiagnosa,
                    'as' => 'madep',
                );
            }
        }

        return $this->setStatusCode($result['status'])->respond($result, $transMessage);
    }

    public function getDiagnosaImportedIcd10($no_registrasi)
    {
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
            ->where('pd.kdprofile', 47)
            ->where('pd.noregistrasi', '=', $no_registrasi)
            ->whereIn('jd.id', [8, 9])
            ->where('ddp.keterangan', '=', 'INAcbg')
            // ->orderBy('ddp.tglinputdiagnosa', 'asc')
            ->orderByRaw("(CASE WHEN jd.id = 8 THEN 1 ELSE 0 END), ddp.tglinputdiagnosa ASC")
            ->get();

        return $this->respond($iDRG);
    }

    public function getDiagnosaImportedIcd9($no_registrasi)
    {
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
            ->leftJoin('diagnosatindakanpasien_t as dtp', 'dtp.objectpasienfk', '=', 'apd.norec')
            ->join('detaildiagnosatindakanpasien_t as ddt', 'ddt.objectdiagnosatindakanpasienfk', '=', 'dtp.norec')
            ->leftJoin('jenisdiagnosa_m as jd', 'jd.id', '=', 'ddt.objectjenisdiagnosafk')
            ->leftJoin('diagnosa_idrg_new_m as dt', 'dt.id', '=', 'ddt.diagnosa_idrg_id')
            ->leftjoin('pegawai_m as pg', 'pg.id', '=', 'ddt.objectpegawaifk')
            ->where('ddt.keterangantindakan', '=', 'INAcbg')
            ->where('pd.noregistrasi', '=', $no_registrasi)
            ->whereIn('jd.id', [8, 9])
            ->orderByRaw("(CASE WHEN jd.id = 8 THEN 1 ELSE 0 END), ddt.tglinputdiagnosa ASC")
            ->get();

        return $this->respond($diagnosa_idrg_icd_9);
    }

    public function saveDiagnosaTindakanPasienIdrgImport(Request $request)
    {
        $dataLogin = $request->all();
        $kdProfile = $this->getDataKdProfile($request);
        $idProfile = (int) $kdProfile;
        DB::beginTransaction();
        $dataPegawaiUser = DB::select(
            DB::raw("select pg.id,pg.namalengkap from loginuser_s as lu
                    INNER JOIN pegawai_m as pg on lu.objectpegawaifk=pg.id
                    where lu.id=:idLoginUser and pg.kdprofile = $idProfile"),
            array(
                'idLoginUser' => $dataLogin['userData']['id'],
            )
        );

        $diagnosaImported = $this->getDiagnosaImportedIcd9($request['detaildiagnosatindakanpasien']['no_registrasi']);
        $data = $diagnosaImported->getContent();
        $decodedData = json_decode($data, true);
        if (is_array($decodedData) && count($decodedData) > 0) {
            foreach ($decodedData as $item) {
                // hapus berdasarkan norec_diagnosapasien
                if (!empty($item['norec_detaildpasien'])) {
                    $detail = DetailDiagnosaTindakanPasien::where('norec', $item['norec_detaildpasien'])->first();
                    if ($detail) {
                        $detail->delete();
                    }
                }
            }
        }
        // 🔹 Simpan data baru tanpa duplikat id_diagnosa
        $processedIds = [];

        foreach ($request['detaildiagnosatindakanpasien']['data'] as $d) {
            // Skip jika id_diagnosa sudah pernah diproses
            if (in_array($d['id_diagnosa'], $processedIds)) {
                // Opsional: catat log kalau mau lihat siapa yang diskip
                // Log::info('Skip duplicate diagnosa_idrg_id', ['id_diagnosa' => $d['id_diagnosa']]);
                continue;
            }
            $processedIds[] = $d['id_diagnosa'];

            $dataDiagnosa = new DiagnosaTindakanPasien();
            $dataDiagnosa->norec = $dataDiagnosa->generateNewId();
            $dataDiagnosa->kdprofile = $idProfile;
            $dataDiagnosa->statusenabled = true;
            $dataDiagnosa->objectpasienfk = $request['detaildiagnosatindakanpasien']['objectpasienfk'];
            $dataDiagnosa->tglpendaftaran = $request['detaildiagnosatindakanpasien']['tglpendaftaran'];

            try {
                $dataDiagnosa->save();
                $transStatus = 'true';
            } catch (\Exception $e) {
                $transStatus = 'false';
                $transMessage = "simpan Diagnosa Baru";
            }

            $dataDetailDiagnosa = new DetailDiagnosaTindakanPasien();
            $dataDetailDiagnosa->norec = $dataDetailDiagnosa->generateNewId();
            $dataDetailDiagnosa->kdprofile = $idProfile;
            $dataDetailDiagnosa->statusenabled = true;
            $dataDetailDiagnosa->objectpegawaifk = $dataPegawaiUser[0]->id; // $this->getCurrentLoginID();
            if (isset($request['detaildiagnosatindakanpasien']['ketdiagnosa'])) {
                $dataDetailDiagnosa->ketdiagnosa = $request['detaildiagnosatindakanpasien']['ketdiagnosa'];
            }
            $dataDetailDiagnosa->diagnosa_idrg_id = $d['id_diagnosa'];
            $dataDetailDiagnosa->multiplicity = $d['multiplicity'];
            $dataDetailDiagnosa->objectjenisdiagnosafk = $d['objectjenisdiagnosafk'];
            $dataDetailDiagnosa->objectdiagnosatindakanpasienfk = $dataDiagnosa->norec;
            $dataDetailDiagnosa->jumlah = null;
            $dataDetailDiagnosa->objectpegawaifk = $dataPegawaiUser[0]->id; // $this->getCurrentLoginID()

            if (isset($request['detaildiagnosatindakanpasien']['keterangantindakan'])) {
                $dataDetailDiagnosa->keterangantindakan = $request['detaildiagnosatindakanpasien']['keterangantindakan'];
            }

            if (isset($d['keterangantindakan'])) {
                $dataDetailDiagnosa->keterangantindakan = $d['keterangantindakan'];
            }

            $dataDetailDiagnosa->tglinputdiagnosa = date('Y-m-d H:i:s');

            try {
                $dataDetailDiagnosa->save();
                $transStatus = 'true';
            } catch (\Exception $e) {
                $transStatus = 'false';
                $transMessage = "simpan Pasien Baru";
            }

            if ($transStatus == 'true') {
                $transMessage = "Data Tersimpan";
                DB::commit();
                $result = array(
                    'status' => 201,
                    'message' => $transMessage,
                    'data' => $dataDiagnosa,
                    'as' => 'egie@ramdan',
                );
            } else {
                $transMessage = "Data Gagal Disimpan";
                DB::rollBack();
                $result = array(
                    'status' => 400,
                    'message' => $transMessage,
                    'data' => $dataDiagnosa,
                    'as' => 'egie@ramdan',
                );
            }
        }

        return $this->setStatusCode($result['status'])->respond($result, $transMessage);
    }

    public function syncInacbgGrouping(Request $request)
    {
        $number = 10000;
        ini_set('max_execution_time', $number);
        DB::beginTransaction();
        try {
            $dataLogin = $request->all();
            $data = $request['claim'];
            $idProfile = (int) $this->getDataKdProfile($request);
            $noReg = $request['norec'];
            $no_sep = $request;

            // ==============================
            // 1️⃣ SIMPAN KE TABEL IDRG / INACBG GRUPING
            // ==============================
            // dd($data['data']['grouper']['response_idrg']);
            if (isset($data['data']['grouper']['response_idrg'])) {
                DB::table('idrg_gruping')->updateOrInsert(
                    ['no_sep' => $no_sep['nosep']],
                    [
                        'norec' => substr(Uuid::generate(), 0, 32),
                        'mdc_number' => $data['data']['grouper']['response_idrg']['mdc_number'] ?? null,
                        'mdc_description' => $data['data']['grouper']['response_idrg']['mdc_description'] ?? null,
                        'drg_code' => $data['data']['grouper']['response_idrg']['drg_code'] ?? null,
                        'drg_description' => $data['data']['grouper']['response_idrg']['drg_description'] ?? null,
                        'gruping_respons' => json_encode($data['data']['grouper']['response_idrg'], true)
                    ]
                );
            }

            if (isset($data['data']['grouper']['response_inacbg'])) {
                DB::table('inacbg_gruping')->updateOrInsert(
                    ['no_sep' => $no_sep['nosep']],
                    [
                        'norec' => substr(Uuid::generate(), 0, 32),
                        'cbg_code' => $data['data']['grouper']['response_inacbg']['cbg']['code'] ?? null,
                        'cbg_description' => $data['data']['grouper']['response_inacbg']['cbg']['description'] ?? null,
                        'base_tariff' => $data['data']['grouper']['response_inacbg']['base_tariff'] ?? null,
                        'tariff' => $data['data']['grouper']['response_inacbg']['tariff'] ?? null,
                        'inacbg_version' => $data['data']['grouper']['response_inacbg']['inacbg_version'] ?? null,
                        'gruping_respons' => json_encode($data['data']['grouper']['response_inacbg'], true)
                    ]
                );
            }

            // ==============================
            // Parse diagnosa_inagrouper (ICD-10) dan procedure_inagrouper (ICD-9)
            // ==============================
            $diagString = data_get($data, 'data.diagnosa_inagrouper', '');
            $procString = data_get($data, 'data.procedure_inagrouper', '');

            // dd($diagString,$procString);
            // normalize empty => empty array
            $diagCodes = [];
            if (!empty($diagString)) {
                $parts = explode('#', $diagString);
                foreach ($parts as $idx => $code) {
                    $c = trim($code);
                    if ($c === '') continue;
                    // objectjenisdiagnosafk: asumsi => pertama = 8 (primer), sisanya = 9 (sekunder)
                    $jd = ($idx === 0) ? 8 : 9;
                    $diagCodes[] = [
                        'code' => $c,
                        'jd' => $jd,
                        'keterangan' => 'iDRG'
                    ];
                }
            }

            // dd($diagCodes);

            $procCodes = [];
            if (!empty($procString)) {
                $parts = explode('#', $procString);
                foreach ($parts as $idx => $segment) {
                    $segment = trim($segment);
                    if ($segment === '') continue;
                    $multiplicity = null;

                    // detect +N pattern (e.g. 86.22+2)
                    if (strpos($segment, '+') !== false) {
                        // could be form code+N  OR code+N#... but splitting above already handled #
                        $tmp = explode('+', $segment);
                        $codePart = trim($tmp[0]);
                        $multPart = intval($tmp[1] ?? 1);
                        $multiplicity = ($multPart > 0) ? $multPart : 1;
                    } else {
                        // no plus
                        $codePart = $segment;
                    }

                    if ($codePart === '') continue;
                    // objectjenisdiagnosafk: asumsi => pertama = 8, sisanya = 9
                    $jd = ($idx === 0) ? 8 : 9;
                    $procCodes[] = [
                        'code' => $codePart,
                        'multiplicity' => $multiplicity,
                        'objectjenisdiagnosafk' => $jd,
                        'keterangantindakan' => 'iDRG'
                    ];
                }
            }
            // dd($procCodes);

            // ==============================
            // Ambil data internal: ICD-10 (detaildiagnosapasien iDRG) dan ICD-9 (detaildiagnosatindakanpasien iDRG)
            // Kita gunakan query serupa dengan fungsi yang Anda sediakan, tetapi langsung mengambil minimal field:
            // - ICD-10: code (kddiagnosa) dan norec detail (ddp.norec)
            // - ICD-9: code (kddiagnosatindakan) dan norec detail (ddt.norec) dan multiplicity
            // ==============================
            // ICD-10 existing
            $existingIcd10 = collect(
                \DB::table('pasiendaftar_t as pd')
                    ->join('antrianpasiendiperiksa_t as apd', 'apd.noregistrasifk', '=', 'pd.norec')
                    ->join('detaildiagnosapasien_t as ddp', 'ddp.noregistrasifk', '=', 'apd.norec')
                    ->leftJoin('diagnosa_idrg_new_m as dg', 'dg.id', '=', 'ddp.diagnosa_idrg_id')
                    ->where('pd.norec', $noReg)
                    ->where('ddp.keterangan', 'iDRG')
                    ->select(
                        'ddp.norec as norec_detaildpasien',
                        'dg.code as kddiagnosa',
                        'ddp.objectjenisdiagnosafk as jd_id'
                    )
                    ->get()
            )->map(function ($r) {
                return (array) $r;
            })->toArray();


            // ICD-9 existing
            $existingIcd9 = collect(
                \DB::table('pasiendaftar_t as pd')
                    ->join('antrianpasiendiperiksa_t as apd', 'apd.noregistrasifk', '=', 'pd.norec')
                    ->leftJoin('diagnosatindakanpasien_t as dtp', 'dtp.objectpasienfk', '=', 'apd.norec')
                    ->join('detaildiagnosatindakanpasien_t as ddt', 'ddt.objectdiagnosatindakanpasienfk', '=', 'dtp.norec')
                    ->leftJoin('diagnosa_idrg_new_m as dt', 'dt.id', '=', 'ddt.diagnosa_idrg_id')
                    ->where('pd.norec', '=', $noReg)
                    ->where('ddt.keterangantindakan', '=', 'iDRG')
                    ->select(
                        'ddt.norec as norec_detaildpasien',
                        'dt.code as kddiagnosatindakan',
                        'ddt.multiplicity'
                    )
                    ->get()
            )->map(function ($r) {
                return (array) $r;
            })->toArray();

            // dd($existingIcd10,$existingIcd9);

            // buat lookup existing code => detail record
            $existingIcd10ByCode = [];
            foreach ($existingIcd10 as $row) {
                $code = trim($row['kddiagnosa'] ?? '');
                if ($code === '') continue;
                $existingIcd10ByCode[$code][] = $row; // dapat lebih dari 1 baris
            }

            $existingIcd9ByCode = [];
            foreach ($existingIcd9 as $row) {
                $code = trim($row['kddiagnosatindakan'] ?? '');
                if ($code === '') continue;
                $existingIcd9ByCode[$code][] = $row;
            }

            // dd("CEK ICD 10", $existingIcd10ByCode, "CEK ICD 9",$existingIcd9ByCode);

            // ==============================
            // 2️⃣ HAPUS yang ada di internal tapi tidak ada di INACBG
            // ==============================
            // ICD-10 deletions
            $incomingIcd10Codes = array_map(function ($d) {
                return $d['code'];
            }, $diagCodes);
            foreach ($existingIcd10ByCode as $code => $rows) {
                if (!in_array($code, $incomingIcd10Codes)) {
                    // hapus semua detail yang berkaitan
                    foreach ($rows as $r) {
                        if (!empty($r['norec_detaildpasien'])) {
                            $detail = DetailDiagnosaPasien::where('norec', $r['norec_detaildpasien'])->first();
                            if ($detail) {
                                $detail->delete();
                            }
                        }
                    }
                }
            }

            // ICD-9 deletions
            $incomingIcd9Codes = array_map(function ($d) {
                return $d['code'];
            }, $procCodes);
            foreach ($existingIcd9ByCode as $code => $rows) {
                if (!in_array($code, $incomingIcd9Codes)) {
                    foreach ($rows as $r) {
                        if (!empty($r['norec_detaildpasien'])) {
                            $detail = DetailDiagnosaTindakanPasien::where('norec', $r['norec_detaildpasien'])->first();
                            if ($detail) {
                                $detail->delete();
                            }
                        }
                    }
                }
            }

            // ==============================
            // 3️⃣ CREATE yang ada di INACBG tapi belum ada di internal
            // ==============================
            // ambil pegawai user untuk objectpegawaifk
            $dataPegawaiUser = DB::select(
                DB::raw("select pg.id,pg.namalengkap from loginuser_s as lu
                    INNER JOIN pegawai_m as pg on lu.objectpegawaifk=pg.id
                    where pg.kdprofile = $idProfile and lu.id=:idLoginUser"),
                array(
                    'idLoginUser' => $dataLogin['userData']['id'],
                )
            );
            $pegawaiId = $dataPegawaiUser && count($dataPegawaiUser) ? $dataPegawaiUser[0]->id : null;

            // helper: cari diagnosa_idrg by code
            $findDiagnosaIdrg = function ($code) {
                return DB::table('diagnosa_idrg_new_m')->where('code', $code)->first();
            };


            // ICD-10 creates
            foreach ($diagCodes as $d) {
                $code = $d['code'];
                // kalau sudah ada di internal lewat existing lookup, skip create
                if (array_key_exists($code, $existingIcd10ByCode)) continue;

                // cari diagnosa_idrg master
                $dg = $findDiagnosaIdrg($code);
                if (!$dg) {
                    // jika tidak ditemukan master diagnosa, skip atau log. Kita skip agar tidak memasukkan invalid code.
                    continue;
                }

                // create DiagnosaPasien (parent)
                $dataDiagnosa = new DiagnosaPasien();
                $dataDiagnosa->norec = $dataDiagnosa->generateNewId();
                $dataDiagnosa->kdprofile = $idProfile;
                $dataDiagnosa->statusenabled = true;
                $dataDiagnosa->noregistrasifk = $request['detaildiagnosapasien']['noregistrasifk'] ?? null;
                $dataDiagnosa->ketdiagnosis = 'Diagnosa Pasien';
                $dataDiagnosa->tglregistrasi = null;
                $dataDiagnosa->tglpendaftaran = $request['detaildiagnosapasien']['tglregistrasi'] ?? null;
                if (isset($request['detaildiagnosapasien']['kasusbaru'])) {
                    $dataDiagnosa->iskasusbaru = $request['detaildiagnosapasien']['kasusbaru'];
                }
                if (isset($request['detaildiagnosapasien']['kasuslama'])) {
                    $dataDiagnosa->iskasuslama = $request['detaildiagnosapasien']['kasuslama'];
                }
                $dataDiagnosa->save();

                // create DetailDiagnosaPasien
                $dataDetailDiagnosa = new DetailDiagnosaPasien();
                $dataDetailDiagnosa->norec = $dataDetailDiagnosa->generateNewId();
                $dataDetailDiagnosa->kdprofile = $idProfile;
                $dataDetailDiagnosa->statusenabled = true;
                $dataDetailDiagnosa->objectpegawaifk = $pegawaiId;
                $dataDetailDiagnosa->noregistrasifk = $request['detaildiagnosapasien']['noregistrasifk'] ?? null;
                $dataDetailDiagnosa->tglregistrasi = $request['detaildiagnosapasien']['tglregistrasi'] ?? Carbon::now()->toDateTimeString();
                $dataDetailDiagnosa->diagnosa_idrg_id = $dg->id;
                $dataDetailDiagnosa->objectdiagnosapasienfk = $dataDiagnosa->norec;
                $dataDetailDiagnosa->objectjenisdiagnosafk = $d['jd']; // sesuai asumsi: 8 = primer, 9 = sekunder
                $dataDetailDiagnosa->tglinputdiagnosa = date('Y-m-d H:i:s');
                $dataDetailDiagnosa->keterangan = $d['keterangan']; // INAcbg
                $dataDetailDiagnosa->objectpegawaifk = $pegawaiId;
                $dataDetailDiagnosa->save();
            }

            // ICD-9 creates (procedures)
            foreach ($procCodes as $d) {
                $code = $d['code'];
                // jika sudah ada, skip
                if (array_key_exists($code, $existingIcd9ByCode)) continue;

                $dg = $findDiagnosaIdrg($code);
                if (!$dg) {
                    // skip jika tidak ada master ICD9/diagnosa_idrg
                    continue;
                }

                // create DiagnosaTindakanPasien (parent)
                $dataDiagnosa = new DiagnosaTindakanPasien();
                $dataDiagnosa->norec = $dataDiagnosa->generateNewId();
                $dataDiagnosa->kdprofile = $idProfile;
                $dataDiagnosa->statusenabled = true;
                $dataDiagnosa->objectpasienfk = $request['detaildiagnosatindakanpasien']['objectpasienfk'] ?? null;
                $dataDiagnosa->tglpendaftaran = $request['detaildiagnosatindakanpasien']['tglpendaftaran'] ?? null;
                $dataDiagnosa->save();

                // create detail
                $dataDetailDiagnosa = new DetailDiagnosaTindakanPasien();
                $dataDetailDiagnosa->norec = $dataDetailDiagnosa->generateNewId();
                $dataDetailDiagnosa->kdprofile = $idProfile;
                $dataDetailDiagnosa->statusenabled = true;
                $dataDetailDiagnosa->objectpegawaifk = $pegawaiId;
                if (isset($request['detaildiagnosatindakanpasien']['ketdiagnosa'])) {
                    $dataDetailDiagnosa->ketdiagnosa = $request['detaildiagnosatindakanpasien']['ketdiagnosa'];
                }
                $dataDetailDiagnosa->diagnosa_idrg_id = $dg->id;
                $dataDetailDiagnosa->multiplicity = $d['multiplicity'] ?? null;
                $dataDetailDiagnosa->objectjenisdiagnosafk = $d['objectjenisdiagnosafk'];
                $dataDetailDiagnosa->objectdiagnosatindakanpasienfk = $dataDiagnosa->norec;
                $dataDetailDiagnosa->jumlah = null;
                $dataDetailDiagnosa->objectpegawaifk = $pegawaiId;
                $dataDetailDiagnosa->keterangantindakan = $d['keterangantindakan']; // INAcbg
                $dataDetailDiagnosa->tglinputdiagnosa = date('Y-m-d H:i:s');
                $dataDetailDiagnosa->save();
            }

            // ==============================
            // Parse diagnosa_inacbg (ICD-10) dan procedure_inacbg (ICD-9)
            // ==============================
            $INACBG_diagString = data_get($data, 'data.diagnosa', '');
            $INACBG_procString = data_get($data, 'data.procedure', '');

            // normalize empty => empty array
            $INACBG_diagCodes = [];
            if (!empty($INACBG_diagString)) {
                $parts = explode('#', $INACBG_diagString);
                foreach ($parts as $idx => $code) {
                    $c = trim($code);
                    if ($c === '') continue;
                    $jd = ($idx === 0) ? 8 : 9; // 8 = primer, 9 = sekunder
                    $INACBG_diagCodes[] = [
                        'code' => $c,
                        'jd' => $jd,
                        'keterangan' => 'INAcbg'
                    ];
                }
            }

            $INACBG_procCodes = [];
            if (!empty($INACBG_procString)) {
                $parts = explode('#', $INACBG_procString);
                foreach ($parts as $idx => $segment) {
                    $segment = trim($segment);
                    if ($segment === '') continue;
                    $multiplicity = null;

                    if (strpos($segment, '+') !== false) {
                        $tmp = explode('+', $segment);
                        $codePart = trim($tmp[0]);
                        $multPart = intval($tmp[1] ?? 1);
                        $multiplicity = ($multPart > 0) ? $multPart : 1;
                    } else {
                        $codePart = $segment;
                    }

                    if ($codePart === '') continue;
                    $jd = ($idx === 0) ? 8 : 9;
                    $INACBG_procCodes[] = [
                        'code' => $codePart,
                        'multiplicity' => $multiplicity,
                        'objectjenisdiagnosafk' => $jd,
                        'keterangantindakan' => 'INAcbg'
                    ];
                }
            }

            // ==============================
            // Ambil data internal INAcbg
            // ==============================
            $INACBG_existingIcd10 = collect(
                \DB::table('pasiendaftar_t as pd')
                    ->join('antrianpasiendiperiksa_t as apd', 'apd.noregistrasifk', '=', 'pd.norec')
                    ->join('detaildiagnosapasien_t as ddp', 'ddp.noregistrasifk', '=', 'apd.norec')
                    // ->leftJoin('diagnosa_inacbg_new_m as dg', 'dg.id', '=', 'ddp.diagnosa_inacbg_id')
                    ->leftJoin('diagnosa_idrg_new_m as dg', 'dg.id', '=', 'ddp.diagnosa_idrg_id')
                    ->leftJoin('diagnosa_inacbg_new_m as dgi', 'dgi.id', '=', 'ddp.diagnosa_inacbg_id')
                    ->where('pd.norec', '=', $noReg)
                    ->where('ddp.keterangan', '=', 'INAcbg')
                    ->select(
                        'ddp.norec as norec_detaildpasien',
                        // 'dg.code as kddiagnosa',
                        \DB::raw("COALESCE(dg.code, dgi.code) as kddiagnosa"),
                        \DB::raw("COALESCE(dg.nama_diagnosa, dgi.nama_diagnosa) as namadiagnosa"),
                        'ddp.objectjenisdiagnosafk as jd_id'
                    )
                    ->get()
            )->map(function ($r) {
                return (array) $r;
            })->toArray();

            $INACBG_existingIcd9 = collect(
                \DB::table('pasiendaftar_t as pd')
                    ->join('antrianpasiendiperiksa_t as apd', 'apd.noregistrasifk', '=', 'pd.norec')
                    ->leftJoin('diagnosatindakanpasien_t as dtp', 'dtp.objectpasienfk', '=', 'apd.norec')
                    ->join('detaildiagnosatindakanpasien_t as ddt', 'ddt.objectdiagnosatindakanpasienfk', '=', 'dtp.norec')
                    // ->leftJoin('diagnosa_inacbg_new_m as dt', 'dt.id', '=', 'ddt.diagnosa_inacbg_id')
                    ->leftJoin('diagnosa_idrg_new_m as dg', 'dg.id', '=', 'ddt.diagnosa_idrg_id')
                    ->leftJoin('diagnosa_inacbg_new_m as dgi', 'dgi.id', '=', 'ddt.diagnosa_inacbg_id')
                    ->where('pd.norec', '=', $noReg)
                    ->where('ddt.keterangantindakan', '=', 'INAcbg')
                    ->select(
                        'ddt.norec as norec_detaildpasien',
                        // 'dt.code as kddiagnosatindakan',
                        \DB::raw("COALESCE(dg.code, dgi.code) as kddiagnosatindakan"),
                        \DB::raw("COALESCE(dg.nama_diagnosa, dgi.nama_diagnosa) as namadiagnosatindakan"),
                        'ddt.multiplicity',
                        'ddt.objectjenisdiagnosafk as jd_id',
                    )
                    ->get()
            )->map(function ($r) {
                return (array) $r;
            })->toArray();


            // ==============================
            // Buat lookup existing code => detail record
            // ==============================
            $INACBG_existingIcd10ByCode = [];
            foreach ($INACBG_existingIcd10 as $row) {
                $code = trim($row['kddiagnosa'] ?? '');
                if ($code === '') continue;
                $INACBG_existingIcd10ByCode[$code][] = $row;
            }

            $INACBG_existingIcd9ByCode = [];
            foreach ($INACBG_existingIcd9 as $row) {
                $code = trim($row['kddiagnosatindakan'] ?? '');
                if ($code === '') continue;
                $INACBG_existingIcd9ByCode[$code][] = $row;
            }


            // ==============================
            // HAPUS yang ada di internal tapi tidak ada di INAcbg
            // ==============================
            $INACBG_incomingIcd10Codes = array_map(function ($d) {
                return $d['code'];
            }, $INACBG_diagCodes);            // dd("INCOMING ICD 10", $INACBG_incomingIcd10Codes, "EXIXTING ICD 10", $INACBG_existingIcd10ByCode);
            foreach ($INACBG_existingIcd10ByCode as $code => $rows) {
                if (!in_array($code, $INACBG_incomingIcd10Codes)) {
                    foreach ($rows as $r) {
                        if (!empty($r['norec_detaildpasien'])) {
                            $detail = DetailDiagnosaPasien::where('norec', $r['norec_detaildpasien'])->first();
                            if ($detail) $detail->delete();
                        }
                    }
                }
            }

            $INACBG_incomingIcd9Codes = array_map(function ($d) {
                return $d['code'];
            }, $INACBG_procCodes);
            
            // dd("INCOMING ICD 9", $INACBG_incomingIcd9Codes, "EXIXTING ICD 9", $INACBG_existingIcd9ByCode);
            foreach ($INACBG_existingIcd9ByCode as $code => $rows) {
                if (!in_array($code, $INACBG_incomingIcd9Codes)) {
                    foreach ($rows as $r) {
                        if (!empty($r['norec_detaildpasien'])) {
                            $detail = DetailDiagnosaTindakanPasien::where('norec', $r['norec_detaildpasien'])->first();
                            if ($detail) $detail->delete();
                        }
                    }
                }
            }

            // ==============================
            // CREATE yang ada di INAcbg tapi belum ada di internal
            // ==============================
            $dataPegawaiUser = DB::select(
                DB::raw("select pg.id,pg.namalengkap from loginuser_s as lu
        INNER JOIN pegawai_m as pg on lu.objectpegawaifk=pg.id
        where pg.kdprofile = $idProfile and lu.id=:idLoginUser"),
                ['idLoginUser' => $dataLogin['userData']['id']]
            );
            $INACBG_pegawaiId = $dataPegawaiUser && count($dataPegawaiUser) ? $dataPegawaiUser[0]->id : null;

            $INACBG_findDiagnosaIdrg = function ($code) {
                return DB::table('diagnosa_inacbg_new_m')
                    ->where('code', $code)
                    ->first();
            };
            // ICD-10 creates
            foreach ($INACBG_diagCodes as $d) {
                $code = $d['code'];
                if (array_key_exists($code, $INACBG_existingIcd10ByCode)) continue;
                $dg = $INACBG_findDiagnosaIdrg($code);
                if (!$dg) continue;

                $dataDiagnosa = new DiagnosaPasien();
                $dataDiagnosa->norec = $dataDiagnosa->generateNewId();
                $dataDiagnosa->kdprofile = $idProfile;
                $dataDiagnosa->statusenabled = true;
                $dataDiagnosa->noregistrasifk = $request['detaildiagnosapasien']['noregistrasifk'] ?? null;
                $dataDiagnosa->ketdiagnosis = 'Diagnosa Pasien';
                $dataDiagnosa->tglregistrasi = null;
                $dataDiagnosa->tglpendaftaran = $request['detaildiagnosapasien']['tglregistrasi'] ?? null;
                $dataDiagnosa->save();

                $dataDetailDiagnosa = new DetailDiagnosaPasien();
                $dataDetailDiagnosa->norec = $dataDetailDiagnosa->generateNewId();
                $dataDetailDiagnosa->kdprofile = $idProfile;
                $dataDetailDiagnosa->statusenabled = true;
                $dataDetailDiagnosa->objectpegawaifk = $INACBG_pegawaiId;
                $dataDetailDiagnosa->noregistrasifk = $request['detaildiagnosapasien']['noregistrasifk'] ?? null;
                $dataDetailDiagnosa->tglregistrasi = $request['detaildiagnosapasien']['tglregistrasi'] ?? Carbon::now()->toDateTimeString();
                $dataDetailDiagnosa->diagnosa_inacbg_id = $dg->id;
                $dataDetailDiagnosa->objectdiagnosapasienfk = $dataDiagnosa->norec;
                $dataDetailDiagnosa->objectjenisdiagnosafk = $d['jd'];
                $dataDetailDiagnosa->tglinputdiagnosa = date('Y-m-d H:i:s');
                $dataDetailDiagnosa->keterangan = $d['keterangan'];
                $dataDetailDiagnosa->save();
            }

            // ICD-9 creates
            foreach ($INACBG_procCodes as $d) {
                $code = $d['code'];
                if (array_key_exists($code, $INACBG_existingIcd9ByCode)) continue;

                $dg = $INACBG_findDiagnosaIdrg($code);
                if (!$dg) continue;

                $dataDiagnosa = new DiagnosaTindakanPasien();
                $dataDiagnosa->norec = $dataDiagnosa->generateNewId();
                $dataDiagnosa->kdprofile = $idProfile;
                $dataDiagnosa->statusenabled = true;
                $dataDiagnosa->objectpasienfk = $request['detaildiagnosatindakanpasien']['objectpasienfk'] ?? null;
                $dataDiagnosa->tglpendaftaran = $request['detaildiagnosatindakanpasien']['tglpendaftaran'] ?? null;
                $dataDiagnosa->save();

                $dataDetailDiagnosa = new DetailDiagnosaTindakanPasien();
                $dataDetailDiagnosa->norec = $dataDetailDiagnosa->generateNewId();
                $dataDetailDiagnosa->kdprofile = $idProfile;
                $dataDetailDiagnosa->statusenabled = true;
                $dataDetailDiagnosa->objectpegawaifk = $INACBG_pegawaiId;
                $dataDetailDiagnosa->diagnosa_inacbg_id = $dg->id;
                $dataDetailDiagnosa->multiplicity = $d['multiplicity'] ?? null;
                $dataDetailDiagnosa->objectjenisdiagnosafk = $d['objectjenisdiagnosafk'];
                $dataDetailDiagnosa->objectdiagnosatindakanpasienfk = $dataDiagnosa->norec;
                $dataDetailDiagnosa->keterangantindakan = $d['keterangantindakan'];
                $dataDetailDiagnosa->tglinputdiagnosa = date('Y-m-d H:i:s');
                $dataDetailDiagnosa->save();
            }

            // ==============================
            // 4️⃣ UPDATE STATUS KLAIM
            // ==============================
            $status = null;
            if (isset($data['data']['grouper']['response_inacbg'])) {
                // if($data['data']['grouper']['response_inacbg'])
                if($data['data']['grouper']['response_inacbg']['status_cd'] == 'final'){
                    $status = 'claim_final';
                }else{
                    $status = 'grouper_inacbg_stage_satu';
                }
            } elseif (isset($data['data']['grouper']['response_idrg'])) {
                $status = 'grouper';
            }

            // dd($status);
            if ($status) {
                PasienDaftar::where('norec', $noReg)
                    ->update(['statusklaim' => $status]);
            }

            DB::commit();
            return response()->json([
                'status' => 200,
                'message' => 'Sinkronisasi sukses',
                'status_klaim' => $status
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => 500,
                'message' => $e->getMessage(),
            ]);
        }
    }
}
