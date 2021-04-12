<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TipoIdentificacionSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(PermisosSeeder::class);
        $this->call(AplicativosSeeder::class);
        $this->call(ModulosSeeder::class);
        $this->call(MenuSeeder::class);
        $this->call(UsuPerMenuSeeder::class);
    }
}
