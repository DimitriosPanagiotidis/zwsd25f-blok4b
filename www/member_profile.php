<?php
include 'session_check.php';
require 'database.php';

$sql = "SELECT * FROM user WHERE member_id IS NOT NULL";
$result = mysqli_query($conn, $sql);
$members = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Members</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="reset.css">
</head>

<body>
    <header>
        <?php include 'navbar.php'; ?>
        <div class="members_container">
            <h2>Welcome, <?php echo $_SESSION['firstname']; ?>!</h2>
        </div>
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
</body>

</html>