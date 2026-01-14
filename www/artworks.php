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
        <main>
            <section class="artworks">
                <?php
            foreach ($artworks as $artwork) {
                $img = $artwork['image'];
                echo "<div>";
                echo "<h2>" . $artwork['title']. "</h2>";
                echo "<p>Artist: " . $artwork['artist'] . "</p>";
                echo "<p>Year: " . $artwork['year_created'] . "</p>";

                echo "<img src='" . substr($img, 0, -4) . "_small.jpg" . "' alt='" . $artwork['title'] . "' />";
                
                echo "</div>";
            }
            ?>
        </section>
    </main>

    <footer>
        <?php include 'footer.php'; ?>
    </footer>

</body>

</html>