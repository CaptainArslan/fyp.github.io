<!DOCTYPE html>
<html lang="en">

<head>
<style>
.box {
                    position: relative;
                    background: #f4f5f3;
                    width: 250.45px;
                    height: 370px;
                    border-bottom: 0.6px solid rgb(192, 192, 192);
                    border-left: 0.6px solid rgb(192, 192, 192);
                    border-right: hidden;
                    border-top: hidden;

                }
                .box1 {
                    position: relative; 
                    cursor: pointer; 
                    width:200px; 
                    height:170px; 
                    margin-left: 25px; 
                    margin-top: 15px;
                    transition: 1s;
                }
                .box1:hover {
                    cursor: pointer;
                    transform:translateY(-10px)
                }
                .box2 {
                    position: relative;
                    font-size: 14px;
                    font-weight: 200; 
                    margin-left: 25px; 
                    margin-top: 1px;
                    line-height: 20px; 
                    width: 200px; 
                    color: #0069df;   
                }
                .box2:hover {
                    color: #bb7942;
                    cursor: pointer;
                }
                .box3 {
                    font-size: 17px; 
                    font-weight: 200; 
                    margin-left: 25px; 
                    margin-top: -3px; 
                    line-height: 10px; 
                }
                .box4 {
                    position: relative;
                    width: 130px;
                    height: 50px;
                    background:  #cd772f;
                    left: 25px;
                    top: 5px;
                    font-size: 14px;
                    font-weight: bolder;
                    border: hidden;
                    font-family: Verdana, Geneva, Tahoma, sans-serif;
                }
                .box4:hover {
                    background-color: #f07f23;
                    color: black;
                    cursor: pointer;
                }
</style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="Featured1">
        <?php
        include('dbcon.php');
        $ForFeaturedimg = mysqli_query($con, "SELECT * FROM `product` LIMIT 8");
        $i = 0;
        foreach ($ForFeaturedimg as $row) {
            if ($i%4 == 0) {
        echo "
        
                <form action='SPD.php?id= '". $row['prdid'] ."' method='POST'>
                    <div class='container1'>
                        <div class='box'>
                            <input type='hidden' name='id' value='". $row['prdid']."'>
                            <input type='hidden' name='prdid' value='". $row['prdid'] ."'>

                            <input type='hidden' name='prdcode' value='". $row['code'] ."'>

                            <img class='box1' src='  '".  $row['prdImage'] ."' alt='Not Found'>

                            <h3 class='box2'>   '". $row['prdDetails'] ."' </h3>

                            <h2 class='box3'>  '" . $row['prdPrice'] ."'</h2>

                            <input type='hidden' name='Quantity' value='1'>

                            <a href='SPD.php?id =". $row['prdid'] ."'><button type='submit' class='box4' value='".$row['prdid'] ."'>
                                    Add to Cart
                                </button></a>
                            <div class='FeaturePop'>
                                <a><i class='fas fa-cart-plus'></i></a>
                                <button type='button' data-toggle='modal' data-target='# '". $row['prdid'] ."' class='Boxing'> <i class='far fa-eye'></i></button>
                                <a><i class='far fa-heart'></i></a>
                            </div>
                        </div>
                    </div>
                </form>
            
            ";
            } 
            else {
                echo"
        
                <form action='SPD.php?id= ".$row['prdid'] ."' method='POST'>
                    <div class='container1'>
                        <div class='box'>
                            <input type='hidden' name='id' value='".$row['prdid']."'>
                            <input type='hidden' name='prdid' value='". $row['prdid'] ."'>

                            <input type='hidden' name='prdcode' value='".$row['code']."'>

                            <img class='box1' src='".$row['prdImage']."' alt='Not Found'>

                            <h3 class='box2'>   '".$row['prdDetails'] ."' </h3>

                            <h2 class='box3'> '". $row['prdPrice'] ."'</h2>

                            <input type='hidden' name='Quantity' value='1'>

                            <a href='SPD.php?id =   ".$row['prdid']." '><button type='submit' class='box4' value=' ".$row['prdid'] ."'>
                                    Add to Cart
                                </button></a>
                            <div class='FeaturePop'>
                                <a><i class='fas fa-cart-plus'></i></a>
                                <button type='button' data-toggle='modal' data-target='# '".$row['prdid']." ' class='Boxing'> <i class='far fa-eye'></i></button>
                                <a><i class='far fa-heart'></i></a>
                            </div>
                        </div>
                    </div>
                </form>

       ";
            }
            include('Modal.php');
        }
        ?>
    </div>
</body>

</html>