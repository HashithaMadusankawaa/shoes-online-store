<?php
include "conection.php";

$size = $_POST["size"];
$stock_quantity = $_POST["stock_quantity"];
$pid = $_POST["pid"];




$size_rs = Database::search("SELECT * FROM `size` WHERE `size`='" . $size . "' AND `product_id`='" . $pid . "'");

$size_num = $size_rs->num_rows;

Database::iud("INSERT INTO `size`(`size`,`stock_quantity`,`product_id`) VALUES ('" . $size . "','" . $stock_quantity . "','" . $pid . "');");

$product_rs = Database::search("SELECT * FROM `product` WHERE `id`='" . $pid . "'");
$product_data = $product_rs->fetch_assoc();

$current_qty = $product_data["qty"];
$new_qty = $current_qty + $stock_quantity;
Database::iud("UPDATE `product` SET `qty`='" . $new_qty . "' WHERE `id`='" . $pid . "'");

echo ("success");
?>