<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Moderator extends Model{
    protected $table = 'moderators';

    function relUser(){
        return $this->belongsTo('App\User', 'user_id');
    }

    function generateTotalName(){
        $ar = array();
        if ($this->s_name)
            $ar[] = ucfirst(mb_strtolower($this->s_name));

        if ($this->f_name)
            $ar[] = ucfirst(mb_strtolower($this->f_name));

        if ($this->p_name)
            $ar[] = ucfirst(mb_strtolower($this->p_name));

        $this->total_name = implode(" ", $ar);

        return $this->total_name;
    }

}
