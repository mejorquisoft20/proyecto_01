<?php

namespace App\Http\Controllers;
use App\Cliente;
use App\Compra;
use App\FolioCompra;

use Illuminate\Http\Request;

class CompraController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        //
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        $data = request()->validate([
            'fecha_factura' => 'required',
            'nit_proovedor' => 'required|max:50',
            'nombre_proovedor' => 'required|max:255',
            'num_factura' => 'required|max:50',
            'num_dui' => 'required|max:50',
            'num_autorizacion' => 'required|max:50',
            'importe_total_compra' => 'required|numeric|numeric',
            'importe_nscf' => 'required|numeric',
            //'ice' => 'required|numeric|max:255',
            'subtotal' => 'required|numeric',
            'descuentos' => 'required| numeric|numeric',
            'importe_bpcf' => 'required|numeric',
            'credito_fiscal' => 'required|numeric',
            'codigo_control' => 'required',
            'tipo_compra' => 'required',
            'id_folio' => 'required|max:255',
            'id_cliente' => 'required|max:255',
        ]);

        $compra = new Compra();
        $compra->fecha_factura = request('fecha_factura');
        $compra->nit_proovedor = request('nit_proovedor');
        $compra->nombre_proovedor = request('nombre_proovedor');
        $compra->num_factura = request('num_factura');
        $compra->num_dui = request('num_dui');
        $compra->num_autorizacion = request('num_autorizacion');
        $compra->importe_total_compra = request('importe_total_compra');
        $compra->importe_nscf = request('importe_nscf');
        //$compra->ice = request('ice');
        $compra->subtotal = request('subtotal');
        $compra->descuentos = request('descuentos');
        $compra->importe_bpcf = request('importe_bpcf');
        $compra->credito_fiscal = request('credito_fiscal');
        $compra->codigo_control = request('codigo_control');
        $compra->tipo_compra = request('tipo_compra');
        $compra->id_cliente = request('id_cliente');
        $compra->id_folio = request('id_folio');
        $compra->save();
        return redirect('/compras/'.$compra->id_cliente);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) 
    {
        $folio = FolioCompra::find($id);
        $cliente = Cliente::find($folio->id_cliente);
        $compras = Compra::where('id_folio',$folio->id)->where('id_cliente',$cliente->id)->get();
        return view('compras.crear',['cliente'=>$cliente,'folio'=>$folio,'compras'=>$compras]); 
    
      
    }

  
    public function edit($id)
    {
        $compra = Compra::find($id);
        $folio = FolioCompra::find($compra->id_folio);
        $cliente = Cliente::find($compra->id_cliente);
        return view('compras.editar',['cliente'=>$cliente,'folio'=>$folio,'compra'=>$compra]);
    }

  
    public function update(Request $request, $id)
    {
        $data = request()->validate([
            'fecha_factura' => 'required',
            'nit_proovedor' => 'required|max:50',
            'nombre_proovedor' => 'required|max:255',
            'num_factura' => 'required|max:50',
            'num_dui' => 'required|max:50',
            'num_autorizacion' => 'required|max:50',
            'importe_total_compra' => 'required|numeric',
            'importe_nscf' => 'required|numeric',
            //'ice' => 'required|numeric|max:255',
            'subtotal' => 'required|numeric',
            'descuentos' => 'required|numeric',
            'importe_bpcf' => 'required|numeric',
            'credito_fiscal' => 'required|numeric',
            'codigo_control' => 'required',
            'tipo_compra' => 'required',
            'id_folio' => 'required|max:255',
            'id_cliente' => 'required|max:255',
        ]);

        $compra = Compra::findOrFail($id);
        $compra->fecha_factura = request('fecha_factura');
        $compra->nit_proovedor = request('nit_proovedor');
        $compra->nombre_proovedor = request('nombre_proovedor');
        $compra->num_factura = request('num_factura');
        $compra->num_dui = request('num_dui');
        $compra->num_autorizacion = request('num_autorizacion');
        $compra->importe_total_compra = request('importe_total_compra');
        //$compra->ice = request('ice');
        $compra->importe_nscf = request('importe_nscf');
        $compra->subtotal = request('subtotal');
        $compra->descuentos = request('descuentos');
        $compra->importe_bpcf = request('importe_bpcf');
        $compra->credito_fiscal = request('credito_fiscal');
        $compra->codigo_control = request('codigo_control');
        $compra->tipo_compra = request('tipo_compra');
        $compra->id_cliente = request('id_cliente');
        $compra->id_folio = request('id_folio');
        $compra->save();
        return redirect('/compras/'.$compra->id_cliente);
    }
    
    public function destroy($id)
    {
        $compra = Compra::find($id);
        $compra->delete();
        return redirect('/compras/'.$compra->id_cliente);
        
    }

}
