<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Restoran extends Model{
    protected $table = 'restoran';

    function getRaitingViewAttribute(){
        return round($this->raiting, 2);
    }

    function relUser(){
        return $this->belongsTo('App\User', 'user_id');
    }

    function relData(){
        return $this->hasOne('App\Model\RestoranData', 'restoran_id');
    }

    function relLocation(){
        return $this->hasMany('App\Model\RestoranLocation', 'restoran_id');
    }

    function relKitchens(){
        return $this->hasMany('App\Model\RestoranKicthen', 'restoran_id');
    }

    function relReiting(){
        return $this->hasOne('App\Model\RestoranRaiting', 'restoran_id');
    }
}
