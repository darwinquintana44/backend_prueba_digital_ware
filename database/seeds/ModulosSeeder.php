<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModulosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('global_td_modulos')->insert([
            'id_usuario' => 1,
            'id_aplicativo' => 1,
            'descripcion' => 'USUARIOS',
            'icono' => 'fa fa-user',
            'orden' => '1',
        ]);

        DB::table('global_td_modulos')->insert([
            'id_usuario' => 1,
            'id_aplicativo' => 1,
            'descripcion' => 'APLICATIVOS',
            'icono' => 'fa fa-cog',
            'orden' => '2',
        ]);

        DB::table('global_td_modulos')->insert([
            'id_usuario' => 1,
            'id_aplicativo' => 1,
            'descripcion' => 'MODULOS',
            'icono' => 'fa fa-cog',
            'orden' => '3',
        ]);

        DB::table('global_td_modulos')->insert([
            'id_usuario' => 1,
            'id_aplicativo' => 1,
            'descripcion' => 'MENU',
            'icono' => 'fa fa-cog',
            'orden' => '4',
        ]);
    }
}
