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
if (class_exists('ReduxFramework')) {
    get_template_part('templates/blog-style-one');
} else {
    get_template_part('templates/blog-style-one');
}
