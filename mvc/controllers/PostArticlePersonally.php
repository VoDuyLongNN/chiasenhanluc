<?php
    header("Access-Control-Allow-Origin: *");
    class PostArticlePersonally extends Controller
    {
        function show()
        {
            self::view("PostArticlePersonally");
        }
    }
?>