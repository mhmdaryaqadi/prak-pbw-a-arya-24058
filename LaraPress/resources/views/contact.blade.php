<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak Kami - LaraPress</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container">
        <nav class="navbar">
            <a href="{{ url('/') }}">Home</a>
            <a href="{{ url('/tentang-kami') }}">Tentang Kami</a>
            <a href="{{ url('/kontak') }}" class="active">Kontak</a>
        </nav>

        <h1>Kontak Kami</h1>
        <p>Silahkan hubungi kami melalui telepon di: <strong>08123456789</strong></p>

        <div class="info-box">
            Jam operasional layanan kami adalah Senin - Jumat, 09:00 - 17:00 WIB.
        </div>
    </div>
</body>
</html>