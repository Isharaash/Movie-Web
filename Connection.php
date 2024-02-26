<html> <head> <title>Selecting MySQL Database</title> </head> <body>
 <?php $dbhost = 'localhost';
  $dbuser = 'root'; 
  $dbpass = '';
   $conn = mysqli_connect($dbhost, $dbuser, $dbpass);//It opens a connection to a MySQLi Server
   
    if(!$conn ) { 
   die('Could not connect: ' . mysqli_error($conn));
    } 
	// selecting data base
	 
	 $db= mysqli_select_db($conn,'film');
	
	if(!$db){
		
	 echo 'Select database first ';
	
	}else

	
	 	  //mysqli_close($conn); ?> 
      </body> </html>
      
  