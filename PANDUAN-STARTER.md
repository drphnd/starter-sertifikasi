# Starter Sertifikasi Laravel

Laravel + Blade + MySQL, dengan auth manual, middleware role, komponen Blade, contoh CRUD, dan halaman error.

## Akun bawaan (setelah seeder)
| Email | Password | Role |
|---|---|---|
| admin@example.com | password | admin |
| user@example.com | password | user |

## Struktur
| File | Isi |
|---|---|
| routes/web.php | 3 grup route: guest, auth, admin (auth + role:admin) |
| app/Http/Middleware/EnsureUserHasRole.php | Middleware `role:admin` |
| app/Http/Controllers/AuthController.php | Login, register, logout |
| app/Http/Controllers/DashboardController.php | Dashboard |
| app/Http/Controllers/ItemController.php | CONTOH CRUD lengkap + search + pagination |
| app/Http/Controllers/Admin/UserController.php | Halaman khusus admin: kelola user |
| app/Models/Item.php | CONTOH model |
| database/migrations/..._add_role_to_users_table.php | Kolom `role` di users |
| database/migrations/..._create_items_table.php | CONTOH tabel |
| database/seeders/AdminSeeder.php | Akun admin & user + data contoh |
| resources/views/layouts/app.blade.php | Layout + navbar (menu admin hanya untuk admin) |
| resources/views/components/ | `<x-input>`, `<x-textarea>`, `<x-button>`, `<x-flash>` |
| resources/views/errors/ | Halaman 403, 404, 419, 500 |

## Langkah tambahan WAJIB: daftarkan middleware
Di `bootstrap/app.php`, isi bagian `withMiddleware`:

```php
->withMiddleware(function (Middleware $middleware): void {
    $middleware->alias([
        'role' => \App\Http\Middleware\EnsureUserHasRole::class,
    ]);
})
```

## Saat ujian: membuat CRUD baru dari soal
1. `php artisan make:model Nama -m` lalu isi kolom di migration, `php artisan migrate`
2. Isi `$fillable` di model
3. `php artisan make:controller NamaController --resource`, tiru isi ItemController
4. Tambah `Route::resource('nama', NamaController::class);` di grup auth (atau admin)
5. Salin folder `resources/views/items` → ganti nama & kolom
6. Tambah menu di `layouts/app.blade.php`
