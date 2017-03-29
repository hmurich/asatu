<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Promo extends Model{
    protected $table = 'promo';

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
