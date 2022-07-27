<?php

namespace SERMA\Api_Rest;

class Semana
{

	protected static $post_type = 'semana';

	public function __construct()
	{
		add_filter('register_post_type_args', '\SERMA\Api_Rest\Semana::register', 10, 2);
	}

	/**
	 * Register a semana post type, with REST API support
	 *
	 * Based on example at: https://codex.wordpress.org/Function_Reference/register_post_type
	 * @access public
	 *
	 * @return array args
	 */
	public static function register($args, $post_type)
	{
		if (self::$post_type === $post_type) $args['show_in_rest'] = true;
		return $args;
	}
}
