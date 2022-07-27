<?php

namespace SERMA\Api_Rest;

class Nombres
{

	protected static $post_type = 'nombres';

	public function __construct()
	{
		add_filter('register_post_type_args', '\SERMA\Api_Rest\Nombres::register', 10, 2);
		add_action('rest_api_init', '\SERMA\Api_Rest\Nombres::setup');
	}

	/**
	 * Register a nombre post type, with REST API support
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

	public static function setup(): Void
	{
		register_rest_field(
			self::$post_type,
			'taxonomies_detailed', //New Field Name in JSON RESPONSEs
			array(
				'get_callback'    => '\SERMA\Api_Rest\Nombres::custom_fields', // custom function name 
				'update_callback' => null,
				'schema'          => null,
			)
		);
	}

	public static function custom_fields($object, $field_name, $request): array
	{
		$origins = [];
		$genres = [];
		$personalities = [];

		if (!empty($object['origin'])) {
			foreach ($object['origin'] as $origin) {
				$origins[] = get_term_by('term_taxonomy_id', $origin, 'origin');
			}
		}

		if (!empty($object['genre'])) {
			foreach ($object['genre'] as $genre) {
				$genres[] = get_term_by('term_taxonomy_id', $genre, 'genre');
			}
		}

		if (!empty($object['personality_names'])) {
			foreach ($object['personality_names'] as $personality) {
				$personalities[] = get_term_by('term_taxonomy_id', $personality, 'personality_names');
			}
		}

		$arr = [
			'origin' => $origins,
			'genre' => $genres,
			'personality' => $personalities
		];

		return $arr;
	}
}
