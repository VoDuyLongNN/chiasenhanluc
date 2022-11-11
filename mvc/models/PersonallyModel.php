<?php
    class PersonallyModel extends Database{

        public function getArticlePersonally($experience,$fields,$city,$timeWork,$page,$countProduct)
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
            $query = "SELECT ps.introduce,f.nameField,ps.gender,psa.title,
                             psa.ID,psa.timeWork,psa.position,psa.datePost,psa.dateEnd,psa.experience,psa.description,ps.fileCV,
                             ifu.name,ifu.image,ifu.city
                      From personally as ps 
                      join personally_article as psa on psa.IDPersonally = ps.ID
                      join infor_user as ifu on ps.IDUser = ifu.ID
                      join fields as f on psa.IDFields = f.ID
                      WHERE psa.statusPost = 1";

                if($experience != null)
                {
                    $array_experience = implode("','", $experience);
                    $query .= " AND psa.experience IN ('".$array_experience."')";
                }
                
                if($timeWork != null)
                {
                    $array_timeWork = implode("','", $timeWork);
                    $query .= " AND psa.timeWork IN ('".$array_timeWork."')";
                }
                
                if($fields != null && $fields != 1)
                {
                    $query .= " AND psa.IDFields = '".$fields."'";
                }

                if($city != null)
                {
                    $array_city = implode("','", $city);
                    $query .= " AND ifu.city IN ('".$array_city."')";
                }

                $query .= " ORDER BY STR_TO_DATE(psa.datePost, '%d-%m-%Y') DESC";

                return $query;
        }

        public function getDetailArticlePersonally($ID)
        {
            $query = "SELECT ps.introduce,f.nameField,ps.gender,psa.title,ps.fileCV,
                             psa.ID,psa.timeWork,psa.position,psa.datePost,psa.dateEnd,psa.experience,psa.description,
                             ifu.name,ifu.image,ifu.city 
                      From personally as ps 
                      join personally_article as psa on psa.IDPersonally = ps.ID
                      join infor_user as ifu on ps.IDUser = ifu.ID
                      join fields as f on psa.IDFields = f.ID
                      WHERE psa.statusPost = 1 AND psa.ID = '".$ID."'";

            $result = mysqli_query(self::$connect,$query);

            $arr = array();

            while($row = mysqli_fetch_array($result))
            {
                $arr[] = $row;
            }

            return json_encode($arr);
        }

        public function addArticleAPersonally($IDFields,$Position,$Title,$Description,$timeWork, $datePost,$dateEnd, $Experience, $statusPost){           
            $query = "SELECT ID FROM personally as psn WHERE psn.IDUser = '".$_SESSION["Logined"][0]["ID"]."'";
            $result = mysqli_query(self::$connect,$query);
            $row = mysqli_fetch_assoc($result);

            
            $add = "INSERT INTO `personally_article`(`IDPersonally`,`IDFields`,`position`,`description`,  `title`, `timeWork`, `datePost`, `dateEnd`, `experience`, `statusPost`) 
                    VALUES ('".$row['ID']."','".$IDFields."','".$Position."','".$Description."','".$Title."','".$timeWork."','".$datePost."','".$dateEnd."','".$Experience."','".$statusPost."')";
            mysqli_query(self::$connect,$add);
        }

        public function saveArticle($IDPersonally,$IDArticle){
            $query = "INSERT INTO `interested`(`IDPersonally`, `IDArticleCompany`) 
                      VALUES ('".$IDPersonally."','".$IDArticle."')";

            mysqli_query(self::$connect,$query);
        }

        public function unsetArticle($IDPersonally,$IDArticle){
            $query = "DELETE FROM `interested` WHERE IDPersonally = '".$IDPersonally."' AND IDArticleCompany = '".$IDArticle."'";

            mysqli_query(self::$connect,$query);
        }
        
        public function getArticleInterested($IDPersonally){
            $query = "SELECT i.ID,i.IDPersonally,i.IDArticleCompany,cpa.title,cpa.description, ifu.image
                      FROM interested as i 
                      join company_article as cpa on i.IDArticleCompany = cpa.ID  
                      join company as cp on cpa.IDCompany = cp.ID
                      join infor_user as ifu on cp.IDUser = ifu.IDLogin
                      WHERE i.IDPersonally = '".$IDPersonally."' 
                      GROUP BY i.IDArticleCompany";
            
            $result = mysqli_query(self::$connect,$query);

            $arr = array();

            while($row = mysqli_fetch_array($result))
            {
                $arr[] = $row;
            }

            return json_encode($arr);
        }

        public function getInforPersonally($IDLogin)
        {
            $query = "SELECT ifu.IDLogin,ifu.name,ifu.phone,ifu.city,ifu.address,ps.introduce,f.nameField,ps.gender,ps.fileCV,ifu.image 
                     from `infor_user` as ifu 
                     join personally as ps on ps.IDUser = ifu.IDLogin 
                     join fields as f on ps.IDFields = f.ID 
                     WHERE ifu.IDLogin = '".$IDLogin."'";
                     
            $result = mysqli_query(self::$connect,$query);

            $arr = array();

            while($row = mysqli_fetch_array($result))
            {
                $arr[] = $row;
            }

            return json_encode($arr);
        }

        public function getArticlePosted($IDPersonally,$selectionSort)
        {
            $query = "SELECT psa.ID,psa.title,psa.description,psa.datePost,psa.dateEnd,psa.statusPost,ifu.image,f.nameField,f.ID as IDField,psa.Position,psa.timeWork,psa.experience
                      FROM personally as ps 
                      join infor_user as ifu on ps.IDUser = ifu.IDLogin
                      join personally_article as psa on psa.IDPersonally = ps.ID 
                      join fields as f on psa.IDFields = f.ID 
                      WHERE ps.IDUser = '".$IDPersonally."'";

            if($selectionSort != null)
            {
                switch($selectionSort)
                {
                    case 0: $query .= " AND psa.statusPost = 0";
                            break;
                    case 1: $query .= " AND psa.statusPost = 1";
                            break;
                    case 2: $query .= " AND psa.statusPost = 2";
                            break;
                    case 3: $query .= " ORDER BY STR_TO_DATE(psa.datePost, '%Y-%m-%d') DESC";
                            break;
                    case 4: $query .= " ORDER BY STR_TO_DATE(psa.datePost, '%Y-%m-%d') ASC";
                            break;
                }
            }

            $result = mysqli_query(self::$connect,$query);

            $arr = array();

            while($row = mysqli_fetch_array($result))
            {
                $arr[] = $row;
            }

            return json_encode($arr);
        }

        public function deleteArticlePosted($IDArticle){
            $query = "DELETE FROM `personally_article` WHERE ID = '".$IDArticle."'";

            mysqli_query(self::$connect,$query);
        }

        public function updateArticlePosted($IDArticle,$IDFields,$Position,$Title,$Description,$Experience,$dateEnd,$timeWork){
            $query = "UPDATE `personally_article` SET `IDFields`='".$IDFields."',`Position`='".$Position."',`description`='".$Description."',`title`='".$Title."',`timeWork`='".$timeWork."',`dateEnd`='".$dateEnd."',`experience`='".$Experience."',`statusPost`= 2 WHERE ID = '".$IDArticle."'";
            
            mysqli_query(self::$connect,$query);
        }
    }
?>