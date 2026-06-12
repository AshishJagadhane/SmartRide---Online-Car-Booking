<?php
include 'db.php';

$user = $_POST['user'];
$pass = $_POST['pass'];

// Save login attempt
$query = "INSERT INTO users(username, password) VALUES('$user', '$pass')";
$result = pg_query($conn, $query);

if ($result) {
    // Redirect to Fleet page upon success
    header("Location: cars.php");
    exit();
} else {
    echo "Error: " . pg_last_error($conn);
}
?>