<?php

/*

* Custom Front Page

*/
// set full width layout

$post_api_rests_url = [
    ['name' => 'Artículos médicos', 'url' => 'https://sermadre.com/articulos-medicos/', 'per_page' => 4, 'categories' => false]
];

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
    $params = [
        'medical_articles' => serma_get_posts_rest('https://sermadre.com/articulos-medicos/')
    ];

    get_template_part( 'page-templates/home', null, $params );

}

if ( is_front_page() ) { 
    add_action('wp_enqueue_scripts', 'ser_madre_theme_home_scripts');
}    

function ser_madre_theme_home_scripts() {
	wp_register_script( 'serma-home', get_stylesheet_directory_uri() . "/assets/js/serma-home.js", [], '1.0.0', true );
	wp_enqueue_script( 'serma-home' );
}

function serma_get_posts_rest($base_url, $per_page = 4, $categories = false) {

	// Initialize variable.
	$allposts = [];
	
	// Enter the name of your blog here followed by /wp-json/wp/v2/posts and add filters like this one that limits the result to 2 posts.
	$response = wp_remote_get( "$base_url/wp-json/wp/v2/posts?per_page=$per_page&_embed" );

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
		foreach ( $posts as $post ) {
            $embedded = get_object_vars($post->_embedded);
            $category = $embedded['wp:term'][0];
            $article = [
                'title' => $post->title->rendered,
                'featured_image' => $embedded['wp:featuredmedia'][0]->source_url,
                'excerpt' => mb_strimwidth(wp_strip_all_tags($post->content->rendered), 0, 80, '...'),
                'category' => [
                    'id' => $category[0]->id,
                    'name' => $category[0]->name,
                    'link' => $category[0]->link
                ],
                'link' => $post->link,
                'published_at' => $post->date
            ];
			$allposts[] = $article;
		}
		
		return $allposts;
	}

}



genesis(); ?>