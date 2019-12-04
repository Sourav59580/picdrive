<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="./js/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/animate.css">
    <link href="https://fonts.googleapis.com/css?family=Francois+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
    <div class="container-fluid animated fadeIn">
        <div class="row">
            <div class="col-md-4 p-4">
                <img src="images/main_pic.jpg" alt="main-pic" class="shadow-lg">
            </div>
            <div class="col-md-4 p-4">
                <h3 class="ml-2 mb-3">SIGN UP</h3>
                <form id="signup-form">
                    <input type="text" name="username" placeholder="ENTER YOUR NAME" required="required" id="name">
                    <div class="email_box">
                        <input type="email" name="email" placeholder="EMAIL" required="required" id="email">
                        <i class="fa fa-circle-o-notch fa-spin show_icon email-loader d-none"
                            style="font-size:18px;"></i>
                    </div>
                    <div class="password_box">
                        <input type="password" name="password" placeholder="PASSWORD" required="required" id="password">
                        <i class="fa fa-eye show_icon password-loader" style="font-size:18px;"></i>
                    </div>
                    <button class="btn float-left py-2 improve-security-btn">CLICK GENERATE TO IMPROVE SECURITY</button>
                    <button class="btn float-right generate-btn">GENERATE</button>

                    <button class="btn submit-btn m-3" disabled>Register now</button>
                    <br>
                    <div class="signup_notice px-3 bg-warning text-light p-2 rounded d-none">
                        <span>Something went wrong,please try again later.</span>
                    </div>
                </form>
                <div class="px-2 d-none activator">
                    <span>Please check your mail to get activation code :</span>
                    <input type="text" name="code" id="code" class="my-3" placeholder="Activation code">
                    <button class="btn btn-dark activate-btn rounded">Active now</button>
                </div>
            </div>
            <div class="col-md-4">
                <h3 class="ml-2 mb-3">LOGIN</h3>
                <form id="login-form">
                    <input type="email" name="email" placeholder="EMAIL" required="required" id="login-email">
                    <div class="login_password_box">
                        <input type="password" name="password" placeholder="PASSWORD" required="required"
                            id="login-password">
                        <i class="fa fa-eye password_show color_password" style="font-size:18px;"></i>
                    </div>
                    <button class="btn login-submit-btn btn-dark float-right">Login now</button>
                    <div class="loginNotice bg-warning p-2 rounded text-light d-none" style="margin-top:70px;">
                        <span id="alertmessage"></span>
                    </div>
                </form>
                <div class="login-notice p-2">

                </div>
                <div class="px-2 login-activator d-none">
                    <span>Please check your mail to get activation code :</span>
                    <input type="text" name="code" id="login-code" class="my-3" placeholder="Activation code">
                    <button class="btn btn-dark login-activate-btn rounded">Active now</button>
                </div>

            </div>
        </div>
    </div>







    <script src="js/login_password_show.js"></script>
    <script src="js/ajax_login.js"></script>
    </script>
    <script src="js/ajax_activate.js"></script>
    <script src="js/ajax_user_check.js"></script>
    <script src="js/ajax_random_password.js"></script>
    <script src="js/show_password.js"></script>
    <script src="js/ajax_sign_up.js"></script>
</body>

</html>