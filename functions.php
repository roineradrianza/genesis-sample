<?php
/**
 * Genesis Sample.
 *
 * This file adds functions to the Genesis Sample Theme.
 *
 * @package Genesis Sample
 * @author  StudioPress
 * @license GPL-2.0-or-later
 * @link    https://www.studiopress.com/
 */


// Starts the engine.
require_once get_template_directory() . '/lib/init.php';

// Sets up the Theme.
require_once get_stylesheet_directory() . '/lib/theme-defaults.php';

add_action( 'after_setup_theme', 'genesis_sample_localization_setup' );
/**
 * Sets localization (do not remove).
 *
 * @since 1.0.0
 */
function genesis_sample_localization_setup() {

	load_child_theme_textdomain( genesis_get_theme_handle(), get_stylesheet_directory() . '/languages' );

}


//Include custom sermadre classes

//User manager class
require_once(get_stylesheet_directory() . '/lib/Classes/User.php');

// Adds helper functions.
require_once get_stylesheet_directory() . '/lib/helper-functions.php';

// Adds image upload and color select to Customizer.
require_once get_stylesheet_directory() . '/lib/customize.php';

// Includes Customizer CSS.
require_once get_stylesheet_directory() . '/lib/output.php';

// Adds WooCommerce support.
// require_once get_stylesheet_directory() . '/lib/woocommerce/woocommerce-setup.php';

// Adds the required WooCommerce styles and Customizer CSS.
// require_once get_stylesheet_directory() . '/lib/woocommerce/woocommerce-output.php';

// Adds the Genesis Connect WooCommerce notice.
// require_once get_stylesheet_directory() . '/lib/woocommerce/woocommerce-notice.php';

add_action( 'after_setup_theme', 'genesis_child_gutenberg_support' );
/**
 * Adds Gutenberg opt-in features and styling.
 *
 * @since 2.7.0
 */
function genesis_child_gutenberg_support() { // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedFunctionFound -- using same in all child themes to allow action to be unhooked.
	require_once get_stylesheet_directory() . '/lib/gutenberg/init.php';
}

// Registers the responsive menus.
if ( function_exists( 'genesis_register_responsive_menus' ) ) {
	genesis_register_responsive_menus( genesis_get_config( 'responsive-menus' ) );
}

add_action( 'wp_enqueue_scripts', 'genesis_sample_enqueue_scripts_styles' );
/**
 * Enqueues scripts and styles.
 *
 * @since 1.0.0
 */
function genesis_sample_enqueue_scripts_styles() {

	$appearance = genesis_get_config( 'appearance' );

	wp_enqueue_style( // phpcs:ignore WordPress.WP.EnqueuedResourceParameters.MissingVersion -- see https://core.trac.wordpress.org/ticket/49742
		genesis_get_theme_handle() . '-fonts',
		$appearance['fonts-url'],
		[],
		null
	);

	wp_enqueue_style( 'dashicons' );

	if ( genesis_is_amp() ) {
		wp_enqueue_style(
			genesis_get_theme_handle() . '-amp',
			get_stylesheet_directory_uri() . '/lib/amp/amp.css',
			[ genesis_get_theme_handle() ],
			genesis_get_theme_version()
		);
	}

}

add_filter( 'body_class', 'genesis_sample_body_classes' );
/**
 * Add additional classes to the body element.
 *
 * @since 3.4.1
 *
 * @param array $classes Classes array.
 * @return array $classes Updated class array.
 */
function genesis_sample_body_classes( $classes ) {

	if ( ! genesis_is_amp() ) {
		// Add 'no-js' class to the body class values.
		$classes[] = 'no-js';
	}
	return $classes;
}

add_action( 'genesis_before', 'genesis_sample_js_nojs_script', 1 );
/**
 * Echo the script that changes 'no-js' class to 'js'.
 *
 * @since 3.4.1
 */
function genesis_sample_js_nojs_script() {

	if ( genesis_is_amp() ) {
		return;
	}

	?>
	<script>
	//<![CDATA[
	(function(){
		var c = document.body.classList;
		c.remove( 'no-js' );
		c.add( 'js' );
	})();
	//]]>
	</script>
	<?php
}

add_filter( 'wp_resource_hints', 'genesis_sample_resource_hints', 10, 2 );
/**
 * Add preconnect for Google Fonts.
 *
 * @since 3.4.1
 *
 * @param array  $urls          URLs to print for resource hints.
 * @param string $relation_type The relation type the URLs are printed.
 * @return array URLs to print for resource hints.
 */
function genesis_sample_resource_hints( $urls, $relation_type ) {

	if ( wp_style_is( genesis_get_theme_handle() . '-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = [
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		];
	}

	return $urls;
}

add_action( 'after_setup_theme', 'genesis_sample_theme_support', 9 );
/**
 * Add desired theme supports.
 *
 * See config file at `config/theme-supports.php`.
 *
 * @since 3.0.0
 */
function genesis_sample_theme_support() {

	$theme_supports = genesis_get_config( 'theme-supports' );

	foreach ( $theme_supports as $feature => $args ) {
		add_theme_support( $feature, $args );
	}

}

add_action( 'after_setup_theme', 'genesis_sample_post_type_support', 9 );
/**
 * Add desired post type supports.
 *
 * See config file at `config/post-type-supports.php`.
 *
 * @since 3.0.0
 */
function genesis_sample_post_type_support() {

	$post_type_supports = genesis_get_config( 'post-type-supports' );

	foreach ( $post_type_supports as $post_type => $args ) {
		add_post_type_support( $post_type, $args );
	}

}

// Adds image sizes.
add_image_size( 'sidebar-featured', 75, 75, true );
add_image_size( 'genesis-singular-images', 702, 526, true );

// Removes header right widget area.
unregister_sidebar( 'header-right' );

// Removes secondary sidebar.
unregister_sidebar( 'sidebar-alt' );

// Removes site layouts.
genesis_unregister_layout( 'content-sidebar-sidebar' );
genesis_unregister_layout( 'sidebar-content-sidebar' );
genesis_unregister_layout( 'sidebar-sidebar-content' );

// Repositions primary navigation menu.
remove_action( 'genesis_after_header', 'genesis_do_nav' );
add_action( 'genesis_header', 'genesis_do_nav', 12 );

// Repositions the secondary navigation menu.
remove_action( 'genesis_after_header', 'genesis_do_subnav' );
add_action( 'genesis_footer', 'genesis_do_subnav', 10 );

add_filter( 'wp_nav_menu_args', 'genesis_sample_secondary_menu_args' );
/**
 * Reduces secondary navigation menu to one level depth.
 *
 * @since 2.2.3
 *
 * @param array $args Original menu options.
 * @return array Menu options with depth set to 1.
 */
function genesis_sample_secondary_menu_args( $args ) {

	if ( 'secondary' === $args['theme_location'] ) {
		$args['depth'] = 1;
	}

	return $args;

}

add_filter( 'genesis_author_box_gravatar_size', 'genesis_sample_author_box_gravatar' );
/**
 * Modifies size of the Gravatar in the author box.
 *
 * @since 2.2.3
 *
 * @param int $size Original icon size.
 * @return int Modified icon size.
 */
function genesis_sample_author_box_gravatar( $size ) {

	return 90;

}

add_filter( 'genesis_comment_list_args', 'genesis_sample_comments_gravatar' );
/**
 * Modifies size of the Gravatar in the entry comments.
 *
 * @since 2.2.3
 *
 * @param array $args Gravatar settings.
 * @return array Gravatar settings with modified size.
 */
function genesis_sample_comments_gravatar( $args ) {

	$args['avatar_size'] = 60;
	return $args;

}

/**
 * Load Ser Madre core scripts
 *
 * @since 3.4.1
 *
 */
add_action('wp_enqueue_scripts', 'ser_madre_theme_core_scripts');

function ser_madre_theme_core_scripts() {
	wp_register_script( 'tailwind-css', "https://cdn.tailwindcss.com", [], '3.0.12', true );
	wp_register_script( 'tailwind-flowbite', "https://unpkg.com/@themesberg/flowbite@1.3.0/dist/flowbite.bundle.js", 'tailwind-css', '1.3.0', true );
	wp_register_script( 'fontawesome', get_stylesheet_directory_uri() . "/assets/icons/fontawesome-5.15.4/js/all.min.js", [], '5.15.4', true );
	wp_register_script( 'serma-core', get_stylesheet_directory_uri() . "/assets/js/serma-core.js", [], '1.0.0', true );
	
	wp_enqueue_script( 'tailwind-css' );
	wp_enqueue_script( 'tailwind-flowbite' );
	wp_enqueue_script( 'fontawesome' );
	wp_enqueue_script( 'serma-core' );

	wp_add_inline_script( 'tailwind-css', "
	tailwind.config = {
		variants: {
			extend: {
				// ...
				display: ['hover', 'focus', 'group-hover'],
			}
		},
		theme: {
			darkMode: false,
			extend: {
				colors: {
					primary: '#62CEF9',
					secondary: '#4D4D4D',
					icon: '#8D8D8D',
					text: '#6A6B7A',
					success: '#4AC989',
					error: '#ff7070',
					'lighten-grey': '#F1F2F3',
					'purple-lighten': '#A28EEC',
					'purple-darken': '#585CE5',
					'purple-lighten-1': '#a28eec1a',
					'purple-lighten-2': '#a28eec26',
					'purple-lighten-3': '#a28eec40',
					'purple-lighten-4': '#a28eec59',
					'green-lighten': '#4AC989',
					'green-lighten-1': '#4ac98926',
					'red-lighten-1': '#ff707026',
					'cyan-lighten-1': '#62cef940',
					'yellow-lighten': 'rgba(236, 172, 74, 0.25)',
				},
				margin: {
					'n1': '-1px',
				},
				borderRadius: {
					'lg-2x': '1em'
				}
			},
			fontFamily: {
				'body': ['\"Inter\"']
			},
			fontSize: {
				'xs': '.0.63rem',
				'sm': '.473rem',
				'tiny': '.7225rem',
				'base': '0.85rem',
				'lg': '0.956rem',
				'xl': '1.06rem',
				'2xl': '1.275rem',
				'3xl': '1.593rem',
				'4xl': '1.91rem',
				'4-5xl': '2.125rem',
				'5xl': '2.55rem',
				'6xl': '3.4rem',
				'7xl': '4.25rem',
			}
		},

	}" );
}

add_action('wp_enqueue_scripts', 'ser_madre_theme_core_styles');

function ser_madre_theme_core_styles() {
	wp_register_style( 'fontawesome', get_stylesheet_directory_uri() . "/assets/icons/fontawesome-5.15.4/css/fontawesome.min.css", '' ,'5.15.4', true );
	wp_register_style( 'fontawesome-all', get_stylesheet_directory_uri() . "/assets/icons/fontawesome-5.15.4/css/all.min.css", ['fontawesome'], '5.15.4', true );
	wp_register_style( 'google-font-inter', "https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;800;900&display=swap" );

	wp_enqueue_style( 'fontawesome' );
	wp_enqueue_style( 'fontawesome-all' );
	wp_enqueue_style( 'google-font-inter' );


}

remove_action( 'genesis_footer', 'genesis_do_footer' );
add_action( 'genesis_footer', 'serma_genesis_footer' );

/**
 * Ser Madre footer
 *
 * @since 3.4.1
 *
 * @return mixed Footer template
 */

function serma_genesis_footer () {
	get_template_part( 'template-parts/layout/footer' );
}

remove_action( 'genesis_header', 'genesis_do_header' );
add_action( 'genesis_header', 'serma_genesis_header' );

function serma_genesis_header () {
	get_template_part( 'template-parts/layout/header', null, ['show_nav' => true] );
}

//* TN Dequeue Styles - Remove Dashicons from Genesis Theme
add_action( 'wp_print_styles', 'tn_dequeue_dashicons_style' );
function tn_dequeue_dashicons_style() { 
      wp_dequeue_style( 'dashicons' );
}

function serma_get_posts_rest($base_url, $endpoint = ['api' => 'posts','url' => 'wp/v2/posts', 'args' => ['per_page' => 4]], $headers = []) {

	// Initialize variable.
	$allposts = [];
    $args = '';

    !array_key_exists('api', $endpoint) ? $endpoint['api'] = 'posts' : '';
    !array_key_exists('args', $endpoint) ? $endpoint['args'] = [] : '';
    !array_key_exists('per_page', $endpoint['args']) ? $endpoint['args']['per_page'] = 4 : '';

    foreach ($endpoint['args'] as $key => $value) {
        $value = empty($value) ? "" : "=$value";
        $args .= empty($args) ? "?$key" . "$value" : "&$key" . "$value";
    }
    $response = wp_remote_get( "$base_url/wp-json/{$endpoint['url']}/$args&_embed", $headers );

	// Exit if error.
	if ( is_wp_error( $response ) ) {
		return;
	}

	// Get the body.
	$posts = json_decode( wp_remote_retrieve_body( $response ) );

	// Exit if nothing is returned.
	if ( empty( $posts ) ) {
		return [];
	}

	// If there are posts.
	if ( ! empty( $posts ) ) {

		// For each post.
        if ($endpoint['api'] == 'posts') {
            foreach ( $posts as $post ) {
                $embedded = get_object_vars($post->_embedded);
                $category = $embedded['wp:term'][0];
                $article = [
                    'title' => $post->title->rendered,
                    'featured_image' => $embedded['wp:featuredmedia'][0]->source_url,
                    'excerpt' => mb_strimwidth(wp_strip_all_tags($post->content->rendered), 0, 65, '...'),
                    'category' => [
                        'id' => $category[0]->id,
                        'name' => $category[0]->name,
                        'link' => $category[0]->link
                    ],
                    'link' => $post->link,
                    'published_at' => $post->date,
                    'published_at_formatted' => wp_date('F j, Y', strtotime($post->date))
                ];
                $allposts[] = $article;
            }
            
        } else if($endpoint['api'] == 'categories') {
            foreach ( $posts as $category ) {
                $item = [
                    'id' => $category->id,
                    'name' => $category->name,
                    'link' => $category->link,
                ];
                $allposts[] = $item;
            }
        } else {
            $allposts = $posts;
        }

        return $allposts;
		
	}

}

function get_external_posts() {
    $data = $_GET;

    wp_send_json( serma_get_posts_rest(
        'https://sermadre.com/blog/',
        [
            'api' => 'posts',
            'url' => 'wp/v2/posts',
            'args' => $data
        ]
    ));
}

add_action( 'wp_ajax_serma_get_blog_posts', 'get_external_posts' );
add_action( 'wp_ajax_nopriv_serma_get_blog_posts', 'get_external_posts' );

SERMA_USER::init();