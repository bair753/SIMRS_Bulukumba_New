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
use Illuminate\Support\Facades\Storage;

class BridgingESPAYController extends ApiController
{

    use Valet, PelayananPasienTrait;

    protected $request;

    public function __construct()
    {
        parent::__construct($skip_authentication = false);
    }

    protected function getKdProfile()
    {
        $session = \Session::get('userData');

        $user =  User::where('id', $session['id'])->first();
        if (empty($user)) {
            $user =  LoginPasien::where('id', $session['id'])->first();
        }
        return $user->kdprofile;
    }

    public function signature() 
    {
        $key = $this->settingDataFixed('signature_ESPAY', $this->getKdProfile());
        $uppercase = strtoupper('##7bc074f97c3131d2e290a4707a54a623##2016-07-25 11:05:49##145000065##INQUIRY##');
        $signature = hash('sha256', '$uppercase');
    }
}
