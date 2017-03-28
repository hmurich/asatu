<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model{
    protected $table = 'customers';

    function getFullAdressAttribute(){
        return 'ул. Женис, дом 17, подъезд #1, этаж 7, квартира 47';
    }

    function relUser(){
        return $this->belongsTo('App\User', 'user_id');
    }

}
