<?php

namespace App\Exports;

use App\Factura;
use App\Compra;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;

class FacturasExport implements FromCollection,WithMapping,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $ci;
    public function __construct($ci){
    	$this->ci = $ci;
    }


    public function map($row): array{
    	return [
    		$row->nit_empresa,
            $row->num_factura,
            $row->num_autorizacion,
            $row->nom_empresa,
            $row->fac_fecha,
            $row->cod_control,
            $row->importe
    	];
    }
    public function headings(): array{
    	return [
    		'NIT',
    		'N_FACTURA',
    		'N_AUTORIZACION',
            'EMPRESA',
            'FECHA',
            'COD_CONTROL',
            'IMPORTE'
    	];
    }

    public function collection()
    {
        return Factura::where('ci',$this->ci)->get();
    }
}
