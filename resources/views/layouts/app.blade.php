<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') · {{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-gray-100 text-gray-800">

    @auth
        <nav class="bg-white shadow">
            <div class="mx-auto flex max-w-6xl flex-wrap items-center gap-6 px-4 py-4">
                <a href="{{ route('dashboard') }}" class="text-lg font-bold">{{ config('app.name') }}</a>

                @php
                    $menu = [
                        ['label' => 'Dashboard', 'route' => 'dashboard', 'active' => 'dashboard'],
                        ['label' => 'Items', 'route' => 'items.index', 'active' => 'items.*'],
                    ];

                    if (auth()->user()->role === 'admin') {
                        $menu[] = ['label' => 'Kelola User', 'route' => 'admin.users.index', 'active' => 'admin.*'];
                    }
                @endphp

                @foreach ($menu as $link)
                    <a href="{{ route($link['route']) }}"
                       class="text-sm {{ request()->routeIs($link['active']) ? 'font-semibold text-blue-600' : 'text-gray-600 hover:text-gray-900' }}">
                        {{ $link['label'] }}
                    </a>
                @endforeach

                <div class="ml-auto flex items-center gap-3 text-sm">
                    <span>{{ auth()->user()->name }}</span>
                    <span class="rounded-full px-2 py-0.5 text-xs {{ auth()->user()->role === 'admin' ? 'bg-purple-100 text-purple-700' : 'bg-gray-100 text-gray-600' }}">
                        {{ auth()->user()->role }}
                    </span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-red-600 hover:underline">Logout</button>
                    </form>
                </div>
            </div>
        </nav>
    @endauth

    <main class="mx-auto max-w-6xl px-4 py-8">
        <x-flash />
        @yield('content')
    </main>

</body>
</html>
