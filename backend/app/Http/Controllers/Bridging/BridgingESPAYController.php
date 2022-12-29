<?php

namespace App\Http\Controllers\Bridging;

use App\Http\Controllers\ApiController;
use App\Master\LoginPasien;
use App\Transaksi\PaymentEspay;
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
use Illuminate\Support\Arr;

class BridgingESPAYController extends ApiController
{

    use Valet, PelayananPasienTrait;

    protected $request;
    protected $signature_key;
    protected $cmm_code;
    protected $key;
    protected $password;

    public function __construct()
    {
        parent::__construct($skip_authentication = true);

        $this->signature_key = $this->settingDataFixed('Signature_ESPAY', $this->getKdProfile());
        $this->cmm_code = $this->settingDataFixed('MerchantCode_ESPAY', $this->getKdProfile());
        $this->key = $this->settingDataFixed('APIKey_ESPAY', $this->getKdProfile());
        $this->password = $this->settingDataFixed('Password_ESPAY', $this->getKdProfile());
    }

    protected function getKdProfile()
    {
        $profile =  Profile::where('statusenabled', true)->first();
        return $profile->id;
    }

    public function signature($mode, $data) 
    {
        switch ($mode) {
            case 'SENDINVOICE':
                $uppercase = strtoupper('##'.$this->signature_key.'##'.$data['rq_uuid'].'##'.$data['rq_datetime'].'##'.$data['order_id'].'##'.$data['amount'].'##IDR##'.$this->cmm_code.'##SENDINVOICE##');
                break;
            case 'CLOSEDINVOICE':
                $uppercase = strtoupper('##'.$this->signature_key.'##'.$data['rq_uuid'].'##'.$data['rq_datetime'].'##'.$data['order_id'].'##'.$this->cmm_code.'##CLOSEDINVOICE##');
                break;
            case 'PUSHTOPAY':
                $uppercase = strtoupper('##'.$data['rq_uuid'].'##'.$this->cmm_code.'##'.$data['product_code'].'##'.$data['order_id'].'##'.$data['amount'].'##PUSHTOPAY##'.$this->signature_key.'##');
                break;
            case 'INQUIRY-RS':
                $uppercase = strtoupper('##'.$this->signature_key.'##'.$data['rq_uuid'].'##'.$data['rs_datetime'].'##'.$data['order_id'].'##'.$data['error_code'].'##INQUIRY-RS##');
                break;
            case 'PAYMENTREPORT-RS':
                $uppercase = strtoupper('##'.$this->signature_key.'##'.$data['rq_uuid'].'##'.$data['rs_datetime'].$data['error_code'].'##PAYMENTREPORT-RS##');
                break;
            default:
                $uppercase = strtoupper('##'.$this->signature_key.'##'.$data['rq_datetime'].'##'.$data['order_id'].'##'.$mode.'##');
                break;
        }
        $signature = hash('sha256', $uppercase);
        return $signature;
    }

    public function sendInvoice(Request $request) 
    {   
        $data = $request->all();
        $dataSend = array (
            'rq_uuid' => $data['rq_uuid'],
            'rq_datetime' => $data['rq_datetime'],
            'order_id' => $data['order_id'],
            'amount' => $data['amount'],
            'ccy' => 'IDR',
            'comm_code' => $this->cmm_code,
            'remark1' => $data['remark1'],
            'remark2' => $data['remark2'],
            'remark3' => $data['remark3'],
            'update' => $data['update'],
            'bank_code' => $data['bank_code'],
            'va_expired' => $data['va_expired'],
        );
        $signature = $this->signature('SENDINVOICE', $dataSend);
        $dataSend['signature'] = $signature;
        $xurldata = http_build_query($dataSend);
        $response = $this->sendApi($xurldata, '/rest/merchantpg/sendinvoice');
        if($response->error_code == '0000') 
        {
            $newPE = new PaymentEspay();
            $newPE->rq_uuid = $dataSend['rq_uuid'];
            $newPE->order_id = $dataSend['order_id'];
            $newPE->customer_name = $dataSend['remark2'];
            $newPE->customer_email = $dataSend['remark3'];
            $newPE->customer_phone = $dataSend['remark1'];
            $newPE->amount = $response->amount;
            $newPE->total_amount = $response->total_amount;
            $newPE->fee = $response->fee;
            $newPE->va_number = $response->va_number;
            $newPE->expired = $response->expired;
            $newPE->description = $dataSend['description'];//$item->description;
            $newPE->espayproduct_code = $dataSend['bank_code'];
            $newPE->espayproduct_name = $data['espayproduct_name'];
            $newPE->status = "IP";
            $newPE->type = 'VA';
            $newPE->norec_pd = $data['norec_pd'];
            $newPE->pegawaifk = $data['pegawaifk'];
            $newPE->statusenabled = true;
            $newPE->save();
            // foreach ($response->va_list as $item) {
            //     if($item->bank_code == $data['bank_code']) {
            //         if($item->error_code == '0000'){
            //             $newPE = new PaymentEspay();
            //             $newPE->rq_uuid = $dataSend['rq_uuid'];
            //             $newPE->order_id = $dataSend['order_id'];
            //             $newPE->customer_name = $dataSend['remark2'];
            //             $newPE->customer_email = $dataSend['remark3'];
            //             $newPE->customer_phone = $dataSend['remark1'];
            //             $newPE->amount = $item->amount;
            //             $newPE->total_amount = $item->total_amount;
            //             $newPE->fee = $item->fee;
            //             $newPE->va_number = $item->va_number;
            //             $newPE->expired = $item->expiry_date_time;
            //             $newPE->description = $dataSend['description'];//$item->description;
            //             $newPE->espayproduct_code = $dataSend['bank_code'];
            //             $newPE->espayproduct_name = $data['espayproduct_name'];
            //             $newPE->status = "IP";
            //             $newPE->type = 'VA';
            //             $newPE->norec_pd = $data['norec_pd'];
            //             $newPE->pegawaifk = $data['pegawaifk'];
            //             $newPE->statusenabled = true;
            //             $newPE->save();
            //         }
            //         break;
            //     }
            // }
        }
        return $this->respond($response);
    }

    public function qrPayment(Request $request)
    {
        $data = $request->all();
        $dataSend = array (
            'rq_uuid' => $data['rq_uuid'],
            'rq_datetime' => $data['rq_datetime'],
            'comm_code' => $this->cmm_code,
            'product_code' => $data['product_code'],
            'order_id' => $data['order_id'],
            'amount' => $data['amount'],
            'key' => $this->key,
            'description' => $data['description'],
            'customer_id' => $data['customer_id'],
        );
        $signature = $this->signature('PUSHTOPAY', $dataSend);
        $dataSend['signature'] = $signature;
        $xurldata = http_build_query($dataSend);
        $authheader = base64_encode($this->cmm_code.':'.$this->password);
        $response = $this->sendApi($xurldata, '/rest/digitalpay/pushtopay', 'Authorization: Basic '. $authheader);
        if($response->error_code == '0000')
        {
            $newPE = new PaymentEspay();
            $newPE->rq_uuid = $dataSend['rq_uuid'];
            $newPE->trx_id = $response->trx_id;
            $newPE->order_id = $dataSend['order_id'];
            $newPE->customer_id = isset($dataSend['customer_id']) ? $dataSend['customer_id'] : null;
            $newPE->amount = $dataSend['amount'];
            $newPE->qr_link = $response->QRLink;
            $newPE->qr_code = $response->QRCode;
            $newPE->espayproduct_code = $dataSend['product_code'];
            $newPE->espayproduct_name = $data['espayproduct_name'];
            $newPE->status = "IP";
            $newPE->type = 'QR';
            $newPE->norec_pd = $data['norec_pd'];
            $newPE->pegawaifk = $data['pegawaifk'];
            $newPE->statusenabled = true;
        }
        return $this->respond($response);
    }

    public function sendApi($xform, $endpoint, $AuthorizationHead = '') 
    {
        $curl = curl_init();

        $host = $this->settingDataFixed('Host_ESPAY', $this->getKdProfile());
        $baseUrl = $this->settingDataFixed('Url_ESPAY', $this->getKdProfile());
        $header = array(
        'Host: '. $host,
        'Connection: keep-alive',
        'Content-Type: application/x-www-form-urlencoded',
        'Accept: */*',
        $AuthorizationHead
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

    public function inquiryTransaction(Request $request)
    {
        $data = $request->all();
        $findData = DB::table('strukpelayanan_t as sp')
        // ->join('espaypayment_t as ep', 'sp.nostruk', '=', 'ep.order_id')
        ->join('pasiendaftar_t as pd', 'pd.norec', '=', 'sp.noregistrasifk')
        ->join('pasien_m as ps', 'ps.id', '=', 'pd.nocmfk')
        ->join('alamat_m as al', 'al.nocmfk', '=', 'ps.id')
        ->select('sp.*', 'ps.namapasien', 'ps.nohp', 'al.alamatlengkap', 'al.kodepos', 'al.kotakabupaten')
        ->where('sp.statusenabled', true)
        ->where('sp.nostruk', $data['order_id'])
        ->whereNull('sp.nosbmlastfk')
        ->first();
        if(!empty($findData)) {
            $rq_uuid = substr(Uuid::generate(), 0, 32);
            $rs_datetime = date('c');
            $dataSend = array(
                'rq_uuid' => $rq_uuid,
                'rs_datetime' => $rs_datetime,
                'error_code' => "0000",
                'order_id' => $findData->nostruk
            );
            $signature = $this->signature('INQUIRY-RS', $dataSend);
            switch ($findData->espaytype) {
                case 'VA':
                    $response = array(
                        'rq_uuid' => $rq_uuid,
                        'rs_datetime' => $rs_datetime,
                        "error_code" => "0000",
                        "error_message"=> "Success",
                        "order_id"=> $findData->nostruk,
                        "amount"=> $findData->totalharusdibayar,
                        "ccy"=> "IDR",
                        "description"=> "Pembayaran tagihan pasien ". $findData->namapasien,
                        "trx_date"=> $findData->tglstruk,
                        "signature"=>  $signature,
                        "token"=> "",
                    );
                    break;
                case 'QR':
                    $response = array(
                        'rq_uuid' => $rq_uuid,
                        'rs_datetime' => $rs_datetime,
                        "error_code" => "0000",
                        "error_message"=> "Success",
                        "order_id"=> $findData->nostruk,
                        "amount"=> $findData->totalharusdibayar,
                        "ccy"=> "IDR",
                        "description"=> "Pembayaran tagihan pasien ". $findData->namapasien,
                        "trx_date"=> $findData->tglstruk,
                        "installment_period"=> "30D",
                        "signature"=> $signature,
                        "token"=> "",
                        "customer_details" => array(
                            "firstname" => $findData->namapasien,
                            "lastname" => "",
                            "phone_number" => $findData->nohp,
                            "email" => "-",
                        ),
                        "shipping_address" => array(
                            "firstname" => $findData->namapasien,
                            "lastname" => "",
                            "address" => $findData->alamatlengkap,
                            "city" => $findData->kotakabupaten,
                            "postal_code" => $findData->kodepos,
                            "phone" => $findData->nohp,
                            "country_code" => "IDN"
                        )
                    );
                    break;
            }
        } else {
            $response = array(
                'rq_uuid' => substr(Uuid::generate(), 0, 32),
                'rs_datetime' => date('c'),
                "error_code" => "0014",
                "error_message"=> "invalid order id",
            );
        }
        
        return $this->respond($response);
    }

    public function paymentNotification(Request $request)
    {
        $data = $request->all();
        $findData = PaymentEspay::where('order_id', $data['order_id'])
        ->whereNull('norec_sbm')
        ->first();
        $stt = false;
        DB::beginTransaction();
        try {
            if(!empty($findData))
            {
                // update trx_id
                $dataSend = array (
                    'uuid' => substr(Uuid::generate(), 0, 32),
                    'rq_datetime' => date('Y-m-d H:i:s'),
                    'comm_code' => $this->cmm_code,
                    'order_id' => $data['order_id']
                );
                $signature = $this->signature('CHECKSTATUS', $dataSend);
                $dataSend['signature'] = $signature;
                $xurldata = http_build_query($dataSend);
                $response = $this->sendApi($xurldata, '/rest/merchant/status');
                if($response->error_code == '0000')
                {
                    $findData->trx_id = $response->tx_id;
                    $findData->status = $response->tx_status;
                    $findData->payment_ref = $data['payment_ref'];
                    $findData->reconcile_datetime = date('Y-m-d H:i:s');
                    $findData->save();
                    $stt = true;
                }
            }
        } catch (\Exception $e) {
            $stt = false;
        }

        if ($stt) {
            $rq_uuid = substr(Uuid::generate(), 0, 32);
            $rs_datetime = date('c');
            $dataSend = array(
                'rq_uuid' => $rq_uuid,
                'rs_datetime' => $rs_datetime,
                'error_code' => "0000",
            );
            $signature = $this->signature('PAYMENTREPORT-RS', $dataSend);
            $result = array(
                "rq_uuid" => $rq_uuid,
                "rs_datetime" => $rs_datetime,
                "error_code" => "0000",
                "error_message" => "Success",
                "order_id" => $findData->order_id,
                "reconcile_id" => date("YmdHis", strtotime($findData->reconcile_datetime)),
                "reconcile_datetime" => $findData->reconcile_datetime,
                "signature" => $signature,
            );
            DB::commit();
        } else {
            $result = array(
                "rq_uuid" => substr(Uuid::generate(), 0, 32),
                "rs_datetime" => date('c'),
                "error_code" => "0014",
                "error_message"=> "invalid order id",
            );
            DB::rollBack();
        }
        return $this->respond($result);
    }

    public function settlementNotification(Request $request)
    {
        $data = $request->all();
        $findData = PaymentEspay::where('trx_id', $data['data']['tx_id'])
        ->whereNotNull('payment_ref')
        ->whereNull('norec_sbm')
        ->first();
        $stt = false;
        DB::beginTransaction();
        try {
            if(!empty($findData))
            {
                $dataPegawai = DB::table('loginuser_s as lu')
                ->where('lu.objectpegawaifk', $findData->pegawaifk)
                ->first();

                $strukPelayanan = StrukPelayanan::where('nostruk', $findData->order_id)
                ->where('statusenabled', true)
                ->first();
                $strukBuktiPenerimanan = new StrukBuktiPenerimaan();
                $strukBuktiPenerimanan->norec = $strukBuktiPenerimanan->generateNewId();
                $strukBuktiPenerimanan->kdprofile = $this->getKdProfile();
                $strukBuktiPenerimanan->keteranganlainnya = "Pembayaran Tagihan Pasien Espay";
                $strukBuktiPenerimanan->statusenabled = 1;
                $strukBuktiPenerimanan->nostrukfk = $strukPelayanan->norec;
                $strukBuktiPenerimanan->objectkelompokpasienfk = $strukPelayanan->pasien_daftar->objectkelompokpasienlastfk;
                $strukBuktiPenerimanan->objectkelompoktransaksifk = 1;
                $strukBuktiPenerimanan->objectpegawaipenerimafk  = $dataPegawai->id;
                $strukBuktiPenerimanan->tglsbm  = $data['data']['settlement_date']; //$this->getDateTime();
                $strukBuktiPenerimanan->totaldibayar  = $data['data']['settlement_amount'];
                $strukBuktiPenerimanan->nosbm = $this->generateCode(new StrukBuktiPenerimaan, 'nosbm', 14, 'RV-' . $this->getDateTime()->format('ym'), $this->getKdProfile());
                $strukBuktiPenerimanan->save();

                $SBPCB = new StrukBuktiPenerimaanCaraBayar();
                $SBPCB->norec = $SBPCB->generateNewId();
                $SBPCB->kdprofile = $this->getKdProfile();
                $SBPCB->statusenabled = 1;
                $SBPCB->nosbmfk = $strukBuktiPenerimanan->norec;
                $SBPCB->objectcarabayarfk = 11;
                $SBPCB->totaldibayar = $data['data']['settlement_amount'];
                $SBPCB->save();

                $strukPelayanan->nosbmlastfk = $strukBuktiPenerimanan->norec;
                $strukPelayanan->save();
                $pd = $strukPelayanan->pasien_daftar;
                $pd->nosbmlastfk = $strukBuktiPenerimanan->norec;
                $pd->save();
                // update status espaypayment_t
                $espayData = PaymentEspay::where('order_id', $findData->order_id)->first();
                $espayData->status = 'S';
                $espayData->date_settle = date('Y-m-d H:i:s');
                $espayData->norec_sbm = $strukBuktiPenerimanan->norec;
                $espayData->save();

                $stt = true;
            }
        } catch (\Exception $e) {
            $stt = false;
        }

        if ($stt) {
            $result = array(
                "error_code" => "0000",
                "error_message" => "Success",
                "settlement_remark" => "Pembayaran order id ". $strukPelayanan->nostruk ." diterima",
                "date_settle" => $espayData->date_settle
            );
            DB::commit();
        } else {
            $result = array(
                "error_code" => "1111",
                "error_message" => "Internal Error",
                "settlement_remark" => "Pembayaran order id ". $findData->order_id ." gagal",
                "date_settle" => date('Y-m-d H:i:s')
            );
            DB::rollBack();
        }
        return $this->respond($result);
    }

    public function checkPaymentStatus(Request $request)
    {
        $data = $request->all();
        $dataSend = array (
            'uuid' => $data['uuid'],
            'rq_datetime' => date('Y-m-d H:i:s'),
            'comm_code' => $this->cmm_code,
            'order_id' => $data['order_id'],
            'is_paymentnotif' => $data['is_paymentnotif'],
        );
        $signature = $this->signature('CHECKSTATUS', $dataSend);
        $dataSend['signature'] = $signature;
        $xurldata = http_build_query($dataSend);
        $response = $this->sendApi($xurldata, '/rest/merchant/status');
        if($response->error_code == '0000')
        {
            $data = PaymentEspay::where('order_id', $data['order_id'])->first();
            $data->status = $response->tx_status;
            $data->trx_id = $response->tx_id;
            $data->save();
        }
        return $this->respond($response);
    }

    public function updateExpireTransaction(Request $request)
    {
        $data = $request->all();
        $dataSend = array (
            'uuid' => $data['uuid'],
            'rq_datetime' => date('Y-m-d H:i:s'),
            'comm_code' => $this->cmm_code,
            'order_id' => $data['order_id'],
            'tx_remark' => $data['tx_remark'],
        );
        $signature = $this->signature('EXPIRETRANSACTION', $dataSend);
        $dataSend['signature'] = $signature;
        $xurldata = http_build_query($dataSend);
        $response = $this->sendApi($xurldata, '/rest/merchant/updateexpire');
        if($response->error_code == '0000')
        {
            $data = PaymentEspay::where('order_id', $data['order_id'])->first();
            $data->status = "F";
            $data->trx_id = $response->tx_id;
            $data->save();
        }
        return $this->respond($response);
    }
}
