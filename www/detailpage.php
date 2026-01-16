<?php

include 'session_check.php';
require 'database.php';
$artworkId = $_GET['Id'];
$sql = "SELECT * FROM artwork WHERE Id = $artworkId";
$result = mysqli_query($conn, $sql);
$artwork = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $artwork['title']; ?></title>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <?php include 'navbar.php'; ?>
    </header>
    <main>
        <div class="detail_number_artwork">
            <p>Artwork Number: <?php echo $artwork['Id'] ?></p>
        </div>
        <section class="detailpage_one_by_one">
            <?php $img = $artwork['image']; ?>
            <h1><?php echo $artwork['title']; ?></h1>
            <img src="<?php echo substr($img, 0, -4) . "_original.jpg"; ?>" alt="<?php echo $artwork['title']; ?>" />
            <h2>Artist: <?php echo $artwork['artist']; ?></h2>
            <h2>Description: <?php echo $artwork['description']; ?></h2>
            <h2>Medium: <?php echo $artwork['medium']; ?></h2>
            <h2>Year Created: <?php echo $artwork['year_created']; ?></h2>
            <h2>Added at: <?php echo $artwork['added_at']; ?></h2>
            <h2>Price: <?php echo $artwork['price']; ?></h2>
            <h2>Dimensions: <?php echo $artwork['dimensions']; ?></h2>
            <a href="index.php">Back to Home</a>
        </section>
    </main>
    <?php include 'footer.php'; ?>
</body>

</html>