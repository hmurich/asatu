<?php
namespace App\Http\Controllers\Customer;

use Auth;
use Illuminate\Routing\Controller;

class CabinetController extends Controller {
    function getCabinet(){
        echo 'your customer cabinet'; exit();
    }
}
