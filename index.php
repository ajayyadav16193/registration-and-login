<?php
    require_once 'connection.inc.php';
    if(isset($_SESSION['USER_ID'])){
        header('location:dashboard.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <title>Registration And Login</title>
</head>
<body>
    <!-- Login Start -->
    <div class="navabar" style="background-color: darkgray; padding-top: 5px; padding-bottom: 5px;">
        <div class="row">
            <div class="col-md-7">
                <div id="message" class="alert-success"></div>
            </div>
            <div class="col-md-5">
                <form id="loginform" method="post">
                    <input type="email" name="loginemail" id="loginemail" placeholder="Email" required="">
                    <input type="password" name="loginpassword" id="loginpassword" placeholder="Password" required="">
                    <input type="submit" name="login" id="login" class="btn-primary" value="Sign In">
                </form>
            </div>
        </div>
    </div>
    <!-- Login End -->

    <!-- Registration Start -->
    <div class="row" style="margin-top: 30px;">
        <div class="col-md-7"></div>
        <div class="col-md-4">
            <h3 class="text-center">Registration Form</h3>
            <form id="registrationform" method="post" enctype="multipart/form-data">
                <div>
                    <input type="text" name="fname" id="fname" class="form-control" placeholder="First Name" required="">
                    <input type="text" name="lname" id="lname" class="form-control" placeholder="Last Name" required="">
                </div>
                <div>
                    <input type="text" id="username" name="username" class="form-control" placeholder="Enter username" required="">
                </div>
                <div>
                    <input type="email" id="email" name="email" class="form-control" placeholder="Enter email" required="">
                </div>
                <div>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Enter Password" required="">
                </div>
                <div>
                    <input type="text" id="mobile" name="mobile" class="form-control" placeholder="Mobile" required="">
                </div>
                <div>
                    <label for="image">Upload Image : </label>
                    <input type="file" id="image" name="image" class="form-control" placeholder="Upload Image" required="">
                </div>
                <div>
                    &nbsp;<input type="submit" id="btn-register" class="btn-success form-control" value="Register">
                </div>
            </form>
        </div>
        <div class="col-md-1"></div>
    </div>
    <!-- Registration End -->

    <script src="assets/js/jquery-3.5.1.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>
</html>

<script>
    $(document).ready(()=>{
        $(document).on("submit","#loginform",function(e){
            e.preventDefault();
            let loginemail = $("#loginemail").val();
            let loginpassword = $("#loginpassword").val();
            let formdata = {
                loginemail : loginemail,
                loginpassword : loginpassword
            }
            let url = 'http://localhost/webproject/login.php';
            $.ajax({
                type : 'POST',
                url : url,
                data : formdata,
                success : data =>{
                    if(data === "error"){
                        window.location.href = 'http://localhost/webproject/index.php?error=incorrectcredentials';
                    }else{
                        window.location.href = 'http://localhost/webproject/dashboard.php';
                    }
                }
            })
        })

        $(document).on("submit","#registrationform",function(e){
            e.preventDefault();
            let formdata = new FormData(this);                                
            let msg = '';
            let url = 'http://localhost/webproject/registration.php';
            $.ajax({
                type : 'POST',
                url : url,
                data : formdata,
                contentType : false,
                processData : false,
                cache : false,
                success : data =>{
                    if(data == "inserted"){
                        msg = "User registered successfully";
                    }else{
                        msg = "User not registered";
                    }
                    $("#registrationform").trigger("reset");
                    $("#message").html(msg).delay(3000).fadeOut("slow");
                }
            })
        })  
    })
</script>