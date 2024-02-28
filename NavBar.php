<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cineplex - Home</title>
  <style>

body, h1, h2, h3, p, ul {
    margin: 0;
    padding: 0;
}

/* Set box-sizing to border-box for easier sizing */
* {
    box-sizing: border-box;
}

/* Basic styling */
body {
    font-family: Arial, sans-serif;
    line-height: 1.6;
}

.container {
    max-width: 960px;
    margin: 0 auto;
    padding: 0 20px;
}

header {
    background-color: #333;
    color: #fff;
    padding: 20px 0;
}

header h1 {
    margin: 0;
}

nav ul {
    list-style-type: none;
}

nav ul li {
    display: inline;
    margin-right: 20px;
}

nav ul li a {
    color: #fff;
    text-decoration: none;
}
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1>Cineplex</h1>
            <nav>
                <ul>
                    <li><a href="Home.php">Home</a></li>
                    <li><a href="User Movies.php">Movies</a></li>
                    <li><a href="User Show Time.php">Showtimes</a></li>
                    <li><a href="User Contact.php">Contact</a></li>
                    <li><a href="Login.php">Login</a></li>
                </ul>
            </nav>
        </div>
    </header>
</body>
</html>
