<?php

include "conection.php";


if (isset($_GET["id"])) {

    $pid = $_GET["id"];

    $product_rs = Database::search("SELECT product.id,product.price,product.qty,product.description,
      product.title,product.datetime_added,product.delivery_fee_colombo,product.delivery_fee_other,
      product.category_cat_id,product.model_has_brand_id,product.condition_condition_id,
      product.status_status_id,product.user_email,model.model_name AS mname,brand.brand_name AS bname FROM 
      `product` INNER JOIN `model_has_brand` ON model_has_brand.id=product.model_has_brand_id INNER JOIN 
      `brand` ON brand.brand_id=model_has_brand.brand_brand_id INNER JOIN `model` ON 
      model.model_id=model_has_brand.model_model_id  WHERE product.id='" . $pid . "'");
  
    $product_num = $product_rs->num_rows;

    if ($product_num == 1) {
        $product_data = $product_rs->fetch_assoc();
    

        ?>
        
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback  | WAKTA</title>
    <link rel="icon" href="resoerce/Wakta.png" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.js"></script>
  <link rel="stylesheet" href="feedback.css" />
  <link rel="stylesheet" href="header.css" />
  <link href='https://fonts.googleapis.com/css?family=Instrument Sans' rel='stylesheet'>

</head>
<body>
    <?php
    include "header.php";
   ?>
<div class="background">
  <div class="container">
    <div class="screen">
      <div class="screen-header">
        <div class="screen-header-left">
          <div class="screen-header-button close"></div>
          <div class="screen-header-button maximize"></div>
          <div class="screen-header-button minimize"></div>
        </div>
        <div class="screen-header-right">
          <div class="screen-header-ellipsis"></div>
          <div class="screen-header-ellipsis"></div>
          <div class="screen-header-ellipsis"></div>
        </div>
      </div>
      <div class="screen-body">
        <div class="screen-body-item left">
          <div class="app-title">
            <span>FEEDBACK</span>
            <span>US</span>
          </div>
          <div class="app-contact">CONTACT INFO : +62 81 314 928 595

          <span id="product_id">FEEDBACK NUMBER : <?php echo $product_data["id"]?></span>
          </div>
          
        </div>
        <div class="screen-body-item">
          <div class="app-form">
          <div class="app-form-group message">
              <input class="app-form-control" value="<?php echo $product_data["title"]?>" id="product_id">
            </div>
          <div class="app-form-group message">
              <input class="app-form-control" value="<?php echo $product_data["user_email"]?>"  id="email">
            </div>
            <div class="app-form-group message">
              <input class="app-form-control" placeholder="MESSAGE" id="feed">
            </div>
            <div class="app-form-group buttons">
              <a href="home.php"><button class="app-form-button">CANCEL</button></a>
              <button class="app-form-button" onclick="sendfeedback(<?php echo $product_data['id']; ?>);">SEND</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="credits">
      inspired by
      <a class="credits-link" href="home." target="_blank">
        <svg class="dribbble" viewBox="0 0 200 200">
          <g stroke="#ffffff" fill="none">
            <circle cx="100" cy="100" r="90" stroke-width="20"></circle>
            <path d="M62.737004,13.7923523 C105.08055,51.0454853 135.018754,126.906957 141.768278,182.963345" stroke-width="20"></path>
            <path d="M10.3787186,87.7261455 C41.7092324,90.9577894 125.850356,86.5317271 163.474536,38.7920951" stroke-width="20"></path>
            <path d="M41.3611549,163.928627 C62.9207607,117.659048 137.020642,86.7137169 189.041451,107.858103" stroke-width="20"></path>
          </g>
        </svg>
        WAKTA
      </a>
    </div>
  </div>
</div>

<?php
  include("footer.php");
  ?>
<script src="script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
        <?php
    
    
    }
}
?>

