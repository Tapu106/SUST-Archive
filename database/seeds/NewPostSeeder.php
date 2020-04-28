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
        App\Post::create([

            'name' => 'Tapu',
            'email' => 'tapusust993@gmail.com',
            'password' => bcrypt('password')


        ]);
    }
}
