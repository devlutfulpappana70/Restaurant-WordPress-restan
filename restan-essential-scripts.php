<?php

/**
 * @Packge     : restan
 * @Version    : 1.0
 * @Author     : restan
 * @Author URI : https://themeforest.net/user/validthemes/portfolio
 *
 */

// Block direct access
if (!defined('ABSPATH')) {
	exit;
}

/**
 * Enqueue scripts and styles.
 */
function restan_essential_scripts() {

	// Bootstrap Min ---------------
	wp_enqueue_style('bootstrap', get_theme_file_uri('/assets/css/bootstrap.min.css'), array(), '5.1.3');
	// Font Awesome ----------
	wp_enqueue_style('fontawesome', get_theme_file_uri('/assets/css/font-awesome.min.css'), array(), '5.15.0');
	// Magnific Popup------------
	wp_enqueue_style('magnific-popup', get_theme_file_uri('/assets/css/magnific-popup.css'), array(), '1.0');
	// flaticon icons---------------
	wp_enqueue_style('flaticon', get_theme_file_uri('/assets/css/flaticon-set.css'), array(), '1.0');
	// Swiper-bundle------------
	wp_enqueue_style('swiper-bundle', get_theme_file_uri('/assets/css/swiper-bundle.min.css'), array(), '8.0.3');
	// Animate------------
	wp_enqueue_style('restan-animate', get_theme_file_uri('/assets/css/animate.min.css'), array(), '1.0');
	// Bootstrap Date Picker ------------
	wp_enqueue_style('bootstrap-date-picker', get_theme_file_uri('/assets/css/bootstrap-datepicker3.css'), array(), '1.7.0');
	// restan-shop css ------------
	wp_enqueue_style('restan-shop', get_theme_file_uri('/assets/css/shop.css'), array(), '1.0');
	// validnavs------------
	wp_enqueue_style('restan-validnavs', get_theme_file_uri('/assets/css/validnavs.css'), array(), '1.0');
	// Helper Css-------
	wp_enqueue_style('restan-helper', get_theme_file_uri('/assets/css/helper.css'), array(), '1.0');
	// restan app style---------
	wp_enqueue_style('restan-main-style', get_theme_file_uri('/assets/css/style.css'), array(), wp_get_theme()->get('Version'));
	// unittest-----------
	wp_enqueue_style('restan-unittest', get_theme_file_uri('/assets/css/unit-test.css'), array(), '1.0');
	wp_enqueue_style('restan-style', get_stylesheet_uri(), array(), wp_get_theme()->get('Version'));
	// google font
	wp_enqueue_style('restan-fonts', restan_google_fonts(), array(), null);

	// Load Js

	// Bootstrap
	wp_enqueue_script('bootstrap', get_theme_file_uri('/assets/js/bootstrap.bundle.min.js'), array('jquery'), '5.1.3', true);
	// jquery appear
	wp_enqueue_script('appear', get_theme_file_uri('/assets/js/jquery.appear.js'), array('jquery'), '1.0.0', true);
	// swiper-bundle
	wp_enqueue_script('swiper-bundle', get_theme_file_uri('/assets/js/swiper-bundle.min.js'), array('jquery'), '8.0.3', true);
	//progress
	wp_enqueue_script('progress', get_theme_file_uri('/assets/js/progress-bar.min.js'), array('jquery'), '1.0.0', true);
	// isotope pkgd
	wp_enqueue_script('isotope-pkgd', get_theme_file_uri('/assets/js/isotope.pkgd.min.js'), array('jquery'), '1.0.0', true);
	// Imagesloaded
	wp_enqueue_script('imagesloaded');
	// jquery magnific popup
	wp_enqueue_script('magnific-popup', get_theme_file_uri('/assets/js/magnific-popup.min.js'), array('jquery'), '1.1.0', true);
	// Count To
	wp_enqueue_script('count-to', get_theme_file_uri('/assets/js/count-to.js'), array('jquery'), '1.0.0', true);
	// nice-select
	wp_enqueue_script('nice-select', get_theme_file_uri('/assets/js/jquery.nice-select.min.js'), array('jquery'), '1.0.0', true);
	// scrolla
	wp_enqueue_script('scrolla', get_theme_file_uri('/assets/js/jquery.scrolla.min.js'), array('jquery'), '1.0.0', true);
	// YTPlayer
	wp_enqueue_script('YTPlayer', get_theme_file_uri('/assets/js/YTPlayer.min.js'), array('jquery'), '1.0.0', true);
	// validnavs
	wp_enqueue_script('restan-validnavs', get_theme_file_uri('/assets/js/validnavs.js'), array('jquery'), '1.0.0', true);
	// gsap
	wp_enqueue_script('gsap', get_theme_file_uri('/assets/js/gsap.js'), array('jquery'), '3.11.4', true);
	// ScrollTrigger
	wp_enqueue_script('ScrollTrigger', get_theme_file_uri('/assets/js/ScrollTrigger.min.js'), array('jquery'), '3.11.5', true);
	// datepicker
	wp_enqueue_script('bootstrap-datepicker', get_theme_file_uri('/assets/js/bootstrap-datepicker.js'), array('jquery'), '1.7.0', true);
	// main script
	wp_enqueue_script('restan-main-script', get_theme_file_uri('/assets/js/main.js'), array('jquery'), wp_get_theme()->get('Version'), true);

	// comment reply
	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'restan_essential_scripts', 88);

function restan_block_editor_assets() {
	// Add custom fonts.
	wp_enqueue_style('restan-editor-fonts', restan_google_fonts(), array(), null);
}

add_action('enqueue_block_editor_assets', 'restan_block_editor_assets');

function restan_google_fonts() {
	$fonts_url = '';

	/*
		 * translators: If there are characters in your language that are not supported
		 * by Libre Franklin, translate this to 'off'. Do not translate into your own language.
	*/
	$Handlee = _x('on', 'Handlee font: on or off', 'restan');

	if ('off' !== $Handlee) {
		$fonts_url = 'https://fonts.googleapis.com/css2?family=Lato:wght@100;300;400;700;900&family=Marcellus&display=swap&family=Dancing+Script:wght@400..700&display=swap
';
	}

	return esc_url_raw($fonts_url);
}