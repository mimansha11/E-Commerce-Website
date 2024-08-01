<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Khadi Mart</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="new.css">
</head>
<body>
    <section id="header">
        <div id="name">
            <h1 class="logo">Khadi<span>Mart.</span></h1>
        </div>
        <div>
            <ul id="navbar-left">
                <li class="dropdown">
                    <a href="#">Men <i class="fa-solid fa-caret-down"></i></a>
                    <div class="dropdown-content">
                        <a href="user/men_pant.php">Pant</a>
                        <a href="user/men_kurta.php">Kurta</a>
                        <a href="user/men_shirt.php">Shirt</a>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="#">Women <i class="fa-solid fa-caret-down"></i></a>
                    <div class="dropdown-content">
                        <a href="user/women_saree.php">Saree</a>
                        <a href="user/women_dupatta.php">Dupatta</a>
                        <a href="user/women_kurti.php">Kurti</a>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="#">Kids <i class="fa-solid fa-caret-down"></i></a>
                    <div class="dropdown-content">
                        <a href="user/kid_frock.php">Frock</a>
                        <a href="user/kid_shirt.php">Shirt</a>
                        <a href="user/kid_pant.php">Pant</a>
                    </div>
                </li>
            </ul>
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
        echo '<a href="admin/logout.php"><i class="fas fa-user"></i><span>Logout</span></a>';
        // Display user profile sign with text "user"
        echo '<div class="user-profile-sign"><i class="fas fa-user"></i>user</div>';
        echo '</li>';
    } else {
        // If not logged in, display the login/signup button
        echo '<li><a href="log.php"><i class="far fa-sign-in"></i><span>Login/Sign up</span></a></li>';
    }
    ?>
        </div>
        <div>
            <ul id="navbar-right">
                <li><a href="index.php">Home</a></li>
                <li><a href="user/wish_item_dis.php"><i class="fa-regular fa-heart"></i></a></li>
                <li><a href="user/cart_item_dis.php"><i class="fa-sharp fa-solid fa-cart-shopping"></i></a></li>
            </ul>
        </div>
    </section>
    <!-- Slideshow container -->
    <div class="slideshow-container">

    <!-- Full-width images with number and caption text -->
    <div class="mySlides fade">
    <div class="numbertext"></div>
      <img src="img/khadi4.png" style="width:100%">
    </div>

    <div class="mySlides fade">
    <div class="numbertext"></div>
      <img src="img/khadi1.png" style="width:100%">
    </div>

    <div class="mySlides fade">
    <div class="numbertext"></div>
    <img src="img/khadi5.png" style="width:100%">
    </div>

    <!-- Next and previous buttons 
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>
    <br>
    
    The dots/circles
    <div style="text-align:center">
    <span class="dot" onclick="currentSlide(1)"></span>
    <span class="dot" onclick="currentSlide(2)"></span>
    <span class="dot" onclick="currentSlide(3)"></span>
    </div>-->

    <script>
        let slideIndex = 0;
        showSlides();

        function showSlides() {
            let i;
            let slides = document.getElementsByClassName("mySlides");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > slides.length) {slideIndex = 1}
            slides[slideIndex-1].style.display = "block";
            setTimeout(showSlides, 2500); 
            }
    </script>
</body>
</html>