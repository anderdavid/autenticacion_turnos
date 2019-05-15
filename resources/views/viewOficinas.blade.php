@extends('layouts.app')

@section('content')

<div class="container">
	<table class="table table-striped">
		<thead>
			<tr>
				<th>id</th>
				<th>Empresa</th>
				<th>Administrador</th>
				<th>Ciudad</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($oficinas as $oficina)
			<tr>
				<td>{{$oficina->id}}</td>
				<td>{{$oficina->empresa}}</td>
				<td>{{$oficina->administrador}}</td>
				<td>{{$oficina->ciudad}}</td>
			</tr>

			@endforeach
		</tbody>
	</table>
</div>


@endsection