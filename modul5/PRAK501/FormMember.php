<?php
require 'Model.php';
$member = null;
if (isset($_GET['id'])) {
    $member = getDataById('member', $_GET['id'], 'id_member');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'nama_member' => $_POST['nama_member'],
        'nomor_member' => $_POST['nomor_member'],
        'alamat' => $_POST['alamat']
    ];
    if ($member) {
        updateData('member', $data, $_GET['id'], 'id_member');
    } else {
        insertData('member', $data);
    }
    header('Location: Member.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Form Member</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2><?= $member ? 'Edit' : 'Tambah' ?> Member</h2>
    <form method="POST">
        <label>Nama<br><input type="text" name="nama_member" value="<?= $member['nama_member'] ?? '' ?>" required></label>
        <label>Nomor Member<input type="text" name="nomor_member" value="<?= $member['nomor_member'] ?? '' ?>" required></label>
        <label>Alamat<textarea name="alamat" required><?= $member['alamat'] ?? '' ?></textarea></label><br>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="Member.php" class="btn btn-secondary">Kembali</a>
    </form>
</body>
</html>