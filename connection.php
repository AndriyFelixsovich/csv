<?php
function getdb()
{
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'csv_db';

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;  // Повертаємо об'єкт з'єднання
    } catch (\Exception $e) {
        $error_message = $e->getMessage();

        throw new Exception("Помилка з'єднання з базою даних: " . $error_message);
    }
}
?>
