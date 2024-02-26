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
.form{
    width: 400px;
    height: 600px;
    background: linear-gradient(to top, rgba(0,0,0,0.8)50%,rgba(0,0,0,0.8)50%);
    position: absolute;
    top: 140px;
    left: 450px;
    transform: translate(0%,-5%);
    border-radius: 10px;
    padding: 25px;
}
.form h2{
    width: 340px;
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

.main{
    width: 100%;
    background: linear-gradient(to top, rgba(0,0,0,0.5)50%,rgba(0,0,0,0.5)50%), url(1.jpg);
    background-position: center;
    background-size: cover;
    height: 110vh;
}



</style>
</head>
<body>
 
    <div class="main">

    <div class="form">
    <form id="form" name="registration" method="post" action="Register.php" onsubmit="return validateForm()">
        <h2>SIGN UP HERE</h2>
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
        
        







</body>
</html>
