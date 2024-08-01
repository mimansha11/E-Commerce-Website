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

    // Insert the product into men_c table
    $sql_men_c = "INSERT INTO men_c (product_name, product_price, product_image) VALUES ('$product_name', '$product_price', '$product_image')";

    if ($conn->query($sql_men_c) === FALSE) {
        echo "Error: " . $sql_men_c . "<br>" . $conn->error;
    }
    else{
        echo '<script>alert("Item added to cart successfully!!");</script>';
        //echo 'window.location.href = "men_pant.php";</script>';
        //exit();
    }
}
$conn->close();

// Close connection
?>
