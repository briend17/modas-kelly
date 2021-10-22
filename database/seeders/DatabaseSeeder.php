<?php

namespace Database\Seeders;

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
        /*Usuario administrador de la tienda, el registro de usuarios por interfaz solo crea usuarios de tipo cliente*/
        \App\Models\User::create([
            'name' => 'Kelly Sogamozo',
            'email' => 'admin@modaskelly.com.co',
            'password' => bcrypt('87654321'),
            'profile' => 'Administrador',
        ]);
    }
}
