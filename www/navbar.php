<?php

// Ternary so in that way i can set the active class to the correct page
// Check which page is currently being viewed VIA THE URL

$about = (str_contains($_SERVER['REQUEST_URI'], 'about')) ? 'active' : '';
$contact = (str_contains($_SERVER['REQUEST_URI'], 'contact')) ? 'active' : '';
$gallery = (str_contains($_SERVER['REQUEST_URI'], 'gallery')) ? 'active' : '';
$register = (str_contains($_SERVER['REQUEST_URI'], 'register')) ? 'active' : '';
$login = (str_contains($_SERVER['REQUEST_URI'], 'login')) ? 'active' : '';

if($about != 'active' && $contact != 'active' && $gallery != 'active' && $register != 'active' && $login != 'active') {
    $index = 'active';
}


?>
<header class="navbar">
    <div class="navbar-brand">ARTSPACE</div>

    <nav class="navbar-links" id="navLinks">
        <a href="index.php"  class="<?php echo $index; ?>">Home</a>
        <a href="gallery.php" class="<?php echo $gallery; ?>">Gallery</a>
        <a href="about.php" class="<?php echo $about; ?>">About</a>
        <a href="contact.php" class="<?php echo $contact; ?>">Contact</a>
        <a href="register.php" class="<?php echo $register ?>">Register</a>
        <a href="login.php" class="<?php echo $login ?>">Login</a>
    </nav>


    <button class="hamburger" id="hamburger" aria-label="Menu">
        <span></span>
        <span></span>
        <span></span>
    </button>
</header>
<script src="script.js"></script>