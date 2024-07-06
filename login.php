<?php
session_start();
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query untuk mendapatkan username dan password
    $sql = "SELECT id FROM users2 WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Jika username dan password cocok, login berhasil
        $row = $result->fetch_assoc();
        $_SESSION['id'] = $row['id'];
        header("Location: index.html");
        exit();
    } else {
        // Jika tidak cocok, tampilkan pesan error
        //$error_message = "Invalid username or password.";
        header("Location:register.html");
    }

    $conn->close();}
    ?>