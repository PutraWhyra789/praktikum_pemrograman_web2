<!DOCTYPE html>
<html>
    <body>
        <style>
            .triangle .hidden {
                visibility: hidden;
            }
            .triangle .row {
                display: flex;
                gap: 2px;
            }
            .triangle img {
                width: 30px;
                height: 30px;
            }
        </style>
        <form method="post">
            Tinggi : <input type="number" name="tinggi" value="<?= $_POST['tinggi'] ?? '' ?>" required><br>
            Alamat Gambar : <input type="text" name="gambar" value="<?= $_POST['gambar'] ?? '' ?>" required><br>
            <input type="submit" value="Cetak">
        </form>
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $tinggi = (int)$_POST['tinggi'];
            $gambar = $_POST['gambar'];
            echo '<div class="triangle">';
            for ($i = 0; $i < $tinggi; $i++) {
                echo '<div class="row">';
                for ($j = 0; $j < $tinggi; $j++) {
                    $class = ($j < $i) ? 'hidden' : '';
                    echo "<img src='$gambar' class='$class'>";
                }        
                echo '</div>';
            }
            echo '</div>';
        }
        ?>
    </body>
</html>