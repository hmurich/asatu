<?php
namespace App\Model\Generators;

use Cache;
use App\Model\Order;
use App\Model\Generators\OrderStatus;

class CloseOrderTime {
    private $def_cache_time = 30;
    private $check_old_time = 300;

    static function checkOld(){
        $i = new CloseOrderTime();

        if (!Cache::has('cron_old_order_time'))
            $i->deleteOldOrders();
        elseif ((Cache::get('cron_old_order_time') - time()) > $i->check_old_time)
            $i->deleteOldOrders();

    }

    function deleteOldOrders(){
        $time = time() - (60 * 15);

        $items = Order::where('status_id', OrderStatus::OPEN)->where('created_at', '<', date("Y-m-d h:i:s", $time))->get();
        foreach ($items as $i) {
            $i->status_id = OrderStatus::CANCEL;
            $i->close_status_id = OrderStatus::CANCEL_TIME;
            $i->save();
        }

        Cache::put('cron_old_order_time', time(), $this->def_cache_time);
    }


}
