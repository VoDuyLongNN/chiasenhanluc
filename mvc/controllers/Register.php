<?php
    header("Access-Control-Allow-Origin: *");
    class Register extends Controller
    {
        function show()
        {
            self::view("Register");
        }
    }
?>