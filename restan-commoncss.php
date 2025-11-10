<?php
// Block direct access
if (!defined('ABSPATH')) {
    exit();
}
/**
 * @Packge     : restan
 * @Version    : 1.0
 * @Author     : restan
 * @Author URI : https://themeforest.net/user/validthemes/portfolio
 *
 */

// enqueue css
function restan_common_custom_css()
{
    wp_enqueue_style('restan-color-schemes', get_template_directory_uri() . '/assets/css/color.schemes.css');

    $CustomCssOpt  = restan_opt('restan_css_editor');
    $preloader_display  =  restan_opt('restan_display_preloader');
    if ($CustomCssOpt) {
        $CustomCssOpt = $CustomCssOpt;
    } else {
        $CustomCssOpt = '';
    }

    $customcss = "";

    if (get_header_image()) {
        $restan_header_bg =  get_header_image();
    } else {
        if (restan_meta('page_breadcrumb_settings') == 'page' && is_page()) {
            if (!empty(restan_meta('breadcumb_image'))) {
                $restan_header_bg = restan_meta('breadcumb_image');
            }
        }
    }

    if (!empty($restan_header_bg)) {
        $customcss .= ".breadcrumb-area{
            background:url('{$restan_header_bg}')!important;
            background-position: center center !important;
            background-size: cover !important;
        }";
    }
    if (!empty($preloader_display)) {
        $restan_pre_img = restan_opt('restan_preloader_img', 'url');
        if (!empty(restan_opt('restan_preloader_img', 'url'))) {
            $customcss .= ".se-pre-con{
                background:url('{$restan_pre_img}')!important;
                text-align: center;
                position: absolute;
                left: 50%;
                top: 50%;
                -webkit-transform: translate(-50%, -50%);
                transform: translate(-50%, -50%);
                text-align: center;
                line-height: 1;
                width: 96px;
                height: 48px;
                display: inline-block;
                position: relative;
                background: #fff;
                border-radius: 48px 48px 0 0;
                -webkit-box-sizing: border-box;
                box-sizing: border-box;
                overflow: hidden;
                            }";
        }
    }

    // theme color
    $restanthemecolor = restan_opt('restan_theme_color');
    if (!empty($restanthemecolor)) {
        list($r, $g, $b) = sscanf($restanthemecolor, "#%02x%02x%02x");

        $restan_real_color = $r . ',' . $g . ',' . $b;
        if (!empty($restanthemecolor)) {
            $customcss .= ":root {
          --color-primary: rgb({$restan_real_color});
        }";
        }
    }
    // theme color secendary
    $restanthemecolor_sec = restan_opt('restan_theme_color_sec');
    if (!empty($restanthemecolor_sec)) {
        list($r, $g, $b) = sscanf($restanthemecolor_sec, "#%02x%02x%02x");

        $restan_real_color_sec = $r . ',' . $g . ',' . $b;
        if (!empty($restanthemecolor_sec)) {
            $customcss .= ":root {
          --color-secondary: rgb({$restan_real_color_sec});
        }";
        }
    }

    if (!empty($CustomCssOpt)) {
        $customcss .= $CustomCssOpt;
    }

    wp_add_inline_style('restan-color-schemes', $customcss);
}
add_action('wp_enqueue_scripts', 'restan_common_custom_css', 100);
