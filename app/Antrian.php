<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Antrian extends Model
{
    protected $fillable = [
        'jenisantrian_id',
        'nomor_antrian',
        'tgl_antrian',
        'status',
        'fiscal_year',
        'periode',
    ];
}
