<?php

/**
 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the CMB2 directory)
 *
 * Be sure to replace all instances of 'yourprefix_' with your project's prefix.
 * http://nacin.com/2010/05/11/in-wordpress-prefix-everything/
 *
 * @category YourThemeOrPlugin
 * @package  Demo_CMB2
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/WebDevStudios/CMB2
 */

/**
 * Only return default value if we don't have a post ID (in the 'post' query variable)
 *
 * @param  bool  $default On/Off (true/false)
 * @return mixed          Returns true or '', the blank default
 */
function restan_set_checkbox_default_for_new_post($default)
{
	return isset($_GET['post']) ? '' : ($default ? (string) $default : '');
}

add_action('cmb2_admin_init', 'restan_register_metabox');

/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
 */

function restan_register_metabox()
{

	$prefix = '_restan_';

	$prefixpage = '_restanpage_';

	$restan_service_meta = new_cmb2_box(array(
		'id'            => $prefixpage . 'service_page_control',
		'title'         => esc_html__('Service Page Controller', 'restan'),
		'object_types'  => array('carvis_service'), // Post type
		'closed'        => true
	));
	$restan_service_meta->add_field(array(
		'name' => esc_html__('Write Flaticon Class', 'restan'),
		'desc' => esc_html__('Write Flaticon Class For The Icon', 'restan'),
		'id'   => $prefix . 'flat_icon_class',
		'type' => 'text',
	));

	$restan_shop_page_meta = new_cmb2_box(array(
		'id'            => $prefixpage . 'shop_page_control',
		'title'         => esc_html__('Shop Page Feature ', 'restan'),
		'object_types'  => array('product'), // Post type
		'closed'        => true
	));

	$restan_shop_page_meta->add_field(array(
		'name' => esc_html__('Feature List', 'restan'),
		'id'   => $prefix . 'shop_feature_list',
		'type' => 'textarea_small'
	));

	$restan_shop_page_meta->add_field(array(
		'name' => esc_html__('Feature Image', 'restan'),
		'desc' => esc_html__('Set Feature Image', 'restan'),
		'id'   => $prefix . 'feature_image',
		'type' => 'file',
		'text'    => array(
			'add_upload_file_text' => esc_html__('Add Image', 'restan') // Change upload button text. Default: "Add or Upload File"
		),
	));

	$restan_post_meta = new_cmb2_box(array(
		'id'            => $prefixpage . 'blog_post_control',
		'title'         => esc_html__('Post Thumb Controller', 'restan'),
		'object_types'  => array('post'), // Post type
		'closed'        => true
	));
	$restan_post_meta->add_field(array(
		'name' => esc_html__('Post Format Video', 'restan'),
		'desc' => esc_html__('Use This Field When Post Format Video', 'restan'),
		'id'   => $prefix . 'post_format_video',
		'type' => 'text_url',
	));
	$restan_post_meta->add_field(array(
		'name' => esc_html__('Post Format Audio', 'restan'),
		'desc' => esc_html__('Use This Field When Post Format Audio', 'restan'),
		'id'   => $prefix . 'post_format_audio',
		'type' => 'oembed',
	));
	$restan_post_meta->add_field(array(
		'name' => esc_html__('Post Thumbnail For Slider', 'restan'),
		'desc' => esc_html__('Use This Field When You Want A Slider In Post Thumbnail', 'restan'),
		'id'   => $prefix . 'post_format_slider',
		'type' => 'file_list',
	));

	$restan_page_meta = new_cmb2_box(array(
		'id'            => $prefixpage . 'page_meta_section',
		'title'         => esc_html__('Page Meta', 'restan'),
		'object_types'  => array('page'), // Post type
		'closed'        => true
	));


	$restan_page_meta->add_field(array(
		'name' => esc_html__('Page Variant', 'restan'),
		'id'   => $prefix . 'page_variant',
		'type' => 'select',
		'default' => '0',
		'options'   => array(
			'0'   => esc_html__('Default', 'restan'),
			'1'   => esc_html__('Red', 'restan'),
			'2'   => esc_html__('Dark', 'restan'),
			'3'   => esc_html__('Red & Dark', 'restan'),
		)
	));

	$restan_page_meta->add_field(array(
		'name' => esc_html__('Page Breadcrumb Area', 'restan'),
		'desc' => esc_html__('check to display page breadcrumb area.', 'restan'),
		'id'   => $prefix . 'page_breadcrumb_area',
		'type' => 'select',
		'default' => '1',
		'options'   => array(
			'1'   => esc_html__('Show', 'restan'),
			'2'     => esc_html__('Hide', 'restan'),
		)
	));


	$restan_page_meta->add_field(array(
		'name' => esc_html__('Page Breadcrumb Settings', 'restan'),
		'id'   => $prefix . 'page_breadcrumb_settings',
		'type' => 'select',
		'default'   => 'global',
		'options'   => array(
			'global'   => esc_html__('Global Settings', 'restan'),
			'page'     => esc_html__('Page Settings', 'restan'),
		)
	));

	$restan_page_meta->add_field(array(
		'name'    => esc_html__('Breadcumb Image', 'restan'),
		'desc'    => esc_html__('Upload an image or enter an URL.', 'restan'),
		'id'      => $prefix . 'breadcumb_image',
		'type'    => 'file',
		// Optional:
		'options' => array(
			'url' => false, // Hide the text input for the url
		),
		'text'    => array(
			'add_upload_file_text' => __('Add File', 'restan') // Change upload button text. Default: "Add or Upload File"
		),
		'preview_size' => 'large', // Image size to use when previewing in the admin.
	));

	$restan_page_meta->add_field(array(
		'name' => esc_html__('Page Title', 'restan'),
		'desc' => esc_html__('check to display Page Title.', 'restan'),
		'id'   => $prefix . 'page_title',
		'type' => 'select',
		'default' => '1',
		'options'   => array(
			'1'   	=> esc_html__('Show', 'restan'),
			'2'     => esc_html__('Hide', 'restan'),
		)
	));

	$restan_page_meta->add_field(array(
		'name' => esc_html__('Page Title Settings', 'restan'),
		'id'   => $prefix . 'page_title_settings',
		'type' => 'select',
		'options'   => array(
			'default'  => esc_html__('Default Title', 'restan'),
			'custom'  => esc_html__('Custom Title', 'restan'),
		),
		'default'   => 'default'
	));

	$restan_page_meta->add_field(array(
		'name' => esc_html__('Custom Page Title', 'restan'),
		'id'   => $prefix . 'custom_page_title',
		'type' => 'text'
	));

	$restan_page_meta->add_field(array(
		'name' => esc_html__('Breadcrumb', 'restan'),
		'desc' => esc_html__('Select Show to display breadcrumb area', 'restan'),
		'id'   => $prefix . 'page_breadcrumb_trigger',
		'type' => 'switch_btn',
		'default' => restan_set_checkbox_default_for_new_post(true),
	));

	$restan_layout_meta = new_cmb2_box(array(
		'id'            => $prefixpage . 'page_layout_section',
		'title'         => esc_html__('Page Layout', 'restan'),
		'context' 		=> 'side',
		'priority' 		=> 'high',
		'object_types'  => array('page'), // Post type
		'closed'        => true
	));

	$restan_layout_meta->add_field(array(
		'desc'       => esc_html__('Set page layout container,container fluid,fullwidth or both. It\'s work only in template builder page.', 'restan'),
		'id'         => $prefix . 'custom_page_layout',
		'type'       => 'radio',
		'options' => array(
			'1' => esc_html__('Container', 'restan'),
			'2' => esc_html__('Container Fluid', 'restan'),
			'3' => esc_html__('Fullwidth', 'restan'),
		),
	));

	$restan_product_meta = new_cmb2_box(array(
		'id'            => $prefixpage . 'product_meta_section',
		'title'         => esc_html__('Swap Image', 'restan'),
		'object_types'  => array('product'), // Post type
		'closed'        => true,
		'context'		=> 'side',
		'priority'		=> 'default'
	));

	$restan_product_meta->add_field(array(
		'name' 		=> esc_html__('Product Swap Image', 'restan'),
		'desc' 		=> esc_html__('Set Product Swap Image', 'restan'),
		'id'   		=> $prefix . 'product_swap_image',
		'type'    	=> 'file',
		// Optional:
		'options' 	=> array(
			'url' 		=> false, // Hide the text input for the url
		),
		'text'    	=> array(
			'add_upload_file_text' => __('Add Swap Image', 'restan') // Change upload button text. Default: "Add or Upload File"
		),
	));
}

add_action('cmb2_admin_init', 'restan_register_taxonomy_metabox');
/**
 * Hook in and add a metabox to add fields to taxonomy terms
 */
function restan_register_taxonomy_metabox()
{

	$prefix = '_restan_';
	/**
	 * Metabox to add fields to categories and tags
	 */
	$restan_term_meta = new_cmb2_box(array(
		'id'               => $prefix . 'term_edit',
		'title'            => esc_html__('Category Metabox', 'restan'),
		'object_types'     => array('term'),
		'taxonomies'       => array('category'),
	));
	$restan_term_meta->add_field(array(
		'name'     => esc_html__('Extra Info', 'restan'),
		'id'       => $prefix . 'term_extra_info',
		'type'     => 'title',
		'on_front' => false,
	));

	$restan_term_meta->add_field(array(
		'name' => esc_html__('Category Image', 'restan'),
		'desc' => esc_html__('Set Category Image', 'restan'),
		'id'   => $prefix . 'term_avatar',
		'type' => 'file',
		'text'    => array(
			'add_upload_file_text' => esc_html__('Add Image', 'restan') // Change upload button text. Default: "Add or Upload File"
		),
	));


	/**
	 * Metabox for the user profile screen
	 */
	$restan_user = new_cmb2_box(array(
		'id'               => $prefix . 'user_edit',
		'title'            => esc_html__('User Profile Metabox', 'restan'), // Doesn't output for user boxes
		'object_types'     => array('user'), // Tells CMB2 to use user_meta vs post_meta
		'show_names'       => true,
		'new_user_section' => 'add-new-user', // where form will show on new user page. 'add-existing-user' is only other valid option.
	));
	$restan_user->add_field(array(
		'name'     => esc_html__('Social Profile', 'restan'),
		'id'       => $prefix . 'user_extra_info',
		'type'     => 'title',
		'on_front' => false,
	));

	$group_field_id = $restan_user->add_field(array(
		'id'          => $prefix . 'social_profile_group',
		'type'        => 'group',
		'description' => __('Social Profile', 'restan'),
		'options'     => array(
			'group_title'       => __('Social Profile {#}', 'restan'), // since version 1.1.4, {#} gets replaced by row number
			'add_button'        => __('Add Another Social Profile', 'restan'),
			'remove_button'     => __('Remove Social Profile', 'restan'),
			'closed'         => true
		),
	));

	$restan_user->add_group_field($group_field_id, array(
		'name'        => __('Select Icon', 'restan'),
		'id'          => $prefix . 'social_profile_icon',
		'type'        => 'fontawesome_icon', // This field type
	));

	$restan_user->add_group_field($group_field_id, array(
		'desc'       => esc_html__('Set social profile link.', 'restan'),
		'id'         => $prefix . 'lawyer_social_profile_link',
		'name'       => esc_html__('Social Profile link', 'restan'),
		'type'       => 'text'
	));
}
