<!doctype html>
<html>
<head>  
<meta charset="utf-8">
<title>Kids Corner Login</title>
<link rel="stylesheet" href="CSSFiles/Login.css">
</head>

<body>

    
<?php
    include('header.php');
    include('dbcon.php');
        $tokenQuery = mysqli_query($con,"SELECT * from `signup`");
        $tokquery = mysqli_fetch_array($tokenQuery);

    if(isset($_POST['submit'])){
        $Email = $_POST['Email'];
        $Password = $_POST['Password'];

        $Email_Search = "select * from signup where Email='$Email'";
        $query = mysqli_query($con, $Email_Search);

        $Token = bin2hex(random_bytes(15));

        $Email_Count = mysqli_num_rows($query);
                            //For Email counting
        if($Email_Count>0) 
        {
            $Email_Pass = mysqli_fetch_assoc($query);

            $db_Pass = $Email_Pass['Password'];

            $Pass_decode = password_verify($Password, $db_Pass);

            if($Pass_decode){
                            //For Remember me
                if(isset($_POST['rememberme'])){
                    setcookie('emailcookie',$Email,time()+86400);
                    setcookie('passwordcookie',$Password,time()+86400);
                    header('location:index.php');    
                }
                else{
                    header('location:index.php');
                }
            }else{
                $_SESSION['msg']="Incorrect Password";
            }
        }else{
            $_SESSION['msg']="Invlid Email";
        }
    }
        
?>
	<form action="" method="POST">
        <div class="Login">   
            <h1>Sign in</h1>
                    <input type="Email" id="Passwords" name="Email" placeholder="Email" required
                        value="<?php if(isset($_COOKIE['emailcookie']))
                                    {
                                        echo $_COOKIE['emailcookie'];
                                    } 
                                ?>" 
                    ><br>
                    <input type="password" id="pass" name="Password" placeholder="Password" class="Password" required 
                        value="<?php if(isset($_COOKIE['passwordcookie']))
                                    {
                                        echo $_COOKIE['passwordcookie'];
                                    } 
                                ?>" 
                    >
                    <span class="eye1" onclick="ShowPass()">
                        <i style="width: 20px;" id="Show" class="far fa-eye"></i>
                        <i style="width: 20px;" id="Hide" class="fas fa-eye-slash"></i>
                    </span>
                    <br> 
                    <input type="hidden" name="token" value="<?php echo $tokquery['Token']; ?>">
                    <input type="checkbox" name="rememberme" class="checkbox"> <text>Remember me</text> 
                    <a class="Forget" href="Recover_Email.php?Token = <?php echo $tokquery['Token']; ?>">Forget Password?</a>
                    <a class="Signup" href="Signup.php">Registered Here</a>
                    <input type="submit" name="submit" value="Sign in" class="Submit">
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
    <div style="margin-top: 100px;">
    <?php
        include('Footer.php');
        include('js.php');
    ?>
    </div>
    <script>
    var state = false;
    function ShowPass()
    {
        if(state === false){
            document.getElementById("pass").setAttribute("type","text");
            document.getElementById("Show").style.display="block";
            document.getElementById("Hide").style.display ="none";
            state = true;
        }
        else{
            
            document.getElementById("pass").setAttribute("type","password");
            document.getElementById("Show").style.display ="none";
            document.getElementById("Hide").style.display="block";
            state = false;
        }
    }
</script>
</body>
</html>
