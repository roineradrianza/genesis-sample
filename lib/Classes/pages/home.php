<?php

namespace SERMA\Pages;

class Home
{

	public function __construct()
	{
		add_action('template_redirect', array($this, 'init'), 10);
	}

	/** 
	 * Enqueue scripts - styles & verify if the current user is a guest
	 * 
	 * @access public
	 */
	public function init(): Void
	{
		if (is_front_page()) {
			$this->enqueue();
		}
	}

	/** 
	 * Enqueue required scripts & styles for the template
	 * 
	 * @access public
	 */
	public static function enqueue(): Void
	{
		remove_action('genesis_loop', 'genesis_do_loop');

		add_action('wp_head', '\SERMA\Pages\Home::inline_styles', 100);
		add_action('wp_enqueue_scripts', '\SERMA\Pages\Home::scripts');
		add_action('genesis_loop', '\SERMA\Pages\Home::template');

		add_filter('body_class', '\SERMA\Pages\Home::body_classes');
		add_filter ( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );
	}

	/** 
	 * body classes
	 * 
	 * @access public
	 * 
	 * @return array $classes
	 */
	public static function body_classes($classes): array
	{
		$classes[] = 'home-body';
		return $classes;
	}

	/** 
	 * Render the page template
	 * 
	 * @access public
	 */
	public static function template(): Void
	{

		$params = [
			'medical_articles' => serma_get_posts_rest(
				'https://sermadre.com/articulos-medicos',
				[
					'url' => 'wp/v2/posts',
				]
			),
			'news_category' => serma_get_posts_rest(
				'https://sermadre.com/blog',
				[
					'api' => 'categories',
					'url' => 'wp/v2/categories',
					'args' => [
						'per_page' => '100',
						'hide_empty' => 'true'
					]
				]
			),
		];

		get_template_part('page-templates/home', null, $params);
	}

	/** 
	 * Enqueue scripts
	 * 
	 * @access public
	 */
	public static function scripts(): Void
	{
		wp_register_script('serma-home', get_stylesheet_directory_uri() . "/assets/js/serma-home.js", [], '1.0.8', true);

		wp_enqueue_script('serma-home');

		wp_localize_script('serma-home', 'serma_ajax_url', esc_url(admin_url('admin-ajax.php')) . "?action=");
	}

	/** 
	 * Enqueue inline styles to the head
	 * 
	 * @access public
	 */
	public static function inline_styles(): Void
	{

		$theme_dir = get_stylesheet_directory_uri();

		echo "
			<style id='homepage_styles'>
				body.home-body .site-inner {
					max-width: 1920px;
				}
				.serma-home-hero-container {
					background-image: url('" . $theme_dir . "/assets/img/home/hero-bg.svg');
				}

				.serma-community-cta-container{
					background-image: url('" . $theme_dir . "/assets/img/home/comunidad/bg.svg');
					background-repeat: no-repeat;
				}

				.serma-home-pregnancy-week-container {
					background-image: url('" . $theme_dir . "/assets/img/home/semanas-de-embarazo/section-bg.svg');
				}

				.serma-home-pregnancy-week-container .day-default {
					background-image: url('" . $theme_dir . "/assets/icons/pregnancy-weeks/default.svg');
					background-repeat: no-repeat;
				}

					.serma-home-pregnancy-week-container .day-default:hover, .serma-home-pregnancy-week-container .day-default:active {
						background-image: url('" . $theme_dir . "/assets/icons/pregnancy-weeks/active.svg');
					}

				.serma-utilities-container {
					background-image: url('" . $theme_dir . "/assets/img/home/utilidades/bg.svg');
					background-repeat: no-repeat;
				}
				
				.serma-community-cta-container, .serma-home-pregnancy-week-container {
					background-size: cover
				}

				.pregnancy-image {
					width: 164px;
					height: 150px;
				}
				
				.utilities-cta-1{
					background-image: url('" . $theme_dir . "/assets/img/home/utilidades/cta-1.png');
					background-repeat: no-repeat;
					background-size: cover;
				}
						
				.utilities-cta-2{
					background-image: url('" . $theme_dir . "/assets/img/home/utilidades/cta-2.png');
					background-repeat: no-repeat;
					background-size: cover;
				}
			
				.utilities-cta-3{
					background-image: url('" . $theme_dir . "/assets/img/home/utilidades/cta-3.png');
					background-repeat: no-repeat;
					background-size: cover;
				}

				@media only screen and (max-width: 550px) {

					.serma-community-cta-container {
						background-size: 220%;
						background-position: 7% -64%;
					}
				
				}
				
				@media only screen and (max-width: 479px) {

					.serma-community-cta-container {
						background-size: 200%;
						background-position: -8% 0%;
					}
				
				}
			</style>
		";
	}
}
