<?php
namespace App\Model\Generators;

class OrderBusket {
    public $restoran_id = 0;
    public $total_cost = 0;

    function __construct($restoran_id, $ar_menu){
        if (!isset($ar_menu['menu_id']) || !isset($ar_menu['count']) || !isset($ar_menu['cost']))
            return false;

        session()->put('orders.'.$restoran_id.'.'.$ar_menu['menu_id'].'.count', $ar_menu['count']);
        session()->put('orders.'.$restoran_id.'.'.$ar_menu['menu_id'].'.cost', $ar_menu['cost']);

        $this->restoran_id = $restoran_id;

        $this->calculateTotalCost();

        return session('orders.'.$this->restoran_id);
    }

    static function getOrder($restoran_id = false){
        if ($restoran_id)
            return session('orders.'.$restoran_id);

        return session('orders');
    }

    static function forgetOrder($restoran_id = false){
        if ($restoran_id)
            session()->forget('orders.'.$restoran_id);
        else
            session()->forget('orders');
    }

    private function calculateTotalCost(){
        $ar_items = session('orders.'.$this->restoran_id);

        $this->total_cost = 0;
        foreach ($ar_items as $k => $ar_menu){
            if ($k == 'total_cost' || !is_array($ar_menu) || !isset($ar_menu['count']) || !isset($ar_menu['cost']))
                continue;

            $this->total_cost = $this->total_cost + ($ar_menu['count'] * $ar_menu['cost']);
        }

        session()->put('orders.'.$this->restoran_id.'.total_cost', $this->total_cost);
    }
}
