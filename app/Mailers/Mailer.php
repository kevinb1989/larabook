<?php
namespace App\Mailers;

use Illuminate\Mail\Mailer as Mail;

abstract class Mailer{

	protected $mail;

	public function __construct(Mail $mail){
		$this->mail = $mail;
	}

	public function sendTo($user, $subject, $view, $data = []){
		$this->mail->queue($view, $data, function($message) use($user){
			$message->to($user->email)->subject('Welcome to Larabook!');

		});
	}
}