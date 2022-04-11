<?php 
$server = "localhost";
$username = "root";
$password = "";
$database = "movies";

$con = mysqli_connect($server,$username,$password,$database);

if($con){
     
}
else {
    die("Sorry we failed to connect :".mysqli_connect_error());
}
?>