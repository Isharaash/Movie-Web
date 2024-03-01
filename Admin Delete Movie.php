<?php

include 'Connection.php';


if(isset($_GET['id'])) {
   
    $movie_id = $_GET['id'];

    
    $sql = "DELETE FROM movies WHERE id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $movie_id);

  
    if ($stmt->execute()) {
        echo '<script>alert("Movie details delete successfully.");</script>';

        echo '<meta http-equiv="refresh" content="2;url=Admin View Movies.php">';

        exit();
    } else {
      
        echo "Error deleting record: " . $conn->error;
    }


    $stmt->close();
    $conn->close();
}
?>
