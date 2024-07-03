<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders | WAKTA SHOES</title>
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
    <link rel="stylesheet" href="order.css" />
    <link href='https://fonts.googleapis.com/css?family=Instrument Sans' rel='stylesheet'>
</head>

<body>


    <?php
    include "header.php";
    include "conection.php";

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
    <?php

    if (isset($_SESSION["u"])) {

        $mail = $_SESSION["u"]["email"];

        $invoice_rs = Database::search("SELECT * FROM `invoice` WHERE `user_email`='" . $mail . "' ");
        $invoice_num = $invoice_rs->num_rows;

        $user_rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $mail."'");
       $user_num = $user_rs->num_rows;
       $user_data = $user_rs->fetch_assoc();

        ?>

        <div class="col-12 mt-3">
        
        </div>
        <?php
        if ($invoice_num == 0) {
            ?>
            <div class="col-12 text-center bg-body" style="height: 450px;">
                <span class="fs-1 fw-bold text-black-50 d-block" style="margin-top: 200px;">
                    You have not purchased any item yet...
                </span>
            </div>
            <?php
        } else {
            ?>

<div class="col my-auto text-center"> <h4 class="mb-0">Thanks for your Order,<span class="change-color"><?php echo $user_data["fname"];?></span> !</h4> </div>

<div class="cf container-fluid  my-5  d-flex  justify-content-center">
        <div class="card card-1 col-12 container">
            
            <div class="card-body">
                <?php 
                for ($i=0; $i <$invoice_num ; $i++) { 
                    $invoice_data = $invoice_rs->fetch_assoc();

                    ?>
                    <div class="row mt-4">
                    <div class="col">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <div class="media row">
                                    <?php 
                                    $img_rs = Database::search("SELECT * FROM `product_img` WHERE `product_id` = '".$invoice_data["product_id"]."'");
                                     $img_data = $img_rs->fetch_assoc();
                                    ?>
                                    <div class="sq align-self-center col-3"> <img class="img-fluid  my-auto align-self-center mr-2 mr-md-4 pl-0 p-0 m-0" src="<?php echo $img_data["img_path"]?>" width="80" height="80" /> </div>
                                    <div class="media-body my-auto text-right col-9">
                                        <div class="row  my-auto flex-column flex-md-row">
                                            <?php 
                                            $product_rs = Database::search("SELECT * FROM `product` WHERE `id` = '".$invoice_data["product_id"]."'");
                                             $product_data = $product_rs->fetch_assoc();
                                            
                                            ?>
                                            <div class="col-auto my-auto "> <h6 class="mb-0"><?php echo $product_data["title"]?> </h6> </div>
                                            <div class="col my-auto  "> 
                                                <?php 
                                                if ($invoice_data["status"] == 0) {
                                                    ?>
                                                     <small class="btn btn-sm rounded-4 btn-danger">procesing</small>
                                                    <?php
                                                }else if ($invoice_data["status"] == 1) {
                                                     ?>
                                                     <small class="btn btn-sm rounded-4 btn-warning">Out for delivary</small>
                                                    <?php
                                                }else if ($invoice_data["status"] == 3){
                                                    ?>
                                                     <small class="btn btn-sm rounded-4 btn-success">Delivered</small>
                                                    <?php
                                                }
                                                
                                                ?>
                                               
                                            </div>
                                            <?php 
                                            
                                               $size_rs = Database::search("SELECT * FROM `size` WHERE `s_id` = '".$invoice_data["size_s_id"]."'");
                                              $size_data = $size_rs->fetch_assoc();
                                            
                                            
                                            ?>
                                            <div class="col my-auto  "> <small>Size : <?php echo $size_data["size"]?></small></div>
                                            <div class="col my-auto  "> <small>Qty : <?php echo $invoice_data["qty"]?></small></div>
                                            <div class="col my-auto ">  <h6 class="mb-0">Rs.<?php echo $invoice_data["total"]?>.00</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="my-3 ">
                                <div class="row ">
                                    <div class="col-md-3 mb-3">  
                                        <a href='<?php echo "orderdetails.php?id=" . ($invoice_data["order_id"]); ?>' class="link-underline link-underline-opacity-0" > Track Order <span><i class=" ml-2 fa fa-refresh" aria-hidden="true"></i></span></a> 
                                        <p>Order #<?php echo $invoice_data["order_id"]?><br/>
                                        <span>Placed on <?php echo $invoice_data["date"]?></span>
                                    </p>
                                       
                                    </div>
                                    <div class="col mt-auto">
                                        <div class="progress">
                                            <?php 
                                            if ($invoice_data["status"] == 0) {
                                               ?>
                                               <div class="progress-bar1 progress-bar rounded" style="width: 10%"  role="progressbar1" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div> 
                                               <?php
                                            }else if ($invoice_data["status"] == 1) {
                                                ?>
                                                <div class="progress-bar2 progress-bar rounded" style="width: 69%"  role="progressbar2" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div> 
                                                <?php
                                            }else if ($invoice_data["status"] == 3) {
                                                ?>
                                                <div class="progress-bar3 progress-bar  rounded" style="width: 100%"  role="progressbar3" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div> 
                                                <?php
                                            }
                                            
                                            ?>
                                            </div>
                                        <div class="media row justify-content-between ">
                                            <?php 
                                            if ($invoice_data["status"] == 0) {
                                               ?>
                                               <div class="col-auto text-right"><span> <small  class="text-right mr-sm-2"></small> <i class="fa fa-circle active"></i> </span></div>
                                               <div class="flex-col"> <span> <small class="text-right mr-sm-2">Out for delivary</small> <i class="fa fa-circle"></i></span></div>
                                            <div class="col-auto flex-col-auto"><smallclass="text-right mr-sm-2">Delivered</small><span> <i class="fa fa-circle"></i></span></div>
                                               <?php
                                            }else if ($invoice_data["status"] == 1) {
                                                ?>
                                               <div class="col-auto text-right"><span> <small  class="text-right mr-sm-2"></small> <i class="fa fa-circle active "></i> </span></div>
                                               <div class="flex-col"> <span> <small class="text-right mr-sm-2">Out for delivary</small> <i class="fa fa-circle active"></i></span></div>
                                            <div class="col-auto flex-col-auto"><smallclass="text-right mr-sm-2">Delivered</small><span> <i class="fa fa-circle"></i></span></div>
                                               <?php
                                            }else if ($invoice_data["status"] == 3) {
                                                ?>
                                               <div class="col-auto text-right"><span> <small  class="text-right mr-sm-2"></small> <i class="fa fa-circle active"></i> </span></div>
                                               <div class="flex-col"> <span> <small class="text-right mr-sm-2">Out for delivary</small> <i class="fa fa-circle active"></i></span></div>
                                            <div class="col-auto flex-col-auto"><smallclass="text-right mr-sm-2">Delivered</small><span> <i class="fa fa-circle active"></i></span></div>
                                               <?php
                                            }
                                            ?>
                                            
                                           
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

            <?php
        }

        ?>

        <?php

    } else {
        ?>
        <h2 class="text-center mt-3 ">
            You don't have any orders yet.Please sign up or login.
        </h2>

        <?php
    }

    include "footer.php";
    ?>
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>