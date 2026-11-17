@extends('layouts.app')

@section('title', 'Kelola User')

@section('content')
    <h1 class="mb-6 text-2xl font-bold">Kelola User</h1>

    @error('role')
        <div class="mb-4 rounded-lg bg-red-100 px-4 py-3 text-sm text-red-800">{{ $message }}</div>
    @enderror

    <div class="overflow-x-auto rounded-xl bg-white shadow">
        <table class="w-full text-left text-sm">
            <thead class="bg-gray-50 text-gray-600">
                <tr>
                    <th class="px-4 py-3">Nama</th>
                    <th class="px-4 py-3">Email</th>
                    <th class="px-4 py-3">Peran</th>
                    <th class="px-4 py-3 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="border-t">
                        <td class="px-4 py-3">
                            {{ $user->name }}
                            @if ($user->is(auth()->user()))
                                <span class="text-xs text-gray-400">(kamu)</span>
                            @endif
                        </td>
                        <td class="px-4 py-3">{{ $user->email }}</td>
                        <td class="px-4 py-3">
                            <form method="POST" action="{{ route('admin.users.update', $user) }}">
                                @csrf
                                @method('PATCH')
                                <select name="role" onchange="this.form.submit()"
                                        class="rounded-lg border border-gray-300 px-2 py-1"
                                        @disabled($user->is(auth()->user()))>
                                    <option value="user" @selected($user->role === 'user')>user</option>
                                    <option value="admin" @selected($user->role === 'admin')>admin</option>
                                </select>
                            </form>
                        </td>
                        <td class="px-4 py-3 text-right">
                            @unless ($user->is(auth()->user()))
                                <form method="POST" action="{{ route('admin.users.destroy', $user) }}"
                                      onsubmit="return confirm('Yakin hapus user ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                                </form>
                            @endunless
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">{{ $users->links() }}</div>
@endsection
