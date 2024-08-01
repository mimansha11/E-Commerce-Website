<?php
// Start the session to check if the admin is logged in
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="uploadp.css">
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
    <div class="container">
        <h2>Add Product</h2>
        <form id="productForm" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="productName">Product Name:</label>
                <input type="text" name="productName" required>
            </div>

            <div class="form-group">
                <label for="productPrice">Product Price:</label>
                <input type="number" name="productPrice" required>
            </div>

            <div class="form-group">
                <label for="productCategory">Product Category:</label>
                <select name="productCategory" id="productCategory" required>
                    <option value="men">Men</option>
                    <option value="women">Women</option>
                    <option value="kid">Kid</option>
                </select>
            </div>

            <div class="form-group">
                <label for="productSubcategory">Product Subcategory:</label>
                <input type="text" name="productSubcategory" id="productSubcategory" required>
            </div>

            <div class="form-group">
                <label for="productImage">Product Image:</label>
                <input type="file" name="productImage" accept="image/*" required>
            </div>

            <div class="form-group">
                <input type="submit" value="Submit">
            </div>
        </form>
    </div>

    <script>
        document.getElementById('productForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent form submission
    
            // Get the selected category and subcategory
            var category = document.getElementById('productCategory').value.trim().toLowerCase();
            var subcategory = document.getElementById('productSubcategory').value.trim().toLowerCase();
    
            // Determine the form action based on category and subcategory
            var actionUrl = '';
    
            if (category === 'men' && (subcategory === 'kurta' || subcategory === 'pant' || subcategory === 'shirt' )){
                actionUrl = 'process_men.php';
            } else if (category === 'women' && (subcategory === 'kurti' || subcategory === 'saree' || subcategory === 'dupatta')) {
                actionUrl = 'process_women.php';
            } else if (category === 'kid' && (subcategory === 'frock' || subcategory === 'pant' || subcategory === 'shirt')) {
                actionUrl = 'process_kid.php';
            } else {
                alert('Invalid category or subcategory.');
                return; // Prevent form submission if the category or subcategory is invalid
            }
    
            // Set the form action dynamically
            document.getElementById('productForm').action = actionUrl;
    
            // Submit the form
            this.submit();
        });
    </script>
</body>
</html>
