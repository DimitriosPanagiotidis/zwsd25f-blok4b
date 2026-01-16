<?php
require 'database.php';

$id = $_POST['id'];

$sql = "DELETE FROM artwork WHERE Id = $id";
mysqli_query($conn, $sql);

header("Location: employee_artworks.php");
exit;
?>
