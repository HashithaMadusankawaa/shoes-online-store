<?php
if (!isset($_GET["pid"])) {
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title>Pages / Not Found 404 - NiceAdmin Bootstrap Template</title>
        <meta content="" name="description">
        <meta content="" name="keywords">

        <!-- Favicons -->
        <link href="assets/img/wakta.png" rel="icon">
        <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.gstatic.com" rel="preconnect">
        <link
            href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
            rel="stylesheet">

        <!-- Vendor CSS Files -->
        <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
        <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
        <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
        <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
        <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

        <!-- Template Main CSS File -->
        <link href="assets/css/admin.css" rel="stylesheet">

        <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Jan 29 2024 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
    </head>

    <body>

        <main>
            <div class="container">

                <section class="section error-404 min-vh-100 d-flex flex-column align-items-center justify-content-center">
                    <h1>404</h1>
                    <h2>The page you are looking for doesn't exist.</h2>
                    <a class="btn" href="index.php">Back to home</a>
                    <img src="assets/img/not-found.svg" class="img-fluid py-5" alt="Page Not Found">
                    <div class="credits">
                        <!-- All the links in the footer should remain intact. -->
                        <!-- You can delete the links only if you purchased the pro version. -->
                        <!-- Licensing information: https://bootstrapmade.com/license/ -->
                        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                    </div>
                </section>

            </div>
        </main><!-- End #main -->

        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
                class="bi bi-arrow-up-short"></i></a>

        <!-- Vendor JS Files -->
        <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
        <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/vendor/chart.js/chart.umd.js"></script>
        <script src="assets/vendor/echarts/echarts.min.js"></script>
        <script src="assets/vendor/quill/quill.min.js"></script>
        <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
        <script src="assets/vendor/tinymce/tinymce.min.js"></script>
        <script src="assets/vendor/php-email-form/validate.js"></script>

        <!-- Template Main JS File -->
        <script src="main.js"></script>

    </body>

    </html>
    <?php
} else {
    $pid = $_GET["pid"];
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Your - Place Order | WAKTA SHOES</title>
        <link rel="icon" href="resoerce/Wakta.png" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
            integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.js"></script>
        <link rel="stylesheet" href="shipping.css" />
        <link href='https://fonts.googleapis.com/css?family=Instrument Sans' rel='stylesheet'>
    </head>

    <body class="b">
        <?php
        include "header.php";
        include "conection.php";
        ?>

        <div class="col-12" id="basicSearchResult"></div>

        <?php

        if (isset($_SESSION["u"])) {
            $user = $_SESSION["u"]["email"];
            $total = 0;
            $subtotal = 0;
            $shipping = 0;

            ?>
            <div class="container mt-5">
                <div class="col-12 row g-5">

                    <?php
                    $cart_rs = Database::search("SELECT * FROM `cart` WHERE `user_email`='" . $user . "'");
                    $cart_num = $cart_rs->num_rows;

                    if ($cart_num == 0) {
                        ?>
                        <h2 class="text-center ">There are no items in your bag.</h2>
                        <a href="home.php">
                            <butto class="btn btn-dark rounded-5 btn-lg">Shop now</butto>
                        </a>
                        <?php
                    } else {
                        ?>





                        <div class="col-12 col-lg-6">
                            <div class="col-12">
                                <h3 class="text-start text-dark fw-bold ">Select Payment Method</h3>
                                <div class="container text-center mt-5">
                                    <div class="row row-cols-3   g-2  mb-4">
                                        <div class="col d-grid">
                                            <div class="p-3 rounded-3 bg-success-subtle btn"><i
                                                    class="fa-solid fa-money-bill-transfer"></i> Cash On Delivery</div>
                                        </div>
                                        <div class="col d-grid">
                                            <div class="p-3  rounded-3  bg-success-subtle btn disabled"><i
                                                    class="fa-solid fa-credit-card"></i> Credit/Debit Card</div>
                                        </div>
                                        <div class="col d-grid">
                                            <div class="p-3  rounded-3  bg-success-subtle btn disabled"><i
                                                    class="fa-solid fa-building-columns"></i> Bank Transfer</div>
                                        </div>

                                    </div>
                                    <P class="text-start">- You may pay in cash to our courier upon receiving your parcel at the
                                        doorstep</P>
                                    <P class="text-start">- Before agreeing to receive the parcel, check if your delivery status has
                                        been updated to 'Out for Delivery'</P>
                                    <P class="text-start">- Before receiving, confirm that the airway bill shows that the parcel is
                                        from Waktashoes</P>
                                    <P class="text-start">- Before you make payment to the courier, confirm your order number,
                                        sender information and tracking number on the parcel</P>
                                    <P class="text-start">- Before sending your shoes, a picture of the pair of shoes will be sent
                                        to you via <i class="fa-brands fa-whatsapp" style="color: #00ff55;"></i> WhatsApp.</P>
                                </div>
                                <?php
                                for ($x = 0; $x < $cart_num; $x++) {
                                    $cart_data = $cart_rs->fetch_assoc();

                                    $product_rs = Database::search("SELECT * FROM `product` INNER JOIN `product_img` ON 
                                        product.id=product_img.product_id INNER JOIN `cart` ON product.id=cart.product_id WHERE `id`='" . $cart_data["product_id"] . "'");
                                    $product_data = $product_rs->fetch_assoc();

                                    $total = $total + ($product_data["price"] * $cart_data["qty"]);

                                    $address_rs = Database::search("SELECT `district_id` AS did FROM `user_has_address` INNER JOIN `city` ON 
                                    user_has_address.city_city_id=city.city_id INNER JOIN `district` ON 
                                    city.district_district_id=district.district_id WHERE `user_email`='" . $user . "'");
                                    $address_data = $address_rs->fetch_assoc();

                                    $condition_rs = Database::search("SELECT * FROM `product` INNER JOIN `condition` ON product.condition_condition_id=`condition`.condition_id ");
                                    $condition_data = $condition_rs->fetch_assoc();


                                    $color_rs = Database::search("SELECT * FROM `cart` INNER JOIN `product_color` ON cart.product_color_sc_id=product_color.sc_id INNER JOIN `product`ON cart.product_id=product.id WHERE `id`='" . $cart_data["product_id"] . "' ;");
                                    $color_num = $color_rs->fetch_assoc();

                                    $model_rs = Database::search("SELECT*FROM `model` INNER JOIN `model_has_brand` ON model.model_id=model_has_brand.model_model_id INNER JOIN `product` ON model_has_brand.id=product.model_has_brand_id WHERE product.id='" . $cart_data["product_id"] . "';");
                                    $model_num = $model_rs->fetch_assoc();


                                    $size_rs = Database::search("SELECT * FROM `size` INNER JOIN `cart` ON size.s_id=cart.size_s_id WHERE cart.product_id='" . $cart_data["product_id"] . "';");
                                    $size_num = $size_rs->fetch_assoc();


                                    $ship = 0;

                                    if ($address_data["did"] == 2) {
                                        $ship = $product_data["delivery_fee_colombo"];
                                        $shipping = $shipping + $ship;
                                    } else {
                                        $ship = $product_data["delivery_fee_other"];
                                        $shipping = $shipping + $ship;
                                    }


                                    



                                }

                                ?>



                            </div>



                        </div>


                        <div class="col-12 col-lg-6 ">
                            <div class="col-12 row">
                               
                                <div class="col-12 col-lg-12">
                                    <h3 class="text-start text-dark fw-bold ">Summary</h3>
                                </div>
                                <div class="col-12 col-lg-12">
                                    <div class="col-12 row ms-1">
                                        <div class="col-6 col-lg-6">
                                            <span>
                                                <p class="text-start fs-6  ">Subtotal <i class="fa-solid fa-circle-info fa-sm"></i>
                                                </p>
                                            </span>
                                        </div>
                                        <div class="col-6 col-lg-6">
                                            <span>
                                                <p class="text-end  fs-6" id="total">Rs.<?php echo $total; ?>.00 </p>
                                            </span>
                                        </div>
                                        <div class="col-6 col-lg-6">
                                            <span>
                                                <p class="text-start fs-6">Estimated Shipping & Handling</p>
                                            </span>
                                        </div>
                                        <div class="col-6 col-lg-6">
                                            <span>
                                                <p class="text-end fs-6" id="shipping">Rs.<?php echo $shipping; ?> .00</p>
                                            </span>
                                        </div>
                                        <div class="col-6 col-lg-6">
                                            <span>
                                                <p class="text-start fs-6">Estimated Tax <i
                                                        class="fa-solid fa-circle-info fa-sm"></i>
                                                </p>
                                            </span>
                                        </div>
                                        <div class="col-6 col-lg-6">
                                            <span>
                                                <p class="text-end fs-6">-</p>
                                            </span>
                                        </div>
                                        <hr />



                                        <div class="col-6 col-lg-6">
                                            <span>
                                                <p class="text-start fs-6">Total</p>
                                            </span>
                                        </div>
                                        <div class="col-6 col-lg-6">
                                            <span>
                                                <p class="text-end fs-6" id="subtotal">Rs.<?php echo $total + $shipping; ?>.00</p>
                                            </span>
                                        </div>
                                        <hr />

                                    </div>
                                    <div class="col-12  ">
                                        <div class="col-12 d-grid"><button class="btn btn-dark text-light btn-lg  rounded-5"
                                                type="submit" id="placeorder" onclick="confirmorder();">
                                                Confirm Order</button></div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <?php
                    }

                    ?>

            <?php
        } else {
            ?>
            <h2 class="text-center mt-5 ">There are no items in your bag.Please Login or Signup first.</h2>
            <?php
        }
        ?>






        <?php
        include "footer.php";
        ?>
        <script src="script.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>
        <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
    </body>

    </html>

    <?php
}

?>