
<?php
//koneksi ke database -> buat konek ke database
//yang diperlukan,

$host = 'localhost'; //atau alamat ip server
$user = 'root'; //
$password = '';
$database = 'inventory';//nama database

//bikin variabel namanya -> conn, isinya kelas mysqli merepresentasikan koneksi ke database
$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) { //kondisi, jika var conn ga bisa konek, maka yang di dalam kurung kurawal di eksekusi
    die("Connection failed: " . $conn->connect_error);
    //die -> mengakhiri eksekusi
}
//itu kondisi kalau koneksinya gagal di jalankan.
?>