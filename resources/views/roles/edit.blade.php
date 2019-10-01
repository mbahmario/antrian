
{{-- resources/views/posts/index.blade.php --}}

@extends('adminlte::page')

@section('title', 'Manajemen Akses')

@section('content_header')
    <h1>
        <i class="fa fa-edit"></i>
        Edit Role
       <small></small>
   </h1>
   <ol class="breadcrumb">
     <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
     <li class="active">Edit Role</li>
   </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="box box-success">
                <div class="box-body">
                    <a href="{{ URL::to('roles/index') }}" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-th"></i> &nbsp; List Role</a>

                    <a href="{{ route('users.index') }}" class="btn btn-sm btn-default pull-right"><i class="fa fa-user"></i> &nbsp; User</a>
                    <a href="{{ route('permissions.index') }}" class="btn btn-sm btn-default pull-right"><i class="fa fa-handshake-o"></i> &nbsp; Permissions</a>

                    <hr>
                    {{ Form::model($role, array('route' => array('roles.update', $role->id), 'method' => 'PUT')) }}

                        <div class="form-group">
                            {{ Form::label('name', 'Role Name') }}
                            {{ Form::text('name', null, array('class' => 'form-control')) }}
                        </div>

                        <h5><b>Assign Permissions</b></h5>
                        <div class="well">
                        <div class='form-group'>
                            @foreach ($permissions as $permission)
                            <div class="col-md-3">
                                {{Form::checkbox('permissions[]',  $permission->id, $role->permissions ) }}
                                {{Form::label($permission->name, ucfirst($permission->name)) }}<br>
                            </div>
                            @endforeach
                        </div>
                </div>


                </div>
                <div class="box-footer">
                    <button class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-floppy-saved"></i> Simpan</button>
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


