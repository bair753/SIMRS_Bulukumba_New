<?php

/**
 * Created by PhpStorm.
 * User: GIW
 * Date: 7/31/2019
 * Time: 4:33 PM
 */

namespace App\Http\Controllers\Bridging;

use App\Http\Controllers\ApiController;
use App\Master\Agama;
use App\Master\Pegawai;
use App\Traits\CrudMaster;
use App\Traits\Valet;
use App\Transaksi\LoggingUser;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Master\Departemen;
use App\Web\LoginUser;
use App\Web\Token;
use App\Master\Pasien;
use App\Master\Produk;
use App\Master\Ruangan;
use App\Transaksi\DetailDiagnosaPasien;
use App\Transaksi\DetailDiagnosaTindakanPasien;
use App\Transaksi\DiagnosaTindakanPasien;
use App\Transaksi\EMRPasienD;
use App\Transaksi\HasilLaboratorium;
use App\Transaksi\IHS_Transaction;
use App\Transaksi\OrderPelayanan;
use App\Transaksi\PasienDaftar;
use App\Transaksi\PelayananPasien;
use App\Transaksi\Rencana;
use App\Transaksi\StokProdukDetail;
use App\Transaksi\StrukPelayanan;
use App\Transaksi\StrukPelayananDetail;
use App\Transaksi\PapAlergi;
use App\Transaksi\RisOrder;
use App\Web\Profile;
use App\Transaksi\AntrianPasienRegistrasi;
use App\Transaksi\AntrianPasienDiperiksa;
use DB;
use Exception;
use Illuminate\Support\Facades\Hash;
use Namshi\JOSE\Base64\Base64UrlSafeEncoder;
use Namshi\JOSE\JWT;
use Namshi\JOSE\JWS;
use Namshi\JOSE\Base64\Encoder;
use Webpatser\Uuid\Uuid;

use Lcobucci\JWT\Signer\Hmac\Sha512;
use Lcobucci\JWT\Signer\Hmac\Sha256;
use Lcobucci\JWT\Signer\Hmac\Sha384;
use Lcobucci\JWT\Builder;
use Lcobucci\JWT\ValidationData;
use Lcobucci\JWT\Parser;
use Ramsey\Uuid\Uuid as RamseyUuidUuid;
use Webpatser\Uuid\Uuid as UuidUuid;

class IHSController extends ApiController
{
    use CrudMaster;
    use Valet;
    protected $kdProfile = 39;

    public function __construct()
    {
        parent::__construct($skip_authentication = true);
    }
    protected function curlAPI($headers, $dataJsonSend = null, $url, $method)
    {
        $curl = curl_init();
        // dd($headers);
        if ($dataJsonSend == null || $dataJsonSend == '') {
            curl_setopt_array($curl, array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_SSL_VERIFYHOST => 0,
                CURLOPT_SSL_VERIFYPEER => 0,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => $method,
                CURLOPT_HTTPHEADER => $headers
            ));
        } else {
            curl_setopt_array($curl, array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_SSL_VERIFYHOST => 0,
                CURLOPT_SSL_VERIFYPEER => 0,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => $method,
                CURLOPT_POSTFIELDS => $dataJsonSend,
                CURLOPT_HTTPHEADER => $headers
            ));
        }

        $response = curl_exec($curl);
        $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $err = curl_error($curl);
        // dd($response);
        curl_close($curl);
        if ($err) {
            $result = "Terjadi Kesalahan #:" . $err;
        } else {

            $result = json_decode($response);
        }
        return $result;
    }
    function getCredentialz()
    {
        $res['client_id'] = $this->settingDataFixed('client_id_IHS', $this->kdProfile);
        $res['client_secret'] = $this->settingDataFixed('client_secret_IHS', $this->kdProfile);
        $res['org'] = $this->settingDataFixed('organization_id_IHS', $this->kdProfile);
        return $res;
    }
    function endPoint()
    {
        return $this->settingDataFixed('base_url_IHS', $this->kdProfile);
    }
    public function generateToken($lokal = null)
    {
        $url = $this->settingDataFixed('auth_url_IHS', $this->kdProfile);

        $headers = array(
            'Content-Type:application/x-www-form-urlencoded',
        );
        $cred = $this->getCredentialz();
        $client_id = $cred['client_id'];
        $client_secret = $cred['client_secret'];

        $dataJsonSend =   'client_id=' . $client_id . '&client_secret=' . $client_secret;
        $methods = 'POST';
        $url = $url . "?grant_type=client_credentials";
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $methods,
            CURLOPT_POSTFIELDS => $dataJsonSend,
            CURLOPT_HTTPHEADER => $headers
        ));
        $response = curl_exec($curl);
        $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);
        if ($httpcode == 200) {
            $response =  json_decode($response);
        } else {
            $rss =  json_decode($response);
            if (isset($rss->resourceType)) {
                $response = $rss;
            } else {
                $response = array(
                    "result" => $response,
                    "body" => $dataJsonSend,
                    "url" => $url,
                    "method" => $methods,
                );
            }
        }
        if ($lokal == true) {
            return $response;
        }
        return response()->json($response);
    }
    function getHeader()
    {
        try {
            $date_now =session('satusehat_date');
            $seconds = session("satusehat_exp");
            $date = date("Y-m-d H:i:s", (strtotime(date($date_now)) + $seconds));
        
            if (!empty(session("satusehat_token")) && $date > date('Y-m-d H:i:s')  ) {

                $token = session("satusehat_token");
            }else{
                $datas = $this->generateToken(true);
                // if($datas->resourceType == 'OperationOutcome'){
                
                // }
       
                $token = $datas->access_token;
                $expires_in = $datas->expires_in;
             
                session(["satusehat_token" => $token]);
                session(["satusehat_date" => date('Y-m-d H:i:s')]);
                session(["satusehat_exp" => $expires_in]);
            }
    
        }catch(Exception $e){
          
            $token2 = $this->generateToken(true);
            \Log::info("TOKEN SATUSEHAT: ".json_encode($token2));
            $token = '';
        }

        $header = array(
            'Content-Type: application/json',
            'Authorization: Bearer ' . $token,
        );
      
        return $header;
    }
    public function ihsTools(Request $request, $lokal = null)
    {
        try {
            $headers = $this->getHeader();
            $dataJsonSend = null;
            if ($request['data'] != null) {
                $dataJsonSend = json_encode($request['data']);
            }
            $methods = $request['method'];
            $url = $this->endPoint() . $request['url'];
            // if($methods == 'PUT'){
            //     $url = $this->endPoint() . $request['url'].'/'.$request['data']['id'];
            // }
           
            $response = $this->curlAPI($headers, $dataJsonSend, $url, $methods);
           
        } catch (Exception $e) {
            $response = array(
                "issue" => $e->getMessage() . ' ' . $e->getLine(),
                "resourceType" => "OperationOutcome"
            );
            $response = json_decode(json_encode($response)); //Turn it into an object
        }
      
        if ($lokal) {
            return $response;
        }
       
        return response()->json($response);
    }
    public function Organization(Request $request)
    {
        $kdProfile = $this->kdProfile;
        $q =  collect(DB::select(" 
        SELECT
        kd.*,
        pr.ihs_id AS ihs_profile,
        pr.ihs_province,
        pr.ihs_city,
        pr.ihs_district,
        pr.ihs_village,
        pr.kodepos,
        pr.alamatlengkap,
        pr.namakota,
        pr.alamatemail,
        pr.website,
        pr.fixedphone ,
        pr.namalengkap as namaprofile
    FROM
        departemen_m AS kd
        LEFT JOIN profile_m AS pr ON pr.ID = kd.kdprofile 
    WHERE
        kd.kdprofile = $kdProfile 
        AND kd.statusenabled = true
        AND kd.ID = $request[id_dept]"))->first();


        $data =  array(
            'resourceType' => 'Organization',
            'active' => $q->statusenabled,
            'identifier' =>
            array(
                0 =>
                array(
                    'use' => 'official',
                    'system' => 'http://sys-ids.kemkes.go.id/organization/' . $q->ihs_profile,
                    'value' => (string) $q->id,
                ),
            ),
            'type' =>
            array(
                0 =>
                array(
                    'coding' =>
                    array(
                        0 =>
                        array(
                            'system' => 'http://terminology.hl7.org/CodeSystem/organization-type',
                            'code' => 'dept',
                            'display' => 'Hospital Department',
                        ),
                    ),
                ),
            ),
            'name' => $q->namadepartemen,
            'telecom' =>
            array(
                [
                    'system' => 'phone',
                    'value' => $q->fixedphone,
                    'use' => 'work',
                ],
                [
                    'system' => 'email',
                    'value' => $q->alamatemail,
                    'use' => 'work',
                ],
                [
                    'system' => 'url',
                    'value' =>  $q->website,
                    'use' => 'work',
                ]
            ),
            'address' =>
            array(
                0 =>
                array(
                    'use' => 'work',
                    'type' => 'both',
                    'line' =>
                    array(
                        0 => $q->alamatlengkap,
                    ),
                    'city' => $q->namakota,
                    'postalCode' => $q->kodepos,
                    'country' => 'ID',
                    'extension' =>
                    array(
                        0 =>
                        array(
                            'url' => 'https://fhir.kemkes.go.id/r4/StructureDefinition/administrativeCode',
                            'extension' =>
                            array(
                                0 =>
                                array(
                                    'url' => 'province',
                                    'valueCode' =>  $q->ihs_province,
                                ),
                                1 =>
                                array(
                                    'url' => 'city',
                                    'valueCode' =>  $q->ihs_city,
                                ),
                                2 =>
                                array(
                                    'url' => 'district',
                                    'valueCode' =>  $q->ihs_district,
                                ),
                                3 =>
                                array(
                                    'url' => 'village',
                                    'valueCode' =>  $q->ihs_village,
                                ),
                            ),
                        ),
                    ),
                ),
            ),
            'partOf' =>
            array(
                'reference' => 'Organization/' . $q->ihs_profile,
                'display' => $q->namaprofile,
            ),
        );
        $objetoRequest = new \Illuminate\Http\Request();
        $objetoRequest['url'] = $q->ihs_id == null ? $data['resourceType'] : $data['resourceType'] . '/' . $q->ihs_id;
        $objetoRequest['method'] = $q->ihs_id == null ?'POST':'PUT';
        $objetoRequest['data'] = $data;

        $response =  $this->ihsTools($objetoRequest, true);
        $noterror = true;
        if ($response->resourceType == 'OperationOutcome') {
            $noterror = false;
        }

        if ($q->ihs_id == null) {
            $mod = new IHS_Transaction();
            $mod->norec = $mod->generateNewId();
            $mod->statusenabled = $noterror;
            $mod->kdprofile = $this->kdProfile;
        } else {
            $mod = IHS_Transaction::where('id', $q->ihs_id)->first();
        }
        $mod->resourcetype = $data['resourceType'];
        $mod->url =  $this->endPoint() . $data['resourceType'];
        $mod->method = 'POST';
        $mod->id = isset($response->id) ? $response->id : null;
        $mod->body = json_encode($data);
        $mod->response =  json_encode($response);
        $mod->date = date('Y-m-d H:i:s');
        $mod->save();
        if (isset($response->id)) {
            Departemen::where('id', $q->id)->update([
                'ihs_id' => $response->id
            ]);
        }
        return response()->json($response);
    }

    public function Location(Request $request)
    {
        $kdProfile = $this->kdProfile;
        $q =  collect(DB::select(" 
        SELECT
        kd.*,
        pr.ihs_id AS ihs_profile,
        pr.ihs_province,
        pr.ihs_city,
        pr.ihs_district,
        pr.ihs_village,
        pr.kodepos,
        pr.alamatlengkap,
        pr.namakota,
        pr.alamatemail,
        pr.website,
        pr.fixedphone ,
        pr.namalengkap as namaprofile,
        pr.lat,
        pr.lng,
        dep.ihs_id as ihs_dep
    FROM
        ruangan_m AS kd
        LEFT JOIN profile_m AS pr ON pr.ID = kd.kdprofile 
        LEFT JOIN departemen_m AS dep ON dep.ID = kd.objectdepartemenfk 
    WHERE
        kd.kdprofile = $kdProfile 
        AND kd.statusenabled = true
        AND kd.ID = $request[id_ru]"))->first();


        $data = array(
            'id' => $q->ihs_id,
            'resourceType' => 'Location',
            'identifier' =>
            array(
                0 =>
                array(
                    'system' => 'http://sys-ids.kemkes.go.id/location/' . $q->ihs_profile,
                    'value' => (string) $q->id,
                ),
            ),
            'status' => 'active',
            'name' =>  $q->namaruangan,
            'description' => $q->namaruangan,
            'mode' => 'instance',
            'telecom' =>
            array(
                0 =>
                array(
                    'system' => 'phone',
                    'value' => $q->fixedphone,
                    'use' => 'work',
                ),
                1 =>
                array(
                    'system' => 'email',
                    'value' =>  $q->alamatemail,
                    'use' => 'work',
                ),
                2 =>
                array(
                    'system' => 'url',
                    'value' =>  $q->website,
                    'use' => 'work',
                ),
            ),
            'physicalType' =>
            array(
                'coding' =>
                array(
                    0 =>
                    array(
                        'system' => 'http://terminology.hl7.org/CodeSystem/location-physical-type',
                        'code' => 'ro',
                        'display' => 'Room',
                    ),
                ),
            ),
            'position' =>
            array(
                'longitude' => (float) $q->lng,
                'latitude' => (float)$q->lat,
                'altitude' => 0,
            ),
            'managingOrganization' =>
            array(
                'reference' => 'Organization/' . $q->ihs_dep,
            ),
        );
        if($q->ihs_id == null){
            unset($data['id']);
        }
  

        $objetoRequest = new \Illuminate\Http\Request();
        $objetoRequest['url'] = $q->ihs_id == null ? $data['resourceType'] : $data['resourceType'] . '/' . $q->ihs_id;
        $objetoRequest['method'] = $q->ihs_id == null ? 'POST': 'PUT';
        $objetoRequest['data'] = $data;

        $response =  $this->ihsTools($objetoRequest, true);
        $noterror = true;
        if ($response->resourceType == 'OperationOutcome') {
            $noterror = false;
        }

        if ($q->ihs_id == null) {
            $mod = new IHS_Transaction();
            $mod->norec = $mod->generateNewId();
            $mod->statusenabled = $noterror;
            $mod->kdprofile = $this->kdProfile;
        } else {
            $mod = IHS_Transaction::where('id', $q->ihs_id)->first();
            if(empty($mod)){
                $mod = new IHS_Transaction();
                $mod->norec = $mod->generateNewId();
                $mod->statusenabled = $noterror;
                $mod->kdprofile = $this->kdProfile;
            }
        }
        $mod->resourcetype = $data['resourceType'];
        $mod->url =  $this->endPoint() . $data['resourceType'];
        $mod->method = 'POST';
        $mod->id = isset($response->id) ? $response->id : null;
        $mod->body = json_encode($data);
        $mod->response =  json_encode($response);
        $mod->date = date('Y-m-d H:i:s');
        $mod->save();
        if (isset($response->id)) {
            Ruangan::where('id', $q->id)->update([
                'ihs_id' => $response->id
            ]);
        }
        return response()->json($response);
    }
    
    public function Encounter(Request $request, $lokal = null)
    {
        try {
            $noregistrasi = trim($request->input('noregistrasi', ''));

            if ($noregistrasi === '') {
                throw new \Exception('Nomor registrasi wajib diisi');
            }

            $q = collect(DB::select("
                SELECT
                    ps.ihs_number,
                    ps.noidentitas,
                    ps.namapasien,
                    CASE
                        WHEN ru.objectdepartemenfk = 16 THEN 'IMP'
                        ELSE 'AMB'
                    END AS code_class,
                    CASE
                        WHEN ru.objectdepartemenfk = 16 THEN 'inpatient encounter'
                        ELSE 'ambulatory'
                    END AS name_class,
                     pg.ihs_id AS ihs_practitioner,
                     pg.namalengkap  AS dokter,
                    pg.noidentitas AS nik_dokter,
                    ru.namaruangan,
                    ru.ihs_id AS ihs_location,
                    pd.tglregistrasi,
                    pd.tglpulang,
                    pd.noregistrasi,
                    pd.ihs_id AS ihs_encounter,
                    pro.ihs_id AS ihs_service_provider,
                    pd.ihs_condition,
                    pd.ihs_in_progress,
                    pd.ihs_finished,
                    stt.statuspulang
                FROM pasiendaftar_t AS pd
                INNER JOIN pasien_m AS ps
                    ON ps.id = pd.nocmfk
                INNER JOIN ruangan_m AS ru
                    ON ru.id = pd.objectruanganlastfk
                LEFT JOIN pegawai_m AS pg
                    ON pg.id = pd.objectpegawaifk
                INNER JOIN profile_m AS pro
                    ON pro.id = pd.kdprofile
                LEFT JOIN statuspulang_m AS stt
                    ON stt.id = pd.objectstatuspulangfk
                WHERE pd.noregistrasi = ?
                AND pd.kdprofile = ?
                LIMIT 1500
            ", array($noregistrasi, $this->kdProfile)))->first();

            if (!$q) {
                throw new \Exception('Data pendaftaran tidak ditemukan');
            }

            $formatDate = function ($value) {
                if (empty($value)) {
                    return null;
                }

                $timestamp = strtotime($value);

                if ($timestamp === false) {
                    return null;
                }

                return date('Y-m-d\TH:i:sP', $timestamp);
            };

            $tglregistrasi = $formatDate($q->tglregistrasi);
            $ihs_in_progress = $formatDate($q->ihs_in_progress);
            $ihs_finished = $formatDate($q->ihs_finished);
            $tglpulang = $formatDate($q->tglpulang);

            if ($tglregistrasi === null) {
                throw new \Exception('Tanggal registrasi tidak valid');
            }

            $IHS_NUMBER_PASIEN = $q->ihs_number;

            if (empty($IHS_NUMBER_PASIEN) && !empty($q->noidentitas)) {
                $objetoRequest = new \Illuminate\Http\Request();
                $objetoRequest->replace(array(
                    'url' => 'Patient?identifier=https://fhir.kemkes.go.id/id/nik|' . $q->noidentitas,
                    'method' => 'GET',
                    'data' => null
                ));

                $response2 = $this->ihsTools($objetoRequest, true);
                $id_IHS = null;

                if (
                    isset($response2->resourceType) &&
                    $response2->resourceType == 'Bundle' &&
                    isset($response2->total) &&
                    $response2->total > 0 &&
                    !empty($response2->entry)
                ) {
                    foreach ($response2->entry as $entry) {
                        if (isset($entry->resource->id)) {
                            $id_IHS = $entry->resource->id;
                            break;
                        }
                    }
                }

                if ($id_IHS !== null) {
                    Pasien::where('noidentitas', $q->noidentitas)->update(array(
                        'ihs_number' => $id_IHS
                    ));

                    $IHS_NUMBER_PASIEN = $id_IHS;
                } else {
                    if ($lokal == true) {
                        return $response2;
                    }

                    return response()->json($response2);
                }
            }

            if (empty($IHS_NUMBER_PASIEN)) {
                throw new \Exception('IHS Patient belum tersedia');
            }

            $IHS_NUMBER_DOKTER = $q->ihs_practitioner;
            $IHS_NAMA_DOKTER = $q->dokter;

            if (empty($IHS_NUMBER_DOKTER) && !empty($q->nik_dokter)) {
                $objetoRequest = new \Illuminate\Http\Request();
                $objetoRequest->replace(array(
                    'url' => 'Practitioner?identifier=https://fhir.kemkes.go.id/id/nik|' . $q->nik_dokter,
                    'method' => 'GET',
                    'data' => null
                ));

                $response2 = $this->ihsTools($objetoRequest, true);
                $id_IHSDOK = null;

                if (
                    isset($response2->resourceType) &&
                    $response2->resourceType == 'Bundle' &&
                    isset($response2->total) &&
                    $response2->total > 0 &&
                    !empty($response2->entry)
                ) {
                    foreach ($response2->entry as $entry) {
                        if (isset($entry->resource->id)) {
                            $id_IHSDOK = $entry->resource->id;
                            break;
                        }
                    }
                }

                if ($id_IHSDOK !== null) {
                    Pegawai::where('noidentitas', $q->nik_dokter)->update(array(
                        'ihs_id' => $id_IHSDOK
                    ));

                    $IHS_NUMBER_DOKTER = $id_IHSDOK;
                }
            }

            $statusPulang = $q->statuspulang;

            if (empty($statusPulang)) {
                $statusPulang = 'Diketahui / diizinkan oleh dokter';
            }

            $status = 'arrived';
            $statusHistory = array();

            if ($ihs_in_progress !== null) {
                $status = 'in-progress';
            }

            if ($ihs_finished !== null) {
                $status = 'finished';
            } elseif ($tglpulang !== null && $ihs_in_progress !== null) {
                $status = 'in-progress';
            } elseif ($tglpulang !== null) {
                $status = 'finished';
            }

            if ($ihs_in_progress !== null && $ihs_in_progress >= $tglregistrasi) {
                $statusHistory[] = array(
                    'status' => 'arrived',
                    'period' => array(
                        'start' => $tglregistrasi,
                        'end' => $ihs_in_progress
                    )
                );

                if ($ihs_finished !== null && $ihs_finished >= $ihs_in_progress) {
                    $statusHistory[] = array(
                        'status' => 'in-progress',
                        'period' => array(
                            'start' => $ihs_in_progress,
                            'end' => $ihs_finished
                        )
                    );

                    if ($ihs_finished > $ihs_in_progress) {
                        $statusHistory[] = array(
                            'status' => 'finished',
                            'period' => array(
                                'start' => $ihs_finished,
                                'end' => $ihs_finished
                            )
                        );
                    }
                } elseif ($ihs_finished === null && $status == 'finished' && $tglpulang >= $ihs_in_progress) {
                    $statusHistory[] = array(
                        'status' => 'in-progress',
                        'period' => array(
                            'start' => $ihs_in_progress,
                            'end' => $tglpulang
                        )
                    );
                }
            } elseif ($status == 'finished' && $tglpulang !== null && $tglpulang >= $tglregistrasi) {
                $statusHistory[] = array(
                    'status' => 'arrived',
                    'period' => array(
                        'start' => $tglregistrasi,
                        'end' => $tglpulang
                    )
                );
            }

            if (empty($statusHistory)) {
                $statusHistory[] = array(
                    'status' => $status,
                    'period' => array(
                        'start' => $tglregistrasi,
                        'end' => $tglregistrasi
                    )
                );
            }

            $diagnosis = array();
            $diagnosisInput = $request->input('diagnosis', array());

            if (is_array($diagnosisInput)) {
                if (isset($diagnosisInput['condition'])) {
                    $diagnosisInput = array($diagnosisInput);
                }

                foreach ($diagnosisInput as $diagnosisItem) {
                    if (!is_array($diagnosisItem)) {
                        continue;
                    }

                    if (
                        empty($diagnosisItem['condition']) ||
                        !is_array($diagnosisItem['condition']) ||
                        empty($diagnosisItem['condition']['reference'])
                    ) {
                        continue;
                    }

                    $conditionReference = trim($diagnosisItem['condition']['reference']);
                    if (strpos($conditionReference, 'Condition/') !== 0) {
                        continue;
                    }

                    $diagnosisItem['condition']['reference'] = $conditionReference;
                    $diagnosisItem['use'] = array(
                        'coding' => array(
                            array(
                                'system' => 'http://terminology.hl7.org/CodeSystem/diagnosis-role',
                                'code' => 'DD',
                                'display' => 'Discharge diagnosis'
                            )
                        )
                    );

                    $diagnosis[] = $diagnosisItem;
                }
            }

            if (empty($diagnosis) && !empty($q->ihs_condition)) {
                $conditionId = trim((string) $q->ihs_condition);
                $conditionId = preg_replace('#^Condition/#', '', $conditionId);

                if ($conditionId !== '') {
                    $diagnosis[] = array(
                        'condition' => array(
                            'reference' => 'Condition/' . $conditionId
                        ),
                        'use' => array(
                            'coding' => array(
                                array(
                                    'system' => 'http://terminology.hl7.org/CodeSystem/diagnosis-role',
                                    'code' => 'DD',
                                    'display' => 'Discharge diagnosis'
                                )
                            )
                        )
                    );
                }
            }

            if (empty($IHS_NUMBER_DOKTER)) {
                throw new \Exception(
                    'IHS Practitioner dokter belum tersedia untuk registrasi ' . $q->noregistrasi
                );
            }

            // if (empty($diagnosis)) {
            //     throw new \Exception(
            //         'Referensi Condition untuk Encounter.diagnosis belum tersedia. Registrasi: ' . $q->noregistrasi
            //     );
            // }

            $data = array(
                'resourceType' => 'Encounter',
                'identifier' => array(
                    array(
                        'system' => 'http://sys-ids.kemkes.go.id/encounter/' . $q->ihs_service_provider,
                        'value' => $q->noregistrasi
                    )
                ),
                'status' => $status,
                'class' => array(
                    'system' => 'http://terminology.hl7.org/CodeSystem/v3-ActCode',
                    'code' => $q->code_class,
                    'display' => $q->name_class
                ),
                'subject' => array(
                    'reference' => 'Patient/' . $IHS_NUMBER_PASIEN,
                    'display' => $q->namapasien
                ),
                'period' => array(
                    'start' => $tglregistrasi
                ),
                'location' => array(
                    array(
                        'location' => array(
                            'reference' => 'Location/' . $q->ihs_location,
                            'display' => $q->namaruangan
                        )
                    )
                ),
                'serviceProvider' => array(
                    'reference' => 'Organization/' . $q->ihs_service_provider
                ),
                'statusHistory' => $statusHistory
            );

            $data['participant'] = array(
                array(
                    'type' => array(
                        array(
                            'coding' => array(
                                array(
                                    'system' => 'http://terminology.hl7.org/CodeSystem/participant-type',
                                    'code' => 'ATND',
                                    'display' => 'attender'
                                )
                            )
                        )
                    ),
                    'individual' => array(
                        'reference' => 'Practitioner/' . $IHS_NUMBER_DOKTER,
                        'display' => $IHS_NAMA_DOKTER
                    )
                )
            );

            $data['diagnosis'] = $diagnosis;
            if ($q->ihs_condition == null) {
                unset($data['diagnosis']);
            }
            if ($ihs_finished !== null) {
                $data['period']['end'] = $ihs_finished;

                $data['hospitalization'] = array(
                    'dischargeDisposition' => array(
                        'coding' => array(
                            array(
                                'system' => 'http://terminology.hl7.org/CodeSystem/discharge-disposition',
                                'code' => 'home',
                                'display' => 'Home'
                            )
                        ),
                        'text' => $statusPulang
                    )
                );
            }

            if (!empty($q->ihs_encounter)) {
                $data['id'] = $q->ihs_encounter;
            }

            $method = !empty($q->ihs_encounter) ? 'PUT' : 'POST';

            $objetoRequest = new \Illuminate\Http\Request();
            $objetoRequest->replace(array(
                'url' => !empty($q->ihs_encounter)
                    ? 'Encounter/' . $q->ihs_encounter
                    : 'Encounter',
                'method' => $method,
                'data' => $data
            ));

            $response = $this->ihsTools($objetoRequest, true);

            $noterror = !(
                isset($response->resourceType) &&
                $response->resourceType == 'OperationOutcome'
            );

            if (
                !$noterror &&
                isset($response->issue[0]->code) &&
                $response->issue[0]->code == 'not-found' &&
                !empty($q->ihs_encounter)
            ) {
                unset($data['id']);

                $objetoRequest = new \Illuminate\Http\Request();
                $objetoRequest->replace(array(
                    'url' => 'Encounter',
                    'method' => 'POST',
                    'data' => $data
                ));
                $method = 'POST';

                $response = $this->ihsTools($objetoRequest, true);

                $noterror = !(
                    isset($response->resourceType) &&
                    $response->resourceType == 'OperationOutcome'
                );
            }

            $mod = null;

            if (!empty($q->ihs_encounter)) {
                $mod = IHS_Transaction::where('id', $q->ihs_encounter)->first();
            }

            if (empty($mod)) {
                $mod = new IHS_Transaction();
                $mod->norec = $mod->generateNewId();
                $mod->kdprofile = $this->kdProfile;
            }

            $mod->statusenabled = $noterror;
            $mod->resourcetype = 'Encounter';
            $mod->url = $this->endPoint() . 'Encounter';
            $mod->method = $method;
            $mod->id = isset($response->id) ? $response->id : null;
            $mod->body = json_encode($data);
            $mod->response = json_encode($response);
            $mod->date = date('Y-m-d H:i:s');
            $mod->save();

            if (isset($response->id) && $noterror) {
                PasienDaftar::where('noregistrasi', $q->noregistrasi)
                    ->where('kdprofile', $this->kdProfile)
                    ->update(array(
                        'ihs_id' => $response->id
                    ));
            }
        } catch (\Exception $e) {
            $response = array(
                'resourceType' => 'OperationOutcome',
                'issue' => $e->getMessage(),
                'line' => $e->getLine()
            );
        }

        if ($lokal == true) {
            return $response;
        }

        return response()->json($response);
    }
    
    public function Condition(Request $request, $lokal = null)
    {
        $kdProfile = $this->kdProfile;

        try {
            $noregistrasi = trim($request->input('noregistrasi', ''));

            if ($noregistrasi === '') {
                throw new \Exception('Parameter noregistrasi wajib diisi');
            }

            $q = collect(DB::select("
                SELECT
                    ps.ihs_number,
                    ps.noidentitas,
                    ps.namapasien,
                    pd.noregistrasi,
                    pd.ihs_id AS ihs_encounter,
                    dg.kddiagnosa,
                    dg.namadiagnosa,
                    ddp.ihs_id AS ihs_condition,
                    ddp.norec
                FROM pasiendaftar_t AS pd
                INNER JOIN pasien_m AS ps
                    ON ps.id = pd.nocmfk
                INNER JOIN antrianpasiendiperiksa_t AS apd
                    ON apd.noregistrasifk = pd.norec
                INNER JOIN detaildiagnosapasien_t AS ddp
                    ON ddp.noregistrasifk = apd.norec
                INNER JOIN diagnosa_m AS dg
                    ON dg.id = ddp.objectdiagnosafk
                WHERE pd.kdprofile = ?
                    AND pd.noregistrasi = ?
                    AND pd.statusenabled = true
                    AND ddp.norec IS NOT NULL
                ORDER BY ddp.norec
            ", array($kdProfile, $noregistrasi)));

            if ($q->isEmpty()) {
                throw new \Exception(
                    'Diagnosis belum ada untuk registrasi ' . $noregistrasi
                );
            }

            $IHS_NUMBER_PASIEN = trim((string) $q[0]->ihs_number);

            if ($IHS_NUMBER_PASIEN === '') {
                $noidentitas = trim((string) $q[0]->noidentitas);

                if ($noidentitas === '') {
                    throw new \Exception(
                        'IHS Patient belum tersedia dan nomor identitas pasien kosong'
                    );
                }

                $objetoRequest = new \Illuminate\Http\Request();
                $objetoRequest->replace(array(
                    'url' => 'Patient?identifier=https://fhir.kemkes.go.id/id/nik|' . $noidentitas,
                    'method' => 'GET',
                    'data' => null,
                ));

                $responsePasien = $this->ihsTools($objetoRequest, true);

                if (
                    is_object($responsePasien) &&
                    isset($responsePasien->resourceType) &&
                    $responsePasien->resourceType === 'Bundle' &&
                    isset($responsePasien->entry) &&
                    count($responsePasien->entry) > 0 &&
                    isset($responsePasien->entry[0]->resource->id)
                ) {
                    $IHS_NUMBER_PASIEN = $responsePasien->entry[0]->resource->id;

                    Pasien::where('noidentitas', $noidentitas)
                        ->update(array(
                            'ihs_number' => $IHS_NUMBER_PASIEN,
                        ));
                } else {
                    throw new \Exception(
                        'IHS Patient tidak ditemukan. Periksa nomor identitas pasien.'
                    );
                }
            }

            $diagnosisArr = array();
            $hasil = array();
            $rank = 1;

            foreach ($q as $item) {
                $conditionId = trim((string) $item->ihs_condition);

                try {
                    if (empty($item->ihs_encounter)) {
                        throw new \Exception('IHS Encounter belum tersedia');
                    }

                    if (empty($IHS_NUMBER_PASIEN)) {
                        throw new \Exception('IHS Patient belum tersedia');
                    }

                    $data = array(
                        'resourceType' => 'Condition',
                        'clinicalStatus' => array(
                            'coding' => array(
                                array(
                                    'system' => 'http://terminology.hl7.org/CodeSystem/condition-clinical',
                                    'code' => 'active',
                                    'display' => 'Active',
                                ),
                            ),
                        ),
                        'category' => array(
                            array(
                                'coding' => array(
                                    array(
                                        'system' => 'http://terminology.hl7.org/CodeSystem/condition-category',
                                        'code' => 'encounter-diagnosis',
                                        'display' => 'Encounter Diagnosis',
                                    ),
                                ),
                            ),
                        ),
                        'code' => array(
                            'coding' => array(
                                array(
                                    'system' => 'http://hl7.org/fhir/sid/icd-10',
                                    'code' => $item->kddiagnosa,
                                    'display' => $item->namadiagnosa,
                                ),
                            ),
                        ),
                        'subject' => array(
                            'reference' => 'Patient/' . $IHS_NUMBER_PASIEN,
                            'display' => $item->namapasien,
                        ),
                        'encounter' => array(
                            'reference' => 'Encounter/' . $item->ihs_encounter,
                        ),
                    );

                    if ($conditionId !== '') {
                        $method = 'PUT';
                        $url = 'Condition/' . $conditionId;
                        $data['id'] = $conditionId;
                    } else {
                        $method = 'POST';
                        $url = 'Condition';
                    }

                    $objetoRequest = new \Illuminate\Http\Request();
                    $objetoRequest->replace(array(
                        'url' => $url,
                        'method' => $method,
                        'data' => $data,
                    ));

                    $responseCondition = $this->ihsTools($objetoRequest, true);

                    $responseResource = is_object($responseCondition)
                        ? (isset($responseCondition->resourceType) ? $responseCondition->resourceType : '')
                        : (isset($responseCondition['resourceType']) ? $responseCondition['resourceType'] : '');

                    $responseId = is_object($responseCondition)
                        ? (isset($responseCondition->id) ? $responseCondition->id : null)
                        : (isset($responseCondition['id']) ? $responseCondition['id'] : null);

                    if (empty($responseId) && $method === 'PUT') {
                        $responseId = $conditionId;
                    }

                    $berhasil = $responseResource !== 'OperationOutcome'
                        && !empty($responseId);

                    $mod = new IHS_Transaction();
                    $mod->norec = $mod->generateNewId();
                    $mod->statusenabled = $berhasil;
                    $mod->kdprofile = $kdProfile;
                    $mod->resourcetype = 'Condition';
                    $mod->url = $this->endPoint() . $url;
                    $mod->method = $method;
                    $mod->id = $responseId;
                    $mod->body = json_encode($data);
                    $mod->response = json_encode($responseCondition);
                    $mod->date = date('Y-m-d H:i:s');
                    $mod->save();

                    if (!$berhasil) {
                        $pesanError = 'Gagal mengirim Condition';

                        if (
                            is_object($responseCondition) &&
                            isset($responseCondition->issue)
                        ) {
                            $pesan = array();

                            foreach ($responseCondition->issue as $issue) {
                                if (isset($issue->details->text)) {
                                    $pesan[] = $issue->details->text;
                                }

                                if (isset($issue->diagnostics)) {
                                    $pesan[] = $issue->diagnostics;
                                }
                            }

                            if (!empty($pesan)) {
                                $pesanError = implode('; ', array_unique($pesan));
                            }
                        }

                        $hasil[] = array(
                            'noregistrasi' => $item->noregistrasi,
                            'diagnosis' => $item->namadiagnosa,
                            'kddiagnosa' => $item->kddiagnosa,
                            'method' => $method,
                            'status' => 'gagal',
                            'error' => $pesanError,
                            'response' => $responseCondition,
                        );

                        continue;
                    }

                    DetailDiagnosaPasien::where('norec', $item->norec)
                        ->update(array(
                            'ihs_id' => $responseId,
                        ));

                    $diagnosisArr[] = array(
                        'condition' => array(
                            'reference' => 'Condition/' . $responseId,
                            'display' => $item->namadiagnosa,
                        ),
                        'use' => array(
                            'coding' => array(
                                array(
                                    'system' => 'http://terminology.hl7.org/CodeSystem/condition-category',
                                    'code' => 'encounter-diagnosis',
                                    'display' => 'Discharge diagnosis',
                                ),
                            ),
                        ),
                        'rank' => $rank++,
                    );

                    $hasil[] = array(
                        'noregistrasi' => $item->noregistrasi,
                        'diagnosis' => $item->namadiagnosa,
                        'kddiagnosa' => $item->kddiagnosa,
                        'method' => $method,
                        'status' => 'berhasil',
                        'ihs_condition' => $responseId,
                        'response' => $responseCondition,
                    );
                } catch (\Exception $e) {
                    $hasil[] = array(
                        'noregistrasi' => $item->noregistrasi,
                        'diagnosis' => $item->namadiagnosa,
                        'kddiagnosa' => $item->kddiagnosa,
                        'status' => 'gagal',
                        'error' => $e->getMessage(),
                    );
                }
            }

            if (!empty($diagnosisArr)) {
                PasienDaftar::where('noregistrasi', $noregistrasi)
                    ->update(array(
                        'ihs_diagnosis' => json_encode($diagnosisArr),
                    ));

                $objetoRequest = new \Illuminate\Http\Request();
                $objetoRequest->replace(array(
                    'noregistrasi' => $noregistrasi,
                    'diagnosis' => $diagnosisArr,
                ));

                $this->Encounter($objetoRequest, true);
            }

            $response = array(
                'resourceType' => 'OperationOutcome',
                'noregistrasi' => $noregistrasi,
                'total' => count($hasil),
                'berhasil' => count(array_filter($hasil, function ($v) {
                    return $v['status'] === 'berhasil';
                })),
                'gagal' => count(array_filter($hasil, function ($v) {
                    return $v['status'] === 'gagal';
                })),
                'detail' => $hasil,
            );
        } catch (\Exception $e) {
            $response = array(
                'resourceType' => 'OperationOutcome',
                'issue' => $e->getMessage(),
            );
        }

        if ($lokal == true) {
            return $response;
        }

        return response()->json($response);
    }

    public function Encountertes(Request $request)
    {
        $objetoRequest = new \Illuminate\Http\Request();
        $objetoRequest['noregistrasi'] = $request['noregistrasi'];
        $ihs = app('App\Http\Controllers\Bridging\IHSController')->Encounter($objetoRequest);
        return $ihs;
    }
    public function getList(Request $request)
    {
        $data = DB::table('ihs_transaction')
            ->select('*')
            ->where('resourcetype', '=', $request['resourcetype'])
            ->where('statusenabled', true);
        if (isset($request['dari']) && $request['dari'] != '') {
            $data = $data->where('date', '>=', $request['dari'] . ' 00:00');
        }
        if (isset($request['sampai']) && $request['sampai'] != '') {
            $data = $data->where('date', '<=', $request['sampai'] . ' 23:59');
        }
        $data = $data->orderby('date', 'desc');
        $data = $data->get();
        $data2 = [];
        foreach ($data as $d) {
            // $d->body = json_decode( $d->body);
            // $d->response = json_decode( $d->response);
            if ($d->resourcetype == 'Bundle') {
                $daaa = array(
                    'request' => json_decode($d->body),
                    'response' => json_decode($d->response),
                );
                $data2[] =  $daaa;
            } else {
                $daaa = json_decode($d->response);
            }

            if (isset($daaa->resourceType) && $daaa->resourceType != 'OperationOutcome') {
                $data2[] =  $daaa;
            }
        }
        return response()->json($data2);
    }
    public function Practitioner(Request $request)
    {

        $pegawai =  Pegawai::where('id', $request['id_nakes'])->first();
        $objetoRequest = new \Illuminate\Http\Request();
        $objetoRequest['url'] = 'Practitioner?identifier=https://fhir.kemkes.go.id/id/nik|' . $pegawai->noidentitas;
        $objetoRequest['method'] = 'GET';
        $objetoRequest['data'] = null;
        $id_IHSDOK = '';
        $response2 =  $this->ihsTools($objetoRequest, true);

        if ($response2->resourceType != 'OperationOutcome' && $response2->resourceType == 'Bundle' &&  $response2->total != 0) {
            foreach ($response2->entry  as $dd) {
                $id_IHSDOK = $dd->resource->id;
            }
        }

        if ($id_IHSDOK != '') {
            Pegawai::where('id', $request['id_nakes'])->update([
                'ihs_id' => $id_IHSDOK
            ]);
        }


        return response()->json($response2);
    }

    public function updateIHSPasien(Request $request)
    {
        $kdProfile = (int) $this->kdProfile;
        DB::beginTransaction();
        try {

            $JD = Pasien::where('id', $request['id'])->where('kdprofile', $kdProfile)->update(
                [
                    'ihs_number' => $request['ihs_number']
                ]
            );

            $transStatus = 'true';
        } catch (\Exception $e) {
            $transStatus = 'false';
        }

        if ($transStatus == 'true') {
            $transMessage = "Simpan Berhasil";
            DB::commit();
            $result = array(
                "status" => 201,
                "pasien" => $JD,
                "as" => 'inhuman',
            );
        } else {
            $transMessage = "Simpan Gagal";
            DB::rollBack();
            $result = array(
                "status" => 400,
                "as" => 'inhuman',
            );
        }
        return $this->setStatusCode($result['status'])->respond($result, $transMessage);
    }
     public function Medication(Request $request, $lokal = null)
{
    
        ini_set('max_execution_time', 0);
    try {
        $kdProfile = $this->kdProfile;
        $idProduk = $request->input('id');

        if (empty($idProduk) || !is_numeric($idProduk)) {
            throw new \Exception('ID produk SIMRS tidak valid');
        }

        $data = collect(DB::select("
            SELECT
                kd.*,
                kd.id AS idprodukna,
                prof.ihs_id AS ihs_profile,
                prof.namalengkap AS namaprofile,
                mbh.ihs_bahanzat,
                mbh.qtynum,
                mbh.qtydenom,
                mbh.numerartorsatuanfk,
                mbh.denomsatuanfk,
                bh.nama AS bahanzat,
                sed.nama AS ihs_sediaan_display,
                kff.namaproduk AS kfa_display
            FROM produk_m AS kd
            LEFT JOIN profile_m AS prof
                ON prof.id = kd.kdprofile
            LEFT JOIN ihs_map_bahanzat AS mbh
                ON mbh.produkfk = kd.id
                AND mbh.aktif = true
            LEFT JOIN ihs_bahanzat AS bh
                ON bh.id = mbh.ihs_bahanzat
            LEFT JOIN ihs_sediaan AS sed
                ON sed.id = kd.ihs_sediaan
            LEFT JOIN ihs_kode_kf_a AS kff
                ON kff.id = kd.ihs_kfa_code
            WHERE kd.kdprofile = ?
                AND kd.statusenabled = true
                AND kd.id = ?
        ", array($kdProfile, $idProduk)));

        if ($data->isEmpty()) {
            throw new \Exception(
                'Produk tidak ditemukan dengan ID SIMRS ' . $idProduk
            );
        }

        $q = $data->first();

        if (empty($q->ihs_profile)) {
            throw new \Exception('IHS ID profile belum tersedia');
        }

        if (empty($q->ihs_kfa_code)) {
            throw new \Exception(
                'Kode KFA belum diisi untuk produk ' . $q->namaproduk
            );
        }

        if (empty($q->ihs_sediaan)) {
            throw new \Exception(
                'Kode sediaan belum diisi untuk produk ' . $q->namaproduk
            );
        }

        $ingredients = array();

        foreach ($data as $item) {
            if (empty($item->ihs_bahanzat)) {
                continue;
            }

            if (
                $item->qtynum === null ||
                $item->qtydenom === null ||
                empty($item->numerartorsatuanfk) ||
                empty($item->denomsatuanfk)
            ) {
                throw new \Exception(
                    'Komposisi atau satuan bahan zat belum lengkap untuk ' .
                    $item->namaproduk
                );
            }

            $ingredients[] = array(
                'itemCodeableConcept' => array(
                    'coding' => array(
                        array(
                            'system' => 'http://sys-ids.kemkes.go.id/kfa',
                            'code' => (string) $item->ihs_bahanzat,
                            'display' => $item->bahanzat
                        )
                    )
                ),
                'isActive' => true,
                'strength' => array(
                    'numerator' => array(
                        'value' => (float) $item->qtynum,
                        'system' => 'http://unitsofmeasure.org',
                        'code' => (string) $item->numerartorsatuanfk
                    ),
                    'denominator' => array(
                        'value' => (float) $item->qtydenom,
                        'system' => 'http://terminology.hl7.org/CodeSystem/v3-orderableDrugForm',
                        'code' => (string) $item->denomsatuanfk
                    )
                )
            );
        }

        $batch = StokProdukDetail::where(
            'objectprodukfk',
            $q->idprodukna
        )
            ->where('qtyproduk', '>', 0)
            ->whereNotNull('nobatch')
            ->whereNotNull('tglkadaluarsa')
            ->orderBy('tglkadaluarsa', 'asc')
            ->first();

        $identifierSystem = 'http://sys-ids.kemkes.go.id/medication/' .
            $q->ihs_profile;

        $identifierValue = (string) $q->idprodukna;

        $medication = array(
            'resourceType' => 'Medication',
            'identifier' => array(
                array(
                    'system' => $identifierSystem,
                    'use' => 'official',
                    'value' => $identifierValue
                )
            ),
            'code' => array(
                'coding' => array(
                    array(
                        'system' => 'http://sys-ids.kemkes.go.id/kfa',
                        'code' => trim((string) $q->ihs_kfa_code),
                        'display' => $q->kfa_display
                    )
                )
            ),
            'status' => 'active',
            'manufacturer' => array(
                'reference' => 'Organization/' . $q->ihs_profile
            ),
            'form' => array(
                'coding' => array(
                    array(
                        'system' => 'http://terminology.kemkes.go.id/CodeSystem/medication-form',
                        'code' => (string) $q->ihs_sediaan,
                        'display' => $q->ihs_sediaan_display
                    )
                )
            ),
            'ingredient' => $ingredients,
            'extension' => array(
                array(
                    'url' => 'https://fhir.kemkes.go.id/r4/StructureDefinition/MedicationType',
                    'valueCodeableConcept' => array(
                        'coding' => array(
                            array(
                                'system' => 'http://terminology.kemkes.go.id/CodeSystem/medication-type',
                                'code' => 'NC',
                                'display' => 'Non-compound'
                            )
                        )
                    )
                )
            )
        );

        if ($batch) {
            $medication['batch'] = array(
                'lotNumber' => $batch->nobatch,
                'expirationDate' => date(
                    'Y-m-d',
                    strtotime($batch->tglkadaluarsa)
                )
            );
        }

        $uuidPattern = '/^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/i';

        $normalizeResponse = function ($result) {
            if (is_string($result)) {
                $decoded = json_decode($result);

                if (json_last_error() === JSON_ERROR_NONE) {
                    return $decoded;
                }

                return (object) array(
                    'resourceType' => 'OperationOutcome',
                    'issue' => array(
                        array(
                            'severity' => 'error',
                            'code' => 'exception',
                            'details' => array(
                                'text' => 'Respons SATUSEHAT bukan JSON valid'
                            )
                        )
                    )
                );
            }

            if (is_array($result)) {
                return json_decode(json_encode($result));
            }

            return $result;
        };

        $sendRequest = function ($method, $url, $payload = array()) {
            $ihsRequest = new \Illuminate\Http\Request();

            $ihsRequest->replace(array(
                'url' => $url,
                'method' => $method,
                'data' => $payload
            ));

            return $this->ihsTools($ihsRequest, true);
        };

        $isNotFound = function ($result) {
            if (
                !is_object($result) ||
                !isset($result->resourceType) ||
                $result->resourceType !== 'OperationOutcome'
            ) {
                return false;
            }

            $json = json_encode($result);

            return strpos($json, 'not-found') !== false ||
                strpos($json, 'Not Found') !== false ||
                strpos($json, 'not found') !== false;
        };

        $findExistingMedication = function () use (
            $sendRequest,
            $normalizeResponse,
            $identifierSystem,
            $identifierValue,
            $uuidPattern
        ) {
            $searchUrl = 'Medication?identifier=' . urlencode(
                $identifierSystem . '|' . $identifierValue
            );

            $searchResponse = $normalizeResponse(
                $sendRequest('GET', $searchUrl)
            );

            if (
                !is_object($searchResponse) ||
                !isset($searchResponse->resourceType) ||
                $searchResponse->resourceType !== 'Bundle' ||
                empty($searchResponse->entry)
            ) {
                return null;
            }

            foreach ($searchResponse->entry as $entry) {
                if (
                    isset($entry->resource->resourceType) &&
                    $entry->resource->resourceType === 'Medication' &&
                    isset($entry->resource->id) &&
                    preg_match(
                        $uuidPattern,
                        (string) $entry->resource->id
                    )
                ) {
                    return (string) $entry->resource->id;
                }
            }

            return null;
        };

        $storedId = trim((string) $q->ihs_id);
        $ihsId = null;
        $url = 'Medication';
        $method = 'POST';
        $response = null;

        if ($storedId !== '' && preg_match($uuidPattern, $storedId)) {
            $method = 'PUT';
            $url = 'Medication/' . $storedId;
            $medication['id'] = $storedId;

            $response = $normalizeResponse(
                $sendRequest($method, $url, $medication)
            );

            if (!$isNotFound($response)) {
                $ihsId = $storedId;
            }
        }

        if (
            $storedId === '' ||
            !preg_match($uuidPattern, $storedId) ||
            $isNotFound($response)
        ) {
            $foundId = $findExistingMedication();

            if ($foundId) {
                $ihsId = $foundId;
                $method = 'PUT';
                $url = 'Medication/' . $foundId;
                $medication['id'] = $foundId;

                $response = $normalizeResponse(
                    $sendRequest($method, $url, $medication)
                );
            } else {
                unset($medication['id']);

                $ihsId = null;
                $method = 'POST';
                $url = 'Medication';

                $response = $normalizeResponse(
                    $sendRequest($method, $url, $medication)
                );
            }
        }

        $isError = !is_object($response) ||
            !isset($response->resourceType) ||
            $response->resourceType !== 'Medication' ||
            empty($response->id) ||
            !preg_match($uuidPattern, (string) $response->id);

        if (!$isError) {
            $ihsId = (string) $response->id;

            Produk::where('id', $q->idprodukna)
                ->where('kdprofile', $kdProfile)
                ->update(array(
                    'ihs_id' => $ihsId
                ));
        } elseif (
            isset($response->resourceType) &&
            $response->resourceType === 'Medication'
        ) {
            $isError = true;
        }

        $mod = null;

        if ($ihsId && preg_match($uuidPattern, $ihsId)) {
            $mod = IHS_Transaction::where('id', $ihsId)->first();
        }

        if (!$mod) {
            $mod = new IHS_Transaction();
            $mod->norec = $mod->generateNewId();
            $mod->kdprofile = $kdProfile;
        }

        $mod->statusenabled = !$isError;
        $mod->resourcetype = 'Medication';
        $mod->url = $this->endPoint() . $url;
        $mod->method = $method;
        $mod->id = $ihsId;
        $mod->body = json_encode($medication);
        $mod->response = json_encode($response);
        $mod->date = date('Y-m-d H:i:s');
        $mod->save();

    } catch (\Exception $e) {
        $response = array(
            'resourceType' => 'OperationOutcome',
            'issue' => array(
                array(
                    'severity' => 'error',
                    'code' => 'exception',
                    'details' => array(
                        'text' => $e->getMessage()
                    ),
                    'diagnostics' => 'Line: ' . $e->getLine()
                )
            )
        );
    }

    if ($lokal == true) {
        return $response;
    }

    return response()->json($response);
}
    public function MedicationRequest(Request $request, $lokal = null)
    {
        $response = array(
            'resourceType' => 'OperationOutcome',
            'issue' => array()
        );

        try {
            $kdProfile = $this->kdProfile;
            $noOrder = $request->input('noorder');

            if (empty($noOrder)) {
                throw new \Exception('No order tidak boleh kosong');
            }

            $q = collect(DB::select("
                SELECT
                    so.noorder,
                    op.rke,
                    jk.jeniskemasan,
                    pr.namaproduk,
                    ss.satuanstandar,
                    op.aturanpakai,
                    op.jumlah,
                    op.hargasatuan,
                    op.keteranganpakai AS keterangan,
                    op.satuanresepfk,
                    sn.satuanresep,
                    op.tglkadaluarsa,
                    pr.id AS idproduk,
                    op.ihs_id AS ihs_medication_request,
                    CASE
                        WHEN ru.objectdepartemenfk = 16 THEN 'inpatient'
                        ELSE 'outpatient'
                    END AS code_class,
                    CASE
                        WHEN ru.objectdepartemenfk = 16 THEN 'Inpatient'
                        ELSE 'Outpatient'
                    END AS name_class,
                    ru.namaruangan,
                    pr.ihs_id AS ihs_medication,
                    pd.ihs_id AS ihs_encounter,
                    ps.ihs_number AS ihs_patient,
                    ps.namapasien,
                    so.tglorder,
                    CASE
                        WHEN pg.ihs_id IS NULL THEN pg2.ihs_id
                        ELSE pg.ihs_id
                    END AS ihs_practitioner,
                    CASE
                        WHEN pg.ihs_id IS NULL THEN pg2.namalengkap
                        ELSE pg.namalengkap
                    END AS pegawaiorder,
                    pr.ihs_denominator_code,
                    pr.ihs_kfa_display,
                    op.norec AS norec_op,
                    op.ihs_noorder
                FROM strukorder_t AS so
                INNER JOIN orderpelayanan_t AS op
                    ON op.strukorderfk = so.norec
                INNER JOIN produk_m AS pr
                    ON pr.id = op.objectprodukfk
                INNER JOIN pasiendaftar_t AS pd
                    ON pd.norec = so.noregistrasifk
                INNER JOIN pasien_m AS ps
                    ON ps.id = pd.nocmfk
                LEFT JOIN jeniskemasan_m AS jk
                    ON jk.id = op.jeniskemasanfk
                LEFT JOIN satuanstandar_m AS ss
                    ON ss.id = op.objectsatuanstandarfk
                LEFT JOIN pegawai_m AS pg
                    ON pg.id = so.objectpegawaiorderfk
                LEFT JOIN pegawai_m AS pg2
                    ON pg2.id = pd.objectpegawaifk
                LEFT JOIN satuanresep_m AS sn
                    ON sn.id = op.satuanresepfk
                INNER JOIN ruangan_m AS ru
                    ON ru.id = so.objectruanganfk
                WHERE so.noorder = ?
                    AND so.statusenabled = true
                    AND so.kdprofile = ?
                ORDER BY op.rke, op.norec
            ", array($noOrder, $kdProfile)));

            if ($q->isEmpty()) {
                $response = array(
                    'resourceType' => 'OperationOutcome',
                    'issue' => array(
                        array(
                            'severity' => 'error',
                            'code' => 'not-found',
                            'details' => array(
                                'text' => 'MedicationRequest belum ada untuk order ' . $noOrder
                            )
                        )
                    )
                );

                return $lokal ? $response : response()->json($response);
            }

            $profile = Profile::where('statusenabled', true)->first();

            if (!$profile || empty($profile->ihs_id)) {
                throw new \Exception('IHS ID profile belum tersedia');
            }

            $idProduk = $q->pluck('idproduk')->unique()->values()->all();

            $ingredientsS = DB::table('ihs_map_bahanzat AS mm1')
                ->leftJoin(
                    'ihs_numerator_satuan AS mm',
                    'mm.id',
                    '=',
                    'mm1.numerartorsatuanfk'
                )
                ->leftJoin(
                    'ihs_denom_satuan AS mm3',
                    'mm3.id',
                    '=',
                    'mm1.denomsatuanfk'
                )
                ->leftJoin(
                    'ihs_bahanzat AS bh',
                    'bh.id',
                    '=',
                    'mm1.ihs_bahanzat'
                )
                ->select(
                    'mm1.*',
                    'mm.nama AS numerator',
                    'mm3.nama AS denominator',
                    'mm1.qtynum AS denominatorvalue',
                    'mm1.qtydenom AS numeratorvalue',
                    'mm.id AS numeratorfk',
                    'mm3.id AS denominatorfk',
                    'mm1.aktif AS isactive',
                    'mm1.ihs_bahanzat AS komposisizatfk',
                    'bh.nama AS komposisizat'
                )
                ->whereIn('mm1.produkfk', $idProduk)
                ->get();

            $total = $q->count();
            $berhasil = 0;
            $gagal = 0;
            $detail = array();

            foreach ($q as $k => $item) {
                $itemResponse = null;

                try {
                    $medicationRequestId = trim((string) $item->ihs_medication_request);
                    $method = $medicationRequestId !== '' ? 'PUT' : 'POST';

                    if (empty($item->ihs_medication)) {
                        throw new \Exception(
                            'IHS Medication belum tersedia untuk produk ' .
                            $item->namaproduk . ' (ID ' . $item->idproduk . ')'
                        );
                    }

                    if (empty($item->ihs_patient)) {
                        throw new \Exception(
                            'IHS Patient belum tersedia untuk pasien ' . $item->namapasien
                        );
                    }

                    if (empty($item->ihs_encounter)) {
                        throw new \Exception(
                            'IHS Encounter belum tersedia untuk order ' . $item->noorder
                        );
                    }

                    if (empty($item->ihs_practitioner)) {
                        throw new \Exception(
                            'IHS Practitioner belum tersedia untuk order ' . $item->noorder
                        );
                    }

                    $tanggalOrder = strtotime($item->tglorder);

                    if ($tanggalOrder === false) {
                        throw new \Exception(
                            'Tanggal order tidak valid: ' . $item->noorder
                        );
                    }

                    $tanggalAuthored = gmdate('Y-m-d\TH:i:s\Z', $tanggalOrder);

                    $repeatFrequency = 1;
                    $repeatPeriod = 1;
                    $aturanPakai = trim((string) $item->aturanpakai);

                    if (preg_match(
                        '/^\s*(\d+(?:[.,]\d+)?)\s*x\s*(\d+(?:[.,]\d+)?)\s*$/i',
                        $aturanPakai,
                        $matches
                    )) {
                        $repeatFrequency = (float) str_replace(',', '.', $matches[1]);
                        $repeatPeriod = (float) str_replace(',', '.', $matches[2]);
                    }

                    $repeatFrequency = $repeatFrequency > 0 ? $repeatFrequency : 1;
                    $repeatPeriod = $repeatPeriod > 0 ? $repeatPeriod : 1;

                    $data = array(
                        'resourceType' => 'MedicationRequest',
                        'identifier' => array(
                            array(
                                'system' => 'http://sys-ids.kemkes.go.id/prescription/' .
                                    $profile->ihs_id,
                                'use' => 'official',
                                'value' => $item->noorder
                            ),
                            array(
                                'system' => 'http://sys-ids.kemkes.go.id/prescription-item/' .
                                    $profile->ihs_id,
                                'use' => 'official',
                                'value' => $item->noorder . '-' . ($k + 1)
                            )
                        ),
                        'status' => 'completed',
                        'intent' => 'order',
                        'category' => array(
                            array(
                                'coding' => array(
                                    array(
                                        'system' => 'http://terminology.hl7.org/CodeSystem/medicationrequest-category',
                                        'code' => $item->code_class,
                                        'display' => $item->name_class
                                    )
                                )
                            )
                        ),
                        'priority' => 'routine',
                        'medicationReference' => array(
                            'reference' => 'Medication/' . $item->ihs_medication,
                            'display' => $item->namaproduk
                        ),
                        'subject' => array(
                            'reference' => 'Patient/' . $item->ihs_patient,
                            'display' => $item->namapasien
                        ),
                        'encounter' => array(
                            'reference' => 'Encounter/' . $item->ihs_encounter
                        ),
                        'authoredOn' => $tanggalAuthored,
                        'requester' => array(
                            'reference' => 'Practitioner/' . $item->ihs_practitioner,
                            'display' => $item->pegawaiorder
                        ),
                        'dosageInstruction' => array(
                            array(
                                'sequence' => 1,
                                'text' => $aturanPakai,
                                'patientInstruction' => $item->keterangan,
                                'timing' => array(
                                    'repeat' => array(
                                        'frequency' => $repeatFrequency,
                                        'period' => $repeatPeriod,
                                        'periodUnit' => 'd'
                                    )
                                ),
                                'route' => array(
                                    'coding' => array(
                                        array(
                                            'system' => 'http://snomed.info/sct',
                                            'code' => '26643006',
                                            'display' => 'Oral route'
                                        )
                                    )
                                ),
                                'doseAndRate' => array(
                                    array(
                                        'doseQuantity' => array(
                                            'value' => (float) $item->jumlah,
                                            'unit' => $item->satuanstandar ?: 'unit',
                                            'system' => 'http://unitsofmeasure.org',
                                            'code' => $item->ihs_denominator_code ?: '1'
                                        )
                                    )
                                )
                            )
                        ),
                        'dispenseRequest' => array(
                            'numberOfRepeatsAllowed' => 0,
                            'quantity' => array(
                                'value' => (float) $item->jumlah,
                                'unit' => $item->satuanstandar ?: 'unit',
                                'system' => 'http://unitsofmeasure.org',
                                'code' => $item->ihs_denominator_code ?: '1'
                            )
                        )
                    );

                    if ($method === 'PUT') {
                        $data['id'] = $medicationRequestId;
                    }

                    $objetoRequest = new \Illuminate\Http\Request();
                    $objetoRequest->replace(array(
                        'url' => $method === 'PUT'
                            ? 'MedicationRequest/' . $medicationRequestId
                            : 'MedicationRequest',
                        'method' => $method,
                        'data' => $data
                    ));

                    $itemResponse = $this->ihsTools($objetoRequest, true);

                    if (is_array($itemResponse)) {
                        $itemResponse = json_decode(json_encode($itemResponse));
                    }

                    if (
                        !is_object($itemResponse) ||
                        (isset($itemResponse->resourceType) &&
                        $itemResponse->resourceType === 'OperationOutcome')
                    ) {
                        $pesanError = 'Gagal mengirim MedicationRequest';

                        if (
                            isset($itemResponse->issue[0]->details->text)
                        ) {
                            $pesanError = $itemResponse->issue[0]->details->text;
                        } elseif (isset($itemResponse->issue[0]->diagnostics)) {
                            $pesanError = $itemResponse->issue[0]->diagnostics;
                        }

                        throw new \Exception($pesanError);
                    }

                    if (empty($itemResponse->id)) {
                        throw new \Exception(
                            'Respons IHS tidak mengembalikan ID MedicationRequest'
                        );
                    }

                    OrderPelayanan::where('norec', $item->norec_op)->update(array(
                        'ihs_id' => $itemResponse->id,
                        'ihs_noorder' => $data['identifier'][1]['value']
                    ));

                    $berhasil++;

                    $detail[] = array(
                        'noorder' => $item->noorder,
                        'norec' => $item->norec_op,
                        'produk' => $item->namaproduk,
                        'method' => $method,
                        'status' => true,
                        'id' => $itemResponse->id,
                        'response' => $itemResponse
                    );
                } catch (\Exception $e) {
                    $gagal++;

                    $detail[] = array(
                        'noorder' => $item->noorder,
                        'norec' => $item->norec_op,
                        'produk' => $item->namaproduk,
                        'method' => isset($method) ? $method : null,
                        'status' => false,
                        'error' => $e->getMessage(),
                        'response' => $itemResponse
                    );
                }
            }

            $response = array(
                'resourceType' => 'OperationOutcome',
                'noorder' => $noOrder,
                'total' => $total,
                'berhasil' => $berhasil,
                'gagal' => $gagal,
                'detail' => $detail
            );
        } catch (\Exception $e) {
            $response = array(
                'resourceType' => 'OperationOutcome',
                'issue' => array(
                    array(
                        'severity' => 'error',
                        'code' => 'exception',
                        'details' => array(
                            'text' => $e->getMessage()
                        ),
                        'diagnostics' => 'Line: ' . $e->getLine()
                    )
                )
            );
        }

        if ($lokal == true) {
            return $response;
        }

        return response()->json($response);
    }
    public function MedicationDispense(Request $request, $lokal = null)
    {
        try {
            $kdProfile = $this->kdProfile;
            $q  =  collect(DB::select(" 

                 SELECT
                sr.noresep,
                pp.hargasatuan,
                pp.stock,
                apd.objectruanganfk,
                ru.namaruangan,
                pp.rke,
                pp.jeniskemasanfk,
                jk.id AS jkid,
                jk.jeniskemasan,
                pp.aturanpakai,
                pp.routefk,
                rt.name AS namaroute,
                pp.produkfk,
                pp.produkfk as idproduk,
                pr.namaproduk,
                pp.nilaikonversi,
                pr.objectsatuanstandarfk,
                ss.satuanstandar,
                pp.satuanviewfk,
                ss2.satuanstandar AS ssview,
                pp.jumlah,
                pp.hargadiscount,
                pp.dosis,
                pp.jenisobatfk,
                pp.jasa,
                pp.hargajual,
                pp.hargasatuan,
                pp.strukterimafk,
                pp.qtydetailresep,
                pp.ispagi,
                pp.issiang,
                pp.ismalam,
                pp.issore,
                pr.kekuatan,
                pp.keteranganpakai,
                pp.iskronis,
                pp.satuanresepfk,
                sn.satuanresep,
                pp.tglkadaluarsa 
                ,pp.ihs_id as ihs_medicationdispense
                ,case when ru.objectdepartemenfk=16 then  'inpatient' else 'outpatient'  end as code_class
                ,case when ru.objectdepartemenfk=16 then  'Inpatient' else 'Outpatient'  end as name_class
                ,ru.namaruangan
                ,pr.ihs_id as ihs_medication
                ,pd.ihs_id as ihs_encounter
                ,ps.ihs_number as ihs_patient
                ,ps.namapasien
                ,case when pg.ihs_id is null then pg2.ihs_id else pg.ihs_id end as ihs_practitioner
                ,case when pg.ihs_id is null then pg2.namalengkap else pg.namalengkap end as penulisresep
                ,ru2.ihs_id as ihs_apotik
                ,ru2.namaruangan as ihs_apotik_display
                ,op.ihs_id as ihs_medication_request
                ,pr.ihs_denominator_code
                ,sr.tglresep
                ,pr.ihs_kfa_display
                ,pp.norec as norec_pp
            FROM
                strukresep_t AS sr
                INNER JOIN pelayananpasien_t AS pp ON pp.strukresepfk = sr.norec
                INNER JOIN antrianpasiendiperiksa_t AS apd ON apd.norec = pp.noregistrasifk
                INNER JOIN ruangan_m AS ru ON ru.id = apd.objectruanganfk
                INNER JOIN ruangan_m AS ru2 ON ru2.id = sr.ruanganfk
                INNER JOIN jeniskemasan_m AS jk ON jk.id = pp.jeniskemasanfk
                LEFT JOIN routefarmasi AS rt ON rt.id = pp.routefk
                INNER JOIN produk_m AS pr ON pr.id = pp.produkfk
                INNER JOIN satuanstandar_m AS ss ON ss.id = pr.objectsatuanstandarfk
                INNER JOIN satuanstandar_m AS ss2 ON ss2.id = pp.satuanviewfk
                LEFT JOIN satuanresep_m AS sn ON sn.id = pp.satuanresepfk 
                inner join pasiendaftar_t as pd on pd.norec=apd.noregistrasifk
                inner join pasien_m as ps on ps.id=pd.nocmfk
                left join pegawai_m as pg on pg.id=sr.penulisresepfk
                left join pegawai_m as pg2 on pg2.id=pd.objectpegawaifk
                left join orderpelayanan_t as op on sr.orderfk = op.strukorderfk and op.objectprodukfk = pr.id
            WHERE
                sr.kdprofile = $kdProfile 
                AND sr.noresep = '$request[noresep]'
                and sr.statusenabled=true
                
                "));

            if (count($q) == 0) {
                $response = array(
                    "issue" => 'MedicationDispense belum ada',
                    "resourceType" => "OperationOutcome"
                );
                if ($lokal == true) {
                    return $response;
                }
                return response()->json($response);
            }
            $IDpRODUK = [];
            foreach ($q as $k =>  $item) {
                $IDpRODUK[] = $item->idproduk;
            }

            $ingredientsS = DB::table('ihs_map_bahanzat as mm1')
                ->leftJoin('ihs_numerator_satuan as mm', 'mm.id', '=', 'mm1.numerartorsatuanfk')
                ->leftJoin('ihs_denom_satuan as mm3', 'mm3.id', '=', 'mm1.denomsatuanfk')
                ->leftJoin('ihs_bahanzat as bh', 'bh.id', '=', 'mm1.ihs_bahanzat')
                ->select(
                    'mm1.*',
                    'mm.nama as numerator',
                    'mm3.nama as denominator',
                    'mm1.qtynum as denominatorvalue',
                    'mm1.qtydenom as numeratorvalue',
                    'mm.id as numeratorfk',
                    'mm3.id as denominatorfk',
                    'mm1.aktif as isactive',
                    'mm1.ihs_bahanzat as komposisizatfk',
                    'bh.nama as komposisizat'
                )
                ->whereiN('mm1.produkfk', $IDpRODUK)
                ->get();

            $profile = Profile::where('statusenabled', true)->first();
            foreach ($q as $k =>  $item) {
                $tglresep =    strtotime(date($item->tglresep));
                $tglresep =  substr(date("Y-m-d\TH:i:s", $tglresep), 0, 23) . date('P', $tglresep);
                $repeat_period = 1;
                $repeat_frequency = 1;
                $arr = explode('x', $item->aturanpakai);
                if (count($arr) == 2) {
                    $repeat_frequency = (float)$arr[0];
                    $repeat_period = (float) $arr[1];
                }
                $DoseQtyunitUnit = $item->satuanstandar;
                $DoseQtyunitCode = $item->satuanstandar;
                foreach ($ingredientsS as $ing) {
                    if ($ing->produkfk == $item->idproduk) {
                        if ($ing->denominator != null) {
                            $DoseQtyunitUnit = $ing->denominator;
                            $DoseQtyunitCode = $ing->denominatorfk;
                        }
                    }
                }
                $data = array(
                    'id' => $item->ihs_medicationdispense,
                    'resourceType' => 'MedicationDispense',
                    'identifier' =>
                    array(
                        0 =>
                        array(
                            'system' => 'http://sys-ids.kemkes.go.id/prescription/' . $profile->ihs_id,
                            'use' => 'official',
                            'value' =>   $item->noresep,
                        ),
                        1 =>
                        array(
                            'system' => 'http://sys-ids.kemkes.go.id/prescription-item/' . $profile->ihs_id,
                            'use' => 'official',
                            'value' => $item->noresep . '-' . ($k + 1),
                        ),
                    ),
                    'status' => 'completed',
                    'category' =>
                    array(
                        'coding' =>
                        array(
                            0 =>
                            array(
                                'system' => 'http://terminology.hl7.org/fhir/CodeSystem/medicationdispense-category',
                                'code' => $item->code_class,
                                'display' => $item->name_class,
                            ),
                        ),
                    ),
                    'medicationReference' =>
                    array(
                        'reference' => 'Medication/' . $item->ihs_medication,
                        'display' => $item->ihs_kfa_display != null ? $item->ihs_kfa_display : $item->namaproduk,
                    ),
                    'subject' =>
                    array(
                        'reference' => 'Patient/' . $item->ihs_patient,
                        'display' => $item->namapasien,
                    ),
                    'context' =>
                    array(
                        'reference' => 'Encounter/' . $item->ihs_encounter,
                    ),
                    'performer' =>
                    array(
                        0 =>
                        array(
                            'actor' =>
                            array(
                                'reference' => 'Practitioner/' . $item->ihs_practitioner,
                                'display' => $item->penulisresep,
                            ),
                        ),
                    ),
                    'location' =>
                    array(
                        'reference' => 'Location/' . $item->ihs_apotik,
                        'display' =>  $item->ihs_apotik_display,
                    ),
                    'authorizingPrescription' =>
                    array(
                        0 =>
                        array(
                            'reference' => 'MedicationRequest/' . $item->ihs_medication_request,
                        ),
                    ),
                    'quantity' =>
                    array(
                        'system' => 'http://terminology.hl7.org/CodeSystem/v3-orderableDrugForm',
                        'code' => $DoseQtyunitCode,
                        'value' => (float)$item->jumlah,
                    ),
                    'daysSupply' =>
                    array(
                        'value' => 1,
                        'unit' => 'Day',
                        'system' => 'http://unitsofmeasure.org',
                        'code' => 'd',
                    ),
                    'whenPrepared' => $tglresep,
                    'whenHandedOver' => $tglresep,
                    'dosageInstruction' =>
                    array(
                        0 =>
                        array(
                            'sequence' => 1,
                            'text' => $item->aturanpakai,
                            'timing' =>
                            array(
                                'repeat' =>
                                array(
                                    'frequency' => $repeat_frequency,
                                    'period' => $repeat_period,
                                    'periodUnit' => 'd',
                                ),
                            ),
                            'doseAndRate' =>
                            array(
                                0 =>
                                array(
                                    'type' =>
                                    array(
                                        'coding' =>
                                        array(
                                            0 =>
                                            array(
                                                'system' => 'http://terminology.hl7.org/CodeSystem/dose-rate-type',
                                                'code' => 'ordered',
                                                'display' => 'Ordered',
                                            ),
                                        ),
                                    ),
                                    'doseQuantity' =>
                                    array(
                                        'value' => (float) $item->jumlah,
                                        'unit' => $DoseQtyunitUnit,
                                        'system' => 'http://terminology.hl7.org/CodeSystem/v3-orderableDrugForm',
                                        'code' =>  $DoseQtyunitCode,
                                    ),
                                ),
                            ),
                        ),
                    ),
                );




                if ($item->ihs_medicationdispense == null) {
                    unset($data['id']);
                }
                if ($item->ihs_medication_request == null) {
                    unset($data['authorizingPrescription']);
                }

                $objetoRequest = new \Illuminate\Http\Request();
                $objetoRequest['url'] = $data['resourceType'];
                $objetoRequest['method'] = $item->ihs_medicationdispense == null ? 'POST' : 'PUT';
                $objetoRequest['data'] = $data;

                $response =  $this->ihsTools($objetoRequest, true);
                $noterror = true;
                if ($response->resourceType == 'OperationOutcome') {
                    $noterror = false;
                }

                if ($item->ihs_medicationdispense == null) {
                    $mod = new IHS_Transaction();
                    $mod->norec = $mod->generateNewId();
                    $mod->statusenabled = $noterror;
                    $mod->kdprofile = $this->kdProfile;
                } else {
                    $mod = IHS_Transaction::where('id', $item->ihs_medicationdispense)->first();
                }
                if (empty($mod)) {
                    $mod = new IHS_Transaction();
                    $mod->norec = $mod->generateNewId();
                    $mod->statusenabled = $noterror;
                    $mod->kdprofile = $this->kdProfile;
                }
                $mod->resourcetype = $data['resourceType'];
                $mod->url =  $this->endPoint() . $data['resourceType'];
                $mod->method = 'POST';
                $mod->id = isset($response->id) ? $response->id : null;
                $mod->body = json_encode($data);
                $mod->response = json_encode($response);
                $mod->date = date('Y-m-d H:i:s');
                $mod->save();
                if (isset($response->id)) {
                    PelayananPasien::where('norec', $item->norec_pp)->update([
                        'ihs_id' => $response->id,
                        'ihs_noresep' => $data['identifier'][1]['value']
                    ]);
                }
            }
        } catch (\Exception $e) {
            $response = array(
                "issue" => $e->getMessage() . ' ' . $e->getLine(),
                "resourceType" => "OperationOutcome"
            );
        }
        if ($lokal == true) {
            return $response;
        }
        return response()->json($response);
    }
    public function MedicationDispenseObatBebas(Request $request, $lokal = null)
    {
        try {
            $kdProfile = $this->kdProfile;
            $q  =  collect(DB::select(" 

            SELECT
                sp.tglstruk as tglresep
                ,sp.nostruk as noresep
                ,spd.aturanpakai
                ,sp.nostruk_intern
                ,sp.namapasien_klien
                ,spd.qtyproduk  as jumlah
                ,( ( spd.hargasatuan - spd.hargadiscount ) * spd.qtyproduk ) + spd.hargatambahan AS total,
                spd.tglkadaluarsa 
                ,spd.ihs_id as ihs_medicationdispense
                ,pr.id as idproduk
                ,pr.namaproduk
                ,ss.satuanstandar
                ,case when ru.objectdepartemenfk=16 then  'inpatient' else 'outpatient'  end as code_class
                ,case when ru.objectdepartemenfk=16 then  'Inpatient' else 'Outpatient'  end as name_class
                ,pr.ihs_id as ihs_medication
                ,pg.ihs_id  as ihs_practitioner
                ,pg.namalengkap  as penulisresep
                ,ru.ihs_id as ihs_apotik
                ,ru.namaruangan as ihs_apotik_display
                ,spd.norec as norec_pp
                ,pr.ihs_kfa_code
                ,ko.namaproduk as  ihs_kfa_display
                ,pr.ihs_sediaan
                ,sed.nama as ihs_sediaan_display
                ,spd.urn_uuid_medication
                ,sp.ihs_bundle
                ,sp.norec as norec_sp
            FROM
                strukpelayanan_t AS sp
                INNER join strukpelayanandetail_t as spd on spd.nostrukfk=sp.norec
                LEFT JOIN pegawai_m AS pg ON pg.ID = sp.objectpegawaipenanggungjawabfk
                LEFT JOIN ruangan_m AS ru ON ru.ID = sp.objectruanganfk
                LEFT JOIN produk_m AS pr ON pr.ID = spd.objectprodukfk
                LEFT JOIN jeniskemasan_m AS jkm ON jkm.ID = spd.objectjeniskemasanfk
                LEFT JOIN satuanstandar_m AS ss ON ss.ID = spd.objectsatuanstandarfk 
                left join ihs_kode_kf_a as ko on ko.id=pr.ihs_kfa_code
                LEFT JOIN ihs_sediaan AS sed ON sed.ID = pr.ihs_sediaan 
                WHERE
                sp.kdprofile = $kdProfile 
                and sp.nostruk = '$request[noresep]'
                AND sp.statusenabled = true
            ORDER BY
                sp.nostruk ASC
                
                "));

            if (count($q) == 0) {
                $response = array(
                    "issue" => 'MedicationDispense belum ada',
                    "resourceType" => "OperationOutcome"
                );
                if ($lokal == true) {
                    return $response;
                }
                return response()->json($response);
            }

            $IDpRODUK = [];
            foreach ($q as $k =>  $item) {
                $IDpRODUK[] = $item->idproduk;
            }
            $SPD =  StokProdukDetail::whereIn('objectprodukfk', $IDpRODUK)
                ->where('qtyproduk', '>', 0)
                ->orderBy('tglkadaluarsa', 'desc')
                ->get();


            $ingredientsS = DB::table('ihs_map_bahanzat as mm1')
                ->leftJoin('ihs_numerator_satuan as mm', 'mm.id', '=', 'mm1.numerartorsatuanfk')
                ->leftJoin('ihs_denom_satuan as mm3', 'mm3.id', '=', 'mm1.denomsatuanfk')
                ->leftJoin('ihs_bahanzat as bh', 'bh.id', '=', 'mm1.ihs_bahanzat')
                ->select(
                    'mm1.*',
                    'mm.nama as numerator',
                    'mm3.nama as denominator',
                    'mm1.qtynum as denominatorvalue',
                    'mm1.qtydenom as numeratorvalue',
                    'mm.id as numeratorfk',
                    'mm3.id as denominatorfk',
                    'mm1.aktif as isactive',
                    'mm1.ihs_bahanzat as komposisizatfk',
                    'bh.nama as komposisizat'
                )
                ->whereiN('mm1.produkfk', $IDpRODUK)
                ->get();
            $profile = Profile::where('statusenabled', true)->first();
            $entry = [];


            foreach ($q as $k =>  $item) {
                $tglresep =    strtotime(date($item->tglresep));
                $tglresep =  substr(date("Y-m-d\TH:i:s", $tglresep), 0, 23) . date('P', $tglresep);
                $repeat_period = 1;
                $repeat_frequency = 1;
                $arr = explode('x', $item->aturanpakai);
                if (count($arr) == 2) {
                    $repeat_frequency = (float)$arr[0];
                    $repeat_period = (float) $arr[1];
                }
                $medi_DoseQtyunitUnit = $item->satuanstandar;
                $medi_DoseQtyunitCode = $item->satuanstandar;
                $medi_kodeKamusKFAobat = $item->ihs_kfa_code ? $item->ihs_kfa_code : '';
                $medi_namaKamusKFAobat = $item->ihs_kfa_display ? $item->ihs_kfa_display : $item->namaproduk;
                $ingredients = [];
                foreach ($ingredientsS as $ing) {
                    if ($ing->produkfk == $item->idproduk) {
                        if ($ing->denominator != null) {
                            $medi_DoseQtyunitUnit = $ing->denominator;
                            $medi_DoseQtyunitCode = $ing->denominatorfk;
                        }
                        $ingredients[] =  array(
                            'itemCodeableConcept' =>
                            array(
                                'coding' =>
                                array(
                                    0 =>
                                    array(
                                        'system' => 'http://sys-ids.kemkes.go.id/kfa',
                                        'code' => $ing->komposisizatfk,
                                        'display' => $ing->komposisizat,
                                    ),
                                ),
                            ),
                            'isActive' => $ing->isactive ? $ing->isactive : true,
                            'strength' =>
                            array(
                                'numerator' =>
                                array(
                                    'value' => (float)$ing->numeratorvalue,
                                    'system' => 'http://unitsofmeasure.org',
                                    'code' => $ing->numeratorfk,
                                ),
                                'denominator' =>
                                array(
                                    'value' => (float)$ing->denominatorvalue,
                                    'system' => 'http://terminology.hl7.org/CodeSystem/v3-orderableDrugForm',
                                    'code' => $ing->denominatorfk,
                                ),
                            ),
                        );
                    }
                }
                $tglkadaluarsa = '';
                $nobatch = '';
                foreach ($SPD as $d) {
                    if ($d->objectprodukfk == $item->idproduk) {
                        if ($d->nobatch != null) {
                            $nobatch = $d->nobatch;
                        }
                        if ($d->tglkadaluarsa != null) {
                            $tglkadaluarsa = date('Y-m-d', strtotime($d->tglkadaluarsa));
                        }
                    }
                }

                $uuidMedication = $item->urn_uuid_medication != null ? $item->urn_uuid_medication : substr(Uuid::generate(), 0, 36);
                $uuidMedicationDispense =   $item->ihs_medicationdispense != null ? $item->ihs_medicationdispense : substr(Uuid::generate(), 0, 36);
                $medication =  array(
                    'fullUrl' => 'urn:uuid:' . $uuidMedication,
                    'resource' =>
                    array(
                        'id' =>  $item->urn_uuid_medication,
                        'resourceType' => 'Medication',
                        'identifier' =>
                        array(
                            0 =>
                            array(
                                'system' => 'http://sys-ids.kemkes.go.id/medication/' . $profile->ihs_id,
                                'use' => 'official',
                                'value' => (string)$item->idproduk,
                            ),
                        ),
                        'code' =>
                        array(
                            'coding' =>
                            array(
                                0 =>
                                array(
                                    'system' => 'http://sys-ids.kemkes.go.id/kfa',
                                    'code' => $medi_kodeKamusKFAobat,
                                    'display' => $medi_namaKamusKFAobat
                                ),
                            ),
                        ),
                        'status' => 'active',
                        'form' =>
                        array(
                            'coding' =>
                            array(
                                0 =>
                                array(
                                    'system' => 'https://terminology.kemkes.go.id/CodeSystem/medication-form',
                                    'code' => $item->ihs_sediaan,
                                    'display' => $item->ihs_sediaan_display,
                                ),
                            ),
                        ),
                        'ingredient' =>
                        $ingredients,
                        'batch' =>
                        array(
                            'lotNumber' => $nobatch,
                            'expirationDate' => $tglkadaluarsa,
                        ),
                    ),
                    'request' =>
                    array(
                        'method' =>  $item->urn_uuid_medication != null ? 'PUT' : 'POST',
                        'url' => 'Medication',
                    ),
                );
                $medicationDispense =
                    array(
                        'fullUrl' => 'urn:uuid:' . $uuidMedicationDispense,
                        'resource' =>
                        array(
                            'id' =>  $item->ihs_medicationdispense,
                            'resourceType' => 'MedicationDispense',
                            'identifier' =>
                            array(
                                0 =>
                                array(
                                    'system' => 'http://sys-ids.kemkes.go.id/medicationdispense/1000004',
                                    'value' =>   $item->noresep,
                                ),
                                1 =>
                                array(
                                    'system' => 'http://sys-ids.kemkes.go.id/medicationdispense-item/1000004',
                                    'value' => $item->noresep . '-' . ($k + 1),
                                ),
                            ),
                            'status' => 'completed',
                            'category' =>
                            array(
                                'coding' =>
                                array(
                                    0 =>
                                    array(
                                        'system' => 'http://terminology.hl7.org/fhir/CodeSystem/medicationdispense-category',
                                        'code' => $item->code_class,
                                        'display' => $item->name_class,
                                    ),
                                ),
                            ),
                            'medicationReference' =>
                            array(
                                'reference' => 'urn:uuid:' . $uuidMedication,
                                'display' => $item->ihs_kfa_display != null ? $item->ihs_kfa_display : $item->namaproduk,
                            ),
                            'subject' =>
                            array(
                                'reference' => 'Group/PERSON-UNIDENTIFIED',
                                'display' =>   $item->namapasien_klien, //"PERSON-UNIDENTIFIED"
                            ),
                            'performer' =>
                            array(
                                0 =>
                                array(
                                    'actor' =>
                                    array(
                                        'reference' => 'Practitioner/' . $item->ihs_practitioner,
                                        'display' => $item->penulisresep,
                                    ),
                                ),
                                1 =>
                                array(
                                    'actor' =>
                                    array(
                                        'reference' => 'Organization/' . $profile->ihs_id,
                                    ),
                                ),
                            ),
                            'location' =>
                            array(
                                'reference' => 'Location/' . $item->ihs_apotik,
                                'display' =>  $item->ihs_apotik_display,
                            ),
                            'quantity' =>
                            array(
                                'value' => (float)$item->jumlah,
                                'unit' => $medi_DoseQtyunitUnit,
                                'system' => 'http://terminology.hl7.org/CodeSystem/v3-orderableDrugForm',
                                'code' => $medi_DoseQtyunitCode,
                            ),
                            'whenPrepared' => $tglresep,
                            'whenHandedOver' => $tglresep,
                            'dosageInstruction' =>
                            array(
                                0 =>
                                array(
                                    'sequence' => 1,
                                    'text' => $item->aturanpakai,
                                    'timing' =>
                                    array(
                                        'repeat' =>
                                        array(
                                            'frequency' => $repeat_frequency,
                                            'period' => $repeat_period,
                                            'periodUnit' => 'd',
                                        ),
                                    ),
                                    'route' =>
                                    array(
                                        'coding' =>
                                        array(
                                            0 =>
                                            array(
                                                'system' => 'http://www.whocc.no/atc',
                                                'code' => 'O',
                                                'display' => 'Oral',
                                            ),
                                        ),
                                    ),
                                    'doseAndRate' =>
                                    array(
                                        0 =>
                                        array(
                                            'type' =>
                                            array(
                                                'coding' =>
                                                array(
                                                    0 =>
                                                    array(
                                                        'system' => 'http://terminology.hl7.org/CodeSystem/dose-rate-type',
                                                        'code' => 'ordered',
                                                        'display' => 'Ordered',
                                                    ),
                                                ),
                                            ),
                                            'doseQuantity' =>
                                            array(
                                                'value' => (float)$item->jumlah,
                                                'unit' => $medi_DoseQtyunitUnit,
                                                'system' => 'http://terminology.hl7.org/CodeSystem/v3-orderableDrugForm',
                                                'code' => $medi_DoseQtyunitCode,
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                        'request' =>
                        array(
                            'method' =>  $item->ihs_medicationdispense != null ? 'PUT' : 'POST',
                            'url' => 'MedicationDispense',
                        ),

                    );

                if ($item->ihs_medicationdispense == null) {
                    unset($medicationDispense['resource']['id']);
                }
                if ($item->urn_uuid_medication == null) {
                    unset($medication['resource']['id']);
                }

                $entry[] = $medication;
                $entry[] = $medicationDispense;
            }
            $data = array(
                'resourceType' => 'Bundle',
                'type' => 'transaction',
                'entry' => $entry
            );
            $objetoRequest = new \Illuminate\Http\Request();
            $objetoRequest['url'] = '';
            $objetoRequest['method'] = 'POST';
            $objetoRequest['data'] = $data;

            $response =  $this->ihsTools($objetoRequest, true);
            // return response()->json($data);
            $noterror = true;
            if ($response->resourceType == 'OperationOutcome') {
                $noterror = false;

                if ($lokal == true) {
                    return $response;
                }
                return response()->json($response);
            }

            $responseBundle = '';
            foreach ($response->entry as $ddd) {
                if (isset($ddd->response->resourceID)) {
                    $responseBundle = $responseBundle . ',' . $ddd->response->resourceID;
                    StrukPelayananDetail::where('norec', $item->norec_pp)->update([
                        'ihs_id' => $ddd->response->resourceID,
                    ]);
                }
            }
            $responseBundle =  substr($responseBundle, 1, strlen($responseBundle) - 1);

            if ($q[0]->ihs_bundle == null) {
                $mod = new IHS_Transaction();
                $mod->norec = $mod->generateNewId();
                $mod->statusenabled = $noterror;
                $mod->kdprofile = $this->kdProfile;
            } else {
                $mod = IHS_Transaction::where('id', $q[0]->ihs_bundle)->first();
            }
            if (empty($mod)) {
                $mod = new IHS_Transaction();
                $mod->norec = $mod->generateNewId();
                $mod->statusenabled = $noterror;
                $mod->kdprofile = $this->kdProfile;
            }
            $mod->resourcetype = $data['resourceType'];
            $mod->url =  $this->endPoint() . $data['resourceType'];
            $mod->method = 'POST';
            $mod->id = $responseBundle;
            $mod->body = json_encode($data);
            $mod->response = json_encode($response);
            $mod->date = date('Y-m-d H:i:s');
            $mod->save();
        } catch (\Exception $e) {
            $response = array(
                "issue" => $e->getMessage() . ' ' . $e->getLine(),
                "resourceType" => "OperationOutcome"
            );
        }
        if ($lokal == true) {
            return $response;
        }
        return response()->json($response);
    }
    
    public function Observation(Request $request, $lokal = null)
    {
        $response = array(
            'resourceType' => 'OperationOutcome',
            'issue' => 'Observation belum ada'
        );

        try {
            $noregistrasi = trim($request->input('noregistrasi', ''));

            if ($noregistrasi === '') {
                throw new \Exception('Nomor registrasi wajib diisi');
            }

            $q = DB::table('emrpasiend_t as emrdp')
                ->join('emrpasien_t as emrp', 'emrp.noemr', '=', 'emrdp.emrpasienfk')
                ->leftJoin('emrd_t as emrd', 'emrd.id', '=', 'emrdp.emrdfk')
                ->leftJoin('pasiendaftar_t as pd', 'pd.noregistrasi', '=', 'emrp.noregistrasifk')
                ->leftJoin('pegawai_m as pg', 'pg.id', '=', 'pd.objectpegawaifk')
                ->leftJoin('pasien_m as ps', 'ps.id', '=', 'pd.nocmfk')
                ->leftJoin('pasien_m as ps2', 'ps2.nocm', '=', 'emrp.nocm')
                ->where('emrdp.statusenabled', true)
                ->where('emrp.statusenabled', true)
                ->where('emrp.kdprofile', $this->kdProfile)
                ->where('pd.noregistrasi', $noregistrasi)
                ->whereNotNull('emrdp.value')
                ->whereIn('emrdp.emrdfk', array(4241, 4242, 4243, 4244, 4245, 4246))
                ->select(
                    'emrdp.norec as id_param',
                    'emrdp.emrdfk',
                    'emrdp.ihs_id as ihs_observation',
                    'emrdp.value as nilai',
                    'pd.noregistrasi as noregistrasi',
                    'emrp.tglemr',
                    'emrp.namaruangan',
                    'emrp.statusenabled',
                    'ps.ihs_number as ihs_patient',
                    'pd.ihs_id as ihs_encounter',
                    'pd.tglregistrasi as masuk',
                    'pg.ihs_id as ihs_practitioner',
                    'pg.namalengkap',
                    DB::raw('COALESCE(ps.id, ps2.id) as idpasien'),
                    DB::raw('COALESCE(ps.namapasien, ps2.namapasien) as given'),
                    DB::raw('COALESCE(ps.nocm, ps2.nocm) as nocm'),
                    DB::raw('COALESCE(ps.noidentitas, ps2.noidentitas) as noidentitas')
                )
                ->orderBy('emrp.tglemr', 'asc')
                ->get();

            if (Empty($q)) {
                if ($lokal == true) {
                    return $response;
                }

                return response()->json($response);
            }

            $array = array();

            foreach ($q as $item) {
                $nilai = trim((string) $item->nilai);

                if ($nilai === '' || !is_numeric(str_replace(',', '.', $nilai)) && $item->emrdfk != 4241) {
                    continue;
                }

                $value = (float) str_replace(',', '.', $nilai);

                $base = array(
                    'id' => $item->ihs_observation,
                    'patient' => $item->ihs_patient,
                    'patient_name' => $item->given,
                    'encounter' => $item->ihs_encounter,
                    'effectiveDateTime' => date('Y-m-d\TH:i:sP', strtotime($item->tglemr)),
                    'norec' => $item->id_param,
                    'ihs_practitioner' => $item->ihs_practitioner,
                    'namadokter' => $item->namalengkap
                );

                $encounterDisplay = 'Pemeriksaan Fisik ';

                switch ((int) $item->emrdfk) {
                    case 4241:
                        $parts = explode('/', $nilai);

                        if (count($parts) == 2 && is_numeric(trim($parts[0])) && is_numeric(trim($parts[1]))) {
                            $systolic = $base;
                            $systolic['code'] = '8480-6';
                            $systolic['display'] = 'Systolic blood pressure';
                            $systolic['unit'] = 'mm[Hg]';
                            $systolic['unitCode'] = 'mm[Hg]';
                            $systolic['value'] = (float) trim($parts[0]);
                            $systolic['encounter_display'] = $encounterDisplay . 'Tekanan Darah ' . $item->given . ' di hari ' . $this->hari_ini($item->masuk) . ', ' . $this->getDateIndo($item->masuk);
                            $array[] = $systolic;

                            $diastolic = $base;
                            $diastolic['code'] = '8462-4';
                            $diastolic['display'] = 'Diastolic blood pressure';
                            $diastolic['unit'] = 'mm[Hg]';
                            $diastolic['unitCode'] = 'mm[Hg]';
                            $diastolic['value'] = (float) trim($parts[1]);
                            $diastolic['encounter_display'] = $systolic['encounter_display'];
                            $array[] = $diastolic;
                        } elseif (is_numeric($nilai)) {
                            $base['code'] = '55284-4';
                            $base['display'] = 'Blood pressure';
                            $base['unit'] = 'mm[Hg]';
                            $base['unitCode'] = 'mm[Hg]';
                            $base['value'] = $value;
                            $base['encounter_display'] = $encounterDisplay . 'Tekanan Darah ' . $item->given . ' di hari ' . $this->hari_ini($item->masuk) . ', ' . $this->getDateIndo($item->masuk);
                            $array[] = $base;
                        }
                        break;

                    case 4242:
                        $base['code'] = '8302-2';
                        $base['display'] = 'Height';
                        $base['unit'] = 'cm';
                        $base['unitCode'] = 'cm';
                        $base['value'] = $value;
                        $base['encounter_display'] = $encounterDisplay . 'Tinggi Badan ' . $item->given . ' di hari ' . $this->hari_ini($item->masuk) . ', ' . $this->getDateIndo($item->masuk);
                        $array[] = $base;
                        break;

                    case 4243:
                        $base['code'] = '3141-9';
                        $base['display'] = 'Weight';
                        $base['unit'] = 'kg';
                        $base['unitCode'] = 'kg';
                        $base['value'] = $value;
                        $base['encounter_display'] = $encounterDisplay . 'Berat Badan ' . $item->given . ' di hari ' . $this->hari_ini($item->masuk) . ', ' . $this->getDateIndo($item->masuk);
                        $array[] = $base;
                        break;

                    case 4244:
                        $base['code'] = '8310-5';
                        $base['display'] = 'Body temperature';
                        $base['unit'] = 'C';
                        $base['unitCode'] = 'Cel';
                        $base['value'] = $value;
                        $base['encounter_display'] = $encounterDisplay . 'Suhu Tubuh ' . $item->given . ' di hari ' . $this->hari_ini($item->masuk) . ', ' . $this->getDateIndo($item->masuk);
                        $array[] = $base;
                        break;

                    case 4245:
                        $base['code'] = '8867-4';
                        $base['display'] = 'Heart rate';
                        $base['unit'] = 'beats/minute';
                        $base['unitCode'] = '/min';
                        $base['value'] = $value;
                        $base['encounter_display'] = $encounterDisplay . 'Nadi ' . $item->given . ' di hari ' . $this->hari_ini($item->masuk) . ', ' . $this->getDateIndo($item->masuk);
                        $array[] = $base;
                        break;

                    case 4246:
                        $base['code'] = '9279-1';
                        $base['display'] = 'Respiratory rate';
                        $base['unit'] = 'breaths/minute';
                        $base['unitCode'] = '/min';
                        $base['value'] = $value;
                        $base['encounter_display'] = $encounterDisplay . 'Frekuensi Napas ' . $item->given . ' di hari ' . $this->hari_ini($item->masuk) . ', ' . $this->getDateIndo($item->masuk);
                        $array[] = $base;
                        break;
                }
            }

            if (empty($array)) {
                $response = array(
                    'resourceType' => 'OperationOutcome',
                    'issue' => 'Data Observation tidak memiliki nilai numerik yang valid'
                );

                if ($lokal == true) {
                    return $response;
                }

                return response()->json($response);
            }

            $hasil = array();
            $berhasil = 0;
            $gagal = 0;

            foreach ($array as $item) {
                $data = array(
                    'resourceType' => 'Observation',
                    'status' => 'final',
                    'category' => array(
                        array(
                            'coding' => array(
                                array(
                                    'system' => 'http://terminology.hl7.org/CodeSystem/observation-category',
                                    'code' => 'vital-signs',
                                    'display' => 'Vital Signs'
                                )
                            )
                        )
                    ),
                    'issued' => date('Y-m-d\TH:i:sP'),
                    'code' => array(
                        'coding' => array(
                            array(
                                'system' => 'http://loinc.org',
                                'code' => $item['code'],
                                'display' => $item['display']
                            )
                        )
                    ),
                    'subject' => array(
                        'reference' => 'Patient/' . $item['patient'],
                        'display' => $item['patient_name']
                    ),
                    'encounter' => array(
                        'reference' => 'Encounter/' . $item['encounter'],
                        'display' => $item['encounter_display']
                    ),
                    'effectiveDateTime' => $item['effectiveDateTime'],
                    'valueQuantity' => array(
                        'value' => $item['value'],
                        'unit' => $item['unit'],
                        'system' => 'http://unitsofmeasure.org',
                        'code' => $item['unitCode']
                    )
                );

                if (!empty($item['ihs_practitioner'])) {
                    $data['performer'] = array(
                        array(
                            'reference' => 'Practitioner/' . $item['ihs_practitioner']
                        )
                    );
                }

                $objetoRequest = new \Illuminate\Http\Request();
                $objetoRequest->replace(array(
                    'url' => 'Observation',
                    'method' => 'POST',
                    'data' => $data
                ));

                $ihsResponse = $this->ihsTools($objetoRequest, true);

                $isError = !is_object($ihsResponse)
                    || (isset($ihsResponse->resourceType) && $ihsResponse->resourceType == 'OperationOutcome')
                    || empty($ihsResponse->id);

                $mod = new IHS_Transaction();
                $mod->norec = $mod->generateNewId();
                $mod->statusenabled = !$isError;
                $mod->kdprofile = $this->kdProfile;
                $mod->resourcetype = 'Observation';
                $mod->url = $this->endPoint() . 'Observation';
                $mod->method = 'POST';
                $mod->id = isset($ihsResponse->id) ? $ihsResponse->id : null;
                $mod->body = json_encode($data);
                $mod->response = json_encode($ihsResponse);
                $mod->date = date('Y-m-d H:i:s');
                $mod->save();

                if (!$isError) {
                    EMRPasienD::where('norec', $item['norec'])->update(array(
                        'ihs_observation' => $ihsResponse->id
                    ));
                    $berhasil++;
                } else {
                    $gagal++;
                }

                $hasil[] = array(
                    'noregistrasi' => $noregistrasi,
                    'norec' => $item['norec'],
                    'code' => $item['code'],
                    'display' => $item['display'],
                    'berhasil' => !$isError,
                    'id' => isset($ihsResponse->id) ? $ihsResponse->id : null,
                    'response' => $ihsResponse
                );
            }

            $response = array(
                'resourceType' => 'OperationOutcome',
                'noregistrasi' => $noregistrasi,
                'total' => count($array),
                'berhasil' => $berhasil,
                'gagal' => $gagal,
                'detail' => $hasil
            );
        } catch (\Exception $e) {
            $response = array(
                'resourceType' => 'OperationOutcome',
                'issue' => $e->getMessage(),
                'line' => $e->getLine()
            );
        }

        if ($lokal == true) {
            return $response;
        }

        return response()->json($response);
    }

    public function Procedure(Request $request, $lokal = null)
    {
        try {
            $kdProfile = $this->kdProfile;
            $noregistrasi = $request->input('noregistrasi');

            $q = collect(DB::select("
                SELECT
                    pd.noregistrasi,
                    pd.tglregistrasi,
                    apd.objectruanganfk,
                    ru.namaruangan,
                    apd.norec AS norec_apd,
                    dtp.norec AS norec_diagnosapasien,
                    ddt.norec AS norec_detaildpasien,
                    dt.kddiagnosatindakan,
                    dt.namadiagnosatindakan,
                    ddt.keterangantindakan,
                    ddt.tglinputdiagnosa,
                    ddt.ihs_id AS ihs_diagnosa,
                    ps.ihs_number,
                    ps.namapasien,
                    pd.ihs_id AS ihs_encounter,
                    pg.ihs_id AS ihs_practitioner,
                    pg.namalengkap
                FROM pasiendaftar_t AS pd
                INNER JOIN pasien_m AS ps
                    ON ps.id = pd.nocmfk
                INNER JOIN antrianpasiendiperiksa_t AS apd
                    ON apd.noregistrasifk = pd.norec
                INNER JOIN ruangan_m AS ru
                    ON ru.id = apd.objectruanganfk
                INNER JOIN diagnosatindakanpasien_t AS dtp
                    ON dtp.objectpasienfk = apd.norec
                INNER JOIN detaildiagnosatindakanpasien_t AS ddt
                    ON ddt.objectdiagnosatindakanpasienfk = dtp.norec
                INNER JOIN diagnosatindakan_m AS dt
                    ON dt.id = ddt.objectdiagnosatindakanfk
                LEFT JOIN pegawai_m AS pg
                    ON pg.id = ddt.objectpegawaifk
                WHERE pd.kdprofile = ?
                AND pd.noregistrasi = ?
            ", [$kdProfile, $noregistrasi]));

            if ($q->isEmpty()) {
                $response = [
                    'resourceType' => 'OperationOutcome',
                    'issue' => 'Procedure belum ada',
                ];

                return $lokal == true
                    ? $response
                    : response()->json($response);
            }

            foreach ($q as $item) {
                if (empty($item->ihs_number)) {
                    $response = [
                        'resourceType' => 'OperationOutcome',
                        'issue' => 'IHS number pasien belum tersedia',
                    ];
                    continue;
                }

                if (empty($item->ihs_encounter)) {
                    $response = [
                        'resourceType' => 'OperationOutcome',
                        'issue' => 'IHS Encounter belum tersedia',
                    ];
                    continue;
                }

                $tanggal = $item->tglinputdiagnosa
                    ? strtotime($item->tglinputdiagnosa)
                    : strtotime($item->tglregistrasi);

                $tanggalFhir = date('Y-m-d\TH:i:sP', $tanggal);

                $data = [
                    'resourceType' => 'Procedure',
                    'status' => 'completed',
                    'category' => [
                        'coding' => [
                            [
                                'system' => 'http://snomed.info/sct',
                                'code' => '103693007',
                                'display' => 'Diagnostic procedure',
                            ],
                        ],
                        'text' => 'Diagnostic procedure',
                    ],
                    'code' => [
                        'coding' => [
                            [
                                'system' => 'http://hl7.org/fhir/sid/icd-9-cm',
                                'code' => (string) $item->kddiagnosatindakan,
                                'display' => $item->namadiagnosatindakan,
                            ],
                        ],
                    ],
                    'subject' => [
                        'reference' => 'Patient/' . $item->ihs_number,
                        'display' => $item->namapasien,
                    ],
                    'encounter' => [
                        'reference' => 'Encounter/' . $item->ihs_encounter,
                        'display' => 'Tindakan ' .
                            $item->keterangantindakan . ' ' .
                            $item->namapasien . ' pada ' .
                            $this->hari_ini(date('Y-m-d H:i:s', $tanggal)) . ', ' .
                            $this->getDateIndo(date('Y-m-d H:i:s', $tanggal)),
                    ],
                    'performedPeriod' => [
                        'start' => $tanggalFhir,
                        'end' => $tanggalFhir,
                    ],
                    'note' => [
                        [
                            'text' => $item->keterangantindakan,
                        ],
                    ],
                ];

                if (!empty($item->ihs_practitioner)) {
                    $data['performer'] = [
                        [
                            'actor' => [
                                'reference' => 'Practitioner/' . $item->ihs_practitioner,
                                'display' => $item->namalengkap,
                            ],
                        ],
                    ];
                }

                $method = !empty($item->ihs_diagnosa) ? 'PUT' : 'POST';

                if ($method === 'PUT') {
                    $data['id'] = $item->ihs_diagnosa;
                    $url = 'Procedure/' . $item->ihs_diagnosa;
                } else {
                    $url = 'Procedure';
                }

                $objetoRequest = new \Illuminate\Http\Request();
                $objetoRequest->replace([
                    'url' => $url,
                    'method' => $method,
                    'data' => $data,
                ]);

                $response = $this->ihsTools($objetoRequest, true);

                if (is_array($response)) {
                    $response = (object) $response;
                }

                if (is_string($response)) {
                    $decoded = json_decode($response);

                    if (json_last_error() === JSON_ERROR_NONE) {
                        $response = $decoded;
                    }
                }

                $resourceType = is_object($response) && isset($response->resourceType)
                    ? $response->resourceType
                    : null;

                $responseId = is_object($response) && isset($response->id)
                    ? $response->id
                    : null;

                $noterror = (
                    is_object($response) &&
                    $resourceType === 'Procedure' &&
                    !empty($responseId)
                );

                $mod = new IHS_Transaction();
                $mod->norec = $mod->generateNewId();
                $mod->statusenabled = $noterror;
                $mod->kdprofile = $kdProfile;
                $mod->resourcetype = 'Procedure';
                $mod->url = $this->endPoint() . $url;
                $mod->method = $method;
                $mod->id = $responseId;
                $mod->body = json_encode($data);
                $mod->response = json_encode($response);
                $mod->date = date('Y-m-d H:i:s');
                $mod->save();

                if ($noterror) {
                    DetailDiagnosaTindakanPasien::where(
                        'norec',
                        $item->norec_detaildpasien
                    )->update([
                        'ihs_id' => $responseId,
                    ]);
                }
            }
        } catch (\Exception $e) {
            $response = [
                'resourceType' => 'OperationOutcome',
                'issue' => $e->getMessage() . ' baris ' . $e->getLine(),
            ];
        }

        if ($lokal == true) {
            return isset($response) ? $response : [
                'resourceType' => 'OperationOutcome',
                'issue' => 'Proses Procedure selesai',
            ];
        }

        return response()->json(isset($response) ? $response : [
            'resourceType' => 'OperationOutcome',
            'issue' => 'Proses Procedure selesai',
        ]);
    }
    
    public function composition(Request $request, $lokal = null)
    {
        ini_set('max_execution_time', 0);

        try {
            $kdProfile = $this->kdProfile;
            $noOrder = trim((string) $request->input('noorder', ''));
            $noReg = trim((string) $request->input('noregistrasi', ''));

            if ($noOrder === '' && $noReg === '') {
                $response = array(
                    'resourceType' => 'OperationOutcome',
                    'issue' => array(
                        array(
                            'severity' => 'error',
                            'code' => 'required',
                            'diagnostics' => 'noorder atau noregistrasi wajib diisi'
                        )
                    )
                );

                return $lokal ? $response : response()->json($response, 400);
            }

            $query = "
                SELECT
                    op.norec AS norec_op,
                    ps.namapasien,
                    ps.ihs_number AS ihs_pasien,
                    kd.kategorydiet,
                    ps.noidentitas,
                    op.qtyproduk,
                    op.keteranganlainnya,
                    op.arrjenisdiet,
                    pg.noidentitas AS nik_dokter,
                    op.ihs_composition AS ihs_composition,
                    pd.ihs_id AS ihs_encounter,
                    pd.noregistrasi,
                    pd.tglregistrasi AS tanggal,
                    pg.ihs_id AS ihs_practitioner,
                    pg.namalengkap AS dokter,
                    dp.namadepartemen
                FROM orderpelayanan_t AS op
                INNER JOIN pasiendaftar_t AS pd
                    ON pd.norec = op.noregistrasifk
                INNER JOIN pasien_m AS ps
                    ON ps.id = op.nocmfk
                INNER JOIN strukorder_t AS so
                    ON so.norec = op.strukorderfk
                INNER JOIN pegawai_m AS pg
                    ON pg.id = pd.objectpegawaifk
                LEFT JOIN ruangan_m AS ru
                    ON ru.id = op.objectruanganfk
                LEFT JOIN departemen_m AS dp
                    ON dp.id = ru.objectdepartemenfk
                INNER JOIN kategorydiet_m AS kd
                    ON kd.id = op.objectkategorydietfk
                WHERE so.kdprofile = :kdProfile
                    AND so.statusenabled = true
                    AND op.statusenabled = true
            ";

            $bindings = array(
                'kdProfile' => $kdProfile
            );

            if ($noOrder !== '' && $noReg !== '') {
                $query .= " AND (so.noorder = :noOrder OR pd.noregistrasi = :noReg)";
                $bindings['noOrder'] = $noOrder;
                $bindings['noReg'] = $noReg;
            } elseif ($noOrder !== '') {
                $query .= " AND so.noorder = :noOrder";
                $bindings['noOrder'] = $noOrder;
            } else {
                $query .= " AND pd.noregistrasi = :noReg";
                $bindings['noReg'] = $noReg;
            }

            $query .= " ORDER BY so.noorder ASC";

            $orders = collect(DB::select($query, $bindings));

            if ($orders->isEmpty()) {
                $response = array(
                    'resourceType' => 'OperationOutcome',
                    'issue' => array(
                        array(
                            'severity' => 'error',
                            'code' => 'not-found',
                            'diagnostics' => 'Order diet tidak ditemukan'
                        )
                    )
                );

                return $lokal ? $response : response()->json($response, 404);
            }

            $profile = Profile::where('statusenabled', true)->first();

            if (!$profile || empty($profile->ihs_id)) {
                $response = array(
                    'resourceType' => 'OperationOutcome',
                    'issue' => array(
                        array(
                            'severity' => 'error',
                            'code' => 'configuration',
                            'diagnostics' => 'IHS ID organisasi belum dikonfigurasi'
                        )
                    )
                );

                return $lokal ? $response : response()->json($response);
            }

            $finalResponses = array();

            foreach ($orders as $item) {
                $noRegItem = $item->noregistrasi;

                /*
                * 1. Resolve Patient
                */
                $ihsPasien = $item->ihs_pasien;

                if (empty($ihsPasien)) {
                    if (empty($item->noidentitas)) {
                        $finalResponses[] = array(
                            'norec_op' => $item->norec_op,
                            'status' => false,
                            'resourceType' => 'OperationOutcome',
                            'message' => 'NIK pasien kosong'
                        );
                        continue;
                    }

                    $patientReq = new \Illuminate\Http\Request();
                    $patientReq->replace(array(
                        'url' => 'Patient?identifier=' .
                            rawurlencode('https://fhir.kemkes.go.id/id/nik|' . $item->noidentitas),
                        'method' => 'GET',
                        'data' => null
                    ));

                    $patientResponse = $this->ihsTools($patientReq, true);

                    if (
                        isset($patientResponse->resourceType) &&
                        $patientResponse->resourceType === 'Bundle' &&
                        !empty($patientResponse->total) &&
                        !empty($patientResponse->entry)
                    ) {
                        foreach ($patientResponse->entry as $entry) {
                            if (!empty($entry->resource->id)) {
                                $ihsPasien = $entry->resource->id;
                                break;
                            }
                        }
                    }

                    if (empty($ihsPasien)) {
                        $finalResponses[] = array(
                            'norec_op' => $item->norec_op,
                            'status' => false,
                            'resourceType' => 'OperationOutcome',
                            'message' => 'Patient SATUSEHAT tidak ditemukan',
                            'detail' => $patientResponse
                        );
                        continue;
                    }

                    Pasien::where('noidentitas', $item->noidentitas)
                        ->update(array('ihs_number' => $ihsPasien));
                }

                /*
                * 2. Resolve Practitioner
                */
                $ihsPractitioner = $item->ihs_practitioner;

                if (empty($ihsPractitioner)) {
                    if (empty($item->nik_dokter)) {
                        $finalResponses[] = array(
                            'norec_op' => $item->norec_op,
                            'status' => false,
                            'resourceType' => 'OperationOutcome',
                            'message' => 'NIK dokter kosong'
                        );
                        continue;
                    }

                    $practitionerReq = new \Illuminate\Http\Request();
                    $practitionerReq->replace(array(
                        'url' => 'Practitioner?identifier=' .
                            rawurlencode('https://fhir.kemkes.go.id/id/nik|' . $item->nik_dokter),
                        'method' => 'GET',
                        'data' => null
                    ));

                    $practitionerResponse = $this->ihsTools($practitionerReq, true);
                    $ihsPractitioner = null;

                    if (
                        isset($practitionerResponse->resourceType) &&
                        $practitionerResponse->resourceType === 'Bundle' &&
                        !empty($practitionerResponse->total) &&
                        !empty($practitionerResponse->entry)
                    ) {
                        foreach ($practitionerResponse->entry as $entry) {
                            if (!empty($entry->resource->id)) {
                                $ihsPractitioner = $entry->resource->id;
                                break;
                            }
                        }
                    }

                    if (empty($ihsPractitioner)) {
                        $finalResponses[] = array(
                            'norec_op' => $item->norec_op,
                            'status' => false,
                            'resourceType' => 'OperationOutcome',
                            'message' => 'Practitioner SATUSEHAT tidak ditemukan',
                            'detail' => $practitionerResponse
                        );
                        continue;
                    }

                    Pegawai::where('noidentitas', $item->nik_dokter)
                        ->update(array('ihs_id' => $ihsPractitioner));
                }

                /*
                * 3. Pastikan Encounter
                */
                $ihsEncounter = $item->ihs_encounter;

                if (empty($ihsEncounter)) {
                    $encounterReq = new \Illuminate\Http\Request();
                    $encounterReq->replace(array(
                        'noregistrasi' => $noRegItem
                    ));

                    $encounterResponse = app(
                        'App\Http\Controllers\Bridging\IHSController'
                    )->Encounter($encounterReq, true);

                    if (
                        is_object($encounterResponse) &&
                        isset($encounterResponse->resourceType) &&
                        $encounterResponse->resourceType === 'Encounter'
                    ) {
                        $ihsEncounter = isset($encounterResponse->id)
                            ? $encounterResponse->id
                            : null;
                    }

                    if (empty($ihsEncounter)) {
                        $encounterData = DB::table('pasiendaftar_t')
                            ->where('norec', function ($q) use ($noRegItem, $kdProfile) {
                                $q->select('norec')
                                    ->from('pasiendaftar_t')
                                    ->where('kdprofile', $kdProfile)
                                    ->where('noregistrasi', $noRegItem)
                                    ->limit(1);
                            })
                            ->value('ihs_id');

                        $ihsEncounter = $encounterData;
                    }

                    if (empty($ihsEncounter)) {
                        $finalResponses[] = array(
                            'norec_op' => $item->norec_op,
                            'status' => false,
                            'resourceType' => 'OperationOutcome',
                            'message' => 'Encounter SATUSEHAT belum tersedia',
                            'detail' => isset($encounterResponse) ? $encounterResponse : null
                        );
                        continue;
                    }
                }

                /*
                * 4. Build jenis diet
                */
                $jenisDiet = '';

                if (!empty($item->arrjenisdiet)) {
                    $parts = array();
                    $ids = explode(',', $item->arrjenisdiet);

                    foreach ($ids as $idJenisDiet) {
                        $idJenisDiet = trim($idJenisDiet);

                        if ($idJenisDiet === '') {
                            continue;
                        }

                        $diet = DB::table('jenisdiet_m')
                            ->where('id', $idJenisDiet)
                            ->first();

                        if ($diet) {
                            $parts[] = $diet->jenisdiet;
                        }
                    }

                    $jenisDiet = implode(', ', $parts);
                }

                /*
                * 5. Build Composition
                */
                $data = array(
                    'resourceType' => 'Composition',
                    'identifier' => array(
                        'system' => 'http://sys-ids.kemkes.go.id/composition/' . $profile->ihs_id,
                        'value' => $item->norec_op
                    ),
                    'status' => 'final',
                    'type' => array(
                        'coding' => array(
                            array(
                                'system' => 'http://loinc.org',
                                'code' => '18842-5',
                                'display' => 'Discharge summary'
                            )
                        )
                    ),
                    'category' => array(
                        array(
                            'coding' => array(
                                array(
                                    'system' => 'http://loinc.org',
                                    'code' => 'LP173421-1',
                                    'display' => 'Report'
                                )
                            )
                        )
                    ),
                    'subject' => array(
                        'reference' => 'Patient/' . $ihsPasien,
                        'display' => $item->namapasien
                    ),
                    'encounter' => array(
                        'reference' => 'Encounter/' . $ihsEncounter,
                        'display' => 'Kunjungan ' . $item->namapasien .
                            ' di hari ' . $this->hari_ini($item->tanggal) .
                            ', ' . $this->getDateIndo($item->tanggal)
                    ),
                    'date' => $this->dateISO($item->tanggal),
                    'author' => array(
                        array(
                            'reference' => 'Practitioner/' . $ihsPractitioner,
                            'display' => $item->dokter
                        )
                    ),
                    'title' => 'Resume Medis ' .
                        str_replace('Instalasi', '', $item->namadepartemen),
                    'custodian' => array(
                        'reference' => 'Organization/' . $profile->ihs_id
                    ),
                    'section' => array(
                        array(
                            'code' => array(
                                'coding' => array(
                                    array(
                                        'system' => 'http://loinc.org',
                                        'code' => '42344-2',
                                        'display' => 'Discharge diet (narrative)'
                                    )
                                )
                            ),
                            'text' => array(
                                'status' => 'additional',
                                'div' => 'Kategori Diet: ' . $item->kategorydiet .
                                    '; Jenis Diet: ' . $jenisDiet
                            )
                        )
                    )
                );

                /*
                * 6. Tentukan POST atau PUT
                */
                $existingId = trim((string) $item->ihs_composition);

                if ($existingId !== '') {
                    $data['id'] = $existingId;
                    $method = 'PUT';
                    $url = 'Composition/' . rawurlencode($existingId);
                } else {
                    $method = 'POST';
                    $url = 'Composition';
                }

                $ihsRequest = new \Illuminate\Http\Request();
                $ihsRequest->replace(array(
                    'url' => $url,
                    'method' => $method,
                    'data' => $data
                ));

                $response = $this->ihsTools($ihsRequest, true);

                $isError = !is_object($response) ||
                    (isset($response->resourceType) &&
                    $response->resourceType === 'OperationOutcome');

                /*
                * 7. Log transaksi
                */
                $responseId = !$isError && isset($response->id)
                    ? $response->id
                    : null;

                $transaction = new IHS_Transaction();
                $transaction->norec = $transaction->generateNewId();
                $transaction->statusenabled = !$isError;
                $transaction->kdprofile = $kdProfile;
                $transaction->resourcetype = 'Composition';
                $transaction->url = $this->endPoint() . $url;
                $transaction->method = $method;
                $transaction->id = $responseId;
                $transaction->body = json_encode($data);
                $transaction->response = json_encode($response);
                $transaction->date = date('Y-m-d H:i:s');
                $transaction->save();

                /*
                * 8. Simpan ID Composition yang dikembalikan SATUSEHAT
                */
                if ($responseId !== null) {
                    OrderPelayanan::where('norec', $item->norec_op)
                        ->update(array(
                            'ihs_composition' => $responseId
                        ));
                }

                $finalResponses[] = array(
                    'norec_op' => $item->norec_op,
                    'noorder' => $noOrder,
                    'noregistrasi' => $noRegItem,
                    'status' => !$isError,
                    'method' => $method,
                    'url' => $url,
                    'id' => $responseId,
                    'response' => $response
                );

                if ($isError) {
                    continue;
                }
            }

            $berhasil = 0;
            $gagal = 0;

            foreach ($finalResponses as $result) {
                if (isset($result['status']) && $result['status']) {
                    $berhasil++;
                } else {
                    $gagal++;
                }
            }

            $result = array(
                'resourceType' => $gagal > 0
                    ? 'OperationOutcome'
                    : 'CompositionResult',
                'status' => $gagal === 0,
                'total' => count($finalResponses),
                'berhasil' => $berhasil,
                'gagal' => $gagal,
                'detail' => $finalResponses
            );

            return $lokal ? $result : response()->json($result);
        } catch (\Exception $e) {
            $response = array(
                'resourceType' => 'OperationOutcome',
                'issue' => array(
                    array(
                        'severity' => 'error',
                        'code' => 'exception',
                        'diagnostics' => $e->getMessage(),
                        'line' => $e->getLine()
                    )
                )
            );

            return $lokal ? $response : response()->json($response, 500);
        }
    }

    public function CarePlan(Request $request, $lokal = null)
    {
        ini_set('max_execution_time', 6000);

        try {
            $kdProfile = $this->kdProfile;

            $suratKontrol = $request->suratkontrol;

            $q = collect(DB::select("
                SELECT
                    pp.norec,
                    pp.ihs_id AS ihs_srfup,
                    pp.ihs_careplan,
                    pp.nosuratkontrol AS noperjanjian,
                    pp.nosepasalkontrol AS keterangan,

                    ru.ihs_id AS ihs_location_id,
                    ru.namaruangan AS ihs_location_name,

                    pg.ihs_id AS ihs_practioner_id,
                    pg.namalengkap AS ihs_practioner_name,

                    ps.ihs_number AS ihs_pasien_id,
                    ps.namapasien AS ihs_pasien_name,
                    ps.noidentitas,

                    pd.ihs_id AS ihs_encounter,
                    pd.tglregistrasi,

                    pp.tglrencanakontrol
                FROM bpjsrencanakontrol_t AS pp
                INNER JOIN pasiendaftar_t AS pd
                    ON pd.norec = pp.norec_pd
                INNER JOIN ruangan_m AS ru
                    ON ru.id = pd.objectruanganlastfk
                INNER JOIN pegawai_m AS pg
                ON pg.kddokterbpjs = CASE
                    WHEN TRIM(pp.kodedokter) ~ '^[0-9]+$'
                    THEN TRIM(pp.kodedokter)::integer
                END
                INNER JOIN pasien_m AS ps
                    ON ps.id = pd.nocmfk
                WHERE pp.kdprofile = ?
                    AND (
                        pp.nosuratkontrol = ?
                        OR pp.nosuratkontrol = ?
                    )
            ", [
                $kdProfile,
                $suratKontrol,
                $suratKontrol
            ]));

            if ($q->count() == 0) {
                $response = array(
                    'resourceType' => 'OperationOutcome',
                    'issue' => 'CarePlan belum ada'
                );

                if ($lokal == true) {
                    return $response;
                }

                return response()->json($response);
            }

            $itemPertama = $q->first();

            /*
            * Ambil IHS Patient
            */
            $IHS_NUMBER_PASIEN = $itemPertama->ihs_pasien_id;

            if (empty($IHS_NUMBER_PASIEN)) {

                if (empty($itemPertama->noidentitas)) {
                    $response = array(
                        'resourceType' => 'OperationOutcome',
                        'issue' => 'NIK pasien belum tersedia'
                    );

                    if ($lokal == true) {
                        return $response;
                    }

                    return response()->json($response);
                }

                $objetoRequest = new \Illuminate\Http\Request();
                $objetoRequest['url'] =
                    'Patient?identifier=https://fhir.kemkes.go.id/id/nik|' .
                    $itemPertama->noidentitas;
                $objetoRequest['method'] = 'GET';
                $objetoRequest['data'] = null;

                $response2 = $this->ihsTools($objetoRequest, true);

                if (
                    isset($response2->resourceType) &&
                    $response2->resourceType == 'Bundle' &&
                    isset($response2->total) &&
                    $response2->total > 0 &&
                    isset($response2->entry)
                ) {
                    foreach ($response2->entry as $entry) {
                        if (
                            isset($entry->resource) &&
                            isset($entry->resource->id) &&
                            !empty($entry->resource->id)
                        ) {
                            $IHS_NUMBER_PASIEN = $entry->resource->id;
                            break;
                        }
                    }
                }

                if (!empty($IHS_NUMBER_PASIEN)) {
                    Pasien::where('noidentitas', $itemPertama->noidentitas)
                        ->update([
                            'ihs_number' => $IHS_NUMBER_PASIEN
                        ]);
                }
            }

            /*
            * Patient wajib tersedia
            */
            if (empty($IHS_NUMBER_PASIEN)) {
                $response = array(
                    'resourceType' => 'OperationOutcome',
                    'issue' => 'IHS Patient belum tersedia untuk pasien ' .
                        $itemPertama->ihs_pasien_name
                );

                if ($lokal == true) {
                    return $response;
                }

                return response()->json($response);
            }

            $array = array();

            foreach ($q as $k => $item) {

                /*
                * SATUSEHAT mewajibkan Encounter
                */
                if (empty($item->ihs_encounter)) {

                    $response = array(
                        'resourceType' => 'OperationOutcome',
                        'issue' => 'IHS Encounter belum tersedia untuk No Registrasi ' .
                            $item->norec,
                        'expression' => array(
                            'CarePlan.encounter'
                        )
                    );

                    $array[] = $response;

                    continue;
                }

                /*
                * SATUSEHAT mewajibkan Practitioner
                */
                if (empty($item->ihs_practioner_id)) {

                    $response = array(
                        'resourceType' => 'OperationOutcome',
                        'issue' => 'IHS Practitioner belum tersedia untuk dokter BPJS ' .
                            $item->ihs_practioner_name,
                        'expression' => array(
                            'CarePlan.author'
                        )
                    );

                    $array[] = $response;

                    continue;
                }

                /*
                * Payload CarePlan
                */
                $data = array(
                    'resourceType' => 'CarePlan',

                    'status' => 'active',

                    'intent' => 'plan',

                    'title' => 'plan',

                    'description' => 'Kontrol ke RS',

                    'subject' => array(
                        'reference' => 'Patient/' . $IHS_NUMBER_PASIEN,
                        'display' => $item->ihs_pasien_name
                    ),

                    'encounter' => array(
                        'reference' => 'Encounter/' . $item->ihs_encounter,
                        'display' =>
                            'Kunjungan ' .
                            $item->ihs_pasien_name .
                            ' di hari ' .
                            $this->hari_ini($item->tglregistrasi) .
                            ', ' .
                            $this->getDateIndo($item->tglregistrasi)
                    ),

                    'created' => $this->dateISO($item->tglregistrasi),

                    'author' => array(
                        'reference' => 'Practitioner/' . $item->ihs_practioner_id,
                        'display' => $item->ihs_practioner_name
                    ),

                    'category' => array(
                        array(
                            'coding' => array(
                                array(
                                    'system' => 'http://snomed.info/sct',
                                    'code' => '736372004',
                                    'display' => 'Discharge care plan'
                                )
                            )
                        )
                    )
                );

                /*
                * POST jika belum ada CarePlan
                * PUT jika CarePlan sudah ada
                */
                $isUpdate = !empty($item->ihs_careplan);

                if ($isUpdate) {
                    $data['id'] = $item->ihs_careplan;

                    $url = 'CarePlan/' . $item->ihs_careplan;
                    $method = 'PUT';
                } else {
                    $url = 'CarePlan';
                    $method = 'POST';
                }

                $objetoRequest = new \Illuminate\Http\Request();
                $objetoRequest['url'] = $url;
                $objetoRequest['method'] = $method;
                $objetoRequest['data'] = $data;

                $response = $this->ihsTools($objetoRequest, true);

                $noterror = true;

                if (
                    isset($response->resourceType) &&
                    $response->resourceType == 'OperationOutcome'
                ) {
                    $noterror = false;
                }

                /*
                * Simpan transaksi IHS
                */
                if ($isUpdate) {
                    $mod = IHS_Transaction::where(
                        'id',
                        $item->ihs_careplan
                    )->first();
                } else {
                    $mod = null;
                }

                if (empty($mod)) {
                    $mod = new IHS_Transaction();
                    $mod->norec = $mod->generateNewId();
                    $mod->kdprofile = $this->kdProfile;
                }

                $mod->statusenabled = $noterror;
                $mod->resourcetype = $data['resourceType'];
                $mod->url = $this->endPoint() . $url;
                $mod->method = $method;

                if (isset($response->id) && !empty($response->id)) {
                    $mod->id = $response->id;
                } else {
                    $mod->id = $item->ihs_careplan;
                }

                $mod->body = json_encode($data);
                $mod->response = json_encode($response);
                $mod->date = date('Y-m-d H:i:s');
                $mod->save();

                /*
                * Simpan ID CarePlan ke BPJS Rencana Kontrol
                */
                if (
                    isset($response->id) &&
                    !empty($response->id)
                ) {
                    DB::table('bpjsrencanakontrol_t')
                        ->where('norec', $item->norec)
                        ->update([
                            'ihs_careplan' => $response->id
                        ]);
                }

                $array[] = $response;
            }

            /*
            * Jika hanya 1 data, return object.
            * Jika banyak, return array.
            */
            if (count($array) == 1) {
                $response = $array[0];
            } else {
                $response = $array;
            }

        } catch (\Exception $e) {

            $response = array(
                'resourceType' => 'OperationOutcome',
                'issue' => $e->getMessage() . ' ' . $e->getLine()
            );
        }

        if ($lokal == true) {
            return $response;
        }

        return response()->json($response);
    }
    
    public function QuestionnaireResponse(Request $request, $lokal = null)
    {
        ini_set('max_execution_time', 6000);

        $kdProfile = $this->kdProfile;
        $hasil = array();

        try {
            $noregistrasi = trim($request->input('noregistrasi', ''));

            if ($noregistrasi === '') {
                throw new \Exception('Parameter noregistrasi wajib diisi');
            }

            $q = DB::select("
                SELECT
                    aa.*,
                    aa.ihs_id AS ihs_questionnaire_response,
                    pd.ihs_id AS ihs_encounter,
                    ps.ihs_number AS ihs_pasien,
                    ps.namapasien,
                    pg.ihs_id AS ihs_practitioner,
                    pg.namalengkap AS dokter,
                    aa.tglmasuk AS tanggal
                FROM antrianpasiendiperiksa_t AS aa
                INNER JOIN pasiendaftar_t AS pd
                    ON pd.norec = aa.noregistrasifk
                    AND aa.objectruanganfk = pd.objectruanganlastfk
                INNER JOIN pasien_m AS ps
                    ON ps.id = pd.nocmfk
                LEFT JOIN pegawai_m AS pg
                    ON pg.id = pd.objectpegawaifk
                WHERE aa.kdprofile = ?
                    AND pd.noregistrasi = ?
                ORDER BY aa.tglmasuk DESC
            ", array($kdProfile, $noregistrasi));

            if (empty($q)) {
                throw new \Exception(
                    'Data registrasi tidak ditemukan: ' . $noregistrasi
                );
            }

            $profile = Profile::where('id', $kdProfile)->first();

            if (empty($profile) || empty($profile->ihs_id)) {
                throw new \Exception('IHS ID organisasi belum tersedia');
            }

            foreach ($q as $item) {
                try {
                    $pasienId = trim((string) $item->ihs_pasien);
                    $encounterId = trim((string) $item->ihs_encounter);
                    $practitionerId = trim((string) $item->ihs_practitioner);
                    $questionnaireResponseId = trim(
                        (string) $item->ihs_questionnaire_response
                    );

                    if ($pasienId === '') {
                        throw new \Exception('IHS Patient belum tersedia');
                    }

                    if ($encounterId === '') {
                        throw new \Exception('IHS Encounter belum tersedia');
                    }

                    if ($practitionerId === '') {
                        throw new \Exception(
                            'IHS Practitioner belum tersedia untuk dokter ' .
                            $item->dokter
                        );
                    }

                    if (empty($item->tanggal)) {
                        throw new \Exception('Tanggal pengkajian belum tersedia');
                    }

                    $data = array(
                        'resourceType' => 'QuestionnaireResponse',
                        'questionnaire' => 'https://fhir.kemkes.go.id/Questionnaire/Q0007',
                        'status' => 'completed',
                        'subject' => array(
                            'reference' => 'Patient/' . $pasienId,
                            'display' => $item->namapasien,
                        ),
                        'encounter' => array(
                            'reference' => 'Encounter/' . $encounterId,
                            'display' => 'Kunjungan ' . $item->namapasien .
                                ' di hari ' . $this->hari_ini($item->tanggal) .
                                ', ' . $this->getDateIndo($item->tanggal),
                        ),
                        'authored' => $this->dateISO($item->tanggal),
                        'author' => array(
                            'reference' => 'Practitioner/' . $practitionerId,
                            'display' => $item->dokter,
                        ),
                        'source' => array(
                            'reference' => 'Patient/' . $pasienId,
                            'display' => $item->namapasien,
                        ),
                        'item' => array(
                            array(
                                'linkId' => '1',
                                'text' => 'Persyaratan Administrasi',
                                'item' => array(
                                    array(
                                        'linkId' => '1.1',
                                        'text' => 'Apakah nama, umur, jenis kelamin, berat badan dan tinggi badan pasien sudah sesuai?',
                                        'answer' => array(
                                            array(
                                                'valueCoding' => array(
                                                    'system' => 'http://terminology.kemkes.go.id/CodeSystem/clinical-term',
                                                    'code' => 'OV000052',
                                                    'display' => 'Sesuai',
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    );

                    if ($questionnaireResponseId !== '') {
                        $method = 'PUT';
                        $url = 'QuestionnaireResponse/' .
                            $questionnaireResponseId;
                        $data['id'] = $questionnaireResponseId;
                    } else {
                        $method = 'POST';
                        $url = 'QuestionnaireResponse';
                    }

                    $objetoRequest = new \Illuminate\Http\Request();
                    $objetoRequest->replace(array(
                        'url' => $url,
                        'method' => $method,
                        'data' => $data,
                    ));

                    $response = $this->ihsTools($objetoRequest, true);

                    $responseType = is_object($response) &&
                        isset($response->resourceType)
                        ? $response->resourceType
                        : '';

                    $responseId = is_object($response) &&
                        isset($response->id)
                        ? $response->id
                        : null;

                    $berhasil = $responseType !== 'OperationOutcome';

                    if ($method === 'PUT' && empty($responseId)) {
                        $responseId = $questionnaireResponseId;
                    }

                    if (empty($responseId)) {
                        $berhasil = false;
                    }

                    $mod = new IHS_Transaction();
                    $mod->norec = $mod->generateNewId();
                    $mod->statusenabled = $berhasil;
                    $mod->kdprofile = $kdProfile;
                    $mod->resourcetype = 'QuestionnaireResponse';
                    $mod->url = $this->endPoint() . $url;
                    $mod->method = $method;
                    $mod->id = $responseId;
                    $mod->body = json_encode($data);
                    $mod->response = json_encode($response);
                    $mod->date = date('Y-m-d H:i:s');
                    $mod->save();

                    if ($berhasil && $method === 'POST') {
                        DB::table('antrianpasiendiperiksa_t')
                            ->where('norec', $item->norec)
                            ->update(array(
                                'ihs_id' => $responseId,
                            ));
                    }

                    if (!$berhasil) {
                        $pesanError = 'Gagal mengirim QuestionnaireResponse';

                        if (
                            is_object($response) &&
                            isset($response->issue)
                        ) {
                            $pesan = array();

                            foreach ($response->issue as $issue) {
                                if (isset($issue->details->text)) {
                                    $pesan[] = $issue->details->text;
                                }

                                if (isset($issue->diagnostics)) {
                                    $pesan[] = $issue->diagnostics;
                                }
                            }

                            if (!empty($pesan)) {
                                $pesanError = implode(
                                    '; ',
                                    array_unique($pesan)
                                );
                            }
                        }

                        $hasil[] = array(
                            'noregistrasi' => $noregistrasi,
                            'norec' => $item->norec,
                            'status' => 'gagal',
                            'error' => $pesanError,
                            'response' => $response,
                        );

                        continue;
                    }

                    $hasil[] = array(
                        'noregistrasi' => $noregistrasi,
                        'norec' => $item->norec,
                        'status' => 'berhasil',
                        'method' => $method,
                        'id' => $responseId,
                        'response' => $response,
                    );
                } catch (\Exception $e) {
                    $hasil[] = array(
                        'noregistrasi' => $noregistrasi,
                        'norec' => $item->norec,
                        'status' => 'gagal',
                        'error' => $e->getMessage(),
                    );
                }
            }

            $jumlahBerhasil = 0;
            $jumlahGagal = 0;

            foreach ($hasil as $row) {
                if ($row['status'] === 'berhasil') {
                    $jumlahBerhasil++;
                } else {
                    $jumlahGagal++;
                }
            }

            $response = array(
                'resourceType' => 'OperationOutcome',
                'noregistrasi' => $noregistrasi,
                'total' => count($hasil),
                'berhasil' => $jumlahBerhasil,
                'gagal' => $jumlahGagal,
                'detail' => $hasil,
            );
        } catch (\Exception $e) {
            $response = array(
                'resourceType' => 'OperationOutcome',
                'issue' => $e->getMessage(),
            );
        }

        if ($lokal == true) {
            return $response;
        }

        return response()->json($response);
    }


    public function MedicationStatement(Request $request, $lokal = null)
    {
        try {
            $kdProfile = $this->kdProfile;
            $q = collect(DB::select("
                SELECT
                    pp.norec,
                    pp.ihs_medicationstatement AS ihs_ms,
                    pp.tglpelayanan,
                    CASE WHEN pp.keteranganpakai IS NOT NULL AND pp.keteranganpakai <> '' THEN pp.keteranganpakai ELSE 'Diminum 4-6 jam sekali' END AS keteranganpakai,
                    pr.namaproduk AS ihs_medication_name,
                    pr.ihs_id AS ihs_medication_id,
                    ps.namapasien AS ihs_pasien_name,
                    ps.ihs_number AS ihs_pasien_id,
                    pd.norec AS norec_pd,
                    pd.ihs_id AS ihs_encounter
                FROM strukresep_t AS sr
                INNER JOIN pelayananpasien_t AS pp ON pp.strukresepfk = sr.norec
                INNER JOIN produk_m AS pr ON pr.id = pp.produkfk
                INNER JOIN antrianpasiendiperiksa_t AS apd ON apd.norec = pp.noregistrasifk
                INNER JOIN pasiendaftar_t AS pd ON pd.norec = apd.noregistrasifk
                INNER JOIN pasien_m AS ps ON ps.id = pd.nocmfk
                WHERE sr.kdprofile = $kdProfile
                AND sr.noresep = '$request[noresep]'
                AND pr.ihs_id IS NOT NULL
            "));

            if (count($q) == 0) {
                $response = array(
                    "issue" =>  'MedicationStatement doesnt exist',
                    "resourceType" => "OperationOutcome"
                );
                if ($lokal == true) {
                    return $response;
                }
                return response()->json($response);
            }
            $profile = Profile::where('id', $kdProfile)->first();

            foreach ($q as $key => $item) {
                $data = array(
                    'resourceType' => 'MedicationStatement',
                    'id' => $item->ihs_ms,
                    'status' => 'completed',
                    'category' => array(
                        'coding' => array(
                            0 => array(
                                'system' => 'http://terminology.hl7.org/CodeSystem/medication-statement-category',
                                'code' => 'outpatient',
                                'display' => 'Outpatient'
                            )
                        )
                    ),
                    'medicationReference' => array(
                        'reference' => 'Medication/' . $item->ihs_medication_id,
                        'display' => $item->ihs_medication_name
                    ),
                    'subject' => array(
                        'reference' => 'Patient/' . $item->ihs_pasien_id,
                        'display' => $item->ihs_pasien_name
                    ),
                    'dosage' => array(
                        0 => array(
                            'text' => $item->keteranganpakai,
                            'timing' => array(
                                'repeat' => array(
                                    'frequency' => 1,
                                    'period' => 4,
                                    'periodMax' => 6,
                                    'periodUnit' => 'h'
                                )
                            )
                        )
                    ),
                    'effectiveDateTime' => date('Y-m-d\TH:i:sP', strtotime($item->tglpelayanan)),
                    'dateAsserted' => date('Y-m-d\TH:i:sP'),
                    'informationSource' => array(
                        'reference' => 'Patient/' . $item->ihs_pasien_id,
                        'display' => $item->ihs_pasien_name
                    ),
                    'context' => array(
                        'reference' => 'Encounter/' . $item->ihs_encounter
                    )
                );

                if ($item->ihs_ms == null) {
                    unset($data['id']);
                }
                $objetoRequest = new \Illuminate\Http\Request();
                $objetoRequest['url'] = $data['resourceType'];
                $objetoRequest['method'] = $item->ihs_ms == null ? 'POST' : 'PUT';
                $objetoRequest['data'] = $data;
                
                // dd($data);
                $response =  $this->ihsTools($objetoRequest, true);


                $noterror = true;
                if ($response->resourceType == 'OperationOutcome') {
                    $noterror = false;
                }

                if ($item->ihs_ms == null) {
                    $mod = new IHS_Transaction();
                    $mod->norec = $mod->generateNewId();
                    $mod->statusenabled = $noterror;
                    $mod->kdprofile = $this->kdProfile;
                } else {
                    $mod = IHS_Transaction::where('id', $item->ihs_ms)->first();
                }
                if (empty($mod)) {
                    $mod = new IHS_Transaction();
                    $mod->norec = $mod->generateNewId();
                    $mod->statusenabled = $noterror;
                    $mod->kdprofile = $this->kdProfile;
                }
                $mod->resourcetype = $data['resourceType'];
                $mod->url =  $this->endPoint() . $data['resourceType'];
                $mod->method = $item->ihs_ms == null ? 'POST' : 'PUT';
                $mod->id = isset($response->id) ? $response->id : null;
                $mod->body = json_encode($data);
                $mod->response = json_encode($response);
                $mod->date = date('Y-m-d H:i:s');
                $mod->save();
                if (isset($response->id)) {
                    PelayananPasien::where('norec', $item->norec)->update([
                        'ihs_medicationstatement' => $response->id,
                    ]);
                }
            }
        } catch (Exception $e) {
            $response = array(
                "issue" => $e->getMessage() . ' ' . $e->getLine(),
                "resourceType" => "OperationOutcome"
            );
        }

        if ($lokal == true) {
            return $response;
        }
        return response()->json($response);
    }
    
    public function Immunization(Request $request, $lokal = null)
    {
        try {
            $kdProfile = (int) $this->kdProfile;
            $noregistrasi = $request->input('noregistrasi');

            if (empty($noregistrasi)) {
                $response = [
                    'resourceType' => 'OperationOutcome',
                    'issue' => 'Nomor registrasi wajib diisi'
                ];

                return $lokal == true ? $response : response()->json($response);
            }

            $q = collect(DB::select("
                SELECT
                    pp.norec,
                    pp.produkfk,
                    pp.tglpelayanan AS expiration_date,
                    pd.norec AS norec_pendaftaran,
                    pd.noregistrasi,
                    pd.tglregistrasi AS tglpelayanan,
                    pro.ihs_kfa_code,
                    pro.namaproduk,
                    ps.ihs_number AS ihs_pasien,
                    ps.namapasien,
                    pd.ihs_id AS ihs_encounter,
                    pd.ihs_immunization,
                    pg.ihs_id AS ihs_practitioner,
                    pg.namalengkap AS nama_practitioner,
                    ru.namaruangan,
                    ru.ihs_id AS ihs_location
                FROM pelayananpasien_t AS pp
                INNER JOIN antrianpasiendiperiksa_t AS apd
                    ON apd.norec = pp.noregistrasifk
                INNER JOIN pasiendaftar_t AS pd
                    ON pd.norec = apd.noregistrasifk
                INNER JOIN produk_m AS pro
                    ON pro.id = pp.produkfk
                INNER JOIN ruangan_m AS ru
                    ON ru.id = pd.objectruanganlastfk
                INNER JOIN pasien_m AS ps
                    ON ps.id = pd.nocmfk
                LEFT JOIN pegawai_m AS pg
                    ON pg.id = pd.objectpegawaifk
                WHERE pp.kdprofile = ?
                    AND pro.statusenabled = TRUE
                    AND pd.noregistrasi = ?
                    AND ps.tgllahir IS NOT NULL
                    AND ps.tgllahir > (
                        pd.tglregistrasi::date - INTERVAL '6 months'
                    )
                    AND ps.tgllahir <= pd.tglregistrasi::date
                    AND ps.ihs_number IS NOT NULL
                    AND pd.ihs_id IS NOT NULL
                    AND pp.isobat IS NOT NULL
                    AND pd.ihs_immunization IS NULL
                ORDER BY pp.tglpelayanan ASC, pp.norec ASC
            ", [
                $kdProfile,
                $noregistrasi
            ]));

            if ($q->isEmpty()) {
                $response = [
                    'resourceType' => 'OperationOutcome',
                    'issue' => 'Data imunisasi pasien di bawah 6 bulan yang belum dikirim tidak ditemukan'
                ];

                return $lokal == true ? $response : response()->json($response);
            }

            $profile = Profile::where('id', $kdProfile)
                ->where('statusenabled', true)
                ->first();

            if (!$profile) {
                $response = [
                    'resourceType' => 'OperationOutcome',
                    'issue' => 'Profile tidak ditemukan'
                ];

                return $lokal == true ? $response : response()->json($response);
            }

            $response = null;

            foreach ($q as $item) {
                $requiredFields = [
                    'IHS Patient' => $item->ihs_pasien,
                    'IHS Encounter' => $item->ihs_encounter,
                    'IHS Location' => $item->ihs_location,
                    'IHS Practitioner' => $item->ihs_practitioner
                ];

                $missing = [];

                foreach ($requiredFields as $label => $value) {
                    if ($value === null || trim((string) $value) === '') {
                        $missing[] = $label;
                    }
                }

                if (!empty($missing)) {
                    $response = [
                        'resourceType' => 'OperationOutcome',
                        'issue' => implode(', ', $missing) . ' belum tersedia'
                    ];

                    continue;
                }

                if (
                    empty($item->tglpelayanan) ||
                    strtotime($item->tglpelayanan) === false
                ) {
                    $response = [
                        'resourceType' => 'OperationOutcome',
                        'issue' => 'Tanggal pelayanan tidak valid'
                    ];

                    continue;
                }

                $tanggalImunisasi = date(
                    'Y-m-d\TH:i:s+00:00',
                    strtotime($item->tglpelayanan)
                );

                $data = [
                    'resourceType' => 'Immunization',
                    'status' => 'not-done',
                    'statusReason' => [
                        'coding' => [
                            [
                                'system' => 'http://terminology.hl7.org/CodeSystem/v3-ActReason',
                                'code' => 'MEDPREC',
                                'display' => 'Medical precaution'
                            ]
                        ]
                    ],
                    'vaccineCode' => [
                        'coding' => [
                            [
                                'system' => 'http://sys-ids.kemkes.go.id/kfa',
                                'code' => '93001282',
                                'display' => 'Vaksin DTP - HB - Hib 0,5 mL (PENTABIO, 1)'
                            ],
                            [
                                'system' => 'http://sys-ids.kemkes.go.id/kfa',
                                'code' => 'VG17',
                                'display' => 'HIB'
                            ],
                            [
                                'system' => 'http://hl7.org/fhir/sid/cvx',
                                'code' => '102',
                                'display' => 'DTP-Hib-Hep B'
                            ]
                        ]
                    ],
                    'patient' => [
                        'reference' => 'Patient/' . $item->ihs_pasien,
                        'display' => $item->namapasien
                    ],
                    'encounter' => [
                        'reference' => 'Encounter/' . $item->ihs_encounter
                    ],
                    'occurrenceDateTime' => $tanggalImunisasi,
                    'recorded' => $tanggalImunisasi,
                    'primarySource' => true,
                    'location' => [
                        'reference' => 'Location/' . $item->ihs_location,
                        'display' => $item->namaruangan
                    ],
                    'lotNumber' => '202009007',
                    'route' => [
                        'coding' => [
                            [
                                'system' => 'http://www.whocc.no/atc',
                                'code' => 'inj.intramuscular',
                                'display' => 'Injection Intramuscular'
                            ]
                        ]
                    ],
                    'doseQuantity' => [
                        'value' => 1,
                        'unit' => 'mL',
                        'system' => 'http://unitsofmeasure.org',
                        'code' => 'ml'
                    ],
                    'performer' => [
                        [
                            'function' => [
                                'coding' => [
                                    [
                                        'system' => 'http://terminology.hl7.org/CodeSystem/v2-0443',
                                        'code' => 'OP',
                                        'display' => 'Ordering Provider'
                                    ]
                                ]
                            ],
                            'actor' => [
                                'reference' => 'Practitioner/' . $item->ihs_practitioner
                            ]
                        ]
                    ],
                    'reasonCode' => [
                        [
                            'coding' => [
                                [
                                    'system' => 'http://terminology.kemkes.go.id/CodeSystem/immunization-reason',
                                    'code' => 'IM-Dasar',
                                    'display' => 'Imunisasi Program Rutin Dasar'
                                ],
                                [
                                    'system' => 'http://terminology.kemkes.go.id/CodeSystem/immunization-routine-timing',
                                    'code' => 'IM-Ideal',
                                    'display' => 'Imunisasi Ideal'
                                ]
                            ]
                        ]
                    ],
                    'protocolApplied' => [
                        [
                            'doseNumberPositiveInt' => 1
                        ]
                    ]
                ];

                $objetoRequest = new \Illuminate\Http\Request();
                $objetoRequest->replace([
                    'url' => 'Immunization',
                    'method' => 'POST',
                    'data' => $data
                ]);

                $response = $this->ihsTools($objetoRequest, true);

                $isError = !is_object($response) ||
                    (
                        isset($response->resourceType) &&
                        $response->resourceType === 'OperationOutcome'
                    );

                $mod = new IHS_Transaction();
                $mod->norec = $mod->generateNewId();
                $mod->statusenabled = !$isError;
                $mod->kdprofile = $kdProfile;
                $mod->resourcetype = 'Immunization';
                $mod->url = $this->endPoint() . 'Immunization';
                $mod->method = 'POST';
                $mod->id = isset($response->id) ? $response->id : null;
                $mod->body = json_encode($data);
                $mod->response = json_encode($response);
                $mod->date = date('Y-m-d H:i:s');
                $mod->save();

                if (!$isError && !empty($response->id)) {
                    DB::table('pasiendaftar_t')
                        ->where('norec', $item->norec_pendaftaran)
                        ->whereNull('ihs_immunization')
                        ->update([
                            'ihs_immunization' => $response->id
                        ]);
                }
            }
        } catch (\Exception $e) {
            $response = [
                'resourceType' => 'OperationOutcome',
                'issue' => $e->getMessage() . ' pada baris ' . $e->getLine()
            ];
        }

        if ($lokal == true) {
            return $response;
        }

        return response()->json($response);
    }

    public function ResourceType($resource, Request $request, $lokal = null)
    {
        try {
            $response = $this->$resource($request, $lokal);
        } catch (\Exception $e) {
            $response = array(
                "issue" => $e->getMessage() . ' ' . $e->getLine(),
                "resourceType" => "OperationOutcome"
            );
        }
        if ($lokal == true) {
            return $response;
        }
        return response()->json($response);
    }

    
    public function ServiceRequest(Request $request, $lokal = null)
    {
        $kdProfile = $this->kdProfile;
        $noorder = trim($request->input('noorder', ''));

        if ($noorder == '') {
            $response = [
                'resourceType' => 'OperationOutcome',
                'issue' => [
                    [
                        'severity' => 'error',
                        'code' => 'required',
                        'details' => [
                            'text' => 'Parameter noorder wajib diisi'
                        ]
                    ]
                ]
            ];

            return $lokal ? $response : response()->json($response);
        }

        $q = collect(DB::select("
            SELECT
                so.noorder,
                so.tglorder,
                so.keteranganorder,
                pr.namaproduk,
                op.objectprodukfk,
                pr.ihs_loinc_id,
                pr.ihs_loinc_common_name,
                ps.ihs_number AS ihs_pasien,
                ps.namapasien,
                pd.ihs_id AS ihs_encounter,
                pg.ihs_id AS r,
                pg.namalengkap AS dokterorder,
                ru.namaruangan,
                ru.ihs_id AS ihs_ruangan,
                so.keteranganlainnya,
                pg2.ihs_id AS ihs_performer,
                pg2.namalengkap AS nama_performer,
                op.ihs_id AS ihs_idforput,
                op.norec,
                ro.accession_num
            FROM strukorder_t AS so
            INNER JOIN orderpelayanan_t AS op
                ON op.strukorderfk = so.norec
            INNER JOIN pasiendaftar_t AS pd
                ON so.noregistrasifk = pd.norec
            INNER JOIN produk_m AS pr
                ON pr.id = op.objectprodukfk
            INNER JOIN pasien_m AS ps
                ON ps.id = pd.nocmfk
            INNER JOIN pegawai_m AS pg
                ON pg.id = pd.objectpegawaifk
            INNER JOIN ruangan_m AS ru
                ON ru.id = so.objectruanganfk
            LEFT JOIN pegawai_m AS pg2
                ON pg2.id = pd.objectpegawaifk
            LEFT JOIN ris_order AS ro
                ON ro.order_no = so.noorder
            WHERE pd.kdprofile = ?
                AND so.noorder = ?
        ", [$kdProfile, $noorder]));

        if ($q->isEmpty()) {
            $response = [
                'resourceType' => 'OperationOutcome',
                'issue' => [
                    [
                        'severity' => 'error',
                        'code' => 'not-found',
                        'details' => [
                            'text' => 'ServiceRequest tidak ditemukan untuk noorder ' . $noorder
                        ]
                    ]
                ]
            ];

            return $lokal ? $response : response()->json($response);
        }

        $profile = Profile::where('id', $kdProfile)->first();

        if (empty($profile) || empty($profile->ihs_id)) {
            $response = [
                'resourceType' => 'OperationOutcome',
                'issue' => [
                    [
                        'severity' => 'error',
                        'code' => 'required',
                        'details' => [
                            'text' => 'IHS ID organisasi pada Profile belum tersedia'
                        ]
                    ]
                ]
            ];

            return $lokal ? $response : response()->json($response);
        }

        $hasil = [];
        $berhasil = 0;
        $gagal = 0;

        foreach ($q as $item) {
            $response = null;
            $data = [];
            $method = 'POST';
            $resourceId = trim((string) $item->ihs_idforput);

            try {
                /*
                * Validasi kode dan referensi wajib.
                */
                $loincId = trim((string) $item->ihs_loinc_id);
                $loincDisplay = trim((string) $item->ihs_loinc_common_name);

                $wajib = [
                    'IHS pasien' => $item->ihs_pasien,
                    'IHS Encounter' => $item->ihs_encounter,
                    'IHS Practitioner dokter' => $item->r,
                    'Kode LOINC produk' => $loincId
                ];

                $missing = [];

                foreach ($wajib as $nama => $nilai) {
                    if (trim((string) $nilai) == '') {
                        $missing[] = $nama;
                    }
                }

                if (!empty($missing)) {
                    throw new \Exception(
                        'Data belum lengkap: ' . implode(', ', $missing) .
                        '. ServiceRequest tidak dikirim.'
                    );
                }

                /*
                * Kode LOINC memakai system loinc.org.
                * Kode SNOMED tidak boleh diisi dengan kode LOINC
                * atau string kosong.
                */
                $isRadiologi = stripos(
                    (string) $item->keteranganorder,
                    'radiologi'
                ) !== false;

                $categoryCode = $isRadiologi ? '363679005' : '108252007';
                $categoryDisplay = $isRadiologi
                    ? 'Imaging'
                    : 'Laboratory procedure';

                $identifier = [
                    [
                        'system' => 'http://sys-ids.kemkes.go.id/servicerequest/' .
                            $profile->ihs_id,
                        'value' => $item->noorder
                    ]
                ];

                if (!empty($item->accession_num)) {
                    $identifier[] = [
                        'use' => 'usual',
                        'type' => [
                            'coding' => [
                                [
                                    'system' => 'http://terminology.hl7.org/CodeSystem/v2-0203',
                                    'code' => 'ACSN'
                                ]
                            ]
                        ],
                        'system' => 'http://sys-ids.kemkes.go.id/acsn/' .
                            $profile->ihs_id,
                        'value' => $item->accession_num
                    ];
                }

                $data = [
                    'resourceType' => 'ServiceRequest',
                    'identifier' => $identifier,
                    'status' => 'active',
                    'intent' => 'original-order',
                    'priority' => 'routine',
                    'category' => [
                        [
                            'coding' => [
                                [
                                    'system' => 'http://snomed.info/sct',
                                    'code' => $categoryCode,
                                    'display' => $categoryDisplay
                                ]
                            ]
                        ]
                    ],
                    'code' => [
                        'coding' => [
                            [
                                'system' => 'http://loinc.org',
                                'code' => $loincId
                            ]
                        ],
                        'text' => $loincDisplay != ''
                            ? $loincDisplay
                            : $item->namaproduk
                    ],
                    'subject' => [
                        'reference' => 'Patient/' . $item->ihs_pasien,
                        'display' => $item->namapasien
                    ],
                    'encounter' => [
                        'reference' => 'Encounter/' . $item->ihs_encounter,
                        'display' => 'Permintaan ' . $item->namaproduk . ' ' .
                            $item->namapasien . ' di hari ' .
                            $this->hari_ini($item->tglorder) . ', ' .
                            $this->getDateIndo($item->tglorder) . ' ' .
                            $this->getTime($item->tglorder)
                    ],
                    'occurrenceDateTime' => $this->dateISO($item->tglorder),
                    'authoredOn' => $this->dateISO($item->tglorder),
                    'requester' => [
                        'reference' => 'Practitioner/' . $item->r,
                        'display' => $item->dokterorder
                    ]
                ];

                if (!empty($item->ihs_performer)) {
                    $data['performer'] = [
                        [
                            'reference' => 'Practitioner/' . $item->ihs_performer,
                            'display' => $item->nama_performer
                        ]
                    ];
                }

                if (!empty($item->keteranganlainnya)) {
                    $data['reasonCode'] = [
                        [
                            'text' => $item->keteranganlainnya
                        ]
                    ];
                }

                /*
                * PUT hanya jika ID resource SATUSEHAT tersedia.
                * ID tidak dikirim pada payload POST.
                */
                if ($resourceId != '') {
                    $data['id'] = $resourceId;
                    $method = 'PUT';
                }

                $objetoRequest = new \Illuminate\Http\Request();
                $objetoRequest->replace([
                    'url' => $data['resourceType'] .
                        ($method == 'PUT' ? '/' . $resourceId : ''),
                    'method' => $method,
                    'data' => $data
                ]);

                $response = $this->ihsTools($objetoRequest, true);

                if (is_array($response)) {
                    $response = json_decode(json_encode($response));
                }

                if (!is_object($response)) {
                    throw new \Exception(
                        'Respons SATUSEHAT kosong atau format respons tidak valid'
                    );
                }

                $noterror = isset($response->resourceType)
                    && $response->resourceType != 'OperationOutcome'
                    && !empty($response->id);

                /*
                * Simpan transaksi, termasuk transaksi yang gagal.
                */
                $mod = null;

                if ($resourceId != '') {
                    $mod = IHS_Transaction::where('id', $resourceId)
                        ->where('resourcetype', 'ServiceRequest')
                        ->first();
                }

                if (empty($mod)) {
                    $mod = new IHS_Transaction();
                    $mod->norec = $mod->generateNewId();
                    $mod->kdprofile = $kdProfile;
                }

                $mod->statusenabled = $noterror;
                $mod->resourcetype = 'ServiceRequest';
                $mod->url = $this->endPoint() . $data['resourceType'] .
                    ($method == 'PUT' ? '/' . $resourceId : '');
                $mod->method = $method;
                $mod->id = isset($response->id)
                    ? $response->id
                    : ($resourceId != '' ? $resourceId : null);
                $mod->body = json_encode($data);
                $mod->response = json_encode($response);
                $mod->date = date('Y-m-d H:i:s');
                $mod->save();

                if ($noterror) {
                    OrderPelayanan::where('norec', $item->norec)->update([
                        'ihs_id' => $response->id
                    ]);

                    $berhasil++;
                } else {
                    $gagal++;
                }

                $hasil[] = [
                    'key' => $item->noorder,
                    'norec' => $item->norec,
                    'produk' => $item->namaproduk,
                    'method' => $method,
                    'success' => $noterror,
                    'response' => $response
                ];
            } catch (\Exception $e) {
                $gagal++;

                $errorResponse = [
                    'resourceType' => 'OperationOutcome',
                    'issue' => [
                        [
                            'severity' => 'error',
                            'code' => 'exception',
                            'details' => [
                                'text' => $e->getMessage()
                            ]
                        ]
                    ]
                ];

                $mod = new IHS_Transaction();
                $mod->norec = $mod->generateNewId();
                $mod->kdprofile = $kdProfile;
                $mod->statusenabled = false;
                $mod->resourcetype = 'ServiceRequest';
                $mod->url = $this->endPoint() . 'ServiceRequest' .
                    ($resourceId != '' ? '/' . $resourceId : '');
                $mod->method = $method;
                $mod->id = $resourceId != '' ? $resourceId : null;
                $mod->body = json_encode($data);
                $mod->response = json_encode($errorResponse);
                $mod->date = date('Y-m-d H:i:s');
                $mod->save();

                $hasil[] = [
                    'key' => $item->noorder,
                    'norec' => $item->norec,
                    'produk' => $item->namaproduk,
                    'method' => $method,
                    'success' => false,
                    'response' => $errorResponse
                ];
            }
        }

        $response = [
            'resourceType' => 'OperationOutcome',
            'summary' => [
                'noorder' => $noorder,
                'total' => count($hasil),
                'berhasil' => $berhasil,
                'gagal' => $gagal
            ],
            'result' => $hasil
        ];

        return $lokal ? $response : response()->json($response);
    }

    function dateISO($date)
    {
        $iso =  strtotime(date($date));
        $iso =  substr(date("Y-m-d\TH:i:s", $iso), 0, 23) . date('P', $iso);
        return  $iso;
    }
    function getTime($date)
    {
        return  date('H:i', strtotime(date($date)));
    }
    public function Specimen(Request $request, $lokal = null)
    {
        try {
            $kdProfile = $this->kdProfile;

            $noorder = trim((string) $request->noorder);

            if ($noorder === '') {
                $response = array(
                    'resourceType' => 'OperationOutcome',
                    'issue' => array(
                        array(
                            'severity' => 'error',
                            'code' => 'required',
                            'details' => array(
                                'text' => 'No order wajib diisi'
                            )
                        )
                    )
                );

                if ($lokal == true) {
                    return $response;
                }

                return response()->json($response);
            }

            $q = collect(DB::select("
                SELECT
                    so.noorder,
                    so.tglorder,
                    pr.namaproduk,
                    op.objectprodukfk,
                    pr.ihs_loinc_id,
                    pr.ihs_loinc_common_name,
                    ps.ihs_number,
                    ps.noidentitas,
                    ps.ihs_number AS ihs_pasien,
                    ps.namapasien,
                    pd.ihs_id AS ihs_encounter,
                    pg.noidentitas AS nik_dokter,
                    CASE
                        WHEN ru2.objectdepartemenfk = 3 THEN '10007015680'
                        WHEN ru2.objectdepartemenfk = 27 THEN '10000015160'
                        ELSE pg.ihs_id
                    END AS ihs_practitioner,

                    CASE
                        WHEN ru2.objectdepartemenfk = 3 THEN 'dr. Nita Yulianti, Sp.PK'
                        WHEN ru2.objectdepartemenfk = 27 THEN 'dr. Andika Resa, Sp. Rad'
                        ELSE pg.namalengkap
                    END AS dokterorder,

                    pg2.ihs_id AS ihs_performer,
                    pg2.namalengkap AS nama_performer,
                    ru.namaruangan,
                    ru.ihs_id AS ihs_ruangan,
                    so.keteranganlainnya,
                    op.ihs_specimen AS ihs_idforput,
                    op.ihs_id AS ihs_service_req,
                    op.norec
                FROM strukorder_t AS so
                INNER JOIN orderpelayanan_t AS op
                    ON op.strukorderfk = so.norec
                INNER JOIN pasiendaftar_t AS pd
                    ON so.noregistrasifk = pd.norec
                INNER JOIN produk_m AS pr
                    ON pr.id = op.objectprodukfk
                INNER JOIN pasien_m AS ps
                    ON ps.id = pd.nocmfk
                INNER JOIN pegawai_m AS pg
                    ON pg.id = so.objectpegawaiorderfk
                INNER JOIN ruangan_m AS ru
                    ON ru.id = so.objectruanganfk
                    INNER JOIN ruangan_m AS ru2
                    ON ru2.id = so.objectruangantujuanfk
                LEFT JOIN pegawai_m AS pg2
                    ON pg2.id = pd.objectpegawaifk
                WHERE
                    pd.kdprofile = ?
                    AND pr.ihs_loinc_id IS NOT NULL
                    AND so.noorder = ?
                ORDER BY pd.tglregistrasi
            ", array(
                $kdProfile,
                $noorder
            )));

            if ($q->count() == 0) {
                $response = array(
                    'resourceType' => 'OperationOutcome',
                    'issue' => array(
                        array(
                            'severity' => 'error',
                            'code' => 'not-found',
                            'details' => array(
                                'text' => 'Specimen tidak ditemukan untuk No Order ' . $noorder
                            )
                        )
                    )
                );

                if ($lokal == true) {
                    return $response;
                }

                return response()->json($response);
            }

            $profile = Profile::where('id', $kdProfile)->first();

            if (empty($profile) || empty($profile->ihs_id)) {
                $response = array(
                    'resourceType' => 'OperationOutcome',
                    'issue' => array(
                        array(
                            'severity' => 'error',
                            'code' => 'required',
                            'details' => array(
                                'text' => 'IHS Organization/Profile belum tersedia'
                            )
                        )
                    )
                );

                if ($lokal == true) {
                    return $response;
                }

                return response()->json($response);
            }

            $createOperationOutcome = function ($message) {
                return array(
                    'resourceType' => 'OperationOutcome',
                    'issue' => array(
                        array(
                            'severity' => 'error',
                            'code' => 'value',
                            'details' => array(
                                'text' => $message
                            )
                        )
                    )
                );
            };

            foreach ($q as $item) {

                /*
                * =========================================================
                * PATIENT
                * =========================================================
                */
                $ihsPasien = trim((string) $item->ihs_pasien);

                if ($ihsPasien === '') {
                    $nikPasien = trim((string) $item->noidentitas);

                    if ($nikPasien === '') {
                        $response = $createOperationOutcome(
                            'IHS Patient tidak tersedia dan NIK pasien kosong untuk No Registrasi terkait'
                        );

                        if ($lokal == true) {
                            return $response;
                        }

                        return response()->json($response);
                    }

                    $objetoRequest = new \Illuminate\Http\Request();
                    $objetoRequest['url'] =
                        'Patient?identifier=http://fhir.kemkes.go.id/id/nik|' . $nikPasien;
                    $objetoRequest['method'] = 'GET';
                    $objetoRequest['data'] = null;

                    $response2 = $this->ihsTools($objetoRequest, true);

                    if (
                        isset($response2->resourceType) &&
                        $response2->resourceType == 'Bundle' &&
                        isset($response2->total) &&
                        $response2->total > 0 &&
                        isset($response2->entry)
                    ) {
                        $idIHS = null;

                        foreach ($response2->entry as $entry) {
                            if (
                                isset($entry->resource) &&
                                isset($entry->resource->id)
                            ) {
                                $idIHS = $entry->resource->id;
                                break;
                            }
                        }

                        if ($idIHS !== null) {
                            Pasien::where('noidentitas', $nikPasien)->update(array(
                                'ihs_number' => $idIHS
                            ));

                            $ihsPasien = $idIHS;
                        }
                    }

                    if ($ihsPasien === '') {
                        $response = $createOperationOutcome(
                            'IHS Patient tidak ditemukan berdasarkan NIK ' . $nikPasien
                        );

                        if ($lokal == true) {
                            return $response;
                        }

                        return response()->json($response);
                    }
                }

                /*
                * =========================================================
                * PRACTITIONER
                * =========================================================
                */
                $ihsPractitioner = trim((string) $item->ihs_practitioner);

                if ($ihsPractitioner === '') {
                    $nikDokter = trim((string) $item->nik_dokter);

                    if ($nikDokter === '') {
                        $response = $createOperationOutcome(
                            'IHS Practitioner tidak tersedia dan NIK dokter kosong untuk dokter ' .
                            $item->dokterorder
                        );

                        if ($lokal == true) {
                            return $response;
                        }

                        return response()->json($response);
                    }

                    $objetoRequest = new \Illuminate\Http\Request();
                    $objetoRequest['url'] =
                        'Practitioner?identifier=http://fhir.kemkes.go.id/id/nik|' . $nikDokter;
                    $objetoRequest['method'] = 'GET';
                    $objetoRequest['data'] = null;

                    $response2 = $this->ihsTools($objetoRequest, true);

                    if (
                        isset($response2->resourceType) &&
                        $response2->resourceType == 'Bundle' &&
                        isset($response2->total) &&
                        $response2->total > 0 &&
                        isset($response2->entry)
                    ) {
                        $idIHSDok = null;

                        foreach ($response2->entry as $entry) {
                            if (
                                isset($entry->resource) &&
                                isset($entry->resource->id)
                            ) {
                                $idIHSDok = $entry->resource->id;
                                break;
                            }
                        }

                        if ($idIHSDok !== null) {
                            Pegawai::where('noidentitas', $nikDokter)->update(array(
                                'ihs_id' => $idIHSDok
                            ));

                            $ihsPractitioner = $idIHSDok;
                        }
                    }

                    if ($ihsPractitioner === '') {
                        $response = $createOperationOutcome(
                            'IHS Practitioner tidak ditemukan berdasarkan NIK dokter ' .
                            $nikDokter
                        );

                        if ($lokal == true) {
                            return $response;
                        }

                        return response()->json($response);
                    }
                }

                /*
                * =========================================================
                * SERVICE REQUEST
                * =========================================================
                */
                $ihsServiceRequest = trim((string) $item->ihs_service_req);

                if ($ihsServiceRequest === '') {
                    $response = $createOperationOutcome(
                        'IHS ServiceRequest belum tersedia untuk order ' .
                        $item->noorder .
                        ' / produk ' .
                        $item->namaproduk
                    );

                    if ($lokal == true) {
                        return $response;
                    }

                    return response()->json($response);
                }

                /*
                * =========================================================
                * VALIDASI FINAL REFERENCE
                * =========================================================
                */
                if ($ihsPractitioner === '') {
                    $response = $createOperationOutcome(
                        'Reference Practitioner tidak boleh kosong'
                    );

                    if ($lokal == true) {
                        return $response;
                    }

                    return response()->json($response);
                }

                if ($ihsServiceRequest === '') {
                    $response = $createOperationOutcome(
                        'Reference ServiceRequest tidak boleh kosong'
                    );

                    if ($lokal == true) {
                        return $response;
                    }

                    return response()->json($response);
                }

                if ($ihsPasien === '') {
                    $response = $createOperationOutcome(
                        'Reference Patient tidak boleh kosong'
                    );

                    if ($lokal == true) {
                        return $response;
                    }

                    return response()->json($response);
                }

                /*
                * =========================================================
                * SPECIMEN PAYLOAD
                * =========================================================
                */
                $data = array(
                    'resourceType' => 'Specimen',
                    'identifier' => array(
                        array(
                            'system' =>
                                'http://sys-ids.kemkes.go.id/specimen/' .
                                $profile->ihs_id,
                            'value' => '00001',
                            'assigner' => array(
                                'reference' => 'Organization/' . $profile->ihs_id
                            )
                        )
                    ),
                    'status' => 'unavailable',
                    'type' => array(
                        'coding' => array(
                            array(
                                'system' => 'http://snomed.info/sct',
                                'code' => '260414001',
                                'display' => 'Nothing (qualifier value)'
                            )
                        )
                    ),
                    'collection' => array(
                        'method' => array(
                            'coding' => array(
                                array(
                                    'system' => 'http://snomed.info/sct',
                                    'code' => '281325009',
                                    'display' =>
                                        'No specimen collection time given (finding)'
                                )
                            )
                        ),
                        'collectedDateTime' => $this->dateISO($item->tglorder),
                        'collector' => array(
                            'reference' => 'Practitioner/' . $ihsPractitioner
                        )
                    ),
                    'subject' => array(
                        'reference' => 'Patient/' . $ihsPasien,
                        'display' => $item->namapasien
                    ),
                    'request' => array(
                        array(
                            'reference' => 'ServiceRequest/' . $ihsServiceRequest
                        )
                    ),
                    'receivedTime' => $this->dateISO($item->tglorder)
                );

                /*
                * =========================================================
                * POST / PUT
                * =========================================================
                */
                $ihsSpecimen = trim((string) $item->ihs_idforput);

                if ($ihsSpecimen !== '') {
                    $data['id'] = $ihsSpecimen;
                    $method = 'PUT';
                    $url = 'Specimen/' . $ihsSpecimen;
                } else {
                    $method = 'POST';
                    $url = 'Specimen';
                }

                $objetoRequest = new \Illuminate\Http\Request();
                $objetoRequest['url'] = $url;
                $objetoRequest['method'] = $method;
                $objetoRequest['data'] = $data;

                $response = $this->ihsTools($objetoRequest, true);

                /*
                * =========================================================
                * CHECK RESPONSE
                * =========================================================
                */
                $noterror = true;

                if (
                    is_object($response) &&
                    isset($response->resourceType) &&
                    $response->resourceType == 'OperationOutcome'
                ) {
                    $noterror = false;
                }

                /*
                * =========================================================
                * SIMPAN TRANSAKSI IHS
                * =========================================================
                */
                if ($ihsSpecimen === '') {
                    $mod = new IHS_Transaction();
                    $mod->norec = $mod->generateNewId();
                    $mod->kdprofile = $kdProfile;
                } else {
                    $mod = IHS_Transaction::where(
                        'id',
                        $ihsSpecimen
                    )->first();

                    if (empty($mod)) {
                        $mod = new IHS_Transaction();
                        $mod->norec = $mod->generateNewId();
                        $mod->kdprofile = $kdProfile;
                    }
                }

                $mod->statusenabled = $noterror;
                $mod->resourcetype = 'Specimen';
                $mod->url = $this->endPoint() . $url;
                $mod->method = $method;
                $mod->id = isset($response->id) ? $response->id : $ihsSpecimen;
                $mod->body = json_encode($data);
                $mod->response = json_encode($response);
                $mod->date = date('Y-m-d H:i:s');
                $mod->save();

                /*
                * =========================================================
                * UPDATE ORDER PELAYANAN
                * =========================================================
                */
                if (isset($response->id) && !empty($response->id)) {
                    OrderPelayanan::where(
                        'norec',
                        $item->norec
                    )->update(array(
                        'ihs_specimen' => $response->id
                    ));
                }

                /*
                * Jika ada OperationOutcome, hentikan proses
                */
                if (!$noterror) {
                    if ($lokal == true) {
                        return $response;
                    }

                    return response()->json($response);
                }
            }

            /*
            * Jika seluruh proses berhasil,
            * response terakhir dikembalikan.
            */
        } catch (\Exception $e) {
            $response = array(
                'resourceType' => 'OperationOutcome',
                'issue' => array(
                    array(
                        'severity' => 'error',
                        'code' => 'exception',
                        'details' => array(
                            'text' => $e->getMessage() . ' Line: ' . $e->getLine()
                        )
                    )
                )
            );
        }

        if ($lokal == true) {
            return $response;
        }

        return response()->json($response);
    }
    
    public function NutritionOrder(Request $request, $lokal = null)
    {
        try {

            $kdProfile = $this->kdProfile;

            $q = collect(DB::select("
                SELECT
                    so.norec AS norec_so,
                    op.norec AS norec_op,
                    so.noorder,
                    so.tglorder,
                    so.tglpelayananawal AS tglmenu,
                    pd.tglregistrasi,
                    pd.tglpulang,
                    pd.noregistrasi,
                    pd.ihs_id AS ihs_encounter,
                    ps.id AS nocmfk,
                    ps.ihs_number,
                    ps.noidentitas,
                    ps.namapasien,
                    ps.nocm,
                    ps.tgllahir,
                    ru.namaruangan AS ruanganasal,
                    ru.id AS objectruanganfk,
                    ru2.namaruangan AS ruangantujuan,
                    jk.jeniskelamin,

                    jw.jeniswaktu,

                    op.objectkategorydietfk,
                    kd.kategorydiet,

                    op.objectjeniswaktufk,
                    op.objectjenisdietfk,

                    op.qtyproduk,
                    op.keteranganlainnya,
                    op.statusgizi AS jenisorder,
                    op.qtyprodukinuse AS cc,
                    op.jumlah AS volume,

                    op.objectkelasfk,
                    kls.namakelas,

                    op.arrjenisdiet,

                    so.objectpegawaiorderfk,
                    pg.namalengkap AS pegawaiorder,
                    pg.ihs_id AS r,

                    sk.nokirim,
                    sk.qtyproduk,

                    op.strukkirimfk,

                    CASE
                        WHEN op.strukkirimfk IS NOT NULL
                        THEN 'Sudah Dikirim'
                        ELSE '-'
                    END AS statuskirim,

                    pro.ihs_id AS ihs_service_provider

                FROM orderpelayanan_t op
                JOIN pasiendaftar_t pd ON pd.norec = op.noregistrasifk
                JOIN ruangan_m ru ON ru.id = op.objectruanganfk
                JOIN pasien_m ps ON ps.id = op.nocmfk
                LEFT JOIN jeniskelamin_m jk ON jk.id = ps.objectjeniskelaminfk
                JOIN strukorder_t so ON so.norec = op.strukorderfk
                JOIN ruangan_m ru2 ON ru2.id = so.objectruangantujuanfk
                LEFT JOIN strukkirim_t sk ON sk.norec = op.strukkirimfk
                LEFT JOIN jeniswaktu_m jw ON jw.id = op.objectjeniswaktufk
                JOIN kategorydiet_m kd ON kd.id = op.objectkategorydietfk
                LEFT JOIN kelas_m kls ON kls.id = op.objectkelasfk
                LEFT JOIN pegawai_m pg ON pg.id = so.objectpegawaiorderfk
                JOIN profile_m pro ON pro.id = pd.kdprofile

                WHERE so.kdprofile = ?
                AND so.statusenabled = true
                AND op.statusenabled = true
                AND so.objectkelompoktransaksifk = 8
                AND op.norec = ?

                LIMIT 1
            ", [
                $kdProfile,
                $request->norec_op
            ]))->first();

            if (!$q) {
                return response()->json([
                    "resourceType" => "OperationOutcome",
                    "issue" => "Data order gizi tidak ditemukan"
                ]);
            }


            $profile = DB::table('profile_m')
                ->where('id', $kdProfile)
                ->first();

            $IHS_NUMBER_PASIEN = $q->ihs_number;


            if (!$IHS_NUMBER_PASIEN && $q->noidentitas) {

                $reqIhs = new \Illuminate\Http\Request();

                $reqIhs['url'] =
                    'Patient?identifier=https://fhir.kemkes.go.id/id/nik|' .
                    $q->noidentitas;

                $reqIhs['method'] = 'GET';
                $reqIhs['data'] = null;

                $res = $this->ihsTools($reqIhs, true);


                if (isset($res->resourceType) && $res->resourceType == 'Bundle' && $res->total > 0) {
                    foreach ($res->entry as $e) {
                        $IHS_NUMBER_PASIEN =
                            $e->resource->id ?? null;

                        if ($IHS_NUMBER_PASIEN) {
                            break;
                        }
                    }

                    if ($IHS_NUMBER_PASIEN) {
                        Pasien::where('noidentitas', $q->noidentitas)
                            ->update([
                                'ihs_number' => $IHS_NUMBER_PASIEN
                            ]);
                    }
                }
            }

            if (!$IHS_NUMBER_PASIEN) {

                return response()->json([
                    "resourceType" => "OperationOutcome",
                    "issue" => "IHS Patient tidak ditemukan"
                ]);
            }
            $fmt = function ($t) {

                if (!$t) {
                    return null;
                }

                $ts = strtotime($t);

                return date(
                    "Y-m-d\TH:i:sP",
                    $ts
                );
            };
            $tglOrder = $fmt($q->tglorder);
            $tglMenu  = $fmt($q->tglmenu);
            $oralDietType = [];

            if ($q->kategorydiet) {

                $oralDietType[] = [
                    'text' => $q->kategorydiet
                ];
            }

            $schedule = null;

            if ($q->jenisorder) {

               $schedule = [
                    [
                        'repeat' => [
                            'frequency' => 1,
                            'period' => 1,
                            'periodUnit' => 'd'
                        ]
                    ]
                ];
            }

            $instruction = [];

            if ($q->kategorydiet) {
                $instruction[] = 'Diet: ' . $q->kategorydiet;
            }

            if ($q->jeniswaktu) {
                $instruction[] = 'Waktu: ' . $q->jeniswaktu;
            }

            if ($q->keteranganlainnya) {
                $instruction[] = $q->keteranganlainnya;
            }

            if ($q->namakelas) {
                $instruction[] = 'Kelas: ' . $q->namakelas;
            }
            $oralDiet = [
                'type' => $oralDietType
            ];


            if ($schedule) {
                $oralDiet['schedule'] = $schedule;
            }


            if (!empty($instruction)) {

                $oralDiet['instruction'] =
                    implode('. ', $instruction);
            }
            $data = [
                'resourceType' => 'NutritionOrder',

                'identifier' => [
                    [
                        'system' =>
                            'http://sys-ids.kemkes.go.id/nutrition-order/' .
                            $profile->ihs_id,

                        'value' => $q->noorder
                    ]
                ],
                'status' => 'active',
                'intent' => 'order',
                'patient' => [
                    'reference' => 'Patient/' . $IHS_NUMBER_PASIEN,
                    'display'   => $q->namapasien
                ],
                'dateTime' => $tglOrder,
                'oralDiet' => $oralDiet
            ];

            if ($q->ihs_encounter) {

                $data['encounter'] = [
                    'reference' =>
                        'Encounter/' . $q->ihs_encounter
                ];
            }

            if ($q->r) {

                $data['orderer'] = [
                    'reference' =>
                        'Practitioner/' . $q->r,

                    'display' =>
                        $q->pegawaiorder
                ];
            }


            // dd($data);


            $req = new \Illuminate\Http\Request();

            $req['url'] = 'NutritionOrder';
            $req['method'] = 'POST';
            $req['data'] = $data;

            $response = $this->ihsTools($req,true);
            $mod = new IHS_Transaction();
            $mod->norec = $mod->generateNewId();
            $mod->statusenabled =($response->resourceType ?? null) != 'OperationOutcome';
            $mod->kdprofile = $kdProfile;
            $mod->resourcetype ='NutritionOrder';
            $mod->url = $this->endPoint() . 'NutritionOrder';
            $mod->method = 'POST';
            $mod->body = json_encode($data);
            $mod->response =json_encode($response);
            $mod->date =date('Y-m-d H:i:s');
            $mod->save();
            if (isset($response->id)) {
                    OrderPelayanan::where('norec', $q->norec_op)->update([
                        'ihs_id' => $response->id,
                    ]);
                }


            return response()->json($response);


        } catch (\Exception $e) {

            return response()->json([
                "resourceType" => "OperationOutcome",
                "issue" =>
                    $e->getMessage() .
                    ' line ' .
                    $e->getLine()
            ]);
        }
    }
     public function EpisodeOfCare(Request $request, $lokal = null)
{
    try {
        $kdProfile = (int) $this->kdProfile;

        $q = collect(DB::select("
            SELECT
                ps.ihs_number,
                ps.noidentitas,
                ps.namapasien,
                CASE
                    WHEN ru.objectdepartemenfk = 16 THEN 'IMP'
                    ELSE 'AMB'
                END AS code_class,
                pg.ihs_id AS ihs_practitioner,
                pg.namalengkap AS dokter,
                pg.noidentitas AS nik_dokter,
                pd.tglregistrasi,
                pd.tglpulang,
                pd.noregistrasi,
                pd.ihs_id AS ihs_encounter,
                pro.ihs_id AS ihs_service_provider,
                pd.ihs_condition,
                pd.ihs_in_progress,
                pd.ihs_finished,
                stt.statuspulang
            FROM pasiendaftar_t AS pd
            INNER JOIN pasien_m AS ps
                ON ps.id = pd.nocmfk
            INNER JOIN ruangan_m AS ru
                ON ru.id = pd.objectruanganlastfk
            INNER JOIN profile_m AS pro
                ON pro.id = pd.kdprofile
            LEFT JOIN pegawai_m AS pg
                ON pg.id = pd.objectpegawaifk
            LEFT JOIN statuspulang_m AS stt
                ON stt.id = pd.objectstatuspulangfk
            WHERE pd.kdprofile = ?
                AND pd.noregistrasi = ?
        ", [
            $kdProfile,
            $request->noregistrasi
        ]))->first();

        if (!$q) {
            return response()->json([
                'resourceType' => 'OperationOutcome',
                'issue' => [
                    [
                        'severity' => 'error',
                        'code' => 'not-found',
                        'details' => [
                            'text' => 'Data registrasi tidak ditemukan.'
                        ]
                    ]
                ]
            ], 404);
        }

        $profile = DB::table('profile_m')
            ->where('id', $kdProfile)
            ->first();

        if (!$profile || empty($profile->ihs_id)) {
            throw new \Exception('IHS ID Organization belum tersedia.');
        }

        $ihsPasien = $q->ihs_number;

        if (empty($ihsPasien) && !empty($q->noidentitas)) {
            $reqIhs = new \Illuminate\Http\Request();
            $reqIhs['url'] = 'Patient?identifier=https://fhir.kemkes.go.id/id/nik|' . $q->noidentitas;
            $reqIhs['method'] = 'GET';
            $reqIhs['data'] = null;

            $res = $this->ihsTools($reqIhs, true);

            if (
                isset($res->resourceType) &&
                $res->resourceType === 'Bundle' &&
                !empty($res->entry)
            ) {
                foreach ($res->entry as $entry) {
                    if (
                        isset($entry->resource->resourceType) &&
                        $entry->resource->resourceType === 'Patient' &&
                        !empty($entry->resource->id)
                    ) {
                        $ihsPasien = $entry->resource->id;
                        break;
                    }
                }

                if ($ihsPasien) {
                    Pasien::where('noidentitas', $q->noidentitas)
                        ->update([
                            'ihs_number' => $ihsPasien
                        ]);
                }
            }
        }

        if (empty($ihsPasien)) {
            throw new \Exception('IHS Patient belum tersedia.');
        }

        if (empty($q->ihs_service_provider)) {
            throw new \Exception('IHS Organization belum tersedia.');
        }

        if (empty($q->tglregistrasi)) {
            throw new \Exception('Tanggal registrasi tidak tersedia.');
        }

        $fmt = function ($value) {
            if (empty($value)) {
                return null;
            }

            $date = new \DateTime(
                $value,
                new \DateTimeZone('Asia/Jakarta')
            );

            $date->setTimezone(new \DateTimeZone('UTC'));

            return $date->format('Y-m-d\TH:i:sP');
        };

        $tglMasuk = $fmt($q->tglregistrasi);
        $tglPulang = $fmt($q->tglpulang);
        $inProgress = $fmt($q->ihs_in_progress);
        $finished = $fmt($q->ihs_finished);

        $status = 'active';
        $statusHistory = [
            [
                'status' => 'active',
                'period' => [
                    'start' => $tglMasuk
                ]
            ]
        ];

        if ($inProgress) {
            $statusHistory[] = [
                'status' => 'onhold',
                'period' => [
                    'start' => $inProgress
                ]
            ];
        }

        $period = [
            'start' => $tglMasuk
        ];

        $diagnosis = [];

        if (!empty($q->ihs_condition)) {
            $diagnosis[] = [
                'condition' => [
                    'reference' => 'Condition/' . $q->ihs_condition
                ],
                'role' => [
                    'coding' => [
                        [
                            'system' => 'http://terminology.hl7.org/CodeSystem/diagnosis-role',
                            'code' => 'DD',
                            'display' => 'Discharge Diagnosis'
                        ]
                    ]
                ],
                'rank' => 1
            ];
        }

        $data = [
            'resourceType' => 'EpisodeOfCare',
            'identifier' => [
                [
                    'system' => 'http://sys-ids.kemkes.go.id/episode-of-care/' . $profile->ihs_id,
                    'value' => $q->noregistrasi
                ]
            ],
            'status' => $status,
            'statusHistory' => $statusHistory,
            'patient' => [
                'reference' => 'Patient/' . $ihsPasien,
                'display' => $q->namapasien
            ],
            'managingOrganization' => [
                'reference' => 'Organization/' . $q->ihs_service_provider
            ],
            'period' => $period
        ];

        if (!empty($q->ihs_practitioner)) {
            $data['careManager'] = [
                'reference' => 'Practitioner/' . $q->ihs_practitioner,
                'display' => $q->dokter
            ];
        }

        if (!empty($diagnosis)) {
            $data['diagnosis'] = $diagnosis;
        }

        /*
         * Isi type hanya jika kode program perawatan pasien sudah diketahui.
         * Contoh TB-SO hanya untuk program Tuberkulosis Sensitif Obat.
         * Jangan memakai IMP/AMB/IP/OP sebagai kode episodeofcare-type.
         */
        $episodeTypeCode = $request->input('episodeTypeCode');
        $episodeTypeDisplay = $request->input('episodeTypeDisplay');

        if (!empty($episodeTypeCode) && !empty($episodeTypeDisplay)) {
            $data['type'] = [
                [
                    'coding' => [
                        [
                            'system' => 'http://terminology.kemkes.go.id/CodeSystem/episodeofcare-type',
                            'code' => $episodeTypeCode,
                            'display' => $episodeTypeDisplay
                        ]
                    ]
                ]
            ];
        }

        $req = new \Illuminate\Http\Request();
        $req['url'] = 'EpisodeOfCare';
        $req['method'] = 'POST';
        $req['data'] = $data;

        $response = $this->ihsTools($req, true);

        $mod = new IHS_Transaction();
        $mod->norec = $mod->generateNewId();
        $mod->statusenabled = isset($response->resourceType)
            && $response->resourceType !== 'OperationOutcome';
        $mod->kdprofile = $kdProfile;
        $mod->resourcetype = 'EpisodeOfCare';
        $mod->url = $this->endPoint() . 'EpisodeOfCare';
        $mod->method = 'POST';
        $mod->body = json_encode($data);
        $mod->response = json_encode($response);
        $mod->date = date('Y-m-d H:i:s');
        $mod->save();

        return response()->json($response);

    } catch (\Exception $e) {
        return response()->json([
            'resourceType' => 'OperationOutcome',
            'issue' => [
                [
                    'severity' => 'error',
                    'code' => 'exception',
                    'details' => [
                        'text' => $e->getMessage() . ' line ' . $e->getLine()
                    ]
                ]
            ]
        ], 400);
    }
}

    private function getModalityImagingStudy($orderModality, $namaProduk)
    {
        $modality = strtoupper(trim((string) $orderModality));
        $produk = strtoupper(trim((string) $namaProduk));

        $validModalities = array('CR', 'CT', 'MR', 'DX', 'US', 'PAN');

        if (in_array($modality, $validModalities, true)) {
            return $modality;
        }

        if (strpos($produk, 'CT SCAN') !== false ||
            strpos($produk, 'CT ') === 0) {
            return 'CT';
        }

        if (strpos($produk, 'MRI') !== false ||
            strpos($produk, 'MAGNETIC RESONANCE') !== false) {
            return 'MR';
        }

        if (strpos($produk, 'USG') !== false ||
            strpos($produk, 'ULTRASONOGRAPHY') !== false ||
            strpos($produk, 'ULTRASOUND') !== false) {
            return 'US';
        }

        if (strpos($produk, 'PANORAMIC') !== false ||
            strpos($produk, 'PANORAMA') !== false ||
            strpos($produk, 'PANORAMIK') !== false) {
            return 'PAN';
        }

        if (strpos($produk, 'THORAX') !== false ||
            strpos($produk, 'THORAKS') !== false ||
            strpos($produk, 'CHEST') !== false) {
            return 'DX';
        }

        return null;
    }

    private function getModalityDisplay($modality)
    {
        $display = array(
            'CR' => 'Computed Radiography',
            'CT' => 'Computed Tomography',
            'MR' => 'Magnetic Resonance',
            'DX' => 'Digital Radiography',
            'US' => 'Ultrasound',
            'PAN' => 'Panoramic X-Ray'
        );

        return isset($display[$modality])
            ? $display[$modality]
            : $modality;
    }
    
    public function ImagingStudy(Request $request, $lokal = null)
    {
        $noorder = isset($request['noorder']) && trim($request['noorder']) !== ''
            ? trim($request['noorder'])
            : 'L2604006647';

        $results = [];

        try {
            $kdProfile = (int) $this->kdProfile;

            $items = collect(DB::select("
                SELECT
                    pd.noregistrasi,
                    so.noorder,
                    so.tglorder,
                    pr.namaproduk,
                    op.objectprodukfk,
                    pr.ihs_loinc_id,
                    pr.ihs_loinc_common_name,
                    ps.ihs_number AS ihs_pasien,
                    ps.namapasien,
                    ps.noidentitas,
                    pd.ihs_id AS ihs_encounter,
                    pg.ihs_id AS ihs_practitioner,
                    pg.noidentitas AS nik_dokter,
                    pg.namalengkap AS dokterorder,
                    ru.namaruangan,
                    ru.ihs_id AS ihs_ruangan,
                    so.keteranganlainnya,
                    so.keteranganorder,
                    pg2.ihs_id AS ihs_performer,
                    pg2.namalengkap AS nama_performer,
                    op.ihs_id AS ihs_idforput,
                    ro.ihs_imagingstudy,
                    op.norec,
                    ro.accession_num,
                    ro.order_modality,
                    ro.order_status,
                    ro.order_complete,
                    ro.study_remark,
                    ro.imaging_id
                FROM strukorder_t AS so
                INNER JOIN orderpelayanan_t AS op
                    ON op.strukorderfk = so.norec
                INNER JOIN pasiendaftar_t AS pd
                    ON pd.norec = so.noregistrasifk
                INNER JOIN produk_m AS pr
                    ON pr.id = op.objectprodukfk
                INNER JOIN pasien_m AS ps
                    ON ps.id = pd.nocmfk
                INNER JOIN pegawai_m AS pg
                    ON pg.id = so.objectpegawaiorderfk
                INNER JOIN ruangan_m AS ru
                    ON ru.id = so.objectruanganfk
                LEFT JOIN pegawai_m AS pg2
                    ON pg2.id = pd.objectpegawaifk
                LEFT JOIN ris_order AS ro
                    ON ro.order_no = so.noorder
                    AND ro.norec_op_fk = op.norec
                WHERE pd.kdprofile = ?
                    AND so.objectkelompoktransaksifk = 94
                    AND so.statusenabled = TRUE
                    AND so.noorder = ?
                ORDER BY op.norec ASC
            ", [$kdProfile, $noorder]));

            if ($items->isEmpty()) {
                throw new \Exception(
                    'ImagingStudy order tidak ditemukan: ' . $noorder
                );
            }

            $profile = Profile::where('id', $kdProfile)->first();

            if (empty($profile) || empty($profile->ihs_id)) {
                throw new \Exception(
                    'ID organisasi SATUSEHAT belum tersedia'
                );
            }

            $modalityMap = [
                'CR' => ['CR', 'Computed Radiography'],
                'DX' => ['DX', 'Digital Radiography'],
                'CT' => ['CT', 'Computed Tomography'],
                'MR' => ['MR', 'Magnetic Resonance'],
                'US' => ['US', 'Ultrasound'],
                'MG' => ['MG', 'Mammography'],
                'NM' => ['NM', 'Nuclear Medicine'],
                'PT' => ['PT', 'Positron emission tomography'],
                'XA' => ['XA', 'X-Ray Angiography'],
                'RF' => ['RF', 'Radiofluoroscopy'],
                'OT' => ['OT', 'Other'],
                'PX' => ['PX', 'Panoramic X-Ray']
            ];

            foreach ($items as $item) {
                $result = [
                    'noorder' => $item->noorder,
                    'noregistrasi' => $item->noregistrasi,
                    'norec' => $item->norec,
                    'namaproduk' => $item->namaproduk,
                    'status' => 'failed'
                ];

                try {
                    $ihsPasien = trim((string) $item->ihs_pasien);

                    if ($ihsPasien === '' && !empty($item->noidentitas)) {
                        $requestPatient = new \Illuminate\Http\Request();

                        $requestPatient->replace([
                            'url' => 'Patient?identifier=' .
                                urlencode(
                                    'https://fhir.kemkes.go.id/id/nik|' .
                                    trim((string) $item->noidentitas)
                                ),
                            'method' => 'GET',
                            'data' => null
                        ]);

                        $responsePatient = $this->ihsTools(
                            $requestPatient,
                            true
                        );

                        $patientArray = json_decode(
                            json_encode($responsePatient),
                            true
                        );

                        if (
                            isset($patientArray['resourceType']) &&
                            $patientArray['resourceType'] === 'Bundle' &&
                            !empty($patientArray['entry'])
                        ) {
                            foreach ($patientArray['entry'] as $entry) {
                                if (!empty($entry['resource']['id'])) {
                                    $ihsPasien = $entry['resource']['id'];
                                    break;
                                }
                            }
                        }

                        if ($ihsPasien !== '') {
                            Pasien::where(
                                'noidentitas',
                                $item->noidentitas
                            )->update([
                                'ihs_number' => $ihsPasien
                            ]);
                        }
                    }

                    if ($ihsPasien === '') {
                        throw new \Exception(
                            'ID Patient SATUSEHAT tidak ditemukan untuk pasien ' .
                            $item->namapasien
                        );
                    }

                    $accessionNumber = trim(
                        (string) $item->accession_num
                    );

                    if ($accessionNumber === '') {
                        $accessionNumber = trim((string) $item->noorder);
                    }

                    if ($accessionNumber === '') {
                        throw new \Exception(
                            'Accession number tidak tersedia'
                        );
                    }

                    $modalityCode = strtoupper(
                        trim((string) $item->order_modality)
                    );

                    if ($modalityCode === 'MRI') {
                        $modalityCode = 'MR';
                    }

                    if (!isset($modalityMap[$modalityCode])) {
                        $namaProduk = strtoupper(
                            trim((string) $item->namaproduk)
                        );

                        if (
                            strpos($namaProduk, 'CT SCAN') !== false ||
                            preg_match('/\bCT\b/', $namaProduk)
                        ) {
                            $modalityCode = 'CT';
                        } elseif (
                            strpos($namaProduk, 'MRI') !== false ||
                            strpos($namaProduk, 'MAGNETIC RESONANCE') !== false
                        ) {
                            $modalityCode = 'MR';
                        } elseif (
                            strpos($namaProduk, 'USG') !== false ||
                            strpos($namaProduk, 'ULTRASOUND') !== false ||
                            strpos($namaProduk, 'ULTRASONOGRAPHY') !== false
                        ) {
                            $modalityCode = 'US';
                        } elseif (
                            strpos($namaProduk, 'PANORAMIC') !== false ||
                            strpos($namaProduk, 'PANORAMA') !== false ||
                            strpos($namaProduk, 'PANORAMIK') !== false
                        ) {
                            $modalityCode = 'PX';
                        } elseif (
                            strpos($namaProduk, 'MAMMOGRAPHY') !== false ||
                            strpos($namaProduk, 'MAMMOGRAFI') !== false ||
                            strpos($namaProduk, 'MAMMO') !== false
                        ) {
                            $modalityCode = 'MG';
                        } elseif (
                            strpos($namaProduk, 'THORAX') !== false ||
                            strpos($namaProduk, 'THORAKS') !== false ||
                            strpos($namaProduk, 'CHEST') !== false ||
                            strpos($namaProduk, 'X-RAY') !== false ||
                            strpos($namaProduk, 'RONTGEN') !== false
                        ) {
                            $modalityCode = 'DX';
                        } else {
                            $modalityCode = '';
                        }
                    }

                    if (!isset($modalityMap[$modalityCode])) {
                        throw new \Exception(
                            'Modalitas tidak valid. order_modality: ' .
                            (string) $item->order_modality .
                            ', produk: ' . $item->namaproduk
                        );
                    }

                    $modality = $modalityMap[$modalityCode];

                    $imagingStudyId = trim(
                        (string) $item->ihs_imagingstudy
                    );

                    $method = $imagingStudyId !== ''
                        ? 'PUT'
                        : 'POST';

                    $url = $method === 'PUT'
                        ? 'ImagingStudy/' . $imagingStudyId
                        : 'ImagingStudy';

                    $data = [
                        'resourceType' => 'ImagingStudy',
                        'identifier' => [
                            [
                                'use' => 'usual',
                                'type' => [
                                    'coding' => [
                                        [
                                            'system' => 'http://terminology.hl7.org/CodeSystem/v2-0203',
                                            'code' => 'ACSN',
                                            'display' => 'Accession ID'
                                        ]
                                    ]
                                ],
                                'system' => 'http://sys-ids.kemkes.go.id/acsn/' .
                                    $profile->ihs_id,
                                'value' => $accessionNumber
                            ]
                        ],
                        'status' => 'available',
                        'modality' => [
                            [
                                'system' => 'http://dicom.nema.org/resources/ontology/DCM',
                                'code' => $modality[0],
                                'display' => $modality[1]
                            ]
                        ],
                        'subject' => [
                            'reference' => 'Patient/' . $ihsPasien,
                            'display' => $item->namapasien
                        ]
                    ];

                    if ($method === 'PUT') {
                        $data['id'] = $imagingStudyId;
                    }

                    if (!empty($item->tglorder)) {
                        $data['started'] = $this->dateISO(
                            $item->tglorder
                        );
                    }

                    if (!empty($item->ihs_encounter)) {
                        $data['encounter'] = [
                            'reference' => 'Encounter/' .
                                $item->ihs_encounter
                        ];
                    }

                    if (!empty($item->ihs_idforput)) {
                        $data['basedOn'] = [
                            [
                                'reference' => 'ServiceRequest/' .
                                    $item->ihs_idforput
                            ]
                        ];
                    }

                    $requestIHS = new \Illuminate\Http\Request();

                    $requestIHS->replace([
                        'url' => $url,
                        'method' => $method,
                        'data' => $data
                    ]);

                    $responseIHS = $this->ihsTools(
                        $requestIHS,
                        true
                    );

                    $responseArray = json_decode(
                        json_encode($responseIHS),
                        true
                    );

                    if (!is_array($responseArray)) {
                        $responseArray = [
                            'message' => 'Response SATUSEHAT tidak valid'
                        ];
                    }

                    $success = !empty($responseArray['id']) &&
                        !isset($responseArray['issue']);

                    $duplicate = false;

                    if (!$success && !empty($responseArray['issue'])) {
                        foreach ($responseArray['issue'] as $issue) {
                            $issueCode = isset($issue['code'])
                                ? $issue['code']
                                : '';

                            $issueText = isset($issue['details']['text'])
                                ? $issue['details']['text']
                                : '';

                            $diagnostics = isset($issue['diagnostics'])
                                ? $issue['diagnostics']
                                : '';

                            if (
                                $issueCode === 'duplicate' ||
                                stripos($issueText, 'duplicate') !== false ||
                                stripos($diagnostics, 'duplicate') !== false
                            ) {
                                $duplicate = true;
                                break;
                            }
                        }
                    }

                    if ($duplicate) {
                        $identifierValue =
                            'http://sys-ids.kemkes.go.id/acsn/' .
                            $profile->ihs_id . '|' . $accessionNumber;

                        $requestSearch = new \Illuminate\Http\Request();

                        $requestSearch->replace([
                            'url' => 'ImagingStudy?identifier=' .
                                urlencode($identifierValue),
                            'method' => 'GET',
                            'data' => null
                        ]);

                        $responseSearch = $this->ihsTools(
                            $requestSearch,
                            true
                        );

                        $searchArray = json_decode(
                            json_encode($responseSearch),
                            true
                        );

                        if (
                            isset($searchArray['resourceType']) &&
                            $searchArray['resourceType'] === 'Bundle' &&
                            !empty($searchArray['entry'])
                        ) {
                            foreach ($searchArray['entry'] as $entry) {
                                if (
                                    isset($entry['resource']['resourceType']) &&
                                    $entry['resource']['resourceType'] === 'ImagingStudy' &&
                                    !empty($entry['resource']['id'])
                                ) {
                                    $imagingStudyId =
                                        $entry['resource']['id'];

                                    $responseArray = $entry['resource'];
                                    $success = true;
                                    break;
                                }
                            }
                        }

                        if (!$success) {
                            $responseArray['recovery'] =
                                'Duplicate terdeteksi, tetapi resource belum ditemukan melalui pencarian identifier.';
                        }
                    }

                    if ($success && !empty($responseArray['id'])) {
                        $imagingStudyId = $responseArray['id'];

                        DB::table('ris_order')
                            ->where('order_no', $item->noorder)
                            ->where('norec_op_fk', $item->norec)
                            ->update([
                                'ihs_imagingstudy' => $imagingStudyId
                            ]);
                    }

                    $mod = new IHS_Transaction();
                    $mod->norec = $mod->generateNewId();
                    $mod->statusenabled = $success;
                    $mod->kdprofile = $kdProfile;
                    $mod->resourcetype = 'ImagingStudy';
                    $mod->url = $this->endPoint() . $url;
                    $mod->method = $method;
                    $mod->id = isset($responseArray['id'])
                        ? $responseArray['id']
                        : null;
                    $mod->body = json_encode($data);
                    $mod->response = json_encode($responseArray);
                    $mod->date = date('Y-m-d H:i:s');
                    $mod->save();

                    $result = [
                        'noorder' => $item->noorder,
                        'noregistrasi' => $item->noregistrasi,
                        'norec' => $item->norec,
                        'namaproduk' => $item->namaproduk,
                        'accession_num' => $accessionNumber,
                        'order_modality' => $item->order_modality,
                        'modality_used' => $modalityCode,
                        'method' => $method,
                        'ihs_imagingstudy' => $success
                            ? $imagingStudyId
                            : $item->ihs_imagingstudy,
                        'status' => $success ? 'success' : 'failed',
                        'id' => isset($responseArray['id'])
                            ? $responseArray['id']
                            : null,
                        'payload' => $data,
                        'response' => $responseArray
                    ];
                } catch (\Exception $e) {
                    $result['status'] = 'failed';
                    $result['error'] = $e->getMessage();
                    $result['line'] = $e->getLine();
                }

                $results[] = $result;
            }

            $successCount = 0;

            foreach ($results as $resultItem) {
                if (
                    isset($resultItem['status']) &&
                    $resultItem['status'] === 'success'
                ) {
                    $successCount++;
                }
            }

            $response = [
                'noorder' => $noorder,
                'total' => count($results),
                'success' => $successCount,
                'failed' => count($results) - $successCount,
                'results' => $results
            ];
        } catch (\Exception $e) {
            $response = [
                'resourceType' => 'OperationOutcome',
                'issue' => [
                    [
                        'severity' => 'error',
                        'code' => 'exception',
                        'diagnostics' => $e->getMessage(),
                        'line' => $e->getLine(),
                        'noorder' => $noorder
                    ]
                ]
            ];
        }

        return $lokal
            ? $response
            : response()->json($response);
    }
    public function ObservationLabOLD(Request $request, $lokal = null)
    {
        $kdProfile = $this->kdProfile;
        $noorder = trim($request->input('noorder', ''));

        try {
            if ($noorder === '') {
                throw new \Exception('Parameter noorder wajib diisi');
            }

            $profile = Profile::where('id', $kdProfile)->first();

            if (!$profile || empty($profile->ihs_id)) {
                throw new \Exception('Konfigurasi IHS Profile tidak ditemukan');
            }

            $q = DB::select("
                SELECT
                    hpl.norec,
                    hpl.ihs_observation,
                    hpl.tanggal,
                    hpl.nopemeriksaan,
                    hpl.jenis,
                    hpl.kategori,
                    hpl.rincian,
                    hpl.diagnosaklinik,
                    hpl.keteranganklinik,
                    hpl.makroskopik,
                    hpl.mikroskopik,
                    hpl.kesimpulan,
                    hpl.anjuran,
                    hpl.topografi,
                    hpl.morfologi,
                    hpl.nomorpa,
                    hpl.noregistrasifk,
                    hpl.pelayananpasienfk,
                    st.norec AS norec_strukorder,
                    st.noorder,
                    st.tglorder,
                    pd.noregistrasi,
                    pd.ihs_id AS ihs_encounter,
                    ps.ihs_number AS ihs_pasien,
                    ps.namapasien,
                    pp.produkfk,
                    pr.namaproduk,
                    pr.ihs_loinc_id,
                    pr.ihs_loinc_common_name
                FROM hasilpemeriksaanlab_t AS hpl
                INNER JOIN pelayananpasien_t AS pp
                    ON pp.norec = hpl.pelayananpasienfk
                INNER JOIN strukorder_t AS st
                    ON st.norec = pp.strukorderfk
                INNER JOIN pasiendaftar_t AS pd
                    ON pd.norec = hpl.noregistrasifk
                INNER JOIN pasien_m AS ps
                    ON ps.id = pd.nocmfk
                LEFT JOIN produk_m AS pr
                    ON pr.id = pp.produkfk
                WHERE hpl.kdprofile = ?
                    AND hpl.statusenabled = TRUE
                    AND st.kdprofile = ?
                    AND st.noorder = ?
                    AND st.statusenabled = TRUE
                    AND st.keteranganorder = 'Order Laboratorium'
                    AND st.objectkelompoktransaksifk = 93
                    AND pd.statusenabled = TRUE
                    AND pd.ihs_id IS NOT NULL
                    AND ps.ihs_number IS NOT NULL
                ORDER BY hpl.tanggal ASC, hpl.norec ASC
            ", array(
                $kdProfile,
                $kdProfile,
                $noorder
            ));

            if (count($q) === 0) {
                throw new \Exception(
                    'Hasil pemeriksaan laboratorium tidak ditemukan untuk order ' . $noorder
                );
            }

            $hasil = array();

            foreach ($q as $item) {
                $namaPemeriksaan = !empty($item->namaproduk)
                    ? $item->namaproduk
                    : (
                        !empty($item->kategori)
                            ? $item->kategori
                            : (
                                !empty($item->jenis)
                                    ? $item->jenis
                                    : (
                                        !empty($item->nopemeriksaan)
                                            ? $item->nopemeriksaan
                                            : 'Pemeriksaan PA'
                                    )
                            )
                    );

                try {
                    if (!empty($item->ihs_observation)) {
                        $hasil[] = array(
                            'noorder' => $noorder,
                            'jenis' => 'laboratorium',
                            'pemeriksaan' => $namaPemeriksaan,
                            'norec' => $item->norec,
                            'status' => 'sudah terkirim',
                            'ihs_observation' => $item->ihs_observation
                        );

                        continue;
                    }

                    if (empty($item->ihs_pasien)) {
                        throw new \Exception('IHS Patient belum tersedia');
                    }

                    if (empty($item->ihs_encounter)) {
                        throw new \Exception('IHS Encounter belum tersedia');
                    }

                    if (empty($item->ihs_loinc_id)) {
                        throw new \Exception(
                            'Kode LOINC belum tersedia untuk ' . $namaPemeriksaan
                        );
                    }

                    $serviceRequest = DB::table('orderpelayanan_t')
                        ->where('strukorderfk', $item->norec_strukorder)
                        ->where('objectprodukfk', $item->produkfk)
                        ->value('ihs_id');

                    if (empty($serviceRequest)) {
                        throw new \Exception(
                            'IHS ServiceRequest belum tersedia untuk ' . $namaPemeriksaan
                        );
                    }

                    $hasilPemeriksaan = array();

                    if (!empty($item->makroskopik)) {
                        $hasilPemeriksaan[] = 'Makroskopik: ' . trim($item->makroskopik);
                    }

                    if (!empty($item->mikroskopik)) {
                        $hasilPemeriksaan[] = 'Mikroskopik: ' . trim($item->mikroskopik);
                    }

                    if (!empty($item->kesimpulan)) {
                        $hasilPemeriksaan[] = 'Kesimpulan: ' . trim($item->kesimpulan);
                    }

                    if (!empty($item->anjuran)) {
                        $hasilPemeriksaan[] = 'Anjuran: ' . trim($item->anjuran);
                    }

                    if (!empty($item->diagnosaklinik)) {
                        $hasilPemeriksaan[] = 'Diagnosis klinik: ' . trim($item->diagnosaklinik);
                    }

                    if (!empty($item->keteranganklinik)) {
                        $hasilPemeriksaan[] = 'Keterangan klinik: ' . trim($item->keteranganklinik);
                    }

                    if (!empty($item->topografi)) {
                        $hasilPemeriksaan[] = 'Topografi: ' . trim($item->topografi);
                    }

                    if (!empty($item->morfologi)) {
                        $hasilPemeriksaan[] = 'Morfologi: ' . trim($item->morfologi);
                    }

                    if (!empty($item->rincian)) {
                        $hasilPemeriksaan[] = 'Rincian: ' . trim($item->rincian);
                    }

                    if (!empty($item->diagnosapb)) {
                        $hasilPemeriksaan[] = 'Diagnosis PA: ' . trim($item->diagnosapb);
                    }

                    if (count($hasilPemeriksaan) === 0) {
                        throw new \Exception(
                            'Nilai hasil pemeriksaan kosong untuk ' . $namaPemeriksaan
                        );
                    }

                    $valueString = implode("\n", $hasilPemeriksaan);

                    $tglHasil = !empty($item->tanggal)
                        ? $item->tanggal
                        : date('Y-m-d H:i:s');

                    $data = array(
                        'resourceType' => 'Observation',
                        'identifier' => array(
                            array(
                                'system' => 'http://sys-ids.kemkes.go.id/observation/'
                                    . $profile->ihs_id,
                                'value' => (string) $item->norec
                            )
                        ),
                        'status' => 'final',
                        'category' => array(
                            array(
                                'coding' => array(
                                    array(
                                        'system' => 'http://terminology.hl7.org/CodeSystem/observation-category',
                                        'code' => 'laboratory',
                                        'display' => 'Laboratory'
                                    )
                                )
                            )
                        ),
                        'code' => array(
                            'coding' => array(
                                array(
                                    'system' => 'http://loinc.org',
                                    'code' => $item->ihs_loinc_id,
                                    'display' => !empty($item->ihs_loinc_common_name)
                                        ? $item->ihs_loinc_common_name
                                        : $namaPemeriksaan
                                )
                            ),
                            'text' => $namaPemeriksaan
                        ),
                        'subject' => array(
                            'reference' => 'Patient/' . $item->ihs_pasien,
                            'display' => $item->namapasien
                        ),
                        'encounter' => array(
                            'reference' => 'Encounter/' . $item->ihs_encounter
                        ),
                        'effectiveDateTime' => date(
                            'Y-m-d\TH:i:sP',
                            strtotime($tglHasil)
                        ),
                        'issued' => $this->dateISO($tglHasil),
                        'basedOn' => array(
                            array(
                                'reference' => 'ServiceRequest/' . $serviceRequest
                            )
                        ),
                        'performer' => array(
                            array(
                                'reference' => 'Organization/' . $profile->ihs_id
                            )
                        ),
                        'valueString' => $valueString
                    );

                    $objetoRequest = new \Illuminate\Http\Request();

                    $objetoRequest->replace(array(
                        'url' => 'Observation',
                        'method' => 'POST',
                        'data' => $data
                    ));

                    $response = $this->ihsTools($objetoRequest, true);

                    $responseResource = is_object($response)
                        ? (isset($response->resourceType)
                            ? $response->resourceType
                            : '')
                        : (is_array($response) && isset($response['resourceType'])
                            ? $response['resourceType']
                            : '');

                    $responseId = is_object($response)
                        ? (isset($response->id) ? $response->id : null)
                        : (is_array($response) && isset($response['id'])
                            ? $response['id']
                            : null);

                    $berhasil = $responseResource !== 'OperationOutcome'
                        && !empty($responseId);

                    $mod = new IHS_Transaction();
                    $mod->norec = $mod->generateNewId();
                    $mod->statusenabled = $berhasil;
                    $mod->kdprofile = $kdProfile;
                    $mod->resourcetype = 'Observation';
                    $mod->url = $this->endPoint() . 'Observation';
                    $mod->method = 'POST';
                    $mod->id = $responseId;
                    $mod->body = json_encode($data);
                    $mod->response = json_encode($response);
                    $mod->date = date('Y-m-d H:i:s');
                    $mod->save();

                    if ($berhasil) {
                        DB::table('hasilpemeriksaanlab_t')
                            ->where('norec', $item->norec)
                            ->update(array(
                                'ihs_observation' => $responseId
                            ));
                    }

                    $hasil[] = array(
                        'noorder' => $noorder,
                        'jenis' => 'laboratorium',
                        'pemeriksaan' => $namaPemeriksaan,
                        'norec' => $item->norec,
                        'status' => $berhasil ? 'berhasil' : 'gagal',
                        'ihs_observation' => $responseId,
                        'response' => $response
                    );
                } catch (\Exception $e) {
                    $hasil[] = array(
                        'noorder' => $noorder,
                        'jenis' => 'laboratorium',
                        'pemeriksaan' => $namaPemeriksaan,
                        'norec' => $item->norec,
                        'status' => 'gagal',
                        'error' => $e->getMessage()
                    );
                }
            }

            $response = array(
                'resourceType' => 'OperationOutcome',
                'noorder' => $noorder,
                'total' => count($hasil),
                'berhasil' => count(array_filter($hasil, function ($v) {
                    return $v['status'] === 'berhasil'
                        || $v['status'] === 'sudah terkirim';
                })),
                'gagal' => count(array_filter($hasil, function ($v) {
                    return $v['status'] === 'gagal';
                })),
                'detail' => $hasil
            );
        } catch (\Exception $e) {
            $response = array(
                'resourceType' => 'OperationOutcome',
                'issue' => $e->getMessage()
            );
        }

        if ($lokal == true) {
            return $response;
        }

        return response()->json($response);
    }
    
    public function ObservationLab(Request $request, $lokal = null)
    {
        $kdProfile = $this->kdProfile;
        $noorder = trim($request->input('noorder', ''));

        try {
            if ($noorder === '') {
                throw new \Exception('Parameter noorder wajib diisi');
            }

            $profile = Profile::where('id', $kdProfile)->first();

            if (!$profile || empty($profile->ihs_id)) {
                throw new \Exception('Konfigurasi IHS Profile tidak ditemukan');
            }

            $q = DB::select("
                SELECT
                    hl.norec,
                    hl.kdprofile,
                    hl.statusenabled,
                    hl.tglhasil,
                    hl.pegawaifk,
                    hl.hasil,
                    hl.noregistrasifk,
                    hl.maphasilfk,
                    hl.produkfk,
                    hl.detailpemeriksaan,
                    hl.noorder,
                    hl.norecpelayanan,
                    hl.keterangan,
                    hl.objectpemeriksafk,
                    hl.objectdokterfk,
                    hl.catatan,
                    hl.ihs_id,
                    hl.ihs_diagnosticreport,
                    hl.orderpelayananfk,
                    pr.ihs_loinc_id as loinc_id,
                    pr.ihs_loinc_common_name as loinc_name,
                    hl.satuan,
                    hl.nilainormal,
                    hl.group,
                    pd.noregistrasi,
                    pd.ihs_id AS ihs_encounter,
                    ps.ihs_number AS ihs_pasien,
                    ps.namapasien,
                    pr.namaproduk
                FROM hasillaboratorium_t AS hl
                INNER JOIN antrianpasiendiperiksa_t AS apd
                    ON apd.norec = hl.noregistrasifk
                INNER JOIN pasiendaftar_t AS pd
                    ON pd.norec = apd.noregistrasifk
                    inner join strukorder_t as so on so.noregistrasifk=pd.norec
                INNER JOIN pasien_m AS ps
                    ON ps.id = pd.nocmfk
                LEFT JOIN produk_m AS pr
                    ON pr.id = hl.produkfk
                WHERE hl.kdprofile = ?
                    AND hl.statusenabled = TRUE
                    AND so.noorder = ?
                    AND pd.statusenabled = TRUE
                    AND pd.ihs_id IS NOT NULL
                    AND ps.ihs_number IS NOT NULL
                ORDER BY hl.tglhasil ASC, hl.norec ASC
            ", array(
                $kdProfile,
                $noorder
            ));

            if (count($q) === 0) {
                throw new \Exception(
                    'Hasil pemeriksaan laboratorium tidak ditemukan untuk order ' . $noorder
                );
            }

            $hasil = array();

            foreach ($q as $item) {
                $namaPemeriksaan = !empty($item->namaproduk)
                    ? $item->namaproduk
                    : (
                        !empty($item->loinc_name)
                            ? $item->loinc_name
                            : (
                                !empty($item->detailpemeriksaan)
                                    ? $item->detailpemeriksaan
                                    : 'Pemeriksaan Laboratorium'
                            )
                    );

                try {
                    if (!empty($item->ihs_id)) {
                        $hasil[] = array(
                            'noorder' => $noorder,
                            'jenis' => 'laboratorium',
                            'pemeriksaan' => $namaPemeriksaan,
                            'norec' => $item->norec,
                            'status' => 'sudah terkirim',
                            'ihs_observation' => $item->ihs_id
                        );

                        continue;
                    }

                    if (empty($item->ihs_pasien)) {
                        throw new \Exception('IHS Patient belum tersedia');
                    }

                    if (empty($item->ihs_encounter)) {
                        throw new \Exception('IHS Encounter belum tersedia');
                    }

                    if (empty($item->loinc_id)) {
                        throw new \Exception(
                            'Kode LOINC belum tersedia untuk ' . $namaPemeriksaan
                        );
                    }

                    $serviceRequest = null;

                    if (!empty($item->orderpelayananfk)) {
                        $serviceRequest = DB::table('orderpelayanan_t')
                            ->where('norec', $item->orderpelayananfk)
                            ->value('ihs_id');
                    }

                    if (empty($serviceRequest) && !empty($item->norecpelayanan)) {
                        $serviceRequest = DB::table('pelayananpasien_t')
                            ->where('norec', $item->norecpelayanan)
                            ->value('strukorderfk');

                        if (!empty($serviceRequest)) {
                            $serviceRequest = DB::table('orderpelayanan_t')
                                ->where('strukorderfk', $serviceRequest)
                                ->where('objectprodukfk', $item->produkfk)
                                ->value('ihs_id');
                        }
                    }

                    if (empty($serviceRequest)) {
                        throw new \Exception(
                            'IHS ServiceRequest belum tersedia untuk ' . $namaPemeriksaan
                        );
                    }

                    $hasilPemeriksaan = array();

                    if (!empty($item->hasil)) {
                        $hasilPemeriksaan[] = trim($item->hasil);
                    }

                    if (!empty($item->detailpemeriksaan)) {
                        $detail = trim($item->detailpemeriksaan);

                        if (!in_array($detail, $hasilPemeriksaan)) {
                            $hasilPemeriksaan[] = $detail;
                        }
                    }

                    if (!empty($item->keterangan)) {
                        $hasilPemeriksaan[] = 'Keterangan: ' . trim($item->keterangan);
                    }

                    if (!empty($item->catatan)) {
                        $hasilPemeriksaan[] = 'Catatan: ' . trim($item->catatan);
                    }

                    if (!empty($item->satuan)) {
                        $hasilPemeriksaan[] = 'Satuan: ' . trim($item->satuan);
                    }

                    if (!empty($item->nilainormal)) {
                        $hasilPemeriksaan[] = 'Nilai normal: ' . trim($item->nilainormal);
                    }

                    if (count($hasilPemeriksaan) === 0) {
                        throw new \Exception(
                            'Nilai hasil pemeriksaan kosong untuk ' . $namaPemeriksaan
                        );
                    }

                    $valueString = implode("\n", $hasilPemeriksaan);

                    $tglHasil = !empty($item->tglhasil)
                        ? $item->tglhasil
                        : date('Y-m-d H:i:s');

                    $data = array(
                        'resourceType' => 'Observation',
                        'identifier' => array(
                            array(
                                'system' => 'http://sys-ids.kemkes.go.id/observation/'
                                    . $profile->ihs_id,
                                'value' => (string) $item->norec
                            )
                        ),
                        'status' => 'final',
                        'category' => array(
                            array(
                                'coding' => array(
                                    array(
                                        'system' => 'http://terminology.hl7.org/CodeSystem/observation-category',
                                        'code' => 'laboratory',
                                        'display' => 'Laboratory'
                                    )
                                )
                            )
                        ),
                        'code' => array(
                            'coding' => array(
                                array(
                                    'system' => 'http://loinc.org',
                                    'code' => $item->loinc_id,
                                    'display' => !empty($item->loinc_name)
                                        ? $item->loinc_name
                                        : $namaPemeriksaan
                                )
                            ),
                            'text' => $namaPemeriksaan
                        ),
                        'subject' => array(
                            'reference' => 'Patient/' . $item->ihs_pasien,
                            'display' => $item->namapasien
                        ),
                        'encounter' => array(
                            'reference' => 'Encounter/' . $item->ihs_encounter
                        ),
                        'effectiveDateTime' => date(
                            'Y-m-d\TH:i:sP',
                            strtotime($tglHasil)
                        ),
                        'issued' => $this->dateISO($tglHasil),
                        'basedOn' => array(
                            array(
                                'reference' => 'ServiceRequest/' . $serviceRequest
                            )
                        ),
                        'performer' => array(
                            array(
                                'reference' => 'Organization/' . $profile->ihs_id
                            )
                        ),
                        'valueString' => $valueString
                    );

                    $objetoRequest = new \Illuminate\Http\Request();

                    $objetoRequest->replace(array(
                        'url' => 'Observation',
                        'method' => 'POST',
                        'data' => $data
                    ));

                    $response = $this->ihsTools($objetoRequest, true);

                    $responseResource = is_object($response)
                        ? (isset($response->resourceType)
                            ? $response->resourceType
                            : '')
                        : (is_array($response) && isset($response['resourceType'])
                            ? $response['resourceType']
                            : '');

                    $responseId = is_object($response)
                        ? (isset($response->id) ? $response->id : null)
                        : (is_array($response) && isset($response['id'])
                            ? $response['id']
                            : null);

                    $berhasil = $responseResource !== 'OperationOutcome'
                        && !empty($responseId);

                    $mod = new IHS_Transaction();
                    $mod->norec = $mod->generateNewId();
                    $mod->statusenabled = $berhasil;
                    $mod->kdprofile = $kdProfile;
                    $mod->resourcetype = 'Observation';
                    $mod->url = $this->endPoint() . 'Observation';
                    $mod->method = 'POST';
                    $mod->id = $responseId;
                    $mod->body = json_encode($data);
                    $mod->response = json_encode($response);
                    $mod->date = date('Y-m-d H:i:s');
                    $mod->save();

                    if ($berhasil) {
                        DB::table('hasillaboratorium_t')
                            ->where('norec', $item->norec)
                            ->update(array(
                                'ihs_observation' => $responseId
                            ));
                    }

                    $hasil[] = array(
                        'noorder' => $noorder,
                        'jenis' => 'laboratorium',
                        'pemeriksaan' => $namaPemeriksaan,
                        'norec' => $item->norec,
                        'status' => $berhasil ? 'berhasil' : 'gagal',
                        'ihs_observation' => $responseId,
                        'response' => $response
                    );
                } catch (\Exception $e) {
                    $hasil[] = array(
                        'noorder' => $noorder,
                        'jenis' => 'laboratorium',
                        'pemeriksaan' => $namaPemeriksaan,
                        'norec' => $item->norec,
                        'status' => 'gagal',
                        'error' => $e->getMessage()
                    );
                }
            }

            $response = array(
                'resourceType' => 'OperationOutcome',
                'noorder' => $noorder,
                'total' => count($hasil),
                'berhasil' => count(array_filter($hasil, function ($v) {
                    return $v['status'] === 'berhasil'
                        || $v['status'] === 'sudah terkirim';
                })),
                'gagal' => count(array_filter($hasil, function ($v) {
                    return $v['status'] === 'gagal';
                })),
                'detail' => $hasil
            );
        } catch (\Exception $e) {
            $response = array(
                'resourceType' => 'OperationOutcome',
                'issue' => $e->getMessage()
            );
        }

        if ($lokal == true) {
            return $response;
        }

        return response()->json($response);
    }


    public function ObservationRad(Request $request, $lokal = null)
    {
        $kdProfile = $this->kdProfile;
        $noorder = trim($request->input('noorder', ''));

        try {
            if ($noorder === '') {
                throw new \Exception('Parameter noorder wajib diisi');
            }

            $profile = Profile::where('id', $kdProfile)->first();

            if (!$profile || empty($profile->ihs_id)) {
                throw new \Exception('Konfigurasi IHS Profile tidak ditemukan');
            }

            $q = DB::select("
                SELECT
                    so.tglorder,
                    so.noorder,
                    op.norec AS norecopfk,
                    op.ihs_id AS ihs_service_request,
                    pp.norec AS norec_pp,
                    hr.tanggal,
                    hr.keterangan AS expertise,
                    ps.ihs_number AS ihs_pasien,
                    ps.namapasien,
                    pd.ihs_id AS ihs_encounter,
                    pr.id AS produkfk,
                    pr.namaproduk,
                    pr.ihs_loinc_id,
                    pr.ihs_loinc_common_name,
                    p.ihs_id AS ihs_practitioner,
                    ro.norec AS norec_ris,
                    ro.order_no,
                    ro.order_code,
                    ro.ihs_imagingstudy AS ihs_imaging_id,
                    ro.ihs_observation,
                    ro.ihs_diagnosticreport
                FROM ris_order ro
                INNER JOIN strukorder_t so
                    ON so.noorder = ro.order_no
                INNER JOIN orderpelayanan_t op
                    ON op.noorderfk = so.norec
                INNER JOIN pasiendaftar_t pd
                    ON pd.norec = so.noregistrasifk
                INNER JOIN pasien_m ps
                    ON ps.id = pd.nocmfk
                INNER JOIN produk_m pr
                    ON pr.id = op.objectprodukfk
                LEFT JOIN pelayananpasien_t pp
                    ON pp.strukorderfk = so.norec
                    AND pp.produkfk = op.objectprodukfk
                LEFT JOIN hasilradiologi_t hr
                    ON hr.pelayananpasienfk = pp.norec
                LEFT JOIN pegawai_m p
                    ON p.id = so.objectpegawaiorderfk
                WHERE so.kdprofile = ?
                    AND so.noorder = ?
                    AND so.keteranganorder = 'Order Radiologi'
                    AND so.objectkelompoktransaksifk = 94
                    AND so.statusenabled = true
                    AND pd.statusenabled = true
                ORDER BY ro.order_code
            ", [$kdProfile, $noorder]);

            if (count($q) === 0) {
                throw new \Exception(
                    'Data radiologi tidak ditemukan untuk order ' . $noorder
                );
            }
                                // dd($q );
            $hasil = [];

            foreach ($q as $item) {
                $namaPemeriksaan = $item->namaproduk;

                try {
                    if (empty($item->ihs_pasien)) {
                        throw new \Exception('IHS Patient belum tersedia');
                    }

                    if (empty($item->ihs_encounter)) {
                        throw new \Exception('IHS Encounter belum tersedia');
                    }

                    if (empty($item->ihs_service_request)) {
                        throw new \Exception('IHS ServiceRequest belum tersedia');
                    }

                    if (empty($item->ihs_imaging_id)) {
                        throw new \Exception('ImagingStudy belum tersedia');
                    }

                    if (empty($item->ihs_loinc_id)) {
                        throw new \Exception('Kode LOINC produk belum tersedia');
                    }

                    $tglHasil = !empty($item->tanggal)
                        ? $item->tanggal
                        : $item->tglorder;

                    if (empty($tglHasil)) {
                        $tglHasil = date('Y-m-d H:i:s');
                    }

                    $data = [
                        'resourceType' => 'Observation',
                        'identifier' => [[
                            'system' => 'http://sys-ids.kemkes.go.id/observation/'
                                . $profile->ihs_id,
                            'value' => (string) $item->norec_pp,
                        ]],
                        'status' => 'final',
                        'category' => [[
                            'coding' => [[
                                'system' => 'http://terminology.hl7.org/CodeSystem/observation-category',
                                'code' => 'imaging',
                                'display' => 'Imaging',
                            ]],
                        ]],
                        'code' => [
                            'coding' => [[
                                'system' => stripos($item->ihs_loinc_id, '-') !== false
                                    ? 'http://loinc.org'
                                    : 'http://snomed.info/sct',
                                'code' => $item->ihs_loinc_id,
                                'display' => $item->ihs_loinc_common_name
                                    ?: $namaPemeriksaan,
                            ]],
                        ],
                        'subject' => [
                            'reference' => 'Patient/' . $item->ihs_pasien,
                            'display' => $item->namapasien,
                        ],
                        'encounter' => [
                            'reference' => 'Encounter/' . $item->ihs_encounter,
                        ],
                        'effectiveDateTime' => date(
                            'Y-m-d\TH:i:sP',
                            strtotime($tglHasil)
                        ),
                        'issued' => $this->dateISO($tglHasil),
                        'performer' => [[
                            'reference' => 'Organization/' . $profile->ihs_id,
                        ]],
                        'basedOn' => [[
                            'reference' => 'ServiceRequest/' . $item->ihs_service_request,
                        ]],
                        'derivedFrom' => [[
                            'reference' => 'ImagingStudy/' . $item->ihs_imaging_id,
                        ]],
                    ];

                    if (!empty($item->ihs_practitioner)) {
                        $data['performer'][] = [
                            'reference' => 'Practitioner/' . $item->ihs_practitioner,
                        ];
                    }

                    $objetoRequest = new \Illuminate\Http\Request();
                    $objetoRequest->replace([
                        'url' => 'Observation',
                        'method' => 'POST',
                        'data' => $data,
                    ]);

                    $response = $this->ihsTools($objetoRequest, true);

                    $responseResource = is_object($response)
                        ? (isset($response->resourceType) ? $response->resourceType : '')
                        : (isset($response['resourceType']) ? $response['resourceType'] : '');

                    $responseId = is_object($response)
                        ? (isset($response->id) ? $response->id : null)
                        : (isset($response['id']) ? $response['id'] : null);

                    $berhasil = $responseResource !== 'OperationOutcome'
                        && !empty($responseId);

                    $mod = new IHS_Transaction();
                    $mod->norec = $mod->generateNewId();
                    $mod->statusenabled = $berhasil;
                    $mod->kdprofile = $kdProfile;
                    $mod->resourcetype = 'Observation';
                    $mod->url = $this->endPoint() . 'Observation';
                    $mod->method = 'POST';
                    $mod->id = $responseId;
                    $mod->body = json_encode($data);
                    $mod->response = json_encode($response);
                    $mod->date = date('Y-m-d H:i:s');
                    $mod->save();

                    if ($berhasil) {
                        DB::table('ris_order')
                            ->where('norec', $item->norec_ris)
                            ->update([
                                'ihs_observation' => $responseId,
                            ]);
                    }

                    $hasil[] = [
                        'noorder' => $noorder,
                        'jenis' => 'radiologi',
                        'pemeriksaan' => $namaPemeriksaan,
                        'order_code' => $item->order_code,
                        'status' => $berhasil ? 'berhasil' : 'gagal',
                        'ihs_observation' => $responseId,
                        'response' => $response,
                    ];
                } catch (\Exception $e) {
                    $hasil[] = [
                        'noorder' => $noorder,
                        'jenis' => 'radiologi',
                        'pemeriksaan' => $namaPemeriksaan,
                        'order_code' => $item->order_code,
                        'status' => 'gagal',
                        'error' => $e->getMessage(),
                    ];
                }
            }

            $response = [
                'resourceType' => 'OperationOutcome',
                'noorder' => $noorder,
                'total' => count($hasil),
                'berhasil' => count(array_filter($hasil, function ($v) {
                    return $v['status'] === 'berhasil';
                })),
                'gagal' => count(array_filter($hasil, function ($v) {
                    return $v['status'] === 'gagal';
                })),
                'detail' => $hasil,
            ];
        } catch (\Exception $e) {
            $response = [
                'resourceType' => 'OperationOutcome',
                'issue' => $e->getMessage(),
            ];
        }

        if ($lokal == true) {
            return $response;
        }

        return response()->json($response);
    }
    
    public function DiagnosticReport(Request $request, $lokal = null)
    {
        ini_set('max_execution_time', 0);

        $kdProfile = $this->kdProfile;
        $noorder = trim($request->input('noorder', ''));
        $jenis = strtolower(trim($request->input('jenis', '')));

        try {
            if ($noorder === '') {
                throw new \Exception('Parameter noorder wajib diisi');
            }

            if (!in_array($jenis, ['', 'lab', 'rad'])) {
                throw new \Exception('Jenis harus lab atau rad');
            }

            $profile = Profile::where('id', $kdProfile)->first();

            if (!$profile || empty($profile->ihs_id)) {
                throw new \Exception('Konfigurasi IHS Profile tidak ditemukan');
            }

            $sumber = [];

            if ($jenis === '' || $jenis === 'lab') {
                $lab = DB::select("
                    SELECT
                        hpl.norec AS id_sumber,
                        so.noorder,
                        COALESCE(
                            NULLIF(pr.namaproduk, ''),
                            'Pemeriksaan Laboratorium'
                        ) AS nama_pemeriksaan,
                        hpl.ihs_observation,
                        hpl.tglkirim AS tanggal,
                        so.norec AS norec_order,
                        pd.ihs_id AS ihs_encounter,
                        ps.ihs_number AS ihs_pasien,
                        ps.namapasien,
                        pg.ihs_id AS ihs_practitioner,
                        op.ihs_id AS ihs_service_req,
                        pr.ihs_loinc_id,
                        pr.ihs_loinc_common_name
                    FROM hasillaboratorium_t AS hpl
                    LEFT JOIN antrianpasiendiperiksa_t AS apd
                        ON apd.norec = hpl.noregistrasifk
                    LEFT JOIN pasiendaftar_t AS pd
                        ON pd.norec = apd.noregistrasifk
                    LEFT JOIN produk_m AS pr
                        ON pr.id = hpl.produkfk
                    LEFT JOIN strukorder_t AS so
                        ON so.noregistrasifk = pd.norec
                    LEFT JOIN pasien_m AS ps
                        ON ps.id = pd.nocmfk
                    LEFT JOIN pegawai_m AS pg
                        ON pg.id = so.objectpegawaiorderfk
                    LEFT JOIN orderpelayanan_t AS op
                        ON op.strukorderfk = so.norec
                        AND op.objectprodukfk = hpl.produkfk
                    WHERE hpl.kdprofile = ?
                        AND hpl.statusenabled = TRUE
                        AND so.kdprofile = ?
                        AND so.noorder = ?
                        AND so.statusenabled = TRUE
                        AND so.keteranganorder = 'Order Laboratorium'
                        AND so.objectkelompoktransaksifk IN (93, 94)
                        AND pd.statusenabled = TRUE
                    ORDER BY hpl.tglkirim, hpl.norec
                ", [
                    $kdProfile,
                    $kdProfile,
                    $noorder
                ]);

                foreach ($lab as $item) {
                    $sumber[] = [
                        'jenis' => 'lab',
                        'item' => $item,
                    ];
                }
            }

            if ($jenis === '' || $jenis === 'rad') {
                $rad = DB::select("
                    SELECT
                        ro.norec AS id_sumber,
                        ro.order_no AS noorder,
                        ro.order_code,
                        ro.ihs_observation,
                        ro.ihs_diagnosticreport,
                        ro.imaging_id AS ihs_imaging_id,
                        so.norec AS norec_order,
                        so.tglorder,
                        op.ihs_id AS ihs_service_req,
                        pp.norec AS norec_pp,
                        hr.tanggal,
                        hr.keterangan AS expertise,
                        ps.ihs_number AS ihs_pasien,
                        ps.namapasien,
                        pd.ihs_id AS ihs_encounter,
                        pg.ihs_id AS ihs_practitioner,
                        pr.namaproduk AS nama_pemeriksaan,
                        pr.ihs_loinc_id,
                        pr.ihs_loinc_common_name
                    FROM ris_order AS ro
                    INNER JOIN strukorder_t AS so
                        ON so.noorder = ro.order_no
                    INNER JOIN orderpelayanan_t AS op
                        ON op.noorderfk = so.norec
                        AND CAST(op.objectprodukfk AS text) = ro.order_code
                    INNER JOIN pasiendaftar_t AS pd
                        ON pd.norec = so.noregistrasifk
                    INNER JOIN pasien_m AS ps
                        ON ps.id = pd.nocmfk
                    INNER JOIN produk_m AS pr
                        ON pr.id = op.objectprodukfk
                    LEFT JOIN pegawai_m AS pg
                        ON pg.id = so.objectpegawaiorderfk
                    LEFT JOIN pelayananpasien_t AS pp
                        ON pp.strukorderfk = so.norec
                        AND pp.produkfk = op.objectprodukfk
                    LEFT JOIN hasilradiologi_t AS hr
                        ON hr.pelayananpasienfk = pp.norec
                    WHERE so.kdprofile = ?
                        AND so.noorder = ?
                        AND so.keteranganorder = 'Order Radiologi'
                        AND so.objectkelompoktransaksifk = 94
                        AND so.statusenabled = TRUE
                        AND pd.statusenabled = TRUE
                    ORDER BY ro.order_code
                ", [
                    $kdProfile,
                    $noorder
                ]);

                foreach ($rad as $item) {
                    $sumber[] = [
                        'jenis' => 'rad',
                        'item' => $item,
                    ];
                }
            }

            if (count($sumber) === 0) {
                throw new \Exception(
                    'Data DiagnosticReport tidak ditemukan untuk order ' . $noorder
                );
            }

            $hasil = [];
            $grup = [];

            foreach ($sumber as $s) {
                $item = $s['item'];
                $jenisItem = $s['jenis'];

                $nama = !empty($item->nama_pemeriksaan)
                    ? $item->nama_pemeriksaan
                    : $noorder;

                if (empty($item->ihs_observation)) {
                    $hasil[] = [
                        'noorder' => $noorder,
                        'jenis' => $jenisItem,
                        'pemeriksaan' => $nama,
                        'status' => 'gagal',
                        'error' => 'Observation belum berhasil dikirim',
                    ];

                    continue;
                }

                $key = $jenisItem . '_' . $noorder;

                if (!isset($grup[$key])) {
                    $grup[$key] = [
                        'jenis' => $jenisItem,
                        'items' => [],
                    ];
                }

                $grup[$key]['items'][] = $item;
            }

            foreach ($grup as $group) {
                $jenisItem = $group['jenis'];
                $items = $group['items'];
                $item = $items[0];

                try {
                    $results = [];
                    $serviceRequests = [];

                    foreach ($items as $row) {
                        if (!empty($row->ihs_observation)) {
                            $results[$row->ihs_observation] = [
                                'reference' => 'Observation/' . $row->ihs_observation,
                            ];
                        }

                        if (!empty($row->ihs_service_req)) {
                            $serviceRequests[$row->ihs_service_req] = [
                                'reference' => 'ServiceRequest/' . $row->ihs_service_req,
                            ];
                        }
                    }

                    if (count($results) === 0) {
                        throw new \Exception('Tidak ada Observation yang berhasil');
                    }

                    if (empty($item->ihs_pasien)) {
                        throw new \Exception('IHS Patient belum tersedia');
                    }

                    if (empty($item->ihs_encounter)) {
                        throw new \Exception('IHS Encounter belum tersedia');
                    }

                    $tglHasil = !empty($item->tanggal)
                        ? $item->tanggal
                        : (
                            !empty($item->tglorder)
                                ? $item->tglorder
                                : date('Y-m-d H:i:s')
                        );

                    $isLab = $jenisItem === 'lab';

                    $data = [
                        'resourceType' => 'DiagnosticReport',
                        'identifier' => [[
                            'system' => 'http://sys-ids.kemkes.go.id/diagnostic/'
                                . $profile->ihs_id
                                . ($isLab ? '/lab' : '/rad'),
                            'use' => 'official',
                            'value' => $noorder,
                        ]],
                        'status' => 'final',
                        'category' => [[
                            'coding' => [[
                                'system' => 'http://terminology.hl7.org/CodeSystem/v2-0074',
                                'code' => $isLab ? 'LAB' : 'RAD',
                                'display' => $isLab ? 'Laboratory' : 'Radiology',
                            ]],
                        ]],
                        'code' => [
                            'coding' => [[
                                'system' => 'http://loinc.org',
                                'code' => !empty($item->ihs_loinc_id)
                                    ? $item->ihs_loinc_id
                                    : '11502-2',
                                'display' => !empty($item->ihs_loinc_common_name)
                                    ? $item->ihs_loinc_common_name
                                    : ($isLab ? 'Laboratory report' : 'Radiology report'),
                            ]],
                        ],
                        'subject' => [
                            'reference' => 'Patient/' . $item->ihs_pasien,
                            'display' => $item->namapasien,
                        ],
                        'encounter' => [
                            'reference' => 'Encounter/' . $item->ihs_encounter,
                        ],
                        'effectiveDateTime' => date(
                            'Y-m-d\TH:i:sP',
                            strtotime($tglHasil)
                        ),
                        'issued' => $this->dateISO($tglHasil),
                        'performer' => [[
                            'reference' => 'Organization/' . $profile->ihs_id,
                        ]],
                        'result' => array_values($results),
                    ];

                    if (!empty($item->ihs_practitioner)) {
                        $data['performer'][] = [
                            'reference' => 'Practitioner/' . $item->ihs_practitioner,
                        ];
                    }

                    if (count($serviceRequests) > 0) {
                        $data['basedOn'] = array_values($serviceRequests);
                    }

                    if (!$isLab && !empty($item->ihs_imaging_id)) {
                        $data['imagingStudy'] = [[
                            'reference' => 'ImagingStudy/' . $item->ihs_imaging_id,
                        ]];
                    }

                    $objetoRequest = new \Illuminate\Http\Request();
                    $objetoRequest->replace([
                        'url' => 'DiagnosticReport',
                        'method' => 'POST',
                        'data' => $data,
                    ]);

                    $response = $this->ihsTools($objetoRequest, true);

                    if (is_string($response)) {
                        $decoded = json_decode($response);

                        if (json_last_error() === JSON_ERROR_NONE) {
                            $response = $decoded;
                        }
                    }

                    $responseResource = is_object($response)
                        ? (isset($response->resourceType) ? $response->resourceType : '')
                        : (is_array($response) && isset($response['resourceType'])
                            ? $response['resourceType']
                            : '');

                    $responseId = is_object($response)
                        ? (isset($response->id) ? $response->id : null)
                        : (is_array($response) && isset($response['id'])
                            ? $response['id']
                            : null);

                    $berhasil = $responseResource === 'DiagnosticReport'
                        && !empty($responseId);

                    $mod = new IHS_Transaction();
                    $mod->norec = $mod->generateNewId();
                    $mod->statusenabled = $berhasil;
                    $mod->kdprofile = $kdProfile;
                    $mod->resourcetype = 'DiagnosticReport';
                    $mod->url = $this->endPoint() . 'DiagnosticReport';
                    $mod->method = 'POST';
                    $mod->id = $responseId;
                    $mod->body = json_encode($data);
                    $mod->response = json_encode($response);
                    $mod->date = date('Y-m-d H:i:s');
                    $mod->save();

                    if ($berhasil) {
                        foreach ($items as $row) {
                            if ($jenisItem === 'lab') {
                                DB::table('hasillaboratorium_t')
                                    ->where('norec', $row->id_sumber)
                                    ->update([
                                        'ihs_diagnosticreport' => $responseId,
                                    ]);
                            } else {
                                DB::table('ris_order')
                                    ->where('norec', $row->id_sumber)
                                    ->update([
                                        'ihs_diagnosticreport' => $responseId,
                                    ]);
                            }
                        }
                    }

                    $hasil[] = [
                        'noorder' => $noorder,
                        'jenis' => $isLab ? 'laboratorium' : 'radiologi',
                        'status' => $berhasil ? 'berhasil' : 'gagal',
                        'ihs_diagnosticreport' => $responseId,
                        'jumlah_observation' => count($results),
                        'response' => $response,
                    ];
                } catch (\Exception $e) {
                    $hasil[] = [
                        'noorder' => $noorder,
                        'jenis' => $jenisItem,
                        'status' => 'gagal',
                        'error' => $e->getMessage(),
                    ];
                }
            }

            $response = [
                'resourceType' => 'OperationOutcome',
                'noorder' => $noorder,
                'total' => count($hasil),
                'berhasil' => count(array_filter($hasil, function ($v) {
                    return $v['status'] === 'berhasil';
                })),
                'gagal' => count(array_filter($hasil, function ($v) {
                    return $v['status'] === 'gagal';
                })),
                'detail' => $hasil,
            ];
        } catch (\Exception $e) {
            $response = [
                'resourceType' => 'OperationOutcome',
                'issue' => $e->getMessage(),
            ];
        }

        if ($lokal == true) {
            return $response;
        }

        return response()->json($response);
    }



    public function ObservationLabDiagnos(Request $request,  $lokal = null)
    {

        $kdProfile = $this->kdProfile;
     
        $q= collect(DB::select("select 
            res.his_reg_no AS visit_trans_id,  res.lis_test_id AS tarif_id,
            res.test_name AS examination_name, res.result AS result_value,  res.test_units_name AS unit,
            res.reference_value AS normal_value,  res.result_comment AS metode,   res.test_group AS treatment_name,
            res.sequence AS urut, orz.patient_id AS rm_number,  res.authorization_date AS visit_date,    res.his_test_id,
            res.test_name AS tarif_name,  res.test_flag_sign AS flag ,res.authorization_user as analis ,

            pd.ihs_id AS ihs_encounter,
            ps.ihs_number AS ihs_pasien,
            pg.ihs_id AS ihs_practitioner,
            op.ihs_specimen,
            op.ihs_id as ihs_service_req,
            res.ihs_id AS ihs_idforput,
            res.loinc_id,
            res.loinc_name,
            res.lis_reg_no,
            pr.ihs_loinc_id,
            pr.ihs_loinc_common_name,
             ps.namapasien
            from result_bridge as res
            join order_bridge as orz on orz.order_number=res.his_reg_no
            LEFT JOIN strukorder_t st ON st.noorder = res.his_reg_no
            LEFT JOIN orderpelayanan_t op ON op.strukorderfk = st.norec 
            LEFT JOIN pasiendaftar_t AS pd ON pd.norec = st.noregistrasifk
            LEFT JOIN pasien_m AS ps ON ps.ID = pd.nocmfk
            LEFT JOIN produk_m AS pr ON pr.ID = res.his_test_id
            LEFT JOIN pegawai_m AS pg ON cast(pg.ID  as text)= orz.doctor_id 
            where res.his_reg_no= '$request[noorder]'"))->toArray();
         
        // $q = collect(DB::select("
        //         SELECT
        //         st.noorder,
        //         st.tglorder,
        //         hh.tglhasil,
        //         pr.namaproduk,
        //         hh.produkfk,
        //         pr.ihs_loinc_id,
        //         pr.ihs_loinc_common_name,
        //         ps.ihs_number AS ihs_pasien,
        //         ps.namapasien,
        //         pd.ihs_id AS ihs_encounter,
        //         hh.pegawaifk ,
        //         pg.ihs_id AS ihs_practitioner,
        //         pg.namalengkap AS dokterorder,
        //         hh.ihs_id AS ihs_idforput,
        //         hh.norec,
        //         op.ihs_specimen,
        //         op.ihs_id as ihs_service_req,
        //         hh.nilainormal,
        //         hh.hasil,
        //         hh.satuan,
        //         hh.flag,
        //         hh.loinc_id,
        //         hh.loinc_name
        //     FROM
        //         hasillaboratorium_t AS hh
        //         LEFT JOIN antrianpasiendiperiksa_t AS apd ON apd.norec = hh.noregistrasifk
        //         LEFT JOIN strukorder_t st ON st.norec = apd.objectstrukorderfk
        //         LEFT JOIN orderpelayanan_t op ON op.strukorderfk = st.norec 
        //         --and op.objectprodukfk = hh.produkfk
        //         LEFT JOIN pasiendaftar_t AS pd ON pd.norec = apd.noregistrasifk
        //         LEFT JOIN produk_m AS pr ON pr.ID = hh.produkfk
        //         LEFT JOIN pasien_m AS ps ON ps.ID = pd.nocmfk
        //         LEFT JOIN pegawai_m AS pg ON pg.ID = hh.pegawaifk 
        //     WHERE
        //     hh.kdprofile = $kdProfile
        //     and  hh.norec = '$request[norec_hasil]'
        //             "));
      
        try {

            if (count($q) == 0) {
                $response = array(
                    "issue" =>   'Observation doesnt exist',
                    "resourceType" => "OperationOutcome"
                );
                if ($lokal == true) {
                    return $response;
                }
                return response()->json($response);
            }
            $profile = Profile::where('id', $kdProfile)->first();
            $displayFlag = '';
            $arr_result_ob = [];
            foreach ($q as $k =>  $item) {
                $codeFlag = '';
                $displayFlag = '';
                if ($item->flag == 'N') {
                    $codeFlag = 'N';
                    $displayFlag = 'Normal';
                }
                if ($item->flag == 'H') {
                    $codeFlag = 'H';
                    $displayFlag = 'High';
                }
                if ($item->flag == 'L') {
                    $codeFlag = 'L';
                    $displayFlag = 'Low';
                }
                if ($item->flag == 'HH') {
                    $codeFlag = 'HH';
                    $displayFlag = 'Critical high';
                }
                if ($item->flag == 'LL') {
                    $codeFlag = 'LL';
                    $displayFlag = 'Critical Low';
                }
                if ($item->flag == 'Y') {
                    $codeFlag = 'A';
                    $displayFlag = 'Abnormal';
                }
                $data = array(
                    'resourceType' => 'Observation',
                    'id' => $item->ihs_idforput,
                    'identifier' =>
                    array(
                        0 =>
                        array(
                            'system' => 'http://sys-ids.kemkes.go.id/observation/' . $profile->ihs_id,
                            'value' => $item->lis_reg_no,
                        ),
                    ),
                    'status' => 'final',
                    'category' =>
                    array(
                        0 =>
                        array(
                            'coding' =>
                            array(
                                0 =>
                                array(
                                    'system' => 'http://terminology.hl7.org/CodeSystem/observation-category',
                                    'code' => 'laboratory',
                                    'display' => 'Laboratory',
                                ),
                            ),
                        ),
                    ),
                    'code' =>
                    array(
                        'coding' =>
                        array(
                            0 =>
                            array(
                                'system' => 'http://loinc.org',
                                'code' => $item->loinc_id != null ? $item->loinc_id : $item->ihs_loinc_id,
                                'display' => $item->loinc_name != null ? $item->loinc_name : $item->ihs_loinc_common_name,
                            ),
                        ),
                    ),
                    'subject' =>
                    array(
                        'reference' => 'Patient/' . $item->ihs_pasien,
                        'display' => $item->namapasien,
                    ),
                    'encounter' =>
                    array(
                        'reference' => 'Encounter/' . $item->ihs_encounter,
                        'display' => 'Observasi hasil' . $item->ihs_loinc_common_name . ' ' . $item->namapasien . ' di hari ' . $this->hari_ini($item->visit_date) . ', ' . $this->getDateIndo($item->visit_date),

                    ),
                    'effectiveDateTime' => date('Y-m-d', strtotime($item->visit_date)),
                    'issued' => $this->dateISO($item->visit_date),
                    'performer' =>
                    array(
                        0 =>
                        array(
                            'reference' => 'Practitioner/' . $item->ihs_practitioner,
                        ),
                        1 =>
                        array(
                            'reference' => 'Organization/' . $profile->ihs_id,
                        ),
                    ),
                    'specimen' =>
                    array(
                        'reference' => 'Specimen/' . $item->ihs_specimen,
                    ),
                    'basedOn' =>
                    array(
                        0 =>
                        array(
                            'reference' => 'ServiceRequest/' . $item->ihs_service_req,
                        ),
                    ),
                    // 'valueCodeableConcept' => 
                    // array (
                    //   'coding' => 
                    //   array (
                    //     0 => 
                    //     array (
                    //       'system' => 'http://snomed.info/sct',
                    //       'code' => '260347006',
                    //       'display' => '+',
                    //     ),
                    //   ),
                    // ),
                    "valueQuantity" => array(
                        "value" =>  (float)$item->result_value,
                        "unit" => $item->unit,
                        "system" =>  "http://unitsofmeasure.org",
                        "code" => $item->unit,
                    ),
                    "interpretation" => [
                        array(
                            "coding" => [
                                array(
                                    "system" => "http://terminology.hl7.org/CodeSystem/v3-ObservationInterpretation",
                                    "code" => $codeFlag,
                                    "display" => $displayFlag
                                ),

                            ]
                        )
                    ],
                    'referenceRange' =>
                    array(
                        0 =>
                        array(
                            'text' => $item->normal_value . ' ' . $item->unit,
                        ),
                    ),
                );
                // dd($data);

                // if ($item->ihs_idforput == null) {
                unset($data['id']);
                // }

                $objetoRequest = new \Illuminate\Http\Request();
                $objetoRequest['url'] = $data['resourceType'];
                // $objetoRequest['method'] = $item->ihs_idforput == null ? 'POST' : 'PUT';
                $objetoRequest['method'] = 'POST';

                $objetoRequest['data'] = $data;

                $response =  $this->ihsTools($objetoRequest, true);

                $noterror = true;
                if ($response->resourceType == 'OperationOutcome') {
                    $noterror = false;
                }

                if ($item->ihs_idforput == null) {
                    $mod = new IHS_Transaction();
                    $mod->norec = $mod->generateNewId();
                    $mod->statusenabled = $noterror;
                    $mod->kdprofile = $this->kdProfile;
                } else {
                    $mod = IHS_Transaction::where('id', $item->ihs_idforput)->first();
                }
                if (empty($mod)) {
                    $mod = new IHS_Transaction();
                    $mod->norec = $mod->generateNewId();
                    $mod->statusenabled = $noterror;
                    $mod->kdprofile = $this->kdProfile;
                }
                $mod->resourcetype = $data['resourceType'];
                $mod->url =  $this->endPoint() . $data['resourceType'];
                $mod->method = 'POST';
                $mod->id = isset($response->id) ? $response->id : null;
                $mod->body = json_encode($data);
                $mod->response = json_encode($response);
                $mod->date = date('Y-m-d H:i:s');
                $mod->save();
                if (isset($response->id)) {
                    DB::table('result_bridge')->where('lis_reg_no', $item->lis_reg_no)->update([
                        'ihs_id' => $response->id,
                        'ihs_diagnosticreport' => null,
                    ]);
                }

                $data = array(
                    'resourceType' => 'DiagnosticReport',
                    'id' => $item->ihs_idforput,
                    'identifier' =>
                    array(
                        0 =>
                        array(
                            'system' => 'http://sys-ids.kemkes.go.id/diagnostic/' . $profile->ihs_id . '/lab',
                            'use' => 'official',
                            'value' => $item->lis_reg_no,
                        ),
                    ),
                    'status' => 'final',
                    'category' =>
                    array(
                        0 =>
                        array(
                            'coding' =>
                            array(
                                0 =>
                                array(
                                    'system' => 'http://terminology.hl7.org/CodeSystem/v2-0074',
                                    // 'code' => 'MB',
                                    // 'display' => 'Microbiology',
                                    'code' => 'LAB',
                                    'display' => 'Laboratory',
                                ),
                            ),
                        ),
                    ),
                    'code' =>
                    array(
                        'coding' =>
                        array(
                            0 =>
                            array(
                                'system' => 'http://loinc.org',
                                'code' => $item->ihs_loinc_id,
                                'display' => $item->ihs_loinc_common_name,
                            ),
                        ),
                    ),
                    'subject' =>
                    array(
                        'reference' => 'Patient/' . $item->ihs_pasien,
                        'display' => $item->namapasien,
                    ),
                    'encounter' =>
                    array(
                        'reference' => 'Encounter/' . $item->ihs_encounter,
                    ),
                    'effectiveDateTime' => date('Y-m-d', strtotime($item->visit_date)),
                    'issued' => $this->dateISO($item->visit_date),
                    'performer' =>
                    array(
                        0 =>
                        array(
                            'reference' => 'Practitioner/' . $item->ihs_practitioner,
                        ),
                        1 =>
                        array(
                            'reference' => 'Organization/' . $profile->ihs_id,
                        ),
                    ),
                    'result' =>
                    $arr_result_ob,
                    'specimen' =>
                    array(
                        0 =>
                        array(
                            'reference' => 'Specimen/' . $item->ihs_specimen,
                        ),
                    ),
                    'basedOn' =>
                    array(
                        0 =>
                        array(
                            'reference' => 'ServiceRequest/' . $item->ihs_service_req,
                        ),
                    ),
                    // 'conclusionCode' =>
                    // array(
                    //     0 =>
                    //     array(
                    //         'coding' =>
                    //         array(
                    //             0 =>
                    //             array(
                    //                 'system' => "http://terminology.hl7.org/CodeSystem/v3-ObservationInterpretation",
                    //                 'code' => $codeFlag,
                    //                 'display' => $displayFlag,
                    //             ),
                    //         ),
                    //     ),
                    // ),
                    'conclusion' => $displayFlag
    
                );
                // dd($data);
    
    
                // if ($item->ihs_idforput == null) {
                unset($data['id']);
                // }
    
                $objetoRequest = new \Illuminate\Http\Request();
                $objetoRequest['url'] = $data['resourceType'];
                // $objetoRequest['method'] = $item->ihs_idforput == null ? 'POST' : 'PUT';
                $objetoRequest['method'] = 'POST';
                $objetoRequest['data'] = $data;
    
                $response =  $this->ihsTools($objetoRequest, true);
    
                $noterror = true;
                if ($response->resourceType == 'OperationOutcome') {
                    $noterror = false;
                }
    
                if ($item->ihs_idforput == null) {
                    $mod = new IHS_Transaction();
                    $mod->norec = $mod->generateNewId();
                    $mod->statusenabled = $noterror;
                    $mod->kdprofile = $this->kdProfile;
                } else {
                    $mod = IHS_Transaction::where('id', $item->ihs_idforput)->first();
                }
                if (empty($mod)) {
                    $mod = new IHS_Transaction();
                    $mod->norec = $mod->generateNewId();
                    $mod->statusenabled = $noterror;
                    $mod->kdprofile = $this->kdProfile;
                }
                $mod->resourcetype = $data['resourceType'];
                $mod->url =  $this->endPoint() . $data['resourceType'];
                $mod->method = 'POST';
                $mod->id = isset($response->id) ? $response->id : null;
                $mod->body = json_encode($data);
                $mod->response = json_encode($response);
                $mod->date = date('Y-m-d H:i:s');
                $mod->save();
                if (isset($response->id)) {
                    DB::table('result_bridge')->where('lis_reg_no', $item->lis_reg_no)->update([
                        'ihs_diagnosticreport' => $response->id,
    
                    ]);
                }
            }
        } catch (\Exception $e) {
            $response = array(
                "issue" => $e->getMessage() . ' ' . $e->getLine(),
                "resourceType" => "OperationOutcome"
            );
        }
        if ($lokal == true) {
            return $response;
        }
        return response()->json($response);
    }
    public function AllergyIntolerance(Request $request,  $lokal = null)
    {

        $kdProfile = $this->kdProfile;
       
        try {
            $q =  collect(DB::select("
                    SELECT
                        emrd.value AS namaalergi,emrd.tgl AS tglinput,emrd.norec, 
                          'input alergi ' || emrd.value AS keterangandata,
                        pg.namalengkap,
                        ps.namapasien AS given,
                        pap.ihs_id AS ihs_idforput,
                        ps.ihs_number AS ihs_pasien,
                        pap.ihs_id AS ihs_encounter,
                        pap.tglregistrasi,
                        pg.ihs_id AS ihs_practitioner,

                        CASE
                            WHEN emrd.emrdfk in ('422047','422246')
                            THEN  '404684003'
                        END AS kodesnomed,

                        CASE
                            WHEN emrd.emrdfk in ('422047','422246')
                            THEN 'medication'
                        END AS kategori

                    FROM pasiendaftar_t AS pap

                    INNER JOIN pasien_m AS ps ON pap.nocmfk = ps.id

                    INNER JOIN pegawai_m AS pg ON pap.objectpegawaifk = pg.id

                    LEFT JOIN emrpasien_t AS emr ON emr.noregistrasifk = pap.noregistrasi

                    LEFT JOIN emrpasiend_t AS emrd ON emrd.emrpasienfk = emr.noemr

                    WHERE
                        pap.kdprofile = 39
                        AND pap.noregistrasi = '$request[noregistrasi]'
                        AND emrd.emrdfk  in ('422047','422246');
          "));
           
            if (count($q) == 0) {
                $response = array(
                    "issue" =>   'AllergyIntolerance doesnt exist',
                    "resourceType" => "OperationOutcome"
                );
                if ($lokal == true) {
                    return $response;
                }
                return response()->json($response);
            }
            $profile = Profile::where('id', $kdProfile)->first();
            $displayFlag = '';
            $arr_result_ob = [];
           
            foreach ($q as $k =>  $item) {
              $tglemr =  strtotime(date($item->tglinput));
              $tglemr =  substr(date("Y-m-d\TH:i:s", $tglemr), 0, 23) . date('P', $tglemr);
            //   $idAL = $this->generateCodeBySeqTable(new PapAlergi, 'alergi_satusehat', 10, date('Ym'), $kdProfile);
              $data =  array (
                   'id' => $item->ihs_idforput,
                    'resourceType' => 'AllergyIntolerance',
                    'identifier' => 
                    array (
                      0 => 
                      array (
                        'system' => 'http://sys-ids.kemkes.go.id/allergy/'. $profile->ihs_id,
                        'use' => 'official',
                        'value' => $item->norec,
                      ),
                    ),
                    'clinicalStatus' => 
                    array (
                      'coding' => 
                      array (
                        0 => 
                        array (
                          'system' => 'http://terminology.hl7.org/CodeSystem/allergyintolerance-clinical',
                          'code' => 'active',
                          'display' => 'Active',
                        ),
                      ),
                    ),
                    'verificationStatus' => 
                    array (
                      'coding' => 
                      array (
                        0 => 
                        array (
                          'system' => 'http://terminology.hl7.org/CodeSystem/allergyintolerance-verification',
                          'code' => 'confirmed',
                          'display' => 'Confirmed',
                        ),
                      ),
                    ),
                    'category' => 
                    array (
                      0 =>  $item->kategori != null ? $item->kategori:$item->namaalergi,
                    ),
                    'code' => 
                    array (
                      'coding' => 
                      array (
                        0 => 
                        array (
                          'system' => 'http://snomed.info/sct',
                          'code' => (string)$item->kodesnomed,
                          'display' =>  $item->namaalergi,
                        ),
                      ),
                      'text' => $item->keterangandata,
                    ),
                    'patient' => 
                    array (
                      'reference' => 'Patient/'.$item->ihs_pasien,
                      'display' => $item->given,
                    ),
                    'encounter' => 
                    array (
                        'reference' => 'Encounter/' . $item->ihs_encounter,
                        'display' => 'Kunjungan ' . $item->given . ' di hari ' . $this->hari_ini($item->tglregistrasi) . ', ' . $this->getDateIndo($item->tglregistrasi),
               
                    ),
                    'recordedDate' => $tglemr ,//'2022-06-14T15:37:31+07:00',
                    'recorder' => 
                    array (
                      'reference' => 'Practitioner/'.$item->ihs_practitioner,
                    ),
                );
         

                // if ($item->ihs_idforput == null) {
                unset($data['id']);
                // }

          
                $objetoRequest = new \Illuminate\Http\Request();
                $objetoRequest['url'] = $data['resourceType'];
                // $objetoRequest['method'] = $item->ihs_idforput == null ? 'POST' : 'PUT';
                $objetoRequest['method'] = 'POST';

                $objetoRequest['data'] = $data;

                $response =  $this->ihsTools($objetoRequest, true);

                $noterror = true;
                if ($response->resourceType == 'OperationOutcome') {
                    $noterror = false;
                }

                if ($item->ihs_idforput == null) {
                    $mod = new IHS_Transaction();
                    $mod->norec = $mod->generateNewId();
                    $mod->statusenabled = $noterror;
                    $mod->kdprofile = $this->kdProfile;
                } else {
                    $mod = IHS_Transaction::where('id', $item->ihs_idforput)->first();
                }
                if (empty($mod)) {
                    $mod = new IHS_Transaction();
                    $mod->norec = $mod->generateNewId();
                    $mod->statusenabled = $noterror;
                    $mod->kdprofile = $this->kdProfile;
                }
                $mod->resourcetype = $data['resourceType'];
                $mod->url =  $this->endPoint() . $data['resourceType'];
                $mod->method = 'POST';
                $mod->id = isset($response->id) ? $response->id : null;
                $mod->body = json_encode($data);
                $mod->response = json_encode($response);
                $mod->date = date('Y-m-d H:i:s');
                $mod->save();
                if (isset($response->id)) {
                    EMRPasienD::where('norec', $item->norec)->update([
                        'ihs_allergyintolerance' => $response->id,
                    ]);
                }

              
            }
        } catch (\Exception $e) {
            $response = array(
                "issue" => $e->getMessage() . ' ' . $e->getLine(),
                "resourceType" => "OperationOutcome"
            );
        }
        if ($lokal == true) {
            return $response;
        }
        return response()->json($response);
    }
    public function ClinicalImpression(Request $request, $lokal = null)
    {
        $kdProfile = $this->kdProfile;

        try {
            $noregistrasi = trim($request->input('noregistrasi', ''));

            if ($noregistrasi === '') {
                throw new \Exception('Parameter noregistrasi wajib diisi');
            }

            $item = DB::table('pasiendaftar_t as pd')
                ->join('pasien_m as ps', 'ps.id', '=', 'pd.nocmfk')
                ->leftJoin('pegawai_m as pg', 'pg.id', '=', 'pd.objectpegawaifk')
                ->where('pd.kdprofile', $kdProfile)
                ->where('pd.noregistrasi', $noregistrasi)
                ->select(
                    'pd.norec',
                    'ps.ihs_number as ihs_pasien',
                    'pd.ihs_id as ihs_encounter',
                    'ps.namapasien',
                    // 'pd.prognosis',
                    DB::raw("'‑' as prognosis"),
                    'pd.tglregistrasi',
                    'pd.noregistrasi',
                    'pg.ihs_id as ihs_practitioner',
                    'pg.namalengkap as dokter',
                    'pd.prognosiscodeableconcept_kode',
                    'pd.prognosiscodeableconcept',
                    'pd.tglpulang',
                    'pd.ihs_clinicalimpression as ihs_idforput'
                )
                ->first();

            if (empty($item)) {
                throw new \Exception(
                    'ClinicalImpression tidak ditemukan untuk registrasi ' . $noregistrasi
                );
            }

            if (empty($item->ihs_pasien)) {
                throw new \Exception('IHS Patient belum tersedia');
            }

            if (empty($item->ihs_encounter)) {
                throw new \Exception('IHS Encounter belum tersedia');
            }

            if (empty($item->tglpulang)) {
                throw new \Exception('Tanggal pulang belum tersedia');
            }

            if (trim((string) $item->prognosis) === '') {
                throw new \Exception('Prognosis belum diisi');
            }

            $profile = Profile::where('id', $kdProfile)->first();

            if (empty($profile) || empty($profile->ihs_id)) {
                throw new \Exception('IHS ID organisasi belum tersedia');
            }

            $diagnosis = DB::table('pasiendaftar_t as pd')
                ->join('antrianpasiendiperiksa_t as apd', 'apd.noregistrasifk', '=', 'pd.norec')
                ->join('detaildiagnosapasien_t as ddp', 'ddp.noregistrasifk', '=', 'apd.norec')
                ->join('diagnosa_m as dg', 'dg.id', '=', 'ddp.objectdiagnosafk')
                ->where('pd.kdprofile', $kdProfile)
                ->where('pd.noregistrasi', $noregistrasi)
                ->whereNotNull('ddp.ihs_id')
                ->whereRaw("TRIM(ddp.ihs_id) <> ''")
                ->select(
                    'dg.kddiagnosa',
                    'dg.namadiagnosa',
                    'ddp.ihs_id as ihs_condition'
                )
                ->distinct()
                ->get();

            $diagnosCond = array();

            foreach ($diagnosis as $dd) {
                $diagnosCond[] = array(
                    'itemCodeableConcept' => array(
                        'coding' => array(
                            array(
                                'system' => 'http://hl7.org/fhir/sid/icd-10',
                                'code' => $dd->kddiagnosa,
                                'display' => $dd->namadiagnosa,
                            ),
                        ),
                    ),
                    'itemReference' => array(
                        'reference' => 'Condition/' . $dd->ihs_condition,
                    ),
                );
            }

            $tgl = date(
                'Y-m-d\TH:i:sP',
                strtotime($item->tglpulang)
            );

            $data = array(
                'resourceType' => 'ClinicalImpression',
                'identifier' => array(
                    array(
                        'system' => 'http://sys-ids.kemkes.go.id/clinicalimpression/' . $profile->ihs_id,
                        'use' => 'official',
                        'value' => $item->norec,
                    ),
                ),
                'status' => 'completed',
                'description' => $item->prognosis,
                'subject' => array(
                    'reference' => 'Patient/' . $item->ihs_pasien,
                    'display' => $item->namapasien,
                ),
                'encounter' => array(
                    'reference' => 'Encounter/' . $item->ihs_encounter,
                    'display' => 'Kunjungan ' . $item->namapasien .
                        ' di hari ' . $this->hari_ini($item->tglregistrasi) .
                        ', ' . $this->getDateIndo($item->tglregistrasi),
                ),
                'effectiveDateTime' => $tgl,
                'date' => $tgl,
                'summary' => $item->prognosis,
                'prognosisCodeableConcept' => array(
                    array(
                        'coding' => array(
                            array(
                                'system' => 'http://snomed.info/sct',
                                'code' => '170968001',
                                'display' => 'Prognosis good',
                            ),
                        ),
                    ),
                ),
            );

            if (!empty($item->ihs_practitioner)) {
                $data['assessor'] = array(
                    'reference' => 'Practitioner/' . $item->ihs_practitioner,
                );
            }

            if (!empty($diagnosCond)) {
                $data['finding'] = $diagnosCond;
            }

            $clinicalImpressionId = trim((string) $item->ihs_idforput);

            if ($clinicalImpressionId !== '') {
                $method = 'PUT';
                $url = 'ClinicalImpression/' . $clinicalImpressionId;
                $data['id'] = $clinicalImpressionId;
            } else {
                $method = 'POST';
                $url = 'ClinicalImpression';
            }

            $objetoRequest = new \Illuminate\Http\Request();
            $objetoRequest->replace(array(
                'url' => $url,
                'method' => $method,
                'data' => $data,
            ));

            $response = $this->ihsTools($objetoRequest, true);

            $responseResource = is_object($response) && isset($response->resourceType)
                ? $response->resourceType
                : '';

            $responseId = is_object($response) && isset($response->id)
                ? $response->id
                : null;

            $berhasil = $responseResource !== 'OperationOutcome';

            if ($method === 'PUT' && empty($responseId)) {
                $responseId = $clinicalImpressionId;
            }

            if (empty($responseId)) {
                $berhasil = false;
            }

            $mod = new IHS_Transaction();
            $mod->norec = $mod->generateNewId();
            $mod->statusenabled = $berhasil;
            $mod->kdprofile = $kdProfile;
            $mod->resourcetype = 'ClinicalImpression';
            $mod->url = $this->endPoint() . $url;
            $mod->method = $method;
            $mod->id = $responseId;
            $mod->body = json_encode($data);
            $mod->response = json_encode($response);
            $mod->date = date('Y-m-d H:i:s');
            $mod->save();

            if ($berhasil) {
                DB::table('pasiendaftar_t')
                    ->where('norec', $item->norec)
                    ->update(array(
                        'ihs_clinicalimpression' => $responseId,
                    ));
            }

            if (!$berhasil) {
                $error = 'Gagal mengirim ClinicalImpression';

                if (is_object($response) && isset($response->issue)) {
                    $messages = array();

                    foreach ($response->issue as $issue) {
                        if (isset($issue->details->text)) {
                            $messages[] = $issue->details->text;
                        }

                        if (isset($issue->diagnostics)) {
                            $messages[] = $issue->diagnostics;
                        }
                    }

                    if (!empty($messages)) {
                        $error = implode('; ', array_unique($messages));
                    }
                }

                $response = array(
                    'resourceType' => 'OperationOutcome',
                    'issue' => $error,
                    'noregistrasi' => $noregistrasi,
                    'response' => $response,
                );
            }
        } catch (\Exception $e) {
            $response = array(
                'resourceType' => 'OperationOutcome',
                'issue' => $e->getMessage(),
            );
        }

        if ($lokal == true) {
            return $response;
        }

        return response()->json($response);
    }

    public function ObservationKesadaran(Request $request,  $lokal = null)
    {

        //prognosis

        $kdProfile = $this->kdProfile;
       
        // try {
           
            // $q =[];
            // if (count($q) == 0) {
            //     $response = array(
            //         "issue" =>   'ClinicalImpression doesnt exist',
            //         "resourceType" => "OperationOutcome"
            //     );
            //     if ($lokal == true) {
            //         return $response;
            //     }
            //     return response()->json($response);
            // }
            $profile = Profile::where('id', $kdProfile)->first();
            // $displayFlag = '';
            // $arr_result_ob = [];
           
            // foreach ($q as $k =>  $item) {
                $response = array (
                    'resourceType' => 'Observation',
                    'status' => 'final',
                    'category' => 
                    array (
                      0 => 
                      array (
                        'coding' => 
                        array (
                          0 => 
                          array (
                            'system' => 'http://terminology.hl7.org/CodeSystem/observation-category',
                            'code' => 'exam',
                            'display' => 'Exam',
                          ),
                        ),
                      ),
                    ),
                    'code' => 
                    array (
                      'coding' => 
                      array (
                        0 => 
                        array (
                          'system' => 'http://loinc.org',
                          'code' => '67775-7',
                          'display' => 'Level of responsiveness',
                        ),
                      ),
                    ),
                    'subject' => 
                    array (
                      'reference' => 'Patient/100000030009',
                    ),
                    'performer' => 
                    array (
                      0 => 
                      array (
                        'reference' => 'Practitioner/N10000001',
                      ),
                    ),
                    'encounter' => 
                    array (
                      'reference' => 'Encounter/2823ed1d-3e3e-434e-9a5b-9c579d192787',
                      'display' => 'Pemeriksaan Kesadaran Budi Santoso di hari Selasa, 14 Juni 2022',
                    ),
                    'effectiveDateTime' => '2022-07-14',
                    'valueCodeableConcept' => 
                    array (
                      'coding' => 
                      array (
                        0 => 
                        array (
                          'system' => 'http://terminology.kemkes.go.id/CodeSystem/clinical-term',
                          'code' => 'TK000001',
                          'display' => 'Alert',
                        ),
                      ),
                    ),
                  );
         

        //         // if ($item->ihs_idforput == null) {
        //         unset($data['id']);
        //         // }

          
        //         $objetoRequest = new \Illuminate\Http\Request();
        //         $objetoRequest['url'] = $data['resourceType'];
        //         // $objetoRequest['method'] = $item->ihs_idforput == null ? 'POST' : 'PUT';
        //         $objetoRequest['method'] = 'POST';

        //         $objetoRequest['data'] = $data;

        //         $response =  $this->ihsTools($objetoRequest, true);

        //         $noterror = true;
        //         if ($response->resourceType == 'OperationOutcome') {
        //             $noterror = false;
        //         }

        //         if ($item->ihs_idforput == null) {
        //             $mod = new IHS_Transaction();
        //             $mod->norec = $mod->generateNewId();
        //             $mod->statusenabled = $noterror;
        //             $mod->kdprofile = $this->kdProfile;
        //         } else {
        //             $mod = IHS_Transaction::where('id', $item->ihs_idforput)->first();
        //         }
        //         if (empty($mod)) {
        //             $mod = new IHS_Transaction();
        //             $mod->norec = $mod->generateNewId();
        //             $mod->statusenabled = $noterror;
        //             $mod->kdprofile = $this->kdProfile;
        //         }
        //         $mod->resourcetype = $data['resourceType'];
        //         $mod->url =  $this->endPoint() . $data['resourceType'];
        //         $mod->method = 'POST';
        //         $mod->id = isset($response->id) ? $response->id : null;
        //         $mod->body = json_encode($data);
        //         $mod->response = json_encode($response);
        //         $mod->date = date('Y-m-d H:i:s');
        //         $mod->save();
        //         if (isset($response->id)) {
        //             DB::table('papalergi_t')->where('norec', $item->norec)->update([
        //                 'ihs_id' => $response->id,
                        
        //             ]);
        //         }

              
        //     }
        // } catch (\Exception $e) {
        //     $response = array(
        //         "issue" => $e->getMessage() . ' ' . $e->getLine(),
        //         "resourceType" => "OperationOutcome"
        //     );
        // }
        if ($lokal == true) {
            return $response;
        }
        return response()->json($response);
    }
    public function ProcedureEdukasi(Request $request,  $lokal = null)
    {

      

        $kdProfile = $this->kdProfile;
       
        // try {
           
            // $q =[];
            // if (count($q) == 0) {
            //     $response = array(
            //         "issue" =>   'ClinicalImpression doesnt exist',
            //         "resourceType" => "OperationOutcome"
            //     );
            //     if ($lokal == true) {
            //         return $response;
            //     }
            //     return response()->json($response);
            // }
            $profile = Profile::where('id', $kdProfile)->first();
            // $displayFlag = '';
            // $arr_result_ob = [];
           
            // foreach ($q as $k =>  $item) {
                $response = array (
                    'resourceType' => 'Procedure',
                    'status' => 'completed',
                    'category' => 
                    array (
                      'coding' => 
                      array (
                        0 => 
                        array (
                          'system' => 'http://snomed.info/sct',
                          'code' => '409073007',
                          'display' => 'Education',
                        ),
                      ),
                      'text' => 'Education',
                    ),
                    'code' => 
                    array (
                      'coding' => 
                      array (
                        0 => 
                        array (
                          'system' => 'http://terminology.kemkes.go.id/CodeSystem/clinical-term',
                          'code' => 'ED000002',
                          'display' => 'Edukasi obat-obatan',
                        ),
                      ),
                    ),
                    'subject' => 
                    array (
                      'reference' => 'Patient/100000030009',
                      'display' => 'Budi Santoso',
                    ),
                    'encounter' => 
                    array (
                      'reference' => 'Encounter/2823ed1d-3e3e-434e-9a5b-9c579d192787',
                      'display' => 'Edukasi minum obat OAT rutin kepada Budi Santoso di hari Selasa, 14 Juni 2022',
                    ),
                    'performedPeriod' => 
                    array (
                      'start' => '2022-06-14T13:31:00+01:00',
                      'end' => '2022-06-14T14:27:00+01:00',
                    ),
                    'performer' => 
                    array (
                      0 => 
                      array (
                        'actor' => 
                        array (
                          'reference' => 'Practitioner/N10000001',
                          'display' => 'Dokter Bronsig',
                        ),
                      ),
                    ),
                    'reasonCode' => 
                    array (
                      0 => 
                      array (
                        'coding' => 
                        array (
                          0 => 
                          array (
                            'system' => 'http://hl7.org/fhir/sid/icd-10',
                            'code' => 'A15.0',
                            'display' => 'Tuberculosis of lung, confirmed by sputum microscopy with or without culture',
                          ),
                        ),
                      ),
                    ),
                    'note' => 
                    array (
                      0 => 
                      array (
                        'text' => 'Edukasi minum OAT teratur.',
                      ),
                    ),
                  );
         

        //         // if ($item->ihs_idforput == null) {
        //         unset($data['id']);
        //         // }

          
        //         $objetoRequest = new \Illuminate\Http\Request();
        //         $objetoRequest['url'] = $data['resourceType'];
        //         // $objetoRequest['method'] = $item->ihs_idforput == null ? 'POST' : 'PUT';
        //         $objetoRequest['method'] = 'POST';

        //         $objetoRequest['data'] = $data;

        //         $response =  $this->ihsTools($objetoRequest, true);

        //         $noterror = true;
        //         if ($response->resourceType == 'OperationOutcome') {
        //             $noterror = false;
        //         }

        //         if ($item->ihs_idforput == null) {
        //             $mod = new IHS_Transaction();
        //             $mod->norec = $mod->generateNewId();
        //             $mod->statusenabled = $noterror;
        //             $mod->kdprofile = $this->kdProfile;
        //         } else {
        //             $mod = IHS_Transaction::where('id', $item->ihs_idforput)->first();
        //         }
        //         if (empty($mod)) {
        //             $mod = new IHS_Transaction();
        //             $mod->norec = $mod->generateNewId();
        //             $mod->statusenabled = $noterror;
        //             $mod->kdprofile = $this->kdProfile;
        //         }
        //         $mod->resourcetype = $data['resourceType'];
        //         $mod->url =  $this->endPoint() . $data['resourceType'];
        //         $mod->method = 'POST';
        //         $mod->id = isset($response->id) ? $response->id : null;
        //         $mod->body = json_encode($data);
        //         $mod->response = json_encode($response);
        //         $mod->date = date('Y-m-d H:i:s');
        //         $mod->save();
        //         if (isset($response->id)) {
        //             DB::table('papalergi_t')->where('norec', $item->norec)->update([
        //                 'ihs_id' => $response->id,
                        
        //             ]);
        //         }

              
        //     }
        // } catch (\Exception $e) {
        //     $response = array(
        //         "issue" => $e->getMessage() . ' ' . $e->getLine(),
        //         "resourceType" => "OperationOutcome"
        //     );
        // }
        if ($lokal == true) {
            return $response;
        }
        return response()->json($response);
    }
    public function ConditionSaatMeninggalkanRS(Request $request,  $lokal = null)
    {

      

        $kdProfile = $this->kdProfile;
       
        // try {
           
            // $q =[];
            // if (count($q) == 0) {
            //     $response = array(
            //         "issue" =>   'ClinicalImpression doesnt exist',
            //         "resourceType" => "OperationOutcome"
            //     );
            //     if ($lokal == true) {
            //         return $response;
            //     }
            //     return response()->json($response);
            // }
            $profile = Profile::where('id', $kdProfile)->first();
            // $displayFlag = '';
            // $arr_result_ob = [];
           
            // foreach ($q as $k =>  $item) {
                $response = array (
                    'resourceType' => 'Condition',
                    'clinicalStatus' => 
                    array (
                      'coding' => 
                      array (
                        0 => 
                        array (
                          'system' => 'http://terminology.hl7.org/CodeSystem/condition-clinical',
                          'code' => 'active',
                          'display' => 'Active',
                        ),
                      ),
                    ),
                    'category' => 
                    array (
                      0 => 
                      array (
                        'coding' => 
                        array (
                          0 => 
                          array (
                            'system' => 'http://terminology.hl7.org/CodeSystem/condition-category',
                            'code' => 'problem-list-item',
                            'display' => 'Problem List Item',
                          ),
                        ),
                      ),
                    ),
                    'code' => 
                    array (
                      'coding' => 
                      array (
                        0 => 
                        array (
                          'system' => 'http://terminology.kemkes.go.id/CodeSystem/clinical-term',
                          'code' => 'MN000001',
                          'display' => 'Stabil',
                        ),
                      ),
                    ),
                    'subject' => 
                    array (
                      'reference' => 'Patient/100000030009',
                      'display' => 'Budi Santoso',
                    ),
                    'encounter' => 
                    array (
                      'reference' => 'Encounter/2823ed1d-3e3e-434e-9a5b-9c579d192787',
                      'display' => 'Kunjungan Budi Santoso di hari Selasa, 14 Juni 2022',
                    ),
                  );
         

        //         // if ($item->ihs_idforput == null) {
        //         unset($data['id']);
        //         // }

          
        //         $objetoRequest = new \Illuminate\Http\Request();
        //         $objetoRequest['url'] = $data['resourceType'];
        //         // $objetoRequest['method'] = $item->ihs_idforput == null ? 'POST' : 'PUT';
        //         $objetoRequest['method'] = 'POST';

        //         $objetoRequest['data'] = $data;

        //         $response =  $this->ihsTools($objetoRequest, true);

        //         $noterror = true;
        //         if ($response->resourceType == 'OperationOutcome') {
        //             $noterror = false;
        //         }

        //         if ($item->ihs_idforput == null) {
        //             $mod = new IHS_Transaction();
        //             $mod->norec = $mod->generateNewId();
        //             $mod->statusenabled = $noterror;
        //             $mod->kdprofile = $this->kdProfile;
        //         } else {
        //             $mod = IHS_Transaction::where('id', $item->ihs_idforput)->first();
        //         }
        //         if (empty($mod)) {
        //             $mod = new IHS_Transaction();
        //             $mod->norec = $mod->generateNewId();
        //             $mod->statusenabled = $noterror;
        //             $mod->kdprofile = $this->kdProfile;
        //         }
        //         $mod->resourcetype = $data['resourceType'];
        //         $mod->url =  $this->endPoint() . $data['resourceType'];
        //         $mod->method = 'POST';
        //         $mod->id = isset($response->id) ? $response->id : null;
        //         $mod->body = json_encode($data);
        //         $mod->response = json_encode($response);
        //         $mod->date = date('Y-m-d H:i:s');
        //         $mod->save();
        //         if (isset($response->id)) {
        //             DB::table('papalergi_t')->where('norec', $item->norec)->update([
        //                 'ihs_id' => $response->id,
                        
        //             ]);
        //         }

              
        //     }
        // } catch (\Exception $e) {
        //     $response = array(
        //         "issue" => $e->getMessage() . ' ' . $e->getLine(),
        //         "resourceType" => "OperationOutcome"
        //     );
        // }
        if ($lokal == true) {
            return $response;
        }
        return response()->json($response);
    }
    /**
     * Daftar data yang akan di-sync ke SATUSEHAT (tab "Sync Data" di IHS tools).
     * Route tetap: bridging/ihs/Encounter-list?dari=&sampai=&resourceType=
     * Key yang dikembalikan disesuaikan dengan parameter input tiap method resource di controller ini:
     *   noregistrasi : Encounter, Condition, Observation, Procedure, AllergyIntolerance, ClinicalImpression, QuestionnaireResponse
     *   noorder      : Composition, ServiceRequest, Specimen, MedicationRequest
     *   noresep      : MedicationDispense, MedicationStatement
     *   norec_hasil  : ObservationLab (hasillaboratorium_t.norec)
     *   norec_arr    : DiagnosticReport (kumpulan hasillaboratorium_t.norec per noorder)
     *   norec_op     : NutritionOrder
     *   norec        : CarePlan (antrianpasienregistrasi_t.norec)
     */
    public function EncounterList(Request $r)
    {
        switch ($r->resourceType) {
            case 'Encounter':
                return $this->listByRegistrasi($r);
                
            case 'QuestionnaireResponse':
                return $this->listQuestionnaireResponse($r);
            case 'Procedure':
                return $this->listProcedure($r);
            case 'ClinicalImpression':
                return $this->listClinicalImpression($r);
            case 'AllergyIntolerance':
                return $this->listAllergyIntolerance($r);
            case 'Condition':
                return $this->listCondition($r);
            case 'Composition':
                return $this->listComposition($r);
            case 'ServiceRequest':
                return $this->listServiceRequest($r);
            case 'Specimen':
                return $this->listSpecimen($r);
            case 'Observation':
                return $this->listObservation($r);
                
            case 'ObservationRad':
                return $this->listObservationRad($r);
            case 'ObservationLab':
                return $this->listObservationLab($r);
            case 'DiagnosticReport':
                return $this->listDiagnosticReport($r);
            case 'NutritionOrder':
                return $this->listNutritionOrder($r);
            case 'MedicationRequest':
                return $this->listMedicationRequest($r);
            case 'MedicationDispense':
                return $this->listMedicationDispense($r);
            case 'MedicationStatement':
                return $this->listMedicationStatement($r);
            case 'CarePlan':
                return $this->listCarePlan($r);
            case 'ImagingStudy':
                return $this->listImagingStudy($r);
            case 'Immunization':
                return $this->listImmunization($r);
            case 'EpisodeOfCare':
                return $this->listEpisodeOfCare($r);

            default:
                return response()->json([
                    'message' => 'ResourceType tidak dikenali'
                ], 400);
        }
    }

    private function rangeSync($r)
    {
        return [$r->dari . ' 00:00:00', $r->sampai . ' 23:59:59'];
    }

    // key: noregistrasi
    private function listByRegistrasi($r)
    {
        return DB::table('pasiendaftar_t')
            ->where('kdprofile', $this->kdProfile)
            ->where('statusenabled', true)
            ->whereBetween('tglregistrasi', $this->rangeSync($r))
            ->select('noregistrasi', 'tglregistrasi')
            ->orderBy('tglregistrasi')
            ->limit(1500)
            ->get();
    }
    
    private function listQuestionnaireResponse($r)
    {
        return DB::table('antrianpasiendiperiksa_t as aa')
            ->join('pasiendaftar_t as pd', function ($join) {
                $join->on('pd.norec', '=', 'aa.noregistrasifk')
                    ->on('aa.objectruanganfk', '=', 'pd.objectruanganlastfk');
            })
            ->join('pasien_m as ps', 'ps.id', '=', 'pd.nocmfk')
            ->leftJoin('pegawai_m as pg', 'pg.id', '=', 'pd.objectpegawaifk')
            ->where('aa.kdprofile', $this->kdProfile)
            ->where('pd.statusenabled', true)
            ->whereNotNull('pd.ihs_id')
            ->whereNotNull('pg.ihs_id')
            ->whereBetween('pd.tglregistrasi', $this->rangeSync($r))
            ->select(
                'aa.*',
                'aa.ihs_id as ihs_questionnaire_response',
                'pd.ihs_id as ihs_encounter',
                'ps.ihs_number as ihs_pasien',
                'ps.namapasien',
                'pd.noregistrasi',
                'pg.ihs_id as ihs_practitioner',
                'pg.namalengkap as dokter',
                'aa.tglmasuk as tanggal'
            )
            ->orderBy('aa.tglmasuk', 'desc')
            ->limit(1500)
            ->get();
    }
    
    private function listAllergyIntolerance($r)
    {
        list($dari, $sampai) = $this->rangeSync($r);

       
        return DB::table('pasiendaftar_t as pap')
            ->join('pasien_m as ps', 'pap.nocmfk', '=', 'ps.id')
            ->join('pegawai_m as pg', 'pap.objectpegawaifk', '=', 'pg.id')
            ->join('emrpasien_t as emr', 'emr.noregistrasifk', '=', 'pap.noregistrasi')
            ->join('emrpasiend_t as emrd', 'emrd.emrpasienfk', '=', 'emr.noemr')
            ->where('pap.kdprofile', $this->kdProfile)
            ->where('pap.statusenabled', true)
            ->whereBetween('pap.tglregistrasi', array($dari, $sampai))
            ->whereIn('emrd.emrdfk',['422047','422246'])
            ->whereNotNull('emrd.value')
            ->whereRaw("TRIM(CAST(emrd.value AS TEXT)) <> ''")
            ->whereNotNull('ps.ihs_number')
            ->whereRaw("TRIM(CAST(ps.ihs_number AS TEXT)) <> ''")
            ->whereNotNull('pap.ihs_id')
            ->whereNotNull('emrd.ihs_allergyintolerance')
            
            ->whereRaw("TRIM(CAST(pap.ihs_id AS TEXT)) <> ''")
            ->where(function ($query) {
                $query->whereNull('emrd.ihs_id')
                    ->orWhereRaw("TRIM(CAST(emrd.ihs_id AS TEXT)) = ''");
            })
            ->select(
                'emrd.value as namaalergi',
                'emrd.tgl as tglinput',
                'emrd.norec',
                DB::raw("CONCAT('input alergi ', emrd.value) as keterangandata"),
                'pg.namalengkap',
                'ps.namapasien as given',
                'emrd.ihs_id as ihs_idforput',
                'ps.ihs_number as ihs_pasien',
                'pap.ihs_id as ihs_encounter',
                'pap.tglregistrasi',
                'pg.ihs_id as ihs_practitioner',
                DB::raw("'404684003' as kodesnomed"),
                DB::raw("'medication' as kategori"),
                'pap.noregistrasi'
            )
            ->orderBy('pap.tglregistrasi', 'asc')
            ->orderBy('emrd.tgl', 'asc')
            ->limit(1500)
            ->get();

    }
    
    private function listProcedure($r)
    {
        $range = $this->rangeSync($r);

        return DB::table('pasiendaftar_t as pd')
            ->join('antrianpasiendiperiksa_t as apd', 'apd.noregistrasifk', '=', 'pd.norec')
            ->join('diagnosatindakanpasien_t as dtp', 'dtp.objectpasienfk', '=', 'apd.norec')
            ->join('detaildiagnosatindakanpasien_t as ddt', 'ddt.objectdiagnosatindakanpasienfk', '=', 'dtp.norec')
            ->join('diagnosatindakan_m as dt', 'dt.id', '=', 'ddt.objectdiagnosatindakanfk')
            ->where('pd.kdprofile', $this->kdProfile)
            ->where('pd.statusenabled', true)
            ->whereBetween('pd.tglregistrasi', $range)
            ->whereNotNull('ddt.norec')
            ->whereNotNull('pd.ihs_id')
            ->select(
                'pd.noregistrasi',
                'pd.tglregistrasi'
            )
            ->distinct()
            ->orderBy('pd.tglregistrasi', 'asc')
            ->limit(1500)
            ->get();
    }
    private function listClinicalImpression($r)
    {
        list($dari, $sampai) = $this->rangeSync($r);

        return DB::table('pasiendaftar_t as pd')
            ->join('pasien_m as ps', 'ps.id', '=', 'pd.nocmfk')
            ->where('pd.kdprofile', $this->kdProfile)
            ->where('pd.statusenabled', true)
            ->whereBetween('pd.tglregistrasi', array($dari, $sampai))
            // ->whereNotNull('pd.prognosis')
            // ->whereRaw("TRIM(pd.prognosis) <> ''")
            ->whereNotNull('pd.tglpulang')
            ->whereNotNull('ps.ihs_number')
            ->whereRaw("TRIM(ps.ihs_number) <> ''")
            ->whereNotNull('pd.ihs_id')
            ->whereRaw("TRIM(pd.ihs_id) <> ''")
            ->where(function ($query) {
                $query->whereNull('pd.ihs_clinicalimpression')
                    ->orWhereRaw("TRIM(pd.ihs_clinicalimpression) = ''");
            })
            ->select(
                'pd.noregistrasi',
                'pd.tglregistrasi'
            )
            ->orderBy('pd.tglregistrasi', 'asc')
            ->limit(1500)
            ->get();
    }
    
    private function listCondition($r)
    {
        $range = $this->rangeSync($r);

        return DB::table('pasiendaftar_t as pd')
            ->join('pasien_m as ps', 'ps.id', '=', 'pd.nocmfk')
            ->join('antrianpasiendiperiksa_t as apd', 'apd.noregistrasifk', '=', 'pd.norec')
            ->join('detaildiagnosapasien_t as ddp', 'ddp.noregistrasifk', '=', 'apd.norec')
            ->join('diagnosa_m as dg', 'dg.id', '=', 'ddp.objectdiagnosafk')
            ->where('pd.kdprofile', $this->kdProfile)
            ->where('pd.statusenabled', true)
            ->whereNotNull('ddp.norec')
            ->whereBetween('pd.tglregistrasi', $range)
            ->select(
                'pd.noregistrasi',
                'pd.tglregistrasi'
            )
            ->distinct()
            ->orderBy('pd.tglregistrasi', 'asc')
            ->limit(1500)
            ->get();
    }

    // key: noorder (satu baris per item order gizi yang belum punya ihs_id, sesuai Composition() yang LIMIT 1 per panggilan)
    private function listComposition($r)
    {
        list($dari, $sampai) = $this->rangeSync($r);
        return collect(DB::select("
            SELECT
                so.noorder,
                op.norec AS norec_op,
                pd.noregistrasi,
                so.tglorder
            FROM orderpelayanan_t AS op
            INNER JOIN pasiendaftar_t AS pd ON pd.norec = op.noregistrasifk
            INNER JOIN pasien_m AS ps ON ps.id = op.nocmfk
            INNER JOIN strukorder_t AS so ON so.norec = op.strukorderfk
            INNER JOIN pegawai_m AS pg ON pg.id = pd.objectpegawaifk
            INNER JOIN kategorydiet_m AS kd ON kd.id = op.objectkategorydietfk
            WHERE so.kdprofile = ?
            AND so.statusenabled = true
            AND op.ihs_composition IS NULL
            AND so.tglorder BETWEEN ? AND ?
            and pd.ihs_id is not null
            and pg.ihs_id is not null
            ORDER BY so.noorder ASC
            limit 1500
        ", [$this->kdProfile, $dari, $sampai]));
    }

    // key: noorder
    private function listServiceRequest($r)
    {
        list($dari, $sampai) = $this->rangeSync($r);
        return collect(DB::select("
            SELECT
                so.noorder,
                MIN(so.tglorder) AS tglorder
            FROM strukorder_t AS so
            INNER JOIN orderpelayanan_t AS op ON op.strukorderfk = so.norec
            INNER JOIN pasiendaftar_t AS pd ON pd.norec = so.noregistrasifk
            INNER JOIN produk_m AS pr ON pr.id = op.objectprodukfk
            WHERE pd.kdprofile = ?
            AND so.statusenabled = true
            AND so.objectkelompoktransaksifk IN (93, 94)
            AND pd.tglregistrasi BETWEEN ? AND ?
            and pd.ihs_id is not null
            and pr.ihs_loinc_id is not null
            GROUP BY so.noorder
            ORDER BY MIN(so.tglorder)
            limit 1500
        ", [$this->kdProfile, $dari, $sampai]));
    }
                
    private function listObservation($r)
    {
        $range = $this->rangeSync($r);

        return DB::table('emrpasien_t as emrp')
            ->join('emrpasiend_t as emrdp', 'emrdp.emrpasienfk', '=', 'emrp.noemr')
            ->join('pasiendaftar_t as pd', 'pd.noregistrasi', '=', 'emrp.noregistrasifk')
            ->join('pegawai_m as pg', 'pg.id', '=', 'pd.objectpegawaifk')
            ->where('emrp.kdprofile', $this->kdProfile)
            ->where('emrdp.statusenabled', true)
            ->where('emrp.statusenabled', true)
            ->where('pd.statusenabled', true)
            ->whereNotNull('pg.ihs_id')
            ->whereNotNull('pd.ihs_id')
            ->whereBetween('pd.tglregistrasi', $range)
            ->whereIn('emrdp.emrdfk', array(
                4241, // Tekanan darah
                4242, // Tinggi badan
                4243, // Berat badan
                4244, // Suhu tubuh
                4245, // Nadi
                4246  // Frekuensi napas
            ))
            ->select(
                'pd.noregistrasi',
                'pd.tglregistrasi'
            )
            ->distinct()
            ->orderBy('pd.tglregistrasi', 'asc')
            ->limit(1500)
            ->get();
    }
    // key: noorder (hanya produk yang punya LOINC)
    private function listSpecimen($r)
    {
        list($dari, $sampai) = $this->rangeSync($r);
        return collect(DB::select("
            SELECT
                so.noorder,
                MIN(so.tglorder) AS tglorder
            FROM strukorder_t AS so
            INNER JOIN orderpelayanan_t AS op ON op.strukorderfk = so.norec
            INNER JOIN pasiendaftar_t AS pd ON pd.norec = so.noregistrasifk
            INNER JOIN produk_m AS pr ON pr.id = op.objectprodukfk
            WHERE pd.kdprofile = ?
            AND so.statusenabled = true
            AND pr.ihs_loinc_id IS NOT NULL
            AND so.tglorder BETWEEN ? AND ?
            GROUP BY so.noorder
            ORDER BY MIN(so.tglorder)
        ", [$this->kdProfile, $dari, $sampai]));
    }

    private function listObservationLab($r)
    {
        list($dari, $sampai) = $this->rangeSync($r);

        return collect(DB::select("
            SELECT DISTINCT
                st.noorder,
                pd.tglregistrasi
            FROM pasiendaftar_t AS pd
            INNER JOIN strukorder_t AS st
                ON st.noregistrasifk = pd.norec
            INNER JOIN pasien_m AS ps
                ON ps.id = pd.nocmfk
            INNER JOIN orderpelayanan_t AS op
                ON op.strukorderfk = st.norec
            INNER JOIN produk_m AS pr
                ON pr.id = op.objectprodukfk
            WHERE st.kdprofile = ?
                AND st.statusenabled = TRUE
                AND st.keteranganorder = 'Order Laboratorium'
                AND st.objectkelompoktransaksifk = 93
                AND pd.statusenabled = TRUE
                AND pd.ihs_id IS NOT NULL
                AND ps.ihs_number IS NOT NULL
                AND pr.ihs_loinc_id IS NOT NULL
                AND pd.tglregistrasi BETWEEN ? AND ?
                AND EXISTS (
                    SELECT 1
                    FROM hasillaboratorium_t AS hpl
                    INNER JOIN antrianpasiendiperiksa_t AS apd
                        ON apd.norec = hpl.noregistrasifk
                    INNER JOIN produk_m AS prh
                        ON prh.id = hpl.produkfk
                    WHERE apd.noregistrasifk = pd.norec
                        AND hpl.kdprofile = ?
                        AND hpl.statusenabled = TRUE
                        AND prh.ihs_loinc_id IS NOT NULL
                )
            ORDER BY pd.tglregistrasi ASC
            LIMIT 1500
        ", array(
            $this->kdProfile,
            $dari,
            $sampai,
            $this->kdProfile
        )));
    }


    private function listObservationRad($r)
    {
        list($dari, $sampai) = $this->rangeSync($r);

        return collect(DB::select("
            SELECT DISTINCT
                ro.norec,
                ro.order_no AS noorder,
                pd.tglregistrasi
            FROM ris_order AS ro
            INNER JOIN strukorder_t AS st
                ON st.noorder = ro.order_no
            INNER JOIN antrianpasiendiperiksa_t AS apd
                ON apd.objectstrukorderfk = st.norec
            INNER JOIN pasiendaftar_t AS pd
                ON pd.norec = apd.noregistrasifk
            WHERE st.kdprofile = ?
                AND pd.ihs_id IS NOT NULL
                AND ro.ihs_observation IS NULL
                AND pd.tglregistrasi BETWEEN ? AND ?
               
            ORDER BY pd.tglregistrasi ASC
            
            
        ", array($this->kdProfile, $dari, $sampai)));
    }

    /**
     * Mengambil order laboratorium dan radiologi yang Observation-nya
     * sudah terkirim, tetapi DiagnosticReport-nya belum terkirim.
     *
     * Hasil berisi:
     * - jenis: lab / rad
     * - noorder
     * - tglregistrasi
     * - norec_arr: daftar norec sumber untuk DiagnosticReport
     */
    private function listDiagnosticReport($r)
    {
        list($dari, $sampai) = $this->rangeSync($r);

        $rows = DB::select("
            SELECT
                'lab' AS jenis,
                st.noorder,
                MIN(pd.tglregistrasi) AS tglregistrasi,
                STRING_AGG(DISTINCT hpl.norec::text, ',') AS norec_list
            FROM hasillaboratorium_t AS hpl
            LEFT JOIN antrianpasiendiperiksa_t AS apd
                ON apd.norec = hpl.noregistrasifk
            LEFT JOIN pasiendaftar_t AS pd
                ON pd.norec = apd.noregistrasifk
            LEFT JOIN produk_m AS pr
                ON pr.id = hpl.produkfk
            LEFT JOIN strukorder_t AS st
                ON st.noregistrasifk = pd.norec
            LEFT JOIN pasien_m AS ps
                ON ps.id = pd.nocmfk
            WHERE hpl.kdprofile = ?
                AND hpl.statusenabled = TRUE
                AND st.kdprofile = ?
                AND st.statusenabled = TRUE
                AND st.keteranganorder = 'Order Laboratorium'
                AND st.objectkelompoktransaksifk IN (93, 94)
                AND pd.statusenabled = TRUE
                AND pd.ihs_id IS NOT NULL
                AND ps.ihs_number IS NOT NULL
                AND pr.ihs_loinc_id IS NOT NULL
                AND hpl.ihs_observation IS NOT NULL
                AND pd.tglregistrasi BETWEEN ? AND ?
            GROUP BY st.noorder

            UNION ALL

            SELECT
                'rad' AS jenis,
                ro.order_no AS noorder,
                MIN(pd.tglregistrasi) AS tglregistrasi,
                STRING_AGG(DISTINCT ro.norec::text, ',') AS norec_list
            FROM ris_order AS ro
            INNER JOIN strukorder_t AS st
                ON st.noorder = ro.order_no
            INNER JOIN pasiendaftar_t AS pd
                ON pd.norec = st.noregistrasifk
            WHERE st.kdprofile = ?
                AND st.statusenabled = TRUE
                AND pd.ihs_id IS NOT NULL
                AND ro.ihs_observation IS NOT NULL
                AND ro.ihs_observation <> ''
                AND ro.ihs_diagnosticreport IS NULL
                AND pd.tglregistrasi BETWEEN ? AND ?
            GROUP BY ro.order_no

            ORDER BY tglregistrasi ASC
            LIMIT 1500
        ", array(
            $this->kdProfile,
            $this->kdProfile,
            $dari,
            $sampai,
            $this->kdProfile,
            $dari,
            $sampai
        ));

        foreach ($rows as $row) {
            $row->norec_arr = !empty($row->norec_list)
                ? explode(',', $row->norec_list)
                : array();

            unset($row->norec_list);
        }

        return collect($rows);
    }
    
    // key: norec_op
    private function listNutritionOrder($r)
    {
        list($dari, $sampai) = $this->rangeSync($r);
        return collect(DB::select("
            SELECT
                op.norec AS norec_op,
                so.noorder,
                so.tglorder
            FROM orderpelayanan_t AS op
            INNER JOIN pasiendaftar_t AS pd ON pd.norec = op.noregistrasifk
            INNER JOIN pegawai_m AS pg ON pg.id = pd.objectpegawaifk
            INNER JOIN strukorder_t AS so ON so.norec = op.strukorderfk
            INNER JOIN kategorydiet_m AS kd ON kd.id = op.objectkategorydietfk
            WHERE so.kdprofile = ?
            AND so.statusenabled = true
            AND op.statusenabled = true
            AND so.objectkelompoktransaksifk = 8
            AND so.tglorder BETWEEN ? AND ?
            and pd.ihs_id is not null
            and pg.ihs_id is not null
            ORDER BY so.tglorder ASC
            limit 1500
        ", [$this->kdProfile, $dari, $sampai]));
    }

    // key: noorder (order farmasi)
    private function listMedicationRequest($r)
    {
        list($dari, $sampai) = $this->rangeSync($r);
        return collect(DB::select("
            SELECT
                so.noorder,
                MIN(so.tglorder) AS tglorder
            FROM strukorder_t AS so
            INNER JOIN orderpelayanan_t AS op ON op.strukorderfk = so.norec
            INNER JOIN pasiendaftar_t AS pd ON pd.norec = so.noregistrasifk
            INNER JOIN produk_m AS pr ON op.objectprodukfk = pr.id
            WHERE so.statusenabled = true
            AND so.kdprofile = ?
            AND pd.kdprofile = ?
            AND pd.statusenabled = true
            AND so.keteranganorder = 'Order Farmasi'
            AND so.tglorder BETWEEN ? AND ?
            AND pr.ihs_id is not null
            AND pr.ihs_kfa_code is not null
            GROUP BY so.noorder
            ORDER BY MIN(so.tglorder)
            
        ", [$this->kdProfile, $this->kdProfile, $dari, $sampai]));
    }

    // key: noresep (hanya resep yang MedicationRequest-nya sudah punya ihs_id)
    private function listMedicationDispense($r)
    {
        list($dari, $sampai) = $this->rangeSync($r);
        return collect(DB::select("
            SELECT
                sr.noresep,
                MIN(sr.tglresep) AS tglresep
            FROM strukresep_t AS sr
            INNER JOIN pelayananpasien_t AS pp ON pp.strukresepfk = sr.norec
            INNER JOIN antrianpasiendiperiksa_t AS apd ON apd.norec = pp.noregistrasifk
            INNER JOIN pasiendaftar_t AS pd ON pd.norec = apd.noregistrasifk
            INNER JOIN orderpelayanan_t AS op ON op.strukorderfk = sr.orderfk AND op.objectprodukfk = pp.produkfk
            WHERE sr.kdprofile = ?
            AND pd.kdprofile = ?
            AND sr.statusenabled = true
            AND pd.statusenabled = true
            AND op.ihs_id IS NOT NULL
            AND sr.tglresep BETWEEN ? AND ?
            GROUP BY sr.noresep
            ORDER BY MIN(sr.tglresep)
        ", [$this->kdProfile, $this->kdProfile, $dari, $sampai]));
    }

    // key: noresep (hanya obat yang sudah punya ihs_id di produk_m)
    private function listMedicationStatement($r)
    {
        list($dari, $sampai) = $this->rangeSync($r);
        return collect(DB::select("
            SELECT
                sr.noresep,
                MIN(pp.tglpelayanan) AS tglpelayanan
            FROM strukresep_t AS sr
            INNER JOIN pelayananpasien_t AS pp ON pp.strukresepfk = sr.norec
            INNER JOIN produk_m AS pr ON pr.id = pp.produkfk
            INNER JOIN antrianpasiendiperiksa_t AS apd ON apd.norec = pp.noregistrasifk
            INNER JOIN pasiendaftar_t AS pd ON pd.norec = apd.noregistrasifk
            WHERE sr.kdprofile = ?
            AND sr.statusenabled = true
            AND pd.statusenabled = true
            AND pr.ihs_id IS NOT NULL
            AND pd.ihs_id IS NOT NULL
            AND pp.tglpelayanan BETWEEN ? AND ?
            GROUP BY sr.noresep
            ORDER BY MIN(pp.tglpelayanan)
            limit 1500
        ", [$this->kdProfile, $dari, $sampai]));
    }
    // key: norec (antrianpasienregistrasi_t.norec, sesuai CarePlan())
    private function listCarePlan($r)
    {
        list($dari, $sampai) = $this->rangeSync($r);
        return collect(DB::select("
           SELECT
                pp.nosuratkontrol,
                pp.ihs_id AS ihs_srfup,
                pp.ihs_careplan,
                pp.nosuratkontrol AS noperjanjian,
                pp.nosepasalkontrol AS keterangan,
                ru.ihs_id AS ihs_location_id,
                ru.namaruangan AS ihs_location_name,
                pg.ihs_id AS ihs_practioner_id,
                pg.namalengkap AS ihs_practioner_name,
                ps.ihs_number AS ihs_pasien_id,
                ps.ihs_number,
                ps.namapasien AS ihs_pasien_name,
                ps.namapasien,
                pd.ihs_id AS ihs_encounter,
                pd.tglregistrasi,
                ps.noidentitas,
                pp.tglrencanakontrol
            FROM pasiendaftar_t AS pd
            INNER JOIN bpjsrencanakontrol_t AS pp
                ON pp.norec_pd = pd.norec
            AND pp.kdprofile = ?
            AND pp.nosuratkontrol IS NOT NULL
            INNER JOIN ruangan_m AS ru ON ru.id = pd.objectruanganlastfk
            INNER JOIN pegawai_m AS pg ON pg.kddokterbpjs = CASE
                    WHEN TRIM(pp.kodedokter) ~ '^[0-9]+$'
                    THEN TRIM(pp.kodedokter)::integer
                END
            INNER JOIN pasien_m AS ps ON ps.id = pd.nocmfk
            WHERE pd.tglregistrasi BETWEEN ? AND ?
            AND pp.ihs_careplan is null
            and pd.ihs_id is not null
            and pg.ihs_id is not null
            ORDER BY pd.tglregistrasi ASC
            limit 1500
            ; 
        ", [$this->kdProfile, $dari, $sampai]));
    }

    private function listImagingStudy($r)
    {
        return collect(DB::select("
            SELECT
                pd.noregistrasi,
                so.noorder,
                so.tglorder,
                pr.namaproduk,
                op.objectprodukfk,
                pr.ihs_loinc_id,
                pr.ihs_loinc_common_name,
                ps.ihs_number AS ihs_pasien,
                ps.namapasien,
                pd.ihs_id AS ihs_encounter,
                pg.ihs_id AS ihs_practitioner,
                pg.namalengkap AS dokterorder,
                ru.namaruangan,
                ru.ihs_id AS ihs_ruangan,
                so.keteranganlainnya,
                pg2.ihs_id AS ihs_performer,
                pg2.namalengkap AS nama_performer,
                op.ihs_id AS ihs_idforput,
                ro.ihs_imagingstudy,
                op.norec,
                ro.accession_num,
                ro.order_modality,
                ro.order_status,
                ro.study_remark
            FROM strukorder_t AS so
            INNER JOIN orderpelayanan_t AS op
                ON op.strukorderfk = so.norec
            INNER JOIN pasiendaftar_t AS pd
                ON pd.norec = so.noregistrasifk
            INNER JOIN produk_m AS pr
                ON pr.id = op.objectprodukfk
            INNER JOIN pasien_m AS ps
                ON ps.id = pd.nocmfk
            INNER JOIN pegawai_m AS pg
                ON pg.id = so.objectpegawaiorderfk
            INNER JOIN ruangan_m AS ru
                ON ru.id = so.objectruanganfk
            LEFT JOIN pegawai_m AS pg2
                ON pg2.id = pd.objectpegawaifk
            left JOIN ris_order AS ro
                ON ro.norec_op_fk = op.norec
            WHERE pd.kdprofile = 39
                AND so.objectkelompoktransaksifk = 94
                AND so.statusenabled = TRUE
                AND pd.tglregistrasi BETWEEN ? AND ?
                AND ps.ihs_number IS NOT NULL
                AND ro.ihs_imagingstudy IS NULL
                and pd.ihs_id is not null
                and pg2.ihs_id is not null
                and pg.ihs_id is not null
                and op.ihs_id is not null
            ORDER BY so.tglorder ASC
            limit 1500
        ", [
            $r->dari . ' 00:00:00',
            $r->sampai . ' 23:59:59'
        ]));
    }

    private function listImmunization($r)
{
    $kdProfile = (int) $this->kdProfile;

    return collect(DB::select("
        SELECT
            pp.norec,
            pp.ihs_id,
            pp.produkfk,
            pd.noregistrasi,
            pd.tglregistrasi AS tglpelayanan,
            pp.tglpelayanan AS expiration_date,
            pro.ihs_kfa_code,
            pro.namaproduk,
            ps.ihs_number AS ihs_pasien,
            ps.namapasien,
            pd.ihs_id AS ihs_encounter,
            pg.ihs_id AS ihs_practitioner,
            pg.namalengkap AS nama_practitioner,
            ru.namaruangan,
            ru.ihs_id AS ihs_location
        FROM pelayananpasien_t AS pp
        INNER JOIN antrianpasiendiperiksa_t AS apd
            ON apd.norec = pp.noregistrasifk
        INNER JOIN pasiendaftar_t AS pd
            ON pd.norec = apd.noregistrasifk
        INNER JOIN produk_m AS pro
            ON pro.id = pp.produkfk
        INNER JOIN ruangan_m AS ru
            ON ru.id = pd.objectruanganlastfk
        INNER JOIN pasien_m AS ps
            ON ps.id = pd.nocmfk
        LEFT JOIN pegawai_m AS pg
            ON pg.id = pd.objectpegawaifk
        WHERE pp.kdprofile = ?
            AND pro.statusenabled = TRUE
            AND pd.tglregistrasi BETWEEN ? AND ?
            AND ps.tgllahir IS NOT NULL
            AND ps.tgllahir > (
                pd.tglregistrasi::date - INTERVAL '6 months'
            )
            AND ps.tgllahir <= pd.tglregistrasi::date
            AND ps.ihs_number IS NOT NULL
            AND pd.ihs_id IS NOT NULL
            AND pro.ihs_kfa_code IS NOT NULL
            AND pp.isobat IS NOT NULL
            AND pp.ihs_id IS NULL
        ORDER BY pp.tglpelayanan ASC, pp.norec ASC
        LIMIT 1500
    ", array(
        $kdProfile,
        $r->dari . ' 00:00:00',
        $r->sampai . ' 23:59:59'
    )));
}

    private function listEpisodeOfCare($r)
    {
        $kdProfile = (int) $this->kdProfile;

        return collect(DB::select("
            SELECT
                pp.norec,
                pp.ihs_id,
                pp.produkfk,
                pd.noregistrasi,
                pd.tglregistrasi AS tglpelayanan,
                pp.tglpelayanan AS expiration_date,
                pro.ihs_kfa_code,
                pro.namaproduk,
                ps.ihs_number AS ihs_pasien,
                ps.namapasien,
                pd.ihs_id AS ihs_encounter,
                pg.ihs_id AS ihs_practitioner,
                pg.namalengkap AS nama_practitioner,
                ru.namaruangan,
                ru.ihs_id AS ihs_location,
                CASE
                    WHEN ru.objectdepartemenfk = 16 THEN 'IMP'
                    ELSE 'AMB'
                END AS code_class,
                pg.noidentitas AS nik_dokter,
                pd.tglpulang,
                pro_profile.ihs_id AS ihs_service_provider,
                pd.ihs_condition,
                pd.ihs_in_progress,
                pd.ihs_finished,
                stt.statuspulang
            FROM pasiendaftar_t AS pd
            INNER JOIN pasien_m AS ps
                ON ps.id = pd.nocmfk
            INNER JOIN ruangan_m AS ru
                ON ru.id = pd.objectruanganlastfk
            INNER JOIN profile_m AS pro_profile
                ON pro_profile.id = pd.kdprofile
            INNER JOIN antrianpasiendiperiksa_t AS apd
                ON apd.noregistrasifk = pd.norec
            INNER JOIN pelayananpasien_t AS pp
                ON pp.noregistrasifk = apd.norec
            INNER JOIN produk_m AS pro
                ON pro.id = pp.produkfk
            LEFT JOIN pegawai_m AS pg
                ON pg.id = pd.objectpegawaifk
            LEFT JOIN statuspulang_m AS stt
                ON stt.id = pd.objectstatuspulangfk
            WHERE pd.kdprofile = ?
                AND pd.tglregistrasi BETWEEN ? AND ?
                AND pro.statusenabled = TRUE
                AND ps.ihs_number IS NOT NULL
                AND pd.ihs_id IS NOT NULL
                AND pro.ihs_kfa_code IS NOT NULL
                and ru.id in ('797','784')
                AND pp.isobat IS NOT NULL
                AND pp.ihs_id IS NULL
            ORDER BY pd.tglregistrasi ASC, pp.tglpelayanan ASC, pp.norec ASC
            LIMIT 1500
        ", [
            $kdProfile,
            $r->dari . ' 00:00:00',
            $r->sampai . ' 23:59:59'
        ]));
    }



}