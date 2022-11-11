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
    <title>Register</title>
</head>

<body>
    <?php

use function PHPSTORM_META\type;

 require_once './mvc/views/Pages/Header.php' ?>

    <div class="Infor">
        <div class="Infor-Contain">
            <h1 class="Infor-Title">Hồ sơ</h1>
            <div class="Infor-Contain__Changed">
                <h2 class="Infor-Contain__Changed--Title">Thông tin cá nhân</h2>
                <div class="Infor-Contain__Changed-Avatar">
                    <label for="">Ảnh đại diện</label>
                    <form class="form__Contain--Avatar" action="" method="POST">
                        <div class="form-Image">
                            <img src="<?php echo $_SESSION["Logined"][0]["image"] ?>" alt="">
                        </div>
                        <div class="form-Image--Upload">
                            <input hidden type="file" id="avatar">
                            <input hidden type="submit" id="submitFile">

                            <label for="avatar" class="form-avatar Selection-Avatar"><i class="fa-solid fa-upload"></i>
                                Chọn ảnh: </label>

                            <label for="submitFile" class="form-avatar Update-Avatar"><i class="fa-solid fa-pen"></i>Cập
                                nhật</label>
                        </div>
                    </form>
                    <Span class="form-avatar--Note">Định dạng .JPG, .JPEG, .PNG dung lượng thấp hơn 300 KB với kích
                        thước tối thiểu
                        300x300 px</Span>
                </div>
                <div class="Card--Account Infor-Contain__Changed-Content">
                    <div>
                        <label for="">Họ tên</label>
                        <input type="text" id="Name" placeholder=" "
                            value="<?php echo $_SESSION["Logined"][0]["name"] ?>"
                            class="Login-Card__Content Login-Card--Focus Infor-Contain__Changed--Name">
                    </div>
                    <div>
                        <label for="">Ngày sinh</label>
                        <input type="Date" id="BirthDay" placeholder=" "
                            value="<?php echo $_SESSION["Logined"][0]["birthDay"] ?>"
                            class="Login-Card--Focus Infor-Contain__Changed--BirthDay">
                    </div>
                    <div>
                        <label for="">Số điện thoại</label>
                        <input type="text" id="Phone" placeholder=" "
                            value="<?php echo $_SESSION["Logined"][0]["phone"] ?>"
                            class="Login-Card__Content Login-Card--Focus Infor-Contain__Changed--Phone">
                    </div>
                    <div class="Register-Infor__Address Infor--Address">
                        <label for="">Lĩnh vực</label>
                        <?php
                        if($_SESSION['Logined'][0]["roles"] == "Personally")
                        {?>
                        <select class="Changed--Fields">
                            <?php
                        foreach($data["listFields"] as $item)
                        {
                            if($item["ID"] == $_SESSION["Field"][0]["ID"])
                            {?>
                            <option value="<?php echo $item["ID"] ?>" selected><?php echo $item["nameField"] ?></option>
                            <?php }?>

                            <option value="<?php echo $item["ID"] ?>"><?php echo $item["nameField"] ?></option>

                            <?php }?>
                        </select>
                        <?php }?>
                    </div>
                    <div class="Register-Infor__Address">
                        <label for="">Thành phố</label>
                        <select class="Changed--City">
                            <?php
                            foreach($data["listCity"] as $item)
                            {
                                if($item["name"] == $_SESSION["Logined"][0]["city"])
                                {?>
                            <option value="<?php echo $item["name"] ?>" selected><?php echo $item["name"] ?></option>
                            <?php }?>

                            <option value="<?php echo $item["name"] ?>"><?php echo $item["name"] ?></option>
                            <?php }?>
                        </select>
                    </div>

                    <div>
                        <label for="">Địa chỉ</label>
                        <input type="Phone" id="Address" placeholder=" "
                            value="<?php echo $_SESSION["Logined"][0]["address"] ?>"
                            class="Login-Card__Content Login-Card--Focus Infor-Contain__Changed--Address">
                    </div>

                    <?php
                    if($_SESSION['Logined'][0]["roles"] == "Personally")
                    {?>
                    <div class="Register-Infor__Gender">
                        <label for="">Giới tính</label>
                        <div>
                            <div>
                                <input type="radio" name="rdGender" value="Male" id="rdGenderMale"
                                    <?php if($data["inforRoles"][0]["gender"] == "Male") echo "checked"?>>
                                <label for="rdGenderMale">Male</label>
                            </div>
                            <div>
                                <input type="radio" name="rdGender" value="Female" id="rdGenderFemale"
                                    <?php if($data["inforRoles"][0]["gender"] == "Female") echo "checked"?>>
                                <label for="rdGenderFemale">Female</label>
                            </div>
                        </div>
                    </div>

                    <div class="Changed-Introduce">
                        <label for="">Giới thiệu</label>
                        <textarea name="" id="" class="Register--Introduce"
                            placeholder="Giới thiệu bản thân"><?php echo $data["inforRoles"][0]["introduce"] ?></textarea>
                    </div>

                    <?php }
                    else if($_SESSION['Logined'][0]["roles"] == "School")
                    {?>
                    <div class="Changed-Introduce">
                        <label for="">Giới thiệu</label>
                        <textarea name="" id="" class="Register--Introduce"
                            placeholder="Giới thiệu bản thân"><?php echo $data["inforRoles"][0]["introduce"] ?></textarea>
                    </div>
                    <?php }
                    else
                    {?>
                    <div class="Changed-Introduce">
                        <label for="">Giới thiệu</label>
                        <textarea name="" id="" class="Register--Introduce"
                            placeholder="Giới thiệu bản thân"><?php echo $data["inforRoles"][0]["introduce"] ?></textarea>
                    </div>
                    <?php }
                ?>
                </div>
                <p class="Register--Error"></p>

                <div class="Infor-Contain__Changed--Update">
                    <input type="button" class="Infor-Contain__Changed--Action" value="Cập nhật">
                </div>
            </div>
        </div>
    </div>

    <?php require_once "./mvc/views/Pages/Footer.php" ?>

    <script src="./public/js/Ajax.js"></script>
</body>

</html>