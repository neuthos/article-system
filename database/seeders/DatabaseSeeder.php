<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use App\Models\Category;
use App\Models\Level;
use App\Models\Article;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Nonaktifkan foreign key constraint
        Schema::disableForeignKeyConstraints();

        // Bersihkan semua data dari tabel secara manual
        User::truncate();
        Category::truncate();
        Level::truncate();
        Article::truncate();

        // Aktifkan kembali foreign key constraint
        Schema::enableForeignKeyConstraints();

        // 1. Buat Users
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
            User::create([
                'name' => $userData['name'],
                'email' => $userData['email'],
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'remember_token' => Str::random(10),
            ]);
        }

        // 2. Buat Categories
        $categories = [
            [
                'name' => 'Technology',
                'description' => 'Articles about the latest technology trends and innovations'
            ],
            [
                'name' => 'Health',
                'description' => 'Articles about health, wellness, and medical advancements'
            ],
            [
                'name' => 'Science',
                'description' => 'Articles about scientific discoveries and research'
            ],
            [
                'name' => 'Business',
                'description' => 'Articles about business strategies, entrepreneurship, and economics'
            ],
            [
                'name' => 'Environment',
                'description' => 'Articles about environmental issues and sustainability'
            ]
        ];

        $categoryInstances = [];
        foreach ($categories as $category) {
            $categoryModel = Category::create([
                'name' => $category['name'],
                'slug' => Str::slug($category['name']),
                'description' => $category['description']
            ]);
            $categoryInstances[] = $categoryModel;
        }

        // 3. Buat Levels
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

        $levelInstances = [];
        foreach ($levels as $level) {
            $levelModel = Level::create([
                'name' => $level['name'],
                'slug' => Str::slug($level['name']),
                'description' => $level['description']
            ]);
            $levelInstances[] = $levelModel;
        }

        // 4. Buat Articles (tambahkan beberapa artikel sebagai contoh)
        $articles = [
            [
                'title' => 'The Future of Artificial Intelligence in Healthcare',
                'author' => 'Dr. Sarah Johnson',
                'summary' => 'Exploring how AI is revolutionizing medical diagnosis, treatment planning, and patient care.',
                'content' => '<p>Artificial Intelligence is transforming healthcare in unprecedented ways.</p>',
                'published' => true,
                'published_at' => Carbon::now()->subDays(5)
            ],
            [
                'title' => 'Sustainable Architecture: Building for a Greener Future',
                'author' => 'Michael Chen',
                'summary' => 'How innovative design approaches are creating eco-friendly buildings that minimize environmental impact.',
                'content' => '<p>Sustainable architecture represents a critical response to climate change and environmental degradation.</p>',
                'published' => true,
                'published_at' => Carbon::now()->subDays(7)
            ],
            // Tambahkan artikel lain sesuai kebutuhan
        ];

        foreach ($articles as $index => $article) {
            Article::create([
                'title' => $article['title'],
                'author' => $article['author'],
                'summary' => $article['summary'],
                'content' => $article['content'],
                'published' => $article['published'],
                'published_at' => $article['published_at'],
                'slug' => Str::slug($article['title']) . '-' . ($index + 1),
                'category_id' => $categoryInstances[array_rand($categoryInstances)]->id,
                'level_id' => $levelInstances[array_rand($levelInstances)]->id
            ]);
        }
    }
}
