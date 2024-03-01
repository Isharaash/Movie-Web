<?php

include 'connection.php';
include 'Customers.php';


if (session_status() === PHP_SESSION_NONE) {
    session_start();
} 
if ($_SESSION['role'] === 'Customers') {
    $id = $_SESSION['id']; 

    $sql = "SELECT * FROM booking WHERE id = $id";
    $result = mysqli_query($conn, $sql);
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Your Orders</title>
    <style>
        body {
           
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .booking {
            margin-top: 50px;
            text-align: center;
        }
        .booking h2 {
            font-size: 26px;
            color: #f00;
            margin-bottom: 20px;
        }
        .booking table {
            border-collapse: collapse;
            width: 70%;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            margin-left:300px;
            margin-top:100px;
            position: relative;

        }
        .booking th, .booking td {
            padding: 12px;
            text-align: center;
            color: black;
        }
        .booking th {
            background-color: black;
            color: #fff;
        }
        .booking tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <?php
    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            echo "<div class='booking'>";
            echo "<h2>Ticket Booking:</h2>";
            echo "<table>";
            echo "<tr><th>Film Name</th><th>Time</th><th>Day</th><th>Date</th><th>Seats</th></tr>";

            while ($row = mysqli_fetch_assoc($result)) {
                $Booking_id = $row['Booking_id'];
                echo "<tr>";
                echo "<td>" . $row['title'] . "</td>";
                echo "<td>" . $row['start_time'] . "</td>";
                echo "<td>" . $row['end_time'] . "</td>";
                echo "<td>" . $row['hall_number'] . "</td>";
                echo "<td>" . $row['seats'] . "</td>";
               
                echo "</tr>";
            }

            echo "</table>";
            echo "</div>";
        } else {
            echo "<div class='booking'>";
            echo "<h2>You haven't placed any orders yet.</h2>";
            echo "</div>";
        }
    } else {
        echo "<div class='booking'>";
        echo "<h2>Error: " . mysqli_error($conn) . "</h2>";
        echo "</div>";
    }
    ?>
</body>
</html>

