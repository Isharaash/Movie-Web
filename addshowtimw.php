<?php
include 'Connection.php';

// Fetch all movies for the dropdown
$sql_movies = "SELECT id, title FROM movies";
$result_movies = $conn->query($sql_movies);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $movie_id = $_POST['movie_id'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];
    $hall_number = $_POST['hall_number'];

    // Insert the new showtime into the database
    $sql_insert = "INSERT INTO showtimes (movie_id, start_time, end_time, hall_number) 
                   VALUES ('$movie_id', '$start_time', '$end_time', '$hall_number')";

    if ($conn->query($sql_insert) === TRUE) {
        echo "New showtime added successfully!";
    } else {
        echo "Error: " . $sql_insert . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Showtime</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Add Showtime</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="movie">Movie:</label>
            <select id="movie" name="movie_id" required>
                <option value="">Select a movie</option>
                <?php
                if ($result_movies->num_rows > 0) {
                    while ($row = $result_movies->fetch_assoc()) {
                        echo "<option value='" . $row['id'] . "'>" . $row['title'] . "</option>";
                    }
                }
                ?>
            </select><br><br>
            
            <label for="start_time">Start Time:</label>
            <input type="datetime-local" id="start_time" name="start_time" required><br><br>
            
            <label for="end_time">End Time:</label>
            <input type="datetime-local" id="end_time" name="end_time" required><br><br>
            
            <label for="hall_number">Hall Number:</label>
            <input type="number" id="hall_number" name="hall_number" required><br><br>
            
            <input type="submit" value="Add Showtime">
        </form>
    </div>
</body>
</html>

<?php
$conn->close();
?>
