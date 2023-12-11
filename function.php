<?php
include("connection.php");
$con = getdb();

if (isset($_POST["import"])) {
     $filename = $_FILES["file"]["tmp_name"];
    if ($_FILES["file"]["size"] > 0) {
        $file = fopen($filename, "r");
        while (($getData = fgetcsv($file, 100, ";")) !== false) {
            try {


//            var_dump($getData);die();
                $valueRegion = mb_convert_encoding($getData[0], 'UTF-8', 'Windows-1251');
                $randomRegionId = mt_rand(1, 100);

                // Підготовлений запит для перевірки наявності значення в базі даних
                $checkRegion = $con->prepare("SELECT COUNT(*) FROM region WHERE name_region = ?");
                $checkRegion->execute([$valueRegion]);
                $resultRegion = $checkRegion->fetchColumn();

                if ($resultRegion == 0) {
                    // Якщо значення не існує, вставляємо його

                    $insertRegion = $con->prepare("INSERT INTO region (region_id, name_region) VALUES (?, ?)");
                    $insertRegion->execute([$randomRegionId, $valueRegion]);
                } else {
                    // Якщо значення вже існує, можете виконати додаткові дії або пропустити
//                echo "Значення '$valueToInsert' вже існує в базі даних.";
//                $i++;
//                echo $i;
                }
                $valueArea = mb_convert_encoding($getData[1], 'UTF-8', 'Windows-1251');

                $checkArea = $con->prepare("SELECT COUNT(*) FROM area WHERE name_area = ?");
                $checkArea->execute([$valueArea]);
                $resultArea = $checkArea->fetchColumn();

                if ($resultArea == 0) {
                    // Якщо значення не існує, вставляємо його
                    $insertArea = $con->prepare("INSERT INTO area (name_area, area_id) VALUES (?, ?)");
                    $insertArea->execute([$valueArea, $randomRegionId]);
                    echo $valueArea;

                } else {

                }
            } catch (PDOException $e) {

                echo "Помилка бази даних: " . $e->getMessage();
            } catch (Exception $e) {

                echo "Загальна помилка: " . $e->getMessage();
            }

        }
        fclose($file);
    }
    header('location: ../index.php');
}

