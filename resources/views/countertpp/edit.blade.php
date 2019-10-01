
@extends('adminlte::page')

@section('title', 'Kelola Konter Pendaftaran')

@section('content_header')
    <h1>
        <i class="fa fa-pencil"></i>
        Edit Konter TPP
       <small></small>
   </h1>
   <ol class="breadcrumb">
     <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
     <li class="#">Edit Konter TPP</li>
     <li class="active">{{$countertpp->name}}</li>
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
                    {{ Form::model($countertpp, array('route' => array('countertpp.update', $countertpp->id), 'method' => 'PUT')) }}
                        <div class="form-group">
                            {{ Form::label('name', 'Nama Counter') }}
                            {{ Form::text('name', null, array('class' => 'form-control')) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('user_id', 'Petugas') }}
                            {{  Form::select('user_id',$users,null,['class' => 'required form-control select2','id'=>'testname','placeholder'=>'Pilih petugas']) }}
                        </div>
                        <button class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-floppy-saved"></i> Simpan</button>
                        <a href="{{ route('countertpp.index') }}" class="btn btn-sm btn-success"><i class="fa fa-arrow-left"></i> &nbsp; Kembali</a>

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


@stop



