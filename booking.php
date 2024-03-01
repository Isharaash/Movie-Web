<?php
include 'Connection.php';

// Fetch all showtimes for the dropdown
$sql_showtimes = "SELECT showtimes.id, movies.title, showtimes.start_time, showtimes.end_time, showtimes.hall_number
                  FROM showtimes
                  INNER JOIN movies ON showtimes.movie_id = movies.id";
$result_showtimes = $conn->query($sql_showtimes);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $showtime_id = $_POST['showtime_id'];
    $user_id = $_POST['user_id'];
    $seats_booked = $_POST['seats_booked'];
    $booking_date = date('Y-m-d H:i:s');
    $status = 'pending';

    // Insert the new booking into the database
    $sql_insert = "INSERT INTO bookings (showtime_id, user_id, seats_booked, booking_date, status) 
                   VALUES ('$showtime_id', '$user_id', '$seats_booked', '$booking_date', '$status')";

    if ($conn->query($sql_insert) === TRUE) {
        echo "Booking successful!";
        
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
    <title>Book Ticket</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Book Ticket</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="showtime">Select Showtime:</label>
            <select id="showtime" name="showtime_id" required>
                <option value="">Select a showtime</option>
                <?php
                if ($result_showtimes->num_rows > 0) {
                    while ($row = $result_showtimes->fetch_assoc()) {
                        echo "<option value='" . $row['id'] . "'>" . $row['title'] . " - " . $row['start_time'] . " - Hall " . $row['hall_number'] . "</option>";
                    }
                }
                ?>
            </select><br><br>
            
            <!-- Here you can include fields for user details such as name, email, etc. -->
            <label for="user_id">User ID:</label>
            <input type="text" id="user_id" name="user_id" required><br><br>
            
            <label for="seats_booked">Seats Booked:</label>
            <input type="number" id="seats_booked" name="seats_booked" required><br><br>
            
            <input type="submit" value="Book Ticket">
        </form>
    </div>
</body>
</html>

<?php
$conn->close();
?>
