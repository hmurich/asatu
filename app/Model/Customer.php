<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model{
    protected $table = 'customers';

    function getFullAdressAttribute(){
        $text = '';
        $text .= $this->address.',';

        if ($this->podezd)
            $text .= ' подъезд '.$this->podezd.',';
        if ($this->etag)
            $text .= ' этаж '.$this->etag.',';
        if ($this->kvartira)
            $text .= ' квартира '.$this->kvartira.'.';
        if ($this->domofon)
            $text .= 'Домофон '.$this->domofon.'.';

        return $text;
    }

    function relUser(){
        return $this->belongsTo('App\User', 'user_id');
    }

    function relOrders(){
        return $this->hasMany('App\Model\Order', 'customer_id');
    }

}
