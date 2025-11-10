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
 * Include File
 *
 */

// Constants
require_once get_parent_theme_file_path() . '/inc/restan-constants.php';

//theme setup
require_once RESTAN_DIR_PATH_INC . 'restan-theme-setup.php';

//essential scripts
require_once RESTAN_DIR_PATH_INC . 'restan-essential-scripts.php';

//NavWalker
require_once RESTAN_DIR_PATH_INC . 'restan-navwalker.php';

// plugin activation
require_once RESTAN_DIR_PATH_FRAM . 'plugins-activation/restan-active-plugins.php';

// meta options
require_once RESTAN_DIR_PATH_FRAM . 'restan-meta/restan-config.php';

// page breadcrumbs
require_once RESTAN_DIR_PATH_INC . 'restan-breadcrumbs.php';

// sidebar register
require_once RESTAN_DIR_PATH_INC . 'restan-widgets-reg.php';

//essential functions
require_once RESTAN_DIR_PATH_INC . 'restan-functions.php';

// theme dynamic css
require_once RESTAN_DIR_PATH_INC . 'restan-commoncss.php';

// helper function
require_once RESTAN_DIR_PATH_INC . 'wp-html-helper.php';

// Demo Data
require_once RESTAN_DEMO_DIR_PATH . 'demo-import.php';

// restan options
require_once RESTAN_DIR_PATH_FRAM . 'restan-options/restan-options.php';

// hooks
require_once RESTAN_DIR_PATH_HOOKS . 'hooks.php';

// hooks funtion
require_once RESTAN_DIR_PATH_HOOKS . 'hooks-functions.php';

// woocommerce hooks
require_once RESTAN_DIR_PATH_INC . 'woocommerce-hooks/woocommerce-hooks.php';

// woocommerce hooks
require_once RESTAN_DIR_PATH_INC . 'woocommerce-hooks/woocommerce-hooks-functions.php';

function warp_ajax_product_remove() {
	// Get mini cart
	ob_start();

	foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
		if ($cart_item['product_id'] == $_POST['product_id'] && $cart_item_key == $_POST['cart_item_key']) {
			WC()->cart->remove_cart_item($cart_item_key);
		}
	}

	WC()->cart->calculate_totals();
	WC()->cart->maybe_set_cart_cookies();

	woocommerce_mini_cart();

	$mini_cart = ob_get_clean();

	// Fragments and mini cart are returned
	$data = array(
		'fragments' => apply_filters(
			'woocommerce_add_to_cart_fragments',
			array(
				'div.widget_shopping_cart_content' => '<div class="widget_shopping_cart_content">' . $mini_cart . '</div>',
			)
		),
		'cart_hash' => apply_filters('woocommerce_add_to_cart_hash', WC()->cart->get_cart_for_session() ? md5(json_encode(WC()->cart->get_cart_for_session())) : '', WC()->cart->get_cart_for_session()),
	);

	wp_send_json($data);

	die();
}

add_action('wp_ajax_product_remove', 'warp_ajax_product_remove');
add_action('wp_ajax_nopriv_product_remove', 'warp_ajax_product_remove');