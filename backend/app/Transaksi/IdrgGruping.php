<?php

namespace App\Transaksi;

class IdrgGruping extends Transaksi
{
    protected $table = "idrg_gruping";
    protected $fillable = [];
    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = "norec";

        protected $casts = [
        'gruping_respons' => 'json',
    ];
}