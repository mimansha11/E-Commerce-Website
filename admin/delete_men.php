<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "men_details";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$productID = $_POST['productID'];
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

$sql = "DELETE FROM $table WHERE id = $productID";

if ($conn->query($sql) === TRUE) {
    echo "Product deleted successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
