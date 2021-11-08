<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSSFiles/SPD.css" type="text/css">
    <link rel="stylesheet" href="css/all.min.css">
    <title>Product</title>
    <script>
        function myFunction() {
            // Get the snackbar DIV
            var x = document.getElementById("snackbar");

            // Add the "show" class to DIV
            x.className = "show";

            // After 3 seconds, remove the show class from DIV
            setTimeout(function() {
                x.className = x.className.replace("show", "");
            }, 3000);
        }
    </script>
</head>

<body>
    <?php
    include("header.php");
    include('dbcon.php');

    if (isset($_POST['prdcode']) && $_POST['prdcode'] != "") {
        $code = $_POST['prdcode'];
        $id = $_POST['prdid'];
        $result = mysqli_query($con, "SELECT * FROM `product` WHERE `code`='$code'");
        $row = mysqli_fetch_assoc($result);
        $Id = $row['prdid'];
        $name = $row['prdName'];
        $code = $row['code'];
        $price = $row['prdPrice'];
        $image = $row['prdImage'];
        $Size = $row['prdSize'];

        $cartArray = array(
            $code => array(
                'prdid' => $Id,
                'prdName' => $name,
                'code' => $code,
                'prdPrice' => $price,
                'prdSize' => $Size,
                'prdQuantity' => 1,
                'prdImage' => $image
            )
        );

        if (empty($_SESSION["Shop"])) {
            $_SESSION["Shop"] = $cartArray;
            echo '
                    <script>
                        alert("Item Added in Cart");
                        window.location.href= "http://localhost/FYP/Add-to-cart.php";
                    </script>';
        } else {
            $array_keys = array_keys($_SESSION["Shop"]);
            if (in_array($code, $array_keys)) {
                echo '
                    <script>
                        alert("Item Already Added in Cart");
                        window.location.href= "http://localhost/FYP/Add-to-cart.php";
                    </script>';
            } else {
                $_SESSION["Shop"] = array_merge($_SESSION["Shop"], $cartArray);

                echo '
                    <script>
                        alert("Item Added in Cart");
                        window.location.href= "http://localhost/FYP/Add-to-cart.php";
                    </script>';
            }
        }
    }
    ?>

    <div class="Home-path">
        <p><a href="index.html">Home</a> / Product Details</p>
    </div>
    <!-------Single Product Details------->
    <?php
    $gid = $_POST['prdid'];
    $result1 = mysqli_query($con, "SELECT * FROM `product` where prdid = '$gid'");
    while ($row6 = mysqli_fetch_assoc($result1)) {
    ?>
    <form method='POST' action=''>
        <div class='Page1'>
                <input type='hidden' name='prdcode' value="<?php $row6['code'] ?>" />
                <input type='hidden' name='prdid' value="<?php $row6['prdid'] ?>" />
                <div class='SPD1'>
                    <img class='MainP' src="<?php echo $row6['prdImage'] ?>" />
                    <div class='SPD11'>
                        <img src="<?php echo $row6['prdImage'] ?>" alt='Not Found'>
                        <img src="<?php echo $row6['prdImage'] ?>" alt='Not Found'>
                        <img src="<?php echo $row6['prdImage'] ?>" alt='Not Found'>
                        <img src="<?php echo $row6['prdImage'] ?>" alt='Not Found'>
                    </div>
                </div>
                <div class='SPD2'>
                    <h1><?php echo $row6['prdName'] ?></h1>
                    <h3>$ <?php echo $row6['prdPrice'] ?></h3>
                    <label for='Quantity'>
                        <h2 style='font-weight: 300; width: 60px; margin-top: 80px;'>Quantity:</h2>
                    </label>
                    <input name='prdQuantity' type='number' value='1'>
                    <button name='Submit' type='submit' class='Submit'>Add to Cart</button>
                    <h3 class='PD'>Product Details</h3>
                    <br>
                    <p>
                        <?php echo $row6['prdDetails'] ?>
                    </p>
                </div>
            </div>
        </form>
    <?php
    }
    ?>



    <div class="Page2">
        <!-----Page211----->
        <div class="Page21">
            <img src="Photos/BabyShirt.jpg">
            <h4>Red Printed T-Shirt</h4>
            <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o"></i>
            </div>
            <p>$50.00</p>
        </div>
        <!------shoes----->
        <div class="Page21">
            <img src="Photos/BabyShirt.jpg">
            <h4>Red Printed T-Shirt</h4>
            <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-half"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
            </div>
            <p>$50.00</p>
        </div>
        <!------trouser----->
        <div class="Page21">
            <img src="Photos/BabyShirt.jpg">
            <h4>Red Printed T-Shirt</h4>
            <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-half-empty"></i>
                <i class="fa fa-star-o"></i>
            </div>
            <p>$50.00</p>
        </div>
        <!------Blue Shirts----->
        <div class="Page21">
            <img src="Photos/BabyShirt.jpg">
            <h4>Red Printed T-Shirt</h4>
            <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
            </div>
            <p>$50.00</p>
        </div>
    </div>


    <div style="margin-top: 50px;">
        <?php
        include('Footer.php');
        include('js.php');
        ?>
    </div>

</body>

</html>