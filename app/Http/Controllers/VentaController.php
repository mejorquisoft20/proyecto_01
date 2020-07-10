<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Cliente;
use App\FolioVenta;
use App\Venta;
use App\Exports\ComprasExport;
use Excel;
use App\Exports\FacturasExport;

class VentaController extends Controller
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
        //
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
            'fecha_factura' => 'required',
            'numero_factura' => 'required',
            'numero_autorizacion' => 'required',
            'estado' => 'required',
            'nit_ci_cliente' => 'required',
            'nombre_razon_social' => 'required',
            'importe_a' => 'required|numeric',
            'importe_b' => 'required|numeric',
            'importe_c' => 'required|numeric',
            'importe_d' => 'required|numeric',
            'importe_e' => 'required| numeric',
            'importe_f' => 'required|numeric',
            'importe_g' => 'required|numeric',
            'importe_h' => 'required|numeric',
            'codigo_control' => 'required',
            'id_folio' => 'required',
            'id_cliente' => 'required',
        ]);

        $venta = new Venta();
        $venta->fecha_factura = request('fecha_factura');
        $venta->numero_factura = request('numero_factura');
        $venta->numero_autorizacion = request('numero_autorizacion');
        $venta->estado = request('estado');
        $venta->nit_ci_cliente = request('nit_ci_cliente');
        $venta->nombre_razon_social = request('nombre_razon_social');
        $venta->importe_a = request('importe_a');
        $venta->importe_b = request('importe_b');
        $venta->importe_c = request('importe_c');
        $venta->importe_d = request('importe_d');
        $venta->importe_e = request('importe_e');
        $venta->importe_f = request('importe_f');
        $venta->importe_g = request('importe_g');
        $venta->importe_h = request('importe_h');
        $venta->codigo_control = request('codigo_control');
        $venta->id_cliente = request('id_cliente');
        $venta->id_folio = request('id_folio');
        $venta->save();
        return redirect('/ventas/'.$venta->id_cliente);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $folio = FolioVenta::find($id);
        $cliente = Cliente::find($folio->id_cliente);
        $venta = Venta::where('id_folio',$folio->id)->where('id_cliente',$cliente->id)->get();
        return view('ventas.crear',['cliente'=>$cliente,'folio'=>$folio,'ventas'=>$venta]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $venta = Venta::find($id);
        $folio = FolioVenta::find($venta->id_folio);
        $cliente = Cliente::find($venta->id_cliente);
        return view('ventas.editar',['cliente'=>$cliente,'folio'=>$folio,'venta'=>$venta]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = request()->validate([
            'fecha_factura' => 'required',
            'numero_factura' => 'required',
            'numero_autorizacion' => 'required',
            'estado' => 'required',
            'nit_ci_cliente' => 'required',
            'nombre_razon_social' => 'required',
            'importe_a' => 'required|numeric',
            'importe_b' => 'required|numeric',
            'importe_c' => 'required|numeric',
            'importe_d' => 'required|numeric',
            'importe_e' => 'required| numeric',
            'importe_f' => 'required|numeric',
            'importe_g' => 'required|numeric',
            'importe_h' => 'required|numeric',
            'codigo_control' => 'required',
            'id_folio' => 'required',
            'id_cliente' => 'required',
        ]);

        $venta = Venta::findOrFail($id);
        $venta->fecha_factura = request('fecha_factura');
        $venta->numero_factura = request('numero_factura');
        $venta->numero_autorizacion = request('numero_autorizacion');
        $venta->estado = request('estado');
        $venta->nit_ci_cliente = request('nit_ci_cliente');
        $venta->nombre_razon_social = request('nombre_razon_social');
        $venta->importe_a = request('importe_a');
        $venta->importe_b = request('importe_b');
        $venta->importe_c = request('importe_c');
        $venta->importe_d = request('importe_d');
        $venta->importe_e = request('importe_e');
        $venta->importe_f = request('importe_f');
        $venta->importe_g = request('importe_g');
        $venta->importe_h = request('importe_h');
        $venta->codigo_control = request('codigo_control');
        $venta->id_cliente = request('id_cliente');
        $venta->id_folio = request('id_folio');
        $venta->save();
        return redirect('/ventas/'.$venta->id_cliente);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
