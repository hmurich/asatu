<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use App\Model\Generators\OrderStatus;
use App\Model\OrderHistory;

class Order extends Model{
    protected $table = 'orders';

    static function boot() {
        Order::created(function ($item) {
            $item->generateSysKey();
        });
    }

    function generateSysKey(){
        $sys_key = str_pad($this->id, 10, "0", STR_PAD_LEFT);
        $sys_key = 'ID-'.$sys_key;
        $this->sys_key = $sys_key;
        $this->save();
    }

    function setStatusIdAttribute($status_id){
        $this->createHistoryRow($this->attributes['status_id'], $status_id);

        $this->attributes['status_id'] = $status_id;
        if (in_array($status_id, array(OrderStatus::CANCEL, OrderStatus::CLOSE, OrderStatus::MISSING))){
            $finish_at = date('Y-m-d h:i:s');
            $this->attributes['finish_at'] = $finish_at;

            $created_at = strtotime ($this->created_at);
            $finish_at = strtotime ($finish_at);

            $duration = $finish_at - $created_at;
            $this->attributes['duration'] = $duration;
        }

    }

    function createHistoryRow($old_status, $new_status){
        $history = new OrderHistory();
        $history->order_id = $this->id;
        $history->status_id = $new_status;
        $history->old_status_id = $old_status;
        $history->save();
    }

    function relCustomer(){
        return $this->belongsTo('App\Model\Customer', 'customer_id');
    }

    function relRestoran(){
        return $this->belongsTo('App\Model\Restoran', 'restoran_id');
    }

    function relItems(){
        return $this->hasMany('App\Model\OrderItem', 'order_id');
    }

    function relHistory(){
        return $this->hasMany('App\Model\OrderHistory', 'order_id');
    }

    function getDurationAttribute($value){
        $value = round($value/60);
        return $value.' мин.';
    }
}
