<?php
require_once "../../gis2D/BaseConverter.php";
require_once "../../gis2D/Connection.php";
require_once "../../gis2D/GraphicUtil.php";
require_once "../../gis2D/GeoJsonUtil.php";
require_once "../../gis2D/SpaghettiJsonConverter.php";
require_once "../../gis2D/SpaghettiGeoJsonConverter.php";

function print_json_response($object) {
    header ( 'Content-Type: application/json' );
    return json_encode($object);
}
$name = $_REQUEST['name'];
switch ($name) {
    case 'spaghetti_json':
        $converter = new SpaghettiJsonConverter();
        echo print_json_response($converter->getJsonData());
        break;
    case 'spaghetti_geojson':
        $converter = new SpaghettiGeoJsonConverter();
        echo print_json_response($converter->getJsonData());
        break;
    default:
        http_response_code(404);
}
