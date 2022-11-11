<?php
    header("Access-Control-Allow-Origin: *");
    class Home extends Controller
    {
        function show()
        {
            self::view("Home");
        }
    }
?>