<?php
    class CompanyModel extends Database{

        public function getArticleCompany($experience,$fields,$city,$timeWork,$page,$countProduct)
        {
            $query = $this->getQuery($experience,$fields,$city,$timeWork);

            $temp = $page * $countProduct;
            $query .= " LIMIT $temp,$countProduct";

            $result = mysqli_query(self::$connect,$query);

            $arr = array();

            while($row = mysqli_fetch_assoc($result))
            {
                $arr[] = $row;
            }

            return json_encode($arr);
        }

        public function getRows($experience,$fields,$city,$countProduct,$timeWork)
        {
            $query = $this->getQuery($experience,$fields,$city,$timeWork);
            
            $result = mysqli_query(self::$connect,$query);

            $numRows = mysqli_num_rows($result);

            $numPages = $numRows / $countProduct;

            return $numPages;
        }

        public function getQuery($experience,$fields,$city,$timeWork)
        {
            $query = "SELECT cpa.ID,f.nameField,cp.introduce,cpa.title,cpa.description,
                             cpa.requirement,cpa.fromSalary,cpa.toSalary,cpa.position,cpa.experience,
                             cpa.amountRecruitment,cpa.amountRecruitmented,cpa.timeWork,
                             ifu.name,ifu.image,ifu.city,cpa.datePost,cpa.dateEnd,cpa.statusPost
                    From company as cp 
                    join company_article as cpa on cpa.IDCompany = cp.ID 
                    join infor_user as ifu on cp.IDUser = ifu.ID 
                    join fields as f on cpa.IDFields = f.ID
                    WHERE cpa.statusPost = 1";

                if($experience != null)
                {
                    $array_experience = implode("','", $experience);
                    $query .= " AND cpa.experience IN ('".$array_experience."')";
                }
                
                if($timeWork != null)
                {
                    $array_timeWork = implode("','", $timeWork);
                    $query .= " AND cpa.timeWork IN ('".$array_timeWork."')";
                }
                
                if($fields != null && $fields != 1)
                {
                    $query .= " AND cpa.IDFields = '".$fields."'";
                }

                if($city != null)
                {
                    $array_city = implode("','", $city);
                    $query .= " AND ifu.city IN ('".$array_city."')";
                }

                $query .= " ORDER BY STR_TO_DATE(cpa.datePost, '%d-%m-%Y') or cpa.statusPost DESC";

                return $query;
        }

        public function getDetailArticleCompany($ID)
        {
            $query = "SELECT cpa.ID,f.nameField,cp.introduce,cpa.title,cpa.description,
                             cpa.requirement,cpa.fromSalary,cpa.toSalary,cpa.position,cpa.experience,
                             cpa.amountRecruitment,cpa.amountRecruitmented,cpa.timeWork,
                             ifu.name,ifu.image,ifu.city,cpa.datePost,cpa.dateEnd,cpa.statusPost
                    From company as cp 
                    join company_article as cpa on cpa.IDCompany = cp.ID 
                    join infor_user as ifu on cp.IDUser = ifu.ID 
                    join fields as f on cpa.IDFields = f.ID
                    WHERE cpa.ID = '".$ID."'";

            $result = mysqli_query(self::$connect,$query);

            $arr = array();

            while($row = mysqli_fetch_array($result))
            {
                $arr[] = $row;
            }

            return json_encode($arr);
        }


        public function addArticleCompany($title, $description, $requirement,$timeWork, $fromSalary, $toSalary, $position, $experience, $IDFields, $amountRecruitment, $amountRecruitmented, $datePost, $dateEnd,$amountInterested,$statusPost){           
            $query = "SELECT ID FROM company as cpn WHERE cpn.IDUser = '".$_SESSION["Logined"][0]["ID"]."'";
            $result = mysqli_query(self::$connect,$query);
            $row = mysqli_fetch_assoc($result);
            
            $add = "INSERT INTO `company_article`(`IDCompany`, `title`, `description`, `requirement`, `timeWork`, `fromSalary`, `toSalary`, `position`, `experience`, `IDFields`, `amountRecruitment`, `amountRecruitmented`, `datePost`, `dateEnd`, `amountInterested`, `statusPost`) 
                VALUES ('".$row['ID']."','" . $title . "','" . $description . "','" . $requirement . "','" . $timeWork . "','" . $fromSalary . "','" . $toSalary . "','" . $position . "','" . $experience . "','".$IDFields."','" . $amountRecruitment . "','" . $amountRecruitmented . "','" . $datePost. "','" . $dateEnd. "','".$amountInterested."','". $statusPost ."')";
            mysqli_query(self::$connect,$add);
        }
        function getTopAritcleCompany()
        {
            $query = "SELECT cpa.ID,f.nameField,cp.introduce,cpa.title,cpa.description,
                             cpa.requirement,cpa.fromSalary,cpa.toSalary,cpa.position,cpa.experience,
                             cpa.amountRecruitment,cpa.amountRecruitmented,cpa.amountRecruitmented,
                             ifu.name,ifu.image,ifu.city,cpa.datePost,cpa.dateEnd,cpa.timeWork,cpa.statusPost  
                      From company as cp 
                      join company_article as cpa on cpa.IDCompany = cp.ID 
                      join infor_user as ifu on cp.IDUser = ifu.ID 
                      join fields as f on cpa.IDFields = f.ID
                      ORDER BY (cpa.amountInterested) DESC 
                      Limit 4";

            $result = mysqli_query(self::$connect,$query);

            $arr = array();

            while($row = mysqli_fetch_assoc($result))
            {
                $arr[] = $row;
            }

            return json_encode($arr);
        }

        public function searching($keywords)
        {
            $search = "SELECT cpa.ID,f.nameField,cp.introduce,cpa.datePost,cpa.statusPost,cpa.timeWork,cpa.dateEnd,cpa.title,cpa.description,cpa.requirement,cpa.fromSalary,cpa.toSalary,cpa.position,cpa.experience,cpa.amountRecruitment,cpa.amountRecruitmented,cpa.amountRecruitmented,ifu.name,ifu.image,ifu.city 
                      From company as cp 
                      join company_article as cpa on cpa.IDCompany = cp.ID 
                      join infor_user as ifu on cp.IDUser = ifu.ID 
                      join fields as f on cpa.IDFields = f.ID
                      WHERE cpa.fields like '".'%'.$keywords.'%'."' 
                      OR cpa.requirement like '".'%'.$keywords.'%'."' 
                      OR ifu.name like '".'%'.$keywords."'";
            $result = mysqli_query(self::$connect,$search);

            $arr = array();

            while($row = mysqli_fetch_assoc($result))
            {
                $arr[] = $row;
            }

            return json_encode($arr);
        }
    }
?>