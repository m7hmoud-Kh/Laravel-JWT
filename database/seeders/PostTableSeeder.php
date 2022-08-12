<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        for($i=0;$i<15;$i++){
            Post::create([
                'user_id' => User::inRandomOrder()->first()->id,
                'title' => $faker->sentence(4),
                'body' => $faker->paragraph()
            ]);
        }
    }
}
