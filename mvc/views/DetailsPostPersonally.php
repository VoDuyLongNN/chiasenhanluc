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
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="public/css/DetailsPostCompany.css">
    <link rel="stylesheet" href="public/css/DetailsPostPersonally.css">
    <link rel="stylesheet" href="public/font/fontawesome-free-6.0.0-web/css/all.min.css">
    <title>Tìm Việc</title>
</head>

<body>
    <?php require_once './mvc/views/Pages/Header.php' ?>

    <section class="DetailArticle__Contant">
        <section class="main-contain">

            <div class="post__main-info">
                <h1 class="post__main-info-title">Hồ sơ cá nhân</h1>

                <div class="detail-Post--Contain">
                    <div class="post__info-top">
                        <div class="post__info-avt"><img src="" alt=""></div>

                        <div>
                            <div class="post__info-top">
                                <div class="post__info-nextto-avt">
                                    <div class="post__info-details-row post__info--unmargin">
                                        <p class="post__info-subject">Họ tên: </p>
                                        <p class="post__info-describe person-name"></p>
                                    </div>
                                    <div class="post__info-details-row post__info--unmargin">
                                        <p class="post__info-subject">Giới tính: </p>
                                        <p class="post__info-describe person-gender"></p>
                                    </div>
                                </div>
                            </div>

                            <div class="post__info-top--Fields">
                                <p>Lĩnh vực:
                                    <span class="post__info-name-field"></span>
                                </p>
                                <div class="post__city">
                                    <i class="fa-solid fa-location-dot"></i>
                                    <p></p>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="post__info-details">


                    </div>

                    <div class="post__title post-personally__title">
                        <p></p>
                        <p class="post-date"></p>
                    </div>

                    <div class="post-introduce---Personally">
                        <div class="post__info-details-row">
                            <p class="post__info-subject">Thời gian làm việc: </p>
                            <p class="post__info-describe person-work-time"></p>
                        </div>
                        <div class="post__info-details-row">
                            <p class="post__info-subject">Vị trí công việc: </p>
                            <p class="post__info-describe person-position"></p>
                        </div>
                        <div class="post__info-details-row">
                            <p class="post__info-subject">Số năm kinh nghiệm: </p>
                            <p class="post__info-describe person-experience"></p>
                        </div>

                        <div class="post__info-details-row">
                            <p class="post__info-subject">Giới thiệu: </p>
                            <p class="post__info-describe person-introduce"></p>
                        </div>

                        <div class="post__info-details-row">
                            <p class="post__info-subject">Mô tả: </p>
                            <p class="post__info-describe person-description"></p>
                        </div>

                        <div class="post__info-details-row">
                            <p class="post__info-subject">File CV: </p>
                            <p class="post__info-describe"></p>
                        </div>
                    </div>

                    <div class="post__bottom">
                        <button class="btn btn--color post__btn post__bottom--Interested">Tuyển Dụng</button>
                        <button class="btn post__btn">Quan Tâm</button>
                    </div>
                </div>

            </div>
        </section>
    </section>

    <?php require_once './mvc/views/Pages/Footer.php';?>

    <script type="text/javascript" src="./public/js/Ajax.js"></script>
    <script src="./public/js/DetailsPostPersonally.js"></script>
</body>

</html>