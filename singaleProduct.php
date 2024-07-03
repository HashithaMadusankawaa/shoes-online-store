<?php
include "conection.php";

if (isset($_GET["id"])) {

  $pid = $_GET["id"];

  $product_rs = Database::search("SELECT product.id,product.price,product.qty,product.description,
    product.title,product.datetime_added,product.delivery_fee_colombo,product.delivery_fee_other,
    product.category_cat_id,product.model_has_brand_id,product.condition_condition_id,
    product.status_status_id,product.user_email,model.model_name AS mname,brand.brand_name AS bname FROM 
    `product` INNER JOIN `model_has_brand` ON model_has_brand.id=product.model_has_brand_id INNER JOIN 
    `brand` ON brand.brand_id=model_has_brand.brand_brand_id INNER JOIN `model` ON 
    model.model_id=model_has_brand.model_model_id  WHERE product.id='" . $pid . "'");

  $product_num = $product_rs->num_rows;

  if ($product_num == 1) {
    $product_data = $product_rs->fetch_assoc();

    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>Product name | WAKTA SHOES</title>
      <link rel="icon" href="resoerce/Wakta.png" />
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
      <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css" />
      <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.js"></script>
      <link rel="stylesheet" href="singaleProduct.css" />
      <link href="https://fonts.googleapis.com/css?family=Instrument Sans" rel="stylesheet" />
    </head>

    <body class="b">
      <?php
      include "header.php";

      ?>

      <div class="container">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#" class="text-dark">Home</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Library</li>
          </ol>
        </nav>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-12 col-lg-6">
            <div class="row">
              <div class="mi col-12 col-lg-10 row h-auto bg-secondary-subtle rounded-3 ">
                <?php

                $image_rs = Database::search("SELECT * FROM `product_img` INNER JOIN `product` ON product_img.product_id = product.id WHERE `id` ='" . $pid . "' ");
                $image_data = $image_rs->fetch_assoc();



                ?>
                <img src="<?php echo $image_data["img_path"]; ?>" class="w-100" id="mainImg" />
              </div>
              <div class="col-12 col-lg-12 row offset-1 ">
                <?php

                $image_rs = Database::search("SELECT * FROM `product_img` WHERE `product_id`='" . $pid . "'");
                $image_num = $image_rs->num_rows;
                $img = array();

                if ($image_num != 0) {
                  for ($x = 0; $x < $image_num; $x++) {
                    $img_data = $image_rs->fetch_assoc();
                    $img[$x] = $img_data["img_path"];

                    ?>

                    <div class="sm rounded-3  col-2 col-lg-2 text-center me-4 mt-2  bg-secondary-subtle ">
                      <img src="<?php echo $img[$x]; ?>" class="w-100" id="productImg<?php echo $x; ?>"
                        onmouseover="loadMainImg(<?php echo $x; ?>);" />
                    </div>

                    <?php

                  }
                } else {
                  ?>
                  <div class="sm col-2 col-lg-2 text-center me-4 mt-2  border border-2 border-black">
                    <img src="resoerce/shoes/Addidas Run ak2_0_65acc1de6efc5.png" class="w-100" />
                  </div>
                  <div class="sm col-2 col-lg-2 text-center me-4 mt-2 border border-2 border-black">
                    <img src="resoerce/shoes/Addidas Run ak2_0_65acc1de6efc5.png" class="w-100" />
                  </div>
                  <div class="sm col-2 col-lg-2 text-center me-4 mt-2 border border-2 border-black">
                    <img src="resoerce/shoes/Addidas Run ak2_0_65acc1de6efc5.png" class="w-100" />
                  </div>
                  <div class="sm col-2 col-lg-2 text-center mt-2 border border-2 border-black">
                    <img src="resoerce/shoes/Addidas Run ak2_0_65acc1de6efc5.png" class="w-100" />
                  </div>
                  <?php
                }

                ?>


              </div>
              <div class="container-fluid mt-5">
                <main class="container-fluid ">

                  <section class="accordion" id="overview">
                    <h1 class="title"><a href="#overview">Shipping & Returns</a></h1>
                    <div class="content">
                      <div class="wrapper">
                        <p>
                          Free standard shipping on orders $50+ and free 60-day returns for Nike Members.<strong>FAQ
                            sections</strong>,
                          <strong>Learn more.</strong>, Return policy exclusions apply.
                      </div>
                    </div>
                  </section>

                  <section class="accordion" id="how-does-it-work">

                    <?php

                    $review_rs = Database::search("SELECT COUNT(`feed`) FROM `feedback` WHERE `product_id` = '" . $pid . "'");
                    $review_num = $review_rs->num_rows;
                    ?>

                    <h1 class="title"><a href="#how-does-it-work">Reviews (<?php echo $review_num ?>)

                        <div class="ratings ms-5">
                          <?php

                          if (1 == $review_num) {
                            ?>
                            <i class="fa-solid fa-star" style="color: yellow;"></i>
                            <i class="fa fa-star rating-color"></i>
                            <i class="fa fa-star rating-color"></i>
                            <i class="fa fa-star rating-color"></i>
                            <i class="fa fa-star"></i>

                            <?php
                          } else if ('1' < $review_num && $review_num >= '5') {
                            ?>
                              <i class="fa-solid fa-star" style="color: yellow;"></i>
                              <i class="fa-solid fa-star" style="color: yellow;"></i>
                              <i class="fa fa-star rating-color"></i>
                              <i class="fa fa-star rating-color"></i>
                              <i class="fa fa-star"></i>

                            <?php
                          } else if ('5' < $review_num && $review_num > '10') {
                            ?>
                                <i class="fa-solid fa-star" style="color: yellow;"></i>
                                <i class="fa-solid fa-star" style="color: yellow;"></i>
                                <i class="fa-solid fa-star" style="color: yellow;"></i>
                                <i class="fa fa-star rating-color"></i>
                                <i class="fa fa-star"></i>

                            <?php
                          } else if ('10' < $review_num && $review_num > '15') {
                            ?>
                                  <i class="fa-solid fa-star" style="color: yellow;"></i>
                                  <i class="fa-solid fa-star" style="color: yellow;"></i>
                                  <i class="fa-solid fa-star" style="color: yellow;"></i>
                                  <i class="fa-solid fa-star" style="color: yellow;"></i>
                                  <i class="fa fa-star"></i>

                            <?php
                          }


                          ?>

                        </div>
                      </a></h1>
                    <div class="content">
                      <div class="wrapper">
                        <p>

                          <code>
                                        <div class="ratings">
                                          <i class="fa fa-star rating-color"></i>
                                          <i class="fa fa-star rating-color"></i>
                                          <i class="fa fa-star rating-color"></i>
                                          <i class="fa fa-star rating-color"></i>
                                          <i class="fa fa-star"></i>
                                        </div>
                                      </code> 4.8 Stars <code></code>


                        </p>
                        <?php
                        if (isset($_SESSION["u"])) {
                          ?>
                          <a href="<?php echo "feedback.php?id=" . ($product_data["id"]); ?>">
                            <h5 class="text-danger">Write a Review</h5>
                          </a>
                          <?php
                        }



                        ?>

                        <?php
                        $feed_rs = Database::search("SELECT * FROM `feedback` WHERE `product_id`='" . $product_data["id"] . "'");
                        $feed_num = $feed_rs->num_rows;
                        for ($i = 0; $i < $feed_num; $i++) {
                          $feed_data = $feed_rs->fetch_assoc();

                          ?>
                          <p>
                          <div class="ratings">
                            <i class="fa fa-star rating-color"></i>
                            <i class="fa fa-star rating-color"></i>
                            <i class="fa fa-star rating-color"></i>
                            <i class="fa fa-star rating-color"></i>
                            <i class="fa fa-star"></i>
                          </div>
                          <code><?php echo $feed_data["email"]; ?></code> - <?php echo $feed_data["date"]; ?>:<code></code>
                          <code></code> <?php echo $feed_data["feed"]; ?>
                          </p>
                          <?php


                        }
                        ?>

                      </div>
                    </div>
                  </section>


                </main>
              </div>
            </div>
          </div>
          <div class="col-12 col-lg-6 overflow-auto">
            <div class="container-fluid">
              <p>
                <?php
                $invoice_rs = Database::search("SELECT * FROM `invoice`
                WHERE `product_id` = '" . $pid . "'
                AND `date` >= CURDATE() - INTERVAL 7 DAY");
                $invoice_num = $invoice_rs->num_rows;
                ?>
                <i class="fa-solid fa-fire-flame-curved fa-lg"></i> <?php echo $invoice_num ?> purchased in the last 7 days
              </p>
              <h3 class="text-start">
                <?php echo $product_data["title"]; ?><br />
                <p class="fs-5">Men's Shoes</p>
              </h3>
              <p class="fw-bold fs-4">Rs.<?php echo $product_data["price"]; ?>.00</p>
            </div>

            <div class="container-fluid row mt-3 g-1">

              <div class="col-6 col-lg-6 text-start">Select Color
                <select class="form-select" aria-label="Default select example" id="color">
                  <?php 
                  $color_rs = Database::search("SELECT * FROM `product_color` WHERE `product_id` = '" . $pid . "'");
                  $color_num = $color_rs->num_rows;

                  for ($i = 0; $i < $color_num; $i++) {
                    
                     $color_data = $color_rs->fetch_assoc();

                     ?>
                     <option value="<?php echo $color_data["sc_id"]?>"><?php echo $color_data["color"]?> </option>
                     
                     <?php
                  
                  }
                  ?>      
                  
                </select>
              </div>
              <div class="col-6 col-lg-6 text-end">Select Size
                <?php 
                if ($product_data["qty"] == 0) {
                 ?>
                 <button
                  class="btn  col-8 offset-2  btn-dark  border border-2 border-black text-light rounded-4 ">Sold
                  out

                </button>
                 <?php
                }else{
                    ?>
                    <select class="form-select" aria-label="Default select example" id="size">
                  <?php 
                
                  $size_rs = Database::search("SELECT * FROM `size` WHERE `product_id` = '" . $pid . "'");
                  $size_num = $size_rs->num_rows;

                  for ($i = 0; $i < $size_num; $i++) {
                    
                     $size_data = $size_rs->fetch_assoc();

                     ?>
                     <option value="<?php echo $size_data["s_id"]?>"><?php echo $size_data["size"]?> </option>
                     
                     <?php
                  
                  }
                  ?>      
                  
                </select>
                    <?php
                }
                ?>
              

              </div>



              <div class="container-fluid  d-grid mt-4">

                <button class="btn btn-lg col-8 offset-2  btn-dark  border border-2 border-black text-light mt-1 rounded-4 "
                  onclick="addToCart(<?php echo $product_data['id']; ?>);">Add to Bag

                </button>

              </div>

              <div class="container-fluid  d-grid mt-1">

                





                <div class="container-fluid d-grid ">
                  <?php
                  if (isset($_SESSION["u"])) {
                    $watchlist_rs = Database::search("SELECT * FROM `watchlist` WHERE `user_email` = '" . $_SESSION["u"]["email"] . "' AND `product_id` ='" . $pid . "'");
                    $watchlist_num = $watchlist_rs->num_rows;

                    if ($watchlist_num == 1) {
                      ?>
                      <button
                        class="btn btn-lg col-8 offset-2  btn-outline-light border border-2 border-black text-dark mt-1 rounded-4 "
                        onclick='addToWatchlist(<?php echo $product_data["id"]; ?>);'>Favorite
                        <i class="fa-solid fa-heart text-danger" id="heart<?php echo $product_data["id"]; ?>"></i>
                      </button>
                      <?php
                    } else {
                      ?>
                      <button
                        class="btn btn-lg col-8 offset-2  btn-outline-light border border-2 border-black text-dark mt-1 rounded-4 "
                        onclick='addToWatchlist(<?php echo $product_data["id"]; ?>);'>Favorite
                        <i class="fa-regular fa-heart text-dark" id="heart<?php echo $product_data["id"]; ?>"></i>
                      </button>
                      <?php
                    }
                  } else {
                    ?>
                    <button
                      class="btn btn-lg col-8 offset-2  btn-outline-light border border-2 border-black text-dark mt-1 rounded-4 ">Favorite
                      <i class="fa-regular fa-heart text-dark"></i>
                    </button>

                    <?php
                  }

                  ?>




                </div>

                <div class="container-fluid mt-4">
                  <p class="text-dark text-center">This product is excluded from site <br /> promotions and discounts.</p>

                  <p class="text-start  text-dark col-12 mt-3 "><?php echo $product_data["description"]; ?></p>
                </div>
                <hr />


              </div>
            </div>

          </div>




        </div>

        <div class="container-fluid mt-5">
          <h3 class="text-dark">You Might Also Like</h3>

          <div class="container-fluid  text-center">
            <div class="row g-2">

              <?php
              $related_rs = Database::search("SELECT * FROM `product` 
               WHERE `model_has_brand_id`='" . $product_data["model_has_brand_id"] . "' AND `status_status_id`='1' LIMIT 6");

              $related_num = $related_rs->num_rows;
              for ($y = 0; $y < $related_num; $y++) {
                $related_data = $related_rs->fetch_assoc();

                ?>
                <div class="col-4">
                  <div class="p-3" style="background: #EFEFEF;">
                    <?php

                    $image_rs = Database::search("SELECT * FROM `product_img` INNER JOIN `product` ON product_img.product_id=product.id WHERE `id`='" . $related_data["id"] . "'");
                    $img_data = $image_rs->fetch_assoc();

                    ?>

                    <img src="<?php echo $img_data["img_path"] ?>" class="w-100" />
                  </div>
                  <div>
                    <h5 class="text-start"><?php echo $related_data["title"]; ?></h5>
                    <p class="text-start">Men's</p>
                    <p class="text-start">Rs.<?php echo $related_data["price"]; ?>.00</p>
                  </div>
                </div>

                <?php
              }
              ?>



            </div>



          </div>
        </div>

        <?php
        include "footer.php";
        ?>



        <script src="script.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
          integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
          crossorigin="anonymous"></script>
    </body>

    </html>


    <?php
  } else {
    echo ("Sorry for the inconvenience.Please try again later.");
  }
} else {
  echo ("Something Went Wrong.");
}

?>