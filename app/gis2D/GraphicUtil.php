<?php

class GraphicUtil
{
    public static function generate2DPoint($attribute)
    {
        return array(
            "geometry" => array(
                "type" => "point",
                "longitude" => $attribute['longs'],
                "latitude" => $attribute['lats']
            ),
            "symbol" => array(
                "type" => "simple-marker",
                "color" => [0, 255, 0],
                "outline" => array(
                    "color" => array(255, 255, 255),
                    "width" => 1
                )
            ),
            "attributes" => array(
                "name" => 'name',
                "location" => 'location'
            ),
            "popupTemplate" => array(
                "title" => "{name}",
                "content" => "<table class='esri-widget__table'><tr><th>Name</th><th>Location</th></tr><tr><td>{name}</td><td>{location}</td></tr></table>"
            )
        );
    }

    public static function generate2DLine($attribute, $exitedLine = null)
    {
        if (!empty($exitedLine)) {
            $exitedLine['geometry']['paths'][] = array($attribute['longs'], $attribute['lats']);
            return $exitedLine;
        }
        return array (
            "geometry" => array (
                "type"=>"polyline",
                "paths"=> array (
                    array($attribute['longs'], $attribute['lats'])
                )
            ),
            "symbol" => array(
                "type" => "simple-line",
                "color" => [226, 119, 40],
                "width" => 1
            ),
            "attributes" => array(
                "name" => 'name',
                "description" => 'description'
            ),
            "popupTemplate" => array(
                "title" => "Line {name}",
                "content" => "<table class='esri-widget__table'><tr><th>Name</th><th>Description</th></tr><tr><td>{name}</td><td>{description}</td></tr></table>"
            )
        );
    }

    public static function generate2DPolygon($attribute, $exitedPolygon = null)
    {
        if (!empty($exitedPolygon)) {
            $exitedPolygon['geometry']['rings'][] = array($attribute['longs'], $attribute['lats']);
            return $exitedPolygon;
        }
        return array (
            "geometry" => array (
                "type"=>"polygon",
                "rings"=> array (
                    array($attribute['longs'], $attribute['lats'])
                )
            ),
            "symbol" => array(
                "type" => "simple-fill",
                "color" => GraphicUtil::getColorByDensity($attribute['density']),
                "width" => 1
            ),
            "attributes" => array(
                "commune_id" => $attribute['commune_id'],
                "name" => $attribute['name'],
                "time" => $attribute['time'],
                "population" => $attribute['count']." người",
                "acreage" => $attribute['acreage']." km2",
                "density" => $attribute['density']." người/km2"
            ),
            "popupTemplate" => array(
                "title" => "{name}",
                "content" => "<table class='esri-widget__table'><tr><th>Name</th><th>Description</th></tr><tr><td>Commune_id</td><td>{commune_id}</td></tr><tr><td>Population</td><td>{population}</td></tr><tr><td>Acreage</td><td>{acreage}</td></tr><tr><td>Density</td><td>{density}</td></tr><tr><td>Time</td><td>{time}</td></tr></table>"
            )
        );
    }

    public static function getColorByDensity($denstiy) 
    {
        if ($denstiy < 500) {
            return "#fee8c8";
        } else if (500 <= $denstiy && $denstiy < 1000) {
            return "#FDD49E";
        } else if (1000 <= $denstiy && $denstiy < 1500) {
            return "#FDBB84";
        } else if (1500 <= $denstiy && $denstiy < 2000) {
            return "#FC8D59";
        } else if (2000 <= $denstiy && $denstiy < 2500) {
            return "#EF6548";
        } else if (2500 <= $denstiy && $denstiy < 3000) {
            return "#EE5A24";
        } else if (3000 <= $denstiy && $denstiy < 3500) {
            return "#EE5A24";
        } else if (3500 <= $denstiy && $denstiy < 4000) {
            return '#EAB543';
        } else if (4000 <= $denstiy && $denstiy < 4500) {
            return '#ffaf40';
        } else if (4500 <= $denstiy && $denstiy < 5000) {
            return '#ff9f1a';
        } else if (5000 <= $denstiy && $denstiy < 5500) {
            return '#cd6133';
        } else if (5500 <= $denstiy && $denstiy < 6000) {
            return '#ff5252';
        } else if (6000 <= $denstiy && $denstiy < 6500) {
            return '#ff4d4d';
        } else if (6500 <= $denstiy && $denstiy < 7000) {
            return '#ff3838';
        } else {
            return '#b33939';
        }
    }
}