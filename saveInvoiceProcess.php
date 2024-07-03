<?php

session_start();
include "conection.php";

if (isset($_SESSION["u"])) {

    $email = $_SESSION["u"]["email"];

    $orderID = $_POST['order_id'];
    $total = $_POST['total'];
    $subtotal = $_POST['subtotal'];
    $shipping = $_POST['shipping'];
    

    if (!empty($orderID) && !empty($total) && !empty($subtotal) && !empty($shipping)) {

        $cart_rs = Database::search("SELECT * FROM `cart` INNER JOIN `size` ON cart.size_s_id=size.s_id WHERE `user_email`='" . $email . "' ");
        $cart_num = $cart_rs->num_rows;

        

        for ($i = 0; $i < $cart_num; $i++) {

            $cart_data = $cart_rs->fetch_assoc();
           
            $qty = $cart_data["qty"];
            $size = $cart_data["qty"];

            $product_rs = Database::search("SELECT * FROM `product` WHERE `id`='" . $cart_data["product_id"] . "'");
            $product_data = $product_rs->fetch_assoc();

            $current_qty = $product_data["qty"];
            $new_qty = $current_qty - $qty;

            Database::iud("UPDATE `product` SET `qty`='" . $new_qty . "' WHERE `id`='" . $cart_data["product_id"] . "'");

            $current_size = $cart_data["stock_quantity"];
            $new_size = $current_size - $size;

            Database::iud("UPDATE `size` SET `stock_quantity` = '".$new_size."' WHERE `s_id` = '".$cart_data["s_id"]."'");

            $d = new DateTime();
            $tz = new DateTimeZone("Asia/Colombo");
            $d->setTimezone($tz);
            $date = $d->format("Y-m-d H:i:s");
    
            Database::iud("INSERT INTO `invoice`(`order_id`,`date`,`total`,`qty`,`status`,`product_id`,`user_email`,`size_s_id`,`product_color_sc_id`) 
            VALUES ('" . $orderID . "','" . $date . "','" . $subtotal . "','" . $qty . "','0','" . $cart_data["product_id"] . "','" . $email . "','".$cart_data["size_s_id"]."','".$cart_data["product_color_sc_id"]."')");
            
            

        }

       

echo ("success");
    }




  

   
    
  

}
?>