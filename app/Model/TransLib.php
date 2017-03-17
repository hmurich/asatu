<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class TransLib extends Model{
    protected $table = 'trans_lib';
    public $timestamps = false;


    static function generateNew($key, $trans_ru){
        if (TransLib::where('key', $key)->count())
            return false;

        $item = new TransLib();
        $item->key =  $key;
        $item->trans_ru = $trans_ru;
        $item->save();

        return $item;
    }
}
