<?php
session_start(); // Start the session if not already started
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Details</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="cust_det.css">
</head>
<body>
    <section id="header">
        <div id="name">
            <h1 class="logo">Khadi<span>Mart.</span></h1>
        </div>
        
        <div id="searchbar">
            <form>
                <input type="text" placeholder="Search products">
                <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
            </form>
        </div>
        <div>
            <ul id="navbar-right">
                <li><a href="admin_dash.php">Home</a></li>
            </ul>
        </div>
    </section>
    <div class="customer-details">
        <h2>Customer Details</h2>
    <?php
    // Assuming you have a database connection established
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "login_info";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $sql = "SELECT * FROM sign_up where cust_id >1 ORDER BY cust_id ASC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<div class='table-container'>";
        echo "<table>";
        echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Phone Number</th><th>Address</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["cust_id"] . "</td><td>" . $row["ne"] . "</td><td>" . $row["email"] . "</td><td>" . $row["phnum"] . "</td><td>" . $row["addr"] . "</td></tr>";
        }
        echo "</table>";
        echo "</div>";
    } else {
        echo "0 results";
    }

    $conn->close();
    ?>
    </div>
</body>
</html>
