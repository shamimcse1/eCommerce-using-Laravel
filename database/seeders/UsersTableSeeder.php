<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

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
            'usertype' => 'Admin',
            'name' => 'Super Admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('admin'),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'usertype' => 'User',
            'name' => 'Super User',
            'email' => 'user@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('user'),
            'remember_token' => Str::random(10),
        ]);
    }
}
