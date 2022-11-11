<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css">
    <title>Document</title>
</head>

<body>
    <div class="breadcrumb">
        <div class="breadcrumb__background">
            <div class="breadcrumb__background-title">
                <span><?php echo $_GET['title'] ?></span>
            </div>
            <ul class="breadcrumb__background-list">
                <a href="Home">
                    <li class="breadcrumb__background-item">Trang chủ</li>
                </a>
                <i class="fa-solid fa-angle-right"></i>
                <a href="">
                    <li class="breadcrumb__background-item"><?php echo $_GET['title'] ?></li>
                </a>
            </ul>
        </div>
    </div>
</body>

</html>