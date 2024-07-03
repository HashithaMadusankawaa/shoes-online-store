<?php
session_start();
include "conection.php";

if (isset($_SESSION["u"])) {
  $email = $_SESSION["u"]["email"];
  $pageno;

?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wakta | Products</title>
    <link rel="icon" href="resoerce/Wakta.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.js"></script>
    <link rel="stylesheet" href="myproduct.css" />
    <link href='https://fonts.googleapis.com/css?family=Instrument Sans' rel='stylesheet'>
  </head>

  <body class="b">

    <nav class="navbar navbar-expand-lg bg-dark" ata-bs-theme="dark">
      <div class="container-fluid">
        <a class="navbar-brand fs-3  fw-bold text-light " style="font-family: Instrument Sans;" href="home.php"><img class="waktalogo" src="resoerce/wakta.png" />WAKTA</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto me-auto mb-2 mb-lg-0 justify-content-center">


            <li class="nav-item">
              <div class="container-fluid">
                <form class="d-flex" role="search">
                  <input class="form-control rounded-4 me-2  col-lg-5" type="search" placeholder="Search" aria-label="Search" id="s">
                  <button class="btn btn-outline-primary rounded-4 text-light " type="submit">Search</button>
                </form>
              </div>
            </li>

          </ul>

          <?php
          $profile_img_rs = Database::search("SELECT * FROM `profile_img` WHERE `user_email`='" . $email . "'");
          $profile_img_num = $profile_img_rs->num_rows;

          if ($profile_img_num == 1) {
            $profile_img_data = $profile_img_rs->fetch_assoc();
          ?>
            <img class="profile rounded-circle img-thumbnail " src="<?php echo $profile_img_data["path"]; ?>" />
          <?php
          } else {
          ?>
            <img class="profile rounded-circle img-thumbnail " src="resoerce/profile.png" />
          <?php
          }

          ?>



          <h5 class="text-light ms-1"> <?php echo $_SESSION["u"]["fname"] . " " . $_SESSION["u"]["lname"]; ?></h5>

        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="col-12 row mt-3 ">
        <div class="col-6 col-lg-6 text-start ">
          <h3 class="text-dark ">Products</h3>
        </div>
        <div class="col-6 col-lg-6 text-end ">
          <a href="addProduct.php"><button class="btn btn-dark ">Add Product</button></a>
        </div>
      </div>
    </div>

    <div class="container mt-3  ">
      <div class="col-12">
        <div class="col-12 navbar navbar-expand-lg nav-underline">
          <div class="col-12 col-lg-12 border border-1 shadow-sm rounded-4 " style="background-color: white;">
            <ul class="navbar-nav justify-content-sm-start ms-2 me-auto  ">
              <li class="nav-item ">
                <a href="#" class="nav-link active ms-2">All</a>
              </li>
              <li class="nav-item ">
                <a href="#" class="nav-link ms-2">Active</a>
              </li>
              <li class="nav-item ">
                <a href="#" class="nav-link ms-2">Draft</a>
              </li>
            </ul>


          </div>


        </div>
      </div>
    </div>

    <div class="container ">
      <div class="col-12 col-lg-12">
        <div class="row">
          <div class="col-12 col-lg-12 ">

            <form class="d-flex" role="search">
              <input class="form-control rounded-4" type="search" placeholder="Search ...." aria-label="Search" id="s">
              
            </form>

          </div>
          <div class="col-6 col-lg-3 ">

            <div class="col  mt-3 ms-1  ">
              <p class="text-secondary ">Active Time</p>
            </div>
            <div class="col-12 col-lg-12 border border-1 shadow-sm rounded-4 " style="background-color: white;">

              <div class="form-check ms-2">
                <input class="form-check-input" type="radio" name="r1" id="n">
                <label class="form-check-label" for="n">
                  Newest to oldest
                </label>
              </div>
              <div class="form-check ms-2">
                <input class="form-check-input" type="radio" name="r1" id="o">
                <label class="form-check-label" for="o">
                  Oldest to newest
                </label>
              </div>
            </div>
          </div>
          <div class="col-6 col-lg-3 ">
            <div class="col  mt-3 ms-1  ">
              <p class="text-secondary ">By quantity</p>
            </div>
            <div class="col-12 col-lg-12 border border-1 shadow-sm rounded-4 " style="background-color: white;">

              <div class="form-check ms-2">
                <input class="form-check-input" type="radio" name="r2" id="h">
                <label class="form-check-label" for="h">
                  High to low
                </label>
              </div>
              <div class="form-check ms-2">
                <input class="form-check-input" type="radio" name="r2" id="l">
                <label class="form-check-label" for="l">
                  Low to high
                </label>
              </div>
            </div>
          </div>
          <div class="col-6 col-lg-3 ">
            <div class="col  mt-3 ms-1  ">
              <p class="text-secondary ">By condition</p>
            </div>
            <div class="col-12 col-lg-12 border border-1 shadow-sm rounded-4 " style="background-color: white;">

              <div class="form-check ms-2">
                <input class="form-check-input" type="radio" name="r3" id="b">
                <label class="form-check-label" for="defaultCheck1">
                  Brandnew
                </label>
              </div>
              <div class="form-check ms-2">
                <input class="form-check-input" type="radio" name="r3" id="u">
                <label class="form-check-label" for="defaultCheck2">
                  Copy
                </label>
              </div>
            </div>
          </div>
          <div class="col-6 col-lg-3 ">
            <div class="row  mt-5">
              <div class="col-12 col-lg-12 text-endd d-grid   "><button class="btn btn-sm btn-primary rounded-3  " onclick="sort1(0);">Sort</button></div>
              <div class="col-12 col-lg-12 text-end d-grid  mt-3 "><button class="btn btn-sm btn-secondary rounded-3  " onclick="clearSort();">Clear</button></div>
            </div>
          </div>

        </div>
      </div>
    </div>



    <div class="container mt-3 ">
      <div class="col-12">

        <table class="table"  id="sort">
          <thead>
            <tr class="table-secondary ">
              <th scope="col">Product</th>
              <th scope="col">Status</th>
              <th scope="col">Inventory</th>
              <th scope="col">Price</th>
            </tr>
          </thead>
          <tbody >
            <?php

            if (isset($_GET["page"])) {
              $pageno = $_GET["page"];
            } else {
              $pageno = 1;
            }

            $product_rs = Database::search("SELECT * FROM `product` WHERE `user_email`='" . $email . "'");
            $product_num = $product_rs->num_rows;

            $results_per_page = 12;
            $number_of_pages = ceil($product_num / $results_per_page);

            $page_results = ($pageno - 1) * $results_per_page;
            $selected_rs = Database::search("SELECT * FROM `product` WHERE `user_email`='" . $email . "' 
                                LIMIT " . $results_per_page . " OFFSET " . $page_results . "");

            $selected_num = $selected_rs->num_rows;
            for ($x = 0; $x < $selected_num; $x++) {
              $selected_data = $selected_rs->fetch_assoc();

            ?>
              <tr>
                <td>
                  <?php
                  $product_img_rs = Database::search("SELECT * FROM `product_img` WHERE `product_id`='" . $selected_data["id"] . "'");
                  $product_img_data = $product_img_rs->fetch_assoc();
                  ?>
                  <div><img class="image rounded-3 img-thumbnail " src="<?php echo $product_img_data["img_path"]; ?>" /> <?php echo $selected_data["title"]; ?><a href="#" class="text-dark"><i class="fa-regular fa-pen-to-square ms-4 " onclick="sendid(<?php echo $selected_data['id']; ?>);"></i></a></div>
                  </th>
                <td>
                  <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="toggle<?php echo $selected_data["id"]; ?>" onchange="changeStatus(<?php echo $selected_data['id']; ?>);" <?php if ($selected_data["status_status_id"] == 2) { ?> checked <?php } ?>>
                    <label class="form-check-label" for="toggle<?php echo $selected_data["id"]; ?>">
                      <?php if ($selected_data["status_status_id"] == 1) { ?>
                        Active
                      <?php } else { ?>
                        Draft
                      <?php } ?>
                    </label>
                  </div>
                </td>
                <td><?php echo $selected_data["qty"]; ?>in stock</td>

                <td>Rs. <?php echo $selected_data["price"]; ?>.00</td>
              </tr>

              
            <?php
            

            }

            ?>

          </tbody>
          

        </table>
        <div class="offset-2 offset-lg-3 col-8 col-lg-6 text-center mb-3">
          <nav aria-label="Page navigation example">
            <ul class="pagination  justify-content-center">
              <li class="page-item">
                <a class="page-link" href="
                                                <?php if ($pageno <= 1) {
                                                  echo ("#");
                                                } else {
                                                  echo "?page=" . ($pageno - 1);
                                                } ?>
                                                " aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                </a>
              </li>

              <?php
              for ($x = 1; $x <= $number_of_pages; $x++) {
                if ($x == $pageno) {
              ?>
                  <li class="page-item active">
                    <a class="page-link" href="<?php echo "?page=" . ($x); ?>"><?php echo $x; ?></a>
                  </li>
                <?php
                } else {
                ?>
                  <li class="page-item">
                    <a class="page-link" href="<?php echo "?page=" . ($x); ?>"><?php echo $x; ?></a>
                  </li>
              <?php
                }
              }
              ?>

              <li class="page-item">
                <a class="page-link" href="
                                                <?php if ($pageno >= $number_of_pages) {
                                                  echo ("#");
                                                } else {
                                                  echo "?page=" . ($pageno + 1);
                                                } ?>
                                                " aria-label="Next">
                  <span aria-hidden="true">&raquo;</span>
                </a>
              </li>
            </ul>
          </nav>
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
<?php
} else {
  header("Location: index.php");
}

?>