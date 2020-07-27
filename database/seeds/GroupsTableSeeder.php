<?php

use Illuminate\Database\Seeder;

class UnitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Group::create([
            'name' => 'Group A',
            'slug' => 'group-a'
        ]);

        /*
        App\Group::create([
            'name' => 'Group B',
            'slug' => 'group-b'
        ]);

        App\Group::create([
            'name' => 'Group C',
            'slug' => 'group-c'
        ]);

        App\Group::create([
            'name' => 'Group D',
            'slug' => 'group-d'
        ]);

        App\Group::create([
            'name' => 'Group E',
            'slug' => 'group-e'
        ]);
        */
    }
}
