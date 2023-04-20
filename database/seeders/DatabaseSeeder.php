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
        // User with
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'is_admin' => true,
            'is_verified' => true,
        ]);
        // User with no email verification
        User::factory()->create([
            'name' => 'User 1',
            'email' => 'user1@user.com',
            'email_verified_at' => null,
        ]);
        // User with no verified account
        User::factory()->create([
            'name' => 'User 2',
            'email' => 'user2@user.com',
            'is_verified' => false,
        ]);
        User::factory(10)->create();
    }
}
