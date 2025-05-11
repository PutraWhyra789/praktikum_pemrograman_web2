<?php
require 'Model.php';
$peminjaman = null;
$members = getAllData('member');
$buku_list = getAllData('buku');

if (isset($_GET['id'])) {
    $peminjaman = getDataById('peminjaman', $_GET['id'], 'id_peminjaman');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'id_member' => $_POST['id_member'],
        'id_buku' => $_POST['id_buku'],
        'tgl_pinjam' => $_POST['tgl_pinjam'],
        'tgl_kembali' => $_POST['tgl_kembali'] ?? null
    ];
    if ($peminjaman) {
        updateData('peminjaman', $data, $_GET['id'], 'id_peminjaman');
    } else {
        insertData('peminjaman', $data);
    }
    header('Location: Peminjaman.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Form Peminjaman</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2><?= $peminjaman ? 'Edit' : 'Tambah' ?> Peminjaman</h2>
    <form method="POST">
        <label>Nama Member</label>
        <select name="id_member" required>
            <option value="">Pilih Member</option>
            <?php foreach ($members as $member): ?>
                <option value="<?= $member['id_member'] ?>" <?= $peminjaman && $peminjaman['id_member'] == $member['id_member'] ? 'selected' : '' ?>>
                    <?= $member['nama_member'] ?>
                </option>
            <?php endforeach; ?>
        </select><br>

        <label>Judul Buku</label>
        <select name="id_buku" required>
            <option value="">Pilih Buku</option>
            <?php foreach ($buku_list as $buku): ?>
                <option value="<?= $buku['id_buku'] ?>" <?= $peminjaman && $peminjaman['id_buku'] == $buku['id_buku'] ? 'selected' : '' ?>>
                    <?= $buku['judul_buku'] ?>
                </option>
            <?php endforeach; ?>
        </select><br>

        <label>Tanggal Pinjam<input type="date" name="tgl_pinjam" value="<?= $peminjaman['tgl_pinjam'] ?? '' ?>" required></label><br>
        <label>Tanggal Kembali<input type="date" name="tgl_kembali" value="<?= $peminjaman['tgl_kembali'] ?? '' ?>"></label><br>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="Peminjaman.php" class="btn btn-secondary">Kembali</a>
    </form>
</body>
</html>