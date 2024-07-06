<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}
require 'config.php';

$sql = "SELECT * FROM barang";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manajemen Barang</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <h2>Manajemen Barang</h2>
    <a href="add_item.php">Tambah Barang</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Nama Barang</th>
            <th>Jumlah Barang</th>
            <th>Harga Satuan</th>
            <th>Total Harga</th>
        </tr>
        <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id_barang']; ?></td>
                <td><?php echo $row['nama_barang']; ?></td>
                <td><?php echo $row['jumlah_barang']; ?></td>
                <td><?php echo $row['harga_barang']; ?></td>
                <td><?php echo $row['total_harga']; ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
    <a href="index.html">Kembali ke Dashboard</a>
</body>
</html>
