<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

/**
 * Jalankan: php artisan db:seed --class=AdminSeeder
 *
 * Membuat akun:
 *   admin@example.com / password  (role admin)
 *   user@example.com  / password  (role user)
 */
class AdminSeeder extends Seeder
{
    public function run(): void
    {
        $accounts = [
            ['name' => 'Administrator', 'email' => 'admin@example.com', 'role' => 'admin'],
            ['name' => 'User Biasa', 'email' => 'user@example.com', 'role' => 'user'],
        ];

        foreach ($accounts as $account) {
            $user = User::firstOrNew(['email' => $account['email']]);
            $user->name = $account['name'];
            $user->role = $account['role'];
            $user->password = Hash::make('password');
            $user->email_verified_at = now();
            $user->save();
        }

        // Beberapa data contoh
        if (Item::count() === 0) {
            Item::create(['name' => 'Laptop', 'description' => 'Contoh barang', 'stock' => 5]);
            Item::create(['name' => 'Mouse', 'description' => 'Contoh barang', 'stock' => 20]);
            Item::create(['name' => 'Keyboard', 'description' => null, 'stock' => 12]);
        }
    }
}
