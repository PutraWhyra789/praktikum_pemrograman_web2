<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    unset($_SESSION['jumlah']);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submit_jumlah'])) {
        $_SESSION['jumlah'] = (int)$_POST['jumlah_bintang'];
    } else if (isset($_POST['action'])) {
        if (!isset($_SESSION['jumlah'])) {
            $_SESSION['jumlah'] = 0;
        }
        if ($_POST['action'] == 'tambah') {
            $_SESSION['jumlah']++;
        } else if ($_POST['action'] == 'kurang') {
            $_SESSION['jumlah'] = max(0, $_SESSION['jumlah'] - 1);
        }
    }
}
$jumlah = isset($_SESSION['jumlah']) ? $_SESSION['jumlah'] : 0;
?>

<!DOCTYPE html>
<html>
    <body>
        <style>
            .star-container { margin: 20px 0; }
            .star { width: 40px; height: 40px; margin: 0 2px; }
            .button-group { margin-top: 10px; }
            button { padding: 5px 15px; margin: 0 5px; }
        </style>
        <?php
        if (!isset($_SESSION['jumlah'])) {
            echo '<form method="POST">
                Jumlah bintang<input type="number" name="jumlah_bintang" min="1" required><br>
                <button type="submit" name="submit_jumlah">Submit</button>
            </form>';
        } else {
            echo '<div>
                <h3>Jumlah bintang '.$jumlah.'</h3>
                <div class="star-container">';
            for ($i = 0; $i < $jumlah; $i++) {
                echo '<img src="https://www.freepnglogos.com/uploads/star-png/file-featured-article-star-svg-wikimedia-commons-8.png" class="star" alt="★">';
            }
            echo '</div>
                <form method="POST" class="button-group">
                    <button type="submit" name="action" value="tambah">Tambah</button>
                    <button type="submit" name="action" value="kurang">Kurang</button>
                </form>
            </div>';
        }
        ?>
    </body>
</html>