<?php
$output = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num = $_POST['num'];

    if ($num < 0 || $num >= 1000) {
        $bilanganAngka = "Hasil: Anda Menginput Melebihi Limit Bilangan";
    } else {
        if ($num == 0) {
            $bilanganAngka = "Hasil: Nol";
        } elseif ($num >= 1 && $num <= 9) {
            $bilanganAngka = "Hasil: Satuan";
        } elseif ($num >= 10 && $num <= 19) {
            $bilanganAngka = "Hasil: Belasan";
        } elseif ($num >= 20 && $num <= 99) {
            $bilanganAngka = "Hasil: Puluhan";
        } elseif ($num >= 100 && $num <= 999) {
            $bilanganAngka = "Hasil: Ratusan";
        }
    }
    $output = "<h3>$bilanganAngka</h3>";
}
?>
<!DOCTYPE html>
<html>
<body>
    <form method="post">
        Nilai : <input type="number" name="num" value="<?= $_POST['num'] ?? '' ?>" required><br>
        <input type="submit" value="Konversi">
    </form>
    <?= $output ?>
</body>
</html>