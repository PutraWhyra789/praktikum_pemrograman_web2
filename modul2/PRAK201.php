<?php
$output = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama1 = strtolower($_POST['nama1']);
    $nama2 = strtolower($_POST['nama2']);
    $nama3 = strtolower($_POST['nama3']);

    if ($nama1 > $nama2) {
        list($nama1, $nama2) = array($nama2, $nama1);
    }
    if ($nama2 > $nama3) {
        list($nama2, $nama3) = array($nama3, $nama2);
    }
    if ($nama1 > $nama2) {
        list($nama1, $nama2) = array($nama2, $nama1);
    }

    $output = "<h3>Output:</h3>$nama1<br>$nama2<br>$nama3";
}
?>
<!DOCTYPE html>
<html>
<body>
    <form method="post">
        Nama 1: <input type="text" name="nama1" value="<?= $_POST['nama1'] ?? '' ?>" required><br>
        Nama 2: <input type="text" name="nama2" value="<?= $_POST['nama2'] ?? '' ?>" required><br>
        Nama 3: <input type="text" name="nama3" value="<?= $_POST['nama3'] ?? '' ?>" required><br>
        <input type="submit" value="Urutkan">
    </form>
    <?= $output ?>
</body>
</html>