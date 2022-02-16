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
            $table->integer('ide');
            $table->string('nombre',40);
            $table->string('apellido',40);
            $table->string('metodo_pago',20);
            $table->string('tipo_pago',20);
            $table->decimal('valor',8,3);
            $table->dateTime('fecha_fin',0);
            $table->string('estado')->default('activo');
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
