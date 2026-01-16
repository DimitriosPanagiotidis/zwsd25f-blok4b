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
            <form action="create_artwork_process.php" method="post" class="create_artwork">
                <h1>Create Artwork</h1>
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" placeholder="Title" required>
                
                <label for="artist">Artist:</label>
                <input type="text" id="artist" name="artist" placeholder="Artist" required>
                
                <label for="description">Description:</label>
                <input type="text" id="description" name="description" placeholder="Description" required>

                <label for="medium">Medium</label>
                <input type="text" id="medium" name="medium" placeholder="Medium" required>
                
                <label for="year_created">Year Created:</label>
                <input type="number" id="year_created" name="year_created" placeholder="Year Created" required>
                
                <label for="added_at">Added At:</label>
                <input type="date" id="added_at" name="added_at" placeholder="Added At" required>
                
                <label for="price">Price:</label>
                <input type="text" id="price" name="price" placeholder="Price" required>
                
                <label for="dimensions">Dimensions:</label>
                <input type="text" id="dimensions" name="dimensions" placeholder="Dimensions" required>

                <label for="image">Image URL:</label>
                <input type="text" id="image" name="image" placeholder="Image URL" required>
                <button type="submit">Create Artwork</button>
            </form>
        </div>
    </main>
    <?php include 'footer.php'; ?>
</body>
</html>
