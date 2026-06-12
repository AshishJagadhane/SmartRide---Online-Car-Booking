<?php include "db.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Our Fleet | SmartRide</title>
</head>
<body>
    <?php include "navbar.php"; ?>

    <header style="height: 30vh; display: flex; flex-direction: column; justify-content: center; align-items: center; background: #2c3e50; color: white;">
        <h1>Available Fleet</h1>
        <p>Select the perfect ride for your journey.</p>
    </header>

    <section style="padding: 40px 0;">
        <div class="container" style="display: flex; flex-wrap: wrap; gap: 20px; justify-content: center;">
            <?php
            $result = pg_query($conn, "SELECT * FROM cars");
            if (!$result) {
                echo "<p>Error: " . pg_last_error($conn) . "</p>";
            } else {
                while($row = pg_fetch_assoc($result)) {
                    echo "<div class='card' style='border: 1px solid #ddd; padding: 20px; border-radius: 10px; width: 300px; text-align: center; box-shadow: 0 4px 8px rgba(0,0,0,0.1);'>";
                        
                        // Display car image from database
                        if (!empty($row['image_url'])) {
                            echo "<img src='" . htmlspecialchars($row['image_url']) . "' alt='" . htmlspecialchars($row['name']) . "' style='width:100%; height: 180px; object-fit: cover; border-radius: 8px; margin-bottom: 15px;'>";
                        } else {
                            echo "<div style='font-size: 60px; margin-bottom: 15px;'>🚗</div>"; 
                        }

                        echo "<h3>" . htmlspecialchars($row['name']) . "</h3>";
                        echo "<p class='price' style='font-size: 1.2rem; color: #e74c3c; margin: 10px 0;'>₹" . htmlspecialchars($row['price_per_day']) . " / day</p>";
                        
                        // Functional booking form
                        echo "<form action='book.php' method='POST'>";
                            echo "<input type='hidden' name='car' value='" . htmlspecialchars($row['name']) . "'>";
                            echo "<button type='submit' class='btn' style='width: 100%; padding: 10px; background: #e74c3c; color: white; border: none; border-radius: 5px; cursor: pointer;'>Book Now</button>";
                        echo "</form>";
                    echo "</div>";
                }
            }
            ?>
        </div>
    </section>
</body>
</html>