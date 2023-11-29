<?php
function getdb()
{
    $servername = 'localhost';
    $username = 'root';
    $password = '';

    try {
        $conn = new PDO("mysql:host=$servername;dbname=csv_db", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    echo 'Successfully';
    } catch (\Exception $e) {
        $error_message = $e->getMessage();
    }
}