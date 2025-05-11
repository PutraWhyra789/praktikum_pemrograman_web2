<?php
require 'Model.php';
$members = getAllData('member');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Member</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Daftar Member</h2>
    <a href="index.php" class="btn btn-primary" style="float: left; margin-left: 10%; margin-bottom: 20px;">Kembali</a>
    <a href="FormMember.php" class="btn btn-primary" style="float: right; margin-right: 10%; margin-bottom: 20px;">Tambah Data Baru</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Nama Member</th>
            <th>Nomor Member</th>
            <th>Alamat</th>
            <th>Tanggal Mendaftar</th>
            <th>Tanggal Terakhir Membayar</th>
            <th>Opsi</th>
        </tr>
        <?php foreach ($members as $member): ?>
        <tr>
            <td><?= $member['id_member'] ?></td>
            <td><?= $member['nama_member'] ?></td>
            <td><?= $member['nomor_member'] ?></td>
            <td><?= $member['alamat'] ?></td>
            <td><?= $member['tgl_mendaftar'] ?></td>
            <td><?= $member['tgl_terakhir_membayar'] ?></td>
            <td>
                <a href="FormMember.php?id=<?= $member['id_member'] ?>" class="btn btn-success">Edit</a>
                <a href="deleteMember.php?id=<?= $member['id_member'] ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>