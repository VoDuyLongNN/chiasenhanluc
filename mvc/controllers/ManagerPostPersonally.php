<?php
use PhpParser\Node\Stmt\Function_;
    header("Access-Control-Allow-Origin: *");
    class ManagerPostPersonally extends Controller
    {        
        private $model;
        
        public function __construct()
        {
            $this->model = $this->model("PersonallyModel");
        }
        
        function show()
        {
            self::view("ManagerPostPersonally");
        }

        function getArticlePosted()
        {
            $IDPersonally = isset($_SESSION["Logined"]) ? $_SESSION["Logined"][0]["IDLogin"] : null;
            $selectionSort = isset($_POST["selectionSort"]) ? $_POST["selectionSort"] : null;
            $result = $this->model->getArticlePosted($IDPersonally,$selectionSort);

            echo $result;
        }

        function deleteArticlePosted()
        {
            $IDArticle = isset($_POST["IDArticle"]) ? $_POST["IDArticle"] : null;

            $this->model->deleteArticlePosted($IDArticle);
        }
        
        function updateArticlePosted()
        {
            $IDArticle = isset($_POST["IDArticle"]) ? $_POST["IDArticle"] : null;
            $IDFields = isset($_POST["IDFields"]) ? $_POST["IDFields"] : null;
            $Position = isset($_POST["Position"]) ? $_POST["Position"] : null;
            $Title = isset($_POST["Title"]) ? $_POST["Title"] : null;
            $Description = isset($_POST["Description"]) ? $_POST["Description"] : null;
            $Experience = isset($_POST["Experience"]) ? $_POST["Experience"] : null;
            $dateEnd = isset($_POST["dateEnd"]) ? $_POST["dateEnd"] : null;
            $timeWork = isset($_POST["timeWork"]) ? $_POST["timeWork"] : null;

            $this->model->updateArticlePosted($IDArticle,$IDFields,$Position,$Title,$Description,$Experience,$dateEnd,$timeWork);
        }
    }
?>