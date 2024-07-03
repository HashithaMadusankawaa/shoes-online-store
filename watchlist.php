<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> | Favorites - WAKTA SHOES</title>
  <link rel="icon" href="resoerce/Wakta.png" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.js"></script>
  <link rel="stylesheet" href="favorites.css" />
  <link href='https://fonts.googleapis.com/css?family=Instrument Sans' rel='stylesheet'>
</head>

<body>

  <?php
  include "header.php";
  ?>

  <div class="container-fluid">
    <div class="col">
      <ul class="nav nav-underline justify-content-center">
        <li class="nav-item">
          <a class="nav-link link-dark fs-5 " href="profile.php">Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link  link-dark fs-5 active" href="watchlist.php">Favorites</a>
        </li>
        <li class="nav-item">
          <a class="nav-link link-dark fs-5 " href="cart.php">Cart</a>
        <li class="nav-item">
          <a class="nav-link link-dark fs-5 " href="purchasingHistory.php">Orders</a>
        </li>

      </ul>
    </div>
  </div>



  <?php
  include "conection.php";
  if (isset($_SESSION["u"])) {
    $watchlist_rs = Database::search("SELECT * FROM `watchlist`  WHERE user_email='" . $_SESSION["u"]["email"] . "'");

    $watchlist_num = $watchlist_rs->num_rows;
  ?>
    <div class="container-fluid  text-center  mt-5">
      <div class="row g-2">
        <?php
        if ($watchlist_num == 0) {
        ?>
          <!--empty product-->
          <div class="col-12 col-lg-12">
            <h3 class="text-center">Items added to your Favorites will be saved here.</h3>
          </div>
          <!--empty product end-->
        <?php
        } else {
        ?>
          <?php
          for ($x = 0; $x < $watchlist_num; $x++) {
            $watchlist_data = $watchlist_rs->fetch_assoc();
            $list_id = $watchlist_data["w_id"];
          ?>
            <div class="col-6 col-lg-4">
              <div class="col-12 text-start ">
                <a href="#" class="text-dark"><i class="fa-regular fa-circle-xmark ms-3 " onclick='removeFromWatchlist(<?php echo $list_id; ?>);'></i></a>
              </div>

              <a href='<?php echo "singaleProduct.php?id=" . ($watchlist_data["product_id"]); ?>' class="link-underline link-underline-opacity-0">
                <div class="p-0">
                  <div class=" card container-fluid   border border-0 row">
                    <div class=" rounded-1  col-12 col-lg-12">
                      <?php
                      $img_rs = Database::search("SELECT * FROM `product_img` WHERE `product_id`='" . $watchlist_data["product_id"] . "'");
                      $img_data = $img_rs->fetch_assoc();
                      ?>
                      <img class=" border border-0  img-thumbnail card-img-top rounded-2  " style="background: #EFEFEF;" src="<?php echo $img_data["img_path"]; ?>" />
                    </div>
                    <div class="row ">
                      <?php
                      $product_rs = Database::search("SELECT * FROM `watchlist` INNER JOIN `product` ON watchlist.product_id=product.id INNER JOIN `category` ON product.category_cat_id=category.cat_id WHERE `product_id`='" . $watchlist_data["product_id"] . "'");
                      $product_num = $product_rs->num_rows;
                      $product_data = $product_rs->fetch_assoc();
                      ?>
                      <div class="col-6 mt-2">
                        <h5 class="names card-title text-dark text-start "><?php echo $product_data["title"]; ?></h5>
                        <p class="names card-subtitle text-dark text-start "><?php echo $product_data["cat_name"]; ?></p>

                      </div>
                      <div class="col-6 mt-2  row">
                        <h5 class="names card-title text-dark text-end ">Rs.<?php echo $product_data["price"]; ?>.00</h5>
                        <div class="col-12 ">

                        </div>
                      </div>


                    </div>



                  </div>
                </div>
              </a>
              <div class="col-12 text-start ms-3 mt-3">
                <button class="text-start btn btn-light btn-lg rounded-5 border border-2 border-secondary " data-bs-toggle="modal" data-bs-target="#exampleModal">Select size</button>


              </div>

            </div>
          <?php
          }
          ?>

        <?php
        }
        ?>


        <!---have products-->

      </div>
    </div>
    <!---have products end-->
  <?php
  }
  ?>



  <!-- Modal -->
  <div class="modal fade modal-dialog modal-lg rounded-2   " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-4  fw-bold " id="exampleModalLabel">Nike Air</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="container-fluid ">
            <div class="row">
              <div class="col-6 col-lg-6">
                <div class="col-12">
                  <img class=" border border-0  img-thumbnail card-img-top rounded-2  " style="background: #EFEFEF;" src="resoerce/shoe/AIR_0_65b5f59cbfef9.png" />
                </div>
              </div>
              <div class="col-6 col-lg-6">
                <div class="row col-12">
                  <span class="text-dark  fw-bold ">Men's shoes</span></br>
                  <span  class="text-dark fw-bold ">Rs. 5600.00</span></br>
                  <span  class="text-dark fw-bold ">Select Size</span>
                  <div class="container-fluid row mt-3 g-1">
                    <div class="col-6 col-lg-6 d-grid mb-1">
                      <input type="radio" class="btn-check" name="options-base" id="1" autocomplete="off" />
                      <label class="btn btn-outline-dark btn-lg " for="1">2</label>
                    </div>
                    <div class="col-6 col-lg-6 d-grid mb-1">
                      <input type="radio" class="btn-check" name="options-base" id="2" autocomplete="off" />
                      <label class="btn btn-outline-dark btn-lg " for="2">3</label>
                    </div>
                    <div class="col-6 col-lg-6 d-grid mb-1">
                      <input type="radio" class="btn-check" name="options-base" id="2" autocomplete="off" />
                      <label class="btn btn-outline-dark btn-lg " for="2">3</label>
                    </div>
                    <div class="col-12 col-lg-12 d-grid mb-1">
                      <button class="btn btn-dark rounded-5 btn-lg">Add to Bag</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>




  <?php
  include "footer.php";
  ?>

  <script src="script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>