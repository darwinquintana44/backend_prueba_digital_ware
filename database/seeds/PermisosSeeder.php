<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermisosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('global_tr_permisos')->insert([
            'id_usuario' => 1,
            'descripcion' => 'GET',
        ]);

        DB::table('global_tr_permisos')->insert([
            'id_usuario' => 1,
            'descripcion' => 'POST',
        ]);

        DB::table('global_tr_permisos')->insert([
            'id_usuario' => 1,
            'descripcion' => 'PATCH',
        ]);

        DB::table('global_tr_permisos')->insert([
            'id_usuario' => 1,
            'descripcion' => 'PUT',
        ]);

        DB::table('global_tr_permisos')->insert([
            'id_usuario' => 1,
            'descripcion' => 'DELETE',
        ]);
    }
}
