<?php

namespace App\Exports;

use App\Venta;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;

class VentasExport implements FromCollection,WithMapping,WithHeadings
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
            $row->numero_factura,
            $row->numero_autorizacion,
            $row->estado,
            $row->nit_ci_cliente,
            $row->nombre_razon_social,
            $row->importe_a,
            $row->importe_b,
            $row->importe_c,
            $row->importe_d,
            $row->importe_e,
            $row->importe_f,
            $row->importe_g,
            $row->importe_h,
            $row->codigo_control
            
    	];
    }
    public function headings(): array{
    	return [
    		'FECHA DE FACTURA',
    		'N° FACTURA',
    		'N° AUTORIZACION',
            'ESTADO',
            'NIT/CI',
            'NOMBRE/RAZON SOCIAL',
            'IMPORTE_TOTAL_VENTA',
            'IMPORTE ICE/IEHD/TASA',
    		'EXPORTACION/OPERACIONES EXTERNAS',
    		'VENTAS GRABADAS A CAJA CERO',
            'SUBTOTAL',
            'DESCUENTOS,BONIFICACIONES Y REBAJAS OTORGADAS',
            'IMPORTE BASE PARA DEBITO FISCAL',
            'DEBITO FISCAL',
            'CODIGO DE CONTROL'
            
    	];
    }

    public function collection()
    {
        return Venta::where('id_folio',$this->id_folio)->where('id_cliente',$this->id_cliente)->get();
    }
}
