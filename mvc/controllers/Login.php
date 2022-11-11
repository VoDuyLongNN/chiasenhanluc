<?php
    header("Access-Control-Allow-Origin: *");
    class Login extends Controller
    {
        function show()
        {
            self::view("Login");
        }
    }
?>