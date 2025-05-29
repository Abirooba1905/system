<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Sistem Pengurusan Perpustakaan</title>
    <style>
    /* Reset and basic styling */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(135deg, #1e1e2f, #4b0082);
        color: #fff;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
        padding: 0;
    }

    .dashboard-container {
        background: #2e2d40;
        padding: 2rem;
        border-radius: 15px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        width: 100%;
        max-width: 500px;
        text-align: center;
        animation: fadeIn 1s ease-out;
    }

    h1 {
        font-size: 1.8rem;
        color: #ffffff;
        margin-bottom: 1.5rem;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    p {
        font-size: 1.1rem;
        color: #b3b3cc;
        margin-bottom: 1.5rem;
    }

    .button-container {
        display: flex;
        gap: 1rem;
        justify-content: center;
        margin-top: 1.5rem;
    }

    .button {
        display: inline-block;
        padding: 0.75rem 1.5rem;
        background: linear-gradient(135deg, #6a0dad, #4b0082);
        color: #ffffff;
        text-decoration: none;
        border-radius: 30px;
        font-size: 1rem;
        font-weight: bold;
        transition: background 0.3s ease, transform 0.2s ease;
    }

    .button:hover {
        background: linear-gradient(135deg, #8a2be2, #6a0dad);
        transform: scale(1.05);
    }

    .button3 {
        display: inline-block;
        padding: 0.75rem 1.5rem;
        background: linear-gradient(135deg, #C62E2E, #4b0082);
        color: #ffffff;
        text-decoration: none;
        border-radius: 30px;
        font-size: 1rem;
        font-weight: bold;
        transition: background 0.3s ease, transform 0.2s ease;
    }

    .button3:hover {
        background: linear-gradient(135deg, #9B7EBD, #F95454);
        transform: scale(1.05);
    }

    .footer {
        margin-top: 2rem;
        font-size: 0.85rem;
        color: #b3b3cc;
    }

    /* Animations */
    @keyframes fadeIn {
        0% {
            opacity: 0;
            transform: scale(0.95);
        }
        100% {
            opacity: 1;
            transform: scale(1);
        }
    }
</style>

</head>
<body>
    <div class="dashboard-container">
        <h1>Selamat datang ke Sistem Pengurusan Perpustakaan</h1>
        <p>Anda telah log masuk sebagai <strong><?php echo $_SESSION['username']; ?></strong>.</p>

        <!-- Display success message if available -->
        <?php if (isset($_SESSION['success_message'])): ?>
            <p style="color: green; text-align: center;"><?php echo $_SESSION['success_message']; ?></p>
            <?php unset($_SESSION['success_message']); ?>
        <?php endif; ?>

        <!-- Button Container -->
        <div class="button-container">
            <!-- Link to "Senarai Buku" page -->
            <a href="senarai_buku.php" class="button">Senarai Buku</a>
            <!-- Link to "Pulangan Buku" page -->
            <a href="pulangan.php" class="button">Pulang Buku</a>
            <!-- Logout Button -->
            <a href="logout.php" class="button3">Logout</a>
        </div>

        <div class="footer">
            <p>© 2024 Perpustakaan Online</p>
        </div>
    </div>
</body>
</html>
