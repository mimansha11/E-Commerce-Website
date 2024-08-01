<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kid_details";

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
// Ensure $updatedProductSubcategory and $id are properly set
if(isset($_POST['updatedProductSubcategory']) && isset($_POST['id'])) {
    $updatedProductSubcategory = $_POST['updatedProductSubcategory'];
    $id = $_POST['id'];

    // Prepare SQL statement based on updated product category and subcategory
    $table = '';
    switch ($updatedProductSubcategory) {
        case 'frock':
            $table = 'frock_details';
            break;
        case 'pant':
            $table = 'kpants';
            break;
        case 'shirt':
            $table = 'shirt_details';
            break;
        default:
            die("Invalid subcategory.");
    }

    // Update data in the database
    $sql = "UPDATE $table SET name=?, price=? WHERE id=?";
    $stmt = $conn->prepare($sql);

    // Bind parameters to the prepared statement
    $stmt->bind_param("ssi", $updatedProductName, $updatedProductPrice, $id);

    // Set parameters and execute the statement
    $updatedProductName = $_POST['updatedProductName'];
    $updatedProductPrice = $_POST['updatedProductPrice'];

    if ($stmt->execute()) {
        echo "Product updated successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
} else {
    echo "Invalid request!";
}

$conn->close();

