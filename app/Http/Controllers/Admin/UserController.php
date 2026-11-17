<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

/**
 * Halaman khusus admin: kelola user dan perannya.
 * Diproteksi middleware ['auth', 'role:admin'] di routes/web.php
 */
class UserController
{
    public function index()
    {
        $users = User::orderBy('name')->paginate(10);

        return view('admin.users.index', compact('users'));
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'role' => ['required', Rule::in(['admin', 'user'])],
        ]);

        // Admin tidak boleh menurunkan perannya sendiri (supaya tidak terkunci)
        if ($user->is($request->user())) {
            return back()->withErrors(['role' => 'Kamu tidak bisa mengubah peranmu sendiri.']);
        }

        $user->role = $data['role'];
        $user->save();

        return back()->with('success', "Peran {$user->name} diubah menjadi {$user->role}.");
    }

    public function destroy(Request $request, User $user)
    {
        if ($user->is($request->user())) {
            return back()->withErrors(['role' => 'Kamu tidak bisa menghapus akunmu sendiri.']);
        }

        $user->delete();

        return back()->with('success', 'User berhasil dihapus.');
    }
}
