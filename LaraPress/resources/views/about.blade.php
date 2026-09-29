<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami - LaraPress</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container">
        <nav class="navbar">
            <a href="{{ url('/') }}">Home</a>
            <a href="{{ url('/tentang-kami') }}" class="active">Tentang Kami</a>
            <a href="{{ url('/kontak') }}">Kontak</a>
        </nav>

        <h1>Tentang LaraPress</h1>
        <p>LaraPress adalah sebuah proyek blog sederhana yang dibuat untuk mempelajari dasar-dasar framework Laravel 12.</p>

        <div class="info-box">
            Halaman ini memuat informasi tentang tujuan dan visi proyek LaraPress.
        </div>
    </div>
</body>
</html>