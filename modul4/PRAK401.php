<!DOCTYPE html>
<html>
    <body>
        <form method="post">
            Panjang: <input type="number" name="panjang" value="<?= $_POST['panjang'] ?? '' ?>" required><br>
            Lebar: <input type="number" name="lebar" value="<?= $_POST['lebar'] ?? '' ?>" required><br>
            Nilai: <input type="text" name="nilai" value="<?= $_POST['nilai'] ?? '' ?>" required><br>
            <input type="submit" value="Cetak">
        </form>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $panjang = (int)$_POST['panjang'];
            $lebar = (int)$_POST['lebar'];
            $nilai = explode(' ', trim($_POST['nilai']));
            $jumlah_nilai = count(array_filter($nilai, 'is_numeric'));
            $total = $panjang * $lebar;

            if ($jumlah_nilai != $total) {
                echo "Panjang nilai tidak sesuai dengan ukuran matriks";
            } else {
                echo "<table border='1' cellpadding='5' cellspacing='0'>";
                $index = 0;
                for ($i = 0; $i < $panjang; $i++) {
                    echo "<tr>";
                    for ($j = 0; $j < $lebar; $j++) {
                        echo "<td>" . $nilai[$index] . "</td>";
                        $index++;
                    }
                    echo "</tr>";
                }
                echo "</table>";
            }
        }
        ?>
    </body>
</html>