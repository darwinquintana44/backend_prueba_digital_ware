<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AplicativosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('global_tr_aplicativos')->insert([
            'id_usuario' => 1,
            'descripcion' => 'HERRAMIENTAS',
            'icono' => 'fa fa-cog',
            'orden' => '1',
        ]);
    }
}
