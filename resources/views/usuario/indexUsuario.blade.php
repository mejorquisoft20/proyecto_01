@extends('layouts.app')
@section('content')
@if( Auth::user()->tipo_admin =="Administrador" )  
    <main>
        <div class="container-fluid">
            <div class="card mb-4">
                <div class="card-header"><i class="fas fa-table mr-1"></i>Usuarios
                <a href="/user/create" class="btn btn-primary btn-lg float-md-right" role="button" aria-pressed="true">Nuevo Usuario</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="">
                            <tr>
                                <th>Nombre</th>
                                <th>Nit</th>
                                <th>Email</th>
                                {{-- <th>Password</th> --}}
                                <th>Tipo de Administrador</th>
                            </tr>
                        </thead>                            
                            <tbody>
                            @foreach($users as $user)
                            <tr>
                                    
                                    <td>{{$user->name}}</td> 
                                    <td>{{$user->nit}}</td> 
                                    <td>{{$user->email}}</td> 
                                    {{-- <td>{{$user->password}}</td> --}}
                                    <td>{{$user->tipo_admin}}</td>  
                                
                                    <td>
                                        <a href="/user/{{$user->id}}/edit" class="btn btn-warning btn-sm">Borrar</a>
                                        <form action='/user/{{$user->id}}' method="POST" class="d-inline">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                            
                                        </form> 
                                        {{-- <a class="borrar_usuario" href="#" data-toggle="modal" data-target="#de"><i  class="fa fa-trash"></i></a> --}}
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

@endif
                  
                
                {{-- <div class="modal fade" id="de" tabindex="-1" role="dialog" aria-labelledby="exampleModal3Label" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModal3Label">Borrar Usuario</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">x</span>
                        </button>
                      </div>
                      <div id="modalcu" class="modal-body">
                        Seguro que desea eliminar Usuario ?
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
                </div>  --}}         
                <script >
                    const enlaces = document.querySelectorAll('.borrar_usuario');
                    const agregarAction= function(evento){
                      var form = document.getElementById('form');
                      form.setAttribute('action','/user/'+this.textContent);
                    }
                    enlaces.forEach(enlace =>{
                    enlace.addEventListener('click',agregarAction);
                    })
                </script>
@endsection