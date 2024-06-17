<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = [
            [
               'name'=>'Admin001',
               'email'=>'admin001@email.com',
               'type'=>1,
               'password'=> bcrypt('admin001'),
               'remember_token' => Str::random(10),
               'email_verified_at' => now(),
            ],
            [
               'name'=>'User001',
               'email'=>'user001@email.com',
               'type'=>0,
               'password'=> bcrypt('user001'),
               'remember_token' => Str::random(10),
               'email_verified_at' => now(),
            ],
        ];

        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
