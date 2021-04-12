<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsuPerMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('global_td_usu_per_menu')->insert([
            'id_usuario' => 1,
            'id_usu_per_menu' => 1,
            'id_permiso' => 1,
            'id_menu' => 1
        ]);

        DB::table('global_td_usu_per_menu')->insert([
            'id_usuario' => 1,
            'id_usu_per_menu' => 1,
            'id_permiso' => 2,
            'id_menu' => 1
        ]);

        DB::table('global_td_usu_per_menu')->insert([
            'id_usuario' => 1,
            'id_usu_per_menu' => 1,
            'id_permiso' => 3,
            'id_menu' => 1
        ]);

        DB::table('global_td_usu_per_menu')->insert([
            'id_usuario' => 1,
            'id_usu_per_menu' => 1,
            'id_permiso' => 5,
            'id_menu' => 1
        ]);

        DB::table('global_td_usu_per_menu')->insert([
            'id_usuario' => 1,
            'id_usu_per_menu' => 1,
            'id_permiso' => 1,
            'id_menu' => 2
        ]);

        DB::table('global_td_usu_per_menu')->insert([
            'id_usuario' => 1,
            'id_usu_per_menu' => 1,
            'id_permiso' => 2,
            'id_menu' => 2
        ]);

        DB::table('global_td_usu_per_menu')->insert([
            'id_usuario' => 1,
            'id_usu_per_menu' => 1,
            'id_permiso' => 3,
            'id_menu' => 2
        ]);

        DB::table('global_td_usu_per_menu')->insert([
            'id_usuario' => 1,
            'id_usu_per_menu' => 1,
            'id_permiso' => 5,
            'id_menu' => 2
        ]);

        DB::table('global_td_usu_per_menu')->insert([
            'id_usuario' => 1,
            'id_usu_per_menu' => 1,
            'id_permiso' => 1,
            'id_menu' => 3
        ]);

        DB::table('global_td_usu_per_menu')->insert([
            'id_usuario' => 1,
            'id_usu_per_menu' => 1,
            'id_permiso' => 2,
            'id_menu' => 3
        ]);

        DB::table('global_td_usu_per_menu')->insert([
            'id_usuario' => 1,
            'id_usu_per_menu' => 1,
            'id_permiso' => 3,
            'id_menu' => 3
        ]);

        DB::table('global_td_usu_per_menu')->insert([
            'id_usuario' => 1,
            'id_usu_per_menu' => 1,
            'id_permiso' => 5,
            'id_menu' => 3
        ]);

        DB::table('global_td_usu_per_menu')->insert([
            'id_usuario' => 1,
            'id_usu_per_menu' => 1,
            'id_permiso' => 1,
            'id_menu' => 4
        ]);

        DB::table('global_td_usu_per_menu')->insert([
            'id_usuario' => 1,
            'id_usu_per_menu' => 1,
            'id_permiso' => 2,
            'id_menu' => 4
        ]);

        DB::table('global_td_usu_per_menu')->insert([
            'id_usuario' => 1,
            'id_usu_per_menu' => 1,
            'id_permiso' => 3,
            'id_menu' => 4
        ]);

        DB::table('global_td_usu_per_menu')->insert([
            'id_usuario' => 1,
            'id_usu_per_menu' => 1,
            'id_permiso' => 5,
            'id_menu' => 4
        ]);
    }
}
