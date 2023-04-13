<?php
require_once("vendor/autoload.php");
session_start();

$db_connection = new MySQLHandler("items");

require_once("views/products.php");

//if(isset($_GET["id"]) && is_numeric($_GET["id"])){
    //require_once("views/productDetails.php");
//}else{
    //require_once("views/products.php");
//}