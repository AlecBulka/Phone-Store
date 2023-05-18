<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Role::create([
            'role' => 'user'
        ]);

        Role::create([
            'role' => 'admin'
        ]);

        $admin = User::create([
            'name' => 'Alec',
            'email' => 'alec@gmail.com',
            'password' => Hash::make('Alec12345'),
            'role_id' => 2,
        ]);

        $admin->markEmailAsVerified();
    }
}
