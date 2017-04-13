<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model{
    protected $table = 'sales';

    function getNoteTransAttribute(){
		$text = $this->note;
		if (session()->has('lang_id') && session()->get('lang_id') == 'kz' && $this->note_kz)
			$text = $this->note_kz;
		else if (session()->has('lang_id') && session()->get('lang_id') == 'en' && $this->note_en)
			$text = $this->note_en;

		return $text;
	}
}
