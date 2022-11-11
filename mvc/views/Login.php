<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link rel="stylesheet" type="text/css" href="./public/font/fontawesome-free-6.0.0-web/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="./public/css/style.css">
    <title>Login</title>
</head>

<body>
    <?php require_once './mvc/views/Pages/Header.php' ?>

    <div class="Login">
        <div class="Login-Card">
            <div class="Login-Card__Left Login-Card__Title">
                <i class="fa-solid fa-circle-user"></i>
                <h1>Welcome Back !</h1>
                <p>To keep connected with us please login with your personal infor</p>
            </div>
            <div class="Login-Card__Right">
                <div class="Login-Card__Title Login-Card__Right--Title">
                    <h1>Login Account</h1>
                    <div class="Login-Card__IconLogin">
                        <div class="Login-Card__Icon"><i class="fa-brands fa-facebook"></i></div>
                        <div class="Login-Card__Icon"><i class="fa-brands fa-google-plus"></i></div>
                    </div>
                </div>

                <div class="Login-Card__Content Card--Account">
                    <div>
                        <input type="text" id="Email" placeholder=" "
                            class="Login-Card__Content Login-Card--Focus Login-Card__Content--Email">
                        <label for="Email" class="Login-Label Email-Account">Email</label>
                    </div>
                    <div>
                        <input type="password" id="Password" placeholder=" "
                            class="Login-Card__Content Login-Card--Focus Login-Card__Content--Password">
                        <label for="Password" class="Login-Label Password-Account">Password</label>
                    </div>

                    <p class="Register--Error"></p>
                </div>

                <div class="Login-Card__Action">
                    <div class='Card--Flex'>
                        <input type="button" class="Action--Design Login-Card__Action--Register" value="Register">
                        <input type="button" class="Action--Design Login-Card__Action--Login" value="Login">
                    </div>
                    <a class="Login-Card__Action--Forgot" href="ForgotPassword"><i
                            class="fa-sharp fa-solid fa-arrow-rotate-right"></i>Forgot
                        Password</a>
                </div>
            </div>
        </div>
    </div>

    <?php require_once './mvc/views/Pages/Footer.php' ?>

    <script src="./public/js/Ajax.js"></script>

</body>

</html>