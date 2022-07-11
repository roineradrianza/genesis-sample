<?php
/**
 * Genesis Sample.
 *
 * This file adds the landing page template to the Genesis Sample Theme.
 *
 * Template Name: Login
 *
 * @package Genesis Sample
 * @author  StudioPress
 * @license GPL-2.0-or-later
 * @link    https://www.studiopress.com/
 */

if (is_user_logged_in()) {
	wp_redirect( site_url() );
}

// set full width layout

add_filter ( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );


add_filter( 'body_class', 'genesis_sample_login_body_class' );
/**
 * Adds landing page body class.
 *
 * @since 1.0.0
 *
 * @param array $classes Original body classes.
 * @return array Modified body classes.
 */
function genesis_sample_login_body_class( $classes ) {

	$classes[] = 'login-page bg-purple-lighten-1';
	return $classes;

}

// Removes Skip Links.
remove_action( 'genesis_before_header', 'genesis_skip_links', 5 );

add_action( 'wp_enqueue_scripts', 'genesis_sample_dequeue_skip_links' );
/**
 * Dequeues Skip Links Script.
 *
 * @since 1.0.0
 */
function genesis_sample_dequeue_skip_links() {

	wp_dequeue_script( 'skip-links' );

}

// Remove sidebar
remove_action( 'genesis_sidebar', 'genesis_do_sidebar' );

// Removes site header elements.

remove_action( 'genesis_header', 'serma_genesis_header' );
remove_action( 'genesis_header', 'genesis_header_markup_open', 5 );
remove_action( 'genesis_header', 'genesis_do_header' );
remove_action( 'genesis_header', 'genesis_header_markup_close', 15 );

// Removes navigation.
remove_theme_support( 'genesis-menus' );

// Removes site footer elements.
remove_action( 'genesis_footer', 'genesis_footer_markup_open', 5 );
remove_action( 'genesis_footer', 'genesis_do_footer' );
remove_action( 'genesis_footer', 'serma_genesis_footer' );
remove_action( 'genesis_footer', 'genesis_footer_markup_close', 15 );
remove_action( 'genesis_loop', 'genesis_do_loop' );
remove_action( 'genesis_header', 'genesis_do_header' );

add_action( 'genesis_header', 'serma_genesis_login_header' );

add_action( 'genesis_loop', 'my_login_loop' );

add_action('wp_head', 'login_inline_css', 100);

add_action('wp_enqueue_scripts', 'ser_madre_theme_login_styles');

add_action('wp_enqueue_scripts', 'ser_madre_theme_login_scripts');


function ser_madre_theme_login_styles() {
	wp_register_style( 'tailwind-flowbite', "https://unpkg.com/@themesberg/flowbite@1.3.0/dist/flowbite.min.css", '' ,'1.3.0', true );
	
	wp_enqueue_style( 'tailwind-flowbite' );
}


function ser_madre_theme_login_scripts() {
	wp_register_script( 'tailwind-flowbite-datepicker', get_stylesheet_directory_uri() . "/assets/js/flowbite/datepicker.js", 'tailwind-flowbite', '1.3.0', true );
	wp_register_script( 'serma-http', get_stylesheet_directory_uri() . "/assets/js/Classes/Http.min.js", '1.0.0', true );
	wp_register_script( 'serma-login', get_stylesheet_directory_uri() . "/assets/js/serma-login.js", ['serma-http'], '1.0.2', true );
	
	wp_enqueue_script( 'tailwind-flowbite-datepicker' );
	wp_enqueue_script( 'serma-http' );
	wp_enqueue_script( 'serma-login' );
	wp_dequeue_script( 'serma-core' );

	wp_localize_script('serma-login', 'wp_url', esc_url(admin_url('admin-ajax.php')) . "?action=");

}

function login_inline_css()
{
 echo "
    <style id='login_styles'>
        .login-page {
            background-image: url('".get_stylesheet_directory_uri()."/assets/img/login/bg.svg');
			background-size: 100%;
			background-position: center;
        }

		.serma-login-container {
			background-image: url('".get_stylesheet_directory_uri()."/assets/img/login/login-bg.svg');
			background-size: 100%;
			background-position: center;
		}

		.serma-register-container-1 {
			background-image: url('".get_stylesheet_directory_uri()."/assets/img/login/register-bg-01.svg');
			background-size: 100%;
			background-position: center;
		}


		.serma-register-container-2 {
			background-image: url('".get_stylesheet_directory_uri()."/assets/img/login/register-bg-02.svg');
			background-size: 100%;
			background-position: top;
		}

		[role='tab'].active {
			color: #585CE5;
			border: none;
			border-bottom: 2px solid #585CE5;
			border-radius: 0px;
		}
    </style>
 ";
}

function serma_genesis_login_header() {
    get_template_part( 'template-parts/signin/header' );
}

function my_login_loop () {  

    get_template_part( 'template-parts/signin' );

}

// Runs the Genesis loop.
genesis();
