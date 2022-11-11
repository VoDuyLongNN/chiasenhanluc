<?php
    class InforUser extends Controller
    {
        private $model;

        public function __construct()
        {
            $this->model = $this->model("UserModel");
        }
        public function show()
        {
            $listCitys = $this->getCity();
            $listFields = $this->getFields();
            $inforRoles = $this->getInforWithRoles();
            
            $this->view("InforUser", [
                "listCity" => json_decode($listCitys,true),
                "listFields" => json_decode($listFields,true),
                "inforRoles" => json_decode($inforRoles,true)
            ]);
        }

        //danh sách thành phố
        function getCity()
        {
            $result = $this->model->getCity();

            return $result;
        }

        //danh sách lĩnh vực
        function getFields()
        {
            $result = $this->model->getFields();
   
            return $result;
        }
        public function getInforWithRoles()
        {
            $IDLogin = isset($_SESSION['Logined']) ? $_SESSION["Logined"][0]["IDLogin"] : null;
            $Roles = isset($_SESSION['Logined']) ? $_SESSION["Logined"][0]["roles"] : null;

            $result = $this->model->getInforWithRoles($IDLogin, $Roles);

            return $result;
        }

        function updateInforUser()
        {
            // infor user
            $IDLogin = isset($_SESSION['Logined']) ? $_SESSION["Logined"][0]["IDLogin"] : null;
            $Role = isset($_SESSION['Logined']) ? $_SESSION["Logined"][0]["roles"] : null;
            $Name = isset($_POST["Name"]) ? $_POST["Name"] : null;
            $birthDay = isset($_POST["birthDay"]) ? $_POST["birthDay"] : null;
            $Phone = isset($_POST["Phone"]) ? $_POST["Phone"] : null;
            $City = isset($_POST["City"]) ? $_POST["City"] : null;
            $Address = isset($_POST["Address"]) ? $_POST["Address"] : null;
            $Introduce = isset($_POST["Introduce"]) ? $_POST["Introduce"] : null;
            $Fields = isset($_POST["Fields"]) ? $_POST["Fields"] : null;
            $Gender = isset($_POST["Gender"]) ? $_POST["Gender"] : null;
            
            $this->model->updateInforUser($IDLogin,$Name,$birthDay,$Phone,$City,$Address);   
            $this->model->updateCategoryUser($IDLogin,$Role,$Introduce,$Fields,$Gender);  
            
            $_SESSION["Logined"][0]["name"] = $Name;
            $_SESSION["Logined"][0]["phone"] = $Phone;
            $_SESSION["Logined"][0]["city"] = $City;
            $_SESSION["Logined"][0]["address"] = $Address;
            $_SESSION["Logined"][0]["birthDay"] = $birthDay;
            $_SESSION["Field"][0]["ID"] = $Fields;
            
            echo $birthDay;
        }
    }
?>