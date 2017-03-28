<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Order extends Model{
    protected $table = 'orders';

    function relCustomer(){
        return $this->belongsTo('App\Model\Customer', 'customer_id');
    }

}
