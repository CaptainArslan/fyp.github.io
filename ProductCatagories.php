<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSSFiles/ProductCatagories.css">
    <link rel="stylesheet" href="css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Kids Corner Products Categories</title>
</head>

<body>
    <?php
    include('header.php');
    include('dbcon.php');
    ?>
    <div class="Home-path" id="Path">
        <p><a href="index.html">Home</a> / Shop</p>
    </div>
    <div class="Page1">
        <div class="Page11">
            <div class="Page111">
                <div class="Featured">
                    <h2 style="position: relative; font-weight: 200; font-size: 22px; top: 25px; margin-left: 50px;"><a href="#"> Categories</a></h2>
                    <li><a href="#"> Baba Pairs</a></li><br>
                    <li><a href="#"> Baby Pairs</a></li><br>
                    <li><a href="#"> Pairs Products</a></li><br>
                    <li><a href="FeaturedProducts.php"> Featured Products</a></li><br>
                    <!-- <li><a href="#">Seperate</a></li><br> -->
                    <p class="Viewall">View All</p>
                </div>
            </div>
            <!-- <div class="Page112">
                <div class="Page1121">
                    <h3>BY BRANDS</h3>
                    <input type="text"><i class="fas fa-search"></i>
                    <div class="Checkbox1">
                        <input type="checkbox">
                        <p>Kids Corner</p>
                    </div>
                    <div class="Checkbox2">
                        <input type="checkbox">
                        <p>Kids Corner</p>
                    </div>
                </div>
                <div class="Rating">
                    <h3>BY REVIEW</h3>
                    <div class="Checkbox3">
                        <input type="checkbox">
                        <div class="Stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>
                <div class="Page1121">
                    <h3>BY COLOR</h3>
                    <div class="circles">
                        <span style="background-color: black;"></span>
                        <span style="background-color: blue;"></span>
                        <span style="background-color: chocolate;"></span>
                        <span style="background-color: crimson;"></span>
                        <span style="background-color: red;"></span>
                        <span style="background-color: seagreen;"></span>
                    </div>
                </div>
                <div class="Sizes">
                    <h3>BY SIZE</h3>
                    <div class="Checkbox4">
                        <input type="checkbox">
                        <p>XL</p>
                        <input type="checkbox">
                        <p>L</p>
                        <input type="checkbox">
                        <p>M</p>
                        <input type="checkbox">
                        <p>S</p>
                    </div>
                </div>

            </div> -->
        </div>
        <div class="Page12">
            <div class="Page121">
                <p>Product Found</p>
                <div class="container">
                    <ul>
                        <li>Sort Default<i class="fas fa-angle-down" style="position: relative; float: right;  width: 20px; font-size: 22px; left: 25px; top: -2px;"></i>
                            <ul onchange="this.form.submit()" name="select">
                                <li style="border-top: white; border-bottom: white;" value="0">Sort Default</li>
                                <li style="border-top: white; border-bottom: white;" value="1">Sort By Average Rating</li>
                                <li style="border-top: white; border-bottom: white;" value="2">Sort By Price</li>
                                <li style="border-top: white; border-bottom: white;" value="3">Sort by Price:Low to High</li>
                                <li style="border-top: white;" value="4">Sort by Price:High to Low</li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <!--Page122  Part1-->
            <div class="Page122">
                <div class="Featured1">
                    <?php
                    if(isset($_GET['Pagging'])){
                        $page = $_GET['Pagging'];
                    }
                    else{
                        $page = 1;
                    }
                    $Limit =12;
                    $Offset = ($page - 1) * $Limit; 
                    // if(isset($_POST['select'])){
                    //     $Filter = $_POST['select'];             
                      
                    $ForFeaturedimg = mysqli_query($con, "SELECT * FROM `product` LIMIT {$Offset},{$Limit}");

                    foreach ($ForFeaturedimg as $row) {
                    ?>
                        <input type="hidden" name="id" value="<?php echo $row['prdid']; ?>">
                        <form action="SPD.php?id = <?php echo $row['prdid']; ?>" method="POST">
                            <div class="container1">
                                <div class="box">
                                    <input type="hidden" name="prdid" value="<?php echo $row['prdid']; ?>">

                                    <input type="hidden" name="prdcode" value="<?php echo $row['code']; ?>">

                                    <img class="box1" src="<?php echo $row['prdImage']; ?>" alt="Not Found">

                                    <h3 class="box2"> <?php echo $row['prdDetails']; ?> </h3>

                                    <h2 class="box3"><?php echo $row['prdPrice']; ?></h2>

                                    <input type="hidden" name="Quantity" value="1">

                                    <a href="SPD.php?id = <?php echo $row['prdid']; ?>"><button type="submit" class="box4" value="<?php echo $row['prdid'] ?>">
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
                // }
                    }
                    ?>
                </div>
                    <?php

                        $ForFeaturedimg1 = mysqli_query($con, "SELECT * FROM `product`");

                        if (mysqli_num_rows($ForFeaturedimg1)>0) 
                        {
                            $total_records = mysqli_num_rows($ForFeaturedimg1);
                            $Limit = 12;
                            $total_page = ceil($total_records/$Limit);
                            ?>
                            <div class="Page123">
                                <?php
                                if ($page > 1) 
                                {
                                ?>
                                    <a href="ProductCatagories.php?Pagging=<?php echo $page-1; ?>"><span>&#8592 </span></a>
                                <?php
                                }                                
                                for($i = 1; $i<=$total_page; $i++)
                                {
                                        echo'<a href="ProductCatagories.php?Pagging='.$i.'" class="active">'.$i.'</a>';
                                }
                                if ($page < $total_page) 
                                {
                                ?>
                                    <a href="ProductCatagories.php?Pagging=<?php echo $page+1; ?>"><span>&#8594 </span></a>
                                <?php
                                }
                                ?>
                            </div>
                            <?php
                        }
                    ?>
               
            </div>
        </div>
    </div>
    <br>
    <?php
    include('Footer.php');
    include('js.php');
    ?>

</body>

</html>