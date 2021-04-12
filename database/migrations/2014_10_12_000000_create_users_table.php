<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_tipo_identificacion')->unsigned();
            $table->bigInteger('id_usuario')->unsigned();
            $table->string('name');
            $table->string('last_name');
            $table->bigInteger('identification')->unique();
            $table->string('movil')->nullable();
            $table->string('telephone')->nullable();
            $table->string('direction')->nullable();
            $table->string('email')->unique();
            $table->string('rol', 120);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('password_confirmation');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_tipo_identificacion')->references('id')->on('global_tr_tipo_identificacion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
