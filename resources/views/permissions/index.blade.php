
{{-- resources/views/posts/index.blade.php --}}

@extends('adminlte::page')

@section('title', 'Manajemen Akses')

@section('content_header')
    <h1>
        <i class="fa fa-handshake-o"></i>
        Manajemen Permission
       <small></small>
   </h1>
   <ol class="breadcrumb">
     <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
     <li class="active">List Permission</li>
   </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="box box-success">
                <div class="box-body">
                    <a href="{{ URL::to('permissions/create') }}" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-plus"></i> &nbsp; Tambah Permission</a>

                    <a href="{{ route('users.index') }}" class="btn btn-sm btn-default pull-right"><i class="fa fa-user"></i> &nbsp; User</a>
                    <a href="{{ route('roles.index') }}" class="btn btn-sm btn-default pull-right"><i class="fa fa-shield"></i> &nbsp; Roles</a>

                    <hr>
                    <div class="table-responsive">
                        <table id="permissiontable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Permissions</th>
                                    <th>Operation</th>
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
      $('#permissiontable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{ url("datapermissions") }}'
            },
                columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'action', name: 'action', orderable: false, searchable: false}

            ],
        });

    });



</script>

@stop


