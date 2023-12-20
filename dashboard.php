<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Management Dashboard</title>
</head>
<body>
    <h1>User Management Dashboard</h1>

    <?php
    session_start();
    if(isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
        echo '<div class="dashboard">
                <a href="add_user.php"><button>Add User</button></a>
                
                <form action="logout.php" method="POST">
                    <button type="submit">Logout</button>
                </form>
            </div>';
    } else {
        header("Location: login.html");
        exit();
    }
    ?>
</body>
</html>
