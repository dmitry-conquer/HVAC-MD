<?php
if (!defined('_S_VERSION')) {
	define('_S_VERSION', '1.0.0');
}

/**
 * Enqueue styles/
 */
add_action('wp_enqueue_scripts', function () {
	$css_version = file_exists(get_template_directory() . '/assets/css/style.css') ? filemtime(get_template_directory() . '/assets/css/style.css') : _S_VERSION;
	$js_version = file_exists(get_template_directory() . '/assets/js/main.js') ? filemtime(get_template_directory() . '/assets/js/main.js') : _S_VERSION;
  
	wp_enqueue_script('swiper-js', get_template_directory_uri() . '/assets/js/swiper.js', [], filemtime(get_template_directory() . '/assets/js/swiper.js') ?: _S_VERSION, true);
  wp_enqueue_style('swiper-css', get_template_directory_uri() . '/assets/css/swiper.css', [], filemtime(get_template_directory() . '/assets/css/swiper.css') ?: _S_VERSION);

	wp_enqueue_style('style-css', get_template_directory_uri() . '/assets/css/style.css', [], $css_version);
	wp_enqueue_script('main-js', get_template_directory_uri() . '/assets/js/main.js', [], $js_version, true);

});


/**
 * Remove CSS blocks styles
 */
function remove_block_css()
{
	wp_dequeue_style('wp-block-library');
	wp_dequeue_style('wp-block-library-theme');
	wp_dequeue_style('wc-block-style');
	wp_dequeue_style('storefront-gutenberg-blocks');
}
add_action('wp_enqueue_scripts', 'remove_block_css', 100);


/**
 * Init theme support
 */
add_action(
	'after_setup_theme',
	function () {
		add_theme_support('post-thumbnails');
		add_theme_support('title-tag');
	}
);


/**
 * Redirect from 404 to Homa page
 */
if (!function_exists('redirect_404_to_homepage')) {
	add_action('template_redirect', 'redirect_404_to_homepage');
	function redirect_404_to_homepage()
	{
		if (is_404()):
			wp_safe_redirect(home_url('/'));
			exit;
		endif;
	}
}
