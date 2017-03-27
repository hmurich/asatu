<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use App\Model\Generators\ModelSnipet;

class Review extends Model{
    protected $table = 'review';


    function getCreatedAttribute(){
        return ModelSnipet::formatDate($this->created_at, 'd.m.Y');
    }

    function relAnswer(){
        return $this->hasOne('App\Model\Review', 'parent_id');
    }


}
