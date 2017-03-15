<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Model\SysDirectory;
use Cache;
use App\User;
use Hash;

class TestController extends Controller{

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
        $user->email = 'admin@mail.ru';
        $user->password = Hash::make('346488');
        $user->type_id = 1;
        $user->save();
    }

}
