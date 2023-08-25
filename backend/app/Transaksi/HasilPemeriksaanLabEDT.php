<?php
/**
 * Created by PhpStorm.
 * User: Egie Ramdan
 * Date: 06/06/2018
 * Time: 09.42
 */

namespace App\Transaksi;

class HasilPemeriksaanLabEDT extends Transaksi
{
    protected $table ="hasilpemeriksaanlabedt_t";
    protected $fillable = [];
    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = "norec";


}
