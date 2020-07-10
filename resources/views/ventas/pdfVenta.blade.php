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
        font-size: 8px;   
       
    }
</style>
<body>
    <h6 align="center">Libro Ventas IVA</h6>
    <h4>Folio: {{$folioVenta->numero_folio}}</h4>
    <h6 >Nombre o Razon Social: {{$cliente->nombre_empresa}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NIT: {{$cliente->nit}}</h6>
    <table  cellspacing=0 cellpadding=2 >
        <thead >
          <tr>
            <th>Nro</th>
            <th>Fecha Factura</th>
            <th>N° Factura</th>
            <th>N° Autorizacion</th>
            <th>Estado</th>
            <th>NIT/CI Cliente</th>
            <th>Nombre/Razon Social</th>
            <th>Importe Total</th>
            <th>Importe ICE/EIHD/
              TASAS</th>
            <th>Exportacion y operaciones externas</th>
            <th>Ventas Gravadas a tasa cero</th>
            <th>Subtotal</th>
            <th>Descuentos, 
              Bonificaciones,
              Rebajas otorgadas</th>
            <th>Importe base para credito fiscal</th>
            <th>Debito Fiscal</th>
            <th>Codigo Control</th>
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
                      </tr>
                  @endforeach					
          </tbody>
      </table>
</body>
</html>