<?php

// Ternary so in that way i can set the active class to the correct page
// Check which page is currently being viewed VIA THE URL

$about = (str_contains($_SERVER['REQUEST_URI'], 'about')) ? 'active' : '';
$contact = (str_contains($_SERVER['REQUEST_URI'], 'contact')) ? 'active' : '';
$register = (str_contains($_SERVER['REQUEST_URI'], 'register')) ? 'active' : '';
$login = (str_contains($_SERVER['REQUEST_URI'], 'login')) ? 'active' : '';
$member = (str_contains($_SERVER['REQUEST_URI'], 'members')) ? 'active' : '';
$employee_dashboard = (str_contains($_SERVER['REQUEST_URI'], 'employee_dashboard')) ? 'active' : '';
if (
    $about != 'active' && $contact != 'active' && $register != 'active' &&
    $login != 'active' && $member != 'active' && $employee_dashboard != 'active'
) {
    $index = 'active';
}


?>
<header class="navbar">
    <div class="navbar-brand"><a href="index.php" class="logo_link">ARTSPACE</a></div>
    <?php if (isset($_SESSION['member_id'])): ?>
        <!-- Timer via JS -->
        <div class="timer" id="session-timer"></div>
    <?php endif; ?>

    <?php if (isset($_SESSION['member_id']) || isset($_SESSION['employee_id'])): ?>
        <form class="search_bar" method="get" action="search_process.php">
            <input type="search" id="search_input" name="search_input" placeholder="Search artworks...">
            <button type="submit" id="search-button">Search</button>
        </form>
    <?php endif; ?>

    <nav class="navbar-links" id="navLinks">
        <?php if (isset($_SESSION['user_id'])): ?>
            <a href="index.php" class="<?php echo $index; ?>">Home</a>
        <?php endif; ?>
        <?php if(isset($_SESSION['employee_id'])): ?>
            <a href="employee_dashboard.php" class="<?php echo $employee_dashboard; ?>">Dashboard</a>
        <?php endif; ?>
        <a href="about.php" class="<?php echo $about; ?>">About</a>
        <a href="contact.php" class="<?php echo $contact; ?>">Contact</a>
        <?php if (!isset($_SESSION['user_id'])): ?>
            <a href="register.php" class="<?php echo $register ?>">Register</a>
        <?php endif; ?>
        <?php if (isset($_SESSION['member_id'])): ?>
            <a href="profile_member.php" class="<?php echo $member_profile; ?>">Profile</a>
        <?php endif; ?>
        <?php if (isset($_SESSION['user_id'])): ?>
            <a href="logout.php">Logout</a>
        <?php else: ?>
            <a href="login.php" class="<?php echo $login ?>">Login</a>
        <?php endif; ?>
    </nav>


    <button class="hamburger" id="hamburger" aria-label="Menu">
        <span></span>
        <span></span>
        <span></span>
    </button>
</header>
<script src="script.js"></script>