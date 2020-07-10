<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_factura');
            $table->string('numero_factura');
            $table->string('numero_autorizacion');
            $table->string('estado');
            $table->string('nit_ci_cliente');
            $table->string('nombre_razon_social');
            $table->double('importe_a',8,2);
            $table->double('importe_b',8,2);
            $table->double('importe_c',8,2);
            $table->double('importe_d',8,2);
            $table->double('importe_e',8,2);
            $table->double('importe_f',8,2);
            $table->double('importe_g',8,2);
            $table->double('importe_h',8,2);
            $table->string('codigo_control');
            
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
        Schema::dropIfExists('ventas');
    }
}
