<?php

namespace SERMA;

class Mail_Provider
{

	public static function send_mail($to = [], $subject = '', $message = '', $headers = [], $attachments = [])
	{
		$headers[] = 'Content-Type: text/html; charset=UTF-8';
		$email_response = wp_mail($to, $subject, $message, $headers, $attachments);
		return $email_response;
	}

	public static function send_user_credentials_mail($user)
	{
		$headers[] = 'Content-Type: text/html; charset=UTF-8';
		ob_start();
		include(get_stylesheet_directory() . "/template-parts/emails/account-credentials-created.php");
		$template = ob_get_contents();
		ob_end_clean();
		$email_response = wp_mail($user['user_email'], '¡Bienvenid@ a SerMadre!', $template, $headers, []);
		return $email_response;
	}
}
