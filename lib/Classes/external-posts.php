<?php

namespace SERMA;

class External_Posts
{
	public $base_url;
	public $endpoint = ['api' => 'posts', 'url' => 'wp/v2/posts', 'args' => ['per_page' => 4]];
	public $excerpt = 65;
	public $headers;

	/**
	 * Execute external post call query.
	 *
	 * @return void|array
	 */
	public function call()
	{
		// Initialize variable.
		$allposts = [];
		$args = '';

		$base_url = $this->base_url;
		$endpoint = $this->endpoint;
		$headers = $this->headers;
		$excerpt = $this->excerpt;

		!array_key_exists('api', $endpoint) ? $endpoint['api'] = 'posts' : '';
		!array_key_exists('args', $endpoint) ? $endpoint['args'] = [] : '';
		!array_key_exists('per_page', $endpoint['args']) ? $endpoint['args']['per_page'] = 4 : '';

		foreach ($endpoint['args'] as $key => $value) {
			$value = empty($value) ? "" : "=$value";
			$args .= empty($args) ? "?$key" . "$value" : "&$key" . "$value";
		}
		$response = wp_remote_get("$base_url/wp-json/{$endpoint['url']}/$args&_embed", $headers);

		// Exit if error.
		if (is_wp_error($response)) {
			return;
		}

		// Get the body.
		$posts = json_decode(wp_remote_retrieve_body($response));

		// Exit if nothing is returned.
		if (empty($posts)) {
			return [];
		}

		// If there are posts.
		if (!empty($posts)) {

			// For each post.
			if ($endpoint['api'] == 'posts') {
				foreach ($posts as $post) {
					$embedded = get_object_vars($post->_embedded);
					$category = $embedded['wp:term'][0];
					$article = [
						'title' => $post->title->rendered,
						'featured_image' => $embedded['wp:featuredmedia'][0]->source_url,
						'excerpt' => mb_strimwidth(wp_strip_all_tags($post->content->rendered), 0, $excerpt, '...'),
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
			} else if ($endpoint['api'] == 'categories') {
				foreach ($posts as $category) {
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
}
