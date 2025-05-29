<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maklumat Peminjaman</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            padding: 20px;
        }

        .container {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            padding: 30px;
            max-width: 400px;
            width: 100%;
            text-align: center;
        }

        h1 {
            color: #333333;
            margin-bottom: 20px;
            font-size: 24px;
        }

        p {
            color: #555555;
            font-size: 16px;
            margin-bottom: 10px;
        }

        .footer {
            margin-top: 20px;
            font-size: 14px;
            color: #666666;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Maklumat Peminjaman</h1>

    <?php
    // Debugging - print query parameters
    // echo "<p>Debugging Info:</p>";
    // echo "<p>Nama Buku: " . htmlspecialchars($_GET['nama_buku']) . "</p>";
    // echo "<p>Nama Peminjam: " . htmlspecialchars($_GET['nama_peminjam']) . "</p>";
    // echo "<p>Tarikh Pinjam: " . htmlspecialchars($_GET['tarikh_pinjam']) . "</p>";
    // echo "<p>Tarikh Pulang: " . htmlspecialchars($_GET['tarikh_pulang']) . "</p>";

    // Display borrowed book info
    echo "<p>Id Buku: " . htmlspecialchars($_GET['id_buku']). "</p>";
    echo "<p>Peminjam: " . htmlspecialchars($_GET['nama_peminjam']) . "</p>";
    echo "<p>Tarikh Pinjam: " . htmlspecialchars($_GET['tarikh_pinjam']) . "</p>";
    echo "<p>Tarikh Pulang: " . htmlspecialchars($_GET['tarikh_pulang']) . "</p>";
    ?>

    <div class="footer">
        © 2024 Perpustakaan Online
    </div>
</div>

</body>
</html>
