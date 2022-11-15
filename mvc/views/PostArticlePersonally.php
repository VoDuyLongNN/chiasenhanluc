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
    <title>Đăng bài</title>
</head>

<body>
    <?php require_once './mvc/views/Pages/Header.php' ?>
    <section class="container">
        <div class="Notifycation-Post">

        </div>
        <div class="form">
            <div class="form__body">
                <h1 class="form__body-title">Đăng thông tin ứng tuyển</h1>
                <div class="form__body-group">
                    <!-- GROUP 1 -->
                    <div class="form__body-group-1">
                        <h2 class="form__body-group-1-title">I - Lĩnh vực ứng tuyển</h2>
                        <div class="form__body-group-1--Fields">
                            <div class="Contain__Label--Focus Contain__Label--Fields">
                                <input disabled type="text" id="form__body-group-1-input--Fields"
                                    class="Login-Card--Focus form__body-group-1-input form__body-group-1-input--Fields"
                                    name="title" placeholder=" "
                                    data-idfield="<?php echo $_SESSION["Field"][0]["ID"] ?>"
                                    value="<?php echo $_SESSION["Field"][0]["nameField"] ?>">
                                <label for="form__body-group-1-input--Fields"
                                    class="Login-Label Login-Label--Post form__body-group-1-input--Focus">lĩnh
                                    vực</label>
                            </div>

                            <button class="form__body-group--Fields form__body-group--Changed-Fields">Thay
                                đổi</button>
                            <button class="form__body-group--Fields form__body-group--CancelChange-Fields">Hủy</button>
                        </div>

                        <select name="fields" id=""
                            class="category-droplist__Fields post__Personally--Fields form__body-group-1-input">
                        </select>

                        <div class="Contain__Label--Focus">
                            <input type="text" id="form__body-group-1-input--Postion"
                                class="Login-Card--Focus form__body-group-1-input--Position form__body-group-1-input"
                                name="Postion" placeholder=" ">
                            <label for="form__body-group-1-input--Postion"
                                class="Login-Label Login-Label--Post form__body-group-1-input--Focus">Vị trí việc
                                làm</label>
                        </div>
                        <div class="Contain__Label--Focus">
                            <input type="text" id="form__body-group-1-input--Title"
                                class="Login-Card--Focus form__body-group-1-input form__body-group-1-input--Title"
                                name="title" placeholder=" ">
                            <label for="form__body-group-1-input--Title"
                                class="Login-Label Login-Label--Post form__body-group-1-input--Focus">Nhập tiêu
                                đề</label>
                        </div>
                    </div>
                    <!-- GROUP 2 -->
                    <div class="form__body-group-2">
                        <h2 class="form__body-group-2-title">II - Mô tả</h2>
                        <textarea name="introduce" id="" cols="30" rows="10"
                            class="form__body-group-2-area form__body-group-1-input--Description"
                            placeholder="VD: Siêng năng, biết sáng tạo nội dung tiktok, sử dụng thành thạo photoshop..."></textarea>
                        <div class="Contain__Label--Focus">
                            <input type="number" id="form__body-group-1-input--requirement"
                                class="Login-Card--Focus form__body-group-1-input form__body-group-1-input--experience"
                                name="experience" placeholder=" ">
                            <label for="form__body-group-1-input--requirement"
                                class="Login-Label Login-Label--Post form__body-group-1-input--Focus">Số năm kinh
                                nghiệm</label>
                        </div>

                        <select name="timeWork" id="" class="form__body-group-2-input post__Company--timeWork">
                            <option disabled selected value>- Thời gian -</option>
                            <option value="Full time">Full time</option>
                            <option value="Part time">Part time</option>
                        </select>

                        <div class="Contain__Label--Focus">
                            <input type="date" id="form__body-group-1-input--dateEnd"
                                class="Login-Card--Focus form__body-group-1-input form__body-group-1-input--dateEnd"
                                name="dateEnd" placeholder=" ">
                            <label for="form__body-group-1-input--dateEnd"
                                class="Login-Label Login-Label--Post form__body-group-1-input--Focus">Thời hạn bài
                                đăng</label>
                        </div>
                    </div>

                    <!-- GROUP 4 -->
                    <div class="form__body-group-4">
                        <button
                            class="form__body-group-4-button form__body-group-4-button-post postArticle__Personally">Đăng
                            Tin</button>
                        <button class="form__body-group-4-button form__body-group-4-button-save">Lưu bản nháp</button>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <?php require_once './mvc/views/Pages/Footer.php' ?>
    <script src="./public/js/Ajax.js"></script>
</body>

</html>