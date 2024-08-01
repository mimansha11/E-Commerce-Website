<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "men_details";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$productName = $_POST['productName'];
$productPrice = $_POST['productPrice'];
$productImage = $_FILES['productImage']['name'];
$targetFile = "uploads/" . basename($productImage);

$productSubcategory = $_POST['productSubcategory'];

$table = '';
switch ($productSubcategory) {
    case 'kurta':
        $table = 'kurta_details';
        break;
    case 'pant':
        $table = 'men_pant';
        break;
    case 'shirt':
        $table = 'shirt_details';
        break;
    default:
        die("Invalid subcategory.");
}

// Prepare SQL statement
$sql = "INSERT INTO $table (name, price, image) VALUES (?, ?, ?)";

// Prepare and bind parameters
$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Error in preparing statement: " . $conn->error);
}

$stmt->bind_param("sss", $productName, $productPrice, $targetFile);

// Execute the statement
if ($stmt->execute()) {
    echo "Product added successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close statement and connection
$stmt->close();
$conn->close();
?>
