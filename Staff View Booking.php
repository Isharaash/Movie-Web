
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Packages List</title>
    <style>
        
        table {
            width: 70%;
            border-collapse: collapse;
            position: relative;
            margin-top:50px;
            margin-left:280px

        }

        table,
        th,
        td {
            border: 1px solid black;

        }

        th,
        td {
            padding: 8px;
            text-align: left;
            
        }

        th {
          
        }

        .search {
            position: relative;
            left: 550px;
            top: -50px;
        }

        .srch {
            width: 200px;
            padding: 5px;
            margin-top:120px
        }

        .btn {
            background-color: #000033;
            color: #fff;
            border: none;
            padding: 5px 10px;
            border-radius: 3px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #0000ff;
        }
    </style>
</head>

<body>
<?php
include 'Connection.php';
include 'Staff.php';

// Initialize $result
$result = false;

if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $query = "SELECT booking.*, users.fname, users.lname, users.Phone FROM booking
              LEFT JOIN users ON booking.Booking_id = users.id
              WHERE booking.titel LIKE '%$search%'
              OR booking.start_time LIKE '%$search%'
              OR booking.hall_number LIKE '%$search'";
    $result = mysqli_query($conn, $query);

    // Check if query execution was successful
    if (!$result) {
        die("Error executing the query: " . mysqli_error($conn));
    }
} else {
    // If no search query is provided, retrieve all records
    $query = "SELECT booking.*, users.fname, users.lname, users.Phone FROM booking 
    LEFT JOIN users ON booking.Booking_id = users.id";
    $result = mysqli_query($conn, $query);

    // Check if query execution was successful
    if (!$result) {
        die("Error executing the query: " . mysqli_error($conn));
    }
}
?>


    <div class="search">
        <form method="GET" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input class="srch" type="text" name="search" id="search" placeholder="Search Here">
            <input type="submit" value="Search" class="btn">
        </form>
    </div>

    <div class="table_responsive">
        <table>
            <thead>
                <tr>
                    <th>Customer Name</th>
                    <th>Film Name</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Hall Number</th>
                    <th>Seats</th>
                    <th>Phone</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_array($result)) {
                    $customer_fname = $row['fname'];
                    $customer_lname = $row['lname'];
                    $titel = $row['title'];
                    $start_time = $row['start_time'];
                    $end_time = $row['end_time'];
                    $hall_number= $row['hall_number'];
                    $seats= $row['seats'];
                    $Phone = $row['Phone'];

                    echo "<tr>";
                    echo "<td>$customer_fname  $customer_lname </td>";
                    echo "<td>$titel</td>";
                    echo "<td>$start_time</td>";
                    echo "<td>$end_time</td>";
                    echo "<td>$hall_number</td>";
                    echo "<td>$seats</td>";
                    echo "<td>$Phone</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>
