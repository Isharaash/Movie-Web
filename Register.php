<!DOCTYPE html>
<html>
<head>
    <title>My HTML Page</title>
</head>
<body>
  
    <?php

    if(isset($_POST['submit'])){
        include("Connection.php");
        
       $fname=$_POST['fname'];
       $lname=$_POST['lname'];
    
       $Phone=$_POST['Phone'];
       $email=$_POST['email'];
       $password=md5($_POST['password']);
       $role=$_POST['role'];
       
       $sql="INSERT INTO users". "(fname,lname, Phone, email, password, role)" . "VALUES('$fname','$lname','$Phone', '$email','$password','$role')";
        
       $results= mysqli_query($conn, $sql);
        
     if(!$results){
           die('Could not enter dara:'.mysql_error($conn));
            header("location:Register Form.php");
       }
       else
       {
        echo '<script>alert("Customer register successfully.");</script>';
        echo '<meta http-equiv="refresh" content="2;url=Login.php">';
        exit(); 
           
       }
       
    } else{
        echo "Your form is not submitted yet please fill the form and visit again";
        
    }
    
    
    ?>
    




</body>
</html>
