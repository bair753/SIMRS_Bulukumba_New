<?php

namespace App\Transaksi;

class LoggingTaksId extends Transaksi
{
    protected $table ="loggingtaksid_t";
    protected $fillable = [];
    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = "id";
}
