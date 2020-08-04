<?php

use Illuminate\Database\Seeder;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Unit::create([
            'name' => 'Unit 1',
            'slug' => 'unit-1',
            'body' => 'Unit 1'
        ]);
        /*

        App\Unit::create([
            'name' => 'Unit 2',
            'slug' => 'unit-2',
            'body' => 'Unit 2'
        ]);

        App\Unit::create([
            'name' => 'Unit 3',
            'slug' => 'unit-3',
            'body' => 'Unit 3'
        ]);
        */
    }
}
