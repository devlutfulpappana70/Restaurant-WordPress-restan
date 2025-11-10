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
restan_setPostViews(get_the_ID());
?>
<div <?php post_class(); ?>>
    <div class="blog-item-box">
        <?php
        if (class_exists('ReduxFramework')) {
            $restan_post_details_title_position = restan_opt('restan_post_details_title_position');
        } else {
            $restan_post_details_title_position = 'header';
        }

        $allowhtml = array(
            'p'         => array(
                'class'     => array()
            ),
            'span'      => array(),
            'a'         => array(
                'href'      => array(),
                'title'     => array()
            ),
            'br'        => array(),
            'em'        => array(),
            'strong'    => array(),
            'b'         => array(),
        );

        // Blog Post Thumbnail
        do_action('restan_blog_post_thumb');

        if ($restan_post_details_title_position != 'header') {
            echo '<h3>' . wp_kses(get_the_title(), $allowhtml) . '</h3>';
        }
        echo '<div class="info">';
        // Blog Post Meta
        do_action('restan_blog_post_meta');

        if (get_the_content()) {
            echo '<div class="blog-content">';
            the_content();
            // Link Pages
            restan_link_pages();
            echo '</div>';
        }
        echo '</div>';
        echo '</div>';
        echo '</div>';
        /**
         *
         * Hook for Blog Details Author Bio
         *
         * Hook restan_blog_details_author_bio
         *
         * @Hooked restan_blog_details_author_bio_cb 10
         *
         */
        do_action('restan_blog_details_author_bio');

        $restan_post_tag = get_the_tags();
        if (class_exists('ReduxFramework')) {
            $restan_post_details_share_options = restan_opt('restan_post_details_share_options');
            $restan_show_post_tag = restan_opt('restan_display_post_tags');
        } else {
            $restan_show_post_tag = true;
            $restan_post_details_share_options = false;
        }

        if (!empty($restan_post_tag) && $restan_show_post_tag || $restan_post_details_share_options) {
            echo '<div class="post-tags share">';
            if ($restan_show_post_tag  && is_array($restan_post_tag) && !empty($restan_post_tag)) {
                if (count($restan_post_tag) > 1) {
                    $tag_text = __('Tags: ', 'restan');
                } else {
                    $tag_text = __('Tag: ', 'restan');
                }
                echo '<div class="tags">';
                echo '<h4>' . esc_html($tag_text) . '</h4>';
                foreach ($restan_post_tag as $tags) {
                    echo '<a href="' . esc_url(get_tag_link($tags->term_id)) . '">' . esc_html($tags->name) . '</a> ';
                }
                echo '</div>';
            }
            /**
             *
             * Hook for Blog Social Share Options
             *
             * Hook restan_blog_details_share_options
             *
             * @Hooked restan_blog_details_share_options_cb 10
             *
             */
            do_action('restan_blog_details_share_options');

            echo '</div>';
        }

        /**
         *
         * Hook for Blog Navigation
         *
         * Hook restan_blog_details_post_navigation
         *
         * @Hooked restan_blog_details_post_navigation_cb 10
         *
         */
        do_action('restan_blog_details_post_navigation');

        /**
         *
         * Hook for Blog Details Comments
         *
         * Hook restan_blog_details_comments
         *
         * @Hooked restan_blog_details_comments_cb 10
         *
         */
        do_action('restan_blog_details_comments');
