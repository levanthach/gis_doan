<?php
require_once "../../gis2D/BaseConverter.php";
require_once "../../gis2D/Connection.php";
require_once "../../gis2D/GraphicUtil.php";
require_once "../../gis2D/SpaghettiJsonConverter.php";

function print_json_response($object) {
    header ( 'Content-Type: application/json' );
    return json_encode($object);
}
$name = $_REQUEST['name'];
if (isset($_POST['time'])) {
    $get_year = $_POST['time'];
    $get_year = str_replace('1/1/', '', $get_year);
    $time = $get_year;
} else {
    $time = 2017;
}
switch ($name) {
    case 'spaghetti_json':
        $converter = new SpaghettiJsonConverter();
        echo print_json_response($converter->getJsonData($time));
        break;
    default:
        http_response_code(404);
}
