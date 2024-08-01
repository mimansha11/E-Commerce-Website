<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cart_items";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get product details from the submitted form
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];

    // Insert the product into wishlist table
    $sql_wishlist = "INSERT INTO wishlist (product_name, product_price, product_image) VALUES ('$product_name', '$product_price', '$product_image')";

    if ($conn->query($sql_wishlist) === TRUE) {
        echo "Product added to wishlist successfully";
    } else {
        echo "Error: " . $sql_wishlist . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>
