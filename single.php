<?php

/**
 * @Packge     : restan ONe
 * @Version    : 1.0
 * @Author     : restan
 * @Author URI : https://themeforest.net/user/validthemes/portfolio
 *
 */

// Block direct access
if (!defined('ABSPATH')) {
    exit();
}

//header
get_header();

/**
 * 
 * Hook for Blog Details Wrapper
 *
 * Hook restan_blog_details_wrapper_start
 *
 * @Hooked restan_blog_details_wrapper_start_cb 10s
 *  
 */
do_action('restan_blog_details_wrapper_start');

/**
 * 
 * Hook for Blog Details Column Start
 *
 * Hook restan_blog_details_col_start
 *
 * @Hooked restan_blog_details_col_start_cb 10
 *  
 */
do_action('restan_blog_details_col_start');

while (have_posts()) :
    the_post();

    get_template_part('templates/content-single');

endwhile;
/**
 * 
 * Hook for Blog Details Column End
 *
 * Hook restan_blog_details_col_end
 *
 * @Hooked restan_blog_details_col_end_cb 10
 *  
 */
do_action('restan_blog_details_col_end');

/**
 * 
 * Hook for Blog Details Sidebar
 *
 * Hook restan_blog_details_sidebar
 *
 * @Hooked restan_blog_details_sidebar_cb 10
 *  
 */
do_action('restan_blog_details_sidebar');
/**
 * 
 * Hook for Blog Details Wrapper End
 *
 * Hook restan_blog_details_wrapper_end
 *
 * @Hooked restan_blog_details_wrapper_end_cb 10
 *  
 */
do_action('restan_blog_details_wrapper_end');

//footer
get_footer();
