<?php
// Start the session to access session variables
session_start();

// Check if the user is logged in and has the 'Admin' role
if (!isset($_SESSION['email']) || $_SESSION['role'] !== 'Admin') {
    
    // Redirect to the login page if the user is not logged in or not a Admin
    header("location: Login.php");
    exit(); // Terminate script execution
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Customers Dashboard</title>
<style>
	body {
    background-image: url('1.jpg'); 
    background-size: cover; 
    background-repeat: no-repeat;
    background-attachment: fixed; 
    background-color: #000; 
    color: #fff; /
}
    .sidenav {
    width: 380px;
    height: 380px;
    background: linear-gradient(to top, rgba(0,0,0,0.8)50%,rgba(0,0,0,0.8)50%);
    position: absolute;
    top: 150px;
    left: 450px;
    transform: translate(0%,-5%);
    border-radius: 10px;
    padding: 25px;
        }
        h1 {
            width: 410px;
            font-family: sans-serif;
            color: #FEFEFE;
            font-size: 40px;
            background: linear-gradient(to top, rgba(0,0,0,0.8)50%,rgba(0,0,0,0.8)50%);
            border-radius: 10px;
            margin: 2px;
            padding: 8px;
            position: absolute;
            left: 450px;
            text-align:center;
            top:5px;
        }
        .sidenav a {
    padding: 10px 15px 15px 120px;
    text-decoration: none;
    font-size: 30px;
    color: #f1f1f1;
    display: block;
 }   
        .sidenav a:hover {
            background-color: #555; 
        }

</style>
</head>
<body>
<h1>Welcome, Admin <?php echo $_SESSION['fname'] ?></h1>
 
<div class="sidenav">
         
         <a href="Admin Profile.php"> Profile</a>
         <a href="Admin Add Menu.php">Add Menu</a>
        <a href="Admin Menu.php">View Menu</a>
        <a href="Admin Order List.php">View Orders</a>
         <a href="Add New Staff.php">Add Staff</a>
         <a href="Add New Admin.php">Add Admins</a>
         <a href="Logout.php">Logout</a>
      
      
     </div>
    




</body>
</html>
