<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use App\Model\TransLib;

class SysDirectoryName extends Model{
    protected $table = 'sys_directory_names';

    const prefix = 'sys_directory_name_';

	public static function boot() {
		$res = parent::boot();
		static::created(function($model){
            $model->createTransLib();
            return true;
        });

		return $res;
	}

    function createTransLib (){
        $key = static::prefix.$this->id;
        TransLib::generateNew($key, $this->name);
    }
}
