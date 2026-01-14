<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
</head>
<body>
    <header>
        <?php include 'navbar.php'; ?>
    </header>
    <main>
        <section class="gallery-header">
        <h1>Gallery Page</h1>
        <p>Welcome to the Gallery!</p>
        </section>
        <section>
            <?php include 'artworks.php'; ?>
        </section>
    </main>

    <?php include 'footer.php'; ?>
</body>
</html>