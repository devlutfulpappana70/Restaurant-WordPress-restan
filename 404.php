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
    exit();
}

if (class_exists('ReduxFramework')) {
    $restan404title        = restan_opt('restan_fof_title');
    $restan404subtitle     = restan_opt('restan_fof_subtitle');
    $restan404description  = restan_opt('restan_fof_description');
    $restan404btntext      = restan_opt('restan_fof_btn_text');
} else {
    $restan404title        = __('404', 'restan');
    $restan404subtitle     = __('Oops! That page can’t be found', 'restan');
    $restan404description  = __('Sorry, but the page you are looking for does not existing', 'restan');
    $restan404btntext      = __('Back To Home', 'restan');
}

global $restan_opt;

// get header
get_header();

echo '<div class="error-page-area text-center default-padding">';
if (!empty($restan_opt['restan_404_shape_one']['url'])) :
    echo '<div class="shape-left" style="background: url(' . $restan_opt['restan_404_shape_one']['url'] . ');"></div>';
endif;
if (!empty($restan_opt['restan_404_shape_two']['url'])) :
    echo '<div class="shape-right" style="background: url(' . $restan_opt['restan_404_shape_two']['url'] . ');"></div>';
endif;
echo '<div class="container">';
echo '<div class="row align-center">';
echo '<div class="col-lg-8 offset-lg-2">';
echo '<div class="error-box">';
echo '<h1>' . esc_html($restan404title) . '</h1>';
echo '<h2>' . esc_html($restan404subtitle) . '</h2>';
echo '<p>' . esc_html($restan404description) . '</p>';
echo '<a class="btn circle btn-theme effect btn-md" href="' . esc_url(home_url('/')) . '">' . esc_html($restan404btntext) . '</a>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';

//footer
get_footer();

