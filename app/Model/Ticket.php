<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model{
    protected $table = 'tickets';

    function relUser(){
        return $this->belongsTo('App\User', 'user_id');
    }

    function relRestoran(){
        return $this->belongsTo('App\Model\Restoran', 'restoran_id');
    }

    static function getStatusAr(){
        return array(
            0 => 'Создан',
            1 => 'В обработке',
            2 => 'Закрыт',
        );
    }
}
