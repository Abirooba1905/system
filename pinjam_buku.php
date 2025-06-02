<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pinjam Buku</title>
    <style>
    /* Reset styling */
    /* Reset styling */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Poppins', sans-serif;
    background:#f2a8ff;
    color: #e0e0e0;
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
    margin: 0;
    background-image: url("herojpg");
}

.container {
    width: 90%;
    max-width: 600px;
    background: #1f1f1f;
    border-radius: 15px;
    box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.5);
    padding: 2rem;
    text-align: center;
}

h1 {
    color: #bb86fc;
    font-size: 2rem;
    margin-bottom: 1rem;
}

form {
    margin-top: 1rem;
}

label {
    display: block;
    font-weight: 600;
    margin-top: 1rem;
    color: #e0e0e0;
    text-transform: uppercase;
}

select, input[type="text"], input[type="date"], input[type="submit"] {
    width: 100%;
    padding: 0.7rem;
    margin-top: 0.5rem;
    background: #333333;
    border: 1px solid #444;
    border-radius: 8px;
    font-size: 1rem;
    color: #fff;
    outline: none;
    transition: all 0.3s ease;
}

select:focus, input[type="text"]:focus, input[type="date"]:focus {
    border-color: #bb86fc;
}

input[type="submit"] {
    background: linear-gradient(135deg, #bb86fc, #3700b3);
    color: #ffffff;
    font-weight: bold;
    cursor: pointer;
    border: none;
    margin-top: 1.5rem;
    transition: background 0.3s, transform 0.3s;
}

input[type="submit"]:hover {
    background: linear-gradient(135deg, #3700b3, #bb86fc);
    transform: translateY(-2px);
}

.dialog-box {
    display: none;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: #2a2a2a;
    color: #e0e0e0;
    padding: 1.5rem;
    border-radius: 12px;
    box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.7);
    width: 80%;
    max-width: 300px;
    text-align: center;
}

.dialog-box p {
    font-size: 1rem;
    margin-bottom: 1rem;
}

.dialog-box button {
    background: #bb86fc;
    border: none;
    color: #121212;
    padding: 0.5rem 1rem;
    border-radius: 6px;
    cursor: pointer;
    font-size: 1rem;
    transition: background 0.3s;
}

.dialog-box button:hover {
    background: #3700b3;
    color: #ffffff;
}

.btn-list {
    background: #bb86fc;
    color: #121212;
    padding: 0.6rem 1.2rem;
    font-size: 1rem;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    margin-top: 1.5rem;
    transition: background 0.3s, transform 0.3s;
}

.btn-list:hover {
    background: #3700b3;
    color: #fff;
    transform: translateY(-2px);
}

.book-list {
    display: none;
    margin-top: 1.5rem;
}

.book-list table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 0.5rem;
}

.book-list th, .book-list td {
    padding: 0.75rem;
    border: 1px solid #444;
    text-align: left;
    font-size: 0.9rem;
}

.book-list th {
    background: #bb86fc;
    color: #121212;
}

.status-borrowed {
    color: #cf6679;
    font-weight: bold;
}

.status-available {
    color: #03dac6;
    font-weight: bold;
}

.footer {
    margin-top: 2rem;
    font-size: 0.8rem;
    color: #888;
    text-align: center;
}

</style>

</head>
<body>

<div class="container">
    <h1>Pinjam Buku</h1>
    <?php
session_start();
date_default_timezone_set('Asia/Kuala_Lumpur');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "perpustakaan";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the username is set in the session
if (!isset($_SESSION['username'])) {
    $_SESSION['error_message'] = "Sila log masuk terlebih dahulu.";
    header("Location: login.php"); // Redirect to a login page if not logged in
    exit();
}

// Borrow book functionality
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['pinjam_buku'])) {
    $id_buku = $_POST['id_buku'];
    $nama_peminjam = $_SESSION['username'];
    $tarikh_pinjam = $_POST['tarikh_pinjam'];
    $tarikh_pulang = $_POST['tarikh_pulang'];

    // Insert the borrowing details into the database
    $stmt = $conn->prepare("INSERT INTO pinjaman (id_buku, username, status, tarikh_pinjam, tarikh_pulang) VALUES (?, ?, 'borrowed', ?, ?)");
    $stmt->bind_param("isss", $id_buku, $nama_peminjam, $tarikh_pinjam, $tarikh_pulang);

    if ($stmt->execute()) {
        // Success message for the dialog box
        $_SESSION['success_message'] = "Buku dipinjam berjaya!";
    } else {
        $_SESSION['error_message'] = "Ralat semasa meminjam buku.";
    }

    $stmt->close();
}

$conn->close();
?>

    <form method="post" action="">
        <label for="id_buku">Pilih Buku:</label>
        <select id="id_buku" name="id_buku" required>
            <option value="">Sila pilih buku</option>
            <option value="1">Firewall Fundamentals</option>
            <option value="2">Mastering Internet</option>
            <option value="3">Code Complete</option>
            <option value="4">Eloquent JavaScript</option>
            <option value="5">Introduction to Algorithms</option>
            <option value="6">Python Crash Course</option>
            <option value="7">The Art of Computer Programming</option>
            <option value="8">Design Patterns: Elements of Reusable Object-Oriented Software</option>
            <option value="9">The Elegant Universe</option>
            <option value="10">A Brief History of Time</option>
            <option value="11">The Origin of Species</option>
            <option value="12">The Art of War</option>
            <option value="13">The Power of Habit</option>
            <option value="14">The Road to Serfdom</option>
            <option value="15">Astrophysics for People in a Hurry</option>
            <option value="16">A Handbook of Agile Software Craftsmanship</option>
            <option value="17">Your Journey To Mastery</option>
            <option value="18">Introduction to the Theory of Computation</option>
            <option value="19">C++ a simplified designners approach</option>
            <option value="20">SAM Teach yourself CSS in 24 hours</option>
            <option value="21">You Dont Know JS (book series)</option>
            <option value="22">A Hands-On, Project-Based Introduction to Programming</option>
            <option value="23">JavaScript: The Good Parts</option>
            <option value="24">Head First Design Patterns</option>
            <option value="25">Code Complete</option>
            <option value="26">Operating System Concepts</option>
            <option value="27">Artificial Intelligence: A Modern Approach (4th Edition)</option>
            <option value="28">From Journeyman to Master</option>
            <option value="29">Effective Java (Edisi ke-3)</option>
            <option value="30">Network Security Essentials: Applications and Standards</option>

        </select>

        <label for="nama_peminjam">Nama Peminjam:</label>
        <input type="text" id="nama_peminjam" name="nama_peminjam" placeholder="Masukkan nama anda" required>

        <label for="tarikh_pinjam">Tarikh Pinjam:</label>
        <input type="date" id="tarikh_pinjam" name="tarikh_pinjam" required>

        <label for="tarikh_pulang">Tarikh Pulang:</label>
        <input type="date" id="tarikh_pulang" name="tarikh_pulang" required>

        <input type="submit" name="pinjam_buku" value="Pinjam Buku">
    </form>

    <!-- Dialog Box -->
    <div id="dialogBox" class="dialog-box">
        <p id="dialogMessage">Buku dipinjam berjaya!</p>
        <button onclick="closeDialog()">OK</button>
    </div>

    <script>
        // Function to open the dialog box with a custom message
        function openDialog(message) {
            document.getElementById('dialogMessage').innerText = message;
            document.getElementById('dialogBox').style.display = 'block';
        }

        // Function to close the dialog box and redirect
        function closeDialog() {
            document.getElementById('dialogBox').style.display = 'none';
            window.location.href = "pulangan.php"; // Redirect to pulangan.php after closing dialog
        }

        // Show the dialog if there's a success message in PHP session
        <?php if (isset($_SESSION['success_message'])): ?>
            openDialog("<?php echo $_SESSION['success_message']; ?>");
            <?php unset($_SESSION['success_message']); // Clear the success message from session ?>
        <?php elseif (isset($_SESSION['error_message'])): ?>
            openDialog("<?php echo $_SESSION['error_message']; ?>");
            <?php unset($_SESSION['error_message']); // Clear the error message from session ?>
        <?php endif; ?>
    </script>

    <button class="btn-list" onclick="document.getElementById('list').style.display='block'">Senarai Peminjam</button>
    
    <div id="list" class="book-list" style="display: none;">
        <h2>Status Buku</h2>
        <table>
            <tr>
                <th>Nama Buku</th>
                <th>Status</th>
            </tr>
            <tr>
                <td>Firewall Fundamentals</td>
                <td class="status-borrowed">Borrowed</td>
            </tr>
            <tr>
                <td>Mastering Internet</td>
                <td class="status-available">Available</td>
            </tr>
            <tr>
                <td>Code Complete</td>
                <td class="status-borrowed">Borrowed</td>
            </tr>
            <tr>
                <td>Eloquent JavaScript</td>
                <td class="status-available">Available</td>
            </tr>
            <tr>
                <td>Introduction to Algorithms</td>
                <td class="status-borrowed">Borrowed</td>
            </tr>
            <tr>
                <td>Python Crash Course</td>
                <td class="status-available">Available</td>
            </tr>
            <tr>
                <td>The Art of Computer Programming</td>
                <td class="status-borrowed">Borrowed</td>
            </tr>
            <tr>
                <td>Design Patterns: Elements of Reusable Object-Oriented Software</td>
                <td class="status-available">Available</td>
            </tr>
            <tr>
                <td>The Elegant Universe</td>
                <td class="status-borrowed">Borrowed</td>
            </tr>
            <tr>
                <td>A Brief History of Time</td>
                <td class="status-available">Available</td>
            </tr>
            <tr>
                <td>The Origin of Species</td>
                <td class="status-borrowed">Borrowed</td>
            </tr>
            <tr>
                <td>The Art of War</td>
                <td class="status-available">Available</td>
            </tr>
           
            <tr>
                <td>The Power of Habit</td>
                <td class="status-available">Available</td>
            </tr>
           
            <tr>
                <td>The Road to Serfdom</td>
                <td class="status-available">Available</td>
            </tr>
           
            <tr>
                <td>Astrophysics for People in a Hurry</td>
                <td class="status-available">Available</td>
            </tr>
           
            <tr>
                <td>A Handbook of Agile Software Craftsmanship</td>
                <td class="status-available">Available</td>
            </tr>
            
            <tr>
                <td>Your Journey To Mastery</td>
                <td class="status-available">Available</td>
            </tr>
            
            <tr>
                <td>Introduction to the Theory of Computation</td>
                <td class="status-available">Available</td>
            </tr>
            <tr>
                <td>C++ a simplified designners approach</td>
                <td class="status-available">Available</td>
            </tr>
           
            <tr>
                <td>SAM Teach yourself CSS in 24 hours</td>
                <td class="status-available">Available</td>
            </tr>
           
            <tr>
                <td>You Dont Know JS (book series),</td>
                <td class="status-available">Available</td>
            </tr>
            
            <tr>
                <td>A Hands-On, Project-Based Introduction to Programming</td>
                <td class="status-available">Available</td>
            </tr>
            
            <tr>
                <td>JavaScript: The Good Parts</td>
                <td class="status-available">Available</td>
            </tr>
            <tr>
                <td>Head First Design Patterns</td>
                <td class="status-available">Available</td>
            </tr>
           
            <tr>
                <td>Code Complete(2nd Edition)</td>
                <td class="status-available">Available</td>
            </tr>
           
            <tr>
                <td>Operating System Concepts</td>
                <td class="status-available">Available</td>
            </tr>
           
            <tr>
                <td>Artificial Intelligence: A Modern Approach (4th Edition)</td>
                <td class="status-available">Available</td>
            </tr>
            
            <tr>
                <td>From Journeyman to Master</td>
                <td class="status-available">Available</td>
            </tr>
            
            <tr>
                <td>Effective Java (Edisi ke-3)</td>
                <td class="status-available">Available</td>
            </tr>
            <tr>
                <td>Network Security Essentials: Applications and Standards</td>
                <td class="status-available">Available</td>
            </tr>
        </table>
    </div>

    <div class="footer">
        © 2024 Perpustakaan Online
    </div>
</div>

</body>
</html>
