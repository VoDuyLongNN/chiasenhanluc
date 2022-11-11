<?php
    class FieldsModel extends Database
    {
        function getFields()
        {
            $query = "SELECT * FROM fields as f";

            $result = mysqli_query(self::$connect,$query);

            $arr = array();

            while($row = mysqli_fetch_assoc($result))
            {
                $arr[] = $row;
            }

            return json_encode($arr);
        }
        
        function getTopFields()
        {
            $query = "SELECT f.nameField,COUNT(cpa.IDFields) as amountWork
                      FROM fields as f 
                      join company_article as cpa on cpa.IDFields = f.ID 
                      WHERE cpa.statusPost = 1 
                      GROUP BY(cpa.IDFields)
                      ORDER BY(cpa.IDFields) DESC
                      LIMIT 10";

            $result = mysqli_query(self::$connect,$query);

            $arr = array();

            while($row = mysqli_fetch_assoc($result))
            {
                $arr[] = $row;
            }

            return json_encode($arr);
        }
    }
?>