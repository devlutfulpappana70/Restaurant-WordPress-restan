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

if (defined('CMB2_LOADED')) {
    if (!empty(restan_meta('page_breadcrumb_area'))) {
        $restan_page_breadcrumb_area  = restan_meta('page_breadcrumb_area');
    } else {
        $restan_page_breadcrumb_area = '1';
    }
} else {
    $restan_page_breadcrumb_area = '1';
}

$allowhtml = array(
    'p'         => array(
        'class'     => array()
    ),
    'span'      => array(
        'class'     => array(),
    ),
    'a'         => array(
        'href'      => array(),
        'title'     => array()
    ),
    'br'        => array(),
    'em'        => array(),
    'strong'    => array(),
    'b'         => array(),
    'sub'       => array(),
    'sup'       => array(),
);

if (is_page() || is_page_template('template-builder.php')) {
    if ($restan_page_breadcrumb_area == '1') {

        if (class_exists('ReduxFramework')) {
            $class = '';
        } else {
            $class = 'thumb-less';
        }
        global $restan_opt;
        echo '<!-- Page title -->';
        echo '<div class="breadcrumb-area bg-cover shadow dark text-center text-light h ' . esc_attr($class) . '"';
        echo '<div class="container">';
        echo '<div class="row">';
        echo '<div class="col-lg-12 col-md-12">';
        if (defined('CMB2_LOADED') || class_exists('ReduxFramework')) {
            if (restan_meta('page_breadcrumb_settings') == 'page') {
                $restan_page_title_switcher = restan_meta('page_title');
            } elseif (restan_opt('restan_page_title_switcher') == true) {
                $restan_page_title_switcher = restan_opt('restan_page_title_switcher');
            } else {
                $restan_page_title_switcher = '1';
            }
        } else {
            $restan_page_title_switcher = '1';
        }

        if ($restan_page_title_switcher == '1') {
            if (class_exists('ReduxFramework')) {
                $restan_page_title_tag    = restan_opt('restan_page_title_tag');
            } else {
                $restan_page_title_tag    = 'h1';
            }

            if (defined('CMB2_LOADED')) {
                if (!empty(restan_meta('page_title_settings'))) {
                    $restan_custom_title = restan_meta('page_title_settings');
                } else {
                    $restan_custom_title = 'default';
                }
            } else {
                $restan_custom_title = 'default';
            }

            if ($restan_custom_title == 'default') {
                echo restan_heading_tag(
                    array(
                        "tag"   => esc_attr($restan_page_title_tag),
                        "text"  => esc_html(get_the_title()),
                        'class' => 'breadcumb-title'
                    )
                );
            } else {
                echo restan_heading_tag(
                    array(
                        "tag"   => esc_attr($restan_page_title_tag),
                        "text"  => esc_html(restan_meta('custom_page_title')),
                        'class' => 'breadcumb-title'
                    )
                );
            }
        }
        if (defined('CMB2_LOADED') || class_exists('ReduxFramework')) {

            if (restan_meta('page_breadcrumb_settings') == 'page') {
                $restan_breadcrumb_switcher = restan_meta('page_breadcrumb_trigger');
            } else {
                $restan_breadcrumb_switcher = restan_opt('restan_enable_breadcrumb');
            }
        } else {
            $restan_breadcrumb_switcher = '1';
        }

        if ($restan_breadcrumb_switcher == '1' && (is_page() || is_page_template('template-builder.php'))) {
            restan_breadcrumbs();
        }
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '<!-- End of Page title -->';
    }
} else {
    if (class_exists('ReduxFramework')) {
        $class = '';
    } else {
        $class = 'thumb-less';
    }
    global $restan_opt;
    echo '<!-- Page title -->';
    echo '<div class="breadcrumb-area shadow dark bg-cover text-center text-light ' . esc_attr($class) . '">';
    if (!empty($restan_opt['restan_allHeader_shape']['url'])) :
        echo '<div class="breadcrum-shape">';
        echo '<img src="' . esc_url($restan_opt['restan_allHeader_shape']['url']) . '" alt="' . get_bloginfo('name') . '">';
        echo '</div>';
    endif;
    echo '<div class="container">';
    echo '<div class="row">';
    echo '<div class="col-lg-12 col-md-12">';
    if (class_exists('ReduxFramework')) {
        $restan_page_title_switcher  = restan_opt('restan_page_title_switcher');
    } else {
        $restan_page_title_switcher = '1';
    }

    if ($restan_page_title_switcher) {
        if (class_exists('ReduxFramework')) {
            $restan_page_title_tag    = restan_opt('restan_page_title_tag');
        } else {
            $restan_page_title_tag    = 'h1';
        }
        if (is_archive()) {
            echo restan_heading_tag(
                array(
                    "tag"   => esc_attr($restan_page_title_tag),
                    "text"  => wp_kses(get_the_archive_title(), $allowhtml),
                    'class' => 'breadcumb-title'
                )
            );
        } elseif (is_home()) {
            $restan_blog_page_title_setting = restan_opt('restan_blog_page_title_setting');
            $restan_blog_page_title_switcher = restan_opt('restan_blog_page_title_switcher');
            $restan_blog_page_custom_title = restan_opt('restan_blog_page_custom_title');
            if (class_exists('ReduxFramework')) {
                if ($restan_blog_page_title_switcher) {
                    echo restan_heading_tag(
                        array(
                            "tag"   => esc_attr($restan_page_title_tag),
                            "text"  => !empty($restan_blog_page_custom_title) && $restan_blog_page_title_setting == 'custom' ? esc_html($restan_blog_page_custom_title) : esc_html__('Blog', 'restan'),
                            'class' => 'breadcumb-title'
                        )
                    );
                }
            } else {
                echo restan_heading_tag(
                    array(
                        "tag"   => "h1",
                        "text"  => esc_html__('Blog', 'restan'),
                        'class' => 'breadcumb-title',
                    )
                );
            }
        } elseif (is_search()) {
            echo restan_heading_tag(
                array(
                    "tag"   => esc_attr($restan_page_title_tag),
                    "text"  => esc_html__('Search Result', 'restan'),
                    'class' => 'breadcumb-title'
                )
            );
        } elseif (is_404()) {
            echo restan_heading_tag(
                array(
                    "tag"   => esc_attr($restan_page_title_tag),
                    "text"  => esc_html__('404 PAGE', 'restan'),
                    'class' => 'breadcumb-title'
                )
            );
        } else {
            $posttitle_position  = restan_opt('restan_post_details_title_position');
            $postTitlePos = false;
            if (is_single()) {
                if (class_exists('ReduxFramework')) {
                    if ($posttitle_position && $posttitle_position != 'header') {
                        $postTitlePos = true;
                    }
                } else {
                    $postTitlePos = false;
                }
            }
            if ($postTitlePos != true) {
                echo restan_heading_tag(
                    array(
                        "tag"   => esc_attr($restan_page_title_tag),
                        "text"  => wp_kses(get_the_title(), $allowhtml),
                        'class' => 'breadcumb-title'
                    )
                );
            } else {
                if (class_exists('ReduxFramework')) {
                    $restan_post_details_custom_title  = restan_opt('restan_post_details_custom_title');
                } else {
                    $restan_post_details_custom_title = __('Blog Details', 'restan');
                }

                if (!empty($restan_post_details_custom_title)) {
                    echo restan_heading_tag(
                        array(
                            "tag"   => esc_attr($restan_page_title_tag),
                            "text"  => wp_kses($restan_post_details_custom_title, $allowhtml),
                            'class' => 'breadcumb-title'
                        )
                    );
                }
            }
        }
    }
    if (class_exists('ReduxFramework')) {
        $restan_breadcrumb_switcher = restan_opt('restan_enable_breadcrumb');
    } else {
        $restan_breadcrumb_switcher = '1';
    }
    if ($restan_breadcrumb_switcher == '1') {
        restan_breadcrumbs(
            array(
                'breadcrumbs_classes' => 'nav',
            )
        );
    }
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '<!-- End of Page title -->';
}
