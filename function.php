<?php
include("connection.php");
$con = getdb();

if (isset($_POST["import"])) {
     $filename = $_FILES["file"]["tmp_name"];
    if ($_FILES["file"]["size"] > 0) {
        $file = fopen($filename, "r");
        while (($getData = fgetcsv($file, 100, ",")) !== false)
        {
            $getData = array_map(function($value) {
                return mb_convert_encoding($value, 'UTF-8', 'Windows-1251');
            }, $getData);
            var_dump($getData);
        }
    }
}

