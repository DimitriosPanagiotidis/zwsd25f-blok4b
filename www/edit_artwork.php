<?php
include 'session_check.php';
require 'database.php';

$id = $_GET['id'];

// Get artwork
$result = mysqli_query($conn, "SELECT * FROM artwork WHERE Id = $id");
$artwork = mysqli_fetch_assoc($result);

// If form submitted → update
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title  = $_POST['title'];
    $artist = $_POST['artist'];
    $price  = $_POST['price'];

    mysqli_query($conn, "
        UPDATE artwork 
        SET title='$title', artist='$artist', price='$price'
        WHERE Id=$id
    ");

    header("Location: employee_artworks.php");
    exit;
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Edit Artwork</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="reset.css">
</head>

<body>
    <header>
        <?php include 'navbar.php'; ?>
    </header>

    <main>
        <div class="artworkform_wrapper">
            <h1>Edit Artwork</h1>
            <form method="POST">
                <label>Title</label>
                <input type="text" name="title" value="<?php echo $artwork['title']; ?>" required>

                <label>Artist</label>
                <input type="text" name="artist" value="<?php echo $artwork['artist']; ?>" required>

                <label>Price</label>
                <input type="number" step="0.01" name="price" value="<?php echo $artwork['price']; ?>" required>

                <button type="submit">Save Changes</button>
                <a href="employee_artworks.php" class="cancel-link">Cancel</a>
            </form>
        </div>
    </main>

    <?php include 'footer.php'; ?>
</body>

</html>