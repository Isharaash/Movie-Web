<?php
include 'Connection.php';

// Retrieve showtimes for each movie
$sql = "SELECT movies.title, movies.image_data, showtimes.id, showtimes.start_time, showtimes.end_time, showtimes.hall_number
        FROM showtimes
        INNER JOIN movies ON showtimes.movie_id = movies.id
        ORDER BY movies.title, showtimes.start_time";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Showtimes</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Showtimes</h2>
        <div class="showtimes-list">
            <?php
            if ($result->num_rows > 0) {
                $current_movie = "";
                while ($row = $result->fetch_assoc()) {
                    if ($row['title'] != $current_movie) {
                        // Start a new section for each movie
                        echo "<div class='movie-section'>";
                        echo "<h3>" . $row['title'] . "</h3>";
                        $current_movie = $row['title'];
                    }
                    echo "<div class='showtime'>";
                    // Display movie image
                    echo "<img src='data:image/jpeg;base64," . base64_encode($row['image_data']) . "' alt='Movie Image'>";
                    echo "<p>Start Time: " . $row['start_time'] . "</p>";
                    echo "<p>End Time: " . $row['end_time'] . "</p>";
                    echo "<p>Hall Number: " . $row['hall_number'] . "</p>";
                    // Generate link to update showtime
                    echo "<a href='update show time.php?id=" . $row['id'] . "' class='button'>Update</a>";
                    echo "<a href='delete show time.php?id=" . $row['id'] . "' class='button' onclick='return confirm(\"Are you sure you want to delete this showtime?\")'>Delete</a>";
                    echo "</div>";
                }
                echo "</div>"; // Close the last movie section
            } else {
                echo "No showtimes available.";
            }
            ?>
        </div>
    </div>
</body>
</html>

<?php
$conn->close();
?>
