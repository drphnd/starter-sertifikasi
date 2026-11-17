@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div class="mx-auto mt-10 max-w-sm rounded-xl bg-white p-6 shadow">
        <h1 class="mb-6 text-xl font-bold">Login</h1>

        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf
            <x-input label="Email" name="email" type="email" required autofocus />
            <x-input label="Password" name="password" type="password" required />

            <label class="flex items-center gap-2 text-sm">
                <input type="checkbox" name="remember"> Ingat saya
            </label>

            <x-button class="w-full">Masuk</x-button>
        </form>

        <p class="mt-4 text-center text-sm text-gray-600">
            Belum punya akun? <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Daftar</a>
        </p>
    </div>
@endsection
