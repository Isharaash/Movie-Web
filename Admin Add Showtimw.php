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
        echo '<script>alert("New showtime added successfully!");</script>';
            echo '<script>window.location.href = "Admin Add Showtimw.php";</script>';
            exit();
    
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
    <style>
        /* styles.css */

.showtime-form {
    width: 60%; /* Adjust width as needed */
    margin: 20px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    margin-top: 80px;
}

.showtime-form h2 {
    color: #333;
    text-align: center;
    margin-bottom: 20px;
}

.showtime-form label {
    font-weight: bold;
}

.showtime-form select,
.showtime-form input[type="datetime-local"],
.showtime-form input[type="number"] {
    width: calc(100% - 20px);
    padding: 8px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

.showtime-form input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.showtime-form input[type="submit"]:hover {
    background-color: #45a049;
}

        </style>
</head>
<body>
<?php
include("Admin.php")
    ?>
   <div class="container showtime-form">
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
