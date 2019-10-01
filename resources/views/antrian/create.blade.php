
@extends('adminlte::page')

@section('title', 'Ambil No Antrian')

@section('content_header')

@stop

@section('content')
    <div class="row">
        <div class="col-lg-3">

        </div>
        <div class="col-lg-3">
            {{ Form::open(array('id' => 'bpjs')) }}
                <div class="form-group">
                    {{ Form::hidden('jenis_bpjs', '1', array('class' => 'form-control', 'id'=>'jenis_bpjs')) }}
                </div>
                <button class="btn btn-xl btn-primary btn-circle col-lg-12"><i class="glyphicon glyphicon-floppy-saved"></i> BPJS</button>
            {{ Form::close() }}

        </div>
        <div class="col-lg-3">
            {{ Form::open(array('id' => 'umum')) }}
                <div class="form-group">
                    {{ Form::hidden('jenis_umum', '2', array('class' => 'form-control', 'id'=>'jenis_umum')) }}
                </div>
                <button class="btn btn-xl btn-primary btn-circle col-lg-12"><i class="glyphicon glyphicon-floppy-saved"></i> UMUM</button>
            {{ Form::close() }}

        </div>
        <div class="col-lg-3">

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
.btn-circle {
  width: 30px;
  height: 30px;
  text-align: center;
  padding: 6px 0;
  font-size: 12px;
  line-height: 1.428571429;
  border-radius: 15px;
}
.btn-circle.btn-lg {
  width: 50px;
  height: 50px;
  padding: 10px 16px;
  font-size: 18px;
  line-height: 1.33;
  border-radius: 25px;
}
.btn-circle.btn-xl {
  width: 200px;
  height: 200px;
  padding: 10px 16px;
  font-size: 36px;
  line-height: 1.33;
  border-width: 5px;
  border-radius: 100px;
}
.btn-call.btn-xl {
  width: 300px;
  height: 100px;
  padding: 12px 12px;
  font-size: 24px;
  line-height: 1.33;
  border-width: 5px;
  border-radius: 10px;
}

</style>

@stop

@section('js')
<script src="{{ asset('js/app.js') }}"></script>
<script>
    $(document).ready(function(){
        setTimeout(function() {
            $('#flash_message').fadeOut('fast');
        }, 5000);
    });


        //swal({
            //text: "Silahkan setting Loket anda terlebih dahulu untuk memulai.",
            //title: "Informasi",
            //timer: 5000,
            //type: "info",

        //});

</script>

<script type="text/javascript">
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    });

    $('#bpjs').on('submit', function(e) {
        e.preventDefault();
        var _jenisantrian = $('#jenis_bpjs').val();
        $.ajax({
            type:'POST',
            dataType:'JSON',
            url:'{{url('antrian')}}',
            data:{
                jenisantrian_id:_jenisantrian,
            },
            success:function(data){
                console.log(data);

            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            }
        });
    });

    $('#umum').on('submit', function(e) {
        e.preventDefault();
        var _jenisantrian = $('#jenis_umum').val();
        $.ajax({
            type:'POST',
            dataType:'JSON',
            url:'{{url('antrian')}}',
            data:{
                jenisantrian_id:_jenisantrian,
            },
            success:function(data){
                console.log(data);

            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            }
        });
    });




</script>
@stop




