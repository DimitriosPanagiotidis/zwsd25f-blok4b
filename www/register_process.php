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

if (strlen($_POST['member_number']) < 4 && $_POST['employee_member'] === 'no') {
    echo "Member number must be at least 4 digits long.";
    echo "<a href='register.php'> Go back to registration</a>";
    exit;
}

if (!isset($_POST['employee_member'])) {
    echo "Please select if you are an employee or a member.";
    echo "<a href='register.php'> Go back to registration</a>";
    exit;
}

if ($_POST['employee_member'] === 'yes') {
    if (empty($_POST['start_date']) || empty($_POST['job_title'])) {
        echo "Employee fields are required.";
        echo "<a href='register.php'> Go back to registration</a>";
        exit;
    }
} elseif ($_POST['employee_member'] === 'no') {
    if (empty($_POST['member_number'])) {
        echo "Member fields are required.";
        echo "<a href='register.php'> Go back to registration</a>";
        exit;
    }
} else {
    echo "Invalid selection for employee or member.";
    echo "<a href='register.php'> Go back to registration</a>";
    exit;
}

if (!isset($_POST['terms'])) {
    echo "You must agree to the Terms and Conditions.";
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
// Foreign key address_id
$address_id = mysqli_insert_id($conn);

// Member inputs
$member_number = $_POST['member_number'];
if ($_POST['employee_member'] === 'no') {
    $sql = "INSERT INTO member (member_number,last_login_date)"
        . "VALUES ('$member_number', NULL)";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        echo "Error inserting member: " . mysqli_error($conn);
        echo "<a href='register.php'> Go back to registration</a>";
        exit;
    }
    $member_id = mysqli_insert_id($conn);
} else {
    $member_id = "NULL";
}
// Foreign key member_id
// Employee inputs
$start_date = $_POST['start_date'];
$job_title = $_POST['job_title'];


if ($_POST['employee_member'] === 'yes') {
    $sql = "INSERT INTO employee (start_date, job_title) "
        . "VALUES ('$start_date', '$job_title')";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        echo "Error inserting employee: " . mysqli_error($conn);
        echo "<a href='register.php'> Go back to registration</a>";
        exit;
    }
    $employee_id = mysqli_insert_id($conn);
} else {
    $employee_id = "NULL";
}

// User inputs
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = ($_POST['password']);

$sql = "INSERT INTO user (firstname, lastname, email, username, password, address_id, member_id, employee_id) "
    . "VALUES ('$firstname', '$lastname', '$email', '$username', '$password', $address_id, $member_id, $employee_id)";



$result = mysqli_query($conn, $sql);
if (!$result) {
    echo "Error inserting user: " . mysqli_error($conn);
    echo "<a href='register.php'> Go back to registration</a>";
    exit;
}
