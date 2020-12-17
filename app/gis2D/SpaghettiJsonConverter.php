<?php

class SpaghettiJsonConverter implements BaseConverter
{
    function getJsonData()
    {
        $result  = array();
        $polygon_query = <<<EOI
        SELECT td.*,de.time,de.density,de.name,de.acreage,de.count
        FROM (select p.polygon_id,p.longs,p.lats,po.* from point p, polygon po
        where p.polygon_id = po.id
        order by p.id) td LEFT JOIN (select co.*,pop.count,pop.time,round(pop.count/co.acreage,0) as density
                    from population pop, commune co
                    where pop.commune_id=co.id) de
        ON td.commune_id=de.id
EOI;
        $polygons = Connection::query($polygon_query);
        $current_polygon_id = null;
        $current_polygon = null;
        foreach ($polygons as $polygon) {
            if ($current_polygon_id != $polygon['id']) {
                if ($current_polygon != null) {
                    $result[] = $current_polygon;
                }
                $current_polygon = GraphicUtil::generate2DPolygon($polygon);
                $current_polygon_id = $polygon['id'];
            } else {
                $current_polygon = GraphicUtil::generate2DPolygon($polygon, $current_polygon);;
            }
        }
        if ($current_polygon != null) {
            $result[] = $current_polygon;
        }

        return $result;
    }
}
