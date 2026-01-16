<?php

include 'session_check.php';
require 'database.php';

$sql = "SELECT * FROM artwork";
$result = mysqli_query($conn, $sql);
$artworks = mysqli_fetch_all($result, MYSQLI_ASSOC);


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artworks Edit</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="reset.css">
</head>

<body>
    <header>
        <?php include 'navbar.php'; ?>
    </header>
    <main>
        <div class="employee_artworks_table">
            <table>
                <thead>
                    <tr>
                        <th>Artwork ID</th>
                        <th>Title</th>
                        <th>Artist</th>
                        <th>Price</th>
                        <th>Actions</th>
                        <th>Image</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($artworks as $artwork): ?>
                        <?php $img = $artwork['image']; ?>
                        <tr>
                            <td><?php echo $artwork['Id']; ?></td>
                            <td><?php echo $artwork['title']; ?></td>
                            <td><?php echo $artwork['artist']; ?></td>
                            <td><?php echo $artwork['price']; ?></td>
                            <td>
                                <a class="edit-button" href="edit_artwork.php?id=<?php echo $artwork['Id']; ?>">Edit</a>
                                <form action="delete_artwork.php" method="POST" class="inline-form">
                                    <input type="hidden" name="id" value="<?php echo $artwork['Id']; ?>">
                                    <button type="submit" class="delete-button"
                                        onclick="return confirm('Are you sure you want to delete this artwork?');">
                                        Delete
                                    </button>
                                </form>

                            </td>
                            <td>
                                <?php if (file_exists(__DIR__ . '/' . substr($img, 0, -4) . "_small.jpg")): ?>
                                    <img src="<?php echo substr($img, 0, -4) . "_small.jpg"; ?>" alt="<?php echo $artwork['title']; ?>" />
                                <?php else: ?>
                                    <img src="<?php echo $img; ?>" alt="<?php echo $artwork['title']; ?>" />
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>


    <?php include 'footer.php' ?>
</body>

</html>