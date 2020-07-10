@extends('layouts.app')
@section('content')

<div id="titulo">
		<h6 align="center">LIBRO DE VENTAS IVA</h6>
		<h6> {{$cliente->nombre_empresa}}    NIT: {{$cliente->nit}} @php getdate() @endphp  FOLIO: {{$folio->numero_folio}}</h6>
</div>

	<style>
		#caja{
			background-color: rgb(201, 161, 29);
			height: 260px;
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
	<form method="POST" action="/ventas/{{$venta->id}}">
		@method('PATCH')
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
					<td ><input type="date" value="{{$venta->fecha_factura}}" id="fecha_factura" name="fecha_factura" style="width: 100px"></td>
					<td ><input type="text" value="{{$venta->numero_factura}}" id="numero_factura" name="numero_factura" style="width: 50px"></td>
					<td ><input type="text" value="{{$venta->numero_autorizacion}}" id="numero_autorizacion" name="numero_autorizacion" style="width: 100px"></td>
					<td ><input type="text" value="{{$venta->estado}}" id="estado" name="estado" style="width: 50px"></td>
					<td ><input type="text" value="{{$venta->nit_ci_cliente}}" id="nit_ci_cliente" name="nit_ci_cliente" style="width: 70px"></td>
					<td ><input type="text" value="{{$venta->nombre_razon_social}}" id="nombre_razon_social" name="nombre_razon_social" style="width: 110px"></td>
					<td ><input type="text" value="{{$venta->importe_a}}" id="importe_a" name="importe_a" style="width: 75px"></td>
					<td ><input type="text" value="{{$venta->importe_b}}" id="importe_b" name="importe_b" style="width: 75px"></td>
					<td ><input type="text" value="{{$venta->importe_c}}" id="importe_c" name="importe_c" style="width: 75px" ></td>
					<td ><input type="text" value="{{$venta->importe_d}}" id="importe_d" name="importe_d" style="width: 75px"></td>
					<td ><input type="text" value="{{$venta->importe_e}}" id="importe_e" name="importe_e" style="width: 75px" ></td>
					<td ><input type="text" value="{{$venta->importe_f}}" id="importe_f" name="importe_f" style="width: 75px" ></td>
					<td ><input type="text" value="{{$venta->importe_g}}" id="importe_g" name="importe_g" style="width: 70px" ></td>
                    <td ><input type="text" value="{{$venta->importe_h}}" id="importe_h" name="importe_h" style="width: 50px"></td>
                    <td ><input type="text" value="{{$venta->codigo_control}}" id="codigo_control" name="codigo_control" style="width: 50px"></td>
				</tr>
			</tbody>
		</table>
			
				<input type="hidden" class="form-control" id="id_folio" name="id_folio" value="{{$folio->id}}">
			  	<input type="hidden" class="form-control" id="id_cliente" name="id_cliente" value="{{$cliente->id}}">
			
		<br><input type="submit" value="MODIFICAR FACTURA " class="btn btn-primary form-control" >
		<br><br><a  href="/ventas/{{$folio->id}}" class="btn btn-danger form-control">Volver</a>
	  </form>
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