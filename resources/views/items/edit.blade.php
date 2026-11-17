@extends('layouts.app')

@section('title', 'Edit Item')

@section('content')
    <h1 class="mb-6 text-2xl font-bold">Edit Item</h1>

    <div class="max-w-2xl rounded-xl bg-white p-6 shadow">
        <form method="POST" action="{{ route('items.update', $item) }}">
            @csrf
            @method('PUT')
            @include('items._form')

            <div class="mt-6 flex gap-3">
                <x-button>Simpan Perubahan</x-button>
                <x-button variant="secondary" href="{{ route('items.index') }}">Batal</x-button>
            </div>
        </form>
    </div>
@endsection
