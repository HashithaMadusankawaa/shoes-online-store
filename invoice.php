<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice | WAKTA SHOES</title>
    <link rel="icon" href="resoerce/Wakta.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.js"></script>
    <link rel="stylesheet" href="home.css" />
    <link href='https://fonts.googleapis.com/css?family=Instrument Sans' rel='stylesheet'>
</head>

<body class="bg-light-subtle  ">
    <?php 
    include "header.php";
    include "conection.php";

    if (isset($_SESSION["u"])) {
        $umail = $_SESSION["u"]["email"];
        //ORDER ID
        $oid = $_GET["qty"];
      


        ?>
         <div class="container  col-12 btn-toolbar  ">
                    <button class="btn btn-dark  me-2" onclick="printInvoice();"><i class="bi bi-printer-fill"></i> Print</button>
                    <button class="btn btn-danger me-2"><i class="bi bi-filetype-pdf"></i> Export as PDF</button>
                </div>
    <div class="container bg-light rounded-4 mt-4">
        <div class="col-12 text-center mt-3">
            <h1 class="text-dark fw-bold ">WAKTA SHOES</h1>
        </div>
        <div class="col-12 row ">
            <div class="col-6 col-lg-6">
                <div class="mt-3">
                    <h1 class="text-start fw-bold ">INVOICE</h1>
                </div>
                
                <?php 

$invoice_rs = Database::search("SELECT * FROM `invoice` WHERE `order_id`='".$oid."'");
$invoice_data = $invoice_rs->fetch_assoc();

?>
                <div class="col-12">
                    <h5 class="text-start fw-bold ">Date: 2023/02/04</h5>
                </div>
                <div class="col-12">
                    <h5 class="text-start fw-bold ">Invoice: #4567</h5>
                </div>
             

                <div class="col-12 mt-4">
                    <h6 class="text-start">Bill To</h6>
                </div>
                <?php 
                
                $address_rs = Database::search("SELECT * FROM `user_has_address` WHERE `user_email`='".$umail."'");
                $address_data = $address_rs->fetch_assoc();
                ?>
                <div class="col-12">
                    <h5 class="text-start fw-bold "><?php echo $_SESSION["u"]["fname"]." ".$_SESSION["u"]["lname"]; ?></h5>
                </div>
                <div class="col-12">
                    <h5 class="text-start "><?php echo $address_data["line1"]." ".$address_data["line2"]; ?></h5>
                </div>

            </div>
            <div class="col-6 col-lg-6 text-end">
                <div class="col-12 mt-1 "><img class="waktalogo w-25 text-end " src="resoerce/wakta.png" /></div>
                <div class="col-12 ">
                    <h6 class="text-end">Pay To</h6>
                </div>
                <div class="col-12">
                    <h5 class="text-end fw-bold ">Janith Kumara</h5>
                </div>
                <div class="col-12">
                    <h5 class="text-end ">NO.45,Colombo 07,2nd Street</h5>
                </div>
            </div>
        </div>

        <div class="col-12 mt-4">
            <table class="table table-light ">
                <thead>
                    <tr>
                        <th scope="col">Description</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">Nike Air Shoe</th>
                        <td>Rs.8450.00</td>
                        <td>1</td>
                        <td>Rs.8450.00</td>
                    </tr>

                </tbody>
            </table>
        </div>

        <div class="col-12 row bg-dark rounded-4 ">
            <div class="col-12 text-end">
                <h6 class="text-light me-2 mt-1  ">total</h6>
            </div>
            <hr class="text-light fw-bold " />
            <div class="col-6 col-lg-6 text-light ">

                <div class="col-12">
                    <h3>Subtotal:</h3>
                </div>
                <div class="col-12">
                    <h3>Delivery Fee:</h3>
                </div>
                <div class="col-12 mt-4">
                    <h3>Grand Total:</h3>
                </div>
            </div>
            <div class="col-6 col-lg-6 text-light text-end">
                <div class="col-12">
                    <h3 class="fs-3">Rs.8450.00</h3>
                </div>
                <div class="col-12">
                    <h3 class="fs-3">Rs.450.00</h3>
                </div>
                <hr class="text-light fw-bold col-4 offset-8" />
                <div class="col-12">
                    <h3 class="fs-3">Rs.8900.00</h3>
                </div>
            </div>
            <hr class="text-light fw-bold " />

        </div>
        <div class="col-12">
            <h6><img class="waktalogo  text-end " style="width: 60px;" src="resoerce/wakta.png" />Thak you! - waktashoes@gmail.com</h6>
        </div>
        <div class="col-12 fw-bold text-center">
                                    <span>Maradana, Colombo 10, Sri Lanka.</span><br />
                                    <span>+94112 555448</span><br />
                                    <span>WAKTASHOES.COM</span>
                                </div>
        <div class="col-12 mt-3 mb-3">
            <label class="form-label fs-5 fw-bold">NOTICE : </label>
            <br />
            <label class="form-label fs-6">Purchased items can return befor 7 days of Delivery.</label>
        </div>
        <div class="col-12 text-center mb-3">
            <label class="form-label fs-5 text-black-50 fw-bold">
                Invoice was created on a computer and is valid without the Signature and Seal.
            </label>
        </div>


    </div>
        <?php
    }else{
        header("location: login.php");
    }
    
    ?>
    

    <?php 
    include "footer.php";
    ?>

    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>