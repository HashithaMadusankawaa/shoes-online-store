<?php

include ("conection.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Wakta Shoes | Home</title>
  <link rel="icon" href="resoerce/Wakta.png" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.js"></script>
  <link rel="stylesheet" href="home.css" />
  <link rel="stylesheet" href="header.css" />
  <link href='https://fonts.googleapis.com/css?family=Instrument Sans' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Chela+One&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">




</head>

<body>

 <?php 
 
 include "header.php";
 
 ?>


  <!----- testing --->








  <div class="col-12" id="basicSearchResult">





    <div id="carouselExampleAutoplaying" class="carousel slide border border-3 border-black rounded-3 m-3"
      data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="resoerce/6_19_2024 10_12_44 AM.png" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <button class="btn btn-light ">Shop now</button>
          </div>
        </div>
        <div class="carousel-item">
          <a herf=""><img src="resoerce/6_19_2024 10_12_26 AM.png" class="d-block w-100" alt="..."></a>
        </div>
        <div class="carousel-item">
          <img src="resoerce/nike-just-do-it (1).jpg" class="d-block w-100" alt="...">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>



    <div class="container-fluid">
      <div class="row">
        <div class="col-12 col-lg-12 mt-3 mb-3">
          <h2 class="arr text-dark ms-1 text-center fs-1">Shop New Arrivals</h2>
        </div>


        <!--- product insert php--->

        <div class="container-fluid  text-center">
          <div class="row g-2">

            <?php

            $product_rs = Database::search("SELECT*FROM `product` WHERE `status_status_id` = '1' ORDER BY `datetime_added` DESC LIMIT 4 OFFSET 0 ");
            $product_num = $product_rs->num_rows;

            for ($z = 0; $z < $product_num; $z++) {
              $product_data = $product_rs->fetch_assoc();

              ?>

            <div class="col-6 col-lg-3">
              <div class="p-0">
                <a href='<?php echo "singaleProduct.php?id=" . ($product_data["id"]); ?>'
                  class="link-underline link-underline-opacity-0">
                  <div class=" card container-fluid   border border-0 row">
                    <div class="col-12 col-lg-12">

                      <?php

                      $img_rs = Database::search("SELECT*FROM `product_img` WHERE `product_id` = '" . $product_data["id"] . "'");
                      $img_data = $img_rs->fetch_assoc();

                      ?>

                      <img class="border border-0 img-thumbnail card-img-top rounded-2 " style="background: #EFEFEF;"
                        src="<?php echo $img_data["img_path"]; ?>" />
                    </div>
                    <div class="col-12 col-lg-12 text-start ms-3 mt-2 ">
                      <h4 class="names card-title text-dark ">
                        <?php echo $product_data["title"]; ?>
                      </h4>

                      <?php

                      $category_rs = Database::search("SELECT*FROM `category` WHERE `cat_id` = '" . $product_data["category_cat_id"] . "'");
                      $category_data = $category_rs->fetch_assoc();

                      ?>

                      <p class="names card-subtitle text-dark">
                        <?php echo $category_data["cat_name"]; ?>
                      </p>

                      <h4 class="names card-title text-dark ">Rs.
                        <?php echo $product_data["price"]; ?>.00
                      </h4>
                    </div>

                  </div>
                </a>
              </div>
            </div>

            <?php

            }



            ?>



          </div>
        </div>

      </div>
    </div>

    
  </div>

  <h1 class="arr text-center mt-5 mb-3 col-12 col-lg-4 offset-lg-4 bg-dark rounded-5 text-light">TYPES OF SHOES</h1>

  <!--type shoes-->

  


  <!--category start-->
  <?php

  $category_rs = Database::search("SELECT*FROM `category`");
  $category_num = $category_rs->num_rows;

  for ($x = 0; $x < $category_num; $x++) {

    $category_data = $category_rs->fetch_assoc();

    ?>

    <div class="container-fluid">
      <div class="row">
        <div class="col-12 col-lg-12">
          <h2 class="arr fs-1 text-dark  text-center mt-3 mb-3">
            <?php echo $category_data["cat_name"]; ?>
          </h2>
        </div>


        <!--- product insert php--->




      <div class="container-fluid  text-center ">
        <div class="row g-2">


          <?php

          $product_rs = Database::search("SELECT*FROM `product` WHERE `status_status_id` = '1' AND `category_cat_id` = '" . $category_data["cat_id"] . "' ORDER BY `datetime_added` DESC LIMIT 4 OFFSET 0 ");
          $product_num = $product_rs->num_rows;

          for ($z = 0; $z < $product_num; $z++) {
            $product_data = $product_rs->fetch_assoc();

            ?>

          <div class="col-6 col-lg-3">
            <a href='<?php echo "singaleProduct.php?id=" . ($product_data["id"]); ?>'
              class="link-underline link-underline-opacity-0">
              <div class="p-0">
                <div class=" card container-fluid   border border-0 row">
                  <div class=" rounded-1  col-12 col-lg-12">

                    <?php

                    $img_rs = Database::search("SELECT*FROM `product_img` WHERE `product_id` = '" . $product_data["id"] . "'");
                    $img_data = $img_rs->fetch_assoc();

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
      </div>


    </div>
  </div>

  <?php

  }

  ?>


  <!-- Search Modal -->








  <!---category end-->

  <!----Explore More-->


  </div>




  <!----->


  <?php
  include ("footer.php");
  ?>


  <script src="script.js"></script>
 
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
</body>

</html>