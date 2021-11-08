<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Kids Corner Signup</title>
    <link rel="stylesheet" href="CSSFiles/Signup.css">
    <link rel="stylesheet" href="css/all.min.css">


    <script>
        //For Show Pass
        var state = false;

        function ShowPass() {
            if (state) {
                document.getElementById("Passwords").setAttribute("type", "Password");
                state = false;
                document.getElementById("Passwordss").setAttribute("type", "Password");
                state = false;
            } else {
                document.getElementById("Passwords").setAttribute("type", "text");
                state = true;
                document.getElementById("Passwordss").setAttribute("type", "text");
                state = true;
            }
        }
    </script>
</head>

<body>
    <?php
    include('header.php');
    include('dbcon.php');

    if (isset($_POST['submit'])) {
        $FirstName = mysqli_real_escape_string($con, $_POST['FirstName']);
        $LastName = mysqli_real_escape_string($con, $_POST['LastName']);
        $Email = mysqli_real_escape_string($con, $_POST['Email']);
        $Password = mysqli_real_escape_string($con, $_POST['Password']);
        $CPassword = mysqli_real_escape_string($con, $_POST['CPassword']);

        /*For Encript Password */
        $Pass = password_hash($Password, PASSWORD_BCRYPT);
        $CPass = password_hash($CPassword, PASSWORD_BCRYPT);

        $Token = bin2hex(random_bytes(15));

        /*For Check Email From Database*/
        $Emailquery = "select * from signup where Email = '$Email' ";
        $query = mysqli_query($con, $Emailquery);

        $EmailCount = mysqli_num_rows($query);

        if ($EmailCount > 0) {
            $_SESSION['msg'] = "Email Already Exist";
        } else {
            if ((strlen($Password) >= 8) && strlen($Password) <= 15) {
                if ($Password === $CPassword) {
                    $insertquery = "insert into signup(role, FirstName, LastName, Email, Password, CPassword, Token) 
                values ('0','$FirstName','$LastName','$Email','$Pass','$CPass','$Token')";
                    $iiquery = mysqli_query($con, $insertquery);
                    //For Email Send
                    if ($iiquery) {
                        $subject = "Simple Email Test via PHP";
                        $body = "Hi,$FirstName. Click here to Activate your Account
                            http://localhost/FYP/Login.php?Token=$Token";
                        $headers = "From: bazam3592@gmail.com";

                        if (mail($Email, $subject, $body, $headers)) {
                            echo "<script>
                            alert('Check Your Email to activate Your Account');
                            window.location.href= 'http://localhost/FYP/Login.php';
                      </script>";
                        } else {
                            echo "<script>
                                    alert('Email sending failed..');
                                    window.location.href= 'http://localhost/FYP/Signup.php';
                                </script>";
                        }
                    }
                }
                else {
                        if ($Password != $CPassword) {
                            $_SESSION['Passmsg'] = "Password not Matched";
                        }
                }
            } else {
                
                if (strlen($Password) < 8) {
                    $_SESSION['Passmsg'] = "Password is less than 8 characters";
                }
                if (strlen($Password) > 14) {
                    $_SESSION['Passmsg'] = "Password is greater than 14 characters";
                }
            }
        }
    }



    ?>
    <form action="" method="POST">
        <div class="signup">
            <h1>Create Your Account</h1>
            <input type="text" class="Name" name="FirstName" placeholder="First Name" required>
            <input type="text" class="Name" name="LastName" placeholder="Last Name" required>
            <input type="Email" name="Email" placeholder="Email" required>
            <text class="Suggest">@gmail.com</text>
            <input type="password" class="pass" id="Passwords" name="Password" placeholder="Password" required>
            <input type="password" class="pass" id="Passwordss" name="CPassword" placeholder="Confirm Password" required><br>
            <p class="Status1" id="mesg">
                <?php
                if (isset($_SESSION['Passmsg'])) {
                    echo $_SESSION['Passmsg'];
                    unset($_SESSION['Passmsg']);
                }
                ?>

            </p>
            <input type="checkbox" class="Checkbox" onclick="ShowPass()"> <span>Show Password</span>
            <a href="Login.php">If you have already have an account?<br>Login here.</a>
            <input type="submit" name="submit" value="Sign up" class="Submit">
        </div>
    </form>
    <div class="Status2">
        <?php
        if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
        ?>
    </div>

    <div style="margin-top: 100px;">
        <?php
        include('Footer.php');
        include('js.php');
        ?>
    </div>


</body>

</html>