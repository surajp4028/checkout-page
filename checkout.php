<?php 
 session_start();
include("config.php");
error_reporting(0);
if($_SESSION['email']==NULL){
    header("refresh:0,url=login.php");
}
$itemno = 1;

if( empty($_POST['itemno'])){
    $itemno = 1;
}
else if(!empty($_POST['itemno'])){
    $itemno = $_POST['itemno'];
}
$ship = 30;
$total = 370*$itemno;
$tship = 30*$itemno;
$tprice = $total + $tship;
$tpay = $tprice * 100;
$uname = 'Suraj Pandey';
// $fixed = 0;
if(isset($_POST['update'])){
    
    $itemno = $_POST['itemno'];
    // $itemno = $fixed;
    if($itemno < 1){
        $itemno = 1;
    }
    
   
    $total = 370*$itemno;
    $tship = 30*$itemno;
    $tprice = $total + $tship;
    $tpay = $tprice * 100;
}
// if($fixed == $itemno){
//     $itemno = $fixed;
// }
//  $itemno = $fixed;
else if(isset($_POST['update-details'])){
    $uname = $_POST['uname'];
}
// $itemno = $_POST['itemno'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
    <!-- font google ---------------- -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <!-- payment razorpay=============== -->




    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <!-- icon------------- -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <title>Checkout</title>
    <style>
        .ud:hover{
            background: rgb(5, 164, 250) !important;
        }
    </style>
</head>

<body>
<!-- <button id="rzp-button1">Pay</button> -->
    <div class="full"></div>
    <div class="container">
        <div class="top-bar">
            <p>SHIPING TO DELHI<br>PANDEY STORE</p>
            <div class="top-middle-bar">
                <h2>LOCO</h2>
                <p>BACK TO SHOP > SHOPPING BAG > <span>CHECKOUT</span></p>
            </div>
            <div class="crt">
            
                <i class="fa-solid fa-basket-shopping"></i>
                <div class="bag-item">1</div>
                
            </div>
        </div>
        <div class="short-container">
            <h2>Checkout</h2>
            <div class="second-short-container">
                <div class="left-side">
                    <h4>SHIPPING DETAILS</h4>
                    <HR>
                    <div class="details">
                        <h5><?php echo $uname ?><br>Gandhi Nagar<br>Delhi - 110031</h5>
                        <div>
                        <h5><?php echo $_SESSION['email'] ?></h5>
                        <p style="text-align:right;font-size:10px; margin-top:3px;"><a href="logout.php">Log out</a></p>
                        </div>
                    </div>
                    <h4>PAYMENT DETAILS</h4>
                    <HR>
                    <!-- <form action="checkout.php" method="post" > -->
                        <div class="form">
                        
                            <label for="">Name</label><br>
                            <input type="text" class="name" required name="uname" value="<?php echo $_SESSION['email'] ?>" disabled>
                        </div>
                        <!-- <button type="submit" name="update-details" style="border:1px solid black; background:transparent;margin-bottom:5px" class="ud">UPDATE DETAILS</button>
                        </form> -->

                        <button type="submit" id="rzp-button1" >PAY RS <?php echo $tprice ?></button>
                        

                </div>
                <div class="right-side">
                    <form action="checkout.php" method="post">
                        <h4>YOUR ORDER <span style="font-size: 8px;"> EDIT SHOPPING BAG</span></h4>
                        <HR>
                        <div class="product">
                            <div class="product-items">
                                <img src="Images/p-2.jpg" alt="" height="40px">
                                <div class="product-desc">
                                    <h4>Hindi Dubbed Full Movies</h4>
                                    <p>It's <span>1080px Available</span></p>
                                </div>
                            </div>
                            <div class="cart-item">
                                <input type="number" name="itemno" id="" value="<?php echo $itemno ?>" required>
                            </div>
                            <div class="product-price">
                                <?php echo $total ?>RS
                            </div>
                        </div>
                        <hr class="new-hr">
                        <div class="sub-total">
                            <h4>Subtotal</h4>
                            <h4><?php echo $total ?>RS</h4>
                        </div>
                        <div class="shipping">
                            <h4>shipping</h4>
                            <h4><?php echo $tship ?>RS</h4>
                        </div>
                        <div class="total">
                            <h5>Total</h5>
                            <h4><?php echo $tprice ?> RS</h4>
                        </div>
                        <button type="submit" name="update">UPDATE CART</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
var options = {
    "key": "rzp_test_A3IzAz6DlCYhBD", // Enter the Key ID generated from the Dashboard
    "amount": "<?php echo $tpay?>", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    "currency": "INR",
    "name": "<?php echo $uname ?>",
    "description": "Test Transaction",
    "image": "",
    "handler": function (response){
        alert(response.razorpay_payment_id);
        
    }
};
var rzp1 = new Razorpay(options);
document.getElementById('rzp-button1').onclick = function(e){
    rzp1.open();
    e.preventDefault();
}
</script>
</html>