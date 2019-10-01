@extends('adminlte::page')

@section('title', 'Manajemen Hak Akses')

@section('content_header')
    <h1>
        <i class="fa fa-pencil"></i>
        Tambah Permission
       <small></small>
   </h1>
   <ol class="breadcrumb">
     <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
     <li class="active">Tambah Permission</li>

   </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="box box-success">
                <div class="box-body">
                    <a href="{{ URL::to('permissions/index') }}" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-arrow-left"></i> &nbsp; Kembali</a>

                    <a href="{{ route('users.index') }}" class="btn btn-sm btn-default pull-right"><i class="fa fa-user"></i> &nbsp; User</a>
                    <a href="{{ route('roles.index') }}" class="btn btn-sm btn-default pull-right"><i class="fa fa-shield"></i> &nbsp; Roles</a>

                    <hr>
                    {{ Form::open(array('url' => 'permissions')) }}

                        <div class="form-group">
                            {{ Form::label('name', 'Name') }}
                            {{ Form::text('name', '', array('class' => 'form-control')) }}
                        </div><br>
                        @if(!$roles->isEmpty())
                        <h4>Assign Permission to Roles</h4>
                            <div class="well">
                            @foreach ($roles as $role)
                                {{ Form::checkbox('roles[]',  $role->id ) }}
                                {{ Form::label($role->name, ucfirst($role->name)) }}<br>

                            @endforeach
                            </div>
                        @endif
                        <br>

                        <button class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-floppy-saved"></i> &nbsp; Simpan</button>

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




