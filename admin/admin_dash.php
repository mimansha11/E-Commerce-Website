<?php
// Start the session to check if the admin is logged in
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Khadi Mart Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="admin_da.css">
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
        <ul id="sign">
            <?php
            // Check if the user is logged in
            if (isset($_SESSION['user_id'])) {
                // If logged in, display the logout button and user profile sign
                echo '<li class="logged-in">';
                echo '<a href="logout.php"><i class="fa-thin fa-user"></i><span>Logout</span></a>';
                // Display user profile sign with text "admin"
                echo '<div class="user-profile-sign"><i class="fa-thin fa-user"></i>admin</div>';
                echo '</li>';
            } else {
                // If not logged in, display the login/signup button
                echo '<li><a href="log.php"><i class="fa-thin fa-sign-in"></i><span>Login/Sign up</span></a></li>';
            }
            ?>
        </ul>
        </div>
    </section>
    <section id="dashboard-buttons">
        <div class="admin-box" onclick="location.href='admin_panel.html'">
            <h2>Order Details</h2>
        </div>
        <div class="admin-box" onclick="location.href='cust_det.php'">
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

                $sql = "SELECT COUNT(*) AS total_customers FROM sign_up";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    echo "<p>Total Customers: " . $row["total_customers"] . "</p>";
                } else {
                    echo "<p>Total Customers: 0</p>";
                }

                $conn->close();
            ?>
        </div>
        <div class="admin-box" onclick="location.href='stock.html'">
            <h2>Stock Items</h2>
        </div>
        <div class="admin-box" onclick="location.href='upload.php'">
            <h2>Upload Products</h2>
        </div>
        <div class="admin-box" onclick="location.href='delete_stock.html'">
            <h2>Delete Products</h2>
        </div>
        <div class="admin-box" onclick="location.href='alter_product.html'">
            <h2>Alter Items</h2>
        </div>
    </section>
    
</body>
</html>
