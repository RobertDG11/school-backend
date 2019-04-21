<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
           "first_name" => "Razvan",
           "last_name" => "Anton",
           "email" => "razvan@razvan.com",
           "password" => 'aaaaaaaaaa',
           "legitimation_id" => str_random(12)
        ]);
    }
}
