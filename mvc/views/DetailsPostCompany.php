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
    <link rel="stylesheet" href="public/css/DetailsPostCompany.css">
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="public/font/fontawesome-free-6.0.0-web/css/all.min.css">
    <title>Tuyển Dụng</title>
</head>

<body>
    <?php require_once './mvc/views/Pages/Header.php' ?>

    <section class="DetailArticle__Contant">
        <section class="main-contain contain__DetailArticle">
            <div class="post__title">
                <p></p>
            </div>
            <div class="post__city">
                <i class="fa-solid fa-location-dot"></i>
                <p class="post__city--Padding"></p>
                <i class="fa-solid fa-calendar-days post-date--Icon"></i>
                <p class="post-date"></p>
            </div>

            <div class="post__introduce">
                <p></p>
            </div>

            <div class="post__extra-info">
                <span class="post__extra-info-btn post__name-field"></span>
                <span class="post__extra-info-btn post__name-company"></span>
                <span class="post__extra-info-btn post__amount-recruitmented"></span>
            </div>

            <div class="post__main-info">
                <div class="post__desc-job post__main-info-item">
                    <h1 class="post__main-info-title">Mô tả công việc</h1>
                    <div class="post__desc-job-text">
                        <p></p>
                    </div>

                    <div class="post__desc-job-details">
                        <p class="post__desc-job-details-subject">Chi Tiết</p>
                        <p class="post__desc-job-position post__main-info-item-text"></p>
                        <p class="post__desc-job-salary post__main-info-item-text"></p>
                        <p class="post__desc-job-time-work post__main-info-item-text"></p>
                    </div>
                </div>

                <div class="post__requirement-job post__main-info-item">
                    <h1 class="post__main-info-title">Yêu cầu</h1>
                    <p class="post__desc-job-request-requirement post__main-info-item-text"></p>
                    <p class="post__desc-job-request-experience post__main-info-item-text"></p>
                </div>

            </div>

            <div class="post__bottom">
                <?php
               if(isset($_SESSION["Logined"]))
               {?>
                <button class="btn btn--color post__btn post__bottom--Interested">Ứng Tuyển</button>
                <?php }
            else
            {?>
                <a href="Login"
                    class="btn btn--color post__bottom--Interested--Login post__btn post__bottom--Interested">Ứng
                    Tuyển</a>
                <?php }?>
                <button class="btn post__btn">Quan Tâm</button>
            </div>
        </section>
    </section>

    <?php require_once './mvc/views/Pages/Footer.php' ?>

    <script src="./public/js/DetailsPostCompany.js"></script>
    <script src="./public/js/Ajax.js"></script>

</body>

</html>