<?php

$host = 'localhost';
$username = 'username';
$password = 'password';
$database = 'databaseforge1';

// Koneksi ke database
$conn = new mysqli($host, $username, $password, $database);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ambil data dari form login
$username = $_POST['username'];
$password = $_POST['password'];

// Query untuk memeriksa keberadaan user di database
$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = $conn->query($query);

// Periksa hasil query
if ($result->num_rows > 0) {
    // Login sukses, redirect ke halaman dashboard atau halaman lainnya
    echo "Login sukses!";
} else {
    // Login gagal, kembali ke halaman login
    echo "Login gagal. Cek kembali username dan password.";
}

// Tutup koneksi database
$conn->close();
?>
