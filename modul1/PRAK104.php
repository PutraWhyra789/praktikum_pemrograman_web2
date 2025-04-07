<?php
$samsung = [
    "Samsung Galaxy S22",
    "Samsung Galaxy S22+",
    "Samsung Galaxy A03",
    "Samsung Galaxy Xcover 5"
];
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        table {
            border-collapse: collapse;
            width: 300px;
            font-family: Arial, sans-serif;
        }
        th {
            border: 1px solid black;
            font-weight: bold;
            text-align: left;
        }
        td {
            border: 1px solid black;
            text-align: left;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <th>Daftar Smartphone Samsung</th>
        </tr>
        <?php foreach ($samsung as $tipe): ?>
        <tr>
            <td><?php echo $tipe; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
