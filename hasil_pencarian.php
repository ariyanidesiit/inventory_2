<?php
$query = isset($_GET['query']) ? htmlspecialchars($_GET['query']) : '';

// Validasi input, misalnya memastikan $query tidak kosong
if (empty($query)) {
    echo "Masukkan kata kunci pencarian.";
    // Mungkin tambahkan link kembali ke halaman pencarian
    exit;
}
?>