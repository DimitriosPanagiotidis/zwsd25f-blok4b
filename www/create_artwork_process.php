<?php
include 'session_check.php';
require 'database.php';


// Validations
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    echo "Invalid request method.";
    echo "<a href='create_artwork.php'> Go back to create artwork</a>";
    exit;
}
// Image validation
if (!isset($_FILES['image']) || $_FILES['image']['error'] !== 0) {
    echo "Image upload is required.";
    echo "<a href='create_artwork.php'> Go back</a>";
    exit;
}

// Allowed image types
$allowedTypes = ['image/jpeg', 'image/png', 'image/webp'];
if (!in_array($_FILES['image']['type'], $allowedTypes)) {
    echo "Only JPG, PNG, and WEBP images are allowed.";
    echo "<a href='create_artwork.php'> Go back</a>";
    exit;
}

// Upload folder
$uploadDir = "images/";
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}
//$newFileName = uniqid() . "." . $extension;
//$anotherNewFileName = uniqid() . "_small".  "." . $extension;


// Generate unique filename
$extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
$newFileName = uniqid() . "." . $extension;
$targetPath = $uploadDir . $newFileName;

// Move uploaded file
if (!move_uploaded_file($_FILES['image']['tmp_name'], $targetPath)) {
    echo "Failed to upload image.";
    exit;
}

// Save this path into database
$image = $targetPath;



if(empty($_POST['title']) || empty($_POST['artist']) || empty($_POST['description']) || empty($_POST['medium']) ||
     empty($_POST['year_created']) || empty($_POST['price']) || empty($_POST['dimensions']) ||  empty($_POST['added_at'])){
    echo "All fields are required.";
    echo "<a href='create_artwork.php'> Go back to create artwork</a>";
    exit;
}

if(!is_numeric($_POST['price'])){
    echo "Price must be a numeric value.";
    echo "<a href='create_artwork.php'> Go back to create artwork</a>";
    exit;
}
if(strlen($_POST['price']) > 10 && $_POST['price'] >= 0){
    echo "Price must not exceed 10 digits.";
    echo "<a href='create_artwork.php'> Go back to create artwork</a>";
    exit;
}
$price = trim($_POST['price']);
if (!preg_match('/^\d+(\.\d{2})$/', $price)) {
    echo "Price must be in this format (1000.00).";
    echo "<br><a href='create_artwork.php'>Go back to create artwork</a>";
    exit;
}


if(strlen($_POST['dimensions']) > 50){
    echo "Dimensions must not exceed 50 characters.";
    echo "<a href='create_artwork.php'> Go back to create artwork</a>";
    exit;
}

if(strlen($_POST['year_created']) != 4 || !is_numeric($_POST['year_created'])){
    echo "Year Created must be a valid year (4 digits).";
    echo "<a href='create_artwork.php'> Go back to create artwork</a>";
    exit;
}

if(!preg_match("/\d{4}-\d{2}-\d{2}/", $_POST['added_at'])){
    echo "Added At must be a valid date (YYYY-MM-DD).";
    echo "<a href='create_artwork.php'> Go back to create artwork</a>";
    exit;
}

$title = $_POST['title'];
$artist = $_POST['artist'];
$description = $_POST['description'];
$medium = $_POST['medium'];
$year_created = $_POST['year_created'];
$added_at = $_POST['added_at'];
$price = $_POST['price'];
$dimensions = $_POST['dimensions'];
$image = $targetPath;
$sql = "INSERT INTO artwork (title, artist, description, medium, year_created, added_at, price, dimensions, image)
        VALUES ('$title', '$artist', '$description', '$medium', '$year_created', '$added_at', '$price', '$dimensions', '$image')";
    
$result = mysqli_query($conn, $sql);
if ($result) {
    header("Location: index.php");
    exit;
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    echo "<a href='create_artwork.php'> Go back to create artwork</a>";
    exit;
}

