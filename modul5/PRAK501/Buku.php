<?php
require 'Model.php';
$buku_list = getAllData('buku');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Buku</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Daftar Buku</h2>
    <a href="index.php" class="btn btn-primary" style="float: left; margin-left: 10%; margin-bottom: 20px;">Kembali</a>
    <a href="FormBuku.php" class="btn btn-primary" style="float: right; margin-right: 10%; margin-bottom: 20px;">Tambah Data Baru</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Judul Buku</th>
            <th>Penulis</th>
            <th>Penerbit</th>
            <th>Tahun Terbit</th>
            <th>Opsi</th>
        </tr>
        <?php foreach ($buku_list as $buku): ?>
        <tr>
            <td><?= $buku['id_buku'] ?></td>
            <td><?= $buku['judul_buku'] ?></td>
            <td><?= $buku['penulis'] ?></td>
            <td><?= $buku['penerbit'] ?></td>
            <td><?= $buku['tahun_terbit'] ?></td>
            <td>
                <a href="FormBuku.php?id=<?= $buku['id_buku'] ?>" class="btn btn-success">Edit</a>
                <a href="deleteBuku.php?id=<?= $buku['id_buku'] ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>