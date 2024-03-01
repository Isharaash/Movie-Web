<?php
include 'Connection.php';


if(isset($_GET['id'])) {
    $movie_id = $_GET['id'];
} else {
  
    echo "Movie ID is not provided.";
    exit(); 
}


$sql = "SELECT * FROM movies WHERE id = $movie_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {

    echo "Movie details not found.";
    exit(); 
}

if(isset($_POST['submit'])) {
  
    $title = $_POST["title"];
    $description = $_POST["description"];
    $release_date = $_POST["release_date"];
    $duration = $_POST["duration"];
    $rating = $_POST["rating"];

    if($_FILES['image']['name'] !== '') {
        $image = $_FILES['image']['tmp_name'];
        $imgData = addslashes(file_get_contents($image));
        $update_image = ", image_data = '$imgData'";
    } else {
    
        $update_image = '';
    }

    $sql_update = "UPDATE movies SET title = '$title', description = '$description', release_date = '$release_date', duration = '$duration', rating = '$rating' $update_image WHERE id = $movie_id";

    if(mysqli_query($conn, $sql_update)) {
        echo '<script>alert("Movie details updated successfully.");</script>';

        echo '<meta http-equiv="refresh" content="2;url=Admin View Movies.php">';
        exit();     
      

    } else {
        echo "Error updating movie: " . mysqli_error($conn);
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Movie</title>
    <style>
        .container {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.container h2 {
    margin-top: 0;
}

.container form {
    margin-top: 20px;
}

.container label {
    display: block;
    margin-bottom: 5px;
}

.container input[type="text"],
.container input[type="number"],
.container input[type="date"],
.container input[type="submit"],
.container input[type="file"],
.container textarea {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}

.container textarea {
    resize: vertical;
}

.container input[type="submit"] {
    background-color: #007bff;
    color: #fff;
    border: none;
    cursor: pointer;
}

.container input[type="submit"]:hover {
    background-color: #0056b3;
}

.container input[type="file"] {
    padding: 5px;
}

.container input[type="file"]:hover {
    background-color: #f0f0f0;
}
.back-btn {
    display: inline-block;
    padding: 10px 20px;
    background-color: #6c757d; 
    color: #fff; 
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.back-btn:hover {
    background-color: #5a6268; 
}

    </style>
</head>
<body>
    <div class="container">
        <h2>Update Movie</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?id=' . $movie_id; ?>" method="post" enctype="multipart/form-data">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="<?php echo $row['title']; ?>" required><br><br>
            
            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="4" cols="50"></textarea><br><br>
            
            <label for="release_date">Release Date:</label>
            <input type="date" id="release_date" name="release_date" value="<?php echo $row['release_date']; ?>" required><br><br>
            
            <label for="duration">Duration (minutes):</label>
            <input type="number" id="duration" name="duration" value="<?php echo $row['duration']; ?>" required><br><br>
            
            <label for="rating">Rating:</label>
            <input type="number" id="rating" name="rating" step="0.1" min="0" max="10" value="<?php echo $row['rating']; ?>" required><br><br>
            
            <label for="image">Image:</label>
            <input type="file" id="image" name="image" accept="image/*"><br><br>
            
            <input type="submit" name="submit" value="Update">
            <a href="Admin View Movies.php" class="back-btn">Back</a>

        </form>
    </div>
</body>
</html>
