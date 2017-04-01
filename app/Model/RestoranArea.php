<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class RestoranArea extends Model{
    protected $table = 'restoran_area';
    public $timestamps = false;


    function generateToFind(){
        $ar = explode(",", $this->coords);

        $res = array();
        $row = array();
        foreach ($ar as $coords){
            $row[] = $coords;

            if (count($row)==2){
                $res[] = implode(' ', $row);
                $row = array();
            }
        }

        return implode(',', $res);
    }

    function getCoordArAttribute(){
        return explode(",", $this->find_coords);
    }

    function generateView(){
        $ar = $this->coord_ar;

        $res = array();
        foreach ($ar as $coords) {
            $res[] = explode(' ', $coords);
        }

        return json_encode($res);
    }
}
