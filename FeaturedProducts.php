<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cssFiles/FeaturedProducts.css" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>

<body>
    <div>
    <?php
    include('header.php');
    include('dbcon.php');
    ?>
        <h1 align= "center"><i class="fas fa-fire" style="padding: 10px;"></i>Hot Products</h1>
        <table class="customers">
            <tr>
                <th>Name</th>
                <th>Size</th>
                <th>Price</th>
                <th>Image</th>
            </tr>
            <?php
           
            $query = mysqli_query($con, "SELECT prdQuantity FROM `user_order` order by prdQuantity DESC");
            while ($set = mysqli_fetch_array($query)) {            
                $forSizeq  = mysqli_query($con, "SELECT * FROM `product_size`");
                foreach ($forSizeq as $FS) {
                }
                $set1 = mysqli_query($con,"SELECT * from `user_order` where prdQuantity = '" .$set['prdQuantity'] ."'");
                while($set2 = mysqli_fetch_array($set1)){
                    $ForImage = mysqli_query($con,"SELECT * FROM `product` WHERE code= '" .$set2['code'] ."' ");
                    $Image = mysqli_fetch_array($ForImage);
            ?>
                <tr class="Data">
                    <td style="cursor: pointer;" data-toggle="modal" data-target="#<?php echo $set2['code'];?>"><?php echo $set2['prdName']; ?></td>
                    <td><?php echo $set2['prdSize']; ?></td>
                    <td><?php echo $set2['prdPrice']; ?></td>
                    <td><img class="zoom" src=" <?php echo $Image['prdImage']; ?>"></td>
                </tr>

            <?php
             include('Modal.php');  
            }
            }

            ?>
        </table>
    </div>
    <div style="margin-top: 100px;">
    <?php
        include("js.php");
        include('Footer.php');
    ?>
    </div>
</body>

</html>