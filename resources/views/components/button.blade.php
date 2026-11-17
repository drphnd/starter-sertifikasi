{{--
    Pemakaian:
    <x-button>Simpan</x-button>
    <x-button variant="danger">Hapus</x-button>
    <x-button variant="secondary" href="{{ route('items.index') }}">Batal</x-button>   (jadi link)
--}}
@props(['variant' => 'primary', 'href' => null, 'type' => 'submit'])

@php
    $colors = [
        'primary' => 'bg-blue-600 text-white hover:bg-blue-700',
        'danger' => 'bg-red-600 text-white hover:bg-red-700',
        'secondary' => 'border border-gray-300 bg-white hover:bg-gray-50',
    ];
    $class = 'inline-block rounded-lg px-4 py-2 text-sm font-medium ' . ($colors[$variant] ?? $colors['primary']);
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $class]) }}>{{ $slot }}</a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $class]) }}>{{ $slot }}</button>
@endif
