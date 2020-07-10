@extends('layouts.app')
@section('content')

<div id="titulo">
		<h6 align="center">LIBRO DE VENTAS IVA</h6>
		<h6>AÑO:&nbsp;{{$folio->anio}}  MES:&nbsp;{{$folio->mes}}</h6>
		<h6>EMPRESA:&nbsp;{{$cliente->nombre_empresa}}   | &nbsp; NIT: {{$cliente->nit}}  FOLIO: {{$folio->numero_folio}}</h6>
</div>

	<style>
		#caja{
			width: 99%;
        height: 60px;
        background-color: orange;
        text-align: center;
        padding: 10px;
        margin: 10px;
			
		}
		#titulo{
			background-color: white;
			height: 100px;
			margin: 15px;
			margin-top: 1px;
			padding: 15px;
		}
		td,th{
			border:solid 1px;
			text-align: center;
			padding: 3PX;
		}
		table{
			font-size: 11px;
		}
        
	</style>
		@if($errors->any())
		<div class="alert alert-danger" role="alert">
			<ul>
				@foreach($errors->all() as $error)
				<li>{{$error}}</li>
				@endforeach
			</ul>
		</div>
		@endif
	<div id="caja" >
		{{-- <form method="POST" action="/ventas">
			{{csrf_field() }}
			<table>
				<thead>
					<tr>
						<th style="width: 100px">FECHA FACTURA</th>
						<th style="width: 50px">N° FACTURA</th>
						<th style="width: 100px">N° AUTORIZACION</th>
						<th style="width: 50px">ESTADO 
							<select name="est" id="est" style="width: 50px">
								<option value="0" >Seleccione</option>
								<option value="A">A (anulada)</option>
								<option value="V">V (valida)</option>
								<option value="E">E (extraviada)</option>
								<option value="N">N (no utilizada)</option>
								<option value="C">C (contingencia)</option>
							</select>
						</th>
						<th style="width: 120px">NIT/CI CLIENTE</th>
						<th style="width: 70px">NOMBRE RAZON SOCIAL</th>
						<th style="width: 110px">IMPORTE TOTAL</th>
						<th style="width: 75px">IMPORTE ICE/IEHD/TASAS</th>
						<th style="width: 75px">EXPORTACION Y OPERACIONES EXTERNAS</th>
						<th style="width: 75px">VENTAS GRAVADAS A TASA CERO</th>
						<th style="width: 75px">SUBTOTAL</th>
						<th style="width: 75px">DESCUENTOS,&nbsp; BONIFICACIONES Y REBAJAS OTORGADAS </th>
						<th style="width: 75px">IMPORTE BASE PARA DEBITO FISCAL</th>
						<th style="width: 70px">DEBITO FISCAL</th>
						<th style="width: 50px">CODIGO CONTROL</th>
					</tr>
				</thead>
				<tbody>	
					<tr>
						<td ><input type="date"  id="fecha_factura" name="fecha_factura" style="width: 100px" value="{{ old('fecha_factura') }}"></td>
						<td ><input type="text"  id="numero_factura" name="numero_factura" style="width: 50px" value="{{ old('numero_factura') }}"></td>
						<td ><input type="text"  id="numero_autorizacion" name="numero_autorizacion" style="width: 100px" value="{{$cliente->num_autorizacion}} "></td>
						<td ><input type="text"  id="estado" name="estado" style="width: 50px" value="{{ old('estado') }}"></td>
						<td ><input type="text"  id="nit_ci_cliente" name="nit_ci_cliente" style="width: 70px" value="{{ old('nit_ci_cliente') }}"></td>
						<td ><input type="text"  id="nombre_razon_social" name="nombre_razon_social" style="width: 110px" value="{{ old('nombre_razon_social') }}"></td>
						<td ><input type="text"  id="importe_a" name="importe_a" style="width: 75px" value="{{ old('importe_a') }}"></td>
						<td ><input type="text"  id="importe_b" name="importe_b" style="width: 75px" value="{{ old('importe_b') }}"></td>
						<td ><input type="text"  id="importe_c" name="importe_c" style="width: 75px" value="{{ old('importe_c') }}"></td>
						<td ><input type="text"  id="importe_d" name="importe_d" style="width: 75px" value="{{ old('importe_d') }}"></td>
						<td ><input type="text"  id="importe_e" name="importe_e" style="width: 75px" value="{{ old('importe_e') }}"></td>
						<td ><input type="text"  id="importe_f" name="importe_f" style="width: 75px" value="{{ old('importe_f') }}"></td>
						<td ><input type="text"  id="importe_g" name="importe_g" style="width: 70px" value="{{ old('importe_g') }}"></td>
						<td ><input type="text"  id="importe_h" name="importe_h" style="width: 50px" value="{{ old('importe_h') }}"></td>
						<td ><input type="text"  id="codigo_control" name="codigo_control" style="width: 50px" value="{{ old('codigo_control') }}"></td>
					</tr>
				</tbody>
			</table>		
			<input type="hidden" class="form-control" id="id_folio" name="id_folio" value="{{$folio->id}}">
			<input type="hidden" class="form-control" id="id_cliente" name="id_cliente" value="{{$cliente->id}}">
			<br><input type="submit" value="AGREGAR VENTA" class="btn btn-primary form-control" >
		</form> --}}
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
			Realizar Factua Venta
		</button>
 	</div>
 <main>
	<div class="container-fluid">
		<div class="card mb-4">
			<div class="card-header"><i class="fas fa-table mr-1"></i>Facturas de Ventas
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					  <thead style="background-color:  orange">
						<tr>
							<th>Nro</th>
						  	<th>Fecha Factura</th>
							<th>N° Factura</th>
							<th>N° Autorizacion</th>
							<th>Estado</th>
							<th>NIT/CI Cliente</th>
							<th>Nombre/Razon Social</th>
							<th>Importe Total</th>
							<th>Importe ICE/EIHD/TASAS</th>
							<th>Exportacion y operaciones externas</th>
							<th>Ventas Gravadas a tasa cero</th>
							<th>Subtotal</th>
							<th>Descuentos,
                                Bonificaciones,
                                Rebajas otorgadas</th>
							<th>Importe base para credito fiscal</th>
                            <th>Debito Fiscal</th>
                            <th>Codigo Control</th>
							<th>Acciones</th>
							{{-- <th>Cliente</th>
							<th>Folio</th> --}}
						</tr>
					  </thead>                            
						<tbody>	
							@php $cont = 0 @endphp	
								@foreach ($ventas as $item)
								@php $cont ++ @endphp
									<tr>
										<td>@php echo$cont @endphp</td>
										<td>{{$item->fecha_factura}}</td>
										<td>{{$item->numero_factura}}</td>
										<td>{{$item->numero_autorizacion}}</td>
										<td>{{$item->estado}}</td>
										<td>{{$item->nit_ci_cliente}}</td>
										<td>{{$item->nombre_razon_social}}</td>
										<td>{{$item->importe_a}}</td>
										<td>{{$item->importe_b}}</td>
										<td>{{$item->importe_c}}</td>
										<td>{{$item->importe_d}}</td>
										<td>{{$item->importe_e}}</td>
										<td>{{$item->importe_f}}</td>
										<td>{{$item->importe_g}}</td>
										<td>{{$item->importe_h}}</td>
										<td>{{$item->codigo_control}}</td>
										<td>
											<a href="/ventas/{{$item->id}}/edit" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
											<form action="/ventas/{{$item->id}}" method="POST" class="d-inline">
												@method('DELETE')
												@csrf
												<button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
											</form> 
										</td>
										{{-- <td>{{$item->id_cliente}}</td>
										<td>{{$item->id_folio}}</ --}}
									</tr>
								@endforeach					
						</tbody>
					</table>

				</div>
			</div>
		</div>
		<div class="form-row">
	
			<div class="col-md-5">
				@if(isset($folio->id) &&  isset($cliente->id))
				<a href="/FolioVenta/excel/{{$folio->id}}/{{$cliente->id}} " class="btn btn-success form-control"> Generar archivo Excel</a>
				@endif
			</div>
			<div class="col-2"></div>
			<div class="col-md-5">
				<a href="/FolioVenta/pdf/{{$folio->id}}/{{$cliente->id}} " class="btn btn-danger form-control" target="_blank"> Generar archivo PDF</a>
			</div>
		</div>
		<hr>
	</div>
	
</main> 

<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
aria-hidden="true">
<div class="modal-dialog modal-lg" role="document" id="mimodal">
	<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLongTitle">Factura de Venta</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			<form method="POST" action="/ventas">
				{{csrf_field() }}
				<div class="row">
					<div class="col-3">
						<label for="exampleInputPassword1">Fecha Factura</label>
						<input type="date"  class="form-control" id="fecha_factura" name="fecha_factura"  value="{{ old('fecha_factura') }}">
					</div>
					<div class="col-3">
						<label for="exampleInputPassword1">Numero de Factura</label>
						<input type="text" class="form-control"  id="numero_factura" name="numero_factura" value="{{ old('numero_factura') }}">
					</div>
					<div class="col-3">
						<label for="exampleInputPassword1">Numero de autorizacion</label>
						<input type="text"  class="form-control" id="numero_autorizacion" name="numero_autorizacion"  value="{{$cliente->num_autorizacion}} ">
					</div>
					<div class="col-3">
						<label for="exampleInputPassword1">Estado</label>
						<input type="text" class="form-control" id="estado" name="estado"  value="{{ old('estado') }}">
					</div>
				</div>

				<div class="row">
					<div class="col-6">
						<label for="exampleInputPassword1">Nit/Ci de Cliente</label>
						<input type="text"  id="nit_ci_cliente" name="nit_ci_cliente" class="form-control" value="{{ old('nit_ci_cliente') }}">
					</div>
					<div class="col-6">
						<label for="exampleInputPassword1">Nombre o Razon Social</label>
						<input type="text"  id="nombre_razon_social" name="nombre_razon_social" class="form-control" value="{{ old('nombre_razon_social') }}">
					</div>
				</div>
				<div class="row">
					<div class="col-3">
						<label for="exampleInputPassword1">Importe Total de Venta (A)</label>
						<input type="text"  id="importe_a" name="importe_a" class="form-control" value="{{ old('importe_a') }}">
					</div>
					<div class="col-3">
						<label for="exampleInputPassword1">Importe ICE/EICH/Tasas (B)</label>
						<input type="text"  id="importe_b" name="importe_b" class="form-control" value="{{ old('importe_b') }}">
					</div>
					<div class="col-3">
						<label for="exampleInputPassword1">Exportaciones y Operaciones EXentas (C)</label>
						<input type="text"  id="importe_c" name="importe_c" class="form-control" value="{{ old('importe_c') }}">
					</div>
					<div class="col-3">
						<label for="exampleInputPassword1">Ventas Gravadas a Tasa cero (D)</label>
						<input type="text"  id="importe_d" name="importe_d" class="form-control" value="{{ old('importe_d') }}">
					</div>
				</div>
				<div class="row">
					<div class="col-3">
						<label for="exampleInputPassword1">Subtotal (E)</label>
						<input type="text"  id="importe_e" name="importe_e" class="form-control" value="{{ old('importe_e') }}">
					</div>
					<div class="col-3">
						<label for="exampleInputPassword1">Descuentos Bonificaciones y Rebajas otorgadas (F)</label>
						<input type="text"  id="importe_f" name="importe_f" class="form-control" value="{{ old('importe_f') }}">
					</div>
					<div class="col-3">
						<label for="exampleInputPassword1">Importe base para debito fiscal (G)</label>
						<input type="text"  id="importe_g" name="importe_g" class="form-control" value="{{ old('importe_g') }}">
					</div>
					<div class="col-3">
						<label for="exampleInputPassword1">Debito Fiscal (H)</label>
						<input type="text"  id="importe_h" name="importe_h" class="form-control" value="{{ old('importe_h') }}">
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<label for="exampleInputPassword1">Codigo de Control</label>
						<input type="text"  id="codigo_control" name="codigo_control" class="form-control" value="{{ old('codigo_control') }}">
					</div>	
				</div>
				<input type="hidden" class="form-control" id="id_folio" name="id_folio" value="{{$folio->id}}">
				<input type="hidden" class="form-control" id="id_cliente" name="id_cliente" value="{{$cliente->id}}">
				<br><input type="submit" value="AGREGAR VENTA" class="btn btn-primary form-control" >
			  </form>
		</div>
	</div>
</div>
</div>
<script type="text/javascript">
		var c=0,e=0,f=0;
	(function(){
		

		document.getElementById('importe_a').addEventListener('keyup',calcular);
		document.getElementById('importe_b').addEventListener('keyup',calcular);
		document.getElementById('importe_c').addEventListener('keyup',calcular);
        document.getElementById('importe_d').addEventListener('keyup',calcular);
        document.getElementById('importe_f').addEventListener('keyup',calcular);
		var estado = document.getElementById('estado');
		estado = addEventListener('change',state);
		
	}())

	function  calcular(){
		
			var a = document.getElementById('importe_a').value;
			var b = document.getElementById('importe_b').value;
			var c = document.getElementById('importe_c').value;
            var d = document.getElementById('importe_d').value;
            var f = document.getElementById('importe_f').value;
			
             e=a-b-c-d;
             g=e-f;
             h=g*0.13;
			document.getElementById('importe_e').value =e.toFixed(2);
			document.getElementById('importe_g').value =g.toFixed(2);		
			document.getElementById('importe_h').value = h.toFixed(2);
			
    }
    
    function state(){
        if(est.options[est.selectedIndex].value=== 'A'){
			document.getElementById('estado').value ="A";
		}else if(est.options[est.selectedIndex].value=== 'V'){
            document.getElementById('estado').value ="V";
		}else if(est.options[est.selectedIndex].value=== 'E'){
            document.getElementById('estado').value ="E";
		}else if(est.options[est.selectedIndex].value=== 'N'){
            document.getElementById('estado').value ="N";
		}else if(est.options[est.selectedIndex].value=== 'C'){
            document.getElementById('estado').value ="C";
		}
    }
</script>

@endsection