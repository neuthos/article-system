<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Nonaktifkan foreign key constraint sementara
        \DB::statement('PRAGMA foreign_keys = OFF');

        // Hapus semua user kecuali user yang mungkin sedang login
        User::where('email', '!=', 'test@example.com')->delete();

        // Aktifkan kembali foreign key constraint
        \DB::statement('PRAGMA foreign_keys = ON');

        $users = [
            [
                'name' => 'Dr. Sarah Johnson',
                'email' => 'sarah.johnson@example.com',
            ],
            [
                'name' => 'Michael Chen',
                'email' => 'michael.chen@example.com',
            ],
            [
                'name' => 'Alex Rivera',
                'email' => 'alex.rivera@example.com',
            ],
            [
                'name' => 'Jennifer Lee',
                'email' => 'jennifer.lee@example.com',
            ],
            [
                'name' => 'Dr. Maria Rodriguez',
                'email' => 'maria.rodriguez@example.com',
            ],
            [
                'name' => 'Thomas Wilson',
                'email' => 'thomas.wilson@example.com',
            ],
            [
                'name' => 'Emily Parker',
                'email' => 'emily.parker@example.com',
            ],
            [
                'name' => 'David Thompson',
                'email' => 'david.thompson@example.com',
            ],
            [
                'name' => 'Sophia Martinez',
                'email' => 'sophia.martinez@example.com',
            ],
            [
                'name' => 'Dr. James Peterson',
                'email' => 'james.peterson@example.com',
            ]
        ];

        foreach ($users as $userData) {
            // Cek apakah user dengan email ini sudah ada
            if (!User::where('email', $userData['email'])->exists()) {
                User::create([
                    'name' => $userData['name'],
                    'email' => $userData['email'],
                    'email_verified_at' => now(),
                    'password' => Hash::make('password123'),
                    'remember_token' => Str::random(10),
                ]);
            }
        }
    }
}
