<?php
    header("Access-Control-Allow-Origin: *");

    class Fields extends Controller
    {
        protected $model;

        function __construct()
        {
            $this->model = $this->model("FieldsModel");
        }

        function getFields()
        {
            $result = $this->model->getFields();

            echo $result;
        }
        
        function getTopFields()
        {
            $result = $this->model->getTopFields();

            echo $result;
        }
    }
?>