<?php
// Do not allow directly accessing this file.
if (!defined('ABSPATH')) {
	exit();
}
/**
 * @Packge    : restan
 * @version   : 1.0
 * @Author    : restan
 * @Author URI: https://themeforest.net/user/validthemes/portfolio
 */

// demo import file
function restan_import_files() {

	$demoImg = '<img src="' . RESTAN_DEMO_DIR_URI . 'screen-image.jpg" alt="' . esc_attr__('Demo Preview Imgae', 'restan') . '" />';

	return array(
		array(
			'import_file_name' => esc_html__('restan Demo', 'restan'),
			'import_file_url' => 'https://wp.validthemes.net/restan/demo/content.xml',
			'import_widget_file_url' => 'https://wp.validthemes.net/restan/demo/restan_widget.wie',
			'local_import_redux' => array(
				array(
					'file_path' => trailingslashit(get_template_directory()) . '/inc/demo-data/redux_options_demo.json',
					'option_name' => 'restan_opt',
				),
			),
			'import_notice' => $demoImg,
		),
	);
}
add_filter('pt-ocdi/import_files', 'restan_import_files');

// demo import setup
function restan_after_import_setup() {
	// Assign menus to their locations.
	$main_menu = get_term_by('name', 'Main Menu', 'nav_menu');

	set_theme_mod(
		'nav_menu_locations',
		array(
			'primary-menu' => $main_menu->term_id,
		)
	);

	// Assign front page and posts page (blog page).
	$front_page_id = get_page_by_title('Home One');
	$blog_page_id = get_page_by_title('Blog');

	update_option('show_on_front', 'page');
	update_option('page_on_front', $front_page_id->ID);
	update_option('page_for_posts', $blog_page_id->ID);
}
add_action('pt-ocdi/after_import', 'restan_after_import_setup');

//disable the branding notice after successful demo import
add_filter('pt-ocdi/disable_pt_branding', '__return_true');

//change the location, title and other parameters of the plugin page
function restan_import_plugin_page_setup($default_settings) {
	$default_settings['parent_slug'] = 'themes.php';
	$default_settings['page_title'] = esc_html__('restan Demo Import', 'restan');
	$default_settings['menu_title'] = esc_html__('Import Demo Data', 'restan');
	$default_settings['capability'] = 'import';
	$default_settings['menu_slug'] = 'restan-demo-import';

	return $default_settings;
}
add_filter('pt-ocdi/plugin_page_setup', 'restan_import_plugin_page_setup');

// Enqueue scripts
function restan_demo_import_custom_scripts() {
	if (isset($_GET['page']) && $_GET['page'] == 'restan-demo-import') {
		// style
		wp_enqueue_style('restan-demo-import', RESTAN_DEMO_DIR_URI . 'css/restan.demo.import.css', array(), '1.0', false);
	}
}
add_action('admin_enqueue_scripts', 'restan_demo_import_custom_scripts');
