<?php
    class SchoolModel extends Database{

        public function getArticleSchool($field,$yearGraduate,$fromAmount,$toAmount)
        {
            $query = "SELECT sca.IDSchool,f.nameField,sca.amount,sca.yearGraduate,sca.datePost,sca.file,ifu.name,ifu.city,ifu.address,ifu.image From school as sc 
                      join school_article as sca on sca.IDSchool = sc.ID 
                      join infor_user as ifu on sc.IDUser = ifu.ID
                      join fields as f on sca.IDFields = f.ID
                      WHERE sca.statusPost = 1";

            if($field != null)
            {
                $query .= " AND sca.fields = '".$field."'";
            }

            if($yearGraduate != null)
            {
                $query .= " AND sca.yearGraduate = '".$yearGraduate."'";
            }

            if($fromAmount != null && $toAmount)
            {
                $query .= " AND sca.amount BETWEEN '".$fromAmount."' AND '".$toAmount."'";
            }
            $query .= " ORDER BY STR_TO_DATE(datePost, '%d/%m/%Y') DESC";
            $result = mysqli_query(self::$connect,$query);

            $arr = array();

            while($row = mysqli_fetch_assoc($result))
            {
                $arr[] = $row;
            }

            return json_encode($arr);
        }

        public function addArticleSchool($fields, $amount, $yearGraduate, $datePost, $file, $statusPost){
            $query = "SELECT ID FROM school as sc WHERE sc.IDUser = '".$_SESSION["Logined"][0]["ID"]."'";
            $result = mysqli_query(self::$connect,$query);
            $row = mysqli_fetch_assoc($result);

            $add = 'INSERT into school_article(IDSchool,fields,amount,yearGraduate,datePost,file,statusPost)
            values ("'.$row['IDUser'].'","' . $fields . '","' . $amount . '","' . $yearGraduate . '","' . $datePost->format('d/m/Y') . '","' . $file . '","'.$statusPost.'")';

            mysqli_query(self::$connect,$add);
        }
    }
?>