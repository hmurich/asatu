<?php
namespace App\Model\Generators;

use App\Model\TransLib;

class Translator {
    private $ar_langs = array();
    private $lang_id = false;

    private $def_lang_id = 'ru';
    private $def_cache_time = 30;
    private $def_name = 'Нет перевода';

    static function destroiArCache(){
        foreach (SysDirectory::getLangAr() as $lang_id=>$lang_name) {
            Cache::forget('ar_lang_'.$lang_id);
        }
    }

    function __construct() {
        $this->lang_id = $this->getSessionLangId();
        $this->ar_langs = $this->getArLangFromCache();
    }

    function getArLang(){
        return $this->ar_langs;
    }

    function getLangId(){
        return $this->lang_id;
    }

    function getTransNameByKey($key, $name = false){
        if ($this->lang_id == $this->def_lang_id && $name)
            return $name;


        if (!isset($this->ar_langs[$key]))
            $this->getTransFromBD($key, $name);

        return $this->ar_langs[$key];
	}

    private function getTransFromBD($key, $name){
        $el = TransLib::where('key', $key)->first();
        if ($el){
            if ($this->lang_id == 'kz')
                $name = $el->trans_kz;
            else if ($this->lang_id == 'en')
                $name = $el->trans_en;
            else
                $name = $el->trans_ru;
        }

        return $this->ar_langs[$key] = $name;
    }

     function getSessionLangId(){
        if (!Session::has('lang_id'))
			Session::put('lang_id', $this->def_lang_id);

        return Session::get('lang_id');
    }

    function setSessionLangId($lang_id){
        Session::put('lang_id', $lang_id);

        $this->lang_id = $this->getSessionLangId();
        $this->ar_langs = $this->getArLangFromCache();

        return true;
    }

    private function getArLangFromCache(){
        if (!Cache::has('ar_lang_'.$this->lang_id))
            Cache::add('ar_lang_'.$this->lang_id, json_encode(array()), $this->def_cache_time);

        return (array)json_decode(Cache::get('ar_lang_'.$this->lang_id), true);
    }

    function putArLangToCache (){
        Cache::put('ar_lang_'.$this->lang_id, json_encode($this->ar_langs), $this->def_cache_time);
    }

    function __destruct() {
        $this->putArLangToCache();
    }

}
