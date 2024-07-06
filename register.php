<?php
include 'config.php';//biasalah.. koneksiin dulu ke db

if ($_SERVER['REQUEST_METHOD'] == 'POST') { //kalau permintaanya pake post maka,
    $nama_depan = $_POST['nama_depan'];//jalankan var namadepan,
    $nama_belakang = $_POST['nama_belakang'];//jalankan var namabelakang
    $username = $_POST['username'];// jalankan var username 
    $password = $_POST['password'];//jalankan var password
    $repeat_password = $_POST['repeat_password'];//jalankan var ulang password

    // Validasi password, 
    if ($password !== $repeat_password) {//kalau var pasword gak sama dengan ulangi password
        echo "Password tidak cocok";//maka tampilkan password tidak cocok
        exit();//stop
    }

    // Hash password bikin enkripsi pasword
    // biar password terlindungi jadi gak terbaca
   // $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Simpan data pengguna baru ke dalam database
    // kenapa pakek ???? gtu -> itu adalah parameterized query memastikan kalau nilai yang dimasukkan ke dalam query diikat dengan aman dan diinterpretasikan sebagai nilai, bukan bagian dari query SQL itu sendiri
    $sql = $conn->prepare("INSERT INTO users2 (nama_depan, nama_belakang,username, password) VALUES (?, ?, ?, ?)");
    //digunakan buat mengaitkan ke dalam pernyataan sql
    $sql->bind_param("ssss", $nama_depan, $nama_belakang, $username, $password);
    // ssss -> artinya semua data nya string

    if ($sql->execute()) { //kalau sql di eksekusi berhasil
        echo "Pendaftaran berhasil. Silakan login!";//tampilkan pesan tsb
        header("Location: login.html");//dan tampilkan lokasi dimana setelah proses regis berhasil di jalankan
    } else {//kecuali,
        echo "Error: " . $sql->error;//kalau error, maka maka tampilkan pesan error
    }

    $sql->close();
}

$conn->close();
?>
