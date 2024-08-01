<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "admin";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM checkout_details";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["order_id"] . "</td>
                <td>" . $row["customer_name"] . "</td>
                <td>" . $row["customer_email"] . "</td>
                <td>" . $row["customer_phone"] . "</td>
                <td>" . $row["order_date"] . "</td>
                <td>" . $row["product_id"] . "</td>
                <td>" . $row["product_name"] . "</td>
                <td>" . $row["quantity"] . "</td>
                <td>" . $row["product_price"] . "</td>
                <td>" . $row["shipping_address"] . "</td>
                <td>" . $row["total_price"] . "</td>
            </tr>";
    }
} else {
    echo "<tr><td colspan='10'>No data available</td></tr>";
}

$conn->close();
?>
