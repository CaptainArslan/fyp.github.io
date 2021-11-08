<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSSFiles/Recover_Email.css">
    <title>Recover Your Account</title>
</head>

<body>
    <?php
    include('header.php');
    include('dbcon.php');

    //For Send Email Address to Reset Password Page
    $FetchEmail = "select * from signup";
    $FeQuery = mysqli_query($con,$FetchEmail);
    $SAQuery = mysqli_fetch_array($FeQuery);

    //For Submit Button

    if (isset($_POST['submit'])) {
        $Email = mysqli_real_escape_string($con, $_POST['Email']);

        /*For Check Email From Database*/
        $Emailquery = "select * from signup where Email = '$Email' ";
        $query = mysqli_query($con, $Emailquery);

        $EmailCount = mysqli_num_rows($query);

        //For Mial Sending
        if ($EmailCount) {

            $UserData = mysqli_fetch_array($query);
            $FirstName = $UserData['FirstName'];
            $Email = $UserData['Email'];
            $Token = $UserData['Token'];

            $subject = "Reset Your Password";
            $body = "Hi,$FirstName. Click here to Reset Your account Password
                        http://localhost/FYP/Reset_Password.php?Token=$Token ";
            $Sender_Email = "From:mughalarslan996@.com";

            if (mail($Email, $subject, $body, $Sender_Email)) 
            {
                header("location:http://localhost/FYP/Reset_Password.php?Token=$Token");
            } else 
            {
                echo '<script>
                            alert("Email sending Failed");
                      </script>';
            }
        } else {
            echo '<script>
                        alert("no Email Found");
                  </script>';
        }
    }
    ?>
    <form action="" method="POST">
        <div class="RecEmail">
            <h1>Recover Your Accounts</h1>
            <h3>Please Fill Email id Properly</h3>
            <input type="Email" id="Passwords" name="Email" placeholder="Email" value="<?php echo $SAQuery['Email'] ?>" required><br>
            <a class="Login" href="Login.php">If you have already have an account?<br>Login here.</a>
            <input type="submit" name="submit" value="Send Mail" class="Submit">
        </div>
    </form>
    <div class="Status">

    </div>




    <div style="margin-top: 100px;">
        <?php
        include('Footer.php');
        include('js.php');
        ?>
    </div>
</body>

</html>