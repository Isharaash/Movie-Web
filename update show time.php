<?php
include 'Connection.php';

// Check if showtime id is provided in the URL
if (isset($_GET['id'])) {
    $showtime_id = $_GET['id'];

    // Retrieve showtime details from the database
    $sql_showtime = "SELECT * FROM showtimes WHERE id = $showtime_id";
    $result_showtime = $conn->query($sql_showtime);

    if ($result_showtime->num_rows > 0) {
        $row = $result_showtime->fetch_assoc();
        $start_time = $row['start_time'];
        $end_time = $row['end_time'];
        $hall_number = $row['hall_number'];
    } else {
        echo "Showtime not found.";
        exit();
    }
} else {
    echo "Showtime ID not provided.";
    exit();
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];
    $hall_number = $_POST['hall_number'];

    // Update showtime in the database
    $sql_update = "UPDATE showtimes SET start_time='$start_time', end_time='$end_time', hall_number='$hall_number' WHERE id=$showtime_id";

    if ($conn->query($sql_update) === TRUE) {
        echo "Showtime updated successfully!";
    } else {
        echo "Error updating showtime: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Showtime</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Update Showtime</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?id=' . $showtime_id; ?>" method="post">
            <label for="start_time">Start Time:</label>
            <input type="datetime-local" id="start_time" name="start_time" value="<?php echo $start_time; ?>" required><br><br>
            
            <label for="end_time">End Time:</label>
            <input type="datetime-local" id="end_time" name="end_time" value="<?php echo $end_time; ?>" required><br><br>
            
            <label for="hall_number">Hall Number:</label>
            <input type="number" id="hall_number" name="hall_number" value="<?php echo $hall_number; ?>" required><br><br>
            
            <input type="submit" value="Update Showtime">
        </form>
    </div>
</body>
</html>

<?php
$conn->close();
?>
