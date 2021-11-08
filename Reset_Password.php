<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSSFiles/Reset_Password.css">
    <title>Recover Your Account</title>
</head>
<body>
<?php
    include('header.php');
    include('dbcon.php');
    if(isset($_POST['submit']))
    {
        if(isset($_GET['Token']))
        {
            $Token = $_GET['Token'];

            $Password = mysqli_real_escape_string($con,$_POST['Password']);
            $CPassword = mysqli_real_escape_string($con,$_POST['CPassword']);

            /*For Encript Password */
            $Pass = password_hash($Password, PASSWORD_BCRYPT);
            $CPass = password_hash($CPassword, PASSWORD_BCRYPT);
            
            if( strlen($Password)>=8    &&  strlen($Password)<=15){
                if($Password === $CPassword)
                {   
                    $updatequery = "Update signup set Password = '$Pass' where Token='$Token'"; 

                    $uquery = mysqli_query($con,$updatequery);

                    if($uquery){
                        echo "<script>
                                alert('Your Password is Updated');
                                window.location.href= 'http://localhost/FYP/Login.php';
                                </script>";
                    }
                    else{
                        $_SESSION['msg'] = "Your Password is not Update";
                    }
                }
                else{
                    $_SESSION['msg'] = "Password not matched";
                }
            } 
            else 
            {
                if($Password != $CPassword){
                    $_SESSION['msg'] = "Password not Matched";
                }
                if(strlen($Password)<8){
                    $_SESSION['msg'] = "Password is less than 8 characters";
                }
                if(strlen($Password)>14){
                    $_SESSION['msg'] = "Password is greater than 14 characters";
                }
            }
        }
        else
        {
            $_SESSION['msg'] = "no Token Found";
        }
    }
?>
    <form action="" method="POST">
        <div class="ResetPass">   
            <h1>Reset Password</h1>
            <h4>Please Enter New Password</h4>
                    <input type="password" class="pass" id="Passwords" name="Password" placeholder="New Password" required>
                    <input type="password" class="pass" id="Passwordss"  name="CPassword" placeholder="Confirm Password" required><br>
                    <input type="checkbox" class="Checkbox" onclick="ShowPass()"> <span>Show Password</span> 
                    <input type="submit" name="submit" value="Update Password" class="Submit">
        </div> 
            
	</form> 
    <div class="Status">
        <?php
            if(isset($_SESSION['msg'])){
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
            }
        ?>
    </div>
    <script>
    var state =false;
    function ShowPass(){
        if(state){
            document.getElementById("Passwords").setAttribute("type","Password");
            state = false;
            document.getElementById("Passwordss").setAttribute("type","Password");
            state = false;
        }
        else{
            document.getElementById("Passwords").setAttribute("type","text");
            state = true;
            document.getElementById("Passwordss").setAttribute("type","text");
            state = true;

        }
    }
</script>
<div style="margin-top: 100px;">
    <?php
        include('Footer.php');
        include('js.php');
    ?>
    </div>
</body>
</html>