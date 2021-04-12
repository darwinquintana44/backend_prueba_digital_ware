<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class GlobalTrTipoIdentificacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('global_tr_tipo_identificacion', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion', 120);
            $table->string('sigla', 2);
            $table->bigInteger('id_usuario')->unsigned();
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
        Schema::dropIfExists('global_tr_tipo_identificacion');
    }
}
