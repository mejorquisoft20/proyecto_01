@extends('layouts.app')
@section('content')
<style>
    table{
        background-color: white;
    }
    h1{
        margin-bottom:50px;
        background-color: #fff;
        margin-left: 100px;
        margin-right: 100px;
    }
    #caja1{
        height: 350px;
        background-color: rgb(0, 153, 255);
        margin-left:100px;
        padding:15px;
    }
    #caja2{
        height: 350px;
        background-color: rgb(0, 153, 255);
        margin-left:100px;
        padding:10px;
        overflow:scroll;"
    }
    #caja1 label{
        padding-top: 5px;
    }
</style>
<h1 align="center"> Folios de: {{$cliente->nombre_empresa}}</h1>
    @if($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="row">
        <div class="col-3" id="caja1">
            <div class="container">
                <form action="/FolioCompras" method="POST">
                    @csrf
                    <label for="numero_folio">NUMERO FOLIO A CREAR</label>
                    <input type="text"  id="numero_folio" name="numero_folio"  class="form-control">
                    <label for="anio">AÑO</label>
                    <input type="text"  id="anio" name="anio"  class="form-control">
                    <label for="mes">MES</label>
                    <input type="text"  id="mes" name="mes"  class="form-control">
                        
                    <input type="hidden" id="id_cliente" name="id_cliente"  value="{{$cliente->id}}" class="form-control">
                    <hr>
                    <input type="submit" value="guardar" class="btn btn-success form-control">
                </form>
            </div>
        </div>
        <div class="col-6" id="caja2">    
            <div class="container" >
                <table class="table" >
                    <thead>
                        <tr>
                        {{--  <th>id</th> --}}
                            <th>FACTURA DE COMPRAS</th>
                            <th>AÑO</th>
                            <th>MES</th>
                            <th>NUMERO DE FOLIO</th>
                           {{--  <th>id_cliente</th> --}}
                            <th>ACCION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($FolioCompra as $item)
                            <tr>
                                {{-- <td>{{$item->id}}</td> --}}
                                <td><a href="/compras/{{$item->id}}" class="btn btn-primary">Agregar Facturas</a></td>
                                <td>{{$item->anio}}</td>
                                <td>{{$item->mes}}</td>
                                <td>{{$item->numero_folio}}</td>
                               {{--  <td>{{$item->id_cliente}}</td> --}}
                                <td>
                                    <!--<a href="/FolioCompras/{{$item->id}}/{{$cliente->nombre_empresa}}/{{$item->numero_folio}}"> borrar</a>-->
                                    <form action="/FolioCompras/{{$item->id}}" method="POST" class="d-inline">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                    </form>                  
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
   
    
    
    
@endsection