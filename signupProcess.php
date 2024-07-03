<?php

include("conection.php");


$fname = $_POST["f"];
$lname = $_POST["l"];
$email = $_POST["e"];
$password = $_POST["p"];
$mobile = $_POST["m"];
$gender = $_POST["g"];

if (empty($fname)) {
    echo ("Please Enter First Name");
}else if (strlen($fname) > 45) {
    echo ("First Name Contain Lower Than 50 characters");
}else if (empty($lname)) {
    echo ("Please Enter Last Name");
}else if (strlen($lname) > 45) {
    echo ("Last Name Contain Lower Than 50 characters");
}else if (empty($email)) {
    echo ("Please Enter Email address");
}else if (strlen($email) >100) {
    echo ("Email address Contain Lower Than 100 characters");
}else if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
    echo ("Invalid Email address");
}else if (empty($password)) {
    echo ("Please Enter Password");
}else if (strlen($password) <5 || strlen($password) > 20) {
    echo ("Password must Contain 5 to 20 Characters.");  
}else if (empty($mobile)) {
    echo ("Please Enter Mobile Number");
}else if (strlen($mobile) != 10){
    echo ("Mobile number Must Container 10 characters.");
}else if (!preg_match("/07[0,1,2,4,5,6,7,8][0-9]/",$mobile)) {
    echo ("Invalied Mobile Number");
}else {
    $rs  =  Database::search("SELECT*FROM `user` WHERE `email` = '".$email."' OR `mobile` = '".$mobile."' ");
    $n = $rs->num_rows;

    if ($n > 0) {
        echo ("User with the Same email address or Same mobile number already exists.");
    }else{
        $d = new DateTime();
        $tz = new DateTimeZone("Asia/Colombo");
        $d->setTimezone($tz);
        $date = $d->format("Y-m-d H:i:s");

        Database::iud("INSERT INTO `user` (`fname`,`lname`,`email`,`password`,`mobile`,`joined_date`,`gender_gender_id`,`status_status_id`) VALUES
        ('".$fname."','".$lname."','".$email."','".$password."','".$mobile."','".$date."','".$gender."','1')");

        echo ("success");

        
      
    
      
    }
}



?>