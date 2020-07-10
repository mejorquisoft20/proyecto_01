<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF COMPRA</title>
</head>
<style>
    table,thead,tbody,th,td,td{
        border:1px solid;
        font-size: 10px;   
       
    }
</style>
<body>
    <h6 align="center">Libro Compras IVA</h6>
    <h4>Folio: {{$folioCompra->numero_folio}}</h4>
    <h6 >Nombre o Razon Social: {{$cliente->nombre_empresa}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NIT: {{$cliente->nit}}</h6>
    <table  cellspacing=0 cellpadding=2 >
        <thead >
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
                         {{--  <td>{{$item->ice}}</td> --}}
                          <td>{{$item->subtotal}}</td>
                          <td>{{$item->descuentos}}</td>
                          <td>{{$item->importe_bpcf}}</td>
                          <td>{{$item->credito_fiscal}}</td>
                          <td>{{$item->codigo_control}}</td>
                          <td>{{$item->tipo_compra}}</td>
                          
                          {{-- <td>{{$item->id_cliente}}</td>
                          <td>{{$item->id_folio}}</ --}}
                      </tr>
                  @endforeach					
          </tbody>
      </table>
</body>
</html>