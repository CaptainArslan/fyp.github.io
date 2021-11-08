<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSSFiles/checkout.css">
    <title>Document</title>
</head>

<body>
    <?php
    include('header.php');
    include('dbcon.php');

    ?>
    <form action="PlaceOrder.php" method="POST" enctype="multipart/form-data">
        <div class="main">
            <h2 class="head">Checkout Form</h2>
            <div class="boxe">
                <h3>Billing Address</h3>
                <label for="" class="lblfname">First Name</label>
                <br>
                <input required type="text" name="Name" class="fname">
                <br> <br>
                <label for="" class="lblemail">Email</label>
                <br>
                <input required type="text" name="Email" class="email">
                <br> <br>
                <label for="" class="lbladd">Address</label>
                <br>
                <input required type="text" name="Address" class="address">
                <br> <br>
                <label for="" class="Phone">Phone no</label>
                <br>
                <input required type="text" name="Phone" class="address">
                <br> <br>
                <label for="" class="lblcty">City</label>
                <br>
                <input required type="text" name="City" class="city">
                <br> <br>
                <label for="" class="lblst">State</label>
                <br>
                <input required type="text" name="State" class="state">
                <br>
                <label for="" class="lblzip">Zip</label>
                <br>
                <input required type="text" name="Zip" class="zip">
                Payment:
                                <h3>Cash On Dilivery</h3>
            </div>

    
            <div class="rightside">
                <?php
                    if (!empty($_SESSION["Shop"])) 
                    {
                        $total_quantity = 0;
                        $total_price = 0;
                        ?>
                        <h3>Order Details</h3>
                            <br><br>
                        <div class="boxes">
                            <div class="lblemail">
                                <text>Carts</text>
                                <text style="margin-left: 150px;">Size</text>
                                <text>Price</text> 
                            </div>
                        <?php
                        foreach($_SESSION["Shop"] as $product) 
                        {
                ?> 
                            <div class="boxes1">
                                <div>
                                    <input type="hidden" name="code" value="<?php echo  $product["code"]; ?>">
                                    <img style="position: relative;top: 20px;" src='<?php echo  $product["prdImage"]; ?>' width="50" height="40" />
                                    <text style="position: relative; top: -2px"><?php echo  $product["prdName"]; ?></text>
                                </div>
                                <div class="price">
                                    <text style="margin-right: 50px;">
                                        <?php echo $product["prdSize"]; ?>
                                    </text>
                                    <?php echo "$" .  $product["prdPrice"]; ?>
                                </div>
                            </div>
                            
                            <?php  
                            $total_quantity += $product["prdQuantity"];
                            $total_price += ($product["prdPrice"] *  $product["prdQuantity"]);   
                        }
                        ?>
                        <div class="r3">
                                        <text>QUANTITY: <?php echo $total_quantity; ?></text>
                                        <text>TOTAL: <?php echo "$" . $total_price; ?></text>
                        </div>
                        <?php
                    }
                ?>
                        </div>               
                    
            </div>
            <div class="btnwsub">
                <button class="okyy" name="placeOrder" type="submit">Place Order</button>
            </div>
        </div>
    </form>
    <div style="margin-top: 100px;">
        <?php
        include('Footer.php');
        include('js.php');

        ?>
    </div>
</body>

</html>