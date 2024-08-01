<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Khadi Mart</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="men_design.css">
    <style>
        /* Additional CSS for the Buy Now button */
        .buy-now-container {
            position: fixed;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            text-align: center;
            width: 100%;
        }

        .buy-now-button {
            display: inline-block;
            background-color: #0000FF;
            color: white;
            padding: 15px 30px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 18px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .buy-now-button:hover {
            background-color: #45a049;
        }
    </style>
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
                <li><a href="../index.php">Home</a></li>
            </ul>
        </div>
</section>
    <div class="container">
        <h2>Wish List</h2>
        <div class="products">
            <?php
            // Database connection parameters
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "cart_items";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Check if the form was submitted
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['remove_item'])) {
                $id = $_POST['remove_item'];

                // SQL query to delete the item from the database
                $sql_delete = "DELETE FROM wishlist WHERE id = $id";

                if ($conn->query($sql_delete) === TRUE) {
                    // Redirect back to the same page to display the updated list of items
                    //header("Location: ".$_SERVER['wish_item_dis.php']);
                    exit(); // Make sure to exit after the redirection
                } else {
                    echo "Error removing item: " . $conn->error;
                }
            }

            // SQL query to fetch data from the men_c table
            $sql = "SELECT * FROM wishlist";
            $result = $conn->query($sql);

            // Check if there are any records
            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<div class='product'>";
                    echo "<img src='" . $row["product_image"] . "' alt='" . $row["product_name"] . "'>";
                    echo "<h3>" . $row["product_name"] . "</h3>";
                    echo "<p>Price: $" . $row["product_price"] . "</p>";
                    // Add a form with a button to remove the item
                    echo "<form method='post'>";
                    echo "<input type='hidden' name='remove_item' value='" . $row['id'] . "'>";
                    echo "<button type='submit'>Remove from wishlist</button>";
                    echo "</form>";
                    echo "</div>";
                }
            } else {
                echo "No products found in wishlist";
            }

            // Close connection
            $conn->close();
            ?>
        </div>
    </div>

    <!-- Buy Now Button -->
    <div class="buy-now-container">
        <button class="buy-now-button">Buy Now</button>
    </div>
</body>
</html>
