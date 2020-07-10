<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Cliente;
use App\FolioVenta;
use App\Venta;
use App\Exports\VentasExport;
use Excel;

class FolioVentaController extends Controller
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
        $FolioVenta = new FolioVenta();
        $FolioVenta->anio = request('anio');
        $FolioVenta->mes = request('mes');
        $FolioVenta->numero_folio = request('numero_folio');
        $FolioVenta->id_cliente = request('id_cliente');
        $FolioVenta->save();
        return redirect('/FolioVentas/'.$FolioVenta->id_cliente);
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
        $FolioVenta= FolioVenta::where('id_cliente',$cliente->id)->orderBy('numero_folio','desc')->get();
        return view('FolioVenta.indexFolioVenta',['cliente'=>$cliente],['FolioVenta'=>$FolioVenta]);
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
        $folioVenta = FolioVenta::find($id);
        Venta::where('id_folio',"=",$id)->delete();
        $folioVenta->delete();
        return redirect('/FolioVentas/'.$folioVenta->id_cliente);
    }

    public function exportExcel($id_folio,$id_cliente){
           
        //return " enviaste folio".$id_folio." cliente ".$id_cliente;
        return Excel::download(new VentasExport($id_cliente,$id_folio),'FolioVenta__'.$id_cliente.'.xlsx'); 
    }
    public function imprimir($id_folio,$id_cliente){
        $cliente = Cliente::find($id_cliente);
        $folioVenta = FolioVenta::find($id_folio);
        $ventas = Venta::where('id_folio',$id_folio)->where('id_cliente',$id_cliente)->get();
        $pdf = \PDF::loadView('ventas.pdfVenta',['ventas'=>$ventas,'cliente'=>$cliente,'folioVenta'=>$folioVenta]);
        return $pdf->stream('primerpdf.pdf');
    }
}
