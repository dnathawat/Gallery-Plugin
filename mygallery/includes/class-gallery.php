<?php

class gallery
{

	public function init()
	{

		add_action('init', array($this, 'register_post_type'));


		add_shortcode('my_slider_gallery', array($this, 'render_shortcode'));


		add_action('wp_enqueue_scripts', array($this, 'enqueue_assets'));
	}


	public function register_post_type()
	{
		$args = array(
			'public' => true,
			'label' => 'Slider Galleries',
			'supports' => array('title', 'editor', 'thumbnail'),
		);
		register_post_type('my_slider_gallery', $args);
	}


	public function render_shortcode($atts)
	{
		ob_start();

		$query = new WP_Query(array(
			'post_type' => 'my_slider_gallery',
			'posts_per_page' => -1
		));

		if ($query->have_posts()) {
			echo '<div class="my-slider-gallery">';
			echo '<div class="slider-container">';

			while ($query->have_posts()) {
				$query->the_post();
				echo '<div class="slider-item">';
				if (has_post_thumbnail()) {
					$img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
					echo '<a href="' . esc_url($img_url) . '" class="popup-link">';
					the_post_thumbnail('medium');
					echo '</a>';
				}
				echo '</div>';
			}

			echo '</div>';
			echo '</div>';
		} else {
			echo 'No galleries found.';
		}

		wp_reset_postdata();
		return ob_get_clean();
	}


	public function enqueue_assets()
	{
		wp_enqueue_style('gallery-style', plugin_dir_url(__FILE__) . '../css/style.css');
		wp_enqueue_script('gallery-script', plugin_dir_url(__FILE__) . '../js/script.js', array('jquery'), null, true);

	}
}

