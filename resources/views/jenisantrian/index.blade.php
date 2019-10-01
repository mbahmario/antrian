    {{-- resources/views/posts/index.blade.php --}}

@extends('adminlte::page')

@section('title', 'Kelola Jenis Antrian')

@section('content_header')
    <h1>
        <i class="fa fa-file-archive-o"></i>
        Jenis Antrian
       <small></small>
   </h1>
   <ol class="breadcrumb">
     <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
     <li class="active">List Jenis Antrian</li>
   </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="box box-success">
                <div class="box-body">
                    <a href="{{ route('jenisantrian.create') }}" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> &nbsp; Tambah jenis antrian</a>
                    <hr>
                    @if (Session::has('flash_message'))
                    <div id ="flash_message" class="alert alert-info alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

                        <p><i class="icon fa fa-info"></i>{{ Session::get('flash_message') }}</p>
                    </div><br />
                    @endif
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="jenisantriantable">
                            <thead>
                                <tr>
                                    <th>Nama</th>
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
      $('#jenisantriantable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{ url("datajenisantrian") }}'                },
                columns: [
                {data: 'name', name: 'name'},
                {data: 'action', name: 'action', orderable: false, searchable: false}

            ],
        });

    });



</script>
<script>
$(document).ready(function(){
        setTimeout(function() {
        $('#flash_message').fadeOut('fast');
    }, 5000);
});
</script>
@stop


