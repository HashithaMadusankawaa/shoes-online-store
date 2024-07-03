<?php 
include "conection.php";

if(isset($_GET["id"])){

    $cid = $_GET["id"];

    Database::iud("DELETE FROM `cart` WHERE `product_id`='".$cid."'");
    echo ("Removed");

}else{
    echo ("Something went wrong.");
}
?>