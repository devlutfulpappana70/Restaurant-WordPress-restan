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

//header
get_header();

/**
 * 
 * Hook for Page Start Wrapper
 *
 * Hook restan_page_start_wrap
 *
 * @Hooked restan_page_start_wrap_cb 10
 *  
 */
do_action('restan_page_start_wrap');

/**
 * 
 * Hook for Column Start Wrapper
 *
 * Hook restan_page_col_start_wrap
 *
 * @Hooked restan_page_col_start_wrap_cb 10
 *  
 */
do_action('restan_page_col_start_wrap');

if (have_posts()) {
  while (have_posts()) {
    the_post();
    // Post Contant
    get_template_part('templates/content', 'page');
  }
  // Reset Data
  wp_reset_postdata();
} else {
  get_template_part('templates/content', 'none');
}

/**
 * 
 * Hook for Column End Wrapper
 *
 * Hook restan_page_col_end_wrap
 *
 * @Hooked restan_page_col_end_wrap_cb 10
 *  
 */
do_action('restan_page_col_end_wrap');

/**
 * 
 * Hook for Page Sidebar
 *
 * Hook restan_page_sidebar
 *
 * @Hooked restan_page_sidebar_cb 10
 *  
 */
do_action('restan_page_sidebar');

/**
 * 
 * Hook for Page End Wrapper
 *
 * Hook restan_page_end_wrap
 *
 * @Hooked restan_page_end_wrap_cb 10
 *  
 */
do_action('restan_page_end_wrap');

//footer
get_footer();
