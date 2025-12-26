<?php

/**
 * Created by PhpStorm.
 * User: egie ramdan
 * Date: 12/11/2021
 * Time: 08.59
 */

namespace App\Http\Controllers\Bridging;

use App\Http\Controllers\ApiController;
use App\Web\LoginUser;

use Illuminate\Http\Request;
use App\Traits\PelayananPasienTrait;
use App\User;
use DB;
use App\Traits\Valet;
use Webpatser\Uuid\Uuid;


date_default_timezone_set('Asia/Jakarta');
class BridgingOCBCNISP_NoAuthController extends ApiController
{
    
    use Valet, PelayananPasienTrait;
    protected $statusCode = [
        ['code'=> 200, 'message'=> 'Transaction Success'],
        ['code'=> 400, 'message'=> 'Transaction Failed or Bad Request'],
        ['code'=> 401, 'message'=> 'Unauthenticated'],
        ['code'=> 403, 'message'=> 'Unauthorized (Access denied to the resource)'],
        ['code'=> 404, 'message'=> 'Not Found'],
        ['code'=> 429, 'message'=> 'Too many requests (B2B)'],
        ['code'=> 500, 'message'=> 'Server Error']
    ];
    public function __construct()
    {
        parent::__construct($skip_authentication = true);
    }
    
    function oAuthToken(Request $request)
    {
        try {
            $lang = 'en';
            if(!empty( $request->header('Accept-Language'))){
                $lang = $request->header('Accept-Language');
            }
            // $kdProfile = $this->getKdProfile();
            if(empty($request->header('Authorization'))){
                if($lang=='en'){
                    $msg = "Authorization required";
                }else{
                    $msg = "Authorization harus diisi";
                }
                
                abort($msg);
            }
            if(empty($request->header('X-OCBC-Timestamp'))){
                if($lang=='en'){
                    $msg = "X-OCBC-Timestamp required";
                }else{
                    $msg = "X-OCBC-Timestamp harus diisi";
                }
                abort($msg);
            }
            $explode =  explode(' ', $request->header('Authorization'));
            $timeStamp = $request->header('X-OCBC-Timestamp');

            $auth = base64_decode( $explode[1]);
            $user = explode(':',$auth )[0];
            $password = explode(':',$auth)[1];
            if(!isset($request['grant_type'])){
              
                if($lang=='en'){
                    $msg = "grant_type required";
                }else{
                    $msg = "grant_type harus diisi";
                }
                abort($msg);
            }
            $login = LoginUser::where('namauser',$user)
                ->where('passcode',$password)
                ->first();
            if(empty($login)){
                if($lang=='en'){
                    $msg = "Credentials not match";
                }else{
                    $msg = "Credentials harus diisi";
                }
                abort(403,$msg);
            }
            $cnt = strtotime($login->expired) - strtotime(date('Y-m-d H:i:s'));
            if($login->expired < date('Y-m-d H:i:s') ){
                $expired = date('Y-m-d H:i:s',strtotime($timeStamp) + 900);

                $cnt = strtotime($expired) - strtotime(date('Y-m-d H:i:s'));
                $login->access_token = substr(Uuid::generate(), 0, 36);
                $login->expired = $expired ;
                $login->save();
            }
         
            $result = array(
                "access_token" =>  $login->access_token,
                "token_type" => "bearer",
                "expires_in" => $cnt,
                "scope" => "read"
            );
            $code = 200;
        } catch (\Exception $e) {
            $code = 500;
            if($lang=='en'){
                $msg = "Internal Error";
            }else{
                $msg = "Kesalahan Internal";
            }
            $result = array(
                "error_code" => 20104,
                "error_message" => isset($msg)?$msg:"Internal Error" ,
            );
        }
        return response()->json($result,$code);
    }
}