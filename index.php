<?php

/**
 * @Packge     : restan
 * @Version    : 1.0
 * @Author     : restan
 * @Author URI : https://themeforest.net/user/validthemes/portfolio
 *
 */

// Block direct access op
if (!defined('ABSPATH')) {
    exit;
}
// Header
get_header();

/**
 * 
 * Hook for Blog Start Wrapper
 *
 * Hook restan_blog_start_wrap
 *
 * @Hooked restan_blog_start_wrap_cb 10
 *  
 */
do_action('restan_blog_start_wrap');
/**
 * 
 * Hook for Blog Column Start Wrapper
 *
 * Hook restan_blog_col_start_wrap
 *
 * @Hooked restan_blog_col_start_wrap_cb 10
 *  
 */
do_action('restan_blog_col_start_wrap');

/**
 * 
 * Hook for Blog Content
 *
 * Hook restan_blog_content
 *
 * @Hooked restan_blog_content_cb 10
 *  
 */
do_action('restan_blog_content');

/**
 * 
 * Hook for Blog Pagination
 *
 * Hook restan_blog_pagination
 *
 * @Hooked restan_blog_pagination_cb 10
 *  
 */
do_action('restan_blog_pagination');

/**
 * 
 * Hook for Blog Column End Wrapper
 *
 * Hook restan_blog_col_end_wrap
 *
 * @Hooked restan_blog_col_end_wrap_cb 10
 *  
 */
do_action('restan_blog_col_end_wrap');

/**
 * 
 * Hook for Blog Sidebar
 *
 * Hook restan_blog_sidebar
 *
 * @Hooked restan_blog_sidebar_cb 10
 *  
 */
do_action('restan_blog_sidebar');

/**
 * 
 * Hook for Blog End Wrapper
 *
 * Hook restan_blog_end_wrap
 *
 * @Hooked restan_blog_end_wrap_cb 10
 *  
 */
do_action('restan_blog_end_wrap');

//footer
get_footer();
