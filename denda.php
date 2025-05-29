<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Denda Lewat</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #2c003e, #4a148c);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            color: #e1bee7;
        }

        .fine-container {
            background: linear-gradient(145deg, #3e0b57, #1b0033);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.5);
            max-width: 500px;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .fine-container:hover {
            transform: scale(1.05);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.7);
        }

        h1 {
            color: #e1bee7;
            margin-bottom: 20px;
            font-size: 30px;
            font-weight: bold;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        p {
            font-size: 18px;
            color: #d1c4e9;
            margin-bottom: 15px;
        }

        .amount {
            font-size: 32px;
            color: #ce93d8;
            font-weight: bold;
        }

        .payment-methods {
            margin-top: 30px;
        }

        .payment-methods h2 {
            color: #ba68c8;
            font-size: 22px;
            margin-bottom: 10px;
            text-transform: uppercase;
        }

        .payment-methods img {
            width: 100px;
            height: auto;
            margin: 10px 0;
            transition: transform 0.3s ease;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.4);
        }

        .payment-methods img:hover {
            transform: scale(1.1);
        }

        .btn-pay {
            background-color: #6a1b9a;
            color: #ffffff;
            padding: 12px 30px;
            text-transform: uppercase;
            border: none;
            border-radius: 25px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
            margin-top: 20px;
            box-shadow: 0 7px 20px rgba(0, 0, 0, 0.5);
        }

        .btn-pay:hover {
            background-color: #4a148c;
            box-shadow: 0 9px 25px rgba(0, 0, 0, 0.7);
        }

        /* Dialog box styling */
        .dialog-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 10;
        }

        .dialog-box {
            background-color: #311b92;
            color: #e1bee7;
            padding: 30px 50px;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
            text-align: center;
        }

        .dialog-box h3 {
            margin: 0 0 15px;
            font-size: 22px;
        }

        .dialog-box button {
            background-color: #6a1b9a;
            color: #ffffff;
            padding: 12px 30px;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            font-size: 16px;
        }

        .dialog-box button:hover {
            background-color: #4a148c;
        }
    </style>
</head>
<body>

<div class="fine-container">
    <h1>Denda Lewat Pulang</h1>
    
    <?php
    session_start();
    
    if (isset($_SESSION['denda']) && isset($_SESSION['hari_lewat'])) {
        $denda = $_SESSION['denda'];
        $hari_lewat = $_SESSION['hari_lewat'];
        echo "<p>Anda telah lewat memulangkan buku sebanyak <strong>$hari_lewat hari</strong>.</p>";
        echo "<p>Denda yang dikenakan adalah:</p>";
        echo "<p class='amount'>RM $denda.00</p>";
        
        // Unset session variables after displaying the fine
        unset($_SESSION['denda']);
        unset($_SESSION['hari_lewat']);
    } else {
        echo "<p>Tiada denda dikenakan.</p>";
    }
    ?>

    <div class="payment-methods">
        <h2>Kaedah Pembayaran</h2>
        <img src="image 1.jpg" alt="TNG">
        <p>Touch n' Go</p>
    </div>

    <button class="btn-pay" onclick="showDialog()">Bayar Sekarang</button>
</div>

<!-- Dialog Box -->
<div class="dialog-overlay" id="dialogOverlay">
    <div class="dialog-box">
        <h3>Bayaran anda telah berjaya!</h3>
        <button onclick="closeDialog()">Close</button>
    </div>
</div>

<script>
    function showDialog() {
        document.getElementById('dialogOverlay').style.display = 'flex';
    }

    function closeDialog() {
        document.getElementById('dialogOverlay').style.display = 'none';
    }
</script>
</body>
</html>
