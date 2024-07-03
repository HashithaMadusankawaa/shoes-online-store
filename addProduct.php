<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WAKTA SHOES | Add Product / Selling Account</title>
    <link rel="icon" href="resoerce/Wakta.png" />
    <link rel="stylesheet" href="addProduct.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.js"></script>
    <link rel="stylesheet" href="home.css" />
    <link href='https://fonts.googleapis.com/css?family=Instrument Sans' rel='stylesheet'>
</head>

<body class="b">

    <?php
    session_start();
    if (isset($_SESSION["u"])) {


        include "conection.php";

        ?>
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
                                    style="color:white;"></i> Unsaved product</a>
                        </li>

                    </ul>
                    <a href="home.php"><button class="btn btn-secondary ">Discard</button></a>
                    <a  class="link-underline link-underline-opacity-0">
                    <button class="btn btn-light ms-1" onclick="addProduct();">Next</button>
                    </a>





                </div>
            </div>
        </nav>

        <!---NAVBAR END -->

        <div class="container-fluid mt-3 ">
            <div class="col-12 col-lg-12">
                <h3 class="text-start text-dark fw-bold" style="font-family: Instrument Sans;"><button
                        class="btn btn-light rounded-3 "><a href="myproduct.php"><i
                                class="fa-solid fa-arrow-left-long"></i></a></button> Add product
                </h3>
            </div>
        </div>

        <div class="container rounded-3 ">
            <div class="row">

                <div class="col-12 col-lg-8">
                    <div class="row area rounded-4 shadow-sm ">
                        <div class="col-12 col-lg-12">
                            <div class="mb-3 mt-2 ">
                                <label for="Title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="title">
                            </div>
                        </div>
                        <div class="col-12 col-lg-12">
                            <div class="mb-3">
                                <label for="Title" class="form-label">Description</label>
                                <textarea cols="30" rows="15" class="form-control" id="desc"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row area rounded-4 shadow-sm mt-3 ">
                        <div class="col-12 col-lg-12 ">
                            <div class="row">
                                <div class="col-12 mt-1 ">
                                    <label class="form-label">Media</label>
                                    <p class="text-start text-light-emphasis  ">Please upload 592px * 592px png image</p>
                                </div>
                                <div class="col-12 col-lg-12 offset-lg-3">
                                    <div class="row">
                                        <div class="col-3 col-lg-2  ">
                                            <img src="resoerce/upload.png" class="img-fluid" style="width: 250px;"
                                                id="i0" />
                                        </div>
                                        <div class="col-3 col-lg-2   ms-1 ">
                                            <img src="resoerce/upload.png" class="img-fluid" style="width: 250px;"
                                                id="i1" />
                                        </div>
                                        <div class="col-3 col-lg-2  ms-1 ">
                                            <img src="resoerce/upload.png" class="img-fluid" style="width: 250px;"
                                                id="i2" />
                                        </div>

                                    </div>
                                </div>
                                <div class="offset-lg-3 col-12 col-lg-6 d-grid mt-3 mb-3">
                                    <input type="file" class="d-none" multiple id="imageuploader" />
                                    <label for="imageuploader" class=" btn btn-dark  text-light  "
                                        onclick="changeProductImage();"><i class="fa-solid fa-upload"></i> Add</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row area rounded-4 shadow-sm mt-3 ">
                        <div class="row">

                            <div class="col-12 mt-1 ">
                                <div class="col">
                                    <label class="form-label">Pricing</label>
                                    <div class="input-group mb-2 ">
                                        <span class="input-group-text ">Rs.</span>
                                        <input for="price" type="text" class="form-control" placeholder="0.00"
                                            aria-label="price" id="cost">
                                    </div>
                                </div>
                                <div class="row mt-3 mb-3">

                                    <div class="col">
                                        <label class="form-label">Delivery cost Within Colombo</label>
                                        <div class="input-group mb-2 ">
                                            <span class="input-group-text">Rs.</span>
                                            <input for="colombo" type="text" class="form-control" placeholder="0.00"
                                                id="dwc" aria-label="colombo">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label class="form-label">Delivery cost out of Colombo</label>
                                        <div class="input-group mb-2 ">
                                            <span class="input-group-text">Rs.</span>
                                            <input for="out" type="text" class="form-control" placeholder="0.00" id="doc"
                                                aria-label="out">
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

                    <div class="row area rounded-4 shadow-sm mt-3 ">
                        <div class="mb-3 mt-2 ">
                            <label for="qty" class="form-label">Quantity</label>
                            <input type="number" class="form-control" value="0" min="0" id="qty">
                        </div>
                    </div>

                </div>

                <div class="col-12 col-lg-4">

                    <div class="row area rounded-4 shadow-sm ms-1 mb-3 ">
                        <div class="mb-3 mt-2 ">
                            <div class="col-12">Product organization <i class="fa-solid fa-circle-info"></i></div>
                            <div class="col-12">
                                <label for="category" class="form-label mt-3">Product category </label>
                                <select class="form-select" aria-label="Default select example" id="category">
                                    <option value="0" selected>Select category</option>
                                    <?php
                                    $category_rs = Database::search("SELECT * FROM `category`");
                                    $category_num = $category_rs->num_rows;

                                    for ($s = 0; $s < $category_num; $s++) {
                                        $category_data = $category_rs->fetch_assoc();
                                        ?>
                                        <option value="<?php echo $category_data["cat_id"]; ?>">
                                            <?php echo $category_data["cat_name"]; ?>
                                        </option>
                                        <?php
                                    }
                                    ?>


                                </select>
                            </div>

                            <div class="col-12 mt-2 ">
                                <label for="brand" class="form-label mt-3">Product brand </label>
                                <select class="form-select" aria-label="Default select example" id="brand">
                                    <option value="0" selected>Select brand</option>
                                    <?php
                                    $brand_rs = Database::search("SELECT * FROM `brand`");
                                    $brand_num = $brand_rs->num_rows;

                                    for ($s = 0; $s < $brand_num; $s++) {
                                        $brand_data = $brand_rs->fetch_assoc();
                                        ?>
                                        <option value="<?php echo $brand_data["brand_id"]; ?>">
                                            <?php echo $brand_data["brand_name"]; ?>
                                        </option>
                                        <?php
                                    }
                                    ?>


                                </select>
                            </div>

                            <div class="col-12 mt-2 ">
                                <label for="model" class="form-label mt-3">Product Model </label>
                                <select class="form-select" aria-label="Default select example" id="model">
                                    <option value="0" selected>Select model</option>
                                    <?php
                                    $model_rs = Database::search("SELECT * FROM `model`");
                                    $model_num = $model_rs->num_rows;

                                    for ($s = 0; $s < $model_num; $s++) {
                                        $model_data = $model_rs->fetch_assoc();
                                        ?>
                                        <option value="<?php echo $model_data["model_id"]; ?>">
                                            <?php echo $model_data["model_name"]; ?>
                                        </option>
                                        <?php
                                    }
                                    ?>


                                </select>
                            </div>

                            <div class="col-12 mt-2 ">
                                <label for="clr" class="form-label mt-3">Product Color </label>
                                <form id="colorForm">
                                    <label for="colorInput1" class="form-label ">Color 1:</label>
                                    <input type="text" id="colorInput1" class="form-control " name="colorInput1" required>

                                    <label for="colorInput2" class="form-label ">Color 2:</label>
                                    <input type="text" class="form-control " id="colorInput2" name="colorInput2" required>

                                    <label for="colorInput3" class="form-label ">Color 3:</label>
                                    <input type="text" class="form-control " id="colorInput3" name="colorInput3" required>

                                    <label for="colorInput4" class="form-label ">Color 4:</label>
                                    <input type="text" class="form-control " id="colorInput4" name="colorInput4" required>


                                </form>
                            </div>

                            <div class="col-12 mt-2 ">
                                <label class="form-label mt-3">Product Condition </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="c" id="b" checked>
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Original
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="c" id="u">
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Copy
                                    </label>
                                </div>
                            </div>





                        </div>
                    </div>



                    <div class="row area rounded-4 shadow-sm ms-1 mb-3 ">
                        <!---size add--->
                    


                </div>


            </div>


        </div>

    </div>





    </div>
    </div>
    <?php
    } else {
        header("Location: home.php");
    }
    ?>





    <?php
    include "footer.php";
    ?>



    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>