<?php
include "conection.php";

$size = $_POST["size"];
$stock_quantity = $_POST["stock_quantity"];
$pid = $_POST["pid"];


$product_rs = Database::search("SELECT * FROM `product` WHERE `id`='".$pid."'");

$product_data = $product_rs->fetch_assoc();

$current_qty = $product_data["qty"];

$size_rs = Database::search("SELECT * FROM `size` WHERE `product_id`='".$pid."'");

$size_num = $size_rs->num_rows;

for ($i=0; $i < $size_num; $i++) { 
    
    $size_data = $size_rs->fetch_assoc();

    $new_qty = $current_qty + $size_data["stock_quantity"];

    Database::iud("UPDATE `product` SET `qty`='".$new_qty."' WHERE `product_id`='".$pid."'");

}

 
echo ("success");
?>
