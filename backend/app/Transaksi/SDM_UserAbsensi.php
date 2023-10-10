<?php
/**
 * Created by PhpStorm.
 * User: Egie
 * Date: 12/11/2019
 * Time: 9:40 PM
 */


namespace App\Transaksi;


class SDM_UserAbsensi extends Transaksi
{
    protected $table = 'sdm_userabsensi_m';
    protected $fillable = [];
    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = "norec";
}