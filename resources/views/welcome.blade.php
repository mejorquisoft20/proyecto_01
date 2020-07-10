@extends('layouts.app')

@section('content')
    <div class="container">
        @if( Auth::user()->tipo_admin =="Administrador" ) 
                    <div class="row"> 
                        <div class="col-3"></div>
                        <div class="col-6">
                            <a class="btn btn-primary btn-lg" href="{{ url('/clientes/create') }}">Registrar Cliente</a>
                            <a class="btn btn-primary btn-lg" href="">Realizar Venta</a>
                            <a class="btn btn-primary btn-lg" href="">Realizar Compra</a>
                        </div>
                        <div class="col-3"></div> 
                    </div> 
                    <br>
                    <div class="row">
                        <div class="col-3">
                            
                        </div>
                        <div class="col-6">
                            <a class="btn btn-primary btn-lg" href="{{ url('/user') }}">Registrar  Admin</a>
                            <a class="btn btn-primary btn-lg" href="">Configuracion</a>
                            <a class="btn btn-primary btn-lg" href="">Reportes</a>
                        </div>
                        <div class="col-3"></div>
                    </div>
                @endif
                @if( Auth::user()->tipo_admin =="Basico" )  
                    <div class="row"> 
                        <div class="col align-self-start">
                            <a class="btn btn-primary btn-lg" href="{{ url('/clientes/create') }}">Registrar Cliente</a>
                        </div>
                        <div class="col align-self-center">
                            <a class="btn btn-primary btn-lg" href="">Realizar Venta</a>
                        </div>
                        
                    </div> 
                    <div class="row">
                        <div class="col align-self-start">
                            <a class="btn btn-primary btn-lg" href="">Registrar Compra</a>
                        </div>
                        <div class="col align-self-center">
                            <a class="btn btn-primary btn-lg" href="">Reporte</a>
                        </div>
                    </div>   
                @endif 
    </div>
@endsection