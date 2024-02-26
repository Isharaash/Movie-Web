<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Showtimes</title>
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        .search-form {
            margin-bottom: 20px;
            text-align: center;
        }

        .search-form input[type="text"] {
            padding: 8px;
            width: 250px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-right: 10px;
        }

        .search-form button {
            padding: 8px 16px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .search-form button:hover {
            background-color: #0056b3;
        }
        .container {
            max-width: 1000px;
            margin: 20px auto;
            padding: 0 20px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .movie-card {
            display: inline-block;
            padding: 20px;
            border: 1px solid #ddd;
            margin: 30px;
            max-width: 300px;
            box-shadow: 2px 2px 10px black;
            margin-left: 90px; 
            position: relative;  
            left: 100px;
        }

        .movie-section {
            display: flex;
            flex-direction: column;
        }

        .movie-section img {
            width: 100%;
            border-top-left-radius: 1px;
            border-bottom-left-radius: 1px;
        }

        .movie-details {
            padding: 20px;
            flex-grow: 1;
        }

        .movie-details h3 {
            margin-top: 0;
            margin-bottom: 10px;
            font-size: 1.5em;
        }

        .movie-details p {
            margin: 5px 0;
            text-align: center;
        }

        .button {
            display: inline-block;
            padding: 8px 16px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            margin-left: 100px;
        }

        .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Showtimes</h2>
        
        <!-- Search Box -->
        <form action="" method="GET" class="search-form">
            <input type="text" id="search" name="search" placeholder="Search by Title">
            <button type="submit">Search</button>
        </form>
        
        <div class="showtimes-list">
            <?php
            include 'Connection.php';
            include 'Customers.php';

            // Initialize search term variable
            $searchTerm = '';

            // Check if search term is provided in the URL
            if (isset($_GET['search'])) {
                $searchTerm = $_GET['search'];
            }

            // Modify your SQL query to include search term if provided
            $sql = "SELECT movies.title, movies.image_data, movies.description, showtimes.id, showtimes.start_time, showtimes.end_time, showtimes.hall_number
                    FROM showtimes
                    INNER JOIN movies ON showtimes.movie_id = movies.id";

            // If search term is provided, add WHERE clause to filter by movie title
            if (!empty($searchTerm)) {
                $sql .= " WHERE movies.title LIKE '%$searchTerm%'";
            }

            $sql .= " ORDER BY movies.title, showtimes.start_time";

            $result = $conn->query($sql);

            if ($result === false) {
                die("Error executing the query: " . $conn->error);
            }

            if ($result->num_rows > 0) {
                $current_movie = "";
                while ($row = $result->fetch_assoc()) {
                    if ($row['title'] != $current_movie) {
                        echo "<div class='movie-card'>";
                        echo "<div class='movie-section'>";
                        echo "<img src='data:image/jpeg;base64," . base64_encode($row['image_data']) . "' alt='Movie Image'>";
                        echo "<div class='movie-details'>";
                        echo "<h3>" . $row['title'] . "</h3>";
                        echo "<p>" . $row['description'] . "</p>";
                        echo "<p><strong>Start Time:</strong> " . $row['start_time'] . "</p>";
                        echo "<p><strong>End Time:</strong> " . $row['end_time'] . "</p>";
                        echo "<p><strong>Hall Number:</strong> " . $row['hall_number'] . "</p>";
                        // Generate link to book the showtime
                        echo "<a href='Cutomer Booking.php?title=" . urlencode($row['title']) . "&start_time=" . urlencode($row['start_time']) . "&hall_number=" . urlencode($row['hall_number']) . "&end_time=" . urlencode($row['end_time']) . "' class='button'>Book</a>";
                        echo "</div></div></div>";
                        $current_movie = $row['title'];
                    }
                }
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
