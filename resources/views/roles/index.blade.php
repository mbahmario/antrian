
{{-- resources/views/posts/index.blade.php --}}

@extends('adminlte::page')

@section('title', 'Manajemen Akses')

@section('content_header')
    <h1>
        <i class="fa fa-shield"></i>
        Manajemen Role
       <small></small>
   </h1>
   <ol class="breadcrumb">
     <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
     <li class="active">List Role</li>
   </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="box box-success">
                <div class="box-body">
                    <a href="{{ URL::to('roles/create') }}" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-plus"></i> &nbsp; Tambah Role</a>

                    <a href="{{ route('users.index') }}" class="btn btn-sm btn-default pull-right"><i class="fa fa-user"></i> &nbsp; User</a>
                    <a href="{{ route('permissions.index') }}" class="btn btn-sm btn-default pull-right"><i class="fa fa-handshake-o"></i> &nbsp; Permissions</a>

                    <hr>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Role</th>
                                    <th>Permissions</th>
                                    <th>Operation</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role)
                                    <tr>
                                        <td>{{ $role->name }}</td>
                                        <td>{{ str_replace(array('[',']','"'),' ', $role->permissions()->pluck('name')) }}</td>{{-- Retrieve array of permissions associated to a role and convert to string --}}
                                        <td>
                                            {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id] ]) !!}
                                            <a href= {{ route('roles.edit', $role->id) }} class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                                            <button class="btn btn-xs btn-danger" onclick="return confirm('Are you sure?')"><i class="glyphicon glyphicon-trash"></i> Hapus</button>
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
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
                url: '{{ url("datauser") }}'
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


