<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "perpustakaan"; // Pastikan nama pangkalan data adalah 'perpustakaan'

// Buat sambungan
$conn = new mysqli($servername, $username, $password, $dbname);

// Semak sambungan
if ($conn->connect_error) {
    die("Sambungan gagal: " . $conn->connect_error);
}

echo "Sambungan berjaya!";
?>
