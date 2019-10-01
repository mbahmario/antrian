{!! Form::open(['method' => 'DELETE', 'route' => ['jenisantrian.destroy', $jenisantrian->id] ]) !!}
<a href= {{ route('jenisantrian.edit', $jenisantrian->id) }} class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>
<button class="btn btn-xs btn-danger" onclick="return confirm('Are you sure?')"><i class="glyphicon glyphicon-trash"></i> Hapus</button>
{!! Form::close() !!}
