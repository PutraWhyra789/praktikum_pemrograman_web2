<?php
require 'Model.php';
if (isset($_GET['id'])) {
    deleteData('member', $_GET['id'], 'id_member');
}
header('Location: Member.php');
exit;
?>