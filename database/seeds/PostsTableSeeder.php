<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Post::class, 300)->create()->each(function(App\Post $post){
            $post->groups()->attach([
                rand(1,2),
                rand(2,3),
                rand(3,5),
            ]);
        });
    }
}
