<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('global_td_menu')->insert([
            'id_usuario' => 1,
            'id_modulo' => 1,
            'descripcion' => 'LISTAR USUARIOS',
            'url' => 'apiglobal/usuarios/listado',
            'icono' => 'fa fa-plus',
            'orden' => '1',
        ]);

        DB::table('global_td_menu')->insert([
            'id_usuario' => 1,
            'id_modulo' => 2,
            'descripcion' => 'LISTAR APLICATIVOS',
            'url' => 'apiglobal/aplicativos/listado',
            'icono' => 'fa fa-plus',
            'orden' => '1',
        ]);

        DB::table('global_td_menu')->insert([
            'id_usuario' => 1,
            'id_modulo' => 3,
            'descripcion' => 'LISTAR MODULOS',
            'url' => 'apiglobal/modulos/listado',
            'icono' => 'fa fa-plus',
            'orden' => '1',
        ]);

        DB::table('global_td_menu')->insert([
            'id_usuario' => 1,
            'id_modulo' => 4,
            'descripcion' => 'LISTAR MENU',
            'url' => 'apiglobal/menu/listado',
            'icono' => 'fa fa-plus',
            'orden' => '1',
        ]);
    }
}
