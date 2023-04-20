<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Arif Budiman Arrosyid',
            'email' => 'arifbudimanarrosyid@gmail.com',
        ]);
        User::factory()->create([
            'name' => 'Not Verified',
            'email' => 'notverifiedaccount@gmail.com',
            'email_verified_at' => null,
        ]);
        User::factory(10)->create();
    }
}
