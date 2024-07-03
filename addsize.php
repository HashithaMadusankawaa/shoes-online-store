<?php

session_start();


include "conection.php";

if (isset($_SESSION["u"])) {
    if (isset($_GET['product_id'])) {
        $product_id = $_GET['product_id'];

        $product_rs = Database::search("SELECT product.id,product.price,product.qty,product.description,
    product.title,product.datetime_added,product.delivery_fee_colombo,product.delivery_fee_other,
    product.category_cat_id,product.model_has_brand_id,product.condition_condition_id,
    product.status_status_id,product.user_email,model.model_name AS mname,brand.brand_name AS bname FROM 
    `product` INNER JOIN `model_has_brand` ON model_has_brand.id=product.model_has_brand_id INNER JOIN 
    `brand` ON brand.brand_id=model_has_brand.brand_brand_id INNER JOIN `model` ON 
    model.model_id=model_has_brand.model_model_id  WHERE product.id='" . $product_id . "'");

        $product_num = $product_rs->num_rows;

        if ($product_num == 1) {
            $product_data = $product_rs->fetch_assoc();

            ?>
            <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Tittle - Add Size | WAKATA</title>
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
                <link rel="stylesheet" href="addsize.css" />
                <link rel="stylesheet" href="header.css" />
                <link href='https://fonts.googleapis.com/css?family=Instrument Sans' rel='stylesheet'>
                <link href="https://fonts.googleapis.com/css?family=Bentham|Playfair+Display|Raleway:400,500|Suranna|Trocchi"
                    rel="stylesheet">
                <link href="https://fonts.googleapis.com/css?family=Bentham|Playfair+Display|Raleway:400,500|Suranna|Trocchi"
                    rel="stylesheet">
                <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
            </head>

            <body>
                <!--naverbar-->
                <nav class="navbar navbar-expand-lg bg-dark" ata-bs-theme="dark">
                    <div class="container-fluid">
                        <a class="navbar-brand fs-3  fw-bold text-light " style="font-family: Instrument Sans;" href="home.php"><img
                                class="waktalogo" src="resoerce/wakta.png" />WAKTA</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto me-auto mb-2 mb-lg-0 justify-content-center">


                                <li class="nav-item">
                                    <a class="nav-link fs-6  text-light " href="#"><i class="fa-solid fa-triangle-exclamation"
                                            style="color:white;"></i> Unsaved product - After adding the size to the shoe, save it</a>
                                </li>

                            </ul>

                            <button class="btn btn-light ms-1" onclick="savesize(<?php echo $product_data['id']; ?>)">Save</button>





                        </div>
                    </div>
                </nav>

                <!--naverbar end-->

                <div class="wrapper container-fluid border rounded-3 h-auto">
                    <div class="row align-items-center">
                        <div class="col-md-6 product-img">
                            <?php

                            $image_rs = Database::search("SELECT * FROM `product_img` INNER JOIN `product` ON product_img.product_id = product.id WHERE `id` ='" . $product_id . "' ");
                            $image_data = $image_rs->fetch_assoc();



                            ?>
                            <img src="<?php echo $image_data["img_path"]; ?>" class="img-fluid" novalidate>
                        </div>
                        <div class="col-md-6 product-info needs-validation">
                            <div class="product-text">
                                <h1 class="text-center font-monospace"><?php echo $product_data["title"]; ?></h1>

                                <h3 class="text-center font-monospace">Add Sizes</h3>
                                <div claas="col-12">
                                    <div class="input-group mb-3 text-center">
                                        <span class="input-group-text" id="basic-addon1"><i
                                                class="fa-brands fa-product-hunt"></i></span>
                                        <input type="text" class="form-control col-6" value="<?php echo $product_data["id"]; ?>"
                                            aria-label="P_ID" aria-describedby="basic-addon3" id="product_id">
                                        <span class="input-group-text "><i class="fa-solid fa-warehouse"></i></span>
                                        <input type="text" class="form-control col-6" value="<?php echo $product_data["qty"]; ?>"
                                            aria-label="stock_quantity" aria-describedby="basic-addon4" id="totalqty">

                                    </div>
                                    <div class="input-group mb-3 text-center">
                                        <span class="input-group-text" id="basic-addon1"><i
                                                class="fa-solid fa-shoe-prints"></i></span>
                                        <input type="text" class="form-control col-6" placeholder="Size" aria-label="size"
                                            aria-describedby="basic-addon1" id="size">
                                        <input type="text" class="form-control col-6" placeholder="stock_quantity"
                                            aria-label="stock_quantity" aria-describedby="basic-addon2" id="stock_quantity">
                                        <span class="input-group-text btn btn-primary" onclick="sizeadd(<?php echo $product_data['id']; ?>);">Add</span>
                                    </div>

                                </div>

                                <div class="col-8">
                                    <ul class="list-group">
                                        <li class="list-group-item active" aria-current="true">Size List</li>
                                        <?php

                                        $size_rs = Database::search("SELECT*FROM `size` WHERE `product_id` = '".$product_data["id"]."';");
                                        $size_num = $size_rs->num_rows;
                                        for ($z = 0; $z < $size_num; $z++) {
                                            $size_data = $size_rs->fetch_assoc();

                                            echo '<li class="list-group-item">' . $size_data["size"] . '</li>';


                                        }
                                        ?>
                                    </ul>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>


                <script src="script.js"></script>
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
                    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
                    crossorigin="anonymous"></script>
            </body>

            </html>
            <?php
        }

    } else {
        echo "Product ID is not set.";
    }
}
?>