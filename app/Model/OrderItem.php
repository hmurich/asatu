<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model{
    protected $table = 'order_items';

    function relMenu(){
        return $this->belongsTo('App\Model\Menu', 'menu_id');
    }
}
