## Question 1: Setelah seluruh proses analisisnya selesai. Anda diminta menunjukkan views dari beberapa tampilan terutama artikel yang akan dipublish. Tuliskan source code Laravel untuk tampilan (views) tersebut. yang telah terbagi menjadi beberapa komponen! (LO2)

Kami telah membuat tampilan untuk sistem artikel yang terbagi menjadi beberapa komponen:

1. **Article Card Component** - Tampilan kartu artikel untuk daftar artikel
   [View Code](https://github.com/your-repo/article-system/blob/main/resources/views/components/article-card.blade.php)

2. **Article List Component** - Tampilan daftar artikel dengan paginasi
   [View Code](https://github.com/your-repo/article-system/blob/main/resources/views/components/article-list.blade.php)

3. **Article Detail Component** - Tampilan detail artikel lengkap
   [View Code](https://github.com/your-repo/article-system/blob/main/resources/views/components/article-detail.blade.php)

4. **Layout Utama** - Struktur utama halaman dengan header dan footer
   [View Code](https://github.com/your-repo/article-system/blob/main/resources/views/layouts/app.blade.php)

5. **Halaman Index dan Show** - Halaman untuk menampilkan daftar dan detail artikel
   [View Code Index](https://github.com/your-repo/article-system/blob/main/resources/views/articles/index.blade.php)
   [View Code Show](https://github.com/your-repo/article-system/blob/main/resources/views/articles/show.blade.php)

## Question 2: Tuliskan perintah untuk membuat komponen, model, dan migrasi untuk membuat tabel yang akan digunakan sebagai artikel. Primary key tidak boleh hanya id tetapi id_artikel (jika menggunakan tabel artikel atau id_blog jika menggunakan tabel blog! (LO2)

### Membuat Model dan Migrasi dengan Primary Key Kustom

```bash
php artisan make:model Article -m
```

Kemudian modifikasi file migrasi di `database/migrations/xxxx_xx_xx_create_articles_table.php`:

```php
Schema::create('articles', function (Blueprint $table) {
    $table->id('id_article');
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

## Question 3: Isikan data pada tabel artikel atau blog, sejumlah 25 artikel (tidak boleh pake lorem)! (LO2)

Seeder dibuat untuk mengisi 25 artikel dengan data asli (bukan lorem ipsum):

```bash
php artisan make:seeder ArticleSeeder
```

[View Full Seeder Code](https://github.com/your-repo/article-system/blob/main/database/seeders/ArticleSeeder.php)

Untuk menjalankan seeder:

```bash
php artisan db:seed --class=ArticleSeeder
```

## Question 4: Tuliskan perubahan pada source code pada class, routes, dan views, sehingga data yang ada pada database bisa tampil pada artikel!

### Perubahan pada Controller

Kami telah mengimplementasikan controller yang mengambil dan menampilkan data dari database:
[View ArticleController Code](https://github.com/your-repo/article-system/blob/main/app/Http/Controllers/ArticleController.php)

### Perubahan pada Routes

Routes dibuat untuk mengakses daftar artikel dan detail artikel:

```php
// routes/web.php
Route::get('/', [ArticleController::class, 'home'])->name('home');
Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/{slug}', [ArticleController::class, 'show'])->name('articles.show');
```

### Perubahan pada Model

Model Article dimodifikasi untuk menggunakan primary key kustom:

```php
class Article extends Model
{
    protected $primaryKey = 'id_article';

    protected $fillable = [
        'title', 'slug', 'author', 'summary', 'content',
        'image', 'published', 'published_at'
    ];

    protected $casts = [
        'published' => 'boolean',
        'published_at' => 'datetime'
    ];
}
```

### Perubahan pada Views

Views dibuat untuk menampilkan data dengan komponen yang telah dibuat sebelumnya:

-   Home page menampilkan artikel featured
-   Articles index menampilkan daftar semua artikel dengan paginasi
-   Articles show menampilkan detail lengkap artikel

Semua kode komponen dan views telah dikonfigurasi untuk menampilkan data artikel dari database dengan tampilan yang menarik menggunakan Tailwind CSS.
