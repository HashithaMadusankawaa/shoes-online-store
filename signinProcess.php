<?php

session_start();
 include("conection.php");

 $email = $_POST["e"];
 $password = $_POST["p"];
 $rememberme = $_POST["r"];


 if (empty($email) ) {
    echo("Please Enter Email.");
 }else if(empty($password) ) {
    echo("Please Enter Password.");
 }else {
    $rs = Database::search("SELECT*FROM `user` WHERE `email` = '".$email."' AND `password` = '".$password."'");
    $n = $rs->num_rows;
    if ($n == 1) {
        echo("success");
        $d = $rs->fetch_assoc();
        $_SESSION["u"] = $d;

        if ($rememberme == "true") {
            setcookie("email",$email,time()+ (60*60*24*365));
            setcookie("password",$password,time()+ (60*60*24*365));
        }else{
            setcookie("email","",-1);
            setcookie("password","",-1);
        }
    }else{
        echo("Invalid Username or Password");
    }
 }