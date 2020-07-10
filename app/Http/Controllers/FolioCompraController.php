<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use App\FolioCompra;
use App\Compra;
use App\Exports\ComprasExport;
use Excel;
use App\Exports\FacturasExport;
class FolioCompraController extends Controller
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
            'anio' => 'required',
            'mes' => 'required',
            'numero_folio' => 'required'
           
        ]);
        $FolioCompra = new FolioCompra();
        $FolioCompra->anio = request('anio');
        $FolioCompra->mes = request('mes');
        $FolioCompra->numero_folio = request('numero_folio');
        $FolioCompra->id_cliente = request('id_cliente');
        $FolioCompra->save();
        return redirect('/FolioCompras/'.$FolioCompra->id_cliente);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente = Cliente::find($id);
        $FolioCompra= FolioCompra::where('id_cliente',$cliente->id)->orderBy('numero_folio','desc')->get();
        return view('FolioCompra.indexFolioCompra',['cliente'=>$cliente],['FolioCompra'=>$FolioCompra]);
        //dd($cliente->nombre_empresa);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $folioCompra = FolioCompra::find($id);
        Compra::where('id_folio',"=",$id)->delete();
        $folioCompra->delete();
        return redirect('/FolioCompras/'.$folioCompra->id_cliente);
    }

    
    public function exportExcel($id_folio,$id_cliente){
           
        //return " enviaste folio".$id_folio." cliente ".$id_cliente;
        return Excel::download(new ComprasExport($id_cliente,$id_folio),'FolioCompra__'.$id_cliente.'.xlsx');
     
   }
   public function imprimir($id_folio,$id_cliente){
       $cliente = Cliente::find($id_cliente);
       $folioCompra = FolioCompra::find($id_folio);
       $compras = Compra::where('id_folio',$id_folio)->where('id_cliente',$id_cliente)->get();
       $pdf = \PDF::loadView('compras.pdfCompra',['compras'=>$compras,'cliente'=>$cliente,'folioCompra'=>$folioCompra]);
       return $pdf->stream('primerpdf.pdf');
   }
}
