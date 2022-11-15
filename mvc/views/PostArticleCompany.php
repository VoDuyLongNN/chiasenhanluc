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
    <title>Đăng tuyển dụng</title>
</head>

<body>
    <?php require_once './mvc/views/Pages/Header.php' ?>
    <section class="container">
        <div class="Notifycation-Post">

        </div>
        <div class="form">
            <div class="form__body">
                <h1 class="form__body-title">Đăng tin tuyển dụng</h1>
                <div class="form__body-group">
                    <!-- GROUP 1 -->
                    <div class="form__body-group-1">
                        <h2 class="form__body-group-1-title">I - Việc cần tuyển dụng</h2>
                        <select name="fields" id=""
                            class="category-droplist__Fields post__Company--Fields form__body-group-1-input">

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
                                class="Login-Label Login-Label--Post form__body-group-1-input--Focus">Tiêu đề</label>
                        </div>
                    </div>
                    <!-- GROUP 2 -->
                    <div class="form__body-group-2">
                        <h2 class="form__body-group-2-title">II - Yêu cầu tuyển dụng</h2>
                        <textarea name="description" id="" cols="30" rows="10"
                            class="form__body-group-2-area form__body-group-1-input--Description form__body-group-1-input--Description"
                            placeholder="Mô tả việc làm"></textarea>
                        <div class="Contain__Label--Focus">
                            <input type="text" id="form__body-group-1-input--requirement"
                                class="Login-Card--Focus form__body-group-1-input--Requirement form__body-group-1-input"
                                name="requirement" placeholder=" ">
                            <label for="form__body-group-1-input--requirement"
                                class="Login-Label Login-Label--Post form__body-group-1-input--Focus">Yêu cầu</label>
                        </div>

                        <div class="Contain__Label--Focus">
                            <input type="number" id="form__body-group-1-input--amountRecruitment"
                                class="Login-Card--Focus form__body-group-1-input--amountRecruitment form__body-group-1-input"
                                name="amountRecruitment" placeholder=" ">
                            <label for="form__body-group-1-input--amountRecruitment"
                                class="Login-Label Login-Label--Post form__body-group-1-input--Focus">Số lượng</label>
                        </div>

                        <div class="Contain__Label--Focus">
                            <input type="number" id="form__body-group-1-input--experience"
                                class="Login-Card--Focus form__body-group-1-input--experience form__body-group-1-input"
                                name="experience" placeholder=" ">
                            <label for="form__body-group-1-input--experience"
                                class="Login-Label Login-Label--Post form__body-group-1-input--Focus">Kinh
                                nghiệm</label>
                        </div>

                        <select name="timeWork" id="" class="post__Company--timeWork form__body-group-1-input">
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
                    <!-- GROUP 3 -->
                    <div class="form__body-group-3">
                        <h2 class="form__body-group-3-title">III - Ngân sách</h2>
                        <div class="form__body-group-3-infor-salary">
                            <div class="Contain__Label--Focus">
                                <input type="number" id="form__body-group-1-input--fromSalary"
                                    class="Login-Card--Focus form__body-group-1-input--fromSalary form__body-group-1-input"
                                    name="fromSalary" placeholder=" ">
                                <label for="form__body-group-1-input--fromSalary"
                                    class="Login-Label Login-Label--Post form__body-group-1-input--Focus">
                                    Từ</label>
                            </div>

                            <div class="Contain__Label--Focus">
                                <input type="number" id="form__body-group-1-input--toSalary"
                                    class="Login-Card--Focus form__body-group-1-input--toSalary form__body-group-1-input"
                                    name="toSalary" placeholder=" ">
                                <label for="form__body-group-1-input--toSalary"
                                    class="Login-Label Login-Label--Post form__body-group-1-input--Focus">Đến</label>
                            </div>
                        </div>
                    </div>
                    <!-- GROUP 4 -->
                    <div class="form__body-group-4">
                        <button class="form__body-group-4-button form__body-group-4-button-post postArticle__Company">Đăng Tin</button>
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