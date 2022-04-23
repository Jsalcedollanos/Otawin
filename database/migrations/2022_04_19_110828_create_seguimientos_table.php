<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeguimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seguimientos', function (Blueprint $table) {
            $table->id();
            $table->integer('n_factura');
            $table->integer('ide');
            $table->string('nombre',40);
            $table->string('apellido',40);
            $table->integer('dia')->default(1);
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->string('estado')->default('activo');
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
        Schema::dropIfExists('seguimientos');
    }
}
