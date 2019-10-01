<?php
namespace App\Helpers;
use Auth;


class Panggilan {
    public static function get_audio($terbilang) {
        $loket = Auth::user()->countertpp->alias;
        $arr_audio = explode (" ",$terbilang);
        foreach ($arr_audio as $key => $value) {
            $arr_audio[$key] = "http://localhost/antrian/public/sound/". $arr_audio[$key].".mp3";
        }
        array_unshift ($arr_audio, 'http://localhost/antrian/public/sound/bellawal.mp3','http://localhost/antrian/public/sound/nomorantrian.mp3');

        array_push( $arr_audio, 'http://localhost/antrian/public/sound/'.$loket.'.mp3','http://localhost/antrian/public/sound/bellakhir.mp3');
        return $arr_audio;
    }
}
