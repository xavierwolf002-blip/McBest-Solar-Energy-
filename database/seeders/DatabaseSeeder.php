<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create admin user
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@lincoln.edu',
            'password' => bcrypt('admin123'),
            'role' => 'admin',
            'student_id' => 'ADMIN001',
            'phone' => '1234567890',
        ]);

        // Create sample student
        User::create([
            'name' => 'John Doe',
            'email' => 'john@lincoln.edu',
            'password' => bcrypt('password'),
            'role' => 'student',
            'student_id' => 'STU001',
            'phone' => '0987654321',
        ]);
    }
}
