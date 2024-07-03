<?php

session_start();
include "conection.php";

$gender = isset($_POST['g']);


$query = "SELECT * FROM product WHERE `status_status_id`='1' ";


if ($gender == "0") {
   $query;
}else if ($gender == "1" ) {
  $query .= " AND category_cat_id = '1' ";
}else if ($gender == "3") {
 $query .= " AND category_cat_id = '3'";
}else if ($gender == "2") {
  $query .= " AND category_cat_id = '2'";
 }
 

?>

<div class="row g-2" id="product-list">


<?php

$product_rs = Database::search($query);
$product_num = $product_rs->num_rows;

for ($z = 0; $z < $product_num; $z++) {
  $product_data = $product_rs->fetch_assoc();

  ?>

  <div class="col-6 col-lg-4 text-start">
    <a href='<?php echo "singaleProduct.php?id=" . ($product_data["id"]); ?>'
      class="link-underline link-underline-opacity-0">
      <div class="p-0">
        <div class=" card container-fluid   border border-0 row">
          <div class=" rounded-1  col-12 col-lg-12">

            <?php

            $img_rs = Database::search("SELECT*FROM `product_img` WHERE `product_id` = '" . $product_data["id"] . "'");
            $img_data = $img_rs->fetch_assoc();

            $category_rs = Database::search("SELECT * FROM `category` INNER JOIN `product` ON category.cat_id = product.category_cat_id WHERE `id` = '" . $product_data["id"] . "'");
            $category_data = $category_rs->fetch_assoc();
            ?>

            <img class=" border border-0  img-thumbnail card-img-top rounded-2  " style="background: #EFEFEF;"
              src="<?php echo $img_data["img_path"]; ?>" />
          </div>
          <div class="col-12 col-lg-12 text-start ms-3  mt-2 ">
            <h4 class="names card-title text-dark ">
              <?php echo $product_data["title"]; ?>
            </h4>
            <p class="names card-subtitle text-dark">
              <?php echo $category_data["cat_name"]; ?>
            </p>
            <h4 class="names card-title text-dark ">Rs.
              <?php echo $product_data["price"]; ?>.00
            </h4>
          </div>

        </div>
      </div>
    </a>
  </div>



  <?php
}

?>


</div>
