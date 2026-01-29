<?php

namespace App\Transaksi;

class BridgingIdrgResReq extends Transaksi
{
    protected $table = "bridging_idrg_res_req";
    protected $fillable = [];
    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = "norec";

    protected $casts = [
        'json_idrg_new_claim' => 'json',
        'json_idrg_set_claim_data' => 'json',
        'json_idrg_diagnosa_set' => 'json',
        'json_idrg_procedure_set' => 'json',
        'json_idrg_grouper' => 'json',
        'json_idrg_grouper_final' => 'json',
        'json_idrg_grouper_reedit' => 'json',
        'json_idrg_to_inacbg_import' => 'json',
        'json_inacbg_diagnosa_set' => 'json',
        'json_inacbg_procedure_set' => 'json',
        'json_inacbg_grouper_stage_satu' => 'json',
        'json_inacbg_grouper_stage_dua' => 'json',
        'json_inacbg_grouper_final' => 'json',
        'json_inacbg_grouper_reedit' => 'json',
        'json_claim_final' => 'json',
        'json_reedit_claim' => 'json',
        'json_send_claim_individual' => 'json',
    ];
}