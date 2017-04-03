<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Mail;
use App\User;

class MailSend extends Model {
	protected $table = 'mail_send';
    protected $fillable = array('title', 'note', 'to_email', 'to_name');

	static function send ($to_email, $title, $note, $to_name = null) {
		if (!$to_name)
			$to_name = 'Дорогой пользователь';

		Mail::queue('emails.message', array('title' => $title, 'note'=>$note), function($message) use ($to_email, $title, $to_name){
			$message->to($to_email, $to_name)->subject($title);
		});

		$mail = new MailSend();
		$mail->title = $title;
		$mail->note = $note;
		$mail->to_email = $to_email;
		$mail->to_name = $to_name;

		if (!$mail->save())
			return false;

		return $mail;
	}

}
