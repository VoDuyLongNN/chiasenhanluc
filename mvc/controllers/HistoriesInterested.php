<?php
    header("Access-Control-Allow-Origin: *");
    class HistoriesInterested extends Controller
    {
        function show()
        {
            self::view("HistoriesInterested");
        }
    }
?>