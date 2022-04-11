<?php 
session_start();
error_reporting(0);
include("config.php");
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $sql = "SELECT email,password from signup where email = '$email' and password = '$pass' ";
    $result = mysqli_query($con,$sql);
    $fetch = mysqli_fetch_array($result);
    $username = $fetch['email'];
    $password = $fetch['password'];
    if($email == $username && $pass == $password){
        $_SESSION['email']=$username;
        $_SESSION['password'] = $password;
        if($_SESSION['email']==$email){
            // echo "session start and successfully login".$username;
            header("refresh:0,url=checkout.php");
        }
    }
    else{
        echo "failed";
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
    <title>Login</title>

</head>

<body>
    <div class="container">

        <div class="blur"></div>
        <div class="login-box">
            <form action="login.php" method="post">
                <h2>Login <span style="color: rgb(80, 80, 80); font-weight:400">| <a href="signup.php" style="text-decoration:none;">Signup</a></span></h2>
                <p class="p">Get login to access your account</p>
                <div class="username">
                    <input type="text" placeholder="Email Address" required name="email">
                    <i class="fa-solid fa-envelope"></i>
                </div>
                <div class="username pass">
                    <input type="password" placeholder="Password" required name="pass">
                    <i class="fa-solid fa-lock"></i>
                </div>
                <button type="submit" name="submit">LOGIN</button>
                <p><a>Forgot Password</a></p>
                </form>
        </div>
    </div>

</body>

</html>