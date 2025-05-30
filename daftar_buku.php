<?php
// Sambung ke pangkalan data
$conn = new mysqli("localhost", "root", "", "perpustakaan");

// Semak jika sambungan berjaya
if ($conn->connect_error) {
    die("Sambungan gagal: " . $conn->connect_error);
}

// Semak jika borang dihantar
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tajukBuku = $_POST['tajukBuku'];
    $pengarang = $_POST['pengarang'];
    $penerbitBuku = $_POST['penerbitBuku'];
    $tarikhDiterbitkan = $_POST['tarikhDiterbitkan'];

    // Masukkan data ke dalam jadual perpustakaan1
    $stmt = $conn->prepare("INSERT INTO perpustakaan1 (tajukBuku, pengarang, penerbitBuku, tarikhDiterbitkan) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $tajukBuku, $pengarang, $penerbitBuku, $tarikhDiterbitkan);

    if ($stmt->execute()) {
        $successMessage = "Buku berjaya didaftarkan!";
    } else {
        $errorMessage = "Ralat: " . $stmt->error;
    }

    // Tutup statement
    $stmt->close();
}

// Tutup sambungan pangkalan data
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku - Sistem Perpustakaan</title>
    <style>
       body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: #f2a8ff;
    color: #f0eaff;
    margin: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.form-container {
    background: #1b1b2f;
    padding: 40px;
    border-radius: 12px;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.6);
    width: 420px;
    text-align: center;
    position: relative;
    overflow: hidden;
}

h2 {
    font-size: 2rem;
    color: #e9dcff;
    margin-bottom: 25px;
    border-bottom: 2px solid #6a0dad;
    padding-bottom: 10px;
}

label {
    display: block;
    margin-bottom: 8px;
    font-weight: bold;
    color: #8c50ff;
    font-size: 1rem;
    text-transform: uppercase;
}

input[type="text"], input[type="date"] {
    width: 100%;
    padding: 12px;
    margin-bottom: 15px;
    background-color: #2d2d44;
    border: 1px solid #8c50ff;
    border-radius: 6px;
    color: #e9dcff;
    font-size: 1rem;
    outline: none;
    box-shadow: 0 3px 8px rgba(0, 0, 0, 0.3);
    transition: background-color 0.3s, color 0.3s;
}

input[type="text"]:focus, input[type="date"]:focus {
    background-color: #3d3d5c;
    border-color: #d39fff;
}

button {
    width: 100%;
    padding: 15px;
    background: linear-gradient(135deg, #6a0dad, #8a2be2);
    color: white;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    font-size: 16px;
    font-weight: bold;
    text-transform: uppercase;
    transition: background 0.4s;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.4);
}

button:hover {
    background: linear-gradient(135deg, #8a2be2, #b74fe3);
}

.success, .error {
    font-size: 0.95rem;
    font-weight: bold;
    padding: 12px;
    color: #fff;
    border-radius: 6px;
    margin-top: 15px;
    box-shadow: 0 3px 8px rgba(0, 0, 0, 0.4);
}

.success {
    background-color: #28a745;
}

.error {
    background-color: #e74c3c;
}

.button-container {
    margin-top: 10px;
}

.button-container a {
    display: inline-block;
    padding: 10px 25px;
    background: #3d3d5c;
    color: #e9dcff;
    text-decoration: none;
    border-radius: 8px;
    font-weight: bold;
    text-transform: uppercase;
    margin-top: 10px;
    transition: background 0.4s;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.4);
}

.button-container a:hover {
    background: #5d3b95;
}

.footer {
    margin-top: 25px;
    color: #e0d4f7;
    font-size: 0.8rem;
    text-align: center;
}


    </style>
</head>
<body>
    <div class="form-container">
        <h2>Daftar Buku Baru</h2>
        <!-- Paparkan mesej kejayaan atau ralat jika ada -->
        <?php if (isset($successMessage)) { echo "<p class='success'>$successMessage</p>"; } ?>
        <?php if (isset($errorMessage)) { echo "<p class='error'>$errorMessage</p>"; } ?>

        <!-- Borang daftar buku -->
        <form method="post" action="">
            <label for="tajukBuku">Tajuk Buku:</label>
            <input type="text" id="tajukBuku" name="tajukBuku" required>

            <label for="pengarang">Pengarang:</label>
            <input type="text" id="pengarang" name="pengarang" required>

            <label for="penerbitBuku">Penerbit Buku:</label>
            <input type="text" id="penerbitBuku" name="penerbitBuku" required>

            <label for="tarikhDiterbitkan">Tarikh Diterbitkan:</label>
<input type="date" id="tarikhDiterbitkan" name="tarikhDiterbitkan" required>


            <button type="submit">Daftar Buku</button>
        </form>

        <div class="button-container">
            <!-- Button to access "Senarai Buku" page -->
            <a href="senarai_buku.php" class="button">Senarai Buku</a>
        </div>

        <div class="button-container">
            <!-- Button to access "Pinjam Buku" page -->
            <a href="pinjam_buku.php" class="button">Pinjam Buku</a>
        </div>

        <div class="footer">
            <p>© 2024 Perpustakaan Online</p>
        </div>
    </div>
</body>
</html>
