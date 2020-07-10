<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use App\Compra;
use Illuminate\Support\Facades\Auth;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $clientes= Cliente::orderBy('id','asc')->get();
        return view('cliente/index',['clientes' => $clientes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cliente.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'nombre_empresa' => 'required|max:255',
            'nombre_responsable' => 'required|max:255',
            'apellido_responsable' => 'required|max:255',
            'nit' => 'required|max:255',
            'num_autorizacion' => 'required|max:255',
            'celular' => 'required|max:255',
            'direccion' => 'required|max:255',
            'actividad' => 'required|max:255',
        ]);

        $cliente = new Cliente();
        $cliente->nombre_empresa = request('nombre_empresa');
        $cliente->nombre_responsable = request('nombre_responsable');
        $cliente->apellido_responsable = request('apellido_responsable');
        $cliente->nit = request('nit');
        $cliente->num_autorizacion = request('num_autorizacion');
        $cliente->celular = request('celular');
        $cliente->direccion = request('direccion');
        $cliente->actividad = request('actividad');
        $cliente->save();
        return redirect('/clientes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        $cliente = Cliente::find($cliente->id);
        return view('cliente.editar',['cliente' => $cliente]);
       //dd($clientess->nombre_empresa);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Cliente $cliente)
    {
        $data = request()->validate([
            'nombre_empresa' => 'required|max:255',
            'nombre_responsable' => 'required|max:255',
            'apellido_responsable' => 'required|max:255',
            'nit' => 'required|max:255',
            'num_autorizacion' => 'required|max:255',
            'celular' => 'required|max:255',
            'direccion' => 'required|max:255',
            'actividad' => 'required|max:255',
        ]);

        $cliente = Cliente::findOrFail($cliente->id);
        $cliente->nombre_empresa = request('nombre_empresa');
        $cliente->nombre_responsable = request('nombre_responsable');
        $cliente->apellido_responsable = request('apellido_responsable');
        $cliente->nit = request('nit');
        $cliente->num_autorizacion = request('num_autorizacion');
        $cliente->celular = request('celular');
        $cliente->direccion = request('direccion');
        $cliente->actividad = request('actividad');
        $cliente->save();

        return redirect('/clientes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        $clientx = Cliente::find($cliente->id);
        //return view('clients.delete',['client' => $clientx]);
        $clientx->delete();
        return redirect('/clientes');
    }
}
