<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Your database credentials
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "kid_details"; // Change this to your database name

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

    switch ($subcategory) {
        case 'pant':
            $tableName = 'kpants';
            break;
        case 'shirt':
            $tableName = 'shirt_details';
            break;
        case 'frock':
            $tableName = 'frock_details';
            break;
        default:
            echo "Invalid subcategory";
            exit;
    }

    // Fetch data from the selected table
    $sql = "SELECT * FROM $tableName";
    $result = $conn->query($sql);

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
    $conn->close();
}
?>
