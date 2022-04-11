<?php 
include("config.php");
error_reporting(0);
$insert = 0;
$pmatch = 0;
$regis =0;
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $cpass = $_POST['cpass'];
    $check = "SELECT email from signup where email = '$email'";
    $fetch = mysqli_query($con,$check);
    $found = mysqli_fetch_array($fetch);
    if($found > 1){
        // echo "email already registered";
        $regis = 1;
    }
    else if($pass == $cpass && !empty($email)){
        $sql = "Insert into signup(email,password) values('$email','$pass')";
        $result = mysqli_query($con,$sql);
        if($result){
            // echo "inserted";
            $insert = 1;
        }
        else{
            echo "failed";
        }
    }
    // else if()
    else {
        // echo "passwprd do no matche".mysqli_error();
        $pmatch =1;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">

    <!-- ------------------------- -->
    <!-- <link rel="stylesheet" href="style.css"> -->
    <!-- font google ---------------- -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <!-- icon------------- -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <title>Sign up</title>
    <style>
        .login-box .username input[type="text"],input[type="password"]{
            color:white !important;
        }
    </style>
</head>

<body>
    <div class="container">

        <div class="blur"></div>
       
        <div class="login-box">
        <form action="signup.php" method="post">
            <h2>Signup <span style="color: rgb(80, 80, 80); font-weight:400">| <a href="login.php" style="text-decoration:none;">Login</a></span></h2>
            <p class="p">Get login to access your account</p>
            <div class="username">
                <input type="text" placeholder="Email Address" required name="email">
                <i class="fa-solid fa-envelope"></i>
            </div>
            <div class="username pass">
                <input type="password" placeholder="Password" required name="pass">
                <i class="fa-solid fa-lock"></i>
            </div>
            <div class="username pass">
                <input type="password" placeholder="Confirm Password" required name="cpass">
                <i class="fa-solid fa-lock"></i>
            </div>
            <?php 
            if($insert == 1){
                echo "<div style='padding:8px; background:green;'>You have successfully registered</div>";
            }
            else if($pmatch == 1){
                echo "<div style='padding:8px; background:yellow;'>Password do not match</div>";
            }
            else if($regis == 1){
                echo "<div style='padding:8px; background:orange;'>Email already registered</div>";
            }
            ?>
            <button type = "submit" name="submit">SIGN UP</button>

            <p><a>Already have an account</a></p>
    </form>
        </div>
        
    </div>

</body>

</html>