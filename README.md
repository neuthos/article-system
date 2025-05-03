# Laravel Article Management System - Assignment Solutions

## Question 1: Views dan Komponen Tampilan

Kami telah membuat tampilan untuk sistem artikel yang terbagi menjadi beberapa komponen:

1. **Article Card Component** - Tampilan kartu artikel untuk daftar artikel
   [View Code](https://github.com/neuthos/article-system/blob/main/resources/views/components/article-card.blade.php)

2. **Article List Component** - Tampilan daftar artikel dengan paginasi
   [View Code](https://github.com/neuthos/article-system/blob/main/resources/views/components/article-list.blade.php)

3. **Article Detail Component** - Tampilan detail artikel lengkap
   [View Code](https://github.com/neuthos/article-system/blob/main/resources/views/components/article-detail.blade.php)

4. **Layout Utama** - Struktur utama halaman dengan header dan footer
   [View Code](https://github.com/neuthos/article-system/blob/main/resources/views/layouts/app.blade.php)

5. **Halaman Index dan Show** - Halaman untuk menampilkan daftar dan detail artikel
   [View Code Index](https://github.com/neuthos/article-system/blob/main/resources/views/articles/index.blade.php)
   [View Code Show](https://github.com/neuthos/article-system/blob/main/resources/views/articles/show.blade.php)

## Question 2: Perintah untuk Membuat Komponen, Model, dan Migrasi

### Membuat Model dan Migrasi dengan Primary Key Kustom

```bash
php artisan make:model Article -m
```

Kemudian modifikasi file migrasi di `database/migrations/xxxx_xx_xx_create_articles_table.php`:

```php
Schema::create('articles', function (Blueprint $table) {
    $table->id('id_article'); // Custom primary key
    $table->string('title');
    $table->string('slug')->unique();
    $table->string('author');
    $table->text('summary');
    $table->longText('content');
    $table->string('image')->nullable();
    $table->boolean('published')->default(false);
    $table->timestamp('published_at')->nullable();
    $table->timestamps();
});
```

### Membuat Controller

```bash
php artisan make:controller ArticleController --resource
```

### Membuat Blade Components

```bash
php artisan make:component ArticleCard
php artisan make:component ArticleList
php artisan make:component ArticleDetail
```

## Question 3: Mengisi Data Artikel

Seeder dibuat untuk mengisi 25 artikel dengan data asli (bukan lorem ipsum):

```bash
php artisan make:seeder ArticleSeeder
```

[View Full Seeder Code](https://github.com/neuthos/article-system/blob/main/database/seeders/ArticleSeeder.php)

Untuk menjalankan seeder:

```bash
php artisan db:seed --class=ArticleSeeder
```

## Question 4: Perubahan pada Source Code untuk Menampilkan Data

### Perubahan pada Class

1. **Model Article** - Menggunakan primary key kustom dan relasi
   [View Model Code](https://github.com/neuthos/article-system/blob/main/app/Models/Article.php)

2. **Component Classes** - Kelas komponen untuk menangani data artikel
   [View ArticleCard Class](https://github.com/neuthos/article-system/blob/main/app/View/Components/ArticleCard.php)
   [View ArticleList Class](https://github.com/neuthos/article-system/blob/main/app/View/Components/ArticleList.php)
   [View ArticleDetail Class](https://github.com/neuthos/article-system/blob/main/app/View/Components/ArticleDetail.php)

3. **Controller** - Mengambil data artikel dari database
   [View ArticleController Code](https://github.com/neuthos/article-system/blob/main/app/Http/Controllers/ArticleController.php)

### Perubahan pada Routes

Route file dengan definisi lengkap untuk sistem artikel:
[View Routes Code](https://github.com/neuthos/article-system/blob/main/routes/web.php)

```php
// routes/web.php
Route::get('/', [ArticleController::class, 'home'])->name('home');
Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/{slug}', [ArticleController::class, 'show'])->name('articles.show');
```

### Perubahan pada Views

1. **Blade Templates** - Template untuk menampilkan data
   [View Home Page](https://github.com/neuthos/article-system/blob/main/resources/views/home.blade.php)
   [View Articles Index](https://github.com/neuthos/article-system/blob/main/resources/views/articles/index.blade.php)
   [View Article Show](https://github.com/neuthos/article-system/blob/main/resources/views/articles/show.blade.php)

2. **Blade Components** - Komponen untuk bagian-bagian UI
   [View Components Folder](https://github.com/neuthos/article-system/blob/main/resources/views/components)

## Cara Menjalankan Aplikasi

1. **Clone Repository**

    ```bash
    git clone https://github.com/neuthos/article-system.git
    cd article-system
    ```

2. **Install Dependencies**

    ```bash
    composer install
    npm install
    ```

3. **Setup Environment**

    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

4. **Konfigurasi Database**

    - Edit file `.env` dan sesuaikan konfigurasi database

5. **Migrasi dan Seeding**

    ```bash
    php artisan migrate:fresh --seed
    ```

6. **Compile Assets**

    ```bash
    npm run dev
    ```

7. **Jalankan Aplikasi**

    ```bash
    php artisan serve
    ```

8. **Akses Aplikasi**
   Buka browser dan akses `http://localhost:8000`
