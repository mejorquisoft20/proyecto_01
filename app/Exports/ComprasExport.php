<?php

namespace App\Exports;

use App\Factura;
use App\Compra;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;

class ComprasExport implements FromCollection,WithMapping,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $id_cliente;
    protected $id_folio;
    //protected $dui =0;
    //protected $inscf =0;
    //protected $tipo =1;
    public function __construct($id_cliente,$id_folio){
        $this->id_cliente = $id_cliente;
        $this->id_folio = $id_folio;
    }


    public function map($row): array{
    	return [
    		$row->fecha_factura,
            $row->nit_proovedor,
            $row->nombre_proovedor,
            $row->num_factura,
            $row->num_dui,
            $row->num_autorizacion,
            $row->importe_total_compra,
            $row->importe_nscf,
            $row->subtotal,
            $row->descuentos,
            $row->importe_bpcf,
            $row->credito_fiscal,
            $row->codigo_control,
            $row->tipo_compra
    	];
    }
    public function headings(): array{
    	return [
    		'FECHA DE FACTURA',
    		'NIT PROOVEDOR',
    		'NOMBRE O RAZON',
            'NUMERO FACTURA',
            'NUMERO DUI',
            'NUMERO AUTORIZACION',
            'IMPORTE_TOTAL_COMPRA',
            'IMPORTE_NSCF',
    		'SUBTOTAL',
    		'DESCUENTOS',
            'IMPORTE BPCF',
            'CREDITO_FISCAL',
            'CODIGO DE CONTROL',
            'TIPO DE COMPRA'
    	];
    }

    public function collection()
    {
        return Compra::where('id_folio',$this->id_folio)->where('id_cliente',$this->id_cliente)->get();
    }
}
