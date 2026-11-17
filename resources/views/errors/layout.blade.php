{{-- Layout halaman error. Sengaja berdiri sendiri (tanpa navbar & Vite) supaya tetap tampil walau ada masalah lain. --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <style>
        body { margin: 0; min-height: 100vh; display: flex; align-items: center; justify-content: center;
               font-family: system-ui, sans-serif; background: #f3f4f6; color: #1f2937; }
        .box { text-align: center; padding: 2rem; }
        .code { font-size: 4rem; font-weight: 800; color: #9ca3af; margin: 0; }
        h1 { margin: .5rem 0; font-size: 1.5rem; }
        p { color: #6b7280; }
        a { display: inline-block; margin-top: 1rem; padding: .6rem 1.2rem; border-radius: .5rem;
            background: #2563eb; color: #fff; text-decoration: none; }
    </style>
</head>
<body>
    <div class="box">
        <p class="code">@yield('code')</p>
        <h1>@yield('title')</h1>
        <p>@yield('message')</p>
        <a href="{{ url('/') }}">Kembali ke Beranda</a>
    </div>
</body>
</html>
