<?php
namespace App\Transaksi;

class ListNotif extends Transaksi
{
    protected $table ="listnotif";
    protected $fillable = [];
    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = "norec";
}
