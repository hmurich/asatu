<?php
namespace App\Model\Generators;

use App\Model\SysDirectoryName;

class OrderStatus {
    const CAT_ORDER  = 7;
    const CAT_CANCEL  = 8;

    const OPEN = 18;
    const ACCEPT = 19;
    const CANCEL = 20;
    const CLOSE = 21;
    const MISSING = 22;

    const CANCEL_TIME = 23;
    const CANCEL_ACCEPT = 24;
    const CANCEL_RESTORAN = 25;
    const CANCEL_MENU = 26;
    const CANCEL_AREA = 27;
    const CANCEL_CLIENT = 28;
    const CANCEL_OTHER = 29;

    function getStatusAr(){
        return SysDirectoryName::where('parent_id', OrderStatus::CAT_ORDER)->orderBy('id', 'asc')->lists('name', 'id');
    }

    function getCloseAr(){
        return SysDirectoryName::where('parent_id', OrderStatus::CAT_CANCEL)->orderBy('id', 'asc')->lists('name', 'id');
    }

    static function findStatus($id){
        return SysDirectoryName::where('id', $id)->where('parent_id', OrderStatus::CAT_ORDER)->first();
    }

    static function findClose($id){
        return SysDirectoryName::where('id', $id)->where('parent_id', OrderStatus::CAT_CANCEL)->first();
    }
}
