<?php
require 'Koneksi.php';

function insertData($table, $data) {
    global $conn;
    $columns = implode(", ", array_keys($data));
    $values = implode(", ", array_map(function($val) {
        return "'$val'";
    }, array_values($data)));
    $sql = "INSERT INTO $table ($columns) VALUES ($values)";
    return $conn->exec($sql);
}

function getAllData($table) {
    global $conn;
    $sql = "SELECT * FROM $table";
    return $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}

function getDataById($table, $id, $id_column) {
    global $conn;
    $sql = "SELECT * FROM $table WHERE $id_column = $id";
    return $conn->query($sql)->fetch(PDO::FETCH_ASSOC);
}

function updateData($table, $data, $id, $id_column) {
    global $conn;
    $set = [];
    foreach ($data as $column => $value) {
        $set[] = "$column = '$value'";
    }
    $set_string = implode(", ", $set);
    $sql = "UPDATE $table SET $set_string WHERE $id_column = $id";
    return $conn->exec($sql);
}

function deleteData($table, $id, $id_column) {
    global $conn;
    $sql = "DELETE FROM $table WHERE $id_column = $id";
    return $conn->exec($sql);
}
?>