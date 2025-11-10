<?php
// Do not allow directly accessing this file.
if (!defined('ABSPATH')) {
	exit();
}
/**
 * @Packge    : restan
 * @version   : 1.0
 * @Author    : restan
 * @Author URI: https://themeforest.net/user/validthemes/portfolio
 * Template Name: Template Builder
 */

//Header
get_header();

// Container or wrapper div
$restan_layout = restan_meta('custom_page_layout');

if ($restan_layout == '1') {
	echo '<div class="restan-main-wrapper">';
	echo '<div class="container">';
	echo '<div class="row">';
	echo '<div class="col-sm-12">';
} elseif ($restan_layout == '2') {
	echo '<div class="restan-main-wrapper">';
	echo '<div class="container-fluid">';
	echo '<div class="row">';
	echo '<div class="col-sm-12">';
} else {
	echo '<div class="restan-fluid">';
}
echo '<div class="builder-page-wrapper">';
// Query
if (have_posts()) {
	while (have_posts()) {
		the_post();
		the_content();
	}
	wp_reset_postdata();
}

echo '</div>';
if ($restan_layout == '1') {
	echo '</div>';
	echo '</div>';
	echo '</div>';
	echo '</div>';
} elseif ($restan_layout == '2') {
	echo '</div>';
	echo '</div>';
	echo '</div>';
	echo '</div>';
} else {
	echo '</div>';
}

//footer
get_footer();
