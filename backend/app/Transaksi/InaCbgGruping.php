<?php

namespace App\Transaksi;

class InaCbgGruping extends Transaksi
{
    protected $table = "inacbg_gruping";
    protected $fillable = [];
    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = "norec";

    protected $casts = [
        'gruping_respons' => 'json',
    ];
}
