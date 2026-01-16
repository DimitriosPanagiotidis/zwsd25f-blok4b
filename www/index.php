<?php

include 'session_check.php';
require 'database.php';

$sql = "SELECT * FROM artwork";

//Filter on price
if (isset($_GET['price'])) {
    if ($_GET['price'] === 'asc') {
        $sql = "SELECT * FROM artwork ORDER BY CAST(price AS DECIMAL(10,2)) ASC";
    } elseif ($_GET['price'] === 'desc') {
        $sql = "SELECT * FROM artwork ORDER BY CAST(price AS DECIMAL(10,2)) DESC";
    }
}
//Filter on price range
if (isset($_GET['price'])) {
    if ($_GET['price'] === 'budget') {
        $sql = "SELECT * FROM artwork WHERE CAST(price AS DECIMAL(10,2)) > 0 AND CAST(price AS DECIMAL(10,2)) <= 600";
    } elseif ($_GET['price'] === 'midrange') {
        $sql = "SELECT * FROM artwork WHERE CAST(price AS DECIMAL(10,2)) BETWEEN 600 AND 1000";
    } elseif ($_GET['price'] === 'premium') {
        $sql = "SELECT * FROM artwork WHERE CAST(price AS DECIMAL(10,2)) > 1000";
    }
}

//Filter on medium
if (isset($_GET['medium'])) {
    if ($_GET['medium'] !== 'all_mediums') {
        $medium = $_GET['medium'];
        $sql = "SELECT * FROM artwork WHERE medium = '$medium'";
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
    <link rel="icon" href="/images/favicon.ico">
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
            </ul>
        </section>
        <!-- Filter by price -->
        <section class="dropdown_styling">
            <select id="price-filter" onchange="window.location.href = this.value;">
                <option value="index.php">Sort by Price</option>
                <option value="?price=asc">Price Low - High</option>
                <option value="?price=desc">Price High - Low</option>
            </select>
            <!-- Filter by price range -->
            <select id="price-range" onchange="window.location.href = this.value;">
                <option value="index.php">Select Price Range</option>
                <option value="?price=budget">Budget</option>
                <option value="?price=midrange">Mid-Range</option>
                <option value="?price=premium">Premium</option>
            </select>
            <!-- Filter by medium -->
            <select id="medium-filter" onchange="window.location.href = this.value;">
                <option value="index.php">All Mediums</option>
                <option value="?medium=Oil%20on%20Canvas">Oil</option>
                <option value="?medium=Acrylic%20On%20Canvas">Acrylic</option>
                <option value="?medium=Watercolor">Watercolor</option>
                <option value="?medium=Digital%20Art%20Print">Digital</option>
                <option value="?medium=Mixed%20Media">Mixed Media</option>
                <option value="?medium=Photography%20Print">Photography Print</option>
            </select>
        </section>
        <?php include 'artworks.php'; ?>
    </main>
    <?php include 'footer.php'; ?>
</body>

</html>