@extends('layouts.app')

@section('content')
<div class="container">
	<h1>Crear oficina</h1>
	<form method="POST" action="/oficinas/store">
		{{ csrf_field() }}
		<div class="form-group">
			<label for="empresa">Empresa:</label>
			<input type="text" required="true" name="empresa" class="form-control col-md-6" placeholder="Ingrese empresa">
		</div>
		<div class="form-group">
			<label for="administrador">Administrador:</label>
			<input type="text" required="true" name="administrador" class="form-control col-md-6" placeholder="Ingrese Administrador">
		</div>
		<div class="form-group">
			<label for="ciudad">Ciudad:</label>
			<input type="text" required="true" name="ciudad" class="form-control col-md-6" placeholder="Ingrese ciudad">
		</div>
		<input type="Submit" name="Registrar" class="btn btn-success">
	</form>
</div>
@endsection