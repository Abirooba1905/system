<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_buku = $_POST['id_buku'];
    $tarikh_pinjam = $_POST['tarikh_pinjam'];
    $tarikh_pulang = $_POST['tarikh_pulang'];

    $due_date = new DateTime($tarikh_pinjam);
    $return_date = new DateTime($tarikh_pulang);

    // Check if the return date is after the due date
    if ($return_date > $due_date) {
        $late_days = $return_date->diff($due_date)->days;
        $_SESSION['late_message'] = "You are too late, you need to pay a late fee.";
        $_SESSION['late_fee'] = $late_days * 5; // Example late fee, RM5 per day
    } else {
        $_SESSION['success_message'] = "Buku hantar berjaya!";
    }

    header("Location: pulangan.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pulang Buku</title>
    <style>
        /* Add CSS styling as in your previous code */
       /* Universal styles */
/* Universal styles */
/* Universal styles */
body {
    font-family: 'Roboto', sans-serif;
    background-color: #1c1b1e;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    margin: 0;
    color: #e0e0e0;
}

/* Container styling */
.borrow-container {
    background: linear-gradient(135deg, #2e2b32 50%, #4a148c 100%);
    width: 400px;
    padding: 25px;
    border-radius: 15px;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.4);
    text-align: center;
    animation: fadeIn 0.5s ease-in-out;
}

.borrow-container h1 {
    color: #b39ddb;
    font-size: 26px;
    font-weight: 700;
    margin-bottom: 25px;
    text-transform: uppercase;
    letter-spacing: 1px;
}

/* Form styling */
form {
    display: flex;
    flex-direction: column;
}

label {
    font-size: 15px;
    color: #d1c4e9;
    margin-bottom: 6px;
    text-align: left;
}

input[type="date"],
select,
input[type="submit"] {
    padding: 12px;
    margin-bottom: 18px;
    border: none;
    border-radius: 10px;
    font-size: 15px;
    color: #d1c4e9;
    background-color: #2e2b32;
    outline: none;
    transition: background-color 0.3s ease, color 0.3s ease;
}

select:hover,
input[type="date"]:hover {
    background-color: #3d3a42;
}

input[type="submit"] {
    background-color: #6a1b9a;
    color: #ffffff;
    font-weight: 600;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #8e24aa;
}

/* Dialog box styling */
.dialog-box {
    background-color: #4a148c;
    color: #e0e0e0;
    padding: 18px;
    margin-top: 25px;
    border-radius: 12px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
    animation: slideDown 0.4s ease;
}

.dialog-box p {
    margin: 0 0 15px;
}

.dialog-box button,
.dialog-box a button {
    background-color: #6a1b9a;
    color: #ffffff;
    border: none;
    padding: 10px 15px;
    border-radius: 8px;
    cursor: pointer;
    font-size: 14px;
    margin-top: 8px;
    transition: background-color 0.3s ease;
}

.dialog-box button:hover,
.dialog-box a button:hover {
    background-color: #8e24aa;
}

.dialog-box a {
    text-decoration: none;
}

/* Animations */
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: scale(0.95);
    }
    to {
        opacity: 1;
        transform: scale(1);
    }
}

@keyframes slideDown {
    from {
        opacity: 0;
        transform: translateY(-20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}


    </style>
</head>
<body>
    
<div class="borrow-container">
    <h1>Pulang Buku</h1>

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

        <label for="tarikh_pinjam">Tarikh Pinjam:</label>
        <input type="date" id="tarikh_pinjam" name="tarikh_pinjam" required>

        <label for="tarikh_pulang">Tarikh Pulang:</label>
        <input type="date" id="tarikh_pulang" name="tarikh_pulang" required>

        <input type="submit" value="Pulang Buku">
    </form>

    <?php if (isset($_SESSION['late_message'])): ?>
        <div class="dialog-box">
            <p><?php echo $_SESSION['late_message']; ?> Denda: RM<?php echo $_SESSION['late_fee']; ?></p>
            <button onclick="closeDialog()">OK</button>
            <!-- Button to view denda.php -->
            <a href="denda.php"><button>Lihat Denda</button></a>
        </div>
        <?php unset($_SESSION['late_message'], $_SESSION['late_fee']); ?>
    <?php elseif (isset($_SESSION['success_message'])): ?>
        <div class="dialog-box">
            <p><?php echo $_SESSION['success_message']; ?></p>
            <button onclick="closeDialog()">OK</button>
        </div>
        <?php unset($_SESSION['success_message']); ?>
    <?php endif; ?>

    <script>
        function closeDialog() {
            document.querySelector('.dialog-box').style.display = 'none';
        }
    </script>
</div>
</body>
</html>
