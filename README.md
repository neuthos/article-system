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

---

## Question 1: Source Code untuk Model dan Migrasi Kategori serta Level Artikel

### Model Category

[View Category Model Code](https://github.com/neuthos/article-system/blob/main/app/Models/Category.php)

### Model Level

[View Level Model Code](https://github.com/neuthos/article-system/blob/main/app/Models/Level.php)

### Migrasi Categories Table

[View Categories Migration](https://github.com/neuthos/article-system/blob/main/database/migrations/2025_05_11_125835_create_categories_table.php)

### Migrasi Levels Table

[View Levels Migration](https://github.com/neuthos/article-system/blob/main/database/migrations/2025_05_11_125839_create_levels_table.php)

### Migrasi untuk Menambahkan Foreign Key ke Article

[View Foreign Key Migration](https://github.com/neuthos/article-system/blob/main/database/migrations/2025_05_11_125845_add_category_and_level_to_articles.php)

## Question 2: Source Code untuk Insert Data pada Seluruh Tabel

### CategorySeeder

[View CategorySeeder Code](https://github.com/neuthos/article-system/blob/main/database/seeders/CategorySeeder.php)

### LevelSeeder

[View LevelSeeder Code](https://github.com/neuthos/article-system/blob/main/database/seeders/LevelSeeder.php)

### UserSeeder

[View UserSeeder Code](https://github.com/neuthos/article-system/blob/main/database/seeders/UserSeeder.php)

### ArticleSeeder (Updated with Categories and Levels)

[View Updated ArticleSeeder Code](https://github.com/neuthos/article-system/blob/main/database/seeders/ArticleSeeder.php)

### DatabaseSeeder (For Complete Database Seeding)

[View DatabaseSeeder Code](https://github.com/neuthos/article-system/blob/main/database/seeders/DatabaseSeeder.php)

## Question 3: Tampilkan Seluruh Tabel Artikel dan Kategori di Browser

### CategoryController

[View CategoryController Code](https://github.com/neuthos/article-system/blob/main/app/Http/Controllers/CategoryController.php)

### Categories Views

1. **Categories Index View** - Halaman utama yang menampilkan semua kategori
   [View Categories Index](https://github.com/neuthos/article-system/blob/main/resources/views/categories/index.blade.php)
2. **Category Show View** - Halaman yang menampilkan artikel dalam kategori tertentu
   [View Category Show](https://github.com/neuthos/article-system/blob/main/resources/views/categories/show.blade.php)

### Updated ArticleController

[View Updated ArticleController Code](https://github.com/neuthos/article-system/blob/main/app/Http/Controllers/ArticleController.php)

### Updated Routes

[View Updated Routes Code](https://github.com/neuthos/article-system/blob/main/routes/web.php)

## Question 4: Autentikasi dan Otorisasi untuk Melindungi Data

### AuthServiceProvider (Gates Definition)

[View AuthServiceProvider Code](https://github.com/neuthos/article-system/blob/main/app/Providers/AuthServiceProvider.php)

### Middleware untuk Article Ownership

[View ArticleOwnership Middleware](https://github.com/neuthos/article-system/blob/main/app/Http/Middleware/CheckArticleOwnership.php)

### Updated Routes with Auth Protection

[View Protected Routes Code](https://github.com/neuthos/article-system/blob/main/routes/web.php)

### Controller with Authorization

[View Controller with Authorization](https://github.com/neuthos/article-system/blob/main/app/Http/Controllers/ArticleController.php)

Autentikasi dan otorisasi dalam aplikasi Laravel melindungi data dengan:

1. **Autentikasi**: Memverifikasi identitas pengguna melalui login, menyimpan session, dan menggunakan middleware 'auth' untuk membatasi akses ke rute tertentu.

2. **Otorisasi**: Menggunakan Gates dan Policies untuk membatasi akses berdasarkan peran pengguna, seperti membatasi edit/delete artikel hanya untuk pemilik atau admin.

3. **Middleware Kustom**: Middleware seperti CheckArticleOwnership memeriksa kepemilikan artikel sebelum mengizinkan tindakan edit/delete.

4. **Validasi Request**: Memastikan data yang dikirimkan melalui form valid dan memenuhi aturan keamanan.

5. **CSRF Protection**: Laravel menyediakan perlindungan CSRF bawaan untuk melindungi dari serangan cross-site request forgery.

Implementasi ini memastikan bahwa hanya pengguna yang terautentikasi dan terotorisasi yang dapat membuat, mengedit atau menghapus artikel, sementara pengunjung biasa hanya dapat melihat artikel yang dipublikasikan.
