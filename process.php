<?php include 'config.php';?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $entered_username = $_POST['username'];
    $entered_password = $_POST['password'];

    $sql = "SELECT * FROM admin WHERE username = '$entered_username' AND password = '$entered_password'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows == 1) {
        session_start();
        $_SESSION['admin_logged_in'] = true;
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Invalid username or password";
    }
}

$conn->close();
?>
