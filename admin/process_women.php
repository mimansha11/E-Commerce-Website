<!--adding form- -->
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "women_details";

$conn = new mysqli($servername, $username, $password, $dbname);

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

$sql = "INSERT INTO $table (name, price, image) VALUES ('$productName', '$productPrice', '$targetFile')";

if ($conn->query($sql) === TRUE) {
    echo "Product added successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
