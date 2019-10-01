
@extends('adminlte::page')

@section('title', 'Manajemen User')

@section('content_header')
    <h1>
        <i class="fa fa-user"></i>
        Tambah User
       <small></small>
   </h1>
   <ol class="breadcrumb">
     <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
     <li class="active">Tambah user</li>

   </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="box box-success">

                <div class="box-body">
                    @if (Session::has('flash_message'))
                    <div id ="flash_message" class="alert alert-info alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

                        <p><i class="icon fa fa-info"></i>{{ Session::get('flash_message') }}</p>
                    </div><br />
                    @endif
                    @if (count($errors) > 0)
                    <div class="alert alert-danger" id='flash_message'>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    {{ Form::open(array('url' => 'users')) }}

                        <div class="form-group">
                            {{ Form::label('name', 'Nama') }}
                            {{ Form::text('name', '', array('class' => 'form-control')) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('email', 'Email') }}
                            {{ Form::email('email', '', array('class' => 'form-control')) }}
                        </div>

                        <div class='form-group'>
                            @foreach ($roles as $role)
                                {{ Form::checkbox('roles[]',  $role->id ) }}
                                {{ Form::label($role->name, ucfirst($role->name)) }}<br>

                            @endforeach
                        </div>

                        <div class="form-group">
                            {{ Form::label('password', 'Password') }}<br>
                            {{ Form::password('password', array('class' => 'form-control')) }}

                        </div>

                        <div class="form-group">
                            {{ Form::label('password', 'Confirm Password') }}<br>
                            {{ Form::password('password_confirmation', array('class' => 'form-control')) }}

                        </div>

                        <button class="btn btn-m btn-primary"><i class="glyphicon glyphicon-floppy-saved"></i> Simpan</button>

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




