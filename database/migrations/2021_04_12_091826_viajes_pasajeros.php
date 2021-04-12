<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ViajesPasajeros extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('viajes_pasajeros', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_completo', 255);
            $table->string('nro_identificacion', 15);
            $table->string('direccion', 255);
            $table->string('telefono', 15);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('viajes_pasajeros');
    }
}
