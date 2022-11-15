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

    <div class="Manager-Post">
        <div class="Manager-Post__Contain">
            <h1>Manager Post</h1>
            <div class="Manager-Post__Contain-Sort">
                <select name="" class="Manager-Post__Contain-SelectionSort" id="">
                    <option selected value="-1">Tất cả</option>
                    <option value="1">Còn hạn</option>
                    <option value="0">Hết hạn</option>
                    <option value="2">Đang duyệt</option>
                    <option value="3">Bài đăng gần nhất</option>
                    <option value="4">Bài đăng cũ nhất</option>
                </select>
            </div>
            <div class="Manager-Post__Contain--Items">


            </div>
        </div>
    </div>

    <?php require_once "./mvc/views/Pages/Footer.php" ?>

    <script src="./public/js/Ajax.js"></script>
</body>

</html>