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

function restan_widgets_init()
{

    if (class_exists('ReduxFramework')) {
        $restan_sidebar_widget_title_heading_tag = restan_opt('restan_sidebar_widget_title_heading_tag');
    } else {
        $restan_sidebar_widget_title_heading_tag = 'h4';
    }

    //sidebar widgets register
    register_sidebar(array(
        'name'          => esc_html__('Blog Sidebar', 'restan'),
        'id'            => 'restan-blog-sidebar',
        'description'   => esc_html__('Add Blog Sidebar Widgets Here.', 'restan'),
        'before_widget' => '<div id="%1$s" class="sidebar-item widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<div class="title"><' . esc_attr($restan_sidebar_widget_title_heading_tag) . '>',
        'after_title'   => '</' . esc_attr($restan_sidebar_widget_title_heading_tag) . '></div>',
    ));

    // page sidebar widgets register
    register_sidebar(array(
        'name'          => esc_html__('Page Sidebar', 'restan'),
        'id'            => 'restan-page-sidebar',
        'description'   => esc_html__('Add Page Sidebar Widgets Here.', 'restan'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<div class="title"><h4>',
        'after_title'   => '</h4></div>',
    ));

    if (class_exists('ReduxFramework')) {
        // footer widgets register
        register_sidebar(array(
            'name'          => esc_html__('Footer Widgets Area 1', 'restan'),
            'id'            => 'restan-footer-1',
            'before_widget' => '<div class="col-lg-4 col-md-6 item"><div id="%1$s" class="widget footer-widget %2$s">',
            'after_widget'  => '</div></div>',
            'before_title'  => '<h4 class="title">',
            'after_title'   => '</h4>',
        ));
        register_sidebar(array(
            'name'          => esc_html__('Footer Widgets Area 2', 'restan'),
            'id'            => 'restan-footer-2',
            'before_widget' => '<div class="col-lg-2 col-md-6 item"><div id="%1$s" class="widget footer-widget %2$s">',
            'after_widget'  => '</div></div>',
            'before_title'  => '<h4 class="title">',
            'after_title'   => '</h4>',
        ));
        register_sidebar(array(
            'name'          => esc_html__('Footer Widgets Area 3', 'restan'),
            'id'            => 'restan-footer-3',
            'before_widget' => '<div class="col-lg-3 col-md-6 item"><div id="%1$s" class="widget footer-widget %2$s">',
            'after_widget'  => '</div></div>',
            'before_title'  => '<h4 class="title">',
            'after_title'   => '</h4>',
        ));
        register_sidebar(array(
            'name'          => esc_html__('Footer Widgets Area 4', 'restan'),
            'id'            => 'restan-footer-4',
            'before_widget' => '<div class="col-lg-3 col-md-6 item"><div id="%1$s" class="widget footer-widget %2$s">',
            'after_widget'  => '</div></div>',
            'before_title'  => '<h4 class="title">',
            'after_title'   => '</h4>',
        ));
    }
}

add_action('widgets_init', 'restan_widgets_init');
