<?php 
    class UserModel extends Database
    {
        //lấy thông tin người dùng
        function getInforUser($email)
        {
            $query = "SELECT * from login as lg join infor_user as ifu on ifu.IDLogin = lg.ID WHERE lg.status = 1";
            
            // if($role == "Company"){
            //     $query .= " join company as cp on cp.IDUser = ifu.IDLogin";
            // }
            // else if($role == "Personally"){
            //     $query .= " join personally as psn on psn.IDUser = ifu.IDLogin";
            // }
            // else if($role == "School"){
            //     $query .= " join school as sc on sc.IDUser = ifu.IDLogin";
            // }

            $query .= " AND lg.email = '".$email."' and lg.status = 1" ;
            $result = mysqli_query(self::$connect,$query);
            $array = array();


            while($row = mysqli_fetch_assoc($result))
            {
                $array[] = $row;
            }
            
            return json_encode($array);
        }

        //lấy mật khẩu người dùng
        function getPasswordUser($email)
        {
            $query = "SELECT * from login WHERE email = '".$email."'";

            $result = mysqli_query(self::$connect,$query);
            
            $row = mysqli_fetch_assoc($result);
            
            $password = mysqli_num_rows($result) > 0 ? $row["password"] : 0;

            return $password;
        }
        
        // đổi mật khẩu
        function changePasswordUser($IDLogin, $newPass){
            $updatePassWord = "UPDATE login SET password = '" . $newPass . "' WHERE login.ID = '" . $IDLogin . "'";
            mysqli_query(self::$connect, $updatePassWord);
        }

        //đăng ký người dùng
        function register($email,$password,$roles,$name,$birthDay,$phone,$city,$introduce,$address,$fields,$gender,$image,$status)
        {
            $insertLogin = "INSERT INTO `login`(`email`, `password`, `roles`, `status`) 
                            VALUES ('".$email."','".$password."','".$roles."','".$status."')";
            mysqli_query(self::$connect,$insertLogin);

            $query = "SELECT max(ID) as ID from login";
            $result = mysqli_query(self::$connect,$query);
            
            $row = mysqli_fetch_assoc($result);

            $IDLogin = $row["ID"];

            $insertInfor = "INSERT INTO `infor_user`(`IDLogin`, `name`,`birthDay`, `phone`, `city`, `address`, `image`) 
                            VALUES ('".$IDLogin."','".$name."','".$birthDay."','".$phone."','".$city."','".$address."','".$image."')";
            mysqli_query(self::$connect,$insertInfor);

            
            if($roles == "Personally")
            {
                $insertPs = "INSERT INTO `personally`(`IDUser`, `IDFields`, `gender`) 
                             VALUES ('". $IDLogin."','".$fields."','".$gender."')";

                mysqli_query(self::$connect,$insertPs);
            }
            else if($roles == "Company")
            {
                $insertCp = "INSERT INTO `company`(`IDUser`, `introduce`) 
                             VALUES ('".$IDLogin."','".$introduce."')";
                mysqli_query(self::$connect,$insertCp);
            }
            else 
            {
                $insertSc = "INSERT INTO `school`(`IDUser`, `introduce`) 
                             VALUES ('".$IDLogin."','".$introduce."')";
                mysqli_query(self::$connect,$insertSc);
            }
        }

        //kiểm tra email tồn tại chưa
        function checkEmail($email)
        {
            $query = "SELECT * from login WHERE email = '".$email."'";

            $result = mysqli_query(self::$connect,$query);

            $temp = mysqli_num_rows($result) > 0 ? true : false;

            return $temp;
        }

        //Lấy danh sách thành phố
        function getCity()
        {
            $query = "SELECT * from devvn_tinhthanhpho";

            $result = mysqli_query(self::$connect, $query);

            $array = array();

            while($row = mysqli_fetch_assoc($result))
            {
                $array[] = $row;
            }

            return json_encode($array);
        }

        
        //Lấy danh sách quận huyện
        function getDistrict($IDTP)
        {
            $query = "SELECT * from devvn_quanhuyen where matp = '".$IDTP."'";

            $result = mysqli_query(self::$connect, $query);

            $array = array();

            while($row = mysqli_fetch_assoc($result))
            {
                $array[] = $row;
            }

            return json_encode($array);
        }

        //Lấy danh sách xã phường
        function getCommune($IDQH)
        {
            $query = "SELECT * from devvn_xaphuongthitran where maqh = '".$IDQH."'";

            $result = mysqli_query(self::$connect, $query);

            $array = array();

            while($row = mysqli_fetch_assoc($result))
            {
                $array[] = $row;
            }

            return json_encode($array);
        }

        //Khôi phục mật khẩu
        function recovery($email,$newPassWord)
        {
            $query = "UPDATE login SET password = '".$newPassWord."' WHERE email = '".$email."'";
            mysqli_query(self::$connect,$query);
        }

        //Lấy danh sách các lĩnh vực
        function getFields()
        {
            $query = "SELECT * from fields";

            $result = mysqli_query(self::$connect, $query);

            $array = array();

            while($row = mysqli_fetch_assoc($result))
            {
                $array[] = $row;
            }

            return json_encode($array);
        }

        //Cập nhật thông tin user
        function updateInforUser($IDLogin,$name,$birthDay,$phone,$city,$address)
        {
            $query = "UPDATE `infor_user` SET `name`='".$name."',`birthDay`='".$birthDay."',`phone`='".$phone."',`city`='".$city."',`address`='".$address."' WHERE IDLogin = '".$IDLogin."'";

            mysqli_query(self::$connect, $query);
        }

        //Cập nhật thông tin user theo vai trò
        function updateCategoryUser($IDLogin,$role,$introduce,$fields,$gender)
        {
            $query = "";
            if($role == "Company"){
                $query = "UPDATE `company` SET `introduce`='".$introduce."' WHERE IDUser = '".$IDLogin."'";
            }
            else if($role == "School"){
                $query = "UPDATE `school` SET `introduce`='".$introduce."' WHERE IDUser = '".$IDLogin."'";
            }
            else if($role == "Personally"){
                $query = "UPDATE `personally` SET `introduce`='".$introduce."',`IDFields`='".$fields."',`gender`='".$gender."' WHERE IDUser = '".$IDLogin."'";
            }

           mysqli_query(self::$connect, $query);
        }

        public function getFieldWithAccount($ID)
        {
            $query = "SELECT f.ID,f.nameField
                      FROM `personally` as ps
                      JOIN fields as f 
                      ON ps.IDFields = f.ID
                      WHERE ps.IDUser = '".$ID."'";
            
            $result = mysqli_query(self::$connect,$query);

            $array = array();

            while($row = mysqli_fetch_assoc($result))
            {
                $array[] = $row;
            }

            return json_encode($array);
        }

        public function getInforWithRoles($IDLogin, $roles)
        {
            $query = "";
            
            if($roles == "Personally")
            {
                $query = "SELECT `introduce`, `gender`, `fileCV` FROM `personally` WHERE IDUser = '".$IDLogin."'";
            }
            else if($roles == "Company")
            {
                $query = "SELECT  `introduce` FROM `company` WHERE IDUser = '".$IDLogin."'";
            }
            else
            {
                $query = "SELECT `introduce` FROM `school` WHERE IDUser = '".$IDLogin."'";
            }

            $result = mysqli_query(self::$connect,$query);

            $array = array();

            while($row = mysqli_fetch_assoc($result))
            {
                $array[] = $row;
            }

            return json_encode($array);
        }
    }
?>