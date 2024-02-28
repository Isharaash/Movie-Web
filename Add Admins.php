
<!DOCTYPE html>
<html>
<head>
    <title>Admin</title>

    <style>
/* Reset default margin and padding */
.container {
    max-width: 400px;
    margin: 50px auto;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.container header {
    text-align: center;
    font-size: 24px;
    margin-bottom: 20px;
}

.form .input-box {
    margin-bottom: 15px;
}

.form label {
    display: block;
    margin-bottom: 5px;
}

.form input[type="text"],
.form input[type="email"],
.form input[type="password"],
.form select {
    width: calc(100% - 12px);
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
    margin-bottom: 10px;
}

.form button {
    width: 100%;
    padding: 10px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.form button:hover {
    background-color:  #0056b3;

}


</style>

</head>
<body>
    <?php
include "Admin.php";
    ?>

<section class="container">
    <header>Add Admin</header>
    <form action="Admin Register.php " method="post" class="form" onsubmit="return validateForm();">

    <div class="input-box">
            <label>First Name:</label>
            <input type="text" name="fname" id="fname">
        </div>

        <div class="input-box">
            <label>Last Name:</label>
            <input type="text" name="lname" id="lname">
        </div>

        <div class="input-box">
            <label>Phone:</label>
            <input type="text" name="Phone" id="Phone">
        </div>

        <div class="input-box">
            <label>Email:</label>
            <input type="email" name="email" id="email">
        </div>

        <div class="input-box">
            <label>Password:</label>
            <input type="password" name="password" id="password">
        </div>

        <div class="input-box">
            <label>Confirm Password:</label>
            <input type="password" name="conpassword" id="conpassword">
        </div>

        <label for="role">Select User Role:</label>
        <select id="role" name="role">
            <option value="Admin">Admin</option>
            <option value="Staff">Staff</option>
        </select>

        <button type="submit" name="submit" value="Submit">Submit</button>
     
    </form>
</section>

<script>
  function validateForm() {
    var fname = document.getElementById("fname").value
        var lname = document.getElementById("lname").value
        var email = document.getElementById("email").value;
        var Phone = document.getElementById("Phone").value;
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
        if (Phone === "") {
            alert("Please enter Phone.");
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



</body>
</html>