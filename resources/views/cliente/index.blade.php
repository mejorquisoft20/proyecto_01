@extends('layouts.app')
@section('content')
                <main>
                    <div class="container-fluid">
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Clientes
                              <a href="/clientes/create" class="btn btn-primary btn-lg float-md-right" role="button" aria-pressed="true">Nuevo Cliente</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                      <thead class="">
                                        <tr>
                                            <th>Folio Ventas</th>
                                            <th>Folio Compras</th>
                                            
                                            <th>nomb. razon social</th>
                                            <th>encargado </th>
                                            <th>apellido</th>
                                            <th>nit</th>
                                            <th>N° autorizacion</th>
                                            <th>celular</th>
                                            <th>direccion</th>
                                            <th>actividad</th>
                                            <th>tools</th>
                                        </tr>
                                      </thead>                            
                                        <tbody>
                                          @foreach($clientes as $cliente)
                                          <tr>
                                                  <td><a href="/FolioVentas/{{$cliente->id}}"><i class="fa fa-file"> </i>&nbsp;(V)</a></td>
                                                  <td><a href="/FolioCompras/{{$cliente->id}}"><i class="fa fa-file"> </i>&nbsp;(C)</a></td>
                                                  {{-- <td><a href="/compras/{{$cliente->id}}"><i class="fa fa-file"> </i>compras</a></td> --}}
                                                  <td>{{$cliente->nombre_empresa}}</td> 
                                                  <td>{{$cliente->nombre_responsable}}</td>
                                                  <td>{{$cliente->apellido_responsable}}</td>
                                                  <td>{{$cliente->nit}}</td>
                                                  <td>{{$cliente->num_autorizacion}}</td>
                                                  <td>{{$cliente->celular}}</td>
                                                  <td>{{$cliente->direccion}}</td>
                                                  <td>{{$cliente->actividad}}</td>
                                                  <td>
                                                      <a href="/clientes/{{$cliente->id}}/edit"><i class="fa fa-edit"></i></a>
                                                      <!--<form action='/clientes/{{$cliente->id}}' method="POST" class="d-inline">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger btn-sm">Eliminar{{$cliente->id}}</button>
                                                        
                                                      </form>   -->
                                                      <a class="borrar_cliente" href="#" data-toggle="modal" data-target="#de"><i  class="fa fa-trash"></i></a>
                                                  </td>
                                              </tr>
                                          @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>   
                
                <div class="modal fade" id="de" tabindex="-1" role="dialog" aria-labelledby="exampleModal3Label" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModal3Label">Borrar Cliente</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">x</span>
                        </button>
                      </div>
                      <div id="modalcu" class="modal-body">
                        Seguro que desea eliminar cliente ?
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar </button>
    
                         <form method="POST"  id="form">
                            @method('DELETE')
                            @csrf
                            <a  class="btn btn-primary" onclick="$(this).closest('form').submit();">Borrar</a>
                            
                         </form>
                      </div>
                    </div>
                  </div>
                </div>          
                <script >
                    const enlaces = document.querySelectorAll('.borrar_cliente');
                    const agregarAction= function(evento){
                      var form = document.getElementById('form');
                      form.setAttribute('action','/clientes/'+this.textContent);
                    }
                    enlaces.forEach(enlace =>{
                    enlace.addEventListener('click',agregarAction);
                    })
                </script>
@endsection