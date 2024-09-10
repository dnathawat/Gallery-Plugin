<?php
/**
	* Advanced Gallery
	* Plugin Name:       Advanced Gallery
	* Plugin URI:        https://github.com/dnathawat/gallery
	* Description:       Create  WordPress gallery
	* Version:           1.0
	* Author:            DevXieno
	* Author URI:        https://github.com/dnathawat
	* Update URI:       https://github.com/dnathawat
	* Text Domain:       gallery
	* Domain Path:       /lang
	* Requires PHP:      7.4
	* Requires at least: 6.0
	*/

if (!defined('ABSPATH')) {
	exit;
}


require_once(plugin_dir_path(__FILE__) . 'includes/class-gallery.php');

function gallery_init()
{
	$plugin = new gallery();
	$plugin->init();
}
add_action('plugins_loaded', 'gallery_init');

