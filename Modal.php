<?php
// session_destroy();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSSFiles/Modal.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
    <title>Document</title>
</head>

<body>
    <?php
    include("dbcon.php");
    if (isset($_POST['code']) && $_POST['code'] != "") {
        $code = $_POST['code'];
        $id = $_POST['prdid'];
        $result = mysqli_query($con, "SELECT * FROM `product` WHERE `code`='$code'");
        $row = mysqli_fetch_assoc($result);
        $Id = $row['prdid'];
        $name = $row['prdName'];
        $code = $row['code'];
        $price = $row['prdPrice'];
        $image = $row['prdImage'];
        $Size = $row['prdSize'];
        $prdQuantity = $row['prdQuantity'];

        $cartArray = array(
            $code => array(
                'prdid' => $Id,
                'prdName' => $name,
                'code' => $code,
                'prdPrice' => $price,
                'prdSize' => $Size,
                'prdQuantity' => $prdQuantity,
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

    <form action="" method="POST">
        <input name="prdid" type="hidden" value="<?php echo $row['prdid']; ?>">
        <input name="code" type="hidden" value="<?php echo $row['code']; ?>">
        <input name="hidden_Name" type="hidden" value="<?php echo $row['prdName']; ?>">
        <input name="hidden_Price" type="hidden" value="<?php echo $row['prdPrice']; ?>">
        <input name="hidden_Size" type="hidden" value="<?php echo $row['prdSize']; ?>">
        <input name="hidden_Image" type="hidden" value="<?php echo $row['prdImage']; ?>">
        <div class="ModalC modal" id="<?php echo $row['prdid']; ?>" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-body">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <div class="col">
                        <img class="box1" src="<?php echo $row['prdImage']; ?>">
                        <p class="pname"><?php echo $row['prdName']; ?></p>
                    </div>
                    <div class="col1" style="font-size:large;">
                        Details:<p class="details"><?php echo $row['prdDetails']; ?></p>

                        Price:<h4 style="color: lightslategray;"><?php echo $row['prdPrice']; ?></h4>

                        <button type="submit" name="Add_To_Cart" id="mySubmit" class="btn" onclick='myFunction()'>
                            Add to Cart
                        </button>
                        <hr style="height:1px;border-width:0;background-color:#ffb374; margin-top: 20px; margin-bottom: 10px;">
                        <label for="size" style="font-size: large; margin-top: 10px;">Category</label>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <form action="" method="POST">
        <input name="hidden_id" type="hidden" value="<?php echo $row8['prdid']; ?>">
        <input name="code" type="hidden" value="<?php echo $row8['code']; ?>">
        <input name="hidden_Name" type="hidden" value="<?php echo $row8['prdName']; ?>">
        <input name="hidden_Price" type="hidden" value="<?php echo $row8['prdPrice']; ?>">
        <input name="hidden_Size" type="hidden" value="<?php echo $row8['prdSize']; ?>">
        <input name="hidden_Image" type="hidden" value="<?php echo $row8['prdImage']; ?>">
        <div class="ModalC modal" id="<?php echo $row8['prdid']; ?>" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-body">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <div class="col">
                        <img class="box1" src="<?php echo $row8['prdImage']; ?>">
                        <p class="pname"><?php echo $row8['prdName']; ?></p>
                    </div>
                    <div class="col1" style="font-size:large;">
                        Details:<p style="color: lightslategray;"><?php echo $row8['prdDetails']; ?></p>

                        Price:<h4 style="color: lightslategray;"><?php echo $row8['prdPrice']; ?></h4>

                        <button type="submit" name="Add_To_Cart" id="mySubmit" class="btn" onclick='myFunction()'>
                            Add to Cart
                        </button>
                        <hr style="height:1px;border-width:0;background-color:#ffb374; margin-top: 20px; margin-bottom: 10px;">
                        <label for="size" style="font-size: large; margin-top: 10px;">Category</label>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <form action="" method="POST">
        <input name="hidden_id" type="hidden" value="<?php echo $row2['prdid']; ?>">
        <input name="code" type="hidden" value="<?php echo $row2['code']; ?>">
        <input name="hidden_Name" type="hidden" value="<?php echo $row2['prdName']; ?>">
        <input name="hidden_Price" type="hidden" value="<?php echo $row2['prdPrice']; ?>">
        <input name="hidden_Size" type="hidden" value="<?php echo $row2['prdSize']; ?>">
        <input name="hidden_Image" type="hidden" value="<?php echo $row2['prdImage']; ?>">
        <div class="ModalC modal" id="<?php echo $row2['prdid']; ?>" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-body">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <div class="col">
                        <img class="box1" src="<?php echo $row2['prdImage']; ?>">
                        <p class="pname"><?php echo $row2['prdName']; ?></p>
                    </div>
                    <div class="col1" style="font-size:large;">
                        Details:<p style="color: lightslategray;"><?php echo $row2['prdDetails']; ?></p>

                        Price:<h4 style="color: lightslategray;"><?php echo $row2['prdPrice']; ?></h4>

                        <button type="submit" name="Add_To_Cart" id="mySubmit" class="btn" onclick='myFunction()'>
                            Add to Cart
                        </button>
                        <hr style="height:1px;border-width:0;background-color:#ffb374; margin-top: 20px; margin-bottom: 10px;">
                        <label for="size" style="font-size: large; margin-top: 10px;">Category</label>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <form action="" method="POST">
        <input name="hidden_id" type="hidden" value="<?php echo $row3['prdid']; ?>">
        <input name="code" type="hidden" value="<?php echo $row3['code']; ?>">
        <input name="hidden_Name" type="hidden" value="<?php echo $row3['prdName']; ?>">
        <input name="hidden_Price" type="hidden" value="<?php echo $row3['prdPrice']; ?>">
        <input name="hidden_Size" type="hidden" value="<?php echo $row3['prdSize']; ?>">
        <input name="hidden_Image" type="hidden" value="<?php echo $row3['prdImage']; ?>">
        <div class="ModalC modal" id="<?php echo $row3['prdid']; ?>" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-body">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <div class="col">
                        <img class="box1" src="<?php echo $row3['prdImage']; ?>">
                        <p class="pname"><?php echo $row3['prdName']; ?></p>
                    </div>
                    <div class="col1" style="font-size:large;">
                        Details:<p style="color: lightslategray;"><?php echo $row3['prdDetails']; ?></p>

                        Price:<h4 style="color: lightslategray;"><?php echo $row3['prdPrice']; ?></h4>

                        <button type="submit" name="Add_To_Cart" id="mySubmit" class="btn" onclick='myFunction()'>
                            Add to Cart
                        </button>
                        <hr style="height:1px;border-width:0;background-color:#ffb374; margin-top: 20px; margin-bottom: 10px;">
                        <label for="size" style="font-size: large; margin-top: 10px;">Category</label>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <form action="" method="POST">
        <input name="hidden_id" type="hidden" value="<?php echo $row4['prdid']; ?>">
        <input name="code" type="hidden" value="<?php echo $row4['code']; ?>">
        <input name="hidden_Name" type="hidden" value="<?php echo $row4['prdName']; ?>">
        <input name="hidden_Price" type="hidden" value="<?php echo $row4['prdPrice']; ?>">
        <input name="hidden_Size" type="hidden" value="<?php echo $row4['prdSize']; ?>">
        <input name="hidden_Image" type="hidden" value="<?php echo $row4['prdImage']; ?>">
        <div class="ModalC modal" id="<?php echo $row4['prdid']; ?>" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-body">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <div class="col">
                        <img class="box1" src="<?php echo $row4['prdImage']; ?>">
                        <p class="pname"><?php echo $row4['prdName']; ?></p>
                    </div>
                    <div class="col1" style="font-size:large;">
                        Details:<p style="color: lightslategray;"><?php echo $row4['prdDetails']; ?></p>

                        Price:<h4 style="color: lightslategray;"><?php echo $row4['prdPrice']; ?></h4>

                        <button type="submit" name="Add_To_Cart" id="mySubmit" class="btn" onclick='myFunction()'>
                            Add to Cart
                        </button>
                        <hr style="height:1px;border-width:0;background-color:#ffb374; margin-top: 20px; margin-bottom: 10px;">
                        <label for="size" style="font-size: large; margin-top: 10px;">Category</label>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <form action="" method="POST">
        <input name="hidden_id" type="hidden" value="<?php echo $set2['prdid']; ?>">
        <input name="code" type="hidden" value="<?php echo $row5['code']; ?>">
        <input name="hidden_Name" type="hidden" value="<?php echo $row5['prdName']; ?>">
        <input name="hidden_Price" type="hidden" value="<?php echo $row5['prdPrice']; ?>">
        <input name="hidden_Size" type="hidden" value="<?php echo $row5['prdSize']; ?>">
        <input name="hidden_Image" type="hidden" value="<?php echo $row5['prdImage']; ?>">
        <div class="ModalC modal" id="<?php echo $row5['prdid']; ?>" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-body">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <div class="col">
                        <img class="box1" src="<?php echo $row5['prdImage']; ?>">
                        <p class="pname"><?php echo $row5['prdName']; ?></p>
                    </div>
                    <div class="col1" style="font-size:large;">
                        Details:<p style="color: lightslategray;"><?php echo $row5['prdDetails']; ?></p>

                        Price:<h4 style="color: lightslategray;"><?php echo $row5['prdPrice']; ?></h4>

                        <button type="submit" name="Add_To_Cart" id="mySubmit" class="btn" onclick='myFunction()'>
                            Add to Cart
                        </button>
                        <hr style="height:1px;border-width:0;background-color:#ffb374; margin-top: 20px; margin-bottom: 10px;">
                        <label for="size" style="font-size: large; margin-top: 10px;">Category</label>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <form action="" method="POST">
        <input name="hidden_id" type="hidden" value="<?php echo $set2['prdid']; ?>">
        <input name="code" type="hidden" value="<?php echo $set2['code']; ?>">
        <input name="hidden_Name" type="hidden" value="<?php echo $set2['prdName']; ?>">
        <input name="hidden_Price" type="hidden" value="<?php echo $set2['prdPrice']; ?>">
        <input name="hidden_Size" type="hidden" value="<?php echo $set2['prdSize']; ?>">
        <input name="hidden_Image" type="hidden" value="<?php echo $set2['prdImage']; ?>">
        <div class="ModalC modal" id="<?php echo $set2['code']; ?>" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-body">
                    <?php
                        $ForFeaturedQuery = mysqli_query($con,"SELECT * from `product` where code = '".$set2['code']."'");
                        $Fquery = mysqli_fetch_array($ForFeaturedQuery);
                    ?>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <div class="col">
                        <img class="box1" src="<?php echo $Fquery['prdImage']; ?>">
                        <p class="pname"><?php echo $set2['prdName']; ?></p>
                    </div>
                    <div class="col1" style="font-size:large;">
                        Details:<p style="color: lightslategray;"><?php echo $Fquery['prdDetails']; ?></p>

                        Price:<h4 style="color: lightslategray;"><?php echo $set2['prdPrice']; ?></h4>

                        <button type="submit" name="Add_To_Cart" id="mySubmit" class="btn" onclick='myFunction()'>
                            Add to Cart
                        </button>
                        <hr style="height:1px;border-width:0;background-color:#ffb374; margin-top: 20px; margin-bottom: 10px;">
                        <label for="size" style="font-size: large; margin-top: 10px;">Category</label>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>
</html>