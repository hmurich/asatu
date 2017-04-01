<?php
namespace App\Model\Generators;

use App\Model\Generators\PointInArea;
use App\Model\RestoranArea;

class UserRestoran {
    static function generateAr($city_id, $ar_coords){
        if (!is_array($ar_coords) || count($ar_coords) != 2)
            return false;

        $pointLocation = new PointInArea();

        $point = implode(" ", $ar_coords);

        $ar_restoran_area = RestoranArea::whereHas('relRestoran', function($q) use ($city_id){
                $q->where('city_id', $city_id);
            })->lists('restoran_id', 'id');

        $items = RestoranArea::whereHas('relRestoran', function($q) use ($city_id){
                $q->where('city_id', $city_id);
            })->lists('find_coords', 'id');

        $ar_restoran = array();
        foreach ($items as $area_id=>$coords) {
            $polygon =  explode(",", $coords);
            if ($pointLocation->pointInPolygon($point, $polygon))
                $ar_restoran[] = $ar_restoran_area[$area_id];
        }

        session()->forget('ar_restoran');

        foreach ($ar_restoran as $id){
            session()->push('ar_restoran', $id);
        }

        return true;
    }

    static function getAr(){
        if (!session()->has('ar_restoran'))
            return false;

        return session()->get('ar_restoran');
    }

}
