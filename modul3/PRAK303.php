<!DOCTYPE html>
<html>
    <body>
        <form method="post">
            Batas Bawah : <input type="number" name="bawah" value="<?= $_POST['bawah'] ?? '' ?>" required><br>
            Batas Atas : <input type="number" name="atas" value="<?= $_POST['atas'] ?? '' ?>" required><br>
            <input type="submit" value="Cetak">
        </form>
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $bawah = (int)$_POST['bawah'];
            $atas = (int)$_POST['atas'];
            $star = "<img src='https://www.freepnglogos.com/uploads/star-png/file-featured-article-star-svg-wikimedia-commons-8.png' style='width:15px;height:15px;'>";
            $i = $bawah;
            do {
                if (($i + 7) % 5 === 0) {
                    echo "$star ";
                } else {
                    echo "$i ";
                }
                $i++;
            } while ($i <= $atas);
        }
        ?>
    </body>
</html>