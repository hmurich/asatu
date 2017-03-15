<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Model\SysDirectory;

class TestController extends Controller{

    function getModel(){
        echo 'hello <br />';
        $ar = SysDirectory::lists('name', 'id');

        echo '<pre>'; print_r($ar); echo '</pre>';

        foreach ($ar as $k=>$n) {
            echo 'id - '.$k.'. Name - '.$n.'<br/>';
        }
    }
}
