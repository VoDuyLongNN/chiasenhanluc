<?php
    header("Access-Control-Allow-Origin: *");
    class User extends Controller
    {
        private $model;

        function __construct()
        {
            $this->model = $this->model("UserModel");
        }

        //Kiểm tra đăng nhập
        function checkLogin()
        {
            $email = isset($_POST["email"]) ? $_POST["email"] : null;
            $password = isset($_POST["password"]) ? $_POST["password"] : null;
            
            $hashPassword = $this->model->getPasswordUser($email);
            
            if(password_verify($password,$hashPassword) != 0)
            {
                $row = $this->getInforUser($email);

                $result = json_decode($row,true);

                if(isset($result[0]["status"]))
                {
                    $_SESSION["Logined"] = $result;

                    $this->getFieldWithAccount($_SESSION["Logined"][0]["IDLogin"]);
                    
                    echo 1;
                }
                else
                {
                    echo "Tài khoản bạn chưa được xác thực";
                }
            }
            else
            {
                echo "Đăng nhập thất bại. Vui lòng Xem lại mật khẩu hoặc Email!!!";
            }
        }

        //lấy lĩnh vực của tài khoản
        function getFieldWithAccount($ID)
        {
            $row = $this->model->getFieldWithAccount($ID);
            $result = json_decode($row,true);
            
            $_SESSION["Field"] = $result;
        }

        function logOut()
        {
            unset($_SESSION["Logined"]);
        }

        //Đổi mật khẩu
        function changePass()
        {
            $email = isset($_POST["email"]) ? $_POST["email"] : null;
            $password = isset($_POST["password"]) ? $_POST["password"] : null;

            $hashPassword = $this->model->getPasswordUser($email);
            
            if(password_verify($password,$hashPassword) == true)
            {
                $this->model->changePasswordUser($_SESSION['Logined'][0]['IDLogin'],password_hash($password, PASSWORD_DEFAULT));
                echo "Đổi mật khẩu thành công !";
            }
            else
            {
                echo "Mật khẩu cũ không đúng";
            }
        }

        //Lấy thông tin người dùng
        function getInforUser($email)
        {
            $result = $this->model->getInforUser($email);

            return $result;
        }
        
        function getCategoryUser(){
            $email = isset($_SESSION['Logined']) ? $_SESSION["Logined"][0]["email"] : null;
            $result = $this->model->getInforUser($email);
            echo $result;
        }
        //Đăng ký người dùng
        function registerUser()
        {
            $email = isset($_POST["Email"]) ? $_POST["Email"] : null;
            $password = isset($_POST["Password"]) ? $_POST["Password"] : null;
            $roles = isset($_POST["roles"]) ? $_POST["roles"] : null;
            $name = isset($_POST["Name"]) ? $_POST["Name"] : null;
            $birthDay = isset($_POST["birthDay"]) ? $_POST["birthDay"] : null;
            $phone = isset($_POST["Phone"]) ? $_POST["Phone"] : null;
            $city = isset($_POST["City"]) ? $_POST["City"] : null;
            $address = isset($_POST["Address"]) ? $_POST["Address"] : null;
            $fields = isset($_POST["Fields"]) ? $_POST["Fields"] : null;
            $gender = isset($_POST["Gender"]) ? $_POST["Gender"] : null;
            $Introduce = isset($_POST["Introduce"]) ? $_POST["Introduce"] : null;

            $image = "Public/images/Avatar/noavatar.png";

            $status = 0;

            if($roles == "Personally")
            {
                $status = 1;
            }

            if($email == null || $password == null || $roles == null || $name == null)
            {
                echo "Thông tin không được phép để trống !";
            }
            else if(strlen($phone) > 12)
            {
                echo "Số điện thoại quá dài. không được xác định !!!";
            }
            else if(strlen($name) < 1)
            {
                echo "Vui lòng nhập tên của bạn!";
            }
            else if($this->checkIdentityEmail($email) == false)
            {
                echo "Email phải có định dạng '@gmail.com'!";
            }
            else if($this->checkEmail($email) == true)
            {
                echo "Email đã được đăng ký. Vui lòng chọn email khác!!!";
            }
            else if(strlen($password) < 6)
            {
                echo "Vui lòng chọn mật khẩu dài hơn 6 ký tự!!!";
            }
            else if($roles == null)
            {
                echo "Vui lòng chọn vai trò người dùng";
            }
            else
            {
                $this->model-> register($email,password_hash($password, PASSWORD_DEFAULT),$roles,$name,$birthDay,$phone,$city,$Introduce,$address,$fields,$gender,$image,$status);
                
                echo 1;
            }
        }
        
        //kiểm tra email tồn tại chưa
        function checkEmail($email)
        {
            $result = $this->model->checkEmail($email);

            return $result;
        }

        //kiểm tra email định dạng Email
        function checkIdentityEmail($email)
        {
            if(!strstr($email,'@gmail.com'))
            {
                return false;
            }

            return true;
        }

        //danh sách thành phố
        function getCity()
        {
            $result = $this->model->getCity();

            echo $result;
        }

        //danh sách quận huyện
        function getDistrict()
        {
            $IDTP = isset($_POST["IDTP"]) ? $_POST["IDTP"] : null;

            $result = $this->model->getDistrict($IDTP);

            echo $result;
        }

        //danh sách xã phường thị trấn
        function getCommune()
        {
            $IDQH = isset($_POST["IDQH"]) ? $_POST["IDQH"] : null;

            $result = $this->model->getCommune($IDQH);

            echo $result;
        }

        //danh sách lĩnh vực
        function getFields()
        {
            $result = $this->model->getFields();

            echo $result;
        }
    }
?>