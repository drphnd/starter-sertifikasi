<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController
{
    public function __invoke(Request $request)
    {
        return view('dashboard', [
            'user' => $request->user(),
            'totalItems' => Item::count(),
            'totalStock' => Item::sum('stock'),
            'totalUsers' => User::count(),
            'latestItems' => Item::latest()->limit(5)->get(),
        ]);
    }
}
