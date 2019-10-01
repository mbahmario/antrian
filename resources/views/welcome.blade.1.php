<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Display Antrian</title>
</head>
<body>

<div>
</div>

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

            if (n > 0)
            {
                var promise = audio.play();
                if (promise)
                {
                    //Older browsers may not return a promise, according to the MDN website
                    promise.catch(function(error) { console.error(error); });
                }

                audio.autoplay = true;
            }

            var i = 0;
            audio.addEventListener('ended', function ()
            {
                i++;
                if (i < n)
                {
                    audio.src = playlist[i];
                    console.log(playlist[i]);
                    var promise = audio.play();
                    if (promise)
                    {
                        //Older browsers may not return a promise, according to the MDN website
                        promise.catch(function(error) { console.error(error); });
                    }
                }else if(i === n)
                {
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
        catch(err)
        {
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
