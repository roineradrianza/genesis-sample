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

add_filter( 'body_class', 'wphe_body_classes' );

function my_custom_loop () {    

    get_template_part( 'page-templates/home' );

}

if ( is_front_page() ) { 
    add_action('wp_enqueue_scripts', 'ser_madre_theme_home_scripts');
}    

function ser_madre_theme_home_scripts() {
	wp_register_script( 'serma-home', get_stylesheet_directory_uri() . "/assets/js/serma-home.js", [], '1.0.0', true );
	wp_enqueue_script( 'serma-home' );
}



genesis(); ?>