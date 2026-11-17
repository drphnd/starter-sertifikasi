<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

/**
 * CONTOH resource controller CRUD lengkap (index, create, store, show, edit, update, destroy).
 * Saat ujian: `php artisan make:controller NamaController --resource`, lalu tiru pola di sini.
 */
class ItemController
{
    public function index(Request $request)
    {
        $search = $request->query('search');

        $items = Item::query()
            ->when($search, fn ($q) => $q->where('name', 'like', "%{$search}%"))
            ->latest()
            ->paginate(10)
            ->withQueryString(); // supaya ?search=... ikut di link halaman berikutnya

        return view('items.index', compact('items', 'search'));
    }

    public function create()
    {
        return view('items.create');
    }

    public function store(Request $request)
    {
        Item::create($this->validateData($request));

        return redirect()->route('items.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function show(Item $item)
    {
        return view('items.show', compact('item'));
    }

    public function edit(Item $item)
    {
        return view('items.edit', compact('item'));
    }

    public function update(Request $request, Item $item)
    {
        $item->update($this->validateData($request));

        return redirect()->route('items.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(Item $item)
    {
        $item->delete();

        return redirect()->route('items.index')->with('success', 'Data berhasil dihapus.');
    }

    private function validateData(Request $request): array
    {
        return $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'stock' => ['required', 'integer', 'min:0'],
        ], [
            'name.required' => 'Nama wajib diisi.',
            'stock.required' => 'Stok wajib diisi.',
            'stock.integer' => 'Stok harus berupa angka.',
            'stock.min' => 'Stok tidak boleh negatif.',
        ]);
    }
}
