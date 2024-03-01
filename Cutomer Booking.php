<?php
session_start();

// Check if user is logged in as a customer, if not, redirect to login page
if (!isset($_SESSION['email']) || $_SESSION['role'] !== 'Customers') {
    header("location: Login.php");
    exit();
}

// Retrieve details from URL parameters
$title = urldecode($_GET['title']);
$start_time = urldecode($_GET['start_time']);
$end_time = urldecode($_GET['end_time']);
$hall_number = urldecode($_GET['hall_number']);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Booking</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
        }

  
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

       
        header {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
        }

    
        .form {
            display: flex;
            flex-direction: column;
        }

     
        .input-box {
            margin-bottom: 15px;
        }

        .input-box label {
            display: block;
            margin-bottom: 5px;
        }

        .input-box input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

    
        button[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }

       
        .back-button {
            display: inline-block;
            background-color: #ccc;
            color: #333;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 10px;
            text-align: center;
        }

       .back-button:hover {
            background-color: #ddd;
        }
    </style>
   
</head>
<body>
    <section class="container">
        <header>File Ticket Booking</header>
        <form class="form" action="Book.php" method="post" onsubmit="return validateForm()">
            <!-- Hidden input fields to pass data to the booking page -->
            <input type="hidden" name="title" value="<?php echo htmlspecialchars($title); ?>" readonly>
            <input type="hidden" name="start_time" value="<?php echo htmlspecialchars($start_time); ?>" readonly>
            <input type="hidden" name="end_time" value="<?php echo htmlspecialchars($end_time); ?>" readonly>
            <input type="hidden" name="hall_number" value="<?php echo htmlspecialchars($hall_number); ?>" readonly>
            <div class="input-box">
                <label for="seats">Number of Seats:</label>
                <input type="number" name="seats" id="seats" onchange="updateTotalPrice();" required>
            </div>
            <button type="submit">Order</button>
            <a href="Customer Show Time.php" class="back-button">Back</a>
        </form>
    </section>
</body>
</html>
