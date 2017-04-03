<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Promo extends Model{
    protected $table = 'promo';

    static function getPromoSum($restoran_id, $promo_key, $sum){
        $promo = Promo::where('active', 1)->where('promo_key', $promo_key)->first();
        if (!$promo)
            return false;

        if (!$promo->to_all && $promo->restoran_id != $restoran_id)
            return false;

        if ($promo->is_percent)
            $sum = $sum - ceil(($sum * $promo->count_sale)/100);
        else
            $sum = $sum - $promo->count_sale;

        if ($sum < 0)
            return 0;

        $promo->useCounter();

        return $sum;
    }

    function useCounter(){
        $this->count_total_use = $this->count_total_use + 1;

        if ($this->count_use == 1)
            $this->active = 0;

        if ($this->count_use)
            $this->count_use = $this->count_use - 1;

        $this->save();
    }

    function getCountSaleNameAttribute(){
        $text = $this->count_sale;

        if ($this->is_percent)
            $text = $text.'%';
        else
            $text = $text.'тг.';

        return $text;
    }

    function getCountUseNameAttribute(){
        $res = $this->count_use;
        if (!$res)
            $res = 'неограничено';

        return $res;
    }
}
