<?php
require_once "../config/config.php";

$servername = DB_HOST;
$username = DB_USER;
$password = DB_PASS;
$dbname = DB_NAME;

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if (isset($_GET['action']) && !empty(isset($_GET['action']))) {
        $action = $_GET['action'];

        switch ($action) {
            case "district": {
                    $sql = "SELECT id, name FROM district WHERE province_id = '".$_POST["province_id"]."'";  
                    $result = $conn->prepare($sql);
                    $result->execute();
                    $response = $result->fetchAll();
                    echo json_encode($response);
                }
                break;
            case "commune": {
                $sql = "SELECT id, name FROM commune WHERE district_id = '".$_POST["district_id"]."'";  
                $result = $conn->prepare($sql);
                $result->execute();
                $response = $result->fetchAll();
                echo json_encode($response);
                }
                break;
        }
    }
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
    
}
$conn = null;

