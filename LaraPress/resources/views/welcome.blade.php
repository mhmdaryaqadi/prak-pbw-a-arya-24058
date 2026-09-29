<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang di LaraPress</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container">
        <nav class="navbar">
            <a href="{{ url('/') }}" class="active">Home</a>
            <a href="{{ url('/tentang-kami') }}">Tentang Kami</a>
            <a href="{{ url('/kontak') }}">Kontak</a>
        </nav>

        <h1>Selamat Datang di Blog LaraPress</h1>
        <p>Ini adalah halaman utama dari aplikasi blog kita.</p>

        <div class="info-box">
            <strong>LaraPress</strong> dibuat menggunakan <strong>Laravel 12</strong>.
        </div>
    </div>
</body>
</html>