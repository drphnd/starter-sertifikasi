@extends('layouts.app')

@section('title', $item->name)

@section('content')
    <h1 class="mb-6 text-2xl font-bold">Detail Item</h1>

    <div class="max-w-2xl rounded-xl bg-white p-6 shadow">
        <dl class="grid grid-cols-3 gap-y-3 text-sm">
            <dt class="text-gray-500">Nama</dt>
            <dd class="col-span-2 font-medium">{{ $item->name }}</dd>

            <dt class="text-gray-500">Deskripsi</dt>
            <dd class="col-span-2">{{ $item->description ?: '-' }}</dd>

            <dt class="text-gray-500">Stok</dt>
            <dd class="col-span-2">{{ $item->stock }}</dd>

            <dt class="text-gray-500">Dibuat</dt>
            <dd class="col-span-2">{{ $item->created_at->format('d/m/Y H:i') }}</dd>

            <dt class="text-gray-500">Diperbarui</dt>
            <dd class="col-span-2">{{ $item->updated_at->format('d/m/Y H:i') }}</dd>
        </dl>

        <div class="mt-6 flex gap-3">
            <x-button href="{{ route('items.edit', $item) }}">Edit</x-button>
            <x-button variant="secondary" href="{{ route('items.index') }}">Kembali</x-button>
        </div>
    </div>
@endsection
