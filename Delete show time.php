<?php
include 'Connection.php';

// Check if showtime id is provided in the URL
if (isset($_GET['id'])) {
    $showtime_id = $_GET['id'];

    // Delete the showtime from the database
    $sql_delete = "DELETE FROM showtimes WHERE id = $showtime_id";

    if ($conn->query($sql_delete) === TRUE) {
        echo "Showtime deleted successfully!";
    } else {
        echo "Error deleting showtime: " . $conn->error;
    }
} else {
    echo "Showtime ID not provided.";
}

$conn->close();
?>
