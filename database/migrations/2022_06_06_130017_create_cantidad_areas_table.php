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
        Schema::create('cantidad_areas', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('cantidad');
            $table->decimal('precio');
            $table->unsignedInteger('stock');
            $table->string('prefijo');  
            $table->string('tipo',1); 
            $table->unsignedBigInteger('areaP_id');
            $table->unsignedBigInteger('areaH_id');
            $table->foreign('areaP_id')->references('id')->on('areas')->onDelete('cascade');
            $table->foreign('areaH_id')->references('id')->on('areas')->onDelete('cascade');
            $table->foreignId('fecha_id')->references('id')->on('fechas')->onDelete('cascade');
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
        Schema::dropIfExists('cantidad_areas');
    }
};
