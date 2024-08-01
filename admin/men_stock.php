<?php
// Your database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "men_details"; // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data based on selected category and subcategory
$category = $_POST['category'];
$subcategory = $_POST['subcategory'];

// Determine the table name based on the selected category and subcategory
$tableName = '';

if ($category === 'men') {
    switch ($subcategory) {
        case 'pant':
            $tableName = 'men_pant';
            break;
        case 'shirt':
            $tableName = 'shirt_details';
            break;
        case 'kurta':
            $tableName = 'kurta_details';
            break;
        default:
            echo "Invalid subcategory";
            exit;
    }
} elseif ($category === 'women') {
    // Add code for women's categories
} elseif ($category === 'kid') {
    // Add code for kid's categories
}

// Fetch data from the selected table
$sql = "SELECT * FROM $tableName";
$result = $conn->query($sql);

// Check for errors in the SQL query execution
if (!$result) {
    // Print error message if query fails
    echo "Error: " . $sql . "<br>" . $conn->error;
} else {
    // Display the data in a table format
    if ($result->num_rows > 0) {
        echo '<table border="1">';
        echo '<tr><th>ID</th><th>Name</th><th>Price</th><th>Image</th></tr>';
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row['id'] . '</td>';
            echo '<td>' . $row['name'] . '</td>';
            echo '<td>' . $row['price'] . '</td>';
            echo '<td>' . $row['image'] . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo "0 results";
    }
}

$conn->close();
?>
