<?php
use Illuminate\Support\Facades\Date;
    header("Access-Control-Allow-Origin: *");
    class Company extends Controller{
        
        private $model;
        
        public function __construct()
        {
            $this->model = $this->model("CompanyModel");
        }

        public function show()
        {
            $this->view("ArticleCompany");
        }

        public function getArticleCompany()
        {
            $experience = isset($_POST["experience"]) ? $_POST["experience"] : null;
            $fields = isset($_POST["fields"]) ? $_POST["fields"] : null;
            $city = isset($_POST["city"]) ? $_POST["city"] : null;
            $page = isset($_POST["page"]) ? $_POST["page"] : null;
            $timeWork = isset($_POST["timeWork"]) ? $_POST["timeWork"] : null;
            $countProduct = isset($_POST["countProduct"]) ? $_POST["countProduct"] : null;

            $result = $this->model->getArticleCompany($experience,$fields,$city,$timeWork,$page,$countProduct);
            echo $result;
        }

        public function getPagesArticleCompany()
        {
            $experience = isset($_POST["experience"]) ? $_POST["experience"] : null;
            $fields = isset($_POST["fields"]) ? $_POST["fields"] : null;
            $city = isset($_POST["city"]) ? $_POST["city"] : null;
            $countProduct = isset($_POST["countProduct"]) ? $_POST["countProduct"] : null;
            $timeWork = isset($_POST["timeWork"]) ? $_POST["timeWork"] : null;

            $result = $this->model-> getRows($experience,$fields,$city,$countProduct,$timeWork);

            echo $result;
        }
        public function getDetailArticleCompany()
        {
            $ID = isset($_GET["ID"]) ? $_GET["ID"] : null;

            $result = $this->model->getDetailArticleCompany($ID);

            echo $result;
        }
        public function addArticleCompany()
        {
            $Title = isset($_POST["Title"]) ? $_POST["Title"] : null;
            $Description = isset($_POST["Description"]) ? $_POST["Description"] : null;
            $fromSalary = isset($_POST["fromSalary"]) ? $_POST["fromSalary"] : null;
            $toSalary = isset($_POST["toSalary"]) ? $_POST["toSalary"] : null;
            $Requirement = isset($_POST["Requirement"]) ? $_POST["Requirement"] : null;
            $Experience = isset($_POST["Experience"]) ? $_POST["Experience"] : null;
            $Position = isset($_POST["Position"]) ? $_POST["Position"] : null;
            $IDFields = isset($_POST["IDFields"]) ? $_POST["IDFields"] : null;
            $timeWork = isset($_POST["timeWork"]) ? $_POST["timeWork"] : null;
            $amountRecruitment = isset($_POST["amountRecruitment"]) ? $_POST["amountRecruitment"] : null;
            $amountRecruitmented = 0;
            $datePost = new DateTime();
            $dateEnd = isset($_POST["dateEnd"]) ? $_POST["dateEnd"] : null;
            $amountInterested = 0;
            $statusPost = 2;

            if($Title == null || $Description == null || $fromSalary == null || $toSalary == null || $Requirement == null || $Experience == null || $Position == null || $IDFields == null || $timeWork == null || $amountRecruitment == null || $dateEnd == null)
            {
                echo 0;
            }
            else
            {
                $this->model->addArticleCompany($Title, $Description, $Requirement,$timeWork, $fromSalary, $toSalary, $Position, $Experience, $IDFields, $amountRecruitment, $amountRecruitmented, $datePost->format('Y-m-d H:i:s'), $dateEnd,$amountInterested,$statusPost);
                echo 1;
            }
        }     
        
        public function getTopAritcleCompany()
        {
            $result = $this->model->getTopAritcleCompany();
            echo $result;
        }

        public function searching()
        {
            $keywords = isset($_POST["keywords"]) ? $_POST["keywords"] : null;

            $result = $this->model->searching($keywords);
        }
    }
?>