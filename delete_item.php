<?php
include 'config.php';

$id = $_GET['id'];

$sql = $conn->prepare("DELETE FROM barang WHERE id_barang = ?");
$sql->bind_param("i", $id);

if ($sql->execute()) {
    echo "Delete berhasil!";
    header("Location: tables.php");
    exit();
} else {
    echo "Error: " . $sql->error;
}

$sql->close();
$conn->close();
?>
