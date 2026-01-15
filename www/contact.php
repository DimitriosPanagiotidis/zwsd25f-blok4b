<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="reset.css">
</head>
<body>
    <header>
        <?php include 'navbar.php'; ?>
    </header>
    <main>
        <div class="contact-header">
            <h1>Contact Page</h1>
            <p>Get in touch with us!</p>
        </div>

        <form action="#" class="contact-form">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" placeholder="Jan Jansen" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="example@example.com" required>

            <label for="telephone">Telephone:</label>
            <input type="tel" id="telephone" name="telephone" placeholder="+31-612345678" required>

            <label for="message">Message:</label>
            <textarea id="message" name="message" placeholder="Your message here..." required></textarea>

            <button type="submit">Send</button>
        </form>
    </main>
    <footer>
        <?php include 'footer.php'; ?>
    </footer>
</body>
</html>