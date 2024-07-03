<?php 
session_start();
include "conection.php";

if(isset($_SESSION["u"])) {
    $mail = $_SESSION["u"]["email"];
    $pid = $_POST["pid"];
    $feed = $_POST["feed"];

    // Check if feedback is empty
    if (empty($feed)) {
        echo ("Please enter your feedback");
    } else {
        $d = new DateTime();
        $tz = new DateTimeZone("Asia/Colombo");
        $d->setTimezone($tz);
        $date = $d->format("Y-m-d H:i:s");

        // Insert feedback into the database
        Database::iud("INSERT INTO `feedback` (`email`, `feed`, `date`, `product_id`) VALUES 
            ('".$mail."', '".$feed."', '".$date."', '".$pid."')");

        echo ("success");
    }
} else {
    echo ("User not logged in");
}
?>
