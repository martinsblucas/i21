<?php
function theme_styles() {

	wp_enqueue_style( 'bootstrap_css', get_template_directory_uri() . '/bootstrap/css/bootstrap.css?v=35' );
	wp_enqueue_style( 'main_css', get_template_directory_uri() . '/style.css?v=109' );

}

add_action( 'wp_enqueue_scripts', 'theme_styles');

function theme_js() {

	global $wp_scripts;
	wp_enqueue_script( 'jquery_js', 'https://code.jquery.com/jquery-3.2.1.slim.min.js');
	wp_enqueue_script( 'popper_js', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js');
	wp_enqueue_script( 'bootstrap_js', get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js' );

}

add_action( 'wp_enqueue_scripts', 'theme_js');

if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'menus' );
}

// Register Custom Navigation Walker
require_once get_template_directory() . '/wp-bootstrap-navwalker-master/class-wp-bootstrap-navwalker.php';

if ( function_exists( 'add_image_size' ) ) { 

add_image_size( 'manchete', 650, 475, true );
add_image_size( 'slide', 510, 350, true );
add_image_size( 'ultimas', 400, 320, true );
}
?>