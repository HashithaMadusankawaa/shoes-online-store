<?php
session_start();
include "conection.php";

$user = $_SESSION["u"]["email"];

$search = $_POST["s"];
$time = $_POST["t"];
$qty = $_POST["q"];
$condition = $_POST["c"];

$query = "SELECT * FROM `product` WHERE `user_email`='" . $user . "'  ";

if (!empty($search)) {
    $query .= " AND `title` LIKE '%" . $search . "%'";
}

if ($condition != "0") {
    $query .= " AND `condition_condition_id`='" . $condition . "'";
}

if ($time != "0") {
    if ($time == "1") {
        $query .= " ORDER BY `datetime_added` DESC";
    } else if ($time == "2") {
        $query .= " ORDER BY `datetime_added` ASC";
    }
}

if ($time != "0" && $qty != "0") {
    if ($qty == "1") {
        $query .= " , `qty` DESC";
    } else if ($qty == "2") {
        $query .= " , `qty` ASC";
    }
} else if ($time == "0" && $qty != "0") {
    if ($qty == "1") {
        $query .= " ORDER BY `qty` DESC";
    } else if ($qty == "2") {
        $query .= " ORDER BY `qty` ASC";
    }
}

?>

<div class="container mt-3 ">
    <div class="col-12">

        <table class="table">
            <thead>
                <tr class="table-secondary ">
                    <th scope="col">Product</th>
                    <th scope="col">Status</th>
                    <th scope="col">Inventory</th>
                    <th scope="col">Price</th>
                </tr>
            </thead>
            <tbody>
                <?php

                if (isset($_GET["page"])) {
                    $pageno = $_GET["page"];
                } else {
                    $pageno = 1;
                }
                $product_rs = Database::search($query);
                $product_num = $product_rs->num_rows;

                $results_per_page = 12;
                $number_of_pages = ceil($product_num / $results_per_page);

                $page_results = ($pageno - 1) * $results_per_page;
                $selected_rs = Database::search($query . " LIMIT " . $results_per_page . " OFFSET " . $page_results . "");

                $selected_num = $selected_rs->num_rows;
                for ($x = 0; $x < $selected_num; $x++) {
                    $selected_data = $selected_rs->fetch_assoc();

                ?>
                    <tr>
                        <td>
                            <?php
                            $product_img_rs = Database::search("SELECT * FROM `product_img` WHERE `product_id`='" . $selected_data["id"] . "'");
                            $product_img_data = $product_img_rs->fetch_assoc();
                            ?>
                            <div><img class="image rounded-3 img-thumbnail " src="<?php echo $product_img_data["img_path"]; ?>" /> <?php echo $selected_data["title"]; ?> <i class="fa-regular fa-pen-to-square ms-4 "></i></div>
                            </th>
                        <td>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="toggle<?php echo $selected_data["id"]; ?>" onchange="changeStatus(<?php echo $selected_data['id']; ?>);" <?php if ($selected_data["status_status_id"] == 2) { ?> checked <?php } ?>>
                                <label class="form-check-label" for="toggle<?php echo $selected_data["id"]; ?>">
                                    <?php if ($selected_data["status_status_id"] == 1) { ?>
                                        Active
                                    <?php } else { ?>
                                        Draft
                                    <?php } ?>
                                </label>
                            </div>
                        </td>
                        <td><?php echo $selected_data["qty"]; ?>in stock</td>

                        <td>Rs. <?php echo $selected_data["price"]; ?>.00</td>
                    </tr>
                <?php

                }

                ?>
            </tbody>
        </table>
        <div class="offset-2 offset-lg-3 col-8 col-lg-6 text-center mb-3">
          <nav aria-label="Page navigation example">
            <ul class="pagination  justify-content-center">
              <li class="page-item">
                <a class="page-link" href="
                                                <?php if ($pageno <= 1) {
                                                  echo ("#");
                                                } else {
                                                  echo "?page=" . ($pageno - 1);
                                                } ?>
                                                " aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                </a>
              </li>

              <?php
              for ($x = 1; $x <= $number_of_pages; $x++) {
                if ($x == $pageno) {
              ?>
                  <li class="page-item active">
                    <a class="page-link" href="<?php echo "?page=" . ($x); ?>"><?php echo $x; ?></a>
                  </li>
                <?php
                } else {
                ?>
                  <li class="page-item">
                    <a class="page-link" href="<?php echo "?page=" . ($x); ?>"><?php echo $x; ?></a>
                  </li>
              <?php
                }
              }
              ?>

              <li class="page-item">
                <a class="page-link" href="
                                                <?php if ($pageno >= $number_of_pages) {
                                                  echo ("#");
                                                } else {
                                                  echo "?page=" . ($pageno + 1);
                                                } ?>
                                                " aria-label="Next">
                  <span aria-hidden="true">&raquo;</span>
                </a>
              </li>
            </ul>
          </nav>
</div>
    </div>
</div>

