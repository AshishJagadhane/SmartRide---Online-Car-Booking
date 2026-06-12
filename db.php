<?php
// Replace 'yourpassword' with the password you set during PostgreSQL installation
$conn = pg_connect("host=localhost dbname=smartride user=postgres password=root");

if (!$conn) {
    die("Connection failed: " . pg_last_error());
}
?>