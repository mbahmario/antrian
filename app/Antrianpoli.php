<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Antrianpoli extends Model
{
    protected $fillable = [
        'jenisantrian_id',
        'user_id',
        'countertpp_id',
        'nomor_antrian',
        'tgl_antrian',
        'status',
        'fiscal_year',
        'periode',
    ];
}
