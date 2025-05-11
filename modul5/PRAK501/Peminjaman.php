<?php
require 'Model.php';

$sql = "SELECT p.id_peminjaman, m.nama_member, b.judul_buku, p.tgl_pinjam, p.tgl_kembali
        FROM peminjaman p
        JOIN member m ON p.id_member = m.id_member
        JOIN buku b ON p.id_buku = b.id_buku";
$peminjaman_list = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Peminjaman</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Daftar Peminjaman</h2>
    <a href="index.php" class="btn btn-primary" style="float: left; margin-left: 10%; margin-bottom: 20px;">Kembali</a>
    <a href="FormPeminjaman.php" class="btn btn-primary" style="float: right; margin-right: 10%; margin-bottom: 20px;">Tambah Data Baru</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Nama Member</th>
            <th>Judul Buku</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th>
            <th>Opsi</th>
        </tr>
        <?php foreach ($peminjaman_list as $peminjaman): ?>
        <tr>
            <td><?= $peminjaman['id_peminjaman'] ?></td>
            <td><?= $peminjaman['nama_member'] ?></td>
            <td><?= $peminjaman['judul_buku'] ?></td>
            <td><?= $peminjaman['tgl_pinjam'] ?></td>
            <td><?= $peminjaman['tgl_kembali'] ?></td>
            <td>
                <a href="FormPeminjaman.php?id=<?= $peminjaman['id_peminjaman'] ?>" class="btn btn-success">Edit</a>
                <a href="deletePeminjaman.php?id=<?= $peminjaman['id_peminjaman'] ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>