<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Women's shoes | WAKTA</title>
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
  <link rel="stylesheet" href="category.css" />
  <link rel="stylesheet" href="header.css" />
  <link href='https://fonts.googleapis.com/css?family=Instrument Sans' rel='stylesheet'>

</head>

<body>
  <?php
  include "conection.php";
  ?>
  <?php

  include "header.php";

  ?>

  <!--casuval-->
  <div class="col-12 container-fluid">
    <img class="img-fluid" src="resoerce\Untitled design (1).png" />
  </div>

  <div class="col-12 container">

  </div>

  <div class="container-fluid ">
    <div class="row">
      <div class="col-6 col-lg-6">
        <?php
        $package_rs = Database::search("SELECT COUNT(`id`) AS count FROM `product` WHERE `category_cat_id`='2' AND `status_status_id`='1'");

        // Fetch the result as an associative array
        $package_data = $package_rs->fetch_assoc();

        // Extract the count value from the associative array
        $package_count = $package_data['count'];
        ?>
        <h5 class="gm  text-black fs-4  text-start mt-5 ">Women's Sneakers & Shoes (<?php echo $package_count ?>)</h5>

        <div class="container-fluid col-12">

        </div>
      </div>
      <div class="sm col-4 col-lg-2 offset-lg-4 offset-2 text-end ">
        <select
          class="sm form-select fw-bold fs-6 focus-ring focus-ring-light form-select-sm mt-5 rounded-3 border border-0"
          aria-label="Small select example" id="sortby" onchange="filter()">
          <option selected disabled class="se "> Sort By</option>
          <option value="1" class="se">Newest</option>
          <option value="2" class="se">Price: High-Low</option>
          <option value="3" class="se">Price: Low-High</option>
        </select>
      </div>
    </div>
  </div>

  <div class="container-fluid row">
    <div class="col-lg-2 d-none d-sm-block mt-3 overflow-y-auto h-auto">
      <?php
      $model_rs = Database::search("SELECT * FROM `model`");
      $model_num = $model_rs->num_rows;
      for ($i = 0; $i < $model_num; $i++) {
        $model_data = $model_rs->fetch_assoc();

        ?>
        <a href="#" class="gm text-dark link-underline link-underline-opacity-0">
          <h5 class=" ms-4 "><?php echo $model_data["model_name"] ?></h5>
        </a>
        <?php

      }
      ?>





      <hr />

      <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item ">
          <h2 class="accordion-header ">
            <button class="fs-6 fw-bold bg-light-subtle accordion-button collapsed focus-ring focus-ring-light "
              type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false"
              aria-controls="flush-collapseOne">
              Sale & Offers
            </button>
          </h2>
          <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
              <div class="form-check ">
                <input class="form-check-input focus-ring focus-ring-light bg-dark" type="checkbox" value="" id="s"
                  onchange="adfilter(0);">
                <label class="se form-check-label" for="s">
                  Sale
                </label>
              </div>
            </div>
          </div>
        </div>

        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="fs-6 fw-bold bg-light-subtle accordion-button collapsed focus-ring focus-ring-light "
              type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false"
              aria-controls="flush-collapseTwo">
              Gender
            </button>
          </h2>
          <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
              <div class="form-check">
                <input class="form-check-input focus-ring focus-ring-light bg-dark" type="radio" name="flexRadioDefault1"
                  id="m" onclick="filterProducts()">
                <label class="form-check-label" for="m">
                  Men
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input focus-ring focus-ring-light bg-dark" type="radio" name="flexRadioDefault1"
                  id="w" onclick="filterProducts()">
                <label class="form-check-label" for="w">
                  Women
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input focus-ring focus-ring-light bg-dark" type="radio" name="flexRadioDefault1"
                  id="k" onclick="filterProducts()">
                <label class="form-check-label" for="k">
                  Kids
                </label>
              </div>

            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="fs-6 fw-bold bg-light-subtle accordion-button collapsed focus-ring focus-ring-light "
              type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false"
              aria-controls="flush-collapseThree">
              Color
            </button>
          </h2>
          <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
              
              <div class="form-check ">
                <input class="form-check-input focus-ring focus-ring-light " style="background-color: red;" type="radio"
                  name="flexRadioDefault2" id="red" onchange="adfilter(0);">
                <label class="se form-check-label" for="red">
                  Red
                </label>
              </div>
              <div class="form-check ">
                <input class="form-check-input focus-ring focus-ring-light " style="background-color: blue;"
                  type="radio" id="blue" name="flexRadioDefault2" onchange="adfilter(0);">
                <label class="se form-check-label" for="blue">
                  Blue
                </label>
              </div>
              <div class="form-check ">
                <input class="form-check-input focus-ring focus-ring-light " style="background-color: green;"
                  type="radio" id="green" name="flexRadioDefault2" onchange="adfilter(0);">
                <label class="se form-check-label" for="green">
                  Green
                </label>
              </div>
              <div class="form-check ">
                <input class="form-check-input focus-ring focus-ring-light " style="background-color: yellow;"
                  type="radio" id="yellow" name="flexRadioDefault2" onchange="adfilter(0);">
                <label class="se form-check-label" for="yellow">
                  Yellow
                </label>
              </div>
              <div class="form-check ">
                <input class="form-check-input focus-ring focus-ring-light " style="background-color: brown;"
                  type="radio" name="flexRadioDefault2" id="brown" onchange="adfilter(0);">
                <label class="se form-check-label" for="brown">
                  Brown
                </label>
              </div>
              <div class="form-check ">
                <input class="form-check-input focus-ring focus-ring-light" style="background-color: gray;" type="radio"
                  name="flexRadioDefault2" id="grey" onchange="adfilter(0);">
                <label class="se form-check-label" for="grey">
                  Grey
                </label>
              </div>
              <div class="form-check ">
                <input class="form-check-input focus-ring focus-ring-light " style="background-color: pink;"
                  type="radio" name="flexRadioDefault2" id="pink" onchange="adfilter(0);">
                <label class="se form-check-label" for="pink">
                  Pink
                </label>
              </div>
              <div class="form-check ">
                <input class="form-check-input focus-ring focus-ring-light " style="background-color: orange;"
                  type="radio" name="flexRadioDefault2" id="orange" onchange="adfilter(0);">
                <label class="se form-check-label" for="orange">
                  Orange
                </label>
              </div>
              <div class="form-check ">
                <input class="form-check-input focus-ring focus-ring-light " type="radio" name="flexRadioDefault2"
                  id="white" onchange="adfilter(0);">
                <label class="se form-check-label" for="white">
                  White
                </label>
              </div>
              <div class="form-check ">
                <input class="form-check-input focus-ring focus-ring-light" style="background-color: Multi-Color;"
                  type="radio" name="flexRadioDefault2" id="mc" onchange="adfilter(0);">
                <label class="se form-check-label" for="mc">
                  Multi-Color
                </label>
              </div>
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="fs-6 fw-bold bg-light-subtle accordion-button collapsed focus-ring focus-ring-light "
              type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree1" aria-expanded="false"
              aria-controls="flush-collapseThree1">
              Shop by Price
            </button>
          </h2>
          <div id="flush-collapseThree1" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
              <div class="form-check ">
                <input class="form-check-input focus-ring focus-ring-light bg-dark" type="checkbox" value="" id="p"
                  onchange="adfilter(0);">
                <label class="se form-check-label" for="p">
                  Rs.0 - Rs.1500
                </label>
              </div>
              <div class="form-check ">
                <input class="form-check-input focus-ring focus-ring-light bg-dark" type="checkbox" value="" id="p1"
                  onchange="adfilter(0);">
                <label class="se form-check-label" for="p1">
                  Rs.1500 - Rs.2500
                </label>
              </div>
              <div class="form-check ">
                <input class="form-check-input focus-ring focus-ring-light bg-dark" type="checkbox" value="" id="p2"
                  onchange="adfilter(0);">
                <label class="se form-check-label" for="p2">
                  Rs.2500 - Rs.4500
                </label>
              </div>
              <div class="form-check ">
                <input class="form-check-input focus-ring focus-ring-light bg-dark" type="checkbox" value="" id="p3"
                  onchange="adfilter(0);">
                <label class="se form-check-label" for="p3">
                  Rs.4500 - Rs.10000
                </label>
              </div>
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="fs-6 fw-bold bg-light-subtle accordion-button collapsed focus-ring focus-ring-light "
              type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree5" aria-expanded="false"
              aria-controls="flush-collapseThree5">
              Size
            </button>
          </h2>
          <div id="flush-collapseThree5" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
              <?php
              $size_rs = Database::search("SELECT DISTINCT `size` FROM `size` INNER JOIN `product` ON size.product_id = product.id WHERE `category_cat_id` = '2'");
              $size_num = $size_rs->num_rows;

              for ($i = 0; $i < $size_num; $i++) {
                $size_data = $size_rs->fetch_assoc();

                ?>
                <div class="form-check ">
                  <input class="form-check-input focus-ring focus-ring-light bg-dark" id="size" type="checkbox"
                    value="<?php echo $size_data["size"] ?>" onchange="adfilter(0);">
                  <label class="se form-check-label">
                    <?php echo $size_data["size"] ?>
                  </label>
                </div>
                <?php
              }
              ?>


            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="fs-6 fw-bold bg-light-subtle accordion-button collapsed focus-ring focus-ring-light "
              type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree6" aria-expanded="false"
              aria-controls="flush-collapseThree6">
              Brand
            </button>
          </h2>
          <div id="flush-collapseThree6" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
              <div class="form-check ">
                <input class="form-check-input focus-ring focus-ring-light bg-dark" type="checkbox" value="" id="nike"
                  onchange="adfilter(0);">
                <label class="se form-check-label" for="nike">
                  Nike
                </label>
              </div>
              <div class="form-check ">
                <input class="form-check-input focus-ring focus-ring-light bg-dark" type="checkbox" value="" id="add"
                  onchange="adfilter(0);">
                <label class="se form-check-label" for="add">
                  Addidas
                </label>
              </div>
              <div class="form-check ">
                <input class="form-check-input focus-ring focus-ring-light bg-dark" type="checkbox" value="" id="kadam"
                  onchange="adfilter(0);">
                <label class="se form-check-label" for="kadam">
                  Kadam
                </label>
              </div>
              <div class="form-check ">
                <input class="form-check-input focus-ring focus-ring-light bg-dark" type="checkbox" value="" id="adulla"
                  onchange="adfilter(0);">
                <label class="se form-check-label" for="adulla">
                  Adulla
                </label>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
    <div class="d-sm-none"> <!-- This div is hidden on sm and larger devices -->

      <button class="btn btn-dark btn-sm rounded-4 col-12 mt-4 mb-4" type="button" data-bs-toggle="offcanvas"
        data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
        Filter <i class="fa-solid fa-arrow-up-wide-short" style="color: #ffffff;"></i>
      </button>

      <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample"
        aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasExampleLabel">Filter</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <h5 class="gm ms-4 ">life style</h5>
          <h5 class="gm ms-4 ">combot</h5>
          <h5 class="gm ms-4 ">snakers</h5>
          <h5 class="gm ms-4 ">heels</h5>

          <hr />

          <div class="accordion accordion-flush" id="accordionFlushExample">
            <div class="accordion-item ">
              <h2 class="accordion-header ">
                <button class="fs-6 fw-bold bg-light-subtle accordion-button collapsed focus-ring focus-ring-light "
                  type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false"
                  aria-controls="flush-collapseOne">
                  Sale & Offers
                </button>
              </h2>
              <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                  <div class="form-check ">
                    <input class="form-check-input focus-ring focus-ring-light bg-dark" type="checkbox" value=""
                      id="flexCheckIndeterminate">
                    <label class="se form-check-label" for="flexCheckIndeterminate">
                      Sale
                    </label>
                  </div>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="fs-6 fw-bold bg-light-subtle accordion-button collapsed focus-ring focus-ring-light "
                  type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false"
                  aria-controls="flush-collapseTwo">
                  Gender
                </button>
              </h2>
              <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                  <div class="form-check ">
                    <input class="form-check-input focus-ring focus-ring-light bg-dark" type="checkbox" value=""
                      id="flexCheckIndeterminate">
                    <label class="se form-check-label" for="flexCheckIndeterminate">
                      Men
                    </label>
                  </div>
                  <div class="form-check ">
                    <input class="form-check-input focus-ring focus-ring-light bg-dark" type="checkbox" value=""
                      id="flexCheckIndeterminate">
                    <label class="se form-check-label" for="flexCheckIndeterminate">
                      Women
                    </label>
                  </div>
                  <div class="form-check ">
                    <input class="form-check-input focus-ring focus-ring-light bg-dark" type="checkbox" value=""
                      id="flexCheckIndeterminate">
                    <label class="se form-check-label" for="flexCheckIndeterminate">
                      Kids
                    </label>
                  </div>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="fs-6 fw-bold bg-light-subtle accordion-button collapsed focus-ring focus-ring-light "
                  type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false"
                  aria-controls="flush-collapseThree">
                  Color
                </button>
              </h2>
              <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                  <div class="form-check ">
                    <input class="form-check-input focus-ring focus-ring-light bg-dark" type="checkbox" value=""
                      id="flexCheckIndeterminate">
                    <label class="se form-check-label" for="flexCheckIndeterminate">
                      Red
                    </label>
                  </div>
                  <div class="form-check ">
                    <input class="form-check-input focus-ring focus-ring-light bg-dark" type="checkbox" value=""
                      id="flexCheckIndeterminate">
                    <label class="se form-check-label" for="flexCheckIndeterminate">
                      Blue
                    </label>
                  </div>
                  <div class="form-check ">
                    <input class="form-check-input focus-ring focus-ring-light bg-dark" type="checkbox" value=""
                      id="flexCheckIndeterminate">
                    <label class="se form-check-label" for="flexCheckIndeterminate">
                      Green
                    </label>
                  </div>
                  <div class="form-check ">
                    <input class="form-check-input focus-ring focus-ring-light bg-dark" type="checkbox" value=""
                      id="flexCheckIndeterminate">
                    <label class="se form-check-label" for="flexCheckIndeterminate">
                      Yellow
                    </label>
                  </div>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="fs-6 fw-bold bg-light-subtle accordion-button collapsed focus-ring focus-ring-light "
                  type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree1" aria-expanded="false"
                  aria-controls="flush-collapseThree1">
                  Shop by Price
                </button>
              </h2>
              <div id="flush-collapseThree1" class="accordion-collapse collapse"
                data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                  <div class="form-check ">
                    <input class="form-check-input focus-ring focus-ring-light bg-dark" type="checkbox" value=""
                      id="flexCheckIndeterminate">
                    <label class="se form-check-label" for="flexCheckIndeterminate">
                      Rs.0 - Rs.1500
                    </label>
                  </div>
                  <div class="form-check ">
                    <input class="form-check-input focus-ring focus-ring-light bg-dark" type="checkbox" value=""
                      id="flexCheckIndeterminate">
                    <label class="se form-check-label" for="flexCheckIndeterminate">
                      Rs.1500 - Rs.2500
                    </label>
                  </div>
                  <div class="form-check ">
                    <input class="form-check-input focus-ring focus-ring-light bg-dark" type="checkbox" value=""
                      id="flexCheckIndeterminate">
                    <label class="se form-check-label" for="flexCheckIndeterminate">
                      Rs.2500 - Rs.4500
                    </label>
                  </div>
                  <div class="form-check ">
                    <input class="form-check-input focus-ring focus-ring-light bg-dark" type="checkbox" value=""
                      id="flexCheckIndeterminate">
                    <label class="se form-check-label" for="flexCheckIndeterminate">
                      Rs.4500 - Rs.10000
                    </label>
                  </div>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="fs-6 fw-bold bg-light-subtle accordion-button collapsed focus-ring focus-ring-light "
                  type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree5" aria-expanded="false"
                  aria-controls="flush-collapseThree5">
                  Size
                </button>
              </h2>
              <div id="flush-collapseThree5" class="accordion-collapse collapse"
                data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                  <div class="form-check ">
                    <input class="form-check-input focus-ring focus-ring-light bg-dark" type="checkbox" value=""
                      id="flexCheckIndeterminate">
                    <label class="se form-check-label" for="flexCheckIndeterminate">
                      40
                    </label>
                  </div>
                  <div class="form-check ">
                    <input class="form-check-input focus-ring focus-ring-light bg-dark" type="checkbox" value=""
                      id="flexCheckIndeterminate">
                    <label class="se form-check-label" for="flexCheckIndeterminate">
                      41
                    </label>
                  </div>
                  <div class="form-check ">
                    <input class="form-check-input focus-ring focus-ring-light bg-dark" type="checkbox" value=""
                      id="flexCheckIndeterminate">
                    <label class="se form-check-label" for="flexCheckIndeterminate">
                      42
                    </label>
                  </div>
                  <div class="form-check ">
                    <input class="form-check-input focus-ring focus-ring-light bg-dark" type="checkbox" value=""
                      id="flexCheckIndeterminate">
                    <label class="se form-check-label" for="flexCheckIndeterminate">
                      43
                    </label>
                  </div>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="fs-6 fw-bold bg-light-subtle accordion-button collapsed focus-ring focus-ring-light "
                  type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree6" aria-expanded="false"
                  aria-controls="flush-collapseThree6">
                  Brand
                </button>
              </h2>
              <div id="flush-collapseThree6" class="accordion-collapse collapse"
                data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                  <div class="form-check ">
                    <input class="form-check-input focus-ring focus-ring-light bg-dark" type="checkbox" value=""
                      id="flexCheckIndeterminate">
                    <label class="se form-check-label" for="flexCheckIndeterminate">
                      Nike
                    </label>
                  </div>
                  <div class="form-check ">
                    <input class="form-check-input focus-ring focus-ring-light bg-dark" type="checkbox" value=""
                      id="flexCheckIndeterminate">
                    <label class="se form-check-label" for="flexCheckIndeterminate">
                      Addidas
                    </label>
                  </div>
                  <div class="form-check ">
                    <input class="form-check-input focus-ring focus-ring-light bg-dark" type="checkbox" value=""
                      id="flexCheckIndeterminate">
                    <label class="se form-check-label" for="flexCheckIndeterminate">
                      Kadam
                    </label>
                  </div>
                  <div class="form-check ">
                    <input class="form-check-input focus-ring focus-ring-light bg-dark" type="checkbox" value=""
                      id="flexCheckIndeterminate">
                    <label class="se form-check-label" for="flexCheckIndeterminate">
                      Adulla
                    </label>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <button class="btn btn-dark btn-sm rounded-4 col-12 mt-4 mb-4" type="button">
            Filter <i class="fa-solid fa-arrow-up-wide-short" style="color: #ffffff;"></i>
          </button>

        </div>
      </div>
    </div>
    <div class="col-12 col-lg-10 p-1">
      <?php

      $category_rs = Database::search("SELECT*FROM `category` WHERE `cat_id`= '2'");
      $category_num = $category_rs->num_rows;

      for ($x = 0; $x < $category_num; $x++) {

        $category_data = $category_rs->fetch_assoc();

        ?>


        <div class="container-fluid col-12  " id="product-list3">
          <div class="row g-2" id="product-list">


            <?php

            $product_rs = Database::search("SELECT*FROM `product` WHERE `status_status_id` = '1' AND `category_cat_id` = '" . $category_data["cat_id"] . "' ORDER BY `datetime_added` ");
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



        <?php

      }

      ?>
    </div>
  </div>
  <!--category start-->




  <script src="script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
</body>

</html>