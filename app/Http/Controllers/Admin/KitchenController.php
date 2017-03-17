<?php
namespace App\Http\Controllers\Admin;

use DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\Generators\DirectoryNameController;

use Illuminate\Http\Request;
use App\Model\SysDirectoryName;

class KitchenController extends DirectoryNameController{
    protected $title = 'Кухни';
    protected $parent_id = 5;
    protected $action_class = 'Admin\KitchenController';
    
}
