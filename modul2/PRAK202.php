<?php
$output = '';
$error = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'] ?? '';
    $nim = $_POST['nim'] ?? '';
    $jk = $_POST['jk'] ?? '';

    if (empty($nama)) $error['nama'] = ' nama tidak boleh kosong';
    if (empty($nim)) $error['nim'] = ' nim tidak boleh kosong';
    if (empty($jk)) $error['jk'] = ' jenis kelamin tidak boleh kosong';

    if (empty($error)) {
        $output = "<h3>Output:</h3>$nama<br>$nim<br>$jk";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <style>
        .error { color: red; } 
    </style>
</head>
<body>
    <form method="post">
        Nama: <input type="text" name="nama" value="<?= $_POST['nama'] ?? '' ?>"><span class="error">*</span>
        <?= isset($error['nama']) ? '<span class="error">'.$error['nama'].'</span>' : '' ?><br>

        NIM: <input type="text" name="nim" value="<?= $_POST['nim'] ?? '' ?>"><span class="error">*</span>
        <?= isset($error['nim']) ? '<span class="error">'.$error['nim'].'</span>' : '' ?><br>

        Jenis Kelamin:<span class="error">*</span><?= isset($error['jk']) ? '<span class="error">'.$error['jk'].'</span>' : '' ?><br>
        <input type="radio" name="jk" value="Laki-laki" <?= isset($_POST['jk']) && $_POST['jk'] == 'Laki-laki' ? 'checked' : '' ?>> Laki-Laki<br>
        <input type="radio" name="jk" value="Perempuan" <?= isset($_POST['jk']) && $_POST['jk'] == 'Perempuan' ? 'checked' : '' ?>> Perempuan<br>
        
        <input type="submit" name="submit" value="Submit">
    </form>
    <?= $output ?>
</body>
</html>