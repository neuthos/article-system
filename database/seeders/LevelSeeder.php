<?php

namespace Database\Seeders;

use App\Models\Level;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class LevelSeeder extends Seeder
{
    public function run(): void
    {
        $levels = [
            [
                'name' => 'Beginner',
                'description' => 'Content suitable for beginners with no prior knowledge'
            ],
            [
                'name' => 'Intermediate',
                'description' => 'Content for readers with basic understanding'
            ],
            [
                'name' => 'Advanced',
                'description' => 'In-depth content for experienced readers'
            ],
            [
                'name' => 'Expert',
                'description' => 'Highly technical content for specialists'
            ]
        ];

        foreach ($levels as $level) {
            Level::create([
                'name' => $level['name'],
                'slug' => Str::slug($level['name']),
                'description' => $level['description']
            ]);
        }
    }
}
