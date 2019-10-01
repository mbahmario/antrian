<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
         <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <!-- Styles -->
        <style>
            .nomor-antrian{
                font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                font-size: 14ch;
                font-weight: bold;

            }
            .nomor-antrian1{
                font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                font-size: 8ch;
                font-weight: bold;

            }
            .nomor-antrian2{
                font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                font-size: 6ch;
                font-weight: bold;

            }
            .nomor-antrianpoli{
                font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                font-size: 4ch;
                font-weight: bold;

            }
        </style>
    </head>
    <body >

        <div class="container-fluid pt-4">
            <div class="row bg-faded">
                <button type="button" id="button1" onclick="Play()" hidden>Play</button>
                <div class="col-md-4">
                    <div class="card card-block h-100 justify-content-center align-items-center text-center">

                           <h1 class="nomor-antrian2">Nomor Antrian</h1>
                           <p class="nomor-antrian" id="mainNoAntrian">A-000</p>

                           <h1 class="nomor-antrian1" id="mainNamaLoket">Loket 1</h1>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card card-block h-100 justify-content-center align-items-center text-center embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="//www.youtube.com/embed/wMuNjnNyaiA" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid pt-4">
            <div class="row bg-faded">
                <div class="col-md-4">
                    <div class="card card-block h-100 justify-content-center align-items-center text-center">
                        <div class="card-body">
                            <h1 class="nomor-antrianpoli">Poliklinik Gigi</h1>
                            <p class="nomor-antrian1">A-000</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-block h-100 justify-content-center align-items-center text-center">
                         <div class="card-body">
                            <h1 class="nomor-antrianpoli">Poliklinik Umum</h1>
                            <p class="nomor-antrian1">A-000</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-block h-100 justify-content-center align-items-center text-center">
                        <div class="card-body">
                            <h1 class="nomor-antrianpoli">Poliklinik MTB</h1>
                            <p class="nomor-antrian1">A-000</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!--
        <div class="pt-2">
            <nav class="navbar navbar-expand-lg navbar-light bg-light" style="height:100px;">
            </nav>
        </div>
        -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script>
            window.Echo.channel('callantrian')
                .listen('CallAntrian', (e) => {
                    //console.log(e.array_audio);
                    var _listaudio = e.array_audio;
                    var _kodePasien;
                    var _concatNoAntrian;
                    var _noAntrian;
                    if(e.message >= 1 && e.message <  10 ){
                        _concatNoAntrian = "00"+e.message
                    }else if(e.message >= 10 && e.message <  99 ){
                        _concatNoAntrian = "0"+e.message
                    }else if(e.message >= 100 && e.message <  999 ){
                        _concatNoAntrian = e.message
                    }

                    if(e.jenisantrian == 1) {
                        _kodePasien = "B";
                        _noAntrian = _kodePasien + "-"+_concatNoAntrian;
                    }else if(e.jenisantrian == 2){
                        _kodePasien = "A";
                        _noAntrian = _kodePasien + "-"+_concatNoAntrian;
                    }

                    document.getElementById("mainNoAntrian").innerHTML = _noAntrian;
                    Play(_listaudio);
                });
        </script>
        <script>
            window.Echo.channel('calldisplaypoli')
                .listen('CallDisplaypoli', (e) => {
                    console.log(e);
                    var _listaudio = e.array_audio;
                    var _kodePasien;
                    var _concatNoAntrian;
                    var _noAntrian;
                    if(e.message >= 1 && e.message <  10 ){
                        _concatNoAntrian = "00"+e.message
                    }else if(e.message >= 10 && e.message <  99 ){
                        _concatNoAntrian = "0"+e.message
                    }else if(e.message >= 100 && e.message <  999 ){
                        _concatNoAntrian = e.message
                    }

                    if(e.jenisantrian == 1) {
                        _kodePasien = "B";
                        _noAntrian = _kodePasien + "-"+_concatNoAntrian;
                    }else if(e.jenisantrian == 2){
                        _kodePasien = "A";
                        _noAntrian = _kodePasien + "-"+_concatNoAntrian;
                    }

                    document.getElementById("mainNoAntrian").innerHTML = _noAntrian;
                    Play(_listaudio);
                });
        </script>
        <script>
            function Play(_listaudio) {

                try {
                    //var playlist = new Array('http://localhost/antrian/public/sound/tujuh.mp3','http://localhost/antrian/public/sound/belas.mp3');
                        var playlist = _listaudio;
                        var n = playlist.length;
                        var audio = new Audio();
                        audio.src = playlist[0];
                        console.log(playlist);


                        if (n > 0) {

                            var promise = audio.play();
                            if (promise) {
                                //Older browsers may not return a promise, according to the MDN website
                                promise.catch(function(error) { console.error(error); });
                            }

                            audio.autoplay = true;
                        }
                        var i = 0;
                        audio.addEventListener('ended', function () {
                        i++;
                        if (i < n) {
                            audio.src = playlist[i];
                            console.log(playlist[i]);

                            var promise = audio.play();
                            if (promise) {
                                //Older browsers may not return a promise, according to the MDN website
                                promise.catch(function(error) { console.error(error); });
                            }

                        }else if(i === n){
                            const Http = new XMLHttpRequest();
                            const url="{{url('lock/unlock')}}";
                            Http.open("GET", url);
                            Http.send();
                            Http.onreadystatechange=(e)=>{
                            //console.log(Http.responseText)
                            }
                        }
                    }, false);
                }
                catch(err) {
                    alert(err.message);
                    const Http = new XMLHttpRequest();
                    const url="{{url('lock/unlock')}}";
                    Http.open("GET", url);
                    Http.send();
                    Http.onreadystatechange=(e)=>{
                    //console.log(Http.responseText)
                    }
                }
            }
        </script>
    </body>
</html>
