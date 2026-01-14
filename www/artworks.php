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
            foreach ($artworks as $artwork): ?>
                <?php $img = $artwork['image']; ?>
                <div>
                <h2><?php echo $artwork['title']; ?></h2>
                <p><?php echo "Artist: " . $artwork['artist']; ?></p>
                <p><?php echo "Year: " . $artwork['year_created']; ?></p>
                <?php // Substr 0 dus begint vanaf het begin en -4 om de laatste 4 karakters (.jpg) te verwijderen ?>
                <img src="<?php echo substr($img, 0, -4) . "_small.jpg"; ?>" alt="<?php echo $artwork['title']; ?>" />
                </div>
            <?php endforeach; ?>
        </section>
    </main>
</body>

</html>