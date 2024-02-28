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
body {
    
    background-color: #f0f0f0;
}

.main {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.form {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width:400px;
    height:300px;
    margin-top:-220px
}

h2 {
    text-align: center;
    margin-bottom: 20px;
}

input[type="email"],
input[type="password"] {
    width: 95%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

button {
    width: 100%;
    padding: 10px;
    background-color: #007bff;
    border: none;
    color: #fff;
    border-radius: 5px;
    cursor: pointer;
}

button:hover {
    background-color: #0056b3;
}

.link {
    text-align: center;
    margin-top: 10px;
}

.link a {
    text-decoration: none;
    color: #007bff;
}

.link a:hover {
    text-decoration: underline;
}
footer {
    background-color: #333;
    color: #fff;
    text-align: center;
    padding: 20px 0;
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
<?php
    include "NavBar.php";
    ?>


 
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
    <footer>
        <div class="container">
            <p>&copy; 2024 Cineplex. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>