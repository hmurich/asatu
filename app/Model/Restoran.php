<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Restoran extends Model{
    protected $table = 'restoran';

    function getRaitingViewAttribute(){
        return round($this->raiting, 2);
    }

    function relData(){
        return $this->hasOne('App\Nodel\RestoranData', 'restoran_id');
    }

    function relLocation(){
        return $this->hasMany('App\Nodel\RestoranLocation', 'restoran_id');
    }

    function relKitchens(){
        return $this->hasMany('App\Nodel\RestoranKicthen', 'restoran_id');
    }

    function relReiting(){
        return $this->hasOne('App\Nodel\RestoranRaiting', 'restoran_id');
    }
}
