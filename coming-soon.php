<?php

/**
 * @Packge     : restan
 * @Version    : 1.0
 * @Author     : restan
 * @Author URI : https://themeforest.net/user/validthemes/portfolio
 * Template Name: Coming Soon Page
 */

// Block direct access
if (!defined('ABSPATH')) {
    exit();
}

if (class_exists('ReduxFramework')) {
    $restancoming_soontitle     = restan_opt('restan_coming_soon_title');
    $restancoming_soonsubtitle  = restan_opt('restan_coming_soon_subtitle');
    $restancoming_soonbtntext   = restan_opt('restan_coming_soon_btn_text');
} else {
    $restancoming_soontitle     = __('Website Under Construction', 'restan');
    $restancoming_soonsubtitle  = __('Website Under Construction. Work Is Going On For The Website Please Stay With Us.', 'restan');
    $restancoming_soonbtntext   = __('Return To Home', 'restan');
}


// get header
get_header();

echo '<section class="vs-error-wrapper space">';
echo '<div class="container">';
echo '<div class="error-content text-center">';
if (!empty(restan_opt('restan_coming_soon_image', 'url'))) {
    echo '<div class="error-img">';
    echo restan_img_tag(array(
        'url'   => esc_url(restan_opt('restan_coming_soon_image', 'url')),
    ));
    echo '</div>';
}
echo '<div class="row justify-content-center">';
echo '<div class="col-xl-9">';
if (!empty($restancoming_soontitle)) {
    echo '<h2 class="error-title">' . esc_html($restancoming_soontitle) . '</h2>';
}
if (!empty($restancoming_soonsubtitle)) {
    echo '<p class="error-text px-xl-5">' . esc_html($restancoming_soonsubtitle) . '</p>';
}
echo '<a href="' . esc_url(home_url('/')) . '" class="vs-btn mask-btn"><span class="btn-text">' . esc_html($restancoming_soonbtntext) . '</span><span class="btn-text-mask">' . esc_html($restancoming_soonbtntext) . '</span></a>';

echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '</section>';

//footer
get_footer();
