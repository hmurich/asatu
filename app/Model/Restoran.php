<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Restoran extends Model{
    protected $table = 'restoran';

    function getRaitingViewAttribute(){
        return round($this->raiting, 2);
    }

    static function getDeliveryTypeAr(){
        return array(
            0 => 'Своя',
            1 => 'От Асакелу'
        );
    }

    function relSale(){
        return $this->hasMany('App\Model\Sale', 'restoran_id');
    }

    function relMenu(){
        return $this->hasMany('App\Model\Menu', 'restoran_id');
    }

    function relPromo(){
        return $this->hasMany('App\Model\Promo', 'restoran_id');
    }

    function relDistance(){
        return $this->hasMany('App\Model\RestoranDistance', 'restoran_id');
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

    function generateHtmlStar(){
        $html_star = '';
        for ($i = 1; $i<=5; $i++){
            if ($this->raiting >= $i)
                $html_star = $html_star.'<li></li>';
            else
                $html_star = $html_star.'<li class="empty"></li>';
        }

        return $html_star;
    }
}
