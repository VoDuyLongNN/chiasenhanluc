<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="public/images/Avatar/logo.png" type="image/x-icon" sizes="32*32">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link rel="stylesheet" type="text/css" href="./public/font/fontawesome-free-6.0.0-web/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="./public/css/style.css">
    <title>Register</title>
</head>

<body>
    <?php require_once './mvc/views/Pages/Header.php' ?>

    <div class="Register">
        <div class="Register-Card">
            <div class="Register-Card--Item Card-Company">
                <div class="Register-Card--Image">
                    <i class="fa-solid fa-building"></i>
                </div>

                <div class="Register-Card--Content">
                    <h1>Company</h1>
                    <p>Welcome to us</p>
                    <p>Register account with roles Company</p>
                </div>

                <div class="Card-Company--Selection Register-Card--Selection">
                    <input type="Button" data-roles="Company" class="Register--Company Register--Roles"
                        value="Selection">
                </div>
            </div>

            <div class="Register-Card--Item Card-Personally">
                <div class="Register-Card--Image">
                    <i class="fa-solid fa-school"></i>
                </div>

                <div class="Register-Card--Content">
                    <h1>School</h1>
                    <p>Welcome to us</p>
                    <p>Register account with roles School</p>
                </div>

                <div class="Card-Company--Selection Register-Card--Selection">
                    <input type="Button" data-roles="School" class="Register--School Register--Roles" value="Selection">
                </div>
            </div>

            <div class="Register-Card--Item Card-School">
                <div class="Register-Card--Image">
                    <i class="fa-solid fa-person"></i>
                </div>

                <div class="Register-Card--Content">
                    <h1>Personally</h1>
                    <p>Welcome to us</p>
                    <p>Register account with roles Personally</p>
                </div>

                <div class="Card-Company--Selection Register-Card--Selection">
                    <input type="Button" data-roles="Personally" class="Register--Peronally Register--Roles"
                        value="Selection">
                </div>
            </div>
        </div>

        <div class="Register-Infor">
            <div class="Login-Card Register-Infor__Card">
                <div class="Login-Card__Left Login-Card__Title">
                    <i class="fa-solid fa-circle-user"></i>
                    <h1>Welcome Back !</h1>
                    <p>You already have an account</p>
                    <input type="button" class="Action--Design Action__toPageLogin" value="Login">
                </div>
                <div class="Login-Card__Right Register-Card__Right">
                    <div class="Login-Card__Title Login-Card__Right--Title">
                        <h1>Register Account</h1>
                        <p>Register an account to use</p>
                    </div>

                    <div class="Login-Card__Content Card--Account Card--Account--Personally">
                        <div>
                            <input type="email" id="Email" placeholder=" "
                                class="Register-Email Login-Card__Content Login-Card--Focus">
                            <label for="Email" class="Login-Label Email-Account">Email</label>
                        </div>

                        <div>
                            <input type="Password" id="Password" placeholder=" "
                                class="Register-Password Login-Card__Content Login-Card--Focus">
                            <label for="Password" class="Login-Label Email-Account">Password</label>
                        </div>

                        <div>
                            <input type="text" id="Name" placeholder=" "
                                class="Register-Name Login-Card__Content Login-Card--Focus">
                            <label for="Name" class="Login-Label Email-Account">Name</label>
                        </div>

                        <div>
                            <input type="Date" id="BirthDay" placeholder=" "
                                class="Register-BirthDay Login-Card--Focus">
                            <label for="BirthDay" class="Login-Label Email-Account">BirthDay</label>
                        </div>

                        <div>
                            <input type="text" id="Phone" placeholder=" "
                                class="Register-Phone Login-Card__Content Login-Card--Focus">
                            <label for="Phone" class="Login-Label Email-Account">Phone</label>
                        </div>

                        <div class="Register-Infor__Address">
                            <select class="Register-Infor__Address--Fields">

                            </select>
                        </div>

                        <div class="Register-Infor__Address Register-Infor__City">
                            <select class="Register-Infor__Address--City">

                            </select>

                            <select name="" id="" class="Register-Infor__District">

                            </select>

                            <select name="" id="" class="Register-Infor__CommuneTown">

                            </select>
                        </div>

                        <div>
                            <input type="text" id="Address" placeholder=" "
                                class="Register-Address Login-Card__Content Login-Card--Focus">
                            <label for="Address" class="Login-Label Email-Account">Address</label>
                        </div>

                        <div class="Register-Infor__Gender">
                            <div>
                                <input type="radio" name="rdGender" value="Male" id="rdGenderMale">
                                <label for="rdGenderMale">Male</label>
                            </div>
                            <div>
                                <input type="radio" name="rdGender" value="Female" id="rdGenderFemale">
                                <label for="rdGenderFemale">Female</label>
                            </div>
                        </div>

                        <div class="Register-Infor__Introduce">
                            <textarea name="" id="" class="Register--Introduce"></textarea>
                        </div>

                        <p class="Register--Error"></p>
                    </div>

                    <div class="Login-Card__Action Register-Card__Action">
                        <div class='Card--Flex'>
                            <input type="button" class="Register--Design Action--Design" value="Register">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require_once './mvc/views/Pages/Footer.php' ?>

    <script src="./public/js/Ajax.js"></script>

</body>

</html>