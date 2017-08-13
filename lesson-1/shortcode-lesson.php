<?php
/**
 * Plugin Name: Shortcode Lesson 1
 * Plugin URI: https://github.com/campusboy87/lessons-shortcode
 * Author: Обучающий YouTube канал "WP-PLUS"
 * Author URI: https://www.youtube.com/c/wpplus
 */

add_shortcode( 'phone', 'show_phone' );
function show_phone(){
	return '+1-234-567-89-10';
}
