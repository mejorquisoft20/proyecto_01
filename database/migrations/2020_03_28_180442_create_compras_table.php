<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_factura');
            $table->string('nit_proovedor');
            $table->string('nombre_proovedor');
            $table->string('num_factura');
            $table->string('num_dui');
            $table->string('num_autorizacion');
            $table->double('importe_total_compra',8,2);
            //$table->double('ice',8,2);
            $table->double('importe_nscf',8,2);
            $table->double('subtotal',8,2);
            $table->double('descuentos',8,2);
            $table->double('importe_bpcf',8,2);
            $table->double('credito_fiscal',8,2);
            $table->string('codigo_control');
            $table->string('tipo_compra');
            
            $table->integer('id_cliente');
            $table->integer('id_folio');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('compras');
    }
}
