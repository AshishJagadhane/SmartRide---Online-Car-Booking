<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $car = $_POST['car'];
    
    // Insert car name into the booking table
    $query = "INSERT INTO booking(car_id) VALUES('$car')";
    $result = pg_query($conn, $query);

    if ($result) {
        echo "<script>alert('Success! Your $car has been booked.'); window.location.href='cars.php';</script>";
    } else {
        echo "Booking failed: " . pg_last_error($conn);
    }
}
?>