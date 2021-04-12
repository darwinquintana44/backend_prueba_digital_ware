<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id_tipo_identificacion' => 1,
            'id_usuario' => 1,
            'name' => 'Darwin Eder',
            'last_name' => 'Quintana Chala',
            'identification' => 1110493353,
            'movil' => '3164611659',
            'telephone' => '2655815',
            'direction' => 'Arboleda Campestre conjunto residencial cambulos torre 12 apto 202',
            'email' => 'darwinquintana44@gmail.com',
            'rol' => 'admin',
            'password' => Hash::make('secreto'),
            'password_confirmation' => Hash::make('secreto'),
            'created_at' => \Carbon\Carbon::now()
        ]);

        DB::table('users')->insert([
            'id_tipo_identificacion' => 3,
            'id_usuario' => 1,
            'name' => 'Allison Sophia',
            'last_name' => 'Quintana Sandoval',
            'identification' => 111222333,
            'movil' => '3164611659',
            'telephone' => '2655815',
            'direction' => 'Arboleda Campestre conjunto residencial cambulos torre 12 apto 202',
            'email' => 'allison@correo.com',
            'rol' => 'pasajero',
            'password' => Hash::make('secreto'),
            'password_confirmation' => Hash::make('secreto'),
            'created_at' => \Carbon\Carbon::now()
        ]);

        DB::table('users')->insert([
            'id_tipo_identificacion' => 1,
            'id_usuario' => 1,
            'name' => 'Liliana',
            'last_name' => 'Sandoval Barbosa',
            'identification' => 444555666,
            'movil' => '3164611659',
            'telephone' => '2655815',
            'direction' => 'Arboleda Campestre conjunto residencial cambulos torre 12 apto 202',
            'email' => 'liliana@correo.com',
            'rol' => 'piloto',
            'password' => Hash::make('secreto'),
            'password_confirmation' => Hash::make('secreto'),
            'created_at' => \Carbon\Carbon::now()
        ]);

        DB::table('users')->insert([
            'id_tipo_identificacion' => 3,
            'id_usuario' => 1,
            'name' => 'Erick Santiago',
            'last_name' => 'Bermudez Sandoval',
            'identification' => 777888999,
            'movil' => '3164611659',
            'telephone' => '2655815',
            'direction' => 'Arboleda Campestre conjunto residencial cambulos torre 12 apto 202',
            'email' => 'erick@correo.com',
            'rol' => 'pasajero',
            'password' => Hash::make('secreto'),
            'password_confirmation' => Hash::make('secreto'),
            'created_at' => \Carbon\Carbon::now()
        ]);
    }
}
