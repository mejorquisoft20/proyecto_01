<?php

namespace App\Http\Controllers;

use App\Client;
use App\Factura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientsController extends Controller
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
        $clients = Client::orderBy('id','asc')->get();

        return view('clients/index',['clients' => $clients]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.create');
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
            'nit' => 'max:255',
            'nombre' => 'required|max:255',
            'apellido' => 'required|max:255',
            'nacimiento' => 'required|max:255',
            'profesion' => 'required|max:255',
            'ci' => 'required|max:50|unique:clients'
        ]);

        $client = new Client();
        $client->nit = request('nit');
        $client->nombre = request('nombre');
        $client->apellido = request('apellido');
        $client->nacimiento = request('nacimiento');
        $client->profesion = request('profesion');
        $client->ci = request('ci');
        $client->save();
        return redirect('/clients');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //$client = new Client();
        $cliente=Client::find($client->id);
        //$cliente = Client::where('ci','222')->get();
        //$idp = $cliente->ci;
        //dd($idp);
        //var_dump($cliente);
       // $facturas = Factura::where('ci',$client->ci)->orderBy('id','asc')->get();
        return view('facturas.create',['client' => $cliente],['facturas'=>$facturas]);
    }

     public function mostrar($ci)
    {

        $clientes = Client::where('ci',$ci)->orderBy('id','asc')->get();
        $facturas = Factura::where('ci',$ci)->orderBy('id','asc')->get();
        return view('facturas.create',['clientes'=>$clientes],['facturas'=>$facturas]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        $client = Client::find($client->id);
        //return view('clients.edit',['client' => $client]);
        dd($client);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $data = request()->validate([
            
            'nombre' => 'required|max:255',
            'apellido' => 'required|max:255',
            'nacimiento' => 'required|max:255',
            'profesion' => 'required|max:255',
            'ci' => 'required|max:50'
        ]);

        $client = Client::findOrFail($client->id);
        $client->nit = request('nit');
        $client->nombre = request('nombre');
        $client->apellido = request('apellido');
        $client->nacimiento = request('nacimiento');
        $client->profesion = request('profesion');
        $client->ci = request('ci');
        $client->save();
        return redirect('/clients');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $clientx = Client::find($request->client_id);
        //return view('clients.delete',['client' => $clientx]);
        $clientx->delete();
        return redirect('/clients');
    }



}
