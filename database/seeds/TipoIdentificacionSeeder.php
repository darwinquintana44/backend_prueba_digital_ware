<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoIdentificacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('global_tr_tipo_identificacion')->insert([
            'descripcion' => 'CEDULA DE CIUDADANIA',
            'sigla' => 'CC',
            'id_usuario' => '1',
        ]);
        DB::table('global_tr_tipo_identificacion')->insert([
            'descripcion' => 'CEDULA DE EXTRANJERIA',
            'sigla' => 'CE',
            'id_usuario' => '1',
        ]);
        DB::table('global_tr_tipo_identificacion')->insert([
            'descripcion' => 'TARJETA DE IDENTIDAD',
            'sigla' => 'TI',
            'id_usuario' => '1',
        ]);
    }
}
