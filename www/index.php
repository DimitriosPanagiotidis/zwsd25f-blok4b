<?php

include 'session_check.php';
require 'database.php';

$sql = "SELECT * FROM artwork";

//Filter on price
if(isset($_GET['price'])){
    if($_GET['price'] === 'asc'){
        $sql = "SELECT * FROM artwork ORDER BY CAST(price AS DECIMAL(10,2)) ASC";
    }
    elseif($_GET['price'] === 'desc'){
        $sql = "SELECT * FROM artwork ORDER BY CAST(price AS DECIMAL(10,2)) DESC";
    }
}

$result = mysqli_query($conn, $sql);
$artworks = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="index_header">
        <?php include 'navbar.php'; ?>
            <div class="welcome_message">
                <h2>Welcome back! <span><?php echo $_SESSION['username']; ?></span></h2>
            </div>
        <p><?php echo $_SESSION['last_login']; ?></p>
    </header>
    <section>
        <div class="index-main">
            <h1>ArtSpace</h1>
            <h2>Your gateway to the world of art.</h2>
        </div>
    </section>
    <main>
        <!-- Filters -->
        <section class="filters">
            <ul>
                <li>
                    <a href="index.php">All Artworks</a>
                </li>
                <li>
                    <a href="?price=asc">Price Low - High</a>
                </li>
                <li>
                    <a href="?price=desc">Price High - Low</a>
                </li>
            </ul>
        </section>


        <?php include 'artworks.php'; ?>
    </main>
    <?php include 'footer.php'; ?>
</body>

</html>