
@extends('adminlte::page')

@section('title', 'Panggil Antrian Poli')

@section('content_header')
<h1>
    <i class="fa fa-dashboard"></i>
        Selamat Datang
       <small>{{Auth::user()->name}}</small>
   </h1>
   <ol class="breadcrumb">
     <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
     <li class="active">Panggil antrian poliklinik</li>
   </ol>
@stop

@section('content')
    <div class="col-lg-6 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3><span id="sisaantrian">{{$getunprocess}}</span></h3>
                <p>Antrian tersisa</p>
                </div>
                <div class="icon">
                <span id="antriansaatini" style="color: #fff;">{{$concatNoAntrian}}</span>
            </div>
            <a href="#" class="small-box-footer">Antrian tersisa dari total <span id="total1">{{$gettotalantrian}}</span> antrian <i class="fa fa-arrow-circle-right"></i></a>
        </div>
        <div class="box box-solid box-success">
            <div class="box-header">
                <h3 class="box-title">
                    <i class="fa fa-bullhorn"></i> &nbsp; Panggil antrian
                </h3>
            </div>
            <div class="box-body">

            </div>
            <div class="box-footer">
                <div class="col-lg-6 col-xs-12 ">
                    {{ Form::open(array('id' => 'recall')) }}
                        <button id="btnrecall" class="btn btn-md btn-warning col-lg-12 col-xs-12" ><i class="glyphicon glyphicon-repeat"></i> &nbsp; Panggil ulang</button>
                    {{ Form::close() }}
                </div>
                <div class="col-lg-6 col-xs-12">
                    {{ Form::open(array('id' => 'nextcall')) }}
                        <button id="btnnextcall" class="btn btn-md btn-success col-lg-12 col-xs-12" >Antrian Selanjutnya &nbsp; <i class="glyphicon glyphicon-menu-right"></i></button>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6 col-xs-6">
        <div class="box box-solid box-success">
            <div class="box-header">
                <h3 class="box-title">
                    <i class="fa fa-list"></i> &nbsp; Daftar Antrian Poli
                </h3>
            </div>
            <div class="box-body">
                {{Auth::user()->countertpp->user_id}}
                {{Auth::user()->countertpp->name}}
            </div>
            <div class="box-footer">

            </div>
        </div>
    </div>
@stop

@section('css')
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
hr {
    border: 1px dotted #808080;
    border-style: none none dotted;
    *color: #808080;
    *background-color: #fff;
}
</style>

@stop

@section('js')
<script src="{{ asset('js/app.js') }}"></script>
<script>
    $('#nextcall').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type:'GET',
            dataType:'JSON',
            url:'{{url('nextcallpoli')}}',
            data:{
            },
            success:function(data){
                console.log(data);
                if(data.status == true){
                    var _pesan = data.data[0].nomor_antrian;
                    swal({
                        text: _pesan,
                        title: "Informasi",
                        timer: 5000,
                        type: "info",

                    });

                }else{
                    swal({
                        text: data.message,
                        title: "Informasi",
                        timer: 5000,
                        type: "info",

                    });
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            }
        });
    });
    $('#recall').on('submit', function(e) {
        e.preventDefault();

        $.ajax({
            type:'GET',
            dataType:'JSON',
            url:'{{url('recallpoli')}}',
            data:{

            },
            success:function(data){
                console.log(data);
                if(data.status === false){
                    swal({
                        text: data.message,
                        title: "Informasi",
                        timer: 5000,
                        type: "info",

                    });
                }else{
                    swal({
                        text: 'Nomor Antrian '+data.data[0].nomor_antrian,
                        title: "Informasi",
                        timer: 5000,
                        type: "info",

                    });
                }

            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            }
        });
    });
</script>
 <script>

</script>
<script>
    Echo.private('addantrianpoli.{{Auth::user()->id}}')
        .listen('Addantrianpoli', (e) => {
        console.log(e);
        document.getElementById("sisaantrian").innerHTML = e.sisa;
        document.getElementById("total1").innerHTML = e.total;

    });
</script>
<script>
    Echo.private('changedashboardpoli.{{Auth::user()->id}}')
        .listen('Changedashboardpoli', (e) => {
        console.log(e);
        var _kodePasien;
        var _concatNoAntrian;
        var _noAntrian;
        if(e.nomorantrian >= 1 && e.nomorantrian <  10 ){
             _concatNoAntrian = "00"+e.nomorantrian
        }else if(e.nomorantrian >= 10 && e.nomorantrian <  99 ){
            _concatNoAntrian = "0"+e.nomorantrian
        }else if(e.nomorantrian >= 100 && e.nomorantrian <  999 ){
            _concatNoAntrian = e.nomorantrian
        }

        if(e.jenisantrian == 1) {
            _kodePasien = "B";
            _noAntrian = _kodePasien + "-"+_concatNoAntrian;
        }else if(e.jenisantrian == 2){
            _kodePasien = "A";
            _noAntrian = _kodePasien + "-"+_concatNoAntrian;
        }

        document.getElementById("antriansaatini").innerHTML = _noAntrian;
        document.getElementById("sisaantrian").innerHTML = e.sisa;
        document.getElementById("total1").innerHTML = e.total;

    });
</script>


@stop




