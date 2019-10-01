{!! Form::open(['method' => 'DELETE', 'route' => ['countertpp.destroy', $countertpp->id] ]) !!}
<a href= {{ route('countertpp.edit', $countertpp->id) }} class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>
<button class="btn btn-xs btn-danger" onclick="return confirm('Are you sure?')"><i class="glyphicon glyphicon-trash"></i> Hapus</button>
{!! Form::close() !!}
