<?php
include "conection.php";
if (isset($_GET["id"])) {
    $order_id = $_GET["id"];

    $invoice_rs = Database::search("SELECT * FROM `invoice` WHERE `order_id` = '" . $order_id . "'");
    $invoice_num = $invoice_rs->num_rows;

    $order_rs = Database::search("SELECT * FROM `invoice` WHERE `order_id` = '" . $order_id . "' ");
    $order_num = $order_rs->num_rows;
    $order_data = $order_rs->fetch_assoc();

    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Order Details | WAKTA SHOES</title>
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
        <link rel="stylesheet" href="details.css" />
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
                        <a class="nav-link  link-dark fs-5" href="watchlist.php">Favourites</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link-dark fs-5 " href="cart.php">Cart</a>
                    <li class="nav-item">
                        <a class="nav-link link-dark fs-5 active" href="purchasingHistory.php">Orders</a>
                    </li>

                </ul>
            </div>
        </div>
        <div class="container text-center mt-4">
            <div class="row g-2">
                <div class="col-12 col-lg-12">
                    <div class="p-3 row shadow-sm rounded-3 bg-light">
                        <div class="col-6 text-start">
                            <P>Order <?php echo $order_data["order_id"] ?>
                                <br>
                                <span class="text-start text-light-emphasis"> <?php echo $order_data["date"] ?></span>
                            </P>
                        </div>
                        <div class="col-6 text-end">
                            <h4>Total: Rs.<?php echo $order_data["total"] ?>.00</h4>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-12 mt-3">
                    <div class="p-3 row shadow-sm rounded-3 bg-light">
                        <div class="col-6 text-start">
                            <?php
                            $package_rs = Database::search("SELECT COUNT(`order_id`) AS count FROM `invoice` WHERE `order_id`='" . $order_id . "'");

                            // Fetch the result as an associative array
                            $package_data = $package_rs->fetch_assoc();

                            // Extract the count value from the associative array
                            $package_count = $package_data['count'];
                            ?>
                            <P class="text-primary"><i class="fa-solid fa-boxes-packing"></i> Package
                                <?php echo $package_count ?>
                                <br>

                            </P>
                        </div>
                        <div class="col-6 text-end">
                            <p><i class="fa-solid fa-comments" style="color: #63E6BE;"></i> Chat with Seller</p>
                        </div>
                        <hr />
                        <div class="col-6 text-start">
                            <?php
                            $purchaseDate  = $order_data["date"];
                            $d = new DateTime($purchaseDate);
                            $tz = new DateTimeZone("Asia/Colombo");
                            $d->setTimezone($tz);
                            $date = $d->format("Y-m-d");
                            $date1 = date("Y-m-d", strtotime($date . " + 5 days"));
                            $date2 = date("Y-m-d", strtotime($date . " + 3 days"));
                            $date1_with_month = date("F d", strtotime($date . " + 5 days"));
                            $date2_with_month = date("F d", strtotime($date . " + 3 days"));
                            ?>
                            <P class="text-success">Get by <?php echo $date2_with_month ?> - <?php echo $date1_with_month ?>
                                <br>

                            </P>
                        </div>
                        <div class="col-6 text-end">
                            <p><i class="fa-solid fa-truck"></i> Standard Delivery</p>
                        </div>
                        <div class="track mt-5">
                            <?php
                            if ($order_data["status"] == 0) {
                                ?>
                                <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span
                                        class="text">Order confirmed</span> </div>
                                <div class="step "> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text">
                                        Picked by courier</span> </div>
                                <div class="step "> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text">
                                        On the way </span> </div>
                                <div class="step "> <span class="icon"> <i class="fa fa-box"></i> </span> <span
                                        class="text">Ready for pickup</span> </div>
                            <?php
                            } else if ($order_data["status"] == 1) {
                                ?>
                                <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span
                                        class="text">Order confirmed</span> </div>
                                <div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text">
                                        Picked by courier</span> </div>
                                <div class="step "> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text">
                                        On the way </span> </div>
                                <div class="step "> <span class="icon"> <i class="fa fa-box"></i> </span> <span
                                        class="text">Ready for pickup</span> </div>
                            <?php
                            }else if ($order_data["status"] == 2 ) {
                                ?>
                                <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span
                                        class="text">Order confirmed</span> </div>
                                <div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text">
                                        Picked by courier</span> </div>
                                <div class="step active"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text">
                                        On the way </span> </div>
                                <div class="step "> <span class="icon"> <i class="fa fa-box"></i> </span> <span
                                        class="text">Ready for pickup</span> </div>
                            <?php
                            }else if ($order_data["status"] == 3) {
                                ?>
                                <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span
                                        class="text">Order confirmed</span> </div>
                                <div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text">
                                        Picked by courier</span> </div>
                                <div class="step active"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text">
                                        On the way </span> </div>
                                <div class="step active"> <span class="icon"> <i class="fa fa-box"></i> </span> <span
                                        class="text">Ready for pickup</span> </div>
                            <?php
                            }

                            ?>


                        </div>

                        <div class="card-body">
                            <?php
                            for ($i = 0; $i < $invoice_num; $i++) {
                                $invoice_data = $invoice_rs->fetch_assoc();

                                ?>
                                <div class="row mt-4">
                                    <div class="col">
                                        <div class="card shadow-sm">
                                            <div class="card-body">
                                                <div class="media row">
                                                    <?php
                                                    $img_rs = Database::search("SELECT * FROM `product_img` WHERE `product_id` = '" . $invoice_data["product_id"] . "'");
                                                    $img_data = $img_rs->fetch_assoc();
                                                    ?>
                                                    <div class="sq align-self-center col-3"> <img
                                                            class="img-fluid  my-auto align-self-center mr-2 mr-md-4 pl-0 p-0 m-0"
                                                            src="<?php echo $img_data["img_path"] ?>" width="80" height="80" />
                                                    </div>
                                                    <div class="media-body my-auto text-right col-9">
                                                        <div class="row  my-auto flex-column flex-md-row">
                                                            <?php
                                                            $product_rs = Database::search("SELECT * FROM `product` WHERE `id` = '" . $invoice_data["product_id"] . "'");
                                                            $product_data = $product_rs->fetch_assoc();

                                                            ?>
                                                            <div class="col-auto my-auto ">
                                                                <h6 class="mb-0"><?php echo $product_data["title"] ?> </h6>
                                                            </div>
                                                            <div class="col my-auto  ">
                                                                <?php
                                                                if ($invoice_data["status"] == 0) {
                                                                    ?>
                                                                    <small class="btn btn-sm rounded-4 btn-danger">procesing</small>
                                                                    <?php
                                                                } else if ($invoice_data["status"] == 1) {
                                                                    ?>
                                                                        <small class="btn btn-sm rounded-4 btn-warning">Out for
                                                                            delivary</small>
                                                                    <?php
                                                                } else if ($invoice_data["status"] == 2) {
                                                                    ?>
                                                                            <small
                                                                                class="btn btn-sm rounded-4 btn-success">Delivered</small>
                                                                    <?php
                                                                }

                                                                ?>

                                                            </div>
                                                            <?php

                                                            $size_rs = Database::search("SELECT * FROM `size` WHERE `s_id` = '" . $invoice_data["size_s_id"] . "'");
                                                            $size_data = $size_rs->fetch_assoc();


                                                            ?>
                                                            <div class="col my-auto  "> <small>Size :
                                                                    <?php echo $size_data["size"] ?></small></div>
                                                            <div class="col my-auto  "> <small>Qty :
                                                                    <?php echo $invoice_data["qty"] ?></small></div>
                                                            <div class="col my-auto ">
                                                                <h6 class="mb-0">Rs.<?php echo $invoice_data["total"] ?>.00</h6>
                                                            </div>
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



                        </div>

                    </div>
                </div>
                <div class="col-6">
                    <div class="p-3">Custom column padding</div>
                </div>
                <div class="col-6">
                    <div class="p-3">Custom column padding</div>
                </div>
            </div>
        </div>







        <?php include "footer.php" ?>
        <script src="script.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>
    </body>

    </html>
    <?php

} else {
    header("location:index.php");
    exit();
}

?>