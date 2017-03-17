<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Page extends Model{
    protected $table = 'pages';
    const TYPE_ID = 6;

    static function getTypeAr(){
        return SysDirectoryName::where('parent_id', Page::TYPE_ID)->lists('name', 'id');
    }
}
