<?php

include 'session_check.php';
require 'database.php';

$sql = "SELECT * FROM user WHERE member_id IS NOT NULL";
$result = mysqli_query($conn, $sql);
$members = mysqli_fetch_all($result, MYSQLI_ASSOC);


if(isset($_GET['search_user'])){
    $search_term = $_GET['search_user'];
    if(empty($search_term)){
        echo "Search term cannot be empty.";
        echo "<a href='members_overview.php'> Go back to members overview</a>";
        exit;
    }
    $sql = "SELECT * FROM user WHERE 
            member_id IS NOT NULL AND 
            (lastname LIKE '%$search_term%' OR 
            email LIKE '%$search_term%')";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        echo "Error executing search query: " . mysqli_error($conn);
        echo "<a href='members_overview.php'> Go back to members overview</a>";
        exit;
    }
    $members = mysqli_fetch_all($result, MYSQLI_ASSOC);
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Users</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="reset.css">
</head>
<body>
    <header>
        <?php include 'navbar.php'; ?>
    </header>
    <main>
        <section class="members_section">
        </section>
        <section>
            <table class="members_overview">
                <thead>
                    <tr>
                        <th>Member ID</th>
                        <th>Username</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($members as $member): ?>
                        <tr>
                            <td><?php echo $member['Id']; ?></td>
                            <td><?php echo $member['username']; ?></td>
                            <td><?php echo $member['firstname']; ?></td>
                            <td><?php echo $member['lastname']; ?></td>
                            <td><?php echo $member['email']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>
    </main>
    <?php include 'footer.php'; ?>    
</body>
</html>
