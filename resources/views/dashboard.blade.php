@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <h1 class="mb-1 text-2xl font-bold">Dashboard</h1>
    <p class="mb-6 text-gray-600">Halo, {{ $user->name }}. Kamu login sebagai <strong>{{ $user->role }}</strong>.</p>

    <div class="mb-8 grid gap-4 sm:grid-cols-3">
        <div class="rounded-xl bg-white p-5 shadow">
            <p class="text-sm text-gray-500">Total Item</p>
            <p class="mt-1 text-2xl font-bold">{{ $totalItems }}</p>
        </div>
        <div class="rounded-xl bg-white p-5 shadow">
            <p class="text-sm text-gray-500">Total Stok</p>
            <p class="mt-1 text-2xl font-bold">{{ number_format($totalStock, 0, ',', '.') }}</p>
        </div>
        <div class="rounded-xl bg-white p-5 shadow">
            <p class="text-sm text-gray-500">Total User</p>
            <p class="mt-1 text-2xl font-bold">{{ $totalUsers }}</p>
        </div>
    </div>

    <div class="rounded-xl bg-white p-6 shadow">
        <div class="mb-4 flex items-center justify-between">
            <h2 class="font-semibold">Item Terbaru</h2>
            <a href="{{ route('items.index') }}" class="text-sm text-blue-600 hover:underline">Lihat semua</a>
        </div>

        @forelse ($latestItems as $item)
            <div class="flex justify-between border-t py-2 text-sm first:border-t-0">
                <a href="{{ route('items.show', $item) }}" class="hover:underline">{{ $item->name }}</a>
                <span class="text-gray-500">Stok: {{ $item->stock }}</span>
            </div>
        @empty
            <p class="text-sm text-gray-500">Belum ada data.</p>
        @endforelse
    </div>
@endsection
