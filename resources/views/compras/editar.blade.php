@extends('layouts.app')
@section('content')

<div id="titulo">
		<h6 align="center">LIBRO DE COMPRAS IVA</h6>
		<h6> {{$cliente->nombre_empresa}}    NIT: {{$cliente->nit}} @php getdate() @endphp  FOLIO: {{$folio->numero_folio}}</h6>
</div>

	<style>
		#caja{
			background-color: rgb(0, 153, 255);
			height: 270px;
			margin: 15px;
			margin-top: 1px;
			padding: 15px;
			font-size: 11px;
			
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
	<form method="POST" action="/compras/{{$compra->id}}">
		@method('PATCH')
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
				<td ><input type="date" value="{{$compra->fecha_factura}}" id="fecha_factura" name="fecha_factura" style="width: 100px"></td>
					<td ><input type="text" value="{{$compra->nit_proovedor}}" id="nit_proovedor" name="nit_proovedor" style="width: 100px"></td>
					<td ><input type="text" value="{{$compra->nombre_proovedor}}" id="nombre_proovedor" name="nombre_proovedor" style="width: 100px"></td>
					<td ><input type="text" value="{{$compra->num_factura}}" id="num_factura" name="num_factura" style="width: 120px"></td>
					<td ><input type="text" value="{{$compra->num_dui}}" id="num_dui" name="num_dui" style="width: 70px"></td>
					<td ><input type="text" value="{{$compra->num_autorizacion}}" id="num_autorizacion" name="num_autorizacion" style="width: 110px"></td>
					<td ><input type="text" value="{{$compra->importe_total_compra}}" id="importe_total_compra" name="importe_total_compra" style="width: 75px"></td>
					<td ><input type="text" value="{{$compra->importe_nscf}}" id="importe_nscf" name="importe_nscf" style="width: 75px"></td>
					<td ><input type="text" value="{{$compra->subtotal}}" id="subtotal" name="subtotal" style="width: 75px" ></td>
					<td ><input type="text" value="{{$compra->descuentos}}" id="descuentos" name="descuentos" style="width: 75px"></td>
					<td ><input type="text" value="{{$compra->importe_bpcf}}" id="importe_bpcf" name="importe_bpcf" style="width: 75px" ></td>
					<td ><input type="text" value="{{$compra->credito_fiscal}}" id="credito_fiscal" name="credito_fiscal" style="width: 75px" ></td>
					<td ><input type="text" value="{{$compra->codigo_control}}" id="codigo_control" name="codigo_control" style="width: 70px" ></td>
					<td ><input type="text" value="{{$compra->tipo_compra}}" id="tipo_compra" name="tipo_compra" style="width: 50px"></td>
				</tr>
			</tbody>
		</table>
			
				<input type="hidden" class="form-control" id="id_folio" name="id_folio" value="{{$folio->id}}">
			  	<input type="hidden" class="form-control" id="id_cliente" name="id_cliente" value="{{$cliente->id}}">
			
		<br><input type="submit" value="MODIFICAR FACTURA " class="btn btn-success form-control" >
		<br><br><a  href="/compras/{{$folio->id}}" class="btn btn-danger form-control">Volver</a>
	  </form>
 </div>
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