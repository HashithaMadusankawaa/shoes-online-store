<?php

include("conection.php");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>WAKTA | Signup and Sign in</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet" />
    <link rel="icon" href="resoerce/Wakta.png" />
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <!---signup-->
            <div class="col-12 col-lg-12" id="signUpBox">
                <div class="row">
                    <div class="lf1 col-col-12 col-lg-4 offset-lg-1 ">
                        <div class="row ">
                            <div class="header col-12 col-lg-12">
                                <p class="SHOES text-center text-light fw-bold mt-4 fs-2">SHOES</p>
                            </div>
                            <div class="image col-12 col-lg-12">
                                <img class="phoneimage" src="resoerce/S1.png" />
                            </div>
                            
                        </div>
                    </div>
                    <div class="lf2 col-12 col-lg-6 ">
                            <div class="row m-3">
                                
                                <div class="col-12 col-lg-12">
                                    <h4 class="logoname text-start fw-bold">SHOES</h4>
                                </div>
                                
                                    <div class="row ">
                                        <div class="col-6 col-lg-6">
                                            <h3 class="text-start text-dark mt-3">Create account</h3>
                                            <p>For business, band or celebrity.</p>
                                        </div>
                                          <!--massage view--->
                                    <div class="col-6 col-lg-6 d-none bg-dark" id="msgdiv">
                                            <div class="col alert alert-danger" role="alert" id="msg">

                                            </div>
                                        </div>
                                <!--end-->
                                    </div>
                                 
                                <div class="row">
                                    <div class="col">
                                        <label for="First name" class="form-label">First Name</label>
                                      <input type="text" class="form-control" placeholder="" aria-label="First name" id="fname">
                                    </div>
                                    <div class="col">
                                        <label for="First name" class="form-label">Last Name</label>
                                      <input type="text" class="form-control" placeholder="" aria-label="Last name" id="lname">
                                    </div>
                                    <div class="col-12">
                                        <label for="email" class="form-label">Email</label>
                                      <input type="email" class="form-control" placeholder="" aria-label="email" id="email">
                                    </div>
                                    <div class="col-12">
                                        <label for="password" class="form-label">Password</label>
                                      <input type="password" class="form-control" placeholder="" aria-label="password" id="password">
                                    </div>
                                    <div class="col-6">
                                        <label for="mobile" class="form-label">Mobile</label>
                                      <input type="text" class="form-control" placeholder="" aria-label="obile" id="mobile">
                                    </div>
                                    <div class="col-6">
                                        <label for="gender" class="form-label">Gender</label>
                                        <select class="form-select" aria-label="Default select example" id="gender">
                                            

                                            <?php
                                            
                                            $rs = Database::search("SELECT*FROM `gender`");
                                            $num = $rs->num_rows;

                                            for ($x=0; $x < $num; $x++) { 
                                                $data = $rs->fetch_assoc();

                                                ?>
                                                
                                                <option value="<?php echo $data["gender_id"];?>">
                                                    <?php echo $data["gender_name"];?>
                                                </option>

                                                <?PHP
                                            }

                                            
                                            ?>

                                            

                                            
                                           
                                            
                                          </select>
                                    </div>
                                   
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                            <label class="form-check-label" for="flexCheckChecked">
                                                I agree to all the Terms and Privacy policy 
                                            </label>
                                          </div>
                                    </div>
                                    <div class="col-6 d-grid mt-3">
                                        <button class="btn btn-primary" onclick="signup();">Sign up</button>
                                    </div>
                                    <div class="col-6  d-grid mt-3">
                                        <button class="btn btn-dark "><i class="fa-brands fa-google"></i> Sign up with google</button>
                                    </div>
                                    <div class="col-12 mt-2">
                                        <p class="text-center">Don’t have an account? <a href="#" onclick="changView();">Log In</a></p>
                                    </div>
                                    
                                    <div class="col-3 text-start ">
                                        <img src="resoerce/App Store Badge.jpg"/>
                                    </div>
                                    <div class="col-3 text-start ">
                                        <img src="resoerce/Google Play Badge.jpg"/>
                                    </div>
                                    <div class="col-12 mt-2">
                                        <p class="text-center">2023 SHOES.COM || All Rights Reserved</p>
                                    </div>

                                  </div>

                                  


                            </div>
                    </div>
                </div>
            </div>

            <!--sign in-->
            <div class="col-12 col-lg-12 d-none" id="signInBox">
                <div class="row">
                    <div class="lf1 col-col-12 col-lg-4 offset-lg-1 ">
                        <div class="row ">
                            <div class="header col-12 col-lg-12">
                                <p class="SHOES text-center text-light fw-bold mt-4 fs-2">SHOES</p>
                            </div>
                            <div class="image col-12 col-lg-12">
                                <img class="phoneimage" src="resoerce/s1.png" />
                            </div>
                            
                        </div>
                    </div>
                    <div class="lf2 col-12 col-lg-6">
                            <div class="row m-3">
                                
                                <div class="col-12 col-lg-12">
                                    <h4 class="logoname text-start fw-bold">SHOES</h4>
                                </div>
                                <div class="col-12 col-lg-12">
                                    <h3 class="text-start text-dark mt-3">Sign in your account</h3>
                                    <p>For business, band or celebrity.</p>
                                </div>

                                                <!--masseage viwe--->
                                    <div class="col-12 d-none" id="msgdiv1">
                                        <div class="alert alert-danger" role="alert" id="msg1">

                                        </div>
                                    </div>

                                <?php
                                    $email = "";
                                    $password = "";

                                    if(isset($_COOKIE["email"])){
                                        $email = $_COOKIE["email"];
                                    }

                                    if(isset($_COOKIE["password"])){
                                        $password = $_COOKIE["password"];
                                    }
                        
                            ?>

                                <div class="row">
                                    <div class="col-12 mt-5">
                                        <label for="email" class="form-label">Email</label>
                                      <input type="email" class="form-control"  id="email2" value="<?php echo $email;?>">
                                    </div>
                                    <div class="col-12">
                                        <label for="password" class="form-label">Password</label>
                                      <input type="password" class="form-control"  id="password2" value="<?php echo $password; ?>">
                                    </div>
                                    
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""  id="rememberme" checked id="rememberme">
                                            <label class="form-check-label" for="flexCheckChecked">
                                                Remember me
                                            </label>
                                          </div>
                                    </div>
                                    
                                    <div class="col-6 d-grid mt-3">
                                        <button class="btn btn-primary " onclick="signin();">Sign in</button>
                                    </div>
                                    <div class="col-6  d-grid mt-3">
                                        <button class="btn btn-dark "><i class="fa-brands fa-google"></i> Sign-in with google</button>
                                    </div>
                                    <div class="col-12 mt-2">
                                        <p class="text-center">Don’t have an account? <a href="#" onclick="changView();">Sign up</a></p>
                                    </div>
                                    <div class="col-12 mt-2">
                                        <p class="text-center"><a href="#" onclick="forgotPassword();">Forgot Password?</a></p>
                                    </div>
                                    
                                    <div class="col-3 text-start mt-2">
                                        <img src="resoerce/App Store Badge.jpg"/>
                                    </div>
                                    <div class="col-3 text-start mt-2">
                                        <img src="resoerce/Google Play Badge.jpg"/>
                                    </div>
                                    <div class="col-12 mt-5">
                                        <p class="text-center">2023 SHOES.COM || All Rights Reserved</p>
                                    </div>

                                </div>

                                  


                            </div>
                    </div>
                </div>
            </div>

            <!-- content -->

            <!-- modal -->
            <div class="modal" tabindex="-1" id="fpmodal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Forgot Password</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <div class="row g-3">

                                <div class="col-6">
                                    <label class="form-label">New Password</label>
                                    <div class="input-group mb-3">
                                        <input type="password" class="form-control" id="np"/>
                                        <button id="npb" class="btn btn-outline-primary" type="button" onclick="showPassword1();">Show</button>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <label class="form-label">Re-type Password</label>
                                    <div class="input-group mb-3">
                                        <input type="password" class="form-control" id="rnp"/>
                                        <button id="rnpb" class="btn btn-outline-primary" type="button" onclick="showPassword2();">Show</button>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Verification Code</label>
                                    <input type="text" class="form-control" id="vcode"/>
                                </div>

                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="resetPassword();">Reset</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- modal -->

        </div>


   
        
    </div>










    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>