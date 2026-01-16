<?php

include 'session_check.php';
require 'database.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="reset.css">
</head>
<body>
    <header>
        <?php include 'navbar.php'; ?>
    </header>
    <main>
        <div class="profile_container">
            <h1>Your Profile</h1>
            <p><strong>Username:</strong> <?php echo $_SESSION['username']; ?></p>
            <p><strong>Email:</strong> <?php echo $_SESSION['email']; ?></p>
            <p><strong>First Name: </strong> <?php echo $_SESSION['firstname']; ?></p>
            <p><strong>Last Name: </strong> <?php echo $_SESSION['lastname']; ?></p>
        </div>
    </main>
    <?php include 'footer.php'; ?>    
</body>
</html>