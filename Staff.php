<?php

session_start();

if (!isset($_SESSION['email']) || $_SESSION['role'] !== 'Staff') {
    header("location: Login.php");
    exit(); 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>User Sidebar</title>
    <style>
       

        .sidebar {
            position: fixed;
            left: 0;
            top: 120px;
            width: 200px;
            height: 65%;
            background-color: #333;
            color: #fff;
            padding-top: 20px;
            margin-top:-40px

        }

        .sidebar h3 {
            text-align: center;
            margin-bottom: 20px;
            font-size:25px
        }

        .sidebar-menu {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .sidebar-menu li {
            padding: 10px 0;
            text-align: center;
            font-size:18px
        }

        .sidebar-menu li a {
            color: #fff;
            text-decoration: none;
            display: block;
        }

        .sidebar-menu li a:hover {
            background-color: #555;
        }
    </style>
</head>
<body>

<div class="sidebar">
    <h3><?php echo $_SESSION['fname']; ?></h3>
    <ul class="sidebar-menu">
        <li><a href="Staff.php">Home</a></li>
        <li><a href="Staff Profile.php">Profile</a></li>
        <li><a href="Staff View Movies.php">Movies</a></li>
        <li><a href="Staff Add Showtimw.php">Add Show Time</a></li>
        <li><a href="Staff Show Time.php">Show Time</a></li>
        <li><a href="Staff View Booking.php">Booking</a></li>
        <li><a href="Logout.php">Logout</a></li>
    </ul>
</div>

</body>
</html>
