<?php
use AhmadAwais\Sendy\API as Sendy;

if (!class_exists('SERMA_SENDY')) {


	/**
	 * Sendy API
	 *
	 * SerMadre Sendy Newsletter Handler
	 *
	 * @version 0.1
	 */

	class SERMA_SENDY
	{

		private static $_config = [
			'sendyUrl' => SERMA_SENDY_URL,
			'apiKey' => SERMA_SENDY_API_KEY,
			'listId' => SERMA_SENDY_LIST,
		];

		public static function subscribe(): Array
		{
			$data = $_POST;
			$config = self::$_config;
			$sendy = new Sendy($config);
			$responseArray = $sendy->subscribe(
				[
					'email' => sanitize_email($data['email']), // This is the only field required by sendy.
					'name' => sanitize_text_field($data['first_name']),
					'Fechaprevistaparaelparto' => DateTime::createFromFormat('d/m/Y', $data['pregnant_date'])->format('d-m-Y'),
					'Tratadequedarembarazada' => empty($data['pregnant_wish']) ? 'No' : 'Sí',
					'ipaddress' => $_SERVER['REMOTE_ADDR'], // User IP address (optional).
					'referrer' => esc_url_raw($data['url_referrer']), // URL where the user signed up from (optional).
				]
			);
			return $responseArray;
		}
	}

}