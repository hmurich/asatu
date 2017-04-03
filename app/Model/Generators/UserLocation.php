<?php
namespace App\Model\Generators;

use App\Model\TransLib;
use Cache;

class UserLocation {
    public $city_id = false;
    public $address = false;
    public $lat = false;
    public $lng = false;

    public $check = false;

    private function setCity($city_id){
        if (!$city_id)
            return false;

        $this->city_id = $city_id;
    }

    private function setAddress($address){
        if (!$address)
            return false;

        $this->address = $address;
    }

    private function setCoords($coords){
        if (empty($coords) || !isset($coords['lng']) || !isset($coords['lat']))
            return false;

        $this->lat = $coords['lat'];
        $this->lng = $coords['lng'];
    }

    private function checkParam(){
        if (!$this->city_id || !$this->address || !$this->lat || !$this->lng)
            $this->check = false;
        else
            $this->check = true;

        return $this->check;
    }

    function setParam($city_id, $address, $coords=array()){
        $this->setCity($city_id);
        $this->setAddress($address);
        $this->setCoords($coords);
    }

    function saveParamToSession(){
        session()->put('user_city', $this->city_id);
        session()->put('user_address', $this->address);
        session()->put('user_lat', $this->lat);
        session()->put('user_lng', $this->lng);
    }

    static function setLocation($city_id, $address, $coords=array()){
        $location = new UserLocation();
        $location->setParam($city_id, $address, $coords);
        
        if (!$location->checkParam())
            return false;

        $location->saveParamToSession();

        return $location;
    }

    static function getLocation(){
        if (!session()->has('user_city') || !session()->has('user_address') || !session()->has('user_lat') || !session()->has('user_lng'))
            return false;

        $city_id = session()->get('user_city');
        $address = session()->get('user_address');
        $lat = session()->get('user_lat');
        $lng = session()->get('user_lng');

        $location = UserLocation::setLocation($city_id, $address, array('lat'=>$lat, 'lng'=>$lng));
        if (!$location)
            return false;

        return $location;
    }


}
