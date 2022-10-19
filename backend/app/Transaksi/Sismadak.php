<?php
namespace App\Transaksi;

class Sismadak extends Transaksi
{
    protected $table ="sismadak_t";
    protected $primaryKey = 'norec';
    protected $fillable = [];
    public $timestamps = false;
    public $incrementing = false;
}