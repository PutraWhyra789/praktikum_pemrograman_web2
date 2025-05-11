<?php
require 'Model.php';
if (isset($_GET['id'])) {
    deleteData('buku', $_GET['id'], 'id_buku');
}
header('Location: Buku.php');
exit;
?>