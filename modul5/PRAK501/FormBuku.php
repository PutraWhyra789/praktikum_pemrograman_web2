<?php
require 'Model.php';
$buku = null;
if (isset($_GET['id'])) {
    $buku = getDataById('buku', $_GET['id'], 'id_buku');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'judul_buku' => $_POST['judul_buku'],
        'penulis' => $_POST['penulis'],
        'penerbit' => $_POST['penerbit'],
        'tahun_terbit' => $_POST['tahun_terbit']
    ];
    if ($buku) {
        updateData('buku', $data, $_GET['id'], 'id_buku');
    } else {
        insertData('buku', $data);
    }
    header('Location: Buku.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Form Buku</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2><?= $buku ? 'Edit' : 'Tambah' ?> Buku</h2>
    <form method="POST">
        <label>Judul Buku<input type="text" name="judul_buku" value="<?= $buku['judul_buku'] ?? '' ?>" required></label>
        <label>Penulis<input type="text" name="penulis" value="<?= $buku['penulis'] ?? '' ?>" required></label>
        <label>Penerbit<input type="text" name="penerbit" value="<?= $buku['penerbit'] ?? '' ?>" required></label>
        <label>Tahun Terbit<br><input type="number" name="tahun_terbit" value="<?= $buku['tahun_terbit'] ?? '' ?>" required></label><br>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="Buku.php" class="btn btn-secondary">Kembali</a>
    </form>
</body>
</html>