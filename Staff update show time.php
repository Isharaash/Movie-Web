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
        // Redirect to admin showtime page with success message
        echo "<script>alert('Showtime updated successfully!'); window.location.href = 'Staff Show Time.php';</script>";
        exit();
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
   <style>
    body {
 
    background-color: #f2f2f2;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 800px;
    margin: 20px auto;
    padding: 0 20px;
}

h2 {
    text-align: center;
}

.form-container {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.form-group {
    margin-bottom: 15px;
}

label {
    display: block;
    margin-bottom: 5px;
}

input[type="datetime-local"],
input[type="number"] {
    width: 100%;
    padding: 8px;
    border-radius: 5px;
    border: 1px solid #ccc;
}

.btn {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
}

.btn:hover {
    background-color: #0056b3;
}
.btn-secondary {
    background-color: #ccc;
    color: #000;
}

.btn-secondary:hover {
    background-color: #bbb;
}


    </style>
</head>
<body>
    <div class="container">
        <h2>Update Showtime</h2>
        <div class="form-container">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?id=' . $showtime_id; ?>" method="post">
                <div class="form-group">
                    <label for="start_time">Start Time:</label>
                    <input type="datetime-local" id="start_time" name="start_time" value="<?php echo $start_time; ?>" required>
                </div>
                
                <div class="form-group">
                    <label for="end_time">End Time:</label>
                    <input type="datetime-local" id="end_time" name="end_time" value="<?php echo $end_time; ?>" required>
                </div>
                
                <div class="form-group">
                    <label for="hall_number">Hall Number:</label>
                    <input type="number" id="hall_number" name="hall_number" value="<?php echo $hall_number; ?>" required>
                </div>
                
                <div class="form-group">
                    <input type="submit" value="Update Showtime" class="btn">
                    <a href="Staff Show Time.php" class="btn btn-secondary">Back</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

<?php
$conn->close();
?>
