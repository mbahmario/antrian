{{-- resources/views/posts/index.blade.php --}}

@extends('adminlte::page')

@section('title', 'Manajemen User')

@section('content_header')
    <h1>
        <i class="fa fa-group"></i>
        Manajemen User
       <small></small>
   </h1>
   <ol class="breadcrumb">
     <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
     <li class="active">List user</li>
   </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="box box-solid box-primary">
                <div class="box-header">
                    <h3 class="box-title">List user</h3>
                </div>
                <div class="box-body">
                    <a href="{{ route('users.create') }}" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> &nbsp; Add User</a>
                    <a href="{{ route('roles.index') }}" class="btn btn-sm btn-default pull-right"><i class="fa fa-key"></i> &nbsp; Roles</a>
                    <a href="{{ route('permissions.index') }}" class="btn btn-sm btn-default pull-right"><i class="fa fa-handshake-o"></i> &nbsp; Permissions</a>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="usertable">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>User Roles</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
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
<script type="text/javascript">
    $(function() {
      $('#usertable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{ url("userslist") }}'
            },
                columns: [
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'roles', name: 'roles'},
                {data: 'action', name: 'action', orderable: false, searchable: false}

            ],
        });

    });



</script>

@stop


