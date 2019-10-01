
@extends('adminlte::page')

@section('title', 'Kelola Jenis Antrian')

@section('content_header')
    <h1>
        <i class="fa fa-plus"></i>
        Tambah Jenis Antrian
       <small></small>
   </h1>
   <ol class="breadcrumb">
     <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
     <li class="active">Tambah Jenis Antrian</li>

   </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="box box-success">
                <div class="box-body">
                    @if ($errors->any())
                        <div id ="flash_message"  class="alert alert-warning alert-dismissible">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    {{ Form::open(array('url' => 'jenisantrian')) }}

                        <div class="form-group">
                            {{ Form::label('name', 'Nama Antrian') }}
                            {{ Form::text('name', '', array('class' => 'form-control')) }}
                        </div>
                        <button class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-floppy-saved"></i> Simpan</button>
                        <a href="{{ route('jenisantrian.index') }}" class="btn btn-sm btn-success"><i class="fa fa-arrow-left"></i> &nbsp; Kembali</a>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>


@stop

@section('css')
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

<script>
    $(document).ready(function(){
        setTimeout(function() {
            $('#flash_message').fadeOut('fast');
        }, 5000);
    });
    </script>
@stop




