<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Details</title>
    <style>
        body {
          
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1000px;
            margin: 20px auto;
            padding: 0 20px;
        }
        .container h2{
             text-align: center;
        }

        .movie-card {
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
            margin-bottom: 20px;
            margin-left: 160px;
        }

        .movie-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-bottom: 1px solid #ddd;
        }

        .movie-details {
            padding: 20px;
        }

        .movie-details h3 {
            margin-top: 0;
            margin-bottom: 10px;
            color: #333;
          
        }

        .movie-details p {
            margin: 5px 0;
            color: #666;
        }

        /* Responsive layout */
        @media (min-width: 768px) {
            .movie-card {
                display: flex;
            }

            .movie-card img {
                width: 200px;
                height: auto;
                border-bottom: none;
                border-right: 1px solid #ddd;
            }

            .movie-details {
                flex-grow: 1;
            }



            footer {
    background-color: #333;
    color: #fff;
    text-align: center;
    padding: 20px 0;
    margin-top:150px
}

        }
    </style>
</head>
<body>
<?php
    include "NavBar.php";
    ?>
    <div class="container">
        <h2>Movie Details</h2>
        <?php
        include 'Connection.php';
      
        // Query to fetch movie details
        $sql = "SELECT * FROM movies";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
        ?>
                <div class="movie-card">
                    <img src="data:image/jpeg;base64,<?php echo base64_encode($row['image_data']); ?>" alt="Movie Image">
                    <div class="movie-details">
                        <h3><?php echo $row["title"]; ?></h3>
                        <p><strong>Description:</strong> <?php echo $row["description"]; ?></p>
                        <p><strong>Release Date:</strong> <?php echo $row["release_date"]; ?></p>
                        <p><strong>Duration:</strong> <?php echo $row["duration"]; ?> minutes</p>
                        <p><strong>Rating:</strong> <?php echo $row["rating"]; ?></p>
                    </div>
                </div>
        <?php
            }
        } else {
            echo "<p>No movies found.</p>";
        }
        ?>
    </div>


    <footer>
        <div class="container">
            <p>&copy; 2024 Cineplex. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>

<?php
$conn->close();
?>
