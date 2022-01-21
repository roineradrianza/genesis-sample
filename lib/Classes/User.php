<?php

/**
 * SerMadre User Controller
 *
 *
 * @version 1.0.0
 * @author roineradrianza
 *
 *
 */

class SERMA_USER
{
	/**
	 * Add ajax actions for the user handle
	 */
	public static function init()
	{
		//USERS ACTIONS
		add_action('wp_ajax_nopriv_serma_login', 'SERMA_USER::login');
		add_action('wp_ajax_serma_logout', 'SERMA_USER::logout');
		add_action('wp_ajax_nopriv_serma_logout', 'SERMA_USER::logout');
		add_action('wp_ajax_serma_reset_password', 'SERMA_USER::reset_password');
		//USER MANAGER
		add_action('wp_ajax_serma_update_user', 'SERMA_USER::update');
	}

	/**
	 * User login method
	 * @return mixed
	 */
	public static function login() : Mixed
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
	public static function reset_password() : Mixed
	{
		$data = !empty($_POST) ? $_POST : json_decode(file_get_contents("php://input"), true);
		$user_email = sanitize_text_field($data['email']);
 
		$user = get_user_by( 'email', $user_email );
		if( $user instanceof WP_User ) {
			$user_id = $user->ID;
			$user_info = get_userdata($user_id);
			$unique = get_password_reset_key( $user_info );
			$unique_url = network_site_url("wp-login.php?action=rp&key=$unique&login=" . rawurlencode($user_info->user_login), 'login');
			
			$subject  = "Enlace para restablecer la contraseña";
			$message = __('Alguien ha solicitado que se restablezca la contraseña de la siguiente cuenta:') . "\r\n\r\n";
			$message  = "<p>Hi ".ucfirst( $user_info->first_name ).",</p>";
			$message .= network_home_url( '/' ) . "\r\n\r\n";
			$message .= sprintf(__('email: %s'), $user_info->email) . "\r\n\r\n";
			$message .= __('Si se trata de un error, ignora este correo electrónico y no pasará nada.') . "\r\n\r\n";
			$message .= __('Para restablecer su contraseña, visite la siguiente dirección:') . "\r\n\r\n";
			$message .=  $unique_url;

			wp_mail( $user_email, $subject, $message );

			wp_send_json( ['status' => 'success', 'message' => 'Enlace de reestablecimiento de contraseña enviado'] );
		} else {
			wp_send_json(['status' => 'error', 'message' => 'El correo electrónico ingresado no corresponde a ningún usuario registrado']);
		}
	}

	/**
	 * User password update method
	 * @return mixed
	 */
	public static function change_password() : Mixed
	{
		$data = json_decode(file_get_contents("php://input"), true);
		if (empty($data['password'])) {
			wp_send_json(['status' => 'danger', 'message' => 'La contraseña no puede estar vacía']);
		}

		$user = SERMA_USER::get_current_user();
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
		wp_redirect( site_url() . '/login' );
	}

	/**
	 * User get method
	 * return an array of the current user or the user id specified
	 * @return Array
	 */
	public static function get_current($id = '') : Array
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
}
