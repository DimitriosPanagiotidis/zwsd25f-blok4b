<?php

include 'session_check.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <?php include 'navbar.php'; ?>
    </header>
    <main>
        <div class="index-main">
            <h1>Welcome to ArtSpace</h1>
            <p>Your gateway to the world of art.</p>
        </div>
    </main>
    <main>
        <?php include 'artworks.php'; ?>
    </main>
    <?php include 'footer.php'; ?>
</body>

</html>