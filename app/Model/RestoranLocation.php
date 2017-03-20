<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class RestoranLocation extends Model{
    protected $table = 'restoran_location';
    public $timestamps = false;

    function relDistance(){
        return $this->hasMany('App\Model\RestoranDistance', 'location_id');
    }
}
