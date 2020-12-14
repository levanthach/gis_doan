<?php
class GeoJsonUtil {
    public static function generate2DPolygon($attribute, $exitedPolygon = null)
    {
        if (!empty($exitedPolygon)) {
            $exitedPolygon['geometry']['coordinates'][0][] = array(floatval($attribute['longs']), floatval($attribute['lats']));
            return $exitedPolygon;
        }
        return array(
            "type" => "Feature",
            "properties" => array (
             "id" =>$attribute['polygon_id'],
             "commune_id" => $attribute['commune_id'],
             "time" => $attribute['time'],
             "name" => $attribute['name'],
             "density" => $attribute['density']
            ),
            "geometry" => array (
                "type" => "Polygon",
                "coordinates" => array(
                    array (
                        array(floatval($attribute['longs']), floatval($attribute['lats']))
                    )
                )
            ),
            "id" => "pp".$attribute['id']
        );
    }
}