<?php

namespace App\Http\Controllers;

use App\Factura;
use App\Client;
use Illuminate\Http\Request;
//use Maatwebsite\Excel\Facades\Excel;
use App\Exports\FacturasExport;
//use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use DB;
use Excel;
class FacturasController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cliente = Client::find($client->id);
        return view('facturas.prueba',['cl'=>$cliente]);
        
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
            'nit_empresa' => 'max:255',
            'num_factura' => 'required',
            'num_autorizacion' => 'required',
            'nom_empresa' => 'required',
            'fac_fecha' => 'required',
            'cod_control' => 'max:255',
            'importe' => 'required',
            'ci' => 'required'
        ]);

        $factura = new Factura();
        $factura->nit_empresa = request('nit_empresa');
        $factura->num_factura = request('num_factura');
        $factura->num_autorizacion = request('num_autorizacion');
        $factura->nom_empresa = request('nom_empresa');
        $factura->fac_fecha = request('fac_fecha');
        $factura->cod_control = request('cod_control');
        $factura->importe = request('importe');
        $factura->ci = request('ci');
        $factura->save();
        return redirect('/cliente/'.request('ci'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function show(Factura $factura)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function edit(Factura $factura)
    {
        $factura = Factura::find($factura->id);
        return view('Facturas.editar',['factura' => $factura]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Factura $factura)
    {
         $data = request()->validate([
            'nit_empresa' => 'max:255',
            'num_factura' => 'required',
            'num_autorizacion' => 'required',
            'nom_empresa' => 'required',
            'fac_fecha' => 'required',
            'cod_control' => 'max:255',
            'importe' => 'required',
            'ci' => 'required'
        ]);

        $factura = Factura::findOrFail($factura->id);
        $factura->nit_empresa = request('nit_empresa');
        $factura->num_factura = request('num_factura');
        $factura->num_autorizacion = request('num_autorizacion');
        $factura->nom_empresa = request('nom_empresa');
        $factura->fac_fecha = request('fac_fecha');
        $factura->cod_control = request('cod_control');
        $factura->importe = request('importe');
        $factura->save();
        return redirect('/cliente/'.request('ci'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Factura  $factura
     * @return \Illuminate\Http\Response
     */
  /*  public function destroy(Request $request)
    {
        $factura = Factura::find($request->factura_id);
        $factura->delete();
        return redirect('/cliente/'.$request->input('ci_enviar'));
        //dd($request);
       
    }*/
      public function destroy($id,Request $request)
    {
        $factura = Factura::find($id);
        //dd($factura);
        $factura->delete();
        return redirect('/cliente/'.$request->input('ci_enviar'));
        //dd($request);
       
    }

    public function exportExcel($ci_pass){
               
         return Excel::download(new FacturasExport($ci_pass),'factura_CI_'.$ci_pass.'.xlsx');
      
    }
}
