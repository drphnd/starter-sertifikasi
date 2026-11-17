<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// CONTOH model CRUD. Saat ujian: buat model baru dengan `php artisan make:model NamaModel -m`
class Item extends Model
{
    protected $fillable = ['name', 'description', 'stock'];

    protected function casts(): array
    {
        return [
            'stock' => 'integer',
        ];
    }
}
