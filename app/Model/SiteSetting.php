<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model{
    protected $table = 'site_settings';
    public $timestamps = false;

    static function getNameByKey($key){
        $el = SiteSetting::where('key', $key)->first();
        if (!$el){
            $el = new SiteSetting();
            $el->key = $key;
            $el->save();
        }

        return $el->name;
    }

    static function getKeyAr(){
        return array_keys(static::getKeyArName());
    }

    static function getKeyArName(){
        return array(
			'main_phone' => 'Телефон приемной',
            'email' => 'Email для связи'
        );
    }
}
