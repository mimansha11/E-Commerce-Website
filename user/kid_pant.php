<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Khadi Mart</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="men_design.css">
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
        <h2>Kid's Pant Collection</h2>
        <div class="products">
            <?php include('kid_pdisplay.php'); ?>
        </div>
    </div>

   
</body>
</html>
