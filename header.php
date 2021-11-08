<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="CSSFiles/Header-Footer.Css">
    <link rel="stylesheet" href="css/all.min.css">
    <title>Kids Corner</title>
</head>

<body>
    <header>
        <div class="contact" id="head">
            <p class="c1">Welcome to Kids Corner Online Shopping Store !</p>
            <p class="c2">
                <i class="fas fa-sign-in-alt" style="color:#234085; font-size: 16px;"></i>
                <a href="Login.php">login</a>
                <i class="fas fa-sign-out-alt" style="color:#234085; font-size: 16px;"></i>
                <a href="Logout.php">Logout</a>
                <i class="fas fa-phone" style="font-size: 16px; color: #234085; margin-left: 5px;"></i>
                <a href="#">0304-7067306</a>
                <i class="fas fa-envelope" style="font-size: 19px; color: #234085; margin-left: 5px;"></i>
                <a href="#">bcsf17r02@gmail.com</a>
            </p>
        </div>
    </header>

    <!--LOGO & Navigation and search-->
    <div id="nav" class="mynav">
            <div class="logo">
                <img src="photos/A.png" class="Brand" alt="Not Found">
            </div>
            <div class="logodiv">
                    <text class="LogoN">Kids Corner</text>
                    <text class="Details">Passion For Fashion</text>
            </div>
            <div class="navdiv">
                    <a href="index.php">Home</a>
                    <a href="ProductCatagories.php">Shop</a>
                    <a href="AboutUs.php">About Us</a>
                    <a href="Contact.php">Contact</a>
            </div>
            <div class="wish">
                <a href="Add-to-cart.php" class="b3">
                    <i class="fas fa-cart-plus" style="color: #bb7942; font-size: 20px; margin-left: 40px;"></i>
                    <span> Cart
                        <?php
                            if (!empty($_SESSION["Shop"])) {
                                $cart = count(array_keys($_SESSION["Shop"]));
                            ?>
                                    <text class="cart_div" id="Cart_Icon"><?php echo $cart; ?></text>
                            <?php
                            } 
                        ?>
                    </span>
                </a>
                <a href="#" class="b4">
                    <i class="far fa-heart" style="color:#bb7942; font-size: 20px; margin-left: 30px;"></i>
                    <a href="Wishlist.php"><span style="margin-left: 9.5px;">Wishlist</span></a>
                </a>
                <a class="SearchBtn" onclick="openSearch()">
                    <i class="fas fa-search" style="color: #bb7942; font-size: 20px; margin-left: 21px;"></i>
                    <span style="margin-left: 10.5px;">Search</span>
                </a>
                <form action="searchpage.php" method="POST">
                    <div id="myPopup" class="Popup">
                        <p class="closebtn" onclick="closeSearch()" title="Close"><i class="fas fa-times"></i></p>
                        <div class="Popup-content">
                            <input type="text" name="type" placeholder="Search">
                            <button type="submit" name="Submit" value="search_Submit"><i class="fa fa-search"></i></button>          
                        </div>
                    </div>
                </form>
            </div>

        </div>
    <button onclick="topFunction()" id="button" title="Go to top">
        <i class="fas fa-chevron-up" style="font-size: 16px; margin-top: 5px;"></i>
    </button>