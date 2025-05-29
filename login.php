<?php
session_start();

// Sambung ke pangkalan data
$conn = new mysqli("localhost", "root", "", "perpustakaan");

// Semak jika borang login dihantar
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Dapatkan pengguna dari pangkalan data
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        // Semak kata laluan
        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $user['name'];
            header('Location: index.php');
            exit();
        } else {
            $error = "Kata laluan salah!";
        }
    } else {
        $error = "Pengguna tidak wujud!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Pengurusan Perpustakaan</title>
    <style>
    /* Reset and basic styling */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        background-image: url("hero.jpg");
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(135deg, #1e1e2f, #4b0082);
        color: #fff;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .login-container {
        background: #2e2d40;
        padding: 2rem;
        border-radius: 12px;
        box-shadow: 0px 10px 25px rgba(0, 0, 0, 0.3);
        width: 100%;
        max-width: 400px;
        text-align: center;
        animation: fadeIn 1s ease-out;
    }

    h2 {
        font-size: 2rem;
        color: #fff;
        margin-bottom: 1.5rem;
    }

    label {
        display: block;
        text-align: left;
        color: #b3b3cc;
        font-size: 0.9rem;
        font-weight: bold;
        margin-bottom: 0.5rem;
    }

    input[type="text"], input[type="password"] {
        width: 100%;
        padding: 0.75rem;
        margin-bottom: 1.2rem;
        border: none;
        border-radius: 8px;
        background-color: #44415a;
        color: #ddd;
        font-size: 1rem;
        transition: background 0.3s, box-shadow 0.3s;
    }

    input[type="text"]:focus, input[type="password"]:focus {
        background-color: #555270;
        box-shadow: 0px 0px 5px rgba(128, 0, 128, 0.5);
        outline: none;
    }

    button {
        width: 100%;
        padding: 0.8rem;
        background: linear-gradient(135deg, #8a2be2, #4b0082);
        color: white;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        font-size: 1rem;
        font-weight: bold;
        transition: background 0.3s, transform 0.2s;
    }

    button:hover {
        background: linear-gradient(135deg, #6a0dad, #4b0082);
        transform: scale(1.02);
    }

    .error {
        color: #f8d7da;
        background: #720026;
        padding: 0.75rem;
        border-radius: 6px;
        margin-bottom: 1rem;
        font-size: 0.9rem;
        text-align: center;
    }

    .footer {
        margin-top: 1rem;
        font-size: 0.9rem;
        color: #b3b3cc;
    }

    .footer a {
        color: #b19cd9;
        text-decoration: none;
        font-weight: bold;
    }

    .footer a:hover {
        color: #8a2be2;
        text-decoration: underline;
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
    <div class="login-container">
        <h2>Login</h2>
        <?php if (isset($error)) { echo "<p class='error'>$error</p>"; } ?>
        <form method="post" action="login.php">
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" required>
            <label for="password">Kata Laluan:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Login</button>
        </form>
        <div class="footer">
            <p>Belum mempunyai akaun? <a href="signup.php">Daftar di sini</a>.</p>
        </div>
    </div>
</body>
</html>
