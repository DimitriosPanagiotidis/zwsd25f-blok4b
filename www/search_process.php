<?php

include 'session_check.php';
require 'database.php';


// Validations

if(isset($_GET['search_input'])){
    $searchInput = $_GET['search_input'];
    if(empty($searchInput)){
        echo "Search input cannot be empty.";
        echo "<a href='index.php'> Go back to homepage</a>";
        exit;
    }

    // Prepare and execute the search query
    $sql = "SELECT * FROM artwork WHERE title LIKE '%$searchInput%' OR artist LIKE '%$searchInput%' OR year_created LIKE '%$searchInput%'";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        echo "Error executing search query: " . mysqli_error($conn);
        echo "<a href='index.php'> Go back to homepage</a>";
        exit;
    }
    $artworks = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    echo "No search input provided.";
    echo "<a href='index.php'> Go back to homepage</a>";
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="reset.css">
</head>
<body>
    <header>
        <?php include 'navbar.php'; ?>
        <div class="searchprocess_results">
            <h1>Search Results for "<?php echo $searchInput; ?>"</h1>
        </div>
    </header>
    <main>
        <section class="artworks">
            <?php
            if (count($artworks) > 0):
                foreach ($artworks as $artwork): ?>
                    <?php $img = $artwork['image']; ?>
                    <div>
                        <h2><?php echo $artwork['title']; ?></h2>
                        <p><?php echo "Artist: " . $artwork['artist']; ?></p>
                        <p><?php echo "Year: " . $artwork['year_created']; ?></p>
                        <a href="detailpage.php?Id=<?php echo $artwork['Id']; ?>">
                            <img src="<?php echo substr($img, 0, -4) . "_small.jpg"; ?>" alt="<?php echo $artwork['title']; ?>" />
                        </a>
                    </div>
                <?php endforeach; 
            else: ?>
                <p>No artworks found matching your search criteria.</p>
            <?php endif; ?>
        </section>
    </main>
    <?php include 'footer.php'; ?>
</body>
</html>
