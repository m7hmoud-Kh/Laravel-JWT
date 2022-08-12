<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'mahmoud',
            'email' => 'mahmoud@gmail.com',
            'password' => bcrypt('123456')
        ]);

        User::create([
            'name' => 'khairy',
            'email' => 'khairy@gmail.com',
            'password' => bcrypt('123456')
        ]);

        User::create([
            'name' => 'ahmed',
            'email' => 'ahmed@gmail.com',
            'password' => bcrypt('123456')
        ]);
    }
}
