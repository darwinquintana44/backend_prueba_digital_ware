<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class GlobalTdUsuPerMenu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('global_td_usu_per_menu', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_usuario')->unsigned();
            $table->bigInteger('id_usu_per_menu')->unsigned();
            $table->bigInteger('id_permiso')->unsigned();
            $table->bigInteger('id_menu')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_usuario')->references('id')->on('users');
            $table->foreign('id_usu_per_menu')->references('id')->on('users');
            $table->foreign('id_permiso')->references('id')->on('global_tr_permisos');
            $table->foreign('id_menu')->references('id')->on('global_td_menu');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('global_td_usu_per_menu');
    }
}
