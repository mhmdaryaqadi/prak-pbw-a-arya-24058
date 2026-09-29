<?php
// biodata.php

function statusKelulusan(float $ipk): string
{
    if ($ipk >= 3.75) return 'Dengan Pujian (Cum Laude)';
    if ($ipk >= 3.50) return 'Sangat Memuaskan';
    if ($ipk >= 3.00) return 'Memuaskan';
    return 'Cukup';
}

$mahasiswa = [
    'nim' => '4524210058',
    'nama' => 'Muhammad Arya Alqadi',
    'prodi' => 'Teknik Informatika',
    'semester' => 3,
    'ipk' => 3.91,
    'email' => 'aryaqadi4524058@univpancasila.ac.id',
    'status' => 'Mahasiswa Aktif'
];
?>

<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Biodata</title>
</head>
<body>
    <h1>Biodata Mahasiswa</h1>
    <ul>
        <?php foreach ($mahasiswa as $kunci => $nilai): ?>
            <li><?= ucfirst($kunci) ?>: <?= htmlspecialchars((string)$nilai) ?></li>
        <?php endforeach; ?>
    </ul>
    <p><b>Predikat:</b> <?= statusKelulusan($mahasiswa['ipk']) ?></p>
</body>
</html>