<?php
    header("Access-Control-Allow-Origin: *");
    class Personally extends controller{
        private $model;
        
        public function __construct()
        {
            $this->model = $this->model("PersonallyModel");
        }

        public function show()
        {
            $this->view("ArticlePersonally");
        }
        
        function getArticlePersonally()
        {
            $experience = isset($_POST["experience"]) ? $_POST["experience"] : null;
            $fields = isset($_POST["fields"]) ? $_POST["fields"] : null;
            $city = isset($_POST["city"]) ? $_POST["city"] : null;
            $page = isset($_POST["page"]) ? $_POST["page"] : null;
            $timeWork = isset($_POST["timeWork"]) ? $_POST["timeWork"] : null;
            $countProduct = isset($_POST["countProduct"]) ? $_POST["countProduct"] : null;
            
            $result = $this->model->getArticlePersonally($experience,$fields,$city,$timeWork,$page,$countProduct);
            echo $result;
        }
        public function getDetailArticlePersonally()
        {
            $ID = isset($_GET["ID"]) ? $_GET["ID"] : null;

            $result = $this->model->getDetailArticlePersonally($ID);

            echo $result;
        }

        public function getPagesArticlePersonally()
        {
            $experience = isset($_POST["experience"]) ? $_POST["experience"] : null;
            $fields = isset($_POST["fields"]) ? $_POST["fields"] : null;
            $city = isset($_POST["city"]) ? $_POST["city"] : null;
            $countProduct = isset($_POST["countProduct"]) ? $_POST["countProduct"] : null;
            $timeWork = isset($_POST["timeWork"]) ? $_POST["timeWork"] : null;

            $result = $this->model->getRows($experience,$fields,$city,$countProduct,$timeWork);

            echo $result;
        }

        public function addArticleAPersonally()
        {
            $IDFields = isset($_POST["IDFields"]) ? $_POST["IDFields"] : null;
            $Position = isset($_POST["Position"]) ? $_POST["Position"] : null;
            $Experience = isset($_POST["Experience"]) ? $_POST["Experience"] : null;
            $dateEnd = isset($_POST["dateEnd"]) ? $_POST["dateEnd"] : null;
            $Title = isset($_POST["Title"]) ? $_POST["Title"] : null;
            $Description = isset($_POST["Description"]) ? $_POST["Description"] : null;
            $timeWork = isset($_POST["timeWork"]) ? $_POST["timeWork"] : null;
            $datePost = new DateTime();
            $statusPost = 2;

            if($IDFields == NULL || $Position == null || $Experience == null || $dateEnd == null || $Title == null || $Description == null || $timeWork == null)
            {
                echo 0;
            }
            else
            {
                $this->model->addArticleAPersonally($IDFields,$Position,$Title,$Description,$timeWork, $datePost->format('Y-m-d H:i:s'),$dateEnd, $Experience, $statusPost);

                echo 1;
            }
        }

        public function saveArticle()
        {
            $IDPersonally = isset($_SESSION["Logined"]) ? $_SESSION["Logined"][0]["IDLogin"] : null;
            $IDArticle = isset($_POST["IDArticle"]) ? $_POST["IDArticle"] : null;

            if(isset($_SESSION["Logined"]) == false)
            {
                echo 0;
            }
            else
            {
                $this->model->saveArticle($IDPersonally,$IDArticle);
                echo 1;
            }
        }

        public function unsetArticle()
        {
            $IDPersonally = isset($_SESSION["Logined"]) ? $_SESSION["Logined"][0]["IDLogin"] : null;
            $IDArticle = isset($_POST["IDArticle"]) ? $_POST["IDArticle"] : null;

            if(isset($_SESSION["Logined"]) == false)
            {
                echo 0;
            }
            else
            {
                $this->model->unsetArticle($IDPersonally,$IDArticle);
                echo 1;
            }
        }

        public function getArticleInterested()
        {
            $IDPersonally = isset($_SESSION["Logined"]) ? $_SESSION["Logined"][0]["IDLogin"] : null;

            $result = $this->model->getArticleInterested($IDPersonally);

            echo $result;
        }

        public function getInforPersonally()
        {
            $IDLogin = isset($_SESSION["Logined"]) ? $_SESSION["Logined"][0]["IDLogin"] : null;
            $result = $this->model->getInforPersonally($IDLogin);

            echo $result;
        }
    }
?>