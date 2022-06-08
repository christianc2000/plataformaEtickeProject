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
        Schema::create('sector_areas', function (Blueprint $table) {
            $table->id();
            $table->decimal('precio',8,2);
            $table->string('color');
            $table->foreignId('seccion_localidad_id')->references('id')->on('seccion_localidads');
            $table->foreignId('area_id')->references('id')->on('areas');
            $table->foreignId('localidad_evento_id')->references('id')->on('localidad_eventos');
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
        Schema::dropIfExists('sector_areas');
    }
};
