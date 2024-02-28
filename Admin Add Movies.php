<?php
include 'Connection.php';


if (!$conn) {
    echo 'Select database first';
} else {
    if (isset($_POST['submit'])) {
        $title = $_POST["title"];
        $description = $_POST["description"];
        $release_date = $_POST["release_date"];
        $duration = $_POST["duration"];
        $rating = $_POST["rating"];
        $image = $_FILES['image']['tmp_name'];
        $imgData = addslashes(file_get_contents($image));

        $sql = "INSERT INTO movies (title, description, release_date, duration, rating, image_data) VALUES ('$title', '$description', '$release_date', '$duration', '$rating', '$imgData')";
        if (mysqli_query($conn, $sql)) {
            echo '<script>alert("Successfully Added Movie.");</script>';
            echo '<script>window.location.href = "AdminAddMovies.php";</script>';
            exit();
        } else {
            echo "Error adding movie: " . mysqli_error($conn);
        }
    }
}
?>

<?php
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Movie</title>
<style>
    /* styles.css */

/* Other styles */

.movie-details {
    background-color: #f9f9f9;
    padding: 20px;
    border-radius: 8px;
    margin-top: 50px;
    margin-left:270px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width:500px
}

.movie-details h2 {
    color: #333;
    margin-bottom: 20px;
    text-align: center;    
}

.movie-details label {
    font-weight: bold;
}

.movie-details input[type="text"],
.movie-details input[type="number"],
.movie-details input[type="date"],
.movie-details textarea {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

/* Additional styles for other elements within .movie-details */

.movie-details input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.movie-details input[type="submit"]:hover {
    background-color: #45a049;
}

    </style>

</head>
<body>
    <?php
include("Admin.php")
    ?>
   <div class="movie-details">
        <h2>Add Movie</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required><br><br>
            
            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="4" cols="50" required></textarea><br><br>
            
            <label for="release_date">Release Date:</label>
            <input type="date" id="release_date" name="release_date" required><br><br>
            
            <label for="duration">Duration (minutes):</label>
            <input type="number" id="duration" name="duration" required><br><br>
            
            <label for="rating">Rating:</label>
            <input type="number" id="rating" name="rating" step="0.1" min="0" max="10" required><br><br>
            
            <label for="image">Image:</label>
            <input type="file" id="image" name="image" accept="image/*" required><br><br>
            
            <input type="submit" name="submit" value="Add Movie">
        </form>
    </div>
</body>
</html>
