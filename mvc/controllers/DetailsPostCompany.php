<?php
    header("Access-Control-Allow-Origin: *");
    class DetailsPostCompany extends Controller
    {
        function show()
        {
            self::view("DetailsPostCompany");
        }
    }
?>