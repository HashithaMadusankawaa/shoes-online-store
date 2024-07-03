<?php
$token = bin2hex(random_bytes(16));
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your - Cart | WAKTA SHOES</title>
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
    <link rel="stylesheet" href="cart.css" />
    <link href='https://fonts.googleapis.com/css?family=Instrument Sans' rel='stylesheet'>
</head>

<body class="b">
    <?php
    include "header.php";
    include "conection.php";
    ?>
    <div class="col-12" id="basicSearchResult"></div>
    <div class="container-fluid">
        <div class="col">
            <ul class="nav nav-underline justify-content-center">
                <li class="nav-item">
                    <a class="nav-link link-dark fs-5 " href="profile.php">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  link-dark fs-5 " href="watchlist.php">Favorites</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link-dark fs-5 active" href="cart.php">Cart</a>
                <li class="nav-item">
                    <a class="nav-link link-dark fs-5 " href="purchasingHistory.php">Orders</a>
                </li>

            </ul>
        </div>
    </div>
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
                            <h3 class="text-start text-dark fw-bold ">Bag</h3>
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




                                ?>
                                <div class="col-12 row mt-3 ">
                                    <div class="col-4 col-lg-4">
                                        <img class=" border border-0  img-thumbnail card-img-top rounded-1  "
                                            style="background: #EFEFEF;" src="<?php echo $product_data["img_path"]; ?>" />
                                        <div class="col-12">
                                            <span>
                                                <p class="text-start fw-bold ">Shipping</p>
                                                <a href="profile.php" class="text-dark fw-bold ">Edit Location</a></br>

                                            </span>

                                        </div>

                                    </div>

                                    <div class="col-6 col-lg-6 row">
                                        <div class="col-12">
                                            <h5 class="text-start text-dark fw-bold "><?php echo $product_data["title"]; ?></h5>

                                            <span>Colour : <?php echo $color_num["color"] ?></span></br>

                                            <span>Condition : <?php echo $condition_data["condition_name"]; ?></span></br>



                                            <span><?php echo $model_num["model_name"] ?></span></br>
                                            <div class="col-6">
                                                <span>Quantity: <input type="number"
                                                        class="form-control form-control-sm cardqtytext" min="1" max="10"
                                                        value="<?php echo $cart_data["qty"]; ?>"
                                                        onchange="changeQTY(<?php echo $cart_data['cart_id']; ?>);"
                                                        id="qty_input" /></span>
                                            </div>

                                            <span>Size : <?php echo $size_num["size"] ?></span></br>


                                        </div>



                                    </div>
                                    <div class="col-2 col-lg-2">
                                        <h4 class="text-dark text-start  ">Rs.<?php echo ($product_data["price"]); ?>.00</h4>
                                        <div class="col-12 text-start  ">
                                            <?php
                                            $watchlist_rs = Database::search("SELECT * FROM `watchlist` WHERE `user_email` = '" . $user . "' AND `product_id` ='" . $cart_data["product_id"] . "'");
                                            $watchlist_num = $watchlist_rs->num_rows;
                                            if ($watchlist_num == 1) {
                                                ?>

                                                <span class="cu"><i class="fa-solid fa-heart " style="color: #ff0000;"
                                                        onclick='addToWatchlist(<?php echo $product_data["id"]; ?>);'
                                                        id="heart<?php echo $product_data["id"]; ?>"></i></span>
                                                <?php
                                            } else {
                                                ?>

                                                <span class="cu"><i class="fa-regular fa-heart "
                                                        onclick='addToWatchlist(<?php echo $product_data["id"]; ?>);'
                                                        id="heart<?php echo $product_data["id"]; ?>"></i></span>
                                                <?php
                                            }
                                            ?>

                                            <span class="cu"><i class="fa-solid fa-trash-can fa-lg ms-2  "
                                                    onclick="deleteFromCart(<?php echo $product_data['id'] ?>);"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <hr />
                                <?php
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
                                            <p class="text-end  fs-6">Rs.<?php echo $total; ?>.00 </p>
                                        </span>
                                    </div>
                                    <div class="col-6 col-lg-6">
                                        <span>
                                            <p class="text-start fs-6">Estimated Shipping & Handling</p>
                                        </span>
                                    </div>
                                    <div class="col-6 col-lg-6">
                                        <span>
                                            <p class="text-end fs-6">Rs.<?php echo $shipping; ?> .00</p>
                                        </span>
                                    </div>
                                    <div class="col-6 col-lg-6">
                                        <span>
                                            <p class="text-start fs-6">Estimated Tax <i
                                                    class="fa-solid fa-circle-info fa-sm"></i></p>
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
                                            <p class="text-start fs-6">Promo Code</p>
                                        </span>
                                    </div>
                                    <div class="col-6 col-lg-6">

                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control focus-ring focus-ring-light" 
                                                 aria-describedby="basic-addon2">
                                            <span class="input-group-text btn btn-dark" id="basic-addon2">submit</span>
                                        </div>

                                    </div>
                                    <hr />
                                    <div class="col-6 col-lg-6">
                                        <span>
                                            <p class="text-start fs-6">Total</p>
                                        </span>
                                    </div>
                                    <div class="col-6 col-lg-6">
                                        <span>
                                            <p class="text-end fs-6">Rs.<?php echo $total + $shipping; ?>.00</p>
                                        </span>
                                    </div>
                                    <hr />

                                </div>
                                <div class="col-12  ">
                                    <div class="col-12 d-grid"><button class="btn btn-dark text-light btn-lg  rounded-5"
                                            type="submit" id="checkoutButton" onclick="checkout(<?php echo $product_data['id']?>);">Checkout</button></div>

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