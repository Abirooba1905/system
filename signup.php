<?php
session_start();

// Sambung ke pangkalan data
$conn = new mysqli("localhost", "root", "", "perpustakaan");

// Semak jika borang dihantar
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Semak jika email telah wujud
    $checkUser = "SELECT * FROM users WHERE email = ?";
    $stmtCheck = $conn->prepare($checkUser);
    $stmtCheck->bind_param("s", $email);
    $stmtCheck->execute();
    $result = $stmtCheck->get_result();

    if ($result->num_rows > 0) {
        $error = "Email telah didaftarkan!";
    } else {
        // Hash kata laluan untuk keselamatan
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $hashed_password);

        // Execute the prepared statement
        if ($stmt->execute()) {
            header('Location: login.php?registered=1');
            exit();
        } else {
            $error = "Terdapat ralat semasa pendaftaran: " . $stmt->error;
        }

        // Close statement
        $stmt->close();
    }

    // Close the check statement
    $stmtCheck->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Sistem Pengurusan Perpustakaan</title>
    <style>
    /* Reset and basic styling */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: Arial, sans-serif;
        background: linear-gradient(135deg, #1e1e2f, #6a0dad);
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
    }

    .signup-container {
        background: #2c2c3a;
        padding: 2rem;
        border-radius: 12px;
        box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.3);
        width: 350px;
        text-align: center;
    }

    h2 {
        font-size: 1.8rem;
        color: #fff;
        margin-bottom: 1.5rem;
    }

    label {
        display: block;
        text-align: left;
        margin-bottom: 0.5rem;
        font-weight: bold;
        color: #bdbdbd;
    }

    input[type="text"], input[type="email"], input[type="password"] {
        width: 100%;
        padding: 0.8rem;
        margin-bottom: 1.2rem;
        border: none;
        border-radius: 6px;
        background: #444;
        color: #ddd;
        font-size: 1rem;
        transition: background 0.3s, color 0.3s;
    }

    input[type="text"]:focus, input[type="email"]:focus, input[type="password"]:focus {
        background: #555;
        color: #fff;
        outline: none;
    }

    button {
        width: 100%;
        padding: 0.8rem;
        background: #8a2be2;
        color: #fff;
        border: none;
        border-radius: 6px;
        font-size: 1rem;
        font-weight: bold;
        cursor: pointer;
        transition: background 0.3s;
    }

    button:hover {
        background: #6a0dad;
    }

    .error, .success {
        margin-bottom: 1.2rem;
        font-size: 0.9rem;
        padding: 0.5rem;
        border-radius: 6px;
    }

    .error {
        background: #e74c3c;
        color: #fff;
    }

    .success {
        background: #2ecc71;
        color: #fff;
    }

    .footer {
        margin-top: 1.5rem;
        font-size: 0.9rem;
        color: #bdbdbd;
    }

    .footer a {
        color: #8a2be2;
        text-decoration: none;
        font-weight: bold;
    }

    .footer a:hover {
        color: #6a0dad;
    }
</style>

</head>
<body>
    <div class="signup-container">
        <h2>Daftar</h2>
        <?php if (isset($_GET['registered']) && $_GET['registered'] == 1) { ?>
            <p class="success">Pendaftaran berjaya! Sila log masuk.</p>
        <?php } ?>
        <?php if (isset($error)) { echo "<p class='error'>$error</p>"; } ?>
        <form method="post" action="signup.php">
            <label for="name">Nama Penuh:</label>
            <input type="text" id="name" name="name" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="password">Kata Laluan:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Daftar</button>
        </form>
        <div class="footer">
            <p>Sudah mempunyai akaun? <a href="login.php">Login di sini</a>.</p>
        </div>
    </div>
</body>
</html>
