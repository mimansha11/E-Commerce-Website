<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "men_details";

// Establish the database connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$id = $_POST['id'];
$updatedProductName = $_POST['updatedProductName'];
$updatedProductPrice = $_POST['updatedProductPrice'];
$updatedProductCategory = $_POST['updatedProductCategory'];
$updatedProductSubcategory = $_POST['updatedProductSubcategory'];

// Prepare SQL statement based on updated product category and subcategory
$table = '';
switch ($updatedProductSubcategory) {
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

// Update data in the database
$sql = "UPDATE $table SET name='$updatedProductName', price='$updatedProductPrice' WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    echo "Product updated successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
