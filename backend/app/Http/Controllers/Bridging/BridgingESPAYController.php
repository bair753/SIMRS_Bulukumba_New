<?php

namespace App\Http\Controllers\Bridging;

use App\Http\Controllers\ApiController;
use App\Master\LoginPasien;
use App\Transaksi\VirtualAccount;
use Illuminate\Http\Request;
use App\Traits\PelayananPasienTrait;
use DB;
use App\Traits\Valet;
use Carbon\Carbon;
use Webpatser\Uuid\Uuid;
use App\Transaksi\StrukBuktiPenerimaan;
use App\Transaksi\StrukBuktiPenerimaanCaraBayar;
use App\Transaksi\StrukOrder;
use App\Transaksi\StrukPelayanan;
use App\User;
use App\Web\Profile;
use Illuminate\Support\Facades\Storage;

class BridgingESPAYController extends ApiController
{

    use Valet, PelayananPasienTrait;

    protected $request;

    public function __construct()
    {
        parent::__construct($skip_authentication = true);
    }

    protected function getKdProfile()
    {
        $profile =  Profile::where('statusenabled', true)->first();
        return $profile->id;
    }

    public function signature($mode, $data) 
    {
        $signature_key = $this->settingDataFixed('Signature_ESPAY', $this->getKdProfile());
        $cmm_code = $this->settingDataFixed('MerchantCode_ESPAY', $this->getKdProfile());
        $key = $this->settingDataFixed('APIKey_ESPAY', $this->getKdProfile());
        switch ($mode) {
            case 'SENDINVOICE':
                // ##KEY##rq_uuid##rq_datetime##order_id##Amount##Ccy##Comm_code##SENDINVOICE##
                $uppercase = strtoupper('##'.$signature_key.'##'.$data['rq_uuid'].'##'.$data['rq_datetime'].'##'.$data['order_id'].'##'.$data['amount'].'##IDR##'.$cmm_code.'##SENDINVOICE##');
                break;
            case 'CLOSEDINVOICE':
                // ##KEY##rq_uuid##rq_datetime##order_id##Comm_code##Mode##
                $uppercase = strtoupper('##'.$signature_key.'##'.$data['rq_uuid'].'##'.$data['rq_datetime'].'##'.$data['order_id'].'##'.$cmm_code.'##CLOSEDINVOICE##');
                break;
            default:
                // ##KEY##rq_datetime##order_id##mode##
                $uppercase = strtoupper('##'.$signature_key.'##'.$data['rq_datetime'].'##'.$data['order_id'].'##'.$mode.'##');
                break;
        }
        $signature = hash('sha256', $uppercase);
        return $signature;
    }

    public function sendInvoice(Request $request) 
    {   
        $cmm_code = $this->settingDataFixed('MerchantCode_ESPAY', $this->getKdProfile());
        $data = $request->all();
        $dataSend = array (
            'rq_uuid' => substr(Uuid::generate(), 0, 36),//$data['rq_uuid'],
            'rq_datetime' => $data['rq_datetime'],
            'order_id' => $data['order_id'],
            'amount' => $data['amount'],
            'ccy' => $data['ccy'],
            'comm_code' => $cmm_code,
            'remark1' => $data['remark1'],
            'remark2' => $data['remark2'],
            'remark3' => $data['remark3'],
            'update' => $data['update'],
            'bank_code' => '',//$data['bank_code'],
            'va_expired' => $data['va_expired'],
        );
        $signature = $this->signature('SENDINVOICE', $dataSend);
        $dataSend['signature'] = $signature;
        $xurldata = http_build_query($dataSend);
        $response = $this->sendApi($xurldata, '/rest/merchantpg/sendinvoice');
        return $this->respond($response);
    }

    public function sendApi($xform, $endpoint) 
    {
        $curl = curl_init();

        $host = $this->settingDataFixed('Host_ESPAY', $this->getKdProfile());
        $baseUrl = $this->settingDataFixed('Url_ESPAY', $this->getKdProfile());
        $header = array(
        'Host: '. $host,
        'Connection: keep-alive',
        'Content-Type: application/x-www-form-urlencoded',
        'Accept: */*',
        );
        curl_setopt_array($curl, array(
        CURLOPT_URL => $baseUrl.$endpoint,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => $xform,
        CURLOPT_HTTPHEADER => $header,
        ));

        $response = curl_exec($curl);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);
        
        if ($err) {
            $result = array(
                'metaData' => array(
                    'code' => 400,
                    'message' => 'Maaf terjadi kesalahan saat mengirim data.'. $err
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
}
