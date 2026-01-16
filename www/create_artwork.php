<?php
include 'session_check.php';
require 'database.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Artwork</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="reset.css">
</head>

<body>
    <header>
        <?php include 'navbar.php'; ?>
    </header>
    <main>
        <div class="artworkform_wrapper">
            <form action="create_artwork_process.php" method="post" class="create_artwork" enctype="multipart/form-data">
                <h1>Create Artwork</h1>
                <input type="text" id="title" name="title" placeholder="Title" required>
                <input type="text" id="artist" name="artist" placeholder="Artist" required>
                <textarea id="description" name="description" placeholder="Description" required></textarea>
                <input type="text" id="medium" name="medium" placeholder="Medium" required>
                <input type="text" id="year_created" name="year_created" placeholder="Year Created" required>
                <input type="date" id="added_at" name="added_at" placeholder="Added At" required>
                <input type="text" id="price" name="price" placeholder="Price (1000.00)" required>
                <input type="text" id="dimensions" name="dimensions" placeholder="Dimensions" required>
                <input type="file" id="image" name="image" accept="image/*" required>
                <button type="submit">Create Artwork</button>
            </form>
        </div>
    </main>
    <?php include 'footer.php'; ?>
</body>

</html>