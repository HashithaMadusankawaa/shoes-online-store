<?php
include 'header.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="resoerce/wakta.png"/>
  <title>WAKTA SHOES | Your Profile</title>
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.js"></script>
  <link rel="stylesheet" href="profile.css" />
  <link href='https://fonts.googleapis.com/css?family=Instrument Sans' rel='stylesheet'>
</head>

<body class="b">




  <?php

  include "conection.php";

  if (isset($_SESSION["u"])) {
    $email = $_SESSION["u"]["email"];

    $details_rs = Database::search("SELECT * FROM `user` INNER JOIN `gender` ON 
                user.gender_gender_id=gender.gender_id WHERE `email`='" . $email . "'");

    $image_rs = Database::search("SELECT * FROM `profile_img` WHERE `user_email`='" . $email . "'");

    $address_rs = Database::search("SELECT * FROM `user_has_address` INNER JOIN `city` ON 
                user_has_address.city_city_id=city.city_id INNER JOIN `district` ON 
                city.district_district_id=district.district_id INNER JOIN `province` ON 
                district.province_province_id=province.province_id WHERE `user_email`='" . $email . "'");

    $user_details = $details_rs->fetch_assoc();
    $image_details = $image_rs->fetch_assoc();
    $address_details = $address_rs->fetch_assoc();


    ?>


    <div class="container-fluid ">

      <div class="container-fluid">
        <div class="col">
          <ul class="nav nav-underline justify-content-center">
            <li class="nav-item">
              <a class="nav-link link-dark fs-5 active" href="profile.php"  >Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link  link-dark fs-5" href="watchlist.php">Favourites</a>
            </li>
            <li class="nav-item">
              <a class="nav-link link-dark fs-5 " href="cart.php">Cart</a>
            <li class="nav-item">
              <a class="nav-link link-dark fs-5 " href="purchasingHistory.php">Orders</a>
            </li>

          </ul>
        </div>
      </div>


      <div class="container-fluid mt-5 ">
        <div class="col-12 col-lg-12">
          <div class="row">

            <div class="col-4 col-lg-2 text-end ">
              <?php
              $image_rs = Database::search("SELECT * FROM `profile_img` WHERE `user_email`='" . $email . "'");
              $image_details = $image_rs->fetch_assoc();
              if (empty($image_details["path"])) {
                ?>
                <img class="img-fluid rounded-circle w-50" src="resoerce/profile.png" id="img" />
                <?php
              } else {
                ?>
                <img class="img-fluid rounded-circle w-50" src="<?php echo $image_details["path"]; ?>" id="img" />
                <?php
              }
              ?>

            </div>
            <div class="col-8 col-lg-10 text-start ">
              <?php
              if (isset($_SESSION["u"])) {
                $data = $_SESSION["u"];
                $email = $_SESSION["u"]["email"];
                $details_rs = Database::search("SELECT * FROM `user` INNER JOIN `gender` ON 
                user.gender_gender_id = gender.gender_id WHERE `email`='" . $email . "'");
                ?>
                <h1 class="text-black">
                  <?php echo $data["fname"] . " " . $data["lname"]; ?>
                </h1>
                <?php
              }
              ?>

              <p>
                <?php echo $email; ?>
              </p>
              <input type="file" class="d-none" id="profileimage" />
              <label for="profileimage" class="btn btn-outline-light border border-1 text-dark rounded-4 "
                onclick="changeProfileImg();">Change Profile Image</label>
            </div>
          </div>
        </div>
      </div>

      <div class="container mt-5 ">
        <div class="col-12 col-lg-8 offset-lg-2 ">
          <form>
            <div class="row">
              
              <div class="mb-3 col-12 col-lg-6">
                <label for="fname" class="form-label">First Name</label>
                <input id="fname" type="text" class="form-control" value="<?php echo $user_details["fname"]; ?>" />
              </div>
              <div class="mb-3 col-12 col-lg-6">
                <label for="lname" class="form-label">Last Name</label>
                <input id="lname" type="text" class="form-control" value="<?php echo $user_details["lname"]; ?>" />
                  
              </div>
            </div>
            <div class="mb-3">
              <label for="mobile" class="form-label">Mobile</label>
              <input id="mobile" type="text" class="form-control" value="<?php echo $user_details["mobile"]; ?>" />
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <div class="input-group">
                <input type="password" class="form-control" aria-label="Text input with radio button"
                  value="<?php echo $user_details["password"]; ?>" readonly />
                <div class="input-group-text">
                  <i class="fa-solid fa-eye-slash"></i>
                </div>

              </div>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" readonly value="<?php echo $user_details["email"]; ?>"
                aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="Registered" class="form-label">Registered Date</label>
              <input type="datetime" class="form-control" id="Registered" readonly
                value="<?php echo $user_details["joined_date"]; ?>" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="address" class="form-label">Address Line 01</label>
              <?php
              if (empty($address_details["line1"])) {
                ?>
                <input id="line1" type="text" class="form-control" />
                <?php
              } else {
                ?>
                <input id="line1" type="text" class="form-control" value="<?php echo $address_details["line1"]; ?>" />
                <?php
              }
              ?>
            </div>
            <div class="mb-3">
              <label for="address1" class="form-label">Address Line 02</label>
              <?php
              if (empty($address_details["line2"])) {
                ?>
                <input id="line2" type="text" class="form-control" />
                <?php
              } else {
                ?>
                <input id="line2" type="text" class="form-control" value="<?php echo $address_details["line2"]; ?>" />
                <?php
              }
              ?>
            </div>

            <?php
            $province_rs = Database::search("SELECT * FROM `province`");
            $district_rs = Database::search("SELECT * FROM `district`");
            $city_rs = Database::search("SELECT * FROM `city`");
            ?>
            <div class="mb-3 row">
              <div class="col-12 col-lg-6">
                <label for="Province" class="form-label">Province</label>
                <select class="form-select" aria-label="Default select example" id="province">
                  <option selected>Select Province</option>
                  <?php
                  for ($x = 0; $x < $province_rs->num_rows; $x++) {
                    $province_data = $province_rs->fetch_assoc();
                    ?>
                    <option value="<?php echo $province_data["province_id"]; ?>" <?php
                       if (!empty($address_details["province_id"])) {
                         if ($province_data["province_id"] == $address_details["province_id"]) {
                           ?>selected<?php
                         }
                       }
                       ?>>
                      <?php echo $province_data["province_name"]; ?>
                    </option>
                    <?php
                  }
                  ?>
                </select>
              </div>
              <div class="col-12 col-lg-6">
                <label for="District" class="form-label">District</label>
                <select class="form-select" aria-label="Default select example" id="district">
                  <option selected>Select District</option>
                  <?php
                  for ($x = 0; $x < $district_rs->num_rows; $x++) {
                    $district_data = $district_rs->fetch_assoc();
                    ?>
                    <option value="<?php echo $district_data["district_id"]; ?>" <?php
                       if (!empty($address_details["district_id"])) {
                         if ($district_data["district_id"] == $address_details["district_id"]) {
                           ?>selected<?php
                         }
                       }
                       ?>>
                      <?php echo $district_data["district_name"]; ?>
                    </option>
                    <?php
                  }
                  ?>
                </select>
              </div>
              <div class="col-12 col-lg-6">
                <label for="City" class="form-label">City</label>
                <select class="form-select" aria-label="Default select example" id="city">
                  <option selected>Select City</option>
                  <?php
                  for ($x = 0; $x < $city_rs->num_rows; $x++) {
                    $city_data = $city_rs->fetch_assoc();
                    ?>
                    <option value="<?php echo $city_data["city_id"]; ?>" <?php
                       if (!empty($address_details["city_id"])) {
                         if ($city_data["city_id"] == $address_details["city_id"]) {
                           ?>selected<?php
                         }
                       }
                       ?>>
                      <?php echo $city_data["city_name"]; ?>
                    </option>
                    <?php
                  }
                  ?>
                </select>
              </div>
              <div class="col-12 col-lg-6">
                <label for="postal" class="form-label">Postal Code</label>
                <?php
                if (empty($address_details["postal_code"])) {
                  ?>
                  <input id="pcode" type="text" class="form-control" />
                  <?php
                } else {
                  ?>
                  <input id="pcode" type="text" class="form-control"
                    value="<?php echo $address_details["postal_code"]; ?>" />
                  <?php
                }
                ?>
              </div>
              <div class="col-12 col-lg-12">
                <label for="gender" class="form-label">Gender</label>
                <input type="text" class="form-control" value="<?php echo $user_details["gender_name"]; ?>" readonly />
              </div>

              <div class="col-12 d-grid mt-4">
                <button class="btn btn-primary" onclick="updateProfile();">Update My Profile</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <?php
  }else{
    ?>

    <script>
        window.location = "index.php";
    </script>

    <?php
  }



  ?>





  <?php

  include 'footer.php';
  ?>

  <script src="script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
</body>

</html>