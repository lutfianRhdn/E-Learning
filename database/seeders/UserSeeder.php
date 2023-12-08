<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::create(['name' => fake()->name(),
            'email' => 'admin@test.com',
            'role' => 'admin',
            'email_verified_at' => now(),
            'password' =>  Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);
        \App\Models\User::create([
            'name' => fake()->name(),
            'email' => 'teacher@test.com',
            'role' => 'teacher',
            'email_verified_at' => now(),
            'password' =>  Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);
        \App\Models\User::create([
            'name' => fake()->name(),
            'email' => 'student@test.com',
            'role' => 'student',
            'email_verified_at' => now(),
            'password' =>  Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);
    }
}
