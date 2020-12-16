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
            "properties" => array(
                "id" => $attribute['id'],
                "name" => $attribute['name'],
                "commune_id" => $attribute['commune_id'],
                "time" => $attribute['time'],
                "population" => $attribute['count'],
                "acreage" => $attribute['acreage']." km2",
                "density" => $attribute['density']." người/km2"
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