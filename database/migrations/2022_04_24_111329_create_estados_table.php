<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estados', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_estado',12);
            $table->timestamps();
        });
        DB::table("estados")
            ->insert([
                "id" => "1",
                "tipo_estado" => "activo",
            ]);
        DB::table("estados")
            ->insert([
                "id" => "2",
                "tipo_estado" => "inactivo",
            ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estados');
    }
}
