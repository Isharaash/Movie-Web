<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<?php
if (count($_POST) > 0) {
    session_start();
    include 'Connection.php';

    $email = $_POST["email"];
    $password = md5($_POST["password"]);

    $sql = "SELECT email, role,id, fname, lname,Phone FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        // User authentication successful
        $row = mysqli_fetch_assoc($result);
        $_SESSION['email'] = $row['email'];
        $_SESSION['id'] = $row['id'];
        $_SESSION['role'] = $row['role'];
        $_SESSION['fname'] = $row['fname'];
        $_SESSION['lname'] = $row['lname'];
        $_SESSION['Phone'] = $row['Phone'];
    
  // Assuming 'role' is the column for user roles

        // Redirect based on the user's role
        if ($row['role'] === 'Admin') {
            echo '<script>alert("Admin login successfully.");</script>';
            echo '<meta http-equiv="refresh" content="2;url=Admin.php">';
            exit();     
        }
     else if ($row['role'] === 'Staff') {
        echo '<script>alert("Staff login successfully.");</script>';
        echo '<meta http-equiv="refresh" content="2;url= Staff.php">';
        exit(); 
     }
      else if ($row['role'] === 'Customers') {
        echo '<script>alert("Customers login successfully.");</script>';
            echo '<meta http-equiv="refresh" content="2;url=Customers.php">';
            exit();    
} 
    } else {
        $msg = "Your Login Name or Password is invalid";
    }
echo "<script type='text/javascript'>alert('$msg');</script>";
}
?>





<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login Form</title>
	
<style>
.form{
    width: 380px;
    height: 380px;
    background: linear-gradient(to top, rgba(0,0,0,0.8)50%,rgba(0,0,0,0.8)50%);
    position: absolute;
    top: 200px;
    left: 450px;
    transform: translate(0%,-5%);
    border-radius: 10px;
    padding: 25px;
}
.form h2{
    width: 330px;
    font-family: sans-serif;
    text-align: center;
    color: #ff7200;
    font-size: 22px;
    background-color: #fff;
    border-radius: 10px;
    margin: 2px;
    padding: 8px;
}
.form input{
    width: 340px;
    height: 35px;
    background: transparent;
    border-bottom: 1px solid #ff7200;
    border-top: none;
    border-right: none;
    border-left: none;
    color: #ffffff;
    font-size: 15px;
    letter-spacing: 1px;
    margin-top: 30px;
    font-family: sans-serif;
}
.form input:focus{
    outline: none;
}
::placeholder{
    color: #fff;
    font-family: Arial;
}
.btnn{
    width: 340px;
    height: 40px;
    background: #ff7200;
    border: none;
    margin-top: 25px;
    font-size: 18px;
    border-radius: 10px;
    cursor: pointer;
    color: #fff;
    transition: 0.4s ease;
}
.btnn:hover{
    background: #fff;
    color: #ff7200;
}
.btnn a{
    text-decoration: none;
    color: #020202;
    font-weight: bold;
}
.form .link{
    font-family: Arial, Helvetica, sans-serif;
    font-size: 17px;
    padding-top: 20px;
    text-align: center;
    color: #ffffff;
}
.form .link a{
    text-decoration: none;
    color: #ff7200;
}

.main{
    width: 100%;
    background: linear-gradient(to top, rgba(0,0,0,0.5)50%,rgba(0,0,0,0.5)50%), url(1.jpg);
    background-position: center;
    background-size: cover;
    height: 100vh;
}


    </style>

<script>
        function validateForm() {
            var email = document.forms["login"]["email"].value;
            var password = document.forms["login"]["password"].value;

            if (email == "") {
                alert("Email must be filled out");
                return false;
            }

            if (password == "") {
                alert("Password must be filled out");
                return false;
            }

            return true;
        }
    </script>
	
</head>
	

<body>



 
<div class="main">

<div class="form">
        <form id="login" method="post" action="" onSubmit="return validateForm();">
            <h2>LOGIN HERE</h2>
            <input type="email" name="email" placeholder="Enter Email Here">
            <input type="password" name="password" placeholder="Enter Password Here">
            <button class="btnn" type="submit">Login</button>
        </form>
        <p class="link">Don't have an account<br>
        <a href="Register Form.php">Sign up</a> here</p>
    </div>

    </div>


</body>
</html>