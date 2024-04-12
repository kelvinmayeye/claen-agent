<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'first_name' => fake()->firstName(),
            'middle_name' => fake()->firstName,
            'last_name' => fake()->lastName,
            'sex' => fake()->randomElement(['female','male']),
            'dob' => fake()->date($format = 'Y-m-d', $max = 'now'),
            'role' => 'admin',
            'email' => 'admin@admin.com',
            'phone_number' => fake()->phoneNumber(),
            'password' => \Hash::make(123),
        ]);
        for ($i=1;$i<4;$i++){
            DB::table('users')->insert([
                'first_name' => fake()->firstName(),
                'middle_name' => fake()->firstName,
                'last_name' => fake()->lastName,
                'sex' => fake()->randomElement(['female','male']),
                'dob' => fake()->date($format = 'Y-m-d', $max = 'now'),
                'role' => fake()->randomElement(['customer','agent']),
                'email' => fake()->email(),
                'phone_number' => fake()->phoneNumber(),
                'password' => \Hash::make(123),
            ]);
        }

    }
}
