<?php
session_start();
include('dbcon.php');

if (isset($_POST['placeOrder'])) {
    date_default_timezone_get();
    date_default_timezone_set("Asia/Karachi");
    $date = date("Y/m/d");
    $time = date("h:i:s A");
    // $DATETIME = $date .'<br /><br />'.$time;
    $Name = mysqli_real_escape_string($con, $_POST['Name']);
    $Email = mysqli_real_escape_string($con, $_POST['Email']);
    $Address = mysqli_real_escape_string($con, $_POST['Address']);
    $Phone = mysqli_real_escape_string($con, $_POST['Phone']);
    $City = mysqli_real_escape_string($con, $_POST['City']);
    $State = mysqli_real_escape_string($con, $_POST['State']);
    $Zip = mysqli_real_escape_string($con, $_POST['Zip']);

    $insertquery = "INSERT INTO `order_manager`(`DATE`,`TIME`,`Name`, `Email`, `Address`,`Phone`, `City`, `State`, `Zip`) 
        VALUES ('$date','$time','$Name','$Email','$Address','$Phone','$City','$State','$Zip')";
    if($iquery =  mysqli_query($con, $insertquery)){

        $Order_id = mysqli_insert_id($con);
        $query2  = "INSERT INTO `user_order`(`Order_id`,`code`,`prdName`,`prdSize`,`prdPrice`, `prdQuantity`) VALUES (?,?,?,?,?,?)";
        $stmt = mysqli_prepare($con,$query2);
        if($stmt){
            mysqli_stmt_bind_param($stmt,"isssss",$Order_id,$code,$prdName,$prdSize,$prdPrice,$prdQuantity);
            foreach($_SESSION['Shop'] as $add){
                $code = $add['code'];
                $prdName = $add['prdName'];
                $prdSize = $add["prdSize"];
                $prdPrice = $add['prdPrice'];
                $prdQuantity = $add['prdQuantity'];
                mysqli_stmt_execute($stmt);
            }
            unset($_SESSION['Shop']);
            
            if ($iquery) {
                $subject = "Order Placed Check Your Email";
                $body = "Order have been placed";
                $headers = "From: mughalarslan996@gmail.com";
        
                if (mail($Email, $subject, $body, $headers)) {
                    echo "<script>
                                alert('Order Placed Check Your Email');
                                window.location.href= 'http://localhost/FYP/index.php';
                        </script>";
                } else {
                    echo "<script>
                            alert('Email sending failed..');
                            window.location.href= 'http://localhost/FYP/index.php';
                        </script>";
                }
            } 
        }
    }
}
    ?>