<?php
require 'database.php';

if($_SERVER['REQUEST_METHOD'] != 'POST'){
    echo "Invalid request method.";
    echo "<a href='login.php'> Go back to login</a>";
    exit;
}
$email = $_POST['email'];
$password = $_POST['password'];

if(empty($email) || empty($password)){
    echo "Both email and password are required.";
    echo "<a href='login.php'> Go back to login</a>";
    exit;
}

$sql = "SELECT * FROM user WHERE email = '$email'";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result); // We need only one user


if(is_array($user)){
    if($user['password'] == $password){ // user is found and password matches
        session_start();
        $_SESSION['email'] = $user['email'];
        $_SESSION['firstname'] = $user['firstname'];
        $_SESSION['lastname'] = $user['lastname'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['user_id'] = $user['Id'];
        header("Location: index.php");
        exit;
    } 
} else {
    echo "No user found with that email.";
    echo "<a href='login.php'> Go back to login</a>";
    exit;
}
