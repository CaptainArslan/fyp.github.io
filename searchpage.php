<link rel="stylesheet" href="index.css">
<?php
    include_once("header.php");
     include_once("js.php");
    include("dbcon.php");
if(isset($_POST['Submit']))
{
    $search =mysqli_real_escape_string($con, $_POST['type']);
    $sqlSeach = "SELECT * FROM `product` WHERE prdName LIKE '%$search%' or prdDetails  LIKE '%$search%'"; 
    $resultSearch = mysqli_query($con,$sqlSeach);
    
    if( $row = mysqli_num_rows($resultSearch)>0)
   {
       while($row = mysqli_fetch_assoc($resultSearch))
       {
        //    echo $row['prdName'];
           echo"<br/>";
           ?>

            <form action="" method="POST">
                <div class="container1">
                    <div class="box0">
                        <img class="box01" src="<?php echo $row['prdImage']; ?>" alt="Not Found">
                        <h3 class="box02"><?php echo $row['prdDetails']; ?> </h3>
                        <h2 class="box03"><?php echo $row['prdPrice']; ?></h2>
                        <button type="button" class="btn btn-info btn-lg box4" data-toggle="modal" data-target="#<?php echo $row8["prdid"]; ?>">Quick View</button>
                        <div class="FeaturePop">
                            <a><i class="fas fa-cart-plus"></i></a>
                            <button type="button" class="btn btn-info btn-lg Boxing" data-toggle="modal" data-target="#<?php echo $row8["prdid"]; ?>" onclick="OpenModal()"> <i class="far fa-eye"></i></button>
                            <a><i class="far fa-heart"></i></a>
                        </div>
                    </div>
                </div>
            </form>
<?php
       }
   }else{
       echo"Sorry something went wrong";
   }
}
    include_once("Footer.php");
?>