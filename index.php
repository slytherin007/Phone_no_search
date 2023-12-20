<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search Users</title>
    <link rel="stylesheet" href="index.css?v=<?php echo time(); ?>">
</head>
<body>
    <h1>Search Users</h1>
    
    <form method="GET">
        <input type="text" name="search_query" placeholder="Enter name or phone number">
        <button type="submit">🔎</button>
    </form>
    
    <div id="search_results">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['search_query'])) {
            $search_query = $_GET['search_query'];
            
            include 'config.php';

            $sql = "SELECT * FROM user_details WHERE name LIKE '%$search_query%' OR phone_number LIKE '%$search_query%'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                echo "<table border=2>";
                echo "<tr><th>ID</th><th>Name</th><th>Phone Number</th></tr>";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["name"] . "</td>";
                    echo "<td>" . $row["phone_number"] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "No results found";
            }
            mysqli_close($conn);
        }
        ?>


        <button class="login-btn" onclick="redirectToLogin()">Admin Login</button>
        <script>
            function redirectToLogin() {
                window.location.href = "login.html";
            }
        </script>
    </div>
</body>
</html>