<?php
namespace App\Helpers;
use App\Lock;
use Illuminate\Support\Facades\DB;


class Locksystem {
    public static function get_status() {
        $lockstatus = DB::table('locks')->first();
        if(!$lockstatus){
            return false;
        }else{
            return true;
        }

    }

}
