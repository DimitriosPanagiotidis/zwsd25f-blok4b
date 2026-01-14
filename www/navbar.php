<?php

// Ternary zodat ik verschillende pagina's kan markeren als actief in de navbar
// Checkt via de URL of het word bevat dat overeenkomt met de pagina

$about = (str_contains($_SERVER['REQUEST_URI'], 'about')) ? 'active' : '';
$contact = (str_contains($_SERVER['REQUEST_URI'], 'contact')) ? 'active' : '';
$gallery = (str_contains($_SERVER['REQUEST_URI'], 'gallery')) ? 'active' : '';

if($about != 'active' && $contact != 'active' && $gallery != 'active') {
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
    </nav>

    <button class="hamburger" id="hamburger" aria-label="Menu">
        <span></span>
        <span></span>
        <span></span>
    </button>
</header>
<script src="script.js"></script>