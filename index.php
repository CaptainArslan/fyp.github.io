<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css"> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <title>Document</title>
</head>

<body>
    <?php
    include('header.php');
    include('dbcon.php');
    ?>
    <main>
        <div class="bg_slider">
        </div>
        <br>
        <div class="shop">
            <p class="S3"><a href="ProductCatagories.php" class="S31">START YOUR SHOPPING</a></p>
        </div>

        <!-- Icon-->
        <div class="icon-bar">
            <a href="#" class="facebook"><i class="fab fa-facebook"></i></a>
            <a href="#" class="twitter"><i class="fab fa-twitter"></i></a>
            <a href="https://accounts.google.com/ServiceLogin/signinchooser?service=accountsettings&passive=1209600&osid=1&continue=https%3A%2F%2Fmyaccount.google.com%2Fu%2F0%2F%3Futm_source%3DYouTubeWeb%26tab%3Drk%26utm_medium%3Dact%26tab%3Drk%26hl%3Den&followup=https%3A%2F%2Fmyaccount.google.com%2Fu%2F0%2F%3Futm_source%3DYouTubeWeb%26tab%3Drk%26utm_medium%3Dact%26tab%3Drk%26hl%3Den&hl=en&authuser=0&flowName=GlifWebSignIn&flowEntry=ServiceLogin" class="google"><i class="fab fa-google"></i></a>
            <a href="#" class="linkedin"><i class="fab fa-linkedin"></i></a>
            <a href="https://www.youtube.com/channel/UC090E7H7Z5ZxZJ0HtN-asoQ" class="youtube"><i class="fab fa-youtube"></i></a>
        </div>
        <div class="Page1">
            <div class="Page11">
                <h1 class="Page111">We Provide the customers 20+ varieties all over in Pakistan</h1>
                <p class="Page112">For shopping, customers can get easily pruducts from our store,and provide facility to change the products in 2 days.</p>
            </div>

                <div class="container">
                <?php

                $Forcaimg =   mysqli_query($con, "SELECT * FROM `category` LIMIT 3");
                while ($Fimg = mysqli_fetch_array($Forcaimg)) {
                ?>
                <form action="" method="GET">
                    <div class="containerimg">
                        <a href="categories.php?ctgName=<?php echo $Fimg['ctgName']; ?>"><img src="<?php echo $Fimg['ctgImage']; ?>"></a> 
                        <h2 style="position: relative; width: 200px;left: 90px; font-weight: 200;"><?php echo $Fimg['ctgName']; ?></h2>
                    </div>
                </form>
                <?php
                }
                ?>
            </div>

        </div>
        <div class="Page2">
            <div class="Page21">
                <div class="Page211">
                    <div class="Page2111">
                        <i id="Pi1" class="far fa-thumbs-up"></i>
                        <h2 class="Pi2"> 100% Satisfaction </h2><br>
                        <span class="Pi3"> Guarantee </span>
                    </div>
                    <div class="Page2111">
                        <i id="Pi1" class="fas fa-dollar-sign"></i>
                        <h2 class="Pi2"> Cash On Delevery </h2><br>
                        <span class="Pi3"> Pay Cash On Delevery</span>
                    </div>
                    <div class="Page2111">
                        <i id="Pi1" class="fas fa-phone-alt"></i>
                        <h2 class="Pi2"> 24 Hours Daily</h2><br>
                        <span class="Pi3"> Phone Support </span>
                    </div>
                    <div class="Page2111" style="border: none;">
                        <i id="Pi1" class="far fa-envelope"></i>
                        <h2 class="Pi2"> Weekly Coupons</h2><br>
                        <span class="Pi3"> Sent Via Email </span>
                    </div>
                </div>
            </div>
            <div class="ptrdown"></div>
        </div>

        <div class="Page3">
            <div class="Page31">
                <div class="Featured">
                    <h2 style="position: relative; font-weight: 200; font-size: 22px; top: 25px; margin-left: 50px;"><a href="#"> Featured <br>Products</a></h2>
                    <li><a href="#">Baby Products</a></li><br>
                    <li><a href="#"> Baba Products</a></li><br>
                    <li><a href="#"> Pairs Products</a></li><br>
                    <p class="Viewall">View All</p>
                </div>
                <!--Page31  Part1-->
                <div class="Featured1">
                    <?php
                        $ForFeaturedimg = mysqli_query($con, "SELECT * FROM `product` LIMIT 4");
                        foreach ($ForFeaturedimg as $row) {                  
                    ?>
                        
                            <form action="SPD.php?id=<?php echo $row['prdid']; ?>" method="POST">
                                <div class="container1">
                                    <div class="box">
                                    <input type="hidden" name="id" value="<?php echo $row['prdid']; ?>">
                                                    <input type="hidden" name="prdid" value="<?php echo $row['prdid']; ?>">
                                                
                                                    <input type="hidden" name="prdcode" value="<?php echo $row['code']; ?>">
                                                
                                                    <img class="box1" src="<?php echo $row['prdImage']; ?>" alt="Not Found">
                                                
                                                    <h3 class="box2"> <?php echo $row['prdDetails']; ?> </h3>
                                                
                                                    <h2 class="box3"><?php echo $row['prdPrice']; ?></h2>
                                                
                                                    <input type="hidden" name="Quantity" value="1">

                                                    <a href="SPD.php?id = <?php echo $row['prdid']; ?>"><button type="submit" class="box4"  value="<?php echo $row['prdid'] ?>">
                                                        Add to Cart
                                                    </button></a>
                                                    <div class="FeaturePop">
                                                        <a><i class="fas fa-cart-plus"></i></a>
                                                        <button type="button" data-toggle="modal" data-target="#<?php echo $row['prdid']; ?>" class="Boxing"> <i class="far fa-eye"></i></button>
                                                        <a><i class="far fa-heart"></i></a>
                                                    </div>
                                    </div>
                                </div>
                            </form>
                        <?php
                         include('Modal.php');  
                        }
                    ?>
                </div>

                <div class="Featured2">
                    <?php
                    include('dbcon.php');
                    $Feat =   "SELECT * FROM `product` LIMIT 4,4";
                    $newrow = mysqli_query($con,$Feat);
                        foreach ($newrow as $row8){
                    ?>
                    <form action="SPD.php?id = <?php echo $row8['prdid']; ?>" method="POST">
                        <div class="container1">
                            <div class="box0">
                                <input type="hidden" name="prdid" value="<?php echo $row8['prdid']; ?>">
                                <input type="hidden" name="prdcode" value="<?php echo $row8['code']; ?>">
                                <img class="box01" src="<?php echo $row8['prdImage']; ?>" alt="Not Found">
                                <h3 class="box02"><?php echo $row8['prdDetails']; ?> </h3>
                                <h2 class="box03"><?php echo $row8['prdPrice']; ?></h2>
                                <button type="submit" class="box4"  value="<?php echo $row8['prdid'] ?>">
                                            Add to Cart
                                </button>
                                <div class="FeaturePop">
                                    <a><i class="fas fa-cart-plus"></i></a>
                                    <button type="button" class="Boxing" data-toggle="modal" data-target="#<?php echo $row8["prdid"]; ?>"> <i class="far fa-eye"></i></button>
                                    <a><i class="far fa-heart"></i></a>
                                </div>
                            </div>
                        </div>
                    </form>
                    <?php
                        include('Modal.php');
                        }
                    ?>
                </div>
            </div>
        </div>
        <div class="Page4">
            <div class="D">
                <i class="fas fa-tags"></i>
                <h1>20% Off</h1>
            </div>
            <div class="D">
                <i class="fas fa-tags"></i>
                <h1>40% Off</h1>
            </div>
            <div class="D">
                <i class="fas fa-tags"></i>
                <h1>50% Off</h1>
            </div>
        </div>
        <div class="Page5">
            <div class="Page51">
                <div class="Featured">
                    <h2 style="position: relative; font-weight: 200; font-size: 22px; top: 25px; margin-left: 50px;"><a href="#"> Baba Wear <br> Products</a></h2>
                    <!-- <li><a href="#"> Best Selling</a></li><br>
                    <li><a href="#"> New Araival</a></li><br>
                    <li><a href="#"> Men</a></li><br> -->
                    <li><a href="#">Baby Products</a></li><br>
                    <li><a href="#"> Baba Products</a></li><br>
                    <li><a href="#"> Pairs Products</a></li><br>
                    <p class="Viewall">View All</p>
                </div>
                <!--Page51  Part1-->
                <div class="Featured1">
                    <?php
                        $ForFeaturedimg1 = mysqli_query($con, "SELECT * FROM `product` where ctgName = 'Baba Products' LIMIT 4");
                        foreach ($ForFeaturedimg1 as $row2) {                  
                    ?>
                        <input type="hidden" name="id" value="<?php echo $row2['prdid']; ?>">
                            <form action="SPD.php?id = <?php echo $row2['prdid']; ?>" method="POST">
                                <div class="container1">
                                    <div class="box">
                                                    <input type="hidden" name="prdid" value="<?php echo $row2['prdid']; ?>">
                                                
                                                    <input type="hidden" name="prdcode" value="<?php echo $row2['code']; ?>">
                                                
                                                    <img class="box1" src="<?php echo $row2['prdImage']; ?>" alt="Not Found">
                                                
                                                    <h3 class="box2"> <?php echo $row2['prdDetails']; ?> </h3>
                                                
                                                    <h2 class="box3"><?php echo $row2['prdPrice']; ?></h2>
                                                
                                                    <input type="hidden" name="Quantity" value="1">

                                                    <a href="SPD.php?id = <?php echo $row2['prdid']; ?>"><button type="submit" class="box4"  value="<?php echo $row2['prdid'] ?>">
                                                        Add to Cart
                                                    </button></a>
                                                    <div class="FeaturePop">
                                                        <a><i class="fas fa-cart-plus"></i></a>
                                                        <button type="button" data-toggle="modal" data-target="#<?php echo $row2['prdid']; ?>" class="Boxing"> <i class="far fa-eye"></i></button>
                                                        <a><i class="far fa-heart"></i></a>
                                                    </div>
                                    </div>
                                </div>
                            </form>
                        <?php
                         include('Modal.php');  
                        }
                    ?>
                </div>
                <!--Page51  Part2-->
                <div class="Featured2">
                    <?php
                    include('dbcon.php');
                    $Feat =   "SELECT * FROM `product` where ctgName = 'Baba Products' LIMIT 4,4";
                    $ForFeaturedimg2  = mysqli_query($con,$Feat);
                        foreach ($ForFeaturedimg2  as $row3){
                    ?>
                    <form action="SPD.php?id = <?php echo $row3['prdid']; ?>" method="POST">
                        <div class="container1">
                            <div class="box0">
                                <input type="hidden" name="prdid" value="<?php echo $row3['prdid']; ?>">
                                <input type="hidden" name="prdcode" value="<?php echo $row3['code']; ?>">
                                <img class="box01" src="<?php echo $row3['prdImage']; ?>" alt="Not Found">
                                <h3 class="box02"><?php echo $row3['prdDetails']; ?> </h3>
                                <h2 class="box03"><?php echo $row3['prdPrice']; ?></h2>
                                <button type="submit" class="box4"  value="<?php echo $row3['prdid'] ?>">
                                            Add to Cart
                                </button>
                                <div class="FeaturePop">
                                    <a><i class="fas fa-cart-plus"></i></a>
                                    <button type="button" class="Boxing" data-toggle="modal" data-target="#<?php echo $row3["prdid"]; ?>"> <i class="far fa-eye"></i></button>
                                    <a><i class="far fa-heart"></i></a>
                                </div>
                            </div>
                        </div>
                    </form>
                    <?php
                        include('Modal.php');
                        }
                    ?>
                </div>
            </div>
            <!--Page52   -->
            <div class="Page52">

                <div class="Featured">
                    <h2 style="position: relative; font-weight: 200; font-size: 22px; top: 25px; margin-left: 50px;"><a href="#"> Baby Wear <br> Products</a></h2>
                    <li><a href="#">Baby Products</a></li><br>
                    <li><a href="#"> Baba Products</a></li><br>
                    <li><a href="#"> Pairs Products</a></li><br>
                    <p class="Viewall">View All</p>
                </div>
                <!--Page52  Part1-->
                <div class="Featured1">
                    <?php
                        $ForFeaturedimg3 = mysqli_query($con, "SELECT * FROM `product` where ctgName = 'Baby Products' LIMIT 4");
                        foreach ($ForFeaturedimg3 as $row4) {                  
                    ?>
                        <input type="hidden" name="id" value="<?php echo $row4['prdid']; ?>">
                            <form action="SPD.php?id = <?php echo $row4['prdid']; ?>" method="POST">
                                <div class="container1">
                                    <div class="box">
                                                    <input type="hidden" name="prdid" value="<?php echo $row4['prdid']; ?>">
                                                
                                                    <input type="hidden" name="prdcode" value="<?php echo $row4['code']; ?>">
                                                
                                                    <img class="box1" src="<?php echo $row4['prdImage']; ?>" alt="Not Found">
                                                
                                                    <h3 class="box2"> <?php echo $row4['prdDetails']; ?> </h3>
                                                
                                                    <h2 class="box3"><?php echo $row4['prdPrice']; ?></h2>
                                                
                                                    <input type="hidden" name="Quantity" value="1">

                                                    <a href="SPD.php?id = <?php echo $row4['prdid']; ?>"><button type="submit" class="box4"  value="<?php echo $row4['prdid'] ?>">
                                                        Add to Cart
                                                    </button></a>
                                                    <div class="FeaturePop">
                                                        <a><i class="fas fa-cart-plus"></i></a>
                                                        <button type="button" data-toggle="modal" data-target="#<?php echo $row4['prdid']; ?>" class="Boxing"> <i class="far fa-eye"></i></button>
                                                        <a><i class="far fa-heart"></i></a>
                                                    </div>
                                    </div>
                                </div>
                            </form>
                        <?php
                         include('Modal.php');  
                        }
                    ?>
                </div>
                <!--Page52  Part2-->
                <div class="Featured2">
                    <?php
                        $ForFeaturedimg4 = mysqli_query($con, "SELECT * FROM `product` where ctgName = 'Baby Products' LIMIT 4,4");
                        foreach ($ForFeaturedimg4 as $row5) {                  
                    ?>
                        <input type="hidden" name="id" value="<?php echo $row5['prdid']; ?>">
                            <form action="SPD.php?id = <?php echo $row5['prdid']; ?>" method="POST">
                                <div class="container1">
                                    <div class="box0">
                                                    <input type="hidden" name="prdid" value="<?php echo $row5['prdid']; ?>">
                                                
                                                    <input type="hidden" name="prdcode" value="<?php echo $row5['code']; ?>">
                                                
                                                    <img class="box01" src="<?php echo $row5['prdImage']; ?>" alt="Not Found">
                                                
                                                    <h3 class="box02"> <?php echo $row5['prdDetails']; ?> </h3>
                                                
                                                    <h2 class="box03"><?php echo $row5['prdPrice']; ?></h2>
                                                
                                                    <input type="hidden" name="Quantity" value="1">

                                                    <a href="SPD.php?id = <?php echo $row5['prdid']; ?>"><button type="submit" class="box4"  value="<?php echo $row5['prdid'] ?>">
                                                        Add to Cart
                                                    </button></a>
                                                    <div class="FeaturePop">
                                                        <a><i class="fas fa-cart-plus"></i></a>
                                                        <button type="button" data-toggle="modal" data-target="#<?php echo $row5['prdid']; ?>" class="Boxing"> <i class="far fa-eye"></i></button>
                                                        <a><i class="far fa-heart"></i></a>
                                                    </div>
                                    </div>
                                </div>
                            </form>
                        <?php
                         include('Modal.php');  
                        }
                    ?>
                </div>
            </div>
        </div>
        <div class="Page6">
            <div class="Page61">
                <h1 class="P611" style="margin: 0; padding: 0; font-weight: 200;"> Want To Hear From Us? </h1>
                <p style="line-height: 22px; color: black;"> Subscribe to the mailing list to keep up with information about<br>
                    new products, deals and flash sales from "KIDS CORNER".
                </p>
            </div>
            <div class="Page62">
                <div class="P621">
                    <input type="text" placeholder="Username"><br>
                    <input type="text" placeholder="Password"><br>
                    <input type="checkbox" style="width: 12px; height: 12px;">
                    <label style="position: relative; top: -3px; font-size: 13px; color: lightgray;">Keep logged in</label>
                    <p class="BackupP">Forgot Password?</p>
                    <button class="BtnLogin">login</button>
                </div>
            </div>
        </div>
    </main>
    <?php
    include("js.php");
    include("Footer.php");
    ?>
</body>

</html>