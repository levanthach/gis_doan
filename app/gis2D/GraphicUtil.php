<?php

class GraphicUtil
{

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
                "content" => "<table class='esri-widget__table'><tr><th>Thuộc tính</th><th>Mô tả</th></tr><tr><td>ID Xã - Phường</td><td>{commune_id}</td></tr><tr><td>Dân số</td><td>{population}</td></tr><tr><td>Diện tích</td><td>{acreage}</td></tr><tr><td>Mật độ dân số</td><td>{density}</td></tr><tr><td>Thời gian</td><td>Năm {time}</td></tr></table>"
            )
        );
    }

    public static function getColorByDensity($denstiy) 
    {
        if ($denstiy < 500) {
            return "#f9d9d4";
        } else if (500 <= $denstiy && $denstiy < 1000) {
            return "#fac1ba";
        } else if (1000 <= $denstiy && $denstiy < 1500) {
            return "#f8b09f";
        } else if (1500 <= $denstiy && $denstiy < 2000) {
            return "#f79b82";
        } else if (2000 <= $denstiy && $denstiy < 2500) {
            return "#f58b6a";
        } else if (2500 <= $denstiy && $denstiy < 3000) {
            return "#f47748";
        } else if (3000 <= $denstiy && $denstiy < 3500) {
            return "#ec6530";
        } else if (3500 <= $denstiy && $denstiy < 4000) {
            return '#e23631';
        } else if (4000 <= $denstiy && $denstiy < 4500) {
            return '#c72532';
        } else if (4500 <= $denstiy && $denstiy < 5000) {
            return '#ad1f23';
        } else if (5000 <= $denstiy && $denstiy < 5500) {
            return '#961a2e';
        } else if (5500 <= $denstiy && $denstiy < 6000) {
            return '#831526';
        } else if (6000 <= $denstiy && $denstiy < 6500) {
            return '#680f22';
        } else if (6500 <= $denstiy && $denstiy < 7000) {
            return '#49131d';
        } else {
            return '#39101a';
        }
    }
}