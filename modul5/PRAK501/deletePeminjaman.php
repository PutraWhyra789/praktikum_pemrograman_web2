<?php
require 'Model.php';
if (isset($_GET['id'])) {
    deleteData('peminjaman', $_GET['id'], 'id_peminjaman');
}
header('Location: Peminjaman.php');
exit;
?>