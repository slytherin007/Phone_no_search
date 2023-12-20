<?php include 'config.php';?>

<?php

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $search_query = $_GET['search_query'];
    
    $sql = "SELECT * FROM user_details WHERE name LIKE '%$search_query%' OR phone_number LIKE '%$search_query%'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<table border='1'>";
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
}
?>
