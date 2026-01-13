<?php

include 'database.php';

$sql = "SELECT * FROM artwork";
$result = mysqli_query($conn, $sql);
$artworks = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artworks</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="reset.css">
</head>

<body>
    <header>
        <?php include 'navbar.php'; ?>
    </header>

    <main>
        <section class="artworks">
            <?php
        foreach ($artworks as $artwork) {
            echo "<div>";
            echo "<h2>" . htmlspecialchars($artwork['title']) . "</h2>";
            echo "<p>Artist: " . htmlspecialchars($artwork['artist']) . "</p>";
            echo "<p>Year: " . htmlspecialchars($artwork['year_created']) . "</p>";
            echo "<img src='" . htmlspecialchars($artwork['image']) . "' alt='" . htmlspecialchars($artwork['title']) . "' />";
            echo "</div>";
        }
        ?>
        </section>
    </main>

    <footer>
        <!-- footer content -->
    </footer>

</body>

</html>