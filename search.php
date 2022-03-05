<?php

/**
 * Genesis Framework.
 *
 * WARNING: This file is part of the core Genesis Framework. DO NOT edit this file under any circumstances.
 * Please do all modifications in the form of a child theme.
 *
 * @package Genesis\Templates
 * @author  StudioPress
 * @license GPL-2.0-or-later
 * @link    https://my.studiopress.com/themes/genesis/
 */

add_filter('genesis_pre_get_option_site_layout', '__genesis_return_full_width_content');

/* Remove the default loop */
remove_action('genesis_loop', 'genesis_do_loop');
add_action('genesis_loop', 'hs_do_search_loop');

add_action('wp_enqueue_scripts', 'sermadre_theme_search_scripts');
add_filter('body_class', 'wpse_body_classes');
add_action('wp_head', 'search_inline_css', 100);



function hs_do_search_loop()
{
	$s = get_search_query();
	$type = $_GET['post_type'];

	$post_collection = [
		[
			'tab_title' => 'Nombres',
			'tab_id'  => 'name',
			'target' => 'name_container',
			'default' => true,
			'origin' => 'local',
			'post_type' => 'nombres'
		],
		[
			'tab_title' => 'Artículos',
			'tab_id'  => 'article',
			'target' => 'article_container',
			'default' => false,
			'origin' => 'remote',
			'post_type' => 'post',
			'items' => serma_get_posts_rest(
				'https://sermadre.com/blog',
				[
					'url' => 'wp/v2/posts',
					'args' => [
						'search' => $s,
						'per_page' => 5,
						'hide_empty' => 'true',
					]
				]
			)
		]
	];

	$posts = [];

	foreach ($post_collection as $post) {

		$post['tab_title'] == $type ? $post['default'] = true : $post['default'] = false;
		
		if ($post['origin'] == 'remote') {
			for ($i=0; $i < count($post['items']); $i++) { 
				$post['items'][$i]['post_title'] = $post['items'][$i]['title'];
			}
			$posts[] = $post;
			continue;
		}

		$args = (array(
			's' => $s,
			'post_type' => $post['post_type'],
			'posts_per_page' => 5,
		));

		$post['items'] = get_posts( $args );

		for ($i=0; $i < count($post['items']); $i++) {
			$post['items'][$i]->link = get_permalink( $post['items'][$i] );
			$post['items'][$i] = (array) $post['items'][$i];
		}

		$posts[] = $post;

	}

	get_template_part( 'template-parts/search', null, $posts );
}

function sermadre_theme_search_scripts() {
	wp_register_script( 'serma-http', get_stylesheet_directory_uri() . "/assets/js/Classes/Http.min.js", [], '1.0.0', true );
	wp_register_script( 'serma-search', get_stylesheet_directory_uri() . "/assets/js/serma-search.js", [], '1.0.0', true );
    wp_localize_script( 'serma-search', 'serma_ajax_url', esc_url(admin_url('admin-ajax.php')) . "?action=" );

	wp_enqueue_script( 'serma-http' );
	wp_enqueue_script( 'serma-search' );
}

function search_inline_css()
{
 echo "
    <style id='search_styles'>
		[role='tab'].active {
			color: #585CE5;
			border: none;
			border-bottom: 2px solid #585CE5;
			border-radius: 0px;
		}
    </style>
 ";
}

function wpse_body_classes( $classes ) {
    
    $classes[] = 'search-page bg-[#F2F6FE]';
 
    return $classes;
}

genesis();
