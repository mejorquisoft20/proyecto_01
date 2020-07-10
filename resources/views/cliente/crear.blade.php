@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-3"></div>
		<div class="col-6">
			<h1>CREAR NUEVO CLIENTE</h1>
				@if($errors->any())
					<div class="alert alert-danger" role="alert">
						<ul>
							@foreach($errors->all() as $error)
							<li>{{$error}}</li>
							@endforeach
						</ul>
					</div>
				@endif
				<form method="POST" action="/clientes">
							{{ csrf_field()}}
							<div class="form-group row">
								<label for="nombre_empresa" class="col-sm-5 ">NOMBRE/RAZON SOCIAL</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" id="nombre_empresa" name="nombre_empresa">
								</div>
							</div>
	
							<div class="form-group row">
								<label for="nombre_responsable" class="col-sm-5 ">NOMBRE RESPONSABLE</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" id="nombre_responsable" name="nombre_responsable">
								</div>
							</div>
	
							<div class="form-group row">
								<label for="apellido_responsable" class="col-sm-5 ">APELLIDO RESPONSABLE</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" id="apellido_responsable" name="apellido_responsable">
								</div>
							</div>
	
							<div class="form-group row">
								<label for="nit" class="col-sm-5 ">NIT</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" id="nit" name="nit">
								</div>
							</div>
	
							<div class="form-group row">
								<label for="num_autorizacion" class="col-sm-5 ">N° AUTORIZACION</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" id="num_autorizacion" name="num_autorizacion">
								</div>
							</div>
	
							<div class="form-group row">
								<label for="celular" class="col-sm-5 ">CELULAR</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" id="celular" name="celular">
								</div>
							</div>

							<div class="form-group row">
								<label for="direccion" class="col-sm-5 ">DIRECCION</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" id="direccion" name="direccion">
								</div>
							</div>
	
							<div class="form-group row">
								<label for="actividad" class="col-sm-5 ">ACTIVIDAD</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" id="actividad" name="actividad">
								</div>
							</div>
							
	
							<div class="form-group pt-2">
								<input type="submit" value="CREAR" class="btn btn-primary form-control">
							</div>
				</form>
		</div>
		<div class="col-3"></div>
	</div>
	
	
</div>

@endsection


