<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSSFiles/categories.css">
    <title>Document</title>
</head>

<body>
    <?php
    include('dbcon.php');
    include('header.php');
    ?>
    <div class="Featured1">
        <?php
        $ctgName = $_GET['ctgName'];
        $ForFeaturedimg = mysqli_query($con, "SELECT * FROM `product` WHERE ctgName = '$ctgName'");
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
        }
        ?>
    </div>
    <div style="position: relative;">

   
    <?php
    include('Footer.php');    
    ?>
     </div>
</body>

</html>