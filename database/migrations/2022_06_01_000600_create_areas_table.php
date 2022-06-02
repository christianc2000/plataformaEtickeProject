<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('areas', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('capacidadA');
            $table->decimal('precioEntradas',8,2);
            $table->foreignId('seccion_localidad_id')->references('id')->on('seccion_localidads')->onDelete('set null');
            $table->foreignId('localidad_evento_id')->references('id')->on('localidad_eventos')->onDelete('set null');
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
        Schema::dropIfExists('areas');
    }
};
