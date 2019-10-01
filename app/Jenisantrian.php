<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jenisantrian extends Model
{
    protected $fillable = [
        'name',
        'created_at',
        'created_by',
    ];
}
