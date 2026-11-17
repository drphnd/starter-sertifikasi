@extends('layouts.app')

@section('title', 'Items')

@section('content')
    <div class="mb-6 flex flex-wrap items-center justify-between gap-4">
        <h1 class="text-2xl font-bold">Daftar Item</h1>
        <x-button href="{{ route('items.create') }}">+ Tambah Item</x-button>
    </div>

    {{-- Pencarian --}}
    <form method="GET" action="{{ route('items.index') }}" class="mb-4 flex gap-2">
        <input type="text" name="search" value="{{ $search }}" placeholder="Cari nama item..."
               class="w-full max-w-xs rounded-lg border border-gray-300 px-3 py-2">
        <x-button variant="secondary">Cari</x-button>
        @if ($search)
            <x-button variant="secondary" href="{{ route('items.index') }}">Reset</x-button>
        @endif
    </form>

    <div class="overflow-x-auto rounded-xl bg-white shadow">
        <table class="w-full text-left text-sm">
            <thead class="bg-gray-50 text-gray-600">
                <tr>
                    <th class="px-4 py-3">No</th>
                    <th class="px-4 py-3">Nama</th>
                    <th class="px-4 py-3">Stok</th>
                    <th class="px-4 py-3">Dibuat</th>
                    <th class="px-4 py-3 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($items as $item)
                    <tr class="border-t">
                        {{-- Nomor urut yang tetap benar di halaman 2, 3, dst --}}
                        <td class="px-4 py-3">{{ $items->firstItem() + $loop->index }}</td>
                        <td class="px-4 py-3">{{ $item->name }}</td>
                        <td class="px-4 py-3">{{ $item->stock }}</td>
                        <td class="px-4 py-3">{{ $item->created_at->format('d/m/Y') }}</td>
                        <td class="whitespace-nowrap px-4 py-3 text-right">
                            <a href="{{ route('items.show', $item) }}" class="text-gray-600 hover:underline">Detail</a>
                            <a href="{{ route('items.edit', $item) }}" class="ml-3 text-blue-600 hover:underline">Edit</a>
                            <form method="POST" action="{{ route('items.destroy', $item) }}" class="ml-3 inline"
                                  onsubmit="return confirm('Yakin hapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-8 text-center text-gray-500">
                            {{ $search ? 'Tidak ada item dengan nama "' . $search . '".' : 'Belum ada data.' }}
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">{{ $items->links() }}</div>
@endsection
