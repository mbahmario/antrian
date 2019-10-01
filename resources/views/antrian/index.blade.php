
@extends('adminlte::page')

@section('title', 'Panggil Antrian')

@section('content_header')
<h1>
    <i class="fa fa-dashboard"></i>
        Selamat Datang
       <small>{{Auth::user()->name}}</small>
   </h1>
   <ol class="breadcrumb">
     <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
     <li class="active">Panggil antrian</li>
   </ol>
@stop

@section('content')
<div class="row">
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
    </div>
    <div class="col-lg-6 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
            <h3><span id="antrianterlayani">{{$getprocessed}}</span></h3>
                <p>Antrian terlayani</p>
            </div>
            <div class="icon">
                <i class="fa fa-check"></i>
            </div>
            <a href="#" class="small-box-footer">Antrian terlayani dari total <span id="total2">{{$gettotalantrian}}</span> antrian <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>


    <div class="col-lg-6 col-xs-12">
        <div class="box box-solid box-success">
            <div class="box-header">
                <h3 class="box-title">
                    <i class="fa fa-bullhorn"></i> &nbsp; Panggil antrian
                </h3>
            </div>
            <div class="box-body">
                {{ Form::open(array('id' => 'kirimpoli')) }}
                <div class="col-lg-4 col-xs-12 ">
                    <div class="form-group" hidden>
                        {{ Form::text('jenisantrian_id', '', array('class' => 'form-control','id'=>'jenisantrian_id'))}}
                    </div>
                </div>
                <div class="col-lg-4 col-xs-12 " hidden>
                    <div class="form-group">
                        {{ Form::text('nomor_antrian', '', array('class' => 'form-control','id'=>'nomor_antrian')) }}
                    </div>
                </div>
                <div class="col-lg-4 col-xs-12 ">
                    <div class="form-group">

                    </div>
                </div>
                <div class="col-lg-8 col-xs-12 ">
                    <div class="form-group">
                        {{  Form::select('countertpp_id',$countertpps,null,['class' => 'required form-control select2','id'=>'testname','placeholder'=>'Pilih Poli Tujuan','required']) }}
                    </div>
                </div>
                <div class="col-lg-4 col-xs-12 ">
                    <div class="form-group">
                        <button id="btnkirimpoli" class="btn btn-md btn-primary col-lg-12 col-xs-12" disabled ><i class="fa fa-send"></i>&nbsp; &nbsp; Kirim Ke Poli </button>
                    </div>
                </div>
                {{ Form::close() }}


            </div>
            <div class="box-footer">
                <div class="col-lg-6 col-xs-6 ">
                    {{ Form::open(array('id' => 'recall')) }}
                        <button id="btnrecall" class="btn btn-md btn-warning col-lg-12 col-xs-12" ><i class="glyphicon glyphicon-repeat"></i> &nbsp; Panggil ulang</button>
                    {{ Form::close() }}
                </div>
                <div class="col-lg-6 col-xs-6">
                    {{ Form::open(array('id' => 'nextcall')) }}
                        <button id="btnnextcall" class="btn btn-md btn-success col-lg-12 col-xs-12" >Antrian Selanjutnya &nbsp; <i class="glyphicon glyphicon-menu-right"></i></button>
                    {{ Form::close() }}
                </div>
            </div>
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
<script type="text/javascript">
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    });
    $('#kirimpoli').on('submit', function(e) {
        e.preventDefault();
        var jenisantrian = $('#jenisantrian_id').val();
        var nomorantrian =$('#nomor_antrian').val();
        var countertpp = $('select[name=countertpp_id]').val();
        $.ajax({
            type:'POST',
            dataType:'JSON',
            url:"{{url('antrianpoli')}}",
            data:{
                jenisantrian_id:jenisantrian,
                nomor_antrian:nomorantrian,
                countertpp_id:countertpp
            },
            success:function(data){
                console.log(data);
                document.getElementById("btnkirimpoli").disabled = true;
                document.getElementById("btnnextcall").disabled = false;
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            }
        });
    });
</script>
<script>
    $('#nextcall').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type:'GET',
            dataType:'JSON',
            url:'{{url('nextcall')}}',
            data:{
            },
            success:function(data){
                console.log(data);
                if(data.status == true){
                    var _pesan = data.data[0].nomor_antrian;
                    document.getElementById("btnkirimpoli").disabled = false;
                    document.getElementById("btnnextcall").disabled = true;

                }else{
                    var _pesan = data.message;
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
            url:'{{url('recall')}}',
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
        Echo.channel('callantrian')
            .listen('CallAntrian', (e) => {
                console.log(e);

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

                document.getElementById("antriansaatini").innerHTML = _noAntrian;
                document.getElementById("sisaantrian").innerHTML = e.unprocess;
                document.getElementById("antrianterlayani").innerHTML = e.getprocessed;

                document.getElementById("jenisantrian_id").value = e.jenisantrian;
                document.getElementById("nomor_antrian").value = e.message;

            });
    </script>
<script>
    Echo.channel('ambilantrian')
        .listen('AmbilAntrian', (e) => {
        console.log(e);
        document.getElementById("sisaantrian").innerHTML = e.sisa;
        document.getElementById("total1").innerHTML = e.total;
        document.getElementById("total2").innerHTML = e.total;
    });
</script>

@stop




