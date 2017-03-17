<?php
namespace App\Http\Controllers\Admin;

use DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\Generators\DirectoryNameController;

use Illuminate\Http\Request;
use App\Model\SysDirectoryName;

class MenuTypeController extends DirectoryNameController{
    protected $title = 'Виды блюд';
    protected $parent_id = 4;
    protected $action_class = 'Admin\MenuTypeController';
    
}
