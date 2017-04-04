<?php
namespace App\Model\Generators;

use App\Model\Generators\PointInArea;
use App\Model\RestoranArea;

class UserArea {
    static function getCloser($restoran, $user_location){
        if (!$restoran || !$user_location)
            return false;


        $pointLocation = new PointInArea();

        $point = implode(" ", array($user_location->lat, $user_location->lng));

        $area_list = RestoranArea::where('restoran_id', $restoran->id)->get();

        $min_cost_area = false;
        foreach ($area_list as $area) {
            $polygon =  explode(",", $area->find_coords);
            if (!$pointLocation->pointInPolygon($point, $polygon))
                continue;

            if (!$min_cost_area || $min_cost_area->cost > $area->cost)
                $min_cost_area = $area;
        }

        return $min_cost_area;
    }
}
