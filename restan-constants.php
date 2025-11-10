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

/**
 *
 * Define constant
 *
 */

// Base URI
if (!defined('RESTAN_DIR_URI')) {
    define('RESTAN_DIR_URI', get_parent_theme_file_uri() . '/');
}

// Assist URI
if (!defined('RESTAN_DIR_ASSIST_URI')) {
    define('RESTAN_DIR_ASSIST_URI', get_theme_file_uri('/assets/'));
}


// Css File URI
if (!defined('RESTAN_DIR_CSS_URI')) {
    define('RESTAN_DIR_CSS_URI', get_theme_file_uri('/assets/css/'));
}

// Skin Css File
if (!defined('RESTAN_DIR_SKIN_CSS_URI')) {
    define('RESTAN_DIR_SKIN_CSS_URI', get_theme_file_uri('/assets/css/skins/'));
}


// Js File URI
if (!defined('RESTAN_DIR_JS_URI')) {
    define('RESTAN_DIR_JS_URI', get_theme_file_uri('/assets/js/'));
}


// External PLugin File URI
if (!defined('RESTAN_DIR_PLUGIN_URI')) {
    define('RESTAN_DIR_PLUGIN_URI', get_theme_file_uri('/assets/plugins/'));
}

// Base Directory
if (!defined('RESTAN_DIR_PATH')) {
    define('RESTAN_DIR_PATH', get_parent_theme_file_path() . '/');
}

//Inc Folder Directory
if (!defined('RESTAN_DIR_PATH_INC')) {
    define('RESTAN_DIR_PATH_INC', RESTAN_DIR_PATH . 'inc/');
}

//restan framework Folder Directory
if (!defined('RESTAN_DIR_PATH_FRAM')) {
    define('RESTAN_DIR_PATH_FRAM', RESTAN_DIR_PATH_INC . 'restan-framework/');
}

//Classes Folder Directory
if (!defined('RESTAN_DIR_PATH_CLASSES')) {
    define('RESTAN_DIR_PATH_CLASSES', RESTAN_DIR_PATH_INC . 'classes/');
}

//Hooks Folder Directory
if (!defined('RESTAN_DIR_PATH_HOOKS')) {
    define('RESTAN_DIR_PATH_HOOKS', RESTAN_DIR_PATH_INC . 'hooks/');
}

//Demo Data Folder Directory Path
if (!defined('RESTAN_DEMO_DIR_PATH')) {
    define('RESTAN_DEMO_DIR_PATH', RESTAN_DIR_PATH_INC . 'demo-data/');
}

//Demo Data Folder Directory URI
if (!defined('RESTAN_DEMO_DIR_URI')) {
    define('RESTAN_DEMO_DIR_URI', RESTAN_DIR_URI . 'inc/demo-data/');
}
