<?php
/**
 * Created by IntelliJ IDEA.
 * User: Egie Ramdan
 * Date: 07/02/2019
 * Time: 16.33
 */


namespace App\Http\Controllers\Bridging;

use App\Http\Controllers\ApiController;
use App\Master\Ruangan;
use App\Traits\Valet;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Transaksi\PasienDaftar;
use App\Web\Profile;
use DB;
use Date;
use DateTime;
use DateTimeZone;
class BridgingSirsOnlineV3Controller  extends ApiController
{
    use Valet;
    protected $url = 'http://202.70.136.24:3020/api/';
    // protected $url = 'http://202.70.136.86:3020/api/';
 
    public function __construct() {
        parent::__construct($skip_authentication=false);
    }
    protected  function kodeRS (){
        return $this->settingDataFixed('userIdSisrute');
    }
    protected  function passwordRS (){
        return $this->settingDataFixed('passwordSisrute');
    }

    function is_decimal( $val )
    {
        return is_numeric( $val ) && floor( $val ) != $val;
    }

    protected function getUrlBrigdingSirsOnlinePasien(){
        return $this->url;
    }

    protected function getUrlBrigdingSirsOnline(){
        return "http://sirs.kemkes.go.id/fo/index.php/";
    }

    function getHeadersCovidPasien($token){
        $header = array(
            "accept: */*",
            "Authorization: Bearer ".$token,
            "Content-Type: application/json"
        );
        return $header;
    }

    function getHeadersCovid($extrahead = null){
        $kdProfile = Profile::where('statusenabled',true)->first()->id;

        $setting =  $this->settingDataFixed('userRSOnline',$kdProfile);

        $user = explode(',',$setting)[0];
        $password = explode(',',$setting)[1];

        date_default_timezone_set('UTC');
        $tStamp = strval(time()-strtotime('1970-01-01 00:00:00'));
        $headers['headers'][0] = "X-rs-id: ". $user;
        $headers['headers'][1] = "X-Timestamp: ".$tStamp;
        $headers['headers'][2] = "X-pass: ". $password;
        $headers['headers'][3] = "Content-type: application/json";
        if($extrahead != null) {
            $headers['headers'][4] = $extrahead;
        }
        return $headers['headers'];
    }

    public function kemenkesTools(Request $request)
    {
        $kdProfile = $this->getDataKdProfile($request);
        try {

            if (isset($request['jenis']) && $request['jenis'] == 'sirsonlinev3') {
                $baseURL = $this->getUrlBrigdingSirsOnline();
                if (isset($request['head']) && $request['head'] != '' && $request['head'] != null) {
                    $headers = $this->getHeadersCovid($request['head']);
                } else {
                    $headers = $this->getHeadersCovid();
                }
            } else {
                $baseURL = $this->getUrlBrigdingSirsOnlinePasien();
                $headers = $this->getHeadersCovidPasien($request['token']);
            }

            $postdata = null;

            if ($request['data'] != null) {
                $postdata = json_encode($request["data"]);
            }

            $methods = $request['method'];
            $url = $baseURL. $request['url'];

            $response = $this->sendCurl($headers, $url, $methods, $postdata);
      
            $cekData = array(
                'request' => array(
                    'url' => $url,
                    'headers' =>  $headers,
                    'payload' =>$postdata,
                ), 'response' => $response
            );

            return $this->respond($response);

        } catch (\Exception $e) {
            $response = array(
                "metaData" => array(
                    "code" => "404",
                    "message" => "Transaksi tidak dapat di proses, Gagal dicoba kembali (Kementrian Kesehatan)!"
                ),
                "response" => null,
                "e"=> $e->getMessage(). ' '.$e->getLine()
            );

            return $this->respond($response);
        }

        // return $this->respond($response);
    }

    // function sendCurl($header, $url, $method, $postdata){
    //     $curl = curl_init();
    //     if ($postdata === null) {
    //         curl_setopt_array($curl, array(
    //             CURLOPT_URL => $url,
    //             CURLOPT_RETURNTRANSFER => true,
    //             CURLOPT_ENCODING => "",
    //             CURLOPT_MAXREDIRS => 10,
    //             CURLOPT_TIMEOUT => 10,
    //             CURLOPT_SSL_VERIFYHOST => 0,
    //             CURLOPT_SSL_VERIFYPEER => 0,
    //             CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //             CURLOPT_CUSTOMREQUEST => $method,
    //             CURLOPT_HTTPHEADER => $header,
    //             CURLOPT_SSL_CIPHER_LIST => 'DEFAULT@SECLEVEL=1'
    //         ));
    //     } else {
    //         curl_setopt_array($curl, array(
    //             CURLOPT_URL => $url,
    //             CURLOPT_RETURNTRANSFER => true,
    //             CURLOPT_ENCODING => "",
    //             CURLOPT_MAXREDIRS => 10,
    //             CURLOPT_TIMEOUT => 10,
    //             CURLOPT_SSL_VERIFYHOST => 0,
    //             CURLOPT_SSL_VERIFYPEER => 0,
    //             CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //             CURLOPT_CUSTOMREQUEST => $method,
    //             CURLOPT_POSTFIELDS => $postdata,
    //             CURLOPT_HTTPHEADER => $header,
    //             CURLOPT_SSL_CIPHER_LIST => 'DEFAULT@SECLEVEL=1'
    //         ));
    //     }

    //     // dd($postdata);
    //     $response = curl_exec($curl);
    //     $err = curl_error($curl);
    //     curl_close($curl);

    //     if ($err) {
    //         $result = array(
    //             'metaData' => array(
    //                 'code' => 400,
    //                 'message' => 'Gagal menghubungkan ke KEMENKES (' . $url . ')'
    //             ),
    //         );
    //     } else {
    //         if ($this->isJson($response)) {
    //             $result = json_decode($response);
    //         } else {
    //             $result = $response;
    //         }
    //     }

    //     return $result;
    // }
    function sendCurl($header, $url, $method,$postdata)
    {
        $curl = curl_init();
        if ($postdata == null) {
            curl_setopt_array($curl, array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => $method,
                CURLOPT_HTTPHEADER => $header,
            ));
        } else {
            curl_setopt_array($curl, array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => $method,
                CURLOPT_HTTPHEADER => $header,
                CURLOPT_POSTFIELDS => $postdata,
            ));
        }

        $response = curl_exec($curl);

        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            $result = array(
                'metaData' => array(
                    'code' => 400,
                    'message' => 'Gagal menghubungkan ke KEMENKES (' . $url . ')'
                ),
            );
        } else {
            if ($this->isJson($response)) {
                $result = json_decode($response);
            } else {
                $result = $response;
            }
        }

        return $result;
    }

    public function LoginBearAuth() {
        $kdProfile = Profile::where('statusenabled',true)->first()->id;
        $setting =  $this->settingDataFixed('userRSOnline',$kdProfile);

        $user = explode(',',$setting)[0];//'3201046';//
      
        $password = explode(',',$setting)[1];//'S!rs2020!!';//
        $user ='helmisulaemi1107@gmail.com';
        $password ='nDTC8усС';
        $curl = curl_init();

        $json =  array(
            'userName' => $user,
            'password' => $password
        );
        curl_setopt_array($curl, array(
        CURLOPT_URL => $this->url.'rslogin',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode($json),
        CURLOPT_HTTPHEADER => array(
            'accept: */*',
            'Content-Type: application/json'
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $response = json_decode($response);
        if(!$response->status){
            $res['url'] =$this->url.'rslogin';
            $res['method'] ='POST';
            $res['body'] =$json;
            $res['response'] = $response; 
            return $res;
        }
 
        return $response;
    }

    public function getDataPasien(Request $request)
    {
        $kdProfile = $this->getDataKdProfile($request);
        $tglAwal = $request['tglawal'].' 00:00';
        $tglAkhir = $request['tglakhir'].' 23:59';
        $ruanganId = $request['idRuangan'];
        $namapasien = $request['namapasien'];
        $norm = $request['norm'];

        $paramRuangan = ' ';
        if (isset($ruanganId) && $ruanganId != "" && $ruanganId != "undefined") {
            $paramRuangan = ' and pd.objectruanganlastfk = ' . $ruanganId;
        }

        $paramNamaPasien = ' ';
        if (isset($namapasien) && $namapasien != "" && $namapasien != "undefined") {
            $paramNamaPasien = ' and pm.namapasien = ' . $namapasien;
        }

        $paramNoRm = ' ';
        if (isset($norm) && $norm != "" && $norm != "undefined") {
            $paramNoRm = ' and pm.nocm = ' . $norm;
        }
        $data = DB::select(DB::raw("
            select * from (select 
            row_number() over (partition by pd.noregistrasi order by apd.tglmasuk desc) as rownum
            ,pd.noregistrasi
            ,pm.nocm
            ,pd.norec
            ,nm.kdnegarasirs
            ,pm.paspor
            ,pm.noidentitas
            ,pm.namapasien as inisial
            ,pm.namapasien
            ,'-' as email
            ,pm.nohp
            ,jk.jeniskelamin
            ,jk.id as idjeniskelamin
            ,EXTRACT(YEAR FROM AGE(pd.tglregistrasi, pm.tgllahir)) as usia
            ,pm.tgllahir
            ,pd.tglregistrasi
            ,pv.namapropinsi
            ,kk.namakotakabupaten
            ,kc.namakecamatan
            ,rm.namaruangan
            ,dp.id as departemenid
            ,pd.tglupdatesirs
            ,pd.idupdatesirs
            ,pv.kdpropinsisirs
            ,kk.kdkotakabupatensirs
            ,kc.kdkecamatansirs
            ,rm.kodesirs
            from pasiendaftar_t pd
            inner join ruangan_m rm on rm.id = pd.objectruanganlastfk
            inner join departemen_m dp on dp.id = rm.objectdepartemenfk
            inner join pasien_m pm on pm.id = pd.nocmfk
            inner join jeniskelamin_m jk on jk.id = pm.objectjeniskelaminfk
            left join negara_m nm on nm.id = pm.objectnegarafk
            left join alamat_m al on al.nocmfk = pm.id
            left join propinsi_m pv on pv.id = al.objectpropinsifk
            left join kotakabupaten_m kk on kk.id = al.objectkotakabupatenfk
            left join kecamatan_m kc on kc.id = al.objectkecamatanfk
            left join antrianpasiendiperiksa_t apd on apd.noregistrasifk=pd.norec
            left JOIN diagnosapasien_t dpa on dpa.noregistrasifk=apd.norec
            left join detaildiagnosapasien_t dd ON dd.objectdiagnosapasienfk = dpa.norec
            LEFT join diagnosa_m d on dd.objectdiagnosafk =d.id
            LEFT join jenisdiagnosa_m jd ON jd.id = dd.objectjenisdiagnosafk
            where pd.tglregistrasi BETWEEN '$tglAwal' and '$tglAkhir'
            and rm.objectdepartemenfk in (16,18,24)
            --and d.kddiagnosa in ('U07.1','J18.9') 
            and jd.id in ('1','2')
            and pd.statusenabled = true
            and pd.kdprofile = '$kdProfile'
            and pm.namapasien ilike '%$namapasien%' 
            and pm.nocm ilike '%$norm%' $paramRuangan
            ) as x where x.rownum=1
        "));
        return $data;
    }

    public function getDataPasienbyTglreg(Request $request)
    {
        $kdProfile = $this->getDataKdProfile($request);
        $tglAwal = $request['tglawal'].' 00:00';
        $tglAkhir = $request['tglakhir'].' 23:59';
        $norm = $request['norm'];

        $paramNoRm = ' ';
        if (isset($norm) && $norm != "" && $norm != "undefined") {
            $paramNoRm = ' and pm.nocm = ' . $norm;
        }
        $data = DB::select(DB::raw("
            select pm.nocm
            ,pd.norec
            ,nm.kdnegarasirs
            ,pm.paspor
            ,pm.noidentitas
            ,pm.namapasien as inisial
            ,pm.namapasien
            ,'-' as email
            ,pm.nohp
            ,jk.jeniskelamin
            ,jk.id as idjeniskelamin
            ,EXTRACT(YEAR FROM AGE(pd.tglregistrasi, pm.tgllahir)) as usia
            ,pm.tgllahir
            ,pd.tglregistrasi
            ,pv.namapropinsi
            ,kk.namakotakabupaten
            ,kc.namakecamatan
            ,rm.namaruangan
            ,dp.id as departemenid
            ,pd.tglupdatesirs
            ,pd.idupdatesirs
            ,pv.kdpropinsisirs
            ,kk.kdkotakabupatensirs
            ,kc.kdkecamatansirs
            from pasiendaftar_t pd
            inner join ruangan_m rm on rm.id = pd.objectruanganlastfk
            inner join departemen_m dp on dp.id = rm.objectdepartemenfk
            inner join pasien_m pm on pm.id = pd.nocmfk
            inner join jeniskelamin_m jk on jk.id = pm.objectjeniskelaminfk
            left join negara_m nm on nm.id = pm.objectnegarafk
            left join alamat_m al on al.nocmfk = pm.id
            left join propinsi_m pv on pv.id = al.objectpropinsifk
            left join kotakabupaten_m kk on kk.id = al.objectkotakabupatenfk
            left join kecamatan_m kc on kc.id = al.objectkecamatanfk
            left join antrianpasiendiperiksa_t apd on apd.noregistrasifk=pd.norec
            left JOIN diagnosapasien_t dpa on dpa.noregistrasifk=apd.norec
            left join detaildiagnosapasien_t dd ON dd.objectdiagnosapasienfk = dpa.norec
            LEFT join diagnosa_m d on dd.objectdiagnosafk =d.id
            LEFT join jenisdiagnosa_m jd ON jd.id = dd.objectjenisdiagnosafk
            where pd.tglregistrasi BETWEEN '$tglAwal' and '$tglAkhir'
            and pd.statusenabled = true
            and pd.kdprofile = '$kdProfile'
            and pm.nocm ilike '%$norm%'
        "));
        return $data;
    }

    public function saveIdBridging(Request $request){
        $kdProfile = $this->getDataKdProfile($request);
        DB::beginTransaction();

        try {
            PasienDaftar::where('norec', $request['norec_pd'])
            ->update([
                    'tglupdatesirs' => date('Y-m-d H:i:s'),
                    'idupdatesirs' => $request['id'],
                ]
            );

            $transStatus = 'true';
        } catch (\Exception $e) {
            $transStatus = 'false';
        }

        if ($transStatus == 'true') {
            DB::commit();
            $result = array(
                'status' => 201,
                'message' => "Berhasil Simpan Bridging data",
                'as' => 'er@epic',
            );
        } else {
            DB::rollBack();
            $result = array(
                'status' => 400,
                'message'  => "Gagal Simpan Bridging data",
                'as' => 'er@epic',
            );
        }
        return $this->setStatusCode($result['status'])->respond($result, $result['message']);
    }

    public function insertTemp(Request $request){
        $insert_data = [];
        foreach($request['data'] as $value){
            $data = [
                'id' => $value['id'],
                'nama' => $value['nama'], 
                'provinsi_id' => $value['provinsi_id'],
            ];
            $insert_data[] = $data;
        }
        $insert_data = collect($insert_data);
        $chunks = $insert_data->chunk(500);

        foreach ($chunks as $chunk)
        {
            DB::table('temp_kabkota')->insert($chunk->toArray());
        }
    }

}