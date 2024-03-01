<?php
session_start();
include 'connection.php';

if ($_SESSION['role'] === 'Customers') {
    if (count($_POST) > 0) {
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $start_time = mysqli_real_escape_string($conn, $_POST['start_time']); 
        $end_time = mysqli_real_escape_string($conn, $_POST['end_time']); 
        $hall_number = mysqli_real_escape_string($conn, $_POST['hall_number']); 
        $seats = intval($_POST['seats']); 
   
        $id = $_SESSION['id'];  // Use the customer's ID

        // Insert the order into the database
        $sql = "INSERT INTO booking (id,title,start_time,end_time,hall_number, seats) 
                VALUES ('$id', '$title', '$start_time', '$end_time', '$hall_number', '$seats')";

        if (mysqli_query($conn, $sql)) {
            echo '<script>alert("Successfully Placed Order.");</script>';
            // Redirect to the appropriate page after placing the order
            echo '<script>window.location.href = "success.php";</script>';
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Please fill out the order form.";
    }
} else {
    echo "You are not authorized to access this page.";
}
?>
