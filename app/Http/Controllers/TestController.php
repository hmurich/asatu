<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Model\SysDirectory;
use Cache;
use App\User;
use Hash;
use App\Model\SysDirectoryName;
use App\Model\Generators\PointInArea;

class TestController extends Controller{
    function getPointInArea () {
        $pointLocation = new PointInArea();

        $points = array("57.5321 38.2670", '57.5244 38.1008', '57.5557 38.1825', '57.6254 38.1461', '57.5257 38.3212');
        $polygon = array("57.5465 38.2148","57.5834 38.2491","57.5867 38.3411",
                        "57.5240 38.4276","57.4774 38.3665","57.4659 38.2175",
                        "57.5229 38.1461", "57.5465 38.2148");
        // The last point's coordinates must be the same as the first one's, to "close the loop"
        foreach($points as $key => $point) {
            if ($pointLocation->pointInPolygon($point, $polygon))
                echo "point " . ($key+1) . " ($point): внутри <br/>";
            else
                echo "point " . ($key+1) . " ($point): снаружи  <br/>";
        }

    }

    function getOrderSession(){
        session()->put('order.1.1.count', 100);
        session()->put('order.1.1.cost', 300);
        session()->put('order.1.1.cost', 40000);

        session()->put('order.1.2.count', 100);
        session()->put('order.1.2.cost', 300);

        session()->put('order.1.3.count', 100);
        session()->put('order.1.3.cost', 300);


        session()->put('order.1.total_cost', 100);


        echo '<pre>'; print_r(session('order.1')); echo '</pre>';
    }

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
            echo $item->getLatitude(); // широта
            echo $item->getLongitude(); // долгота
            echo $item->getData(); // необработанные данные
        }
        exit();

        $url = 'https://geocode-maps.yandex.ru/1.x/?geocode=Астана,+Ойтаган+улица,+дом+15&format=json';

        $response = file_get_contents($url);
        $response = (array) json_decode($response);
        echo '<pre>'; print_r($response); echo '</pre>'; exit();
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
