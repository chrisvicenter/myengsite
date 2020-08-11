<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'name' => 'Medium Usuario',
            'email' => 'medi@correo.com',
            'password' => bcrypt('123Nano_100')
        ]);

        App\User::create([
            'name' => 'Viviana',
            'email' => 'Vivi@correo.com',
            'password' => bcrypt('teacherviviana011_V')
        ]);
    }
}
