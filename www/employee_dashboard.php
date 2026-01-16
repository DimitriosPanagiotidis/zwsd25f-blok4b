<?php
include 'session_check.php';

// Optional: check if role = employee
if (!isset($_SESSION['employee_id'])) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="reset.css">
</head>

<body>
    <header class="employee_dashboard_header">
        <?php include 'navbar.php'; ?>
        <div class="employee_welcome_container">
            <h1>Employee Dashboard</h1>
            <p>Welcome, <?php echo $_SESSION['username']; ?>!</p>
        </div>
    </header>
    <main class="navbar_dashboard_employee">
        <ul>
            <li><a href="employee_artworks.php">Manage Artworks</a></li>
            <li><a href="members_overview.php">View Members</a></li>
            <li><a href="create_artwork.php">Add Artwork</a></li>
        </ul>
    </main>
    <?php include 'footer.php'; ?>
</body>

</html>