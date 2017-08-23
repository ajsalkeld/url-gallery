<?php
/*
   Plugin Name: URL Gallery
   Plugin URI: https://www.ajsalkeld.com/blog/wp-plugin/2017/08/23/url-gallery-wordpress-shortcode/
   Description: A plugin to make galleries with their URLs.
   Version: 1.0
   Author: Andrew Salkeld
   Author URI: https://www.ajsalkeld.com
   License: GPL2
   */
function ug_get_image_id($image_url) {
	global $wpdb;
	$sgattachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid LIKE '%s';", $image_url ));
	return $sgattachment[0];
}
add_shortcode('old-gal', 'url_gallery');
add_shortcode('url-gallery', 'url_gallery');
function url_gallery($atts){
	extract( shortcode_atts( array(
		'imgs' => '',
		'ids' => '',
	), $atts, 'old-gal' ) );
	extract( shortcode_atts( array(
		'imgs' => '',
		'ids' => '',
	), $atts, 'url-gallery' ) );

	if ($atts['imgs'] != null) {
		$image_names = explode(",",preg_replace('/\s+/', '', $atts['imgs']));
		foreach($image_names as &$image_url) {
			$image_url = ug_get_image_id($image_url);
		}
		$image_names = implode(',', $image_names);
		echo do_shortcode('[gallery ids="'.$image_names.'"]');
	}
	elseif ($atts['ids'] != null) {
		echo do_shortcode('[gallery ids="'.$atts['ids'].'"]');
	}

}