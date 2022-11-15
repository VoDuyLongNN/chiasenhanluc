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
   <link rel="stylesheet" href="public/font/fontawesome-free-6.0.0-web/css/all.min.css">
   <title>Tìm việc</title>
</head>

<body>
    <?php require_once './mvc/views/Pages/Header.php' ?>
    <?php require_once './mvc/views/Pages/Breadscrumb.php' ?>
    <section class="containt">
        <div class="side-bar">
            <h1 class="side-bar__header">Lọc bài đăng</h1>
            <div class="side-bar_filter">
                <div class="side-bar__filter-category">
                    <h4 class="side-bar__filter-category-title">
                        Lĩnh Vực
                    </h4>
                    <div class="side-bar__filter-category-droplist">
                        <select
                            class="side-bar__filter-category-item category-droplist__Fields side-bar__filter-category-field">

                        </select>
                    </div>
                </div>
                <div class="side-bar__filter-category">
                    <h4 class="side-bar__filter-category-title">
                        Thời gian làm việc
                    </h4>
                    <div class="side-bar__filter-category-droplist">
                        <div class="Droplist-Experience">
                            <label for="timeWork">
                                <input type="checkbox" class="cbtimeWork selection__User" name="cbtimeWork"
                                    id='timeWork' value="Full time">
                                Full time
                            </label>
                            <label for="timeWork1">
                                <input type="checkbox" class="cbtimeWork selection__User" name="cbtimeWork"
                                    id='timeWork1' value="Part time">
                                Part time
                            </label>
                        </div>
                    </div>
                </div>
                <div class="side-bar__filter-category">
                    <h4 class="side-bar__filter-category-title">
                        Kinh nghiệm
                    </h4>
                    <div class="side-bar__filter-category-droplist">
                    <div class="Droplist-Experience">
                            <label for="Experience">
                                <input type="checkbox" class="cbExperience selection__User" name="cbExperience"
                                    id='Experience' value="0">
                                Dưới 1 năm
                            </label>
                            <label for="Experience1">
                                <input type="checkbox" class="cbExperience selection__User" name="cbExperience"
                                    id='Experience1' value="1">
                                1 năm
                            </label>
                            <label for="Experience2">
                                <input type="checkbox" class="cbExperience selection__User" name="cbExperience"
                                    id='Experience2' value="2">
                                2 năm
                            </label>
                            <label for="Experience3">
                                <input type="checkbox" class="cbExperience selection__User" name="cbExperience"
                                    id='Experience3' value="3">
                                3 năm
                            </label>
                            <label for="Experience4">
                                <input type="checkbox" class="cbExperience selection__User" name="cbExperience"
                                    id='Experience4' value="4">
                                4 năm
                            </label>
                            <label for="Experience5">
                                <input type="checkbox" class="cbExperience selection__User" name="cbExperience"
                                    id='Experience5' value="5">
                                5 năm
                            </label>
                            <label for="Experience6">
                                <input type="checkbox" class="cbExperience selection__User" name="cbExperience"
                                    id='Experience6' value="6">
                                Trên 5 năm
                            </label>
                        </div>
                    </div>
                </div>

                <div class="side-bar__filter-category">
                    <h4 class="side-bar__filter-category-title">
                        Địa Chỉ
                    </h4>
                    <div class="side-bar__filter-category-droplist category-droplist__City">
                        <div class="Droplist-City">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="containt-right">
            <ul class="list__individual list__individual--ArticleCompany">

            </ul>

            <div class="MainProduct__Pagination MainProduct__Pagination--Company">

            </div>
        </div>
    </section>
    <?php require_once './mvc/views/Pages/Footer.php' ?>
    <script src="./public/js/Ajax.js"></script>
    <script>
        const listMenuItem = document.querySelectorAll('.menu__list-link');
        listMenuItem.forEach((item) =>{
            if(item.innerText === 'Tìm Việc')
                item.classList.add('active');
            else item.classList.remove('active');
        })
   </script>
</body>

</html>