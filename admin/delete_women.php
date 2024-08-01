<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "women_details";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$productID = $_POST['productID'];
$productSubcategory = $_POST['productSubcategory'];

$table = '';
switch ($productSubcategory) {
    case 'dupatta':
        $table = 'dupatta_details';
        break;
    case 'kurti':
        $table = 'kurti_details';
        break;
    case 'saree':
        $table = 'saree_details';
        break;
    default:
        die("Invalid subcategory.");
}

$sql = "DELETE FROM $table WHERE id = $productID";

if ($conn->query($sql) === TRUE) {
    echo "Product deleted successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
