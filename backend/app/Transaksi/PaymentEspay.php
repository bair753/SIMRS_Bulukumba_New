<?php
namespace App\Transaksi;

class PaymentEspay extends Transaksi
{
    protected $table = "espaypayment_t";
    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = "order_id";
}