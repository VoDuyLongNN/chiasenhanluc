<?php
    header("Access-Control-Allow-Origin: *");
    class PostArticleCompany extends Controller
    {
        function show()
        {
            self::view("PostArticleCompany");
        }
    }
?>