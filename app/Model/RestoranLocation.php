<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class RestoranLocation extends Model{
    protected $table = 'restoran_location';
    public $timestamps = false;

    function relArea(){
        return $this->hasMany('App\Model\RestoranArea', 'location_id');
    }
}
