<?php
include 'Connection.php';
include 'Customers.php';


// Query to fetch movie details
$sql = "SELECT * FROM movies";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Details</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Movie Details</h2>
        <?php if ($result->num_rows > 0) : ?>
            <table>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Release Date</th>
                    <th>Duration</th>
                    <th>Rating</th>
                    <th>Image</th>
                </tr>
                <?php while ($row = $result->fetch_assoc()) : ?>
                    <tr>
                        <td><?php echo $row["title"]; ?></td>
                        <td><?php echo $row["description"]; ?></td>
                        <td><?php echo $row["release_date"]; ?></td>
                        <td><?php echo $row["duration"]; ?> minutes</td>
                        <td><?php echo $row["rating"]; ?></td>
                      
                        <td><img src="data:image/jpeg;base64,<?php echo base64_encode($row['image_data']); ?>" width="100px" height="100px" alt="Movie Image"></td>
                       
                    </tr>
                <?php endwhile; ?>
            </table>
        <?php else : ?>
            <p>No movies found.</p>
        <?php endif; ?>
    </div>
</body>
</html>

<?php
$conn->close();
?>
