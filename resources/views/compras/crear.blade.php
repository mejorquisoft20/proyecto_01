@extends('layouts.app')
@section('content')

<div id="titulo">
		<h6 align="center">LIBRO DE COMPRAS IVA</h6>
		<h6>AÑO:&nbsp;{{$folio->anio}}  MES:&nbsp;{{$folio->mes}}</h6>
		<h6>EMPRESA:&nbsp;{{$cliente->nombre_empresa}}   | &nbsp; NIT: {{$cliente->nit}}  FOLIO: {{$folio->numero_folio}}</h6>
</div>

	<style>
		#caja{
			background-color: rgb(0, 153, 255);
			height: 220px;
			margin: 15px;
			margin-top: 1px;
			padding: 15px;
			font-size: 10px;
			
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
	<form method="POST" action="/compras">
		{{csrf_field() }}
		<table>
			<thead>
				<tr>
					<th style="width: 100px">FECHA DE FACTURA</th>
					<th style="width: 100px">NIT PROVEEDOR</th>
					<th style="width: 100px">NOMBRE O RAZON SOCIAL</th>
					<th style="width: 120px">N° DE LA FACTURA</th>
					<th style="width: 70px">N° DE DUI</th>
					<th style="width: 110px">N° DE AUTORIZACION</th>
					<th style="width: 75px">IMPORTE TOTAL DE LA COMPRA (A)</th>
					<th style="width: 75px">IMPORTE NO SUJETO A CREDITO FISCAL,ICE,IEHD (B) 
						<select name="nscf" id="nscf">
							<option value="0" >Seleccione</option>
							<option value="gasolina">GASOLINA</option>
							<option value="ice">ICE</option>
							<option value="iehd">IEHD</option>
						</select></th>
					<th style="width: 75px">SUBTOTAL (C)</th>
					<th style="width: 75px">DESCUENTOS BONIFICACIONES Y REBAJAS OBTENIDAS (D)</th>
					<th style="width: 75px">IMPORTE BASE PARA CREDITO FISCAL (E=C-D)</th>
					<th style="width: 75px">CREDITO FISCAL (F=E*13%)</th>
					<th style="width: 70px">CODIGO DE CONTROL</th>
					<th style="width: 50px">TIPO DE COMPRA</th>
				</tr>
			</thead>
			<tbody>	
				<tr>
					<td ><input type="date"  id="fecha_factura" name="fecha_factura" style="width: 100px" value="{{ old('fecha_factura') }}"></td>
					<td ><input type="text"  id="nit_proovedor" name="nit_proovedor" style="width: 100px" value="{{ old('nit_proovedor') }}"></td>
					<td ><input type="text"  id="nombre_proovedor" name="nombre_proovedor" style="width: 100px" value="{{ old('nombre_proovedor') }}"></td>
					<td ><input type="text"  id="num_factura" name="num_factura" style="width: 120px" value="{{ old('num_factura') }}"></td>
					<td ><input type="text"  id="num_dui" name="num_dui" style="width: 70px" value="{{ old('num_dui') }}"></td>
					<td ><input type="text"  id="num_autorizacion" name="num_autorizacion" style="width: 110px" value="{{ old('num_autorizacion') }}"></td>
					<td ><input type="text"  id="importe_total_compra" name="importe_total_compra" style="width: 75px" value="{{ old('importe_total_compra') }}"></td>
					<td ><input type="text"  id="importe_nscf" name="importe_nscf" style="width: 75px" value="{{ old('importe_nscf') }}"></td>
					<td ><input type="text"  id="subtotal" name="subtotal" style="width: 75px" value="{{ old('subtotal') }}"></td>
					<td ><input type="text"  id="descuentos" name="descuentos" style="width: 75px" value="{{ old('descuentos') }}"></td>
					<td ><input type="text"  id="importe_bpcf" name="importe_bpcf" style="width: 75px" value="{{ old('importe_bpcf') }}"></td>
					<td ><input type="text"  id="credito_fiscal" name="credito_fiscal" style="width: 75px" value="{{ old('credito_fiscal') }}"></td>
					<td ><input type="text"  id="codigo_control" name="codigo_control" style="width: 70px" value="{{ old('codigo_control') }}"></td>
					<td ><input type="text"  id="tipo_compra" name="tipo_compra" style="width: 50px" value="{{ old('tipo_compra') }}"></td>
				</tr>
			</tbody>
		</table>
		{{-- <div class="form-row">
		  <div class="form-group col-md-1">
			<label for="fecha_factura">Fecha Factura/DUI</label>
			<input type="date" class="form-control" id="fecha_factura" name="fecha_factura">
		  </div>
		  <div class="form-group col-md-1">
			<label for="nit_proovedor">NIT proovedor</label>
			<input type="text" class="form-control" id="nit_proovedor" name="nit_proovedor">
		  </div>
		  <div class="form-group col-md-1">
			<label for="nombre_proovedor">Nombre o Razon Social</label>
			<input type="text" class="form-control" id="nombre_proovedor" name="nombre_proovedor">
		  </div>
		  <div class="form-group col-md-1">
			<label for="num_factura">Nro. Factura</label>
			<input type="text" class="form-control" id="num_factura" name="num_factura">
		  </div>
		  <div class="form-group col-md-1">
			<label for="num_dui">Nro. DUI</label>
			<input type="text" class="form-control" id="num_dui" name="num_dui">
		  </div>
		  <div class="form-group col-md-1">
			<label for="num_autorizacion">Nro. Autorizacion</label>
			<input type="text" class="form-control" id="num_autorizacion" name="num_autorizacion">
		  </div> --}}
		 {{--  <div class="form-group col-md-2">
			<label for="codigo_control">Codigo de Control</label>
			<input type="text" class="form-control" id="codigo_control" name="codigo_control">
			</div> --}}
		{{-- </div>
		<div class="form-row">
			<div class="form-group col-md-1">
			  <label for="importe_total_compra">Importe Total</label>
			  <input type="text" class="form-control" id="importe_total_compra" name="importe_total_compra">
			</div>
			<div class="form-group col-md-2">
			  <label for="importe_nscf">Importe No Sujeto a Credito Fiscal</label>
			  <input type="text" class="form-control" id="importe_nscf" name="importe_nscf">
			</div> --}}
			{{-- <div class="form-group col-md-1">
				<label for="iva">IVA %</label>
				<input type="text" class="form-control" id="iva" name="iva">
			</div> --}}
			{{-- <div class="form-group col-md-1">
				<label for="ice">ICE %</label>
				<input type="text" class="form-control" id="ice" name="ice">
			</div> --}}
			{{-- <div class="form-group col-md-1">
			  <label for="subtotal">Subtotal</label>
			  <input type="text" class="form-control" id="subtotal" name="subtotal">
			</div>
			<div class="form-group col-md-1">
			  <label for="descuentos">Descuentos %</label>
			  <input type="text" class="form-control" id="descuentos" name="descuentos">
			</div> --}}
			{{-- <div class="form-group col-md-1">
				<label for="neto">NETO</label>
				<input type="text" class="form-control" id="neto" name="neto" disabled="disabled">
			  </div> --}}
			{{-- <div class="form-group col-md-1">
			  <label for="importe_bpcf">Importe Base para credito Fiscal</label>
			  <input type="text" class="form-control" id="importe_bpcf" name="importe_bpcf">
			</div>
			<div class="form-group col-md-1">
			  <label for="credito_fiscal">Credito Fiscal</label>
			  <input type="text" class="form-control" id="credito_fiscal" name="credito_fiscal">
			</div>
			<div class="form-group col-md-1">
				<label for="codigo_control">Codigo de Control</label>
				<input type="text" class="form-control" id="codigo_control" name="codigo_control">
			</div>
			<div class="form-group col-md-1">
				<label for="tipo_compra">Tipo de Compra</label>
				<input type="text" class="form-control" id="tipo_compra" name="tipo_compra">
			</div>
		  </div> --}}
		 
				
			
	<input type="hidden" class="form-control" id="id_folio" name="id_folio" value="{{$folio->id}}">
	<input type="hidden" class="form-control" id="id_cliente" name="id_cliente" value="{{$cliente->id}}">
	<br><input type="submit" value="AGREGAR FACTURA " class="btn btn-success form-control" >
	</form>
 </div>
 <main>
	<div class="container-fluid">
		<div class="card mb-4">
			<div class="card-header"><i class="fas fa-table mr-1"></i>Facturas de Compras
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					  <thead style="background-color: rgb(0, 153, 255)">
						<tr>
							<th>Nro</th>
						  	<th>Fecha Factura</th>
							<th>Nit proovedor</th>
							<th>Nombre proovedor</th>
							<th>N° Factura</th>
							<th>N° DUI</th>
							<th>N° AUTORIZACION</th>
							<th>Importe Total</th>
							<th>Importe NSCF</th>
							{{-- <th>ICE</th> --}}
							<th>Subtotal</th>
							<th>Descuento</th>
							<th>Importe BPCF</th>
							<th>Credito Fiscal</th>
							<th>Codigo Control</th>
							<th>Tipo Compra</th>
							<th>Acciones</th>
							{{-- <th>Cliente</th>
							<th>Folio</th> --}}
						</tr>
					  </thead>                            
						<tbody>	
							@php $cont = 0 @endphp	
								@foreach ($compras as $item)
								@php $cont ++ @endphp
									<tr>
										<td>@php echo$cont @endphp</td>
										<td>{{$item->fecha_factura}}</td>
										<td>{{$item->nit_proovedor}}</td>
										<td>{{$item->nombre_proovedor}}</td>
										<td>{{$item->num_factura}}</td>
										<td>{{$item->num_dui}}</td>
										<td>{{$item->num_autorizacion}}</td>
										<td>{{$item->importe_total_compra}}</td>
										<td>{{$item->importe_nscf}}</td>
										{{-- <td>{{$item->ice}}</td> --}}
										<td>{{$item->subtotal}}</td>
										<td>{{$item->descuentos}}</td>
										<td>{{$item->importe_bpcf}}</td>
										<td>{{$item->credito_fiscal}}</td>
										<td>{{$item->codigo_control}}</td>
										<td>{{$item->tipo_compra}}</td>
										<td>
											<a href="/compras/{{$item->id}}/edit" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
											<form action="/compras/{{$item->id}}" method="POST" class="d-inline">
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
				<a href="/FolioCompra/excel/{{$folio->id}}/{{$cliente->id}} " class="btn btn-success form-control"> Generar archivo Excel</a>
				@endif
			</div>
			<div class="col-2"></div>
			<div class="col-md-5">
				<a href="/FolioCompra/pdf/{{$folio->id}}/{{$cliente->id}} " class="btn btn-danger form-control" target="_blank"> Generar archivo PDF</a>
			</div>
		</div>
		<hr>
	</div>
	
</main> 
<script type="text/javascript">
		var c=0,e=0,f=0;
	(function(){
		

		document.getElementById('importe_total_compra').addEventListener('keyup',calcular);
		document.getElementById('importe_nscf').addEventListener('keyup',calcular);
		document.getElementById('descuentos').addEventListener('keyup',calcular);
		var nscf = document.getElementById('nscf');
		nscf = addEventListener('change',calcular);
		
	}())

	function  calcular(){
		
			var  a = document.getElementById('importe_total_compra').value;
			 var b = document.getElementById('importe_nscf').value;
			 var d = document.getElementById('descuentos').value;
			 if(nscf.options[nscf.selectedIndex].value=== 'gasolina'){
				b=a*0.30;
				document.getElementById('importe_nscf').value =b.toFixed(2);
			 }else if(nscf.options[nscf.selectedIndex].value=== 'ice'){
				b = document.getElementById('importe_nscf').value;
			 }else if(nscf.options[nscf.selectedIndex].value=== 'iehd'){
				b = document.getElementById('importe_nscf').value;
			 }
			 c = a-b;
			 e = c-d; 
			 f = e*0.13;
			document.getElementById('subtotal').value =c.toFixed(2);
			document.getElementById('importe_bpcf').value =e.toFixed(2);		
			document.getElementById('credito_fiscal').value = f.toFixed(2);
			
	}
</script>

@endsection