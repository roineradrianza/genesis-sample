<?php


namespace SERMA\Posts;

use \SERMA\External_Posts;

class Medical_Articles extends External_Posts
{

    public static $posts;

    public function __construct()
    {
        $this->init();
    }

    public function init()
    {
        $this->base_url = 'https://sermadre.com/articulos-medicos';
        $this->endpoint = ['api' => 'posts','url' => 'wp/v2/posts', 'args' => ['per_page' => 3]];
        $this->excerpt = 87;
        $this->posts = $this->call();
    }

    public static function ajax_call()
    {
        self::init();
        wp_send_json( self::$posts );
    }

}