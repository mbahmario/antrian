<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Countertpp extends Model
{
    protected $fillable = [
        'name',
        'user_id',
        'alias',
        'created_at',
        'created_by',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
