@extends('layouts.app')

@section('title', 'Daftar')

@section('content')
    <div class="mx-auto mt-10 max-w-sm rounded-xl bg-white p-6 shadow">
        <h1 class="mb-6 text-xl font-bold">Daftar Akun</h1>

        <form method="POST" action="{{ route('register') }}" class="space-y-4">
            @csrf
            <x-input label="Nama" name="name" required autofocus />
            <x-input label="Email" name="email" type="email" required />
            <x-input label="Password (min. 8 karakter)" name="password" type="password" required />
            <x-input label="Ulangi Password" name="password_confirmation" type="password" required />

            <x-button class="w-full">Daftar</x-button>
        </form>

        <p class="mt-4 text-center text-sm text-gray-600">
            Sudah punya akun? <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Login</a>
        </p>
    </div>
@endsection
