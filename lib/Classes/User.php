<?php

namespace SERMA;

/**
 * SerMadre User Controller
 *
 *
 * @version 1.0.0
 * @author roineradrianza
 *
 *
 */

class User
{

	/**
	 * Add ajax actions for the user handle
	 */
	public static function init()
	{
		//USERS ACTIONS
		add_action('wp_ajax_nopriv_serma_login', '\SERMA\User::login');
		add_action('wp_ajax_nopriv_serma_register', '\SERMA\User::register');
		add_action('wp_ajax_serma_logout', '\SERMA\User::logout');
		add_action('wp_ajax_nopriv_serma_logout', '\SERMA\User::logout');
		add_action('wp_ajax_serma_reset_password', '\SERMA\User::reset_password');
		//USER MANAGER
		add_action('wp_ajax_serma_update_user', '\SERMA\User::update');
	}

	/**
	 * User login method
	 * @return mixed
	 */
	public static function login(): Mixed
	{
		$data = !empty($_POST) ? $_POST : json_decode(file_get_contents("php://input"), true);
		$credentials = [
			'user_login' => sanitize_text_field($data['email']),
			'user_password' => $data['password'],
			'remember' => $data['remember'] == 'on' ? true : false
		];
		$result = wp_signon($credentials);
		if ($result) {
			$message = [
				'message' => 'Has iniciado sesión, serás redirigido en unos momentos',
				'status' => 'success',
				'data' => $result,
				'redirect_url' => site_url()
			];
		} else {
			$message = ['message' => '', 'status' => 'error', 'data' => $result];
		}
		wp_send_json($message);
	}


	/**
	 * User request password reset method
	 * @return mixed
	 */
	public static function reset_password(): Mixed
	{
		$data = !empty($_POST) ? $_POST : json_decode(file_get_contents("php://input"), true);
		$user_email = sanitize_text_field($data['email']);

		$user = get_user_by('email', $user_email);
		if ($user instanceof \WP_User) {
			$user_id = $user->ID;
			$user_info = get_userdata($user_id);
			$unique = get_password_reset_key($user_info);
			$unique_url = network_site_url("wp-login.php?action=rp&key=$unique&login=" . rawurlencode($user_info->user_login), 'login');

			$subject  = "Enlace para restablecer la contraseña";
			$message = __('Alguien ha solicitado que se restablezca la contraseña de la siguiente cuenta:') . "\r\n\r\n";
			$message  = "<p>Hi " . ucfirst($user_info->first_name) . ",</p>";
			$message .= network_home_url('/') . "\r\n\r\n";
			$message .= sprintf(__('email: %s'), $user_info->email) . "\r\n\r\n";
			$message .= __('Si se trata de un error, ignora este correo electrónico y no pasará nada.') . "\r\n\r\n";
			$message .= __('Para restablecer su contraseña, visite la siguiente dirección:') . "\r\n\r\n";
			$message .=  $unique_url;

			wp_mail($user_email, $subject, $message);

			wp_send_json(['status' => 'success', 'message' => 'Enlace de reestablecimiento de contraseña enviado']);
		} else {
			wp_send_json(['status' => 'error', 'message' => 'El correo electrónico ingresado no corresponde a ningún usuario registrado']);
		}
	}

	/**
	 * User password update method
	 * @return mixed
	 */
	public static function change_password(): Mixed
	{
		$data = json_decode(file_get_contents("php://input"), true);
		if (empty($data['password'])) {
			wp_send_json(['status' => 'danger', 'message' => 'La contraseña no puede estar vacía']);
		}

		$user = self::get_current_user();
		wp_set_password($data['password'], $user['id']);
		wp_signon([
			'user_login' => $user['user_login'],
			'user_password' => $data['password']
		]);
		wp_send_json(['status' => 'success', 'message' => 'Contraseña cambiada']);
	}

	/**
	 * User logout method
	 *
	 */
	public static function logout()
	{
		if (is_user_logged_in()) {
			wp_logout();
		}
		wp_redirect(site_url() . '/login');
	}

	/**
	 * User get method
	 * 
	 * return an array of the current user or the user id specified
	 * @return Array
	 */
	public static function get_current($id = ''): array
	{
		$user = array(
			'id' => 0,
		);

		$current_user = (!empty($id)) ? get_userdata($id) : wp_get_current_user();

		$avatar_url = '';

		if (!empty($current_user->ID) and 0 != $current_user->ID) {
			$user_meta = get_userdata($current_user->ID);
			$user = array(
				'id' => $current_user->ID,
				'user_login' => $current_user->user_login,
				'email' => $current_user->data->user_email,
				'first_name' => get_user_meta($current_user->ID, 'first_name', true),
				'last_name' => get_user_meta($current_user->ID, 'last_name', true),
				'roles' => $user_meta->roles,
			);
		}

		return $user;
	}

	/**
	 * User registration method
	 * 
	 * register the user using the credentials provided
	 * @return Void
	 */
	public static function register(): Void
	{
		$data = !empty($_POST) ? $_POST : json_decode(file_get_contents("php://input"), true);
		$data['pregnant_wish'] = !empty($data['pregnant_wish']) ? true : false;
		$data['pregnant_date'] = !empty($data['pregnant_date']) ?
			\DateTime::createFromFormat('d/m/Y', $data['pregnant_date'])->format('Y-m-d') : '0000-00-00';
		$args = [
			'user_login' => sanitize_user($data['username']),
			'user_email' => sanitize_email($data['email']),
			'first_name' => sanitize_text_field($data['first_name']),
			'last_name' => !empty($data['last_name']) ? sanitize_text_field($data['last_name']) : '',
			'user_pass' => $data['password'],
			'show_admin_bar_front' => false,
			'role' => 'subscriber'
		];
		$result = wp_insert_user($args);
		if (!is_wp_error($result)) {
			add_user_meta($result, 'country', sanitize_text_field($data['country']));
			add_user_meta($result, 'pregnant_wish', $data['pregnant_wish']);
			add_user_meta($result, 'pregnant_date', sanitize_text_field($data['pregnant_date']));
		};
		$message = ['status' => 'success', 'message' => 'Registro completado éxitosamente, puedes iniciar sesión con tus credenciales.', 'data' => $result];
		if (!$result) {
			$message = ['status' => 'error', 'message' => "No fue posible procesar el registro", 'data' => $result];
		} else if (!empty($result->errors)) {
			$message['status'] = 'error';
			if (!empty($result->errors['existing_user_login'])) {
				$message['message'] = 'El alias ya se encuentra registrado, intente con otro.';
			} else if (!empty($result->errors['existing_user_email'])) {
				$message['message'] = 'El correo electrónico ya se encuentra registrado, intente con otro.';
			}
		}
		if ($message['status'] == 'success') {
			Sendy::subscribe();
			Mail_Provider::send_user_credentials_mail($args);
		}
		wp_send_json($message);
	}

	/**
	 * Countries list
	 * 
	 * return an array of countries with their ISO code
	 * @return Array
	 */
	public static function countries()
	{
		return array(
			'AF' => 'Afganistán',
			'AL' => 'Albania',
			'DE' => 'Alemania',
			'AD' => 'Andorra',
			'AO' => 'Angola',
			'AI' => 'Anguila',
			'AQ' => 'Antártida',
			'AG' => 'Antigua y Barbuda',
			'SA' => 'Arabia Saudí',
			'DZ' => 'Argelia',
			'AR' => 'Argentina',
			'AM' => 'Armenia',
			'AW' => 'Aruba',
			'AU' => 'Australia',
			'AT' => 'Austria',
			'AZ' => 'Azerbaiyán',
			'BS' => 'Bahamas',
			'BD' => 'Bangladés',
			'BB' => 'Barbados',
			'BH' => 'Baréin',
			'BE' => 'Bélgica',
			'BZ' => 'Belice',
			'BJ' => 'Benín',
			'BM' => 'Bermudas',
			'BY' => 'Bielorrusia',
			'BO' => 'Bolivia',
			'BA' => 'Bosnia y Herzegovina',
			'BW' => 'Botsuana',
			'BR' => 'Brasil',
			'BN' => 'Brunéi',
			'BG' => 'Bulgaria',
			'BF' => 'Burkina Faso',
			'BI' => 'Burundi',
			'BT' => 'Bután',
			'CV' => 'Cabo Verde',
			'KH' => 'Camboya',
			'CM' => 'Camerún',
			'CA' => 'Canadá',
			'BQ' => 'Caribe neerlandés',
			'QA' => 'Catar',
			'TD' => 'Chad',
			'CZ' => 'Chequia',
			'CL' => 'Chile',
			'CN' => 'China',
			'CY' => 'Chipre',
			'VA' => 'Ciudad del Vaticano',
			'CO' => 'Colombia',
			'KM' => 'Comoras',
			'CG' => 'Congo',
			'KP' => 'Corea del Norte',
			'KR' => 'Corea del Sur',
			'CR' => 'Costa Rica',
			'CI' => 'Côte d’Ivoire',
			'HR' => 'Croacia',
			'CU' => 'Cuba',
			'CW' => 'Curazao',
			'DK' => 'Dinamarca',
			'DM' => 'Dominica',
			'EC' => 'Ecuador',
			'EG' => 'Egipto',
			'SV' => 'El Salvador',
			'AE' => 'Emiratos Árabes Unidos',
			'ER' => 'Eritrea',
			'SK' => 'Eslovaquia',
			'SI' => 'Eslovenia',
			'ES' => 'España',
			'US' => 'Estados Unidos',
			'EE' => 'Estonia',
			'SZ' => 'Esuatini',
			'ET' => 'Etiopía',
			'PH' => 'Filipinas',
			'FI' => 'Finlandia',
			'FJ' => 'Fiyi',
			'FR' => 'Francia',
			'GA' => 'Gabón',
			'GM' => 'Gambia',
			'GE' => 'Georgia',
			'GH' => 'Ghana',
			'GI' => 'Gibraltar',
			'GD' => 'Granada',
			'GR' => 'Grecia',
			'GL' => 'Groenlandia',
			'GP' => 'Guadalupe',
			'GU' => 'Guam',
			'GT' => 'Guatemala',
			'GF' => 'Guayana Francesa',
			'GG' => 'Guernsey',
			'GN' => 'Guinea',
			'GQ' => 'Guinea Ecuatorial',
			'GW' => 'Guinea-Bisáu',
			'GY' => 'Guyana',
			'HT' => 'Haití',
			'HN' => 'Honduras',
			'HU' => 'Hungría',
			'IN' => 'India',
			'ID' => 'Indonesia',
			'IQ' => 'Irak',
			'IR' => 'Irán',
			'IE' => 'Irlanda',
			'BV' => 'Isla Bouvet',
			'IM' => 'Isla de Man',
			'CX' => 'Isla de Navidad',
			'NF' => 'Isla Norfolk',
			'IS' => 'Islandia',
			'AX' => 'Islas Åland',
			'KY' => 'Islas Caimán',
			'CC' => 'Islas Cocos',
			'CK' => 'Islas Cook',
			'FO' => 'Islas Feroe',
			'GS' => 'Islas Georgia del Sur y Sandwich del Sur',
			'HM' => 'Islas Heard y McDonald',
			'FK' => 'Islas Malvinas',
			'MP' => 'Islas Marianas del Norte',
			'MH' => 'Islas Marshall',
			'UM' => 'Islas menores alejadas de EE. UU.',
			'PN' => 'Islas Pitcairn',
			'SB' => 'Islas Salomón',
			'TC' => 'Islas Turcas y Caicos',
			'VG' => 'Islas Vírgenes Británicas',
			'VI' => 'Islas Vírgenes de EE. UU.',
			'IL' => 'Israel',
			'IT' => 'Italia',
			'JM' => 'Jamaica',
			'JP' => 'Japón',
			'JE' => 'Jersey',
			'JO' => 'Jordania',
			'KZ' => 'Kazajistán',
			'KE' => 'Kenia',
			'KG' => 'Kirguistán',
			'KI' => 'Kiribati',
			'KW' => 'Kuwait',
			'LA' => 'Laos',
			'LS' => 'Lesoto',
			'LV' => 'Letonia',
			'LB' => 'Líbano',
			'LR' => 'Liberia',
			'LY' => 'Libia',
			'LI' => 'Liechtenstein',
			'LT' => 'Lituania',
			'LU' => 'Luxemburgo',
			'MK' => 'Macedonia del Norte',
			'MG' => 'Madagascar',
			'MY' => 'Malasia',
			'MW' => 'Malaui',
			'MV' => 'Maldivas',
			'ML' => 'Mali',
			'MT' => 'Malta',
			'MA' => 'Marruecos',
			'MQ' => 'Martinica',
			'MU' => 'Mauricio',
			'MR' => 'Mauritania',
			'YT' => 'Mayotte',
			'MX' => 'México',
			'FM' => 'Micronesia',
			'MD' => 'Moldavia',
			'MC' => 'Mónaco',
			'MN' => 'Mongolia',
			'ME' => 'Montenegro',
			'MS' => 'Montserrat',
			'MZ' => 'Mozambique',
			'MM' => 'Myanmar (Birmania)',
			'NA' => 'Namibia',
			'NR' => 'Nauru',
			'NP' => 'Nepal',
			'NI' => 'Nicaragua',
			'NE' => 'Níger',
			'NG' => 'Nigeria',
			'NU' => 'Niue',
			'NO' => 'Noruega',
			'NC' => 'Nueva Caledonia',
			'NZ' => 'Nueva Zelanda',
			'OM' => 'Omán',
			'NL' => 'Países Bajos',
			'PK' => 'Pakistán',
			'PW' => 'Palaos',
			'PA' => 'Panamá',
			'PG' => 'Papúa Nueva Guinea',
			'PY' => 'Paraguay',
			'PE' => 'Perú',
			'PF' => 'Polinesia Francesa',
			'PL' => 'Polonia',
			'PT' => 'Portugal',
			'PR' => 'Puerto Rico',
			'HK' => 'RAE de Hong Kong (China)',
			'MO' => 'RAE de Macao (China)',
			'GB' => 'Reino Unido',
			'CF' => 'República Centroafricana',
			'CD' => 'República Democrática del Congo',
			'DO' => 'República Dominicana',
			'RE' => 'Reunión',
			'RW' => 'Ruanda',
			'RO' => 'Rumanía',
			'RU' => 'Rusia',
			'EH' => 'Sáhara Occidental',
			'WS' => 'Samoa',
			'AS' => 'Samoa Americana',
			'BL' => 'San Bartolomé',
			'KN' => 'San Cristóbal y Nieves',
			'SM' => 'San Marino',
			'MF' => 'San Martín',
			'PM' => 'San Pedro y Miquelón',
			'VC' => 'San Vicente y las Granadinas',
			'SH' => 'Santa Elena',
			'LC' => 'Santa Lucía',
			'ST' => 'Santo Tomé y Príncipe',
			'SN' => 'Senegal',
			'RS' => 'Serbia',
			'SC' => 'Seychelles',
			'SL' => 'Sierra Leona',
			'SG' => 'Singapur',
			'SX' => 'Sint Maarten',
			'SY' => 'Siria',
			'SO' => 'Somalia',
			'LK' => 'Sri Lanka',
			'ZA' => 'Sudáfrica',
			'SD' => 'Sudán',
			'SS' => 'Sudán del Sur',
			'SE' => 'Suecia',
			'CH' => 'Suiza',
			'SR' => 'Surinam',
			'SJ' => 'Svalbard y Jan Mayen',
			'TH' => 'Tailandia',
			'TW' => 'Taiwán',
			'TZ' => 'Tanzania',
			'TJ' => 'Tayikistán',
			'IO' => 'Territorio Británico del Océano Índico',
			'TF' => 'Territorios Australes Franceses',
			'PS' => 'Territorios Palestinos',
			'TL' => 'Timor-Leste',
			'TG' => 'Togo',
			'TK' => 'Tokelau',
			'TO' => 'Tonga',
			'TT' => 'Trinidad y Tobago',
			'TN' => 'Túnez',
			'TM' => 'Turkmenistán',
			'TR' => 'Turquía',
			'TV' => 'Tuvalu',
			'UA' => 'Ucrania',
			'UG' => 'Uganda',
			'UY' => 'Uruguay',
			'UZ' => 'Uzbekistán',
			'VU' => 'Vanuatu',
			'VE' => 'Venezuela',
			'VN' => 'Vietnam',
			'WF' => 'Wallis y Futuna',
			'YE' => 'Yemen',
			'DJ' => 'Yibuti',
			'ZM' => 'Zambia',
			'ZW' => 'Zimbabue',
		);
	}
}
