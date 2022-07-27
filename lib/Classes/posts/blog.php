<?php

namespace SERMA\Posts;

@ini_set( 'display_errors', 1 );

use \SERMA\External_Posts;

class Blog extends External_Posts
{

    public static $posts;

    public function __construct()
    {
        add_action('wp_ajax_serma_get_blog_posts', array($this, 'ajax_call'));
		add_action('wp_ajax_nopriv_serma_get_blog_posts', array($this, 'ajax_call'));
    }

    public function init($per_page = 9, $endpoint = ['api' => 'posts','url' => 'wp/v2/posts'])
    {
        $endpoint['args']['per_page'] = $per_page;
        $this->base_url = 'https://sermadre.com/blog';
        $this->endpoint = $endpoint;
        $this->excerpt = 87;
        $this->posts = $this->call();
        
        return $this->posts;
    }

    public function ajax_call()
    {
        $this->init(5, [
            'api' => 'posts',
            'url' => 'wp/v2/posts',
            'args' => $_GET
        ]);
        wp_send_json($this->posts);
    }
}