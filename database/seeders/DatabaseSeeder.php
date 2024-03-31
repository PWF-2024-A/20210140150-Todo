<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Todo;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create(
            [
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'email_verified_at' => now(),
                'password' => 'adminkasep',
                'remember_token' => Str::random(10),
                'is_admin' => true,
            ]
        );
        User::create(
            [
                'name' => 'Mochamad Aldi Raihan Fachrizal',
                'email' => 'aldiraihan@gmail.com',
                'email_verified_at' => now(),
                'password' => 'aldikasep',
                'remember_token' => Str::random(10),
                'is_admin' => false
            ]
        );
        User::factory(100)->create();
        Todo::factory(500)->create([
            'user_id' => function () {
                return User::inRandomOrder()->first()->id;
            },
        ]);

    }
}

