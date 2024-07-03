<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Black+Han+Sans&family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="header.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Crimson+Pro&family=Literata">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="b">



<div class="container-fluid col-12 col-lg-12">
  <div class="row col-12 col-lg-12 h-100">

    <div class="banner col-12 col-lg-12 text-center text-dark">Limited Time Offer! Up to 50% OFF on selected styles!<span><a herf="#" class="text-dark fw-bold"> - Shop now</a></span></div>
   
  </div>
</div>



<nav class="navbar navbar-expand-lg bg-body-light">
    <div class="container-fluid">
      <a class="navbar-brand fs-3  fw-bold" style="font-family: Instrument Sans;" href="home.php"><img class="waktalogo"
          src="resoerce/wakta.png" />WAKTA</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto me-auto mb-2 mb-lg-0 justify-content-center">
          <li class="nav-item">
            <a class="nav-link active fs-6 fw-bold" style="font-family: Instrument Sans;" aria-current="page"
              href="home.php">Home</a>
          </li>
          <li class="nav-item ms-2">
            <form class="d-flex me-4 mt-1" role="search">
              <input type="text" class="form-control me-2 rounded-4" placeholder="Search"
                aria-label="Text input with dropdown button" id="basic_search_txt">
              <button type="button" class="btn btn-outline-primary rounded-circle" onclick="basicSearch(0);"><i
                  class="fa-solid fa-magnifying-glass"></i></button>
            </form>

          </li>
          <li class="nav-item">
            <a class="nav-link fs-6 fw-bold" href="women.php">Women</a>
          </li>

          <li class="nav-item">
            <a class="nav-link fs-6  fw-bold" href="mens.php">Men</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fs-6 fw-bold" href="kids.php">Kids</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fs-6 fw-bold" href="#">Sale</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fs-6 fw-bold" href="#">Help & Support</a>
          </li>
        </ul>
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 justify-content-center">
          <li class="nav-item">
            <?php

            

            if (isset($_SESSION["u"])) {
              $data = $_SESSION["u"];
              ?>


              <?php
            } else {
              ?>
              <a class="nav-link fs-6" href="index.php"><i class="fa-solid fa-user"></i> Registr & Sign in</a>
              <?php
            }

            ?>

          </li>
          <li class="nav-item">
            <a class="nav-link fs-6" href="cart.php">
              <i class="fa-solid fa-bag-shopping fa-lg"></i>



            </a>


          </li>
          <li class="nav-item">
            <a class="nav-link fs-6" href="watchlist.php"><i class="fa-solid fa-heart fa-lg"></i></a>
          </li>


          <?php



          if (isset($_SESSION["u"])) {
            $data = $_SESSION["u"];
            $email = $_SESSION["u"]["email"];
            ?>
            <div class="nav-item dropdown dropstart">

              <a class="nav-link dropdown-toggle fs-6" href="#" role="button" data-bs-toggle="dropdown"
                aria-expanded="false"><img src="" class="rounded-circle fs-6" /><b>Hi </b><?php echo $data["fname"] ?></a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="profile.php"><i class="fa-solid fa-user"></i> Profile</a></li>
                <?php
                if ($email == "hashithajagath4@gmail.com") {
                  ?>
                  <li><a class="dropdown-item" href="myproduct.php"><i class="fa-brands fa-product-hunt"></i> Your
                      Products</a></li>
                  <?php
                }
                ?>
                <li><a class="dropdown-item" href="watchlist.php"><i class="fa-solid fa-heart"></i> Favourites</a></li>
                <li><a class="dropdown-item" href="cart.php"><i class="fa-solid fa-cart-shopping"></i> Cart</a></li>
                <li><a class="dropdown-item" href="purchasingHistory.php"><i class="fa-solid fa-box"></i>
                    Orders</a></li>
                <li><a class="dropdown-item" href="#">Help & Support</a></li>

                <li><a class="dropdown-item" href="#" onclick="signout();">Signout</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>

              </ul>
            </div>
            <?php
          } else {
            ?>
            <a class="nav-link fs-6 d-none" href="index.php">Welcome</a>
            <?php
          }

          ?>






      </div>
    </div>
  </nav>













  <script src="script.js"></script>
  
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>