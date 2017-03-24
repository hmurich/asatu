<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Model\SysDirectory;
use Cache;
use App\User;
use Hash;
use App\Model\SysDirectoryName;

class TestController extends Controller{
    function getGeoCoder(){

        $api = new \Yandex\Geo\Api();
        $api->setQuery('Тверская 6');

        // Настройка фильтров
        $api
            ->setLang(\Yandex\Geo\Api::LANG_US) // локаль ответа
            ->load();

        $response = $api->getResponse();

        // Список найденных точек
        $collection = $response->getList();
        echo '<pre>'; print_r($collection); echo '</pre>'; exit();
        foreach ($collection as $item) {
            echo $item->getAddress()."<br />"; // вернет адрес
            $item->getLatitude(); // широта
            $item->getLongitude(); // долгота
            $item->getData(); // необработанные данные
        }
    
        /*
        $url = 'https://geocode-maps.yandex.ru/1.x/?format=json&geocode=%D0%A2%D0%B2%D0%B5%D1%80%D1%81%D0%BA%D0%B0%D1%8F+6';

        $response = file_get_contents($url);
        $response = (array) json_decode($response);
        echo '<pre>'; print_r($response); echo '</pre>'; exit();
        */
    }

    function getModel(){
        echo 'hello <br />';
        $ar = SysDirectory::lists('name', 'id');

        echo '<pre>'; print_r($ar); echo '</pre>';

        foreach ($ar as $k=>$n) {
            echo 'id - '.$k.'. Name - '.$n.'<br/>';
        }
    }

    function getTrans(){
        $this->translator->setSessionLangId('kz');
        $ar = $this->translator->getArLang();
        echo '<pre>'; print_r($ar); echo '</pre>';
        echo $this->translator->getTrans('hello').'<br />';
        echo $this->translator->getTrans('hello_2').'<br />';
        echo $this->translator->getTrans('hello_3').'<br />';
        echo $this->translator->getTrans('hello_4').'<br />';
        echo $this->translator->getSessionLangId().'<br />';


        if (Cache::has('ar_lang_'.$this->translator->getSessionLangId()))
            echo 'cache has';
        else
            echo 'cache note has';

    }

    function getAdmin(){

        $user = new User();
        $user->email = 'hmurich@mail.ru';
        $user->password = Hash::make('346488');
        $user->type_id = 1;
        $user->save();
    }

    function getGenerateTrans(){
        $items = SysDirectoryName::all();
        foreach ($items as $i) {
            $i->createTransLib();
        }
    }

}
