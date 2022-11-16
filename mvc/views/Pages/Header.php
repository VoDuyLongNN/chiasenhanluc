<header>
    <nav class="header__nav">
        <div class="header__logo">
            <a href="Home"><img class="header__logo-img" src="public/images/Avatar/logo.png" alt=""></a>
        </div>
        <div class="header__right">
            <ul class="header__catelogy">
                <li class="header__catelogy-item"><i class="fa-solid fa-bell"></i></li>
                <li class="header__catelogy-item"><i class="fa-solid fa-comment"></i></li>
            </ul>
            <div class="header__catelogy-user">
                <?php
                    if(isset($_SESSION["Logined"]))
                    { ?>

                <div class="header__catelory-user--Contain">
                    <div class="header__catelory-user-avt">
                        <img src="<?php echo $_SESSION["Logined"][0]["image"] ?>" alt=""
                            class="header__catelogy-item-user-avt">
                    </div>

                    <div class="header__catelory-user-infor">
                        <p>
                            <?php echo $_SESSION["Logined"][0]["name"] ?> </p>
                        <p>
                            <?php echo $_SESSION["Logined"][0]["roles"] ?>
                        </p>
                    </div>

                    <div class="header__catelory-user--Droplist">
                        <i class="fa-solid fa-caret-down"></i>

                        <?php if($_SESSION["Logined"][0]["roles"] == "Personally") { ?>
                        <div class="model user-menu">
                            <ul class="user-menu__list">
                                <li class="user-menu__list-item">
                                    <i class="fa-solid fa-user"></i>
                                    <a href="InforUser" class="user-menu__list-item-link">Hồ sơ cá nhân</a>
                                </li>
                                <li class="user-menu__list-item">
                                    <i class="fa-solid fa-list-check"></i>
                                    <a href="ManagerPostPersonally" class="user-menu__list-item-link">Quản lý bài
                                        đăng</a>
                                </li>
                                <li class="user-menu__list-item user-menu__list-item--WorkInterested">
                                    <i class="fa-solid fa-cloud"></i>
                                    <a class="user-menu__list-item-link">Công việc quan tâm</a>
                                </li>

                                <li class="user-menu__list-item user-menu__list-item--WorkInterested">
                                    <i class="fa-solid fa-clipboard-list"></i>
                                    <a class="user-menu__list-item-link">Yêu cầu tuyển dụng</a>
                                </li>

                                <li class="user-menu__list-item user-menu__list-item-logout">
                                    <i class="fa-solid fa-right-to-bracket"></i>
                                    <a class="user-menu__list-item-link">Đăng Xuất</a>
                                </li>
                            </ul>
                        </div>
                        <?php } 
                        else{ ?>
                        <div class="model user-menu">
                            <ul class="user-menu__list">
                                <li class="user-menu__list-item">
                                    <i class="fa-solid fa-user"></i>
                                    <a href="InforUser" class="user-menu__list-item-link">Hồ sơ cá nhân</a>
                                </li>
                                <li class="user-menu__list-item">
                                    <i class="fa-solid fa-list-check"></i>
                                    <a href="" class="user-menu__list-item-link">Quản lý bài đăng</a>
                                </li>
                                <li class="user-menu__list-item">
                                    <i class="fa-solid fa-chart-column"></i>
                                    <a href="" class="user-menu__list-item-link">Thống kê</a>
                                </li>
                                <li class="user-menu__list-item user-menu__list-item-logout">
                                    <i class="fa-solid fa-right-to-bracket"></i>
                                    <a class="user-menu__list-item-link">Đăng Xuất</a>
                                </li>
                            </ul>
                        </div>
                        <?php } ?>
                    </div>
                </div>


                <?php 
                if($_SESSION["Logined"][0]["roles"] == "Company" ) { ?>
                <div class="header__catelory-user-posting header__catelory-user-posting--Company">
                    <button>Đăng Bài</button>
                </div>
                <?php }
                else { ?>
                <div class="header__catelory-user-posting header__catelory-user-posting--Personally">
                    <button>Đăng Bài</button>
                </div>
                <?php } ?>
            </div>
            <?php } else { ?>
            <a href="Login">
                <i class="fa-solid fa-user"></i>
            </a>
            <?php }?>
        </div>
    </nav>
    <div class="menu">
        <ul class="menu__list">
            <li class="menu__list-item"><a class="menu__list-link" href="Home">Giới Thiệu</a></li>
            <li class="menu__list-item"><a class="menu__list-link" href="Personally&title=Nguồn nhân lực">Nguồn Nhân
                    Lực</a></li>
            <li class="menu__list-item"><a class="menu__list-link" href="Company&title=Tìm việc">Tìm Việc</a></li>
            <li class="menu__list-item"><a class="menu__list-link" href="vechungtoi">Về Chúng Tôi</a></li>
        </ul>

    </div>

</header>

<section class="fix-header"></section>

<script>
const userAvt = document.querySelector('.header__catelory-user--Contain');
const userMenu = document.querySelector('.user-menu');
userAvt.addEventListener('click', function() {
    userMenu.classList.toggle('user-menu__active');
})
</script>