<?php 
session_start();
include("config.php");
session_reset();
session_destroy();
if($_SESSION['email'] == NULL){
    header("refresh:0,url=login.php");
}
header("refresh:0,url=login.php");
?>