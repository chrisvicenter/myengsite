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
            'email' => 'med@correo.com',
            'password' => bcrypt('123')
        ]);

        App\User::create([
            'name' => 'Viviana Chicaiza',
            'email' => 'Vivi@correo.com',
            'password' => bcrypt('vivianateacher')
        ]);
    }
}
