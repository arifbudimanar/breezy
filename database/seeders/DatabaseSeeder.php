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
        User::factory()
            ->admin()
            ->verified()
            ->emailVerified()
            ->create([
                'name' => 'Admin',
                'email' => 'admin@admin.com',
            ]);
        User::factory()
            ->admin()
            ->verified()
            ->emailVerified()
            ->create([
                'name' => 'Arif Budiman Arrosyid',
                'email' => 'arifbudimanarrosyid@gmail.com',
            ]);

        User::factory(6)
            ->user()
            ->emailVerified()
            ->notVerified()
            ->create();
        User::factory(6)
            ->user()
            ->emailVerified()
            ->verified()
            ->create();
        User::factory(6)
            ->user()
            ->emailNotVerified()
            ->notVerified()
            ->create();
        User::factory(6)
            ->admin()
            ->verified()
            ->emailVerified()
            ->create();
    }
}
