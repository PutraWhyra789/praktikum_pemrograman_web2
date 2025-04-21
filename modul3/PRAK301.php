<!DOCTYPE html>
<html>
    <body>
        <style>
            .genap {
                color: green;
            }
            .ganjil {
                color: red;
            }
        </style>
        <form method="get">
            Jumlah Peserta : <input type="number" name="jumlah" value="<?= $_GET['jumlah'] ?? '' ?>" required><br>
            <input type="submit" value="Cetak">
        </form>
        <?php
        if (isset($_GET['jumlah'])) {
            $jumlah = (int)$_GET['jumlah'];
            $i = 1;
            while ($i <= $jumlah) {
                if ($i % 2 == 0) {
                    echo "<h3 class='genap'>Peserta ke-$i</h3>";
                } else {
                    echo "<h3 class='ganjil'>Peserta ke-$i</h3>";
                }
                $i++;
            }
        }
        ?>
    </body>
</html>