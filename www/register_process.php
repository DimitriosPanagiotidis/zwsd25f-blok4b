<?php
require 'database.php';

// Validations for user input

if (
    empty($_POST['username']) || empty($_POST['email']) || empty($_POST['password'])
    || empty($_POST['firstname']) || empty($_POST['lastname']) || !isset($_POST['terms'])
) {
    echo "All fields are required.";
    echo "<a href='register.php'> Go back to registration</a>";
    exit;
}

if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email format.";
    echo "<a href='register.php'> Go back to registration</a>";
    exit;
}
if (strlen($_POST['password']) < 6) {
    echo "Password must be at least 6 characters long.";
    echo "<a href='register.php'> Go back to registration</a>";
    exit;
}

// Validations for address input

if (
    empty($_POST['street']) || empty($_POST['city'] || empty($_POST['mobile'])) || empty($_POST['zipcode']) || empty($_POST['country'])
    || empty($_POST['phone'])
) {
    echo "All address fields are required.";
    echo "<a href='register.php'> Go back to registration</a>";
    exit;
}

if (!is_numeric($_POST['mobile'])) {
    echo "Mobile number must be numeric.";
    echo "<a href='register.php'> Go back to registration</a>";
    exit;
}

if (!is_numeric($_POST['phone'])) {
    echo "Phone number must be numeric.";
    echo "<a href='register.php'> Go back to registration</a>";
    exit;
}

if (strlen($_POST['mobile']) < 10) {
    echo "Mobile number must be at least 10 digits long.";
    echo "<a href='register.php'> Go back to registration</a>";
    exit;
}

if (strlen($_POST['phone']) < 10) {
    echo "Phone number must be at least 10 digits long.";
    echo "<a href='register.php'> Go back to registration</a>";
    exit;
}

if (empty($_POST['member_number']) || !is_numeric($_POST['member_number'])) {
    echo "Member number is required and must be numeric.";
    echo "<a href='register.php'> Go back to registration</a>";
    exit;
}
// End Validations



// Address inputs
$street = $_POST['street'];
$housenumber = $_POST['housenumber'];
$city = $_POST['city'];
$zipcode = $_POST['zipcode'];
$country = $_POST['country'];
$phone = $_POST['phone'];
$mobile = $_POST['mobile'];

$sql = "INSERT INTO address (street,housenumber,city,zipcode,country,phone,mobile)"
    . " VALUES ('$street', '$housenumber', '$city','$zipcode', '$country', '$phone', '$mobile')";

$result = mysqli_query($conn, $sql);
if (!$result) {
    echo "Error inserting address: " . mysqli_error($conn);
    echo "<a href='register.php'> Go back to registration</a>";
    exit;
}

$address_id = mysqli_insert_id($conn);

// Sanitize and assign user inputs
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = ($_POST['password']);

// Check if username or email already exists

$member_number = $_POST['member_number'];
$Null = NULL;
$sql = "INSERT INTO member (member_number,last_login_date)"
    . "VALUES ('$member_number',$Null)";
$member_id = mysqli_insert_id($conn);

$sql = "INSERT INTO user (firstname, lastname, email, username, password, address_id) "
    . "VALUES ('$firstname', '$lastname', '$email', '$username', '$password', '$address_id')";
$result = mysqli_query($conn, $sql);
if (!$result) {
    echo "Error inserting user: " . mysqli_error($conn);
    echo "<a href='register.php'> Go back to registration</a>";
    exit;
}
