<?php
    header("Access-Control-Allow-Origin: *");
    class School extends Controller{

        function getArticleSchool()
        {
            $field = isset($_POST["field"]) ? $_POST["field"] : null;
            $yearGraduate = isset($_POST["yearGraduate"]) ? $_POST["yearGraduate"] : null;
            $fromAmount = isset($_POST["fromAmount"]) ? $_POST["fromAmount"] : null;
            $toAmount = isset($_POST["toAmount"]) ? $_POST["toAmount"] : null;

            $model = $this->model("SchoolModel");

            $result = $model->getArticleSchool($field,$yearGraduate,$fromAmount,$toAmount);
            echo $result;
        }

        public function addArticleSchool()
        {
            $fields = isset($_GET["fields"]) ? $_GET["fields"] : null;
            $amount = isset($_GET["amount"]) ? $_GET["amount"] : null;
            $yearGraduate = isset($_GET["yearGraduate"]) ? $_GET["yearGraduate"] : null;
            $datePost = new DateTime("Asia/Ho_Chi_Minh");
            $experience = isset($_GET["experience"]) ? $_GET["experience"] : null;
            $file = isset($_GET["file"]) ? $_GET["file"] : null;
            $statusPost = 0;
            $model = $this->model("SchoolModel");

            $result = $model->addArticleSchool($fields, $amount, $file, $datePost, $file, $statusPost);

        }
    
    }
?>