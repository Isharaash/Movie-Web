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
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
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
