{{-- Pesan sukses dari ->with('success', '...') --}}
@if (session('success'))
    <div class="mb-6 rounded-lg bg-green-100 px-4 py-3 text-sm text-green-800">
        {{ session('success') }}
    </div>
@endif

{{-- Pesan error dari ->with('error', '...') --}}
@if (session('error'))
    <div class="mb-6 rounded-lg bg-red-100 px-4 py-3 text-sm text-red-800">
        {{ session('error') }}
    </div>
@endif
