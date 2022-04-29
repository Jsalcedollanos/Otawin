<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->id();
            $table->integer('n_factura');
            $table->bigInteger('ide');
            $table->string('nombre',40);
            $table->string('apellido',40);
            $table->string('metodo_pago',20);
            $table->string('tipo_pago',20);
            $table->integer('valor');
	        $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->integer('estado')->default('1');
            $table->foreign('ide')->references('ide')->on('clientes')
            ->onDelete('cascade')
            ->onUpdate('cascade');
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
        Schema::dropIfExists('pagos');
    }
}
