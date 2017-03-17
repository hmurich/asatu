<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class StaticPage extends Model{
    protected $table = 'static_pages';

    function getTitleTransAttribute(){
		$name = $this->title;
		if (session()->has('lang_id') && session()->get('lang_id') == 'kz' && $this->title_kz)
			$name = $this->title_kz;
		else if (session()->has('lang_id') && session()->get('lang_id') == 'en' && $this->title_en)
			$name = $this->title_en;

		return $name;
	}

	function getNoteTransAttribute(){
		$text = $this->note;
		if (session()->has('lang_id') && session()->get('lang_id') == 'kz' && $this->note_kz)
			$text = $this->note_kz;
		else if (session()->has('lang_id') && session()->get('lang_id') == 'en' && $this->note_en)
			$text = $this->note_en;

		return $text;
	}

    function getShortNoteTransAttribute(){
		$text = $this->short_note;
		if (session()->has('lang_id') && session()->get('lang_id') == 'kz' && $this->short_note_kz)
			$text = $this->short_note_kz;
		else if (session()->has('lang_id') && session()->get('lang_id') == 'en' && $this->short_note_en)
			$text = $this->short_note_en;

		return $text;
	}
}
