<?php

namespace Database\Seeders;

use App\Models\Document;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // User::factory()->create([
        //     'name' => 'Rudi Aristanto',
        //     'email' => 'rudi@gmail.com',
        //     'password' => Hash::make('admin123'),
        // ]);

        Document::factory()->count(50)->create();
    }
}
