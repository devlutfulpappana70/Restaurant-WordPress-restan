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

if (class_exists('ReduxFramework') && defined('ELEMENTOR_VERSION')) {
    if (is_page() || is_page_template('template-builder.php')) {
        $restan_post_id = get_the_ID();

        // Get the page settings manager
        $restan_page_settings_manager = \Elementor\Core\Settings\Manager::get_settings_managers('page');

        // Get the settings model for current post
        $restan_page_settings_model = $restan_page_settings_manager->get_model($restan_post_id);

        // Retrieve the color we added before
        $restan_header_style = $restan_page_settings_model->get_settings('restan_header_style');
        $restan_header_builder_option = $restan_page_settings_model->get_settings('restan_header_builder_option');

        if ($restan_header_style == 'header_builder') {

            if (!empty($restan_header_builder_option)) {
                $restanheader = get_post($restan_header_builder_option);
                echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display($restanheader->ID);
            }
        } else {
            // global options
            $restan_header_builder_trigger = restan_opt('restan_header_options');
            if ($restan_header_builder_trigger == '2') {
                $restan_global_header_select = get_post(restan_opt('restan_header_select_options'));
                $header_post = get_post($restan_global_header_select);
                echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display($header_post->ID);
            } else {
                // wordpress Header
                restan_global_header_option();
            }
        }
    } else {
        $restan_header_options = restan_opt('restan_header_options');
        if ($restan_header_options == '1') {
            restan_global_header_option();
        } else {
            $restan_header_select_options = restan_opt('restan_header_select_options');
            $restanheader = get_post($restan_header_select_options);
            echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display($restanheader->ID);
        }
    }
} else {
    restan_global_header_option();
}
