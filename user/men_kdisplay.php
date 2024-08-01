<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "men_details";
$table = "kurta_details"; 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch data from the table
$sql = "SELECT * FROM $table";
$result = $conn->query($sql);

// Check if there are any records
if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<div class='product'>";
        echo "<img src='" . $row["image"] . "' alt='" . $row["name"] . "'>";
        echo "<h3>" . $row["name"] . "</h3>";
        echo "<p>Price: $" . $row["price"] . "</p>";
        // Form for adding to cart
        echo "<form method='post' action='add_to_cart.php'>";
        echo "<input type='hidden' name='product_name' value='" . $row["name"] . "'>";
        echo "<input type='hidden' name='product_price' value='" . $row["price"] . "'>";
        echo "<input type='hidden' name='product_image' value='" . $row["image"] . "'>";
        echo "<button type='submit' class='add-to-cart'>Add to Cart</button>";
        echo "</form>";
        echo "<button class='add-to-wishlist'>Add to Wishlist</button>";
        echo "</div>";
    }
} else {
    echo "No products found";
}

// Close connection
$conn->close();
?>
