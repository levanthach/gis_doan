<?php

class SpaghettiGeoJsonConverter implements BaseConverter
{
    function getJsonData()
    {
        $polygon_query = <<<EOI
        select * from point p, polygon po
        where p.polygon_id = po.id
        order by p.id
EOI;
        $polygons = Connection::query($polygon_query);
        $current_polygon_id = null;
        $current_polygon = null;
        foreach ($polygons as $polygon) {
            if ($current_polygon_id != $polygon['id']){
                if($current_polygon != null) {
                    $result[] = $current_polygon;
                }
                $current_polygon = GeoJsonUtil::generate2DPolygon($polygon);
                $current_polygon_id = $polygon['id'];
            } else {
                $current_polygon = GeoJsonUtil::generate2DPolygon($polygon, $current_polygon);;
            }
        }
        if($current_polygon != null) {
            $result[] = $current_polygon;
        }

        return array (
            "type" => "FeatureCollection",
            "metadata" => array (
                "count" => sizeof($result)
            ),
            "features" => $result
        );
    }
}