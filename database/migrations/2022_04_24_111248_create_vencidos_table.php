<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVencidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Vencido', function (Blueprint $table) {
            $table->id();
            $table->integer('n_factura');
            $table->Biginteger('ide');
            $table->string('nombre',40);
            $table->string('apellido',40);
            $table->string('metodo_pago',20);
	        $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->integer('estado')->default('2');
            $table->foreign('ide')->references('ide')->on('pagos')
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
        Schema::dropIfExists('Vencido');
    }
}
