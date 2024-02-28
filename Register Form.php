<!DOCTYPE html>
<html>
<head>
    <title>My HTML Page</title>
  

    <script>
    function validateForm() {
        var fname = document.getElementById("fname").value;
        var lname = document.getElementById("lname").value;
        var email = document.getElementById("email").value;
        var password = document.getElementById("password").value;
        var conpassword = document.getElementById("conpassword").value;
      
        if (fname === "") {
            alert("Please enter First Name.");
            return false;
        }

        if (lname === "") {
            alert("Please enter Last Name.");
            return false;
        }

     

        if (email === "") {
            alert("Please enter Email.");
            return false;
        }

        if (password === "") {
            alert("Please enter Password.");
            return false;
        }

        if (conpassword === "") {
            alert("Please confirm Password.");
            return false;
        }

        if (password !== conpassword) {
            alert("Passwords do not match.");
            return false;
        }

       

        return true; 
    }
</script>
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
    width:500px;
    height:400px;
}

h2 {
    text-align: center;
    margin-bottom: 20px;
}

input[type="text"],
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
footer {
    background-color: #333;
    color: #fff;
    text-align: center;
    padding: 20px 0;
}


</style>
</head>
<body>
<?php
    include "NavBar.php";
    ?>
 
    <div class="main">

    <div class="form">
    <form id="form" name="registration" method="post" action="Register.php" onsubmit="return validateForm()">
        <h2>Registration</h2>
        <input type="text" name="fname" placeholder="Enter First Name Here" id="fname">
        <input type="text" name="lname" placeholder="Enter Last Name Here" id="lname">
        <input type="text" name="Phone" placeholder="Enter Phone Here" id="Phone">
        <input type="email" name="email" placeholder="Enter Email Here" id="email">
        <input type="password" name="password" placeholder="Enter Password Here" id="password">
        <input type="password" name="conpassword" placeholder="Enter Confirm Password Here" id="conpassword">
        <input type="hidden" name="role" required value="">
        <button class="btnn" type="submit" name="submit" value="Submit">Register</button>
    </form>
</div>

               
        
          
        
            </div>
        
            </div>
        
        

            <footer>
        <div class="container">
            <p>&copy; 2024 Cineplex. All rights reserved.</p>
        </div>
    </footer>





</body>
</html>
