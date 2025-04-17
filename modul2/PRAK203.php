<?php
$output = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nilai = $_POST['nilai'];
    $dari = $_POST['dari'];
    $ke = $_POST['ke'];

    switch ($dari) {
        case 'C': $celcius = $nilai; break;
        case 'F': $celcius = ($nilai - 32) * 5/9; break;
        case 'Re': $celcius = $nilai * 5/4; break;
        case 'K': $celcius = $nilai - 273.15; break;
    }

    switch ($ke) {
        case 'C': $hasil = $celcius; break;
        case 'F': $hasil = ($celcius * 9/5) + 32; break;
        case 'Re': $hasil = $celcius * 4/5; break;
        case 'K': $hasil = $celcius + 273.15; break;
    }

    $output = "<h3>Hasil Konversi: $hasil °$ke</h3>";
}
?>
<!DOCTYPE html>
<html>
<body>
    <form method="post">
        Nilai : <input type="number" step="any" name="nilai" value="<?= $_POST['nilai'] ?? '' ?>" required><br>

            <label>Dari :</label><br>
                <label><input type="radio" name="dari" value="C" <?= (isset($_POST['dari']) && $_POST['dari'] == 'C') ? 'checked' : '' ?>> Celcius</label><br>
                <label><input type="radio" name="dari" value="F" <?= (isset($_POST['dari']) && $_POST['dari'] == 'F') ? 'checked' : '' ?>> Fahrenheit</label><br>
                <label><input type="radio" name="dari" value="Re" <?= (isset($_POST['dari']) && $_POST['dari'] == 'Re') ? 'checked' : '' ?>> Rheamur</label><br>
                <label><input type="radio" name="dari" value="K" <?= (isset($_POST['dari']) && $_POST['dari'] == 'K') ? 'checked' : '' ?>> Kelvin</label><br>

            <label>Ke :</label><br>
                <label><input type="radio" name="ke" value="C" <?= (isset($_POST['ke']) && $_POST['ke'] == 'C') ? 'checked' : '' ?>> Celcius</label><br>
                <label><input type="radio" name="ke" value="F" <?= (isset($_POST['ke']) && $_POST['ke'] == 'F') ? 'checked' : '' ?>> Fahrenheit</label><br>
                <label><input type="radio" name="ke" value="Re" <?= (isset($_POST['ke']) && $_POST['ke'] == 'Re') ? 'checked' : '' ?>> Rheamur</label><br>
                <label><input type="radio" name="ke" value="K" <?= (isset($_POST['ke']) && $_POST['ke'] == 'K') ? 'checked' : '' ?>> Kelvin</label><br>

        <input type="submit" value="Konversi">
    </form>
    <?= $output ?>
</body>
</html>