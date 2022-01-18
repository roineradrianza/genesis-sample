<?php

/*

* Custom Front Page

*/
// set full width layout

add_filter ( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );


// remove Genesis default loop

remove_action( 'genesis_loop', 'genesis_do_loop' );


// add a custom loop

add_action( 'genesis_loop', 'my_custom_loop' );

function wphe_body_classes( $classes ) {
    
    if ( is_front_page() ) { 
        $classes[] = 'home-body';  // add custom class to blog static page frontpage
    }                      
 
    return $classes;
}

add_action('wp_head', 'homepage_inline_css', 100);

function homepage_inline_css()
{
 echo "
    <style id='homepage_styles'>
        .serma-home-hero-container {
            background-image: url('".get_stylesheet_directory_uri()."/assets/img/home/hero-bg.svg');
        }

        .serma-community-cta-container{
            background-image: url('".get_stylesheet_directory_uri()."/assets/img/home/comunidad/bg.svg');
            background-repeat: no-repeat;
        }

        .serma-home-pregnancy-week-container {
            background-image: url('".get_stylesheet_directory_uri()."/assets/img/home/semanas-de-embarazo/section-bg.svg');
        }

        .serma-home-pregnancy-week-container .day-default {
            background-image: url('".get_stylesheet_directory_uri()."/assets/icons/pregnancy-weeks/default.svg');
            background-repeat: no-repeat;
        }

            .serma-home-pregnancy-week-container .day-default:hover, .serma-home-pregnancy-week-container .day-default:active {
                background-image: url('".get_stylesheet_directory_uri()."/assets/icons/pregnancy-weeks/active.svg');
            }

        .serma-utilities-container {
            background-image: url('".get_stylesheet_directory_uri()."/assets/img/home/utilidades/bg.svg');
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
            background-image: url('".get_stylesheet_directory_uri()."/assets/img/home/utilidades/cta-1.png');
            background-repeat: no-repeat;
            background-size: cover;
        }
                
        .utilities-cta-2{
            background-image: url('".get_stylesheet_directory_uri()."/assets/img/home/utilidades/cta-2.png');
            background-repeat: no-repeat;
            background-size: cover;
        }
      
        .utilities-cta-3{
            background-image: url('".get_stylesheet_directory_uri()."/assets/img/home/utilidades/cta-3.png');
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
 ";
}

add_filter( 'body_class', 'wphe_body_classes' );

function my_custom_loop () {  
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

    get_template_part( 'page-templates/home', null, $params );

}

if ( is_front_page() ) { 
    add_action('wp_enqueue_scripts', 'ser_madre_theme_home_scripts');
}    

function ser_madre_theme_home_scripts() {
	wp_register_script( 'serma-home', get_stylesheet_directory_uri() . "/assets/js/serma-home.js", [], '1.0.1', true );
	wp_enqueue_script( 'serma-home' );
    wp_localize_script( 'serma-home', 'serma_ajax_url', esc_url(admin_url('admin-ajax.php')) . "?action=" );
}



genesis(); ?>