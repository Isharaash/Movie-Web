<?php
include("Admin.php")
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Page</title>
<style>
 

.form {
    background: #fff;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    margin: 0px auto;
    max-width: 400px;
    padding: 20px;
    position: relative;  
      top: 100px;
      right:-100px;
}

h2 {
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 20px;
}

.link {
    font-size: 18px;
    line-height: 1.5;
    margin-bottom: 20px;
}

.link br {
    display: block;
    margin-top: 10px;
}

    </style>

</head>
<body>


<div class="form">
    
        <h2>Your Profile</h2>
        
   
        <p class="link">Your Firt Name: <?php echo $_SESSION['fname'];?><br><br>
       Your Last Name: <?php echo $_SESSION['lname']; ?> <br><br>
       Your Phone Number:  <?php echo $_SESSION['Phone']; ?> <br><br>
        E-mail:     <?php echo $_SESSION['email'];?>

    </div>



</body>
</html>
