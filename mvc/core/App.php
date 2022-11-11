<?php
    class App{
        //html://localhost//MVC/Home/SayHi/1/2/3
        protected $controller = "Home";
        protected $action = "show";
        protected $params = [];

        function __construct(){
            $arr = $this->urlProcess();
            // print_r($arr);

            //Xử lý Controller
            if(file_exists("./mvc/controllers/".$arr[0].".php"))
            {
                $this->controller = $arr[0];

                //Hủy giá trị vị trí 0
                unset($arr[0]);
            }
            
            require_once "./mvc/controllers/".$this->controller.".php";
            $this->controller = new $this->controller;
            
            //Xử lý Action
            if(isset($arr[1]))
            {
                $this->action = $arr[1];
                
                //hủy giá trị vị trí 1
                unset($arr[1]);
            }

            //Xử lý params
            $this->params = $arr?array_values($arr):[];
            
            //gọi lớp (["tên controller", "tên action"], "mảng param")
            call_user_func_array([$this->controller, $this->action], $this->params);
        }

        function urlProcess(){
            //Home/SayHi/1/2/3
            if(isset($_GET["url"]))
            {
                //filter_var: lọc và xóa đi những ký tự trùng khớp
                $temp = filter_var(trim($_GET["url"], "/"));

                //explode: chuyển một chuỗi sang một mảng dựa trên các ký tự phân cách
                $result = explode("/", $temp);

                return $result;
            }
        }
    }
?>