<?php
include "conection.php"; // Ensure this file includes your database connection logic

$sort = $_POST['sort'];
$order_by = 'datetime_added'; // Default sorting

if ($sort == '1') {
    $order_by = 'datetime_added DESC';
} elseif ($sort == '2') {
    $order_by = 'price DESC';
} elseif ($sort == '3') {
    $order_by = 'price ASC';
}else{
    echo("error: unknown sort");
}

$product_rs = Database::search("SELECT * FROM `product` WHERE `status_status_id` = '1' AND `category_cat_id` = '2' ORDER BY $order_by");
$product_num = $product_rs->num_rows;

for ($z = 0; $z < $product_num; $z++) {
    $product_data = $product_rs->fetch_assoc();
    $img_rs = Database::search("SELECT * FROM `product_img` WHERE `product_id` = '" . $product_data["id"] . "'");
    $img_data = $img_rs->fetch_assoc();

    $category_rs = Database::search("SELECT*FROM `category` WHERE `cat_id` = '" . $product_data["category_cat_id"] . "'");
                      $category_data = $category_rs->fetch_assoc();

    echo '<div class="col-6 col-lg-4 text-start">';
    echo '<a href="singaleProduct.php?id=' . $product_data["id"] . '" class="link-underline link-underline-opacity-0">';
    echo '<div class="p-0">';
    echo '<div class="card container-fluid border border-0 row">';
    echo '<div class="rounded-1 col-12 col-lg-12">';
    echo '<img class="border border-0 img-thumbnail card-img-top rounded-2" style="background: #EFEFEF;" src="' . $img_data["img_path"] . '" />';
    echo '</div>';
    echo '<div class="col-12 col-lg-12 text-start ms-3 mt-2">';
    echo '<h4 class="names card-title text-dark">' . $product_data["title"] . '</h4>';
    echo '<p class="names card-subtitle text-dark">' . $category_data["cat_name"] . '</p>';
    echo '<h4 class="names card-title text-dark">Rs. ' . $product_data["price"] . '.00</h4>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</a>';
    echo '</div>';
}


?>
