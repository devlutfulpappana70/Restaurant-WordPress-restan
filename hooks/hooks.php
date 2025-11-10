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

/**
 * Hook for preloader
 */
add_action('restan_preloader_wrap', 'restan_preloader_wrap_cb', 10);

/**
 * Hook for offcanvas cart
 */
add_action('restan_main_wrapper_start', 'restan_main_wrapper_start_cb', 10);

/**
 * Hook for Header
 */
add_action('restan_header', 'restan_header_cb', 10);

/**
 * Hook for Blog Start Wrapper
 */
add_action('restan_blog_start_wrap', 'restan_blog_start_wrap_cb', 10);

/**
 * Hook for Blog Column Start Wrapper
 */
add_action('restan_blog_col_start_wrap', 'restan_blog_col_start_wrap_cb', 10);

/**
 * Hook for Service Column Start Wrapper
 */
add_action('restan_service_col_start_wrap', 'restan_service_col_start_wrap_cb', 10);

/**
 * Hook for Blog Column End Wrapper
 */
add_action('restan_blog_col_end_wrap', 'restan_blog_col_end_wrap_cb', 10);

/**
 * Hook for Blog Column End Wrapper
 */
add_action('restan_blog_end_wrap', 'restan_blog_end_wrap_cb', 10);

/**
 * Hook for Blog Pagination
 */
add_action('restan_blog_pagination', 'restan_blog_pagination_cb', 10);

/**
 * Hook for Blog Content
 */
add_action('restan_blog_content', 'restan_blog_content_cb', 10);

/**
 * Hook for Blog Sidebar
 */
add_action('restan_blog_sidebar', 'restan_blog_sidebar_cb', 10);


/**
 * Hook for Service Sidebar
 */
add_action('restan_service_sidebar', 'restan_service_sidebar_cb', 10);

/**
 * Hook for Blog Details Sidebar
 */
add_action('restan_blog_details_sidebar', 'restan_blog_details_sidebar_cb', 10);

/**
 * Hook for Blog Details Wrapper Start
 */
add_action('restan_blog_details_wrapper_start', 'restan_blog_details_wrapper_start_cb', 10);

/**
 * Hook for Blog Details Post Meta
 */
add_action('restan_blog_post_meta', 'restan_blog_post_meta_cb', 10);

/**
 * Hook for Blog Details Post Share Options
 */
add_action('restan_blog_details_share_options', 'restan_blog_details_share_options_cb', 10);

/**
 * Hook for Blog Details Post Author Bio
 */
add_action('restan_blog_details_author_bio', 'restan_blog_details_author_bio_cb', 10);

/**
 * Hook for Blog Details Tags and Categories
 */
add_action('restan_blog_details_tags_and_categories', 'restan_blog_details_tags_and_categories_cb', 10);
add_action('restan_blog_details_post_navigation', 'restan_blog_details_post_navigation_cb', 10);

/**
 * Hook for Blog Deatils Comments
 */
add_action('restan_blog_details_comments', 'restan_blog_details_comments_cb', 10);

/**
 * Hook for Blog Deatils Column Start
 */
add_action('restan_blog_details_col_start', 'restan_blog_details_col_start_cb');

/**
 * Hook for Blog Deatils Column End
 */
add_action('restan_blog_details_col_end', 'restan_blog_details_col_end_cb');

/**
 * Hook for Blog Deatils Wrapper End
 */
add_action('restan_blog_details_wrapper_end', 'restan_blog_details_wrapper_end_cb');

/**
 * Hook for Blog Post Thumbnail
 */
add_action('restan_blog_post_thumb', 'restan_blog_post_thumb_cb');

/**
 * Hook for Blog Post Content
 */
add_action('restan_blog_post_content', 'restan_blog_post_content_cb');


/**
 * Hook for Blog Post Excerpt And Read More Button
 */
add_action('restan_blog_postexcerpt_read_content', 'restan_blog_postexcerpt_read_content_cb');

/**
 * Hook for footer content
 */
add_action('restan_footer_content', 'restan_footer_content_cb', 10);

/**
 * Hook for main wrapper end
 */
add_action('restan_main_wrapper_end', 'restan_main_wrapper_end_cb', 10);

/**
 * Hook for Page Start Wrapper
 */
add_action('restan_page_start_wrap', 'restan_page_start_wrap_cb', 10);

/**
 * Hook for Page End Wrapper
 */
add_action('restan_page_end_wrap', 'restan_page_end_wrap_cb', 10);

/**
 * Hook for Page Column Start Wrapper
 */
add_action('restan_page_col_start_wrap', 'restan_page_col_start_wrap_cb', 10);

/**
 * Hook for Page Column End Wrapper
 */
add_action('restan_page_col_end_wrap', 'restan_page_col_end_wrap_cb', 10);

/**
 * Hook for Page Column End Wrapper
 */
add_action('restan_page_sidebar', 'restan_page_sidebar_cb', 10);

/**
 * Hook for Page Content
 */
add_action('restan_page_content', 'restan_page_content_cb', 10);
