<?php
include "conection.php";

$txt = $_POST["t"];


$query = "SELECT * FROM `product` ";

if (!empty($txt)) {
    $query .= "WHERE `title` LIKE '%" . $txt . "%'";
} 

?>

<div class="container-fluid  text-center">
            <div class="row g-2">

              <?php

              $product_rs = Database::search("SELECT*FROM `product` WHERE `status_status_id` = '1' ORDER BY `datetime_added` DESC LIMIT 4 OFFSET 0 ");
              $product_num = $product_rs->num_rows;

              for ($z = 0; $z < $product_num; $z++) {
                $product_data = $product_rs->fetch_assoc();

                ?>

            <?php

            $pageno;

            if ("0" != ($_POST["page"])) {
                $pageno = $_POST["page"];
            } else {
                $pageno = 1;
            }
        }

            $product_rs = Database::search($query);
            $product_num = $product_rs->num_rows;

            $results_per_page = 40;
            $number_of_pages = ceil($product_num / $results_per_page);

            $page_results = ($pageno - 1) * $results_per_page;
            $selected_rs = Database::search($query . " LIMIT " . $results_per_page . " OFFSET " . $page_results . "");

            $selected_num = $selected_rs->num_rows;
            for ($x = 0; $x < $selected_num; $x++) {
                $selected_data = $selected_rs->fetch_assoc();
            ?>
                 <div class="col-6 col-lg-3">
                <div class="p-0">
                  <a href='<?php echo "singaleProduct.php?id=" . ($product_data["id"]); ?>'
                    class="link-underline link-underline-opacity-0">
                    <div class=" card container-fluid   border border-0 row">
                      <div class="col-12 col-lg-12">

                        <?php

                        $img_rs = Database::search("SELECT*FROM `product_img` WHERE `product_id` = '" . $product_data["id"] . "'");
                        $img_data = $img_rs->fetch_assoc();

                        ?>

                        <img class="border border-0 img-thumbnail card-img-top rounded-2 " style="background: #EFEFEF;"
                          src="<?php echo $img_data["img_path"]; ?>" />
                      </div>
                      <div class="col-12 col-lg-12 text-start ms-3 mt-2 ">
                        <h4 class="names card-title text-dark ">
                          <?php echo $product_data["title"]; ?>
                        </h4>

                        <?php

                        $category_rs = Database::search("SELECT*FROM `category` WHERE `cat_id` = '" . $product_data["category_cat_id"] . "'");
                        $category_data = $category_rs->fetch_assoc();

                        ?>

                        <p class="names card-subtitle text-dark">
                          <?php echo $category_data["cat_name"]; ?>
                        </p>

                        <h4 class="names card-title text-dark ">Rs.
                          <?php echo $product_data["price"]; ?>.00
                        </h4>
                      </div>

                    </div>
                  </a>
                </div>
              </div>

            <?php
            }
            ?>

            <div class="offset-2 offset-lg-3 col-8 col-lg-6 text-center mb-3">
                <nav aria-label="Page navigation example">
                    <ul class="pagination pagination-lg justify-content-center">
                        <li class="page-item">
                            <a class="page-link" <?php if ($pageno <= 1) {
                                                        echo ("#");
                                                    } else {
                                                    ?> onclick="basicSearch(<?php echo ($pageno - 1); ?>);" ; <?php
                                                                                                            } ?> aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>

                        <?php
                        for ($x = 1; $x <= $number_of_pages; $x++) {
                            if ($x == $pageno) {
                        ?>
                                <li class="page-item active">
                                    <a class="page-link" onclick="basicSearch(<?php echo ($x); ?>);"><?php echo $x; ?></a>
                                </li>
                            <?php
                            } else {
                            ?>
                                <li class="page-item">
                                    <a class="page-link" onclick="basicSearch(<?php echo ($x); ?>);"><?php echo $x; ?></a>
                                </li>
                        <?php
                            }
                        }
                        ?>

                        <li class="page-item">
                            <a class="page-link" <?php if ($pageno >= $number_of_pages) {
                                                        echo ("#");
                                                    } else {
                                                    ?> onclick="basicSearch(<?php echo ($pageno + 1); ?>);" ; <?php
                                                                                                            } ?> aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>

        </div>
    </div>
</div>