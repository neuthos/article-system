<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        // Nonaktifkan foreign key constraint sementara
        \DB::statement('PRAGMA foreign_keys = OFF');

        // Hapus semua kategori yang ada
        Category::truncate();

        // Aktifkan kembali foreign key constraint
        \DB::statement('PRAGMA foreign_keys = ON');

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

        foreach ($categories as $category) {
            $slug = Str::slug($category['name']);

            // Cek apakah kategori dengan slug ini sudah ada
            if (!Category::where('slug', $slug)->exists()) {
                Category::create([
                    'name' => $category['name'],
                    'slug' => $slug,
                    'description' => $category['description']
                ]);
            }
        }
    }
}
