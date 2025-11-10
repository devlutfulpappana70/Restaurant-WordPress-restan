<?php

/**
 * ReduxFramework Sample Config File
 * For full documentation, please visit: http://docs.reduxframework.com/
 */

if (!class_exists('Redux')) {
    return;
}

// This is your option name where all the Redux data is stored.
$opt_name = "restan_opt";

// This line is only for altering the demo. Can be easily removed.
$opt_name = apply_filters('redux_demo/opt_name', $opt_name);

/*
     *
     * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
     *
     */

$sampleHTML = '';
if (file_exists(dirname(__FILE__) . '/info-html.html')) {
    Redux_Functions::initWpFilesystem();

    global $wp_filesystem;

    $sampleHTML = $wp_filesystem->get_contents(dirname(__FILE__) . '/info-html.html');
}


$alowhtml = array(
    'p' => array(
        'class' => array()
    ),
    'span' => array()
);


// Background Patterns Reader
$sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
$sample_patterns_url  = ReduxFramework::$_url . '../sample/patterns/';
$sample_patterns      = array();

if (is_dir($sample_patterns_path)) {

    if ($sample_patterns_dir = opendir($sample_patterns_path)) {
        $sample_patterns = array();

        while (($sample_patterns_file = readdir($sample_patterns_dir)) !== false) {

            if (stristr($sample_patterns_file, '.png') !== false || stristr($sample_patterns_file, '.jpg') !== false) {
                $name              = explode('.', $sample_patterns_file);
                $name              = str_replace('.' . end($name), '', $sample_patterns_file);
                $sample_patterns[] = array(
                    'alt' => $name,
                    'img' => $sample_patterns_url . $sample_patterns_file
                );
            }
        }
    }
}

/**
 * ---> SET ARGUMENTS
 * All the possible arguments for Redux.
 * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
 * */

$theme = wp_get_theme(); // For use with some settings. Not necessary.

$args = array(
    // TYPICAL -> Change these values as you need/desire
    'opt_name'             => $opt_name,
    // This is where your data is stored in the database and also becomes your global variable name.
    'display_name'         => $theme->get('Name'),
    // Name that appears at the top of your panel
    'display_version'      => $theme->get('Version'),
    // Version that appears at the top of your panel
    'menu_type'            => 'menu',
    //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
    'allow_sub_menu'       => true,
    // Show the sections below the admin menu item or not
    'menu_title'           => esc_html__('Restan Options', 'restan'),
    'page_title'           => esc_html__('Restan Options', 'restan'),
    // You will need to generate a Google API key to use this feature.
    // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
    'google_api_key'       => '',
    // Set it you want google fonts to update weekly. A google_api_key value is required.
    'google_update_weekly' => false,
    // Must be defined to add google fonts to the typography module
    'async_typography'     => false,
    // Use a asynchronous font on the front end or font string
    //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
    'admin_bar'            => true,
    // Show the panel pages on the admin bar
    'admin_bar_icon'       => 'dashicons-portfolio',
    // Choose an icon for the admin bar menu
    'admin_bar_priority'   => 50,
    // Choose an priority for the admin bar menu
    'global_variable'      => '',
    // Set a different name for your global variable other than the opt_name
    'dev_mode'             => false,
    // Show the time the page took to load, etc
    'update_notice'        => true,
    // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
    'customizer'           => true,
    // Enable basic customizer support
    //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
    //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

    // OPTIONAL -> Give you extra features
    'page_priority'        => null,
    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
    'page_parent'          => 'themes.php',
    // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
    'page_permissions'     => 'manage_options',
    // Permissions needed to access the options panel.
    'menu_icon'            => '',
    // Specify a custom URL to an icon
    'last_tab'             => '',
    // Force your panel to always open to a specific tab (by id)
    'page_icon'            => 'icon-themes',
    // Icon displayed in the admin panel next to your menu_title
    'page_slug'            => '',
    // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
    'save_defaults'        => true,
    // On load save the defaults to DB before user clicks save or not
    'default_show'         => false,
    // If true, shows the default value next to each field that is not the default value.
    'default_mark'         => '',
    // What to print by the field's title if the value shown is default. Suggested: *
    'show_import_export'   => true,
    // Shows the Import/Export panel when not used as a field.

    // CAREFUL -> These options are for advanced use only
    'transient_time'       => 60 * MINUTE_IN_SECONDS,
    'output'               => true,
    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
    'output_tag'           => true,
    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
    // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

    // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
    'database'             => '',
    // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
    'use_cdn'              => true,
    // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

    // HINTS
    'hints'                => array(
        'icon'          => 'el el-question-sign',
        'icon_position' => 'right',
        'icon_color'    => 'lightgray',
        'icon_size'     => 'normal',
        'tip_style'     => array(
            'color'   => 'red',
            'shadow'  => true,
            'rounded' => false,
            'style'   => '',
        ),
        'tip_position'  => array(
            'my' => 'top left',
            'at' => 'bottom right',
        ),
        'tip_effect'    => array(
            'show' => array(
                'effect'   => 'slide',
                'duration' => '500',
                'event'    => 'mouseover',
            ),
            'hide' => array(
                'effect'   => 'slide',
                'duration' => '500',
                'event'    => 'click mouseleave',
            ),
        ),
    )
);


Redux::setArgs($opt_name, $args);

/*
     * ---> END ARGUMENTS
     */


/*
     * ---> START HELP TABS
     */

$tabs = array(
    array(
        'id'      => 'redux-help-tab-1',
        'title'   => esc_html__('Theme Information 1', 'restan'),
        'content' => esc_html__('<p>This is the tab content, HTML is allowed.</p>', 'restan')
    ),
    array(
        'id'      => 'redux-help-tab-2',
        'title'   => esc_html__('Theme Information 2', 'restan'),
        'content' => esc_html__('<p>This is the tab content, HTML is allowed.</p>', 'restan')
    )
);
Redux::set_help_tab($opt_name, $tabs);

// Set the help sidebar
$content = esc_html__('<p>This is the sidebar content, HTML is allowed.</p>', 'restan');
Redux::set_help_sidebar($opt_name, $content);



// -> START General Fields

Redux::setSection($opt_name, array(
    'title'            => esc_html__('General', 'restan'),
    'id'               => 'restan_general',
    'customizer_width' => '450px',
    'icon'             => 'el el-cog',
    'fields'           => array(
        array(
            'id'       => 'restan_theme_color',
            'type'     => 'color',
            'title'    => esc_html__('Theme Primary Color', 'restan'),
            'subtitle' => esc_html__('Set Primary Theme Color', 'restan')
        ),
        array(
            'id'       => 'restan_theme_color_sec',
            'type'     => 'color',
            'title'    => esc_html__('Theme Secondary Color', 'restan'),
            'subtitle' => esc_html__('Set Secondary Theme Color', 'restan')
        )
    )

));

Redux::setSection($opt_name, array(
    'title'            => esc_html__('Preloader', 'restan'),
    'id'               => 'restan_preloader',
    'subsection'       => true,
    'fields'           => array(
        array(
            'id'       => 'restan_display_preloader',
            'type'     => 'switch',
            'title'    => esc_html__('Preloader', 'restan'),
            'subtitle' => esc_html__('Switch Enabled to Display Preloader.', 'restan'),
            'default'  => true,
            'on'       => esc_html__('Enabled', 'restan'),
            'off'      => esc_html__('Disabled', 'restan'),
        ),

        array(
            'id'       => 'restan_preloader_img',
            'type'     => 'media',
            'title'    => esc_html__('Preloader Image', 'restan'),
            'subtitle' => esc_html__('Set Preloader Image.', 'restan'),
            'required' => array("restan_display_preloader", "equals", true)
        ),
    )
));

/* End General Fields */

/* Admin Lebel Fields */
Redux::setSection($opt_name, array(
    'title'             => esc_html__('Admin Label', 'restan'),
    'id'                => 'restan_admin_label',
    'customizer_width'  => '450px',
    'subsection'        => true,
    'fields'            => array(
        array(
            'title'     => esc_html__('Admin Login Logo', 'restan'),
            'subtitle'  => esc_html__('It belongs to the back-end of your website to log-in to admin panel.', 'restan'),
            'id'        => 'restan_admin_login_logo',
            'type'      => 'media',
        ),
        array(
            'title'     => esc_html__('Custom CSS For admin', 'restan'),
            'subtitle'  => esc_html__('Any CSS your write here will run in admin.', 'restan'),
            'id'        => 'restan_theme_admin_custom_css',
            'type'      => 'ace_editor',
            'mode'      => 'css',
            'theme'     => 'chrome',
            'full_width' => true,
        ),
    ),
));

// -> START Basic Fields
Redux::setSection($opt_name, array(
    'title'            => esc_html__('Header', 'restan'),
    'id'               => 'restan_header',
    'customizer_width' => '400px',
    'icon'             => 'el el-credit-card',
    'fields'           => array(
        array(
            'id'       => 'restan_header_options',
            'type'     => 'button_set',
            'default'  => '1',
            'options'  => array(
                "1"         => esc_html__('Prebuilt', 'restan'),
                "2"         => esc_html__('Header Builder', 'restan'),
            ),
            'title'    => esc_html__('Header Options', 'restan'),
            'subtitle' => esc_html__('Select header options.', 'restan'),
        ),
        array(
            'id'       => 'restan_header_select_options',
            'type'     => 'select',
            'data'     => 'posts',
            'args'     => array(
                'post_type'     => 'restan_header',
                'posts_per_page' => 10,
            ),
            'title'    => esc_html__('Header', 'restan'),
            'subtitle' => esc_html__('Select header.', 'restan'),
            'required' => array('restan_header_options', 'equals', '2')
        ),
        array(
            'id'       => 'restan_btn_text',
            'type'     => 'text',
            'validate' => 'html',
            'default'  => esc_html__('Get Started', 'restan'),
            'title'    => esc_html__('Button Text', 'restan'),
            'subtitle' => esc_html__('Set Button Text', 'restan'),
        ),
        array(
            'id'       => 'restan_btn_url',
            'type'     => 'text',
            'default'  => esc_html__('#', 'restan'),
            'title'    => esc_html__('Button URL?', 'restan'),
            'subtitle' => esc_html__('Set Button URL Here', 'restan'),
        ),
    ),
));
// -> START Header Logo
Redux::setSection($opt_name, array(
    'title'            => esc_html__('Header Logo', 'restan'),
    'id'               => 'restan_header_logo_option',
    'subsection'       => true,
    'fields'           => array(
        array(
            'id'       => 'restan_site_logo',
            'type'     => 'media',
            'url'      => true,
            'title'    => esc_html__('Logo', 'restan'),
            'compiler' => 'true',
            'subtitle' => esc_html__('Upload your site logo for header ( recommendation png format ).', 'restan'),
        ),
        array(
            'id'       => 'restan_site_logo_dimensions',
            'type'     => 'dimensions',
            'units'    => array('px'),
            'title'    => esc_html__('Logo Dimensions (Width/Height).', 'restan'),
            'output'   => array('.header-logo .logo img'),
            'subtitle' => esc_html__('Set logo dimensions to choose width, height, and unit.', 'restan'),
        ),
        array(
            'id'       => 'restan_site_logomargin_dimensions',
            'type'     => 'spacing',
            'mode'     => 'margin',
            'output'   => array('.header-logo .logo img'),
            'units_extended' => 'false',
            'units'    => array('px'),
            'title'    => esc_html__('Logo Top and Bottom Margin.', 'restan'),
            'left'     => false,
            'right'    => false,
            'subtitle' => esc_html__('Set logo top and bottom margin.', 'restan'),
            'default'            => array(
                'units'           => 'px'
            )
        ),
        array(
            'id'       => 'restan_text_title',
            'type'     => 'text',
            'validate' => 'html',
            'title'    => esc_html__('Text Logo', 'restan'),
            'subtitle' => esc_html__('Write your logo text use as logo ( You can use span tag for text color ).', 'restan'),
        )
    )
));
// -> End Header Logo

// -> START Header Menu
Redux::setSection($opt_name, array(
    'title'            => esc_html__('Header Menu', 'restan'),
    'id'               => 'restan_header_menu_option',
    'subsection'       => true,
    'fields'           => array(
        array(
            'id'       => 'restan_header_menu_color',
            'type'     => 'color',
            'title'    => esc_html__('Menu Color', 'restan'),
            'subtitle' => esc_html__('Set Menu Color', 'restan'),
            'output'   => array('color'    =>  'nav.navbar ul.nav > li > a'),
        ),
        array(
            'id'       => 'restan_header_menu_hover_color',
            'type'     => 'color',
            'title'    => esc_html__('Menu Hover Color', 'restan'),
            'subtitle' => esc_html__('Set Menu Hover Color', 'restan'),
            'output'   => array('color'    =>  'nav.navbar ul.nav > li > a:hover'),
        ),
        array(
            'id'       => 'restan_header_dropdown_menu_color',
            'type'     => 'color',
            'title'    => esc_html__('Dropdown Menu Color', 'restan'),
            'subtitle' => esc_html__('Set Menu Color', 'restan'),
            'output'   => array('color'    =>  'nav.navbar.validnavs ul li.dropdown ul.dropdown-menu li a'),
        ),
        array(
            'id'       => 'restan_header_dropdown_menu_hover_color',
            'type'     => 'color',
            'title'    => esc_html__('Dropdown Menu Hover Color', 'restan'),
            'subtitle' => esc_html__('Set Menu Hover Color', 'restan'),
            'output'   => array('color'    =>  'nav.navbar.validnavs ul li.dropdown ul.dropdown-menu li a:hover'),
        ),
    )
));
// -> End Header Menu

// -> START Blog Page
Redux::setSection($opt_name, array(
    'title'      => esc_html__('Blog', 'restan'),
    'id'         => 'restan_blog_page',
    'icon'  => 'el el-blogger',
    'fields'     => array(

        array(
            'id'       => 'restan_blog_sidebar',
            'type'     => 'image_select',
            'title'    => esc_html__('Layout', 'restan'),
            'subtitle' => esc_html__('Choose blog layout from here. If you use this option then you will able to change three type of blog layout ( Default Left Sidebar Layour ). ', 'restan'),
            'options'  => array(
                '1' => array(
                    'alt' => esc_attr__('No Sidebar', 'restan'),
                    'img' => esc_url(get_template_directory_uri() . '/assets/img/no-sideber.png')
                ),
                '2' => array(
                    'alt' => esc_attr__('Left Sidebar', 'restan'),
                    'img' => esc_url(get_template_directory_uri() . '/assets/img/left-sideber.png')
                ),
                '3' => array(
                    'alt' => esc_attr__('Right Sidebar', 'restan'),
                    'img' => esc_url(get_template_directory_uri() . '/assets/img/right-sideber.png')
                ),

            ),
            'default'  => '3'
        ),
        array(
            'id'       => 'restan_blog_grid',
            'type'     => 'image_select',
            'title'    => esc_html__('Post Column', 'restan'),
            'subtitle' => esc_html__('Select your blog post column from here. If you use this option then you will able to select three type of blog post layout ( Default Two Column ).', 'restan'),
            //Must provide key => value(array:title|img) pairs for radio options
            'options'  => array(
                '1' => array(
                    'alt' => esc_attr__('1 Column', 'restan'),
                    'img' => esc_url(get_template_directory_uri() . '/assets/img/1column.png')
                ),
                '2' => array(
                    'alt' => esc_attr__('2 Column Left', 'restan'),
                    'img' => esc_url(get_template_directory_uri() . '/assets/img/2column.png')
                ),
                '3' => array(
                    'alt' => esc_attr__('2 Column Right', 'restan'),
                    'img' => esc_url(get_template_directory_uri() . '/assets/img/3column.png')
                ),

            ),
            'default'  => '1'
        ),
        array(
            'id'       => 'restan_blog_page_title_switcher',
            'type'     => 'switch',
            'default'  => 1,
            'on'       => esc_html__('Show', 'restan'),
            'off'      => esc_html__('Hide', 'restan'),
            'title'    => esc_html__('Blog Page Title', 'restan'),
            'subtitle' => esc_html__('Control blog page title show / hide. If you use this option then you will able to show / hide your blog page title ( Default Setting Show ).', 'restan'),
        ),
        array(
            'id'       => 'restan_blog_page_title_setting',
            'type'     => 'button_set',
            'title'    => esc_html__('Blog Page Title Setting', 'restan'),
            'subtitle' => esc_html__('Control blog page title setting. If you use this option then you can able to show default or custom blog page title ( Default Blog ).', 'restan'),
            'options'  => array(
                "predefine"   => esc_html__('Default', 'restan'),
                "custom"      => esc_html__('Custom', 'restan'),
            ),
            'default'  => 'predefine',
            'required' => array("restan_blog_page_title_switcher", "equals", "1")
        ),
        array(
            'id'       => 'restan_blog_page_custom_title',
            'type'     => 'text',
            'title'    => esc_html__('Blog Custom Title', 'restan'),
            'subtitle' => esc_html__('Set blog page custom title form here. If you use this option then you will able to set your won title text.', 'restan'),
            'required' => array('restan_blog_page_title_setting', 'equals', 'custom')
        ),
        array(
            'id'            => 'restan_blog_postExcerpt',
            'type'          => 'slider',
            'title'         => esc_html__('Blog Posts Excerpt', 'restan'),
            'subtitle'      => esc_html__('Control the number of characters you want to show in the blog page for each post.. If you use this option then you can able to control your blog post characters from here ( Default show 10 ).', 'restan'),
            "default"       => 46,
            "min"           => 0,
            "step"          => 1,
            "max"           => 100,
            'resolution'    => 1,
            'display_value' => 'text',
        ),
        array(
            'id'       => 'restan_blog_readmore_setting',
            'type'     => 'button_set',
            'title'    => esc_html__('Read More Text Setting', 'restan'),
            'subtitle' => esc_html__('Control read more text from here.', 'restan'),
            'options'  => array(
                "default"   => esc_html__('Default', 'restan'),
                "custom"    => esc_html__('Custom', 'restan'),
            ),
            'default'  => 'default',
        ),
        array(
            'id'       => 'restan_blog_custom_readmore',
            'type'     => 'text',
            'title'    => esc_html__('Read More Text', 'restan'),
            'subtitle' => esc_html__('Set read moer text here. If you use this option then you will able to set your won text.', 'restan'),
            'required' => array('restan_blog_readmore_setting', 'equals', 'custom')
        ),
        array(
            'id'       => 'restan_blog_title_color',
            'output'   => array('.blog-area .info h3 a'),
            'type'     => 'color',
            'title'    => esc_html__('Blog Title Color', 'restan'),
            'subtitle' => esc_html__('Set Blog Title Color.', 'restan'),
        ),
        array(
            'id'       => 'restan_blog_title_hover_color',
            'output'   => array('.blog-area .info h3 a:hover'),
            'type'     => 'color',
            'title'    => esc_html__('Blog Title Hover Color', 'restan'),
            'subtitle' => esc_html__('Set Blog Title Hover Color.', 'restan'),
        ),
        array(
            'id'       => 'restan_blog_read_more_button_color',
            'type'     => 'color',
            'title'    => esc_html__('Read More Button Color', 'restan'),
            'subtitle' => esc_html__('Set Read More Button Color.', 'restan'),
            'output'  => array('background'   => '.blog-area.full-blog .btn.btn-md')
        ),
        array(
            'id'       => 'restan_blog_read_more_button_hover_color',
            'type'     => 'color',
            'title'    => esc_html__('Read More Button Hover Color', 'restan'),
            'subtitle' => esc_html__('Set Read More Button Hover Color.', 'restan'),
            'output'  => array('background-color'   => '.blog-area.full-blog .btn.btn-theme::after')
        ),
    ),
));

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Single Blog Page', 'restan'),
    'id'         => 'restan_post_detail_styles',
    'subsection' => true,
    'fields'     => array(

        array(
            'id'       => 'restan_blog_single_sidebar',
            'type'     => 'image_select',
            'title'    => esc_html__('Layout', 'restan'),
            'subtitle' => esc_html__('Choose blog single page layout from here. If you use this option then you will able to change three type of blog single page layout ( Default Left Sidebar Layour ). ', 'restan'),
            'options'  => array(
                '1' => array(
                    'alt' => esc_attr__('1 Column', 'restan'),
                    'img' => esc_url(get_template_directory_uri() . '/assets/img/no-sideber.png')
                ),
                '2' => array(
                    'alt' => esc_attr__('2 Column Left', 'restan'),
                    'img' => esc_url(get_template_directory_uri() . '/assets/img/left-sideber.png')
                ),
                '3' => array(
                    'alt' => esc_attr__('2 Column Right', 'restan'),
                    'img' => esc_url(get_template_directory_uri() . '/assets/img/right-sideber.png')
                ),

            ),
            'default'  => '3'
        ),
        array(
            'id'       => 'restan_post_details_title_position',
            'type'     => 'button_set',
            'default'  => 'header',
            'options'  => array(
                'header'        => esc_html__('On Header', 'restan'),
                'below'         => esc_html__('Below Thumbnail', 'restan'),
            ),
            'title'    => esc_html__('Blog Post Title Position', 'restan'),
            'subtitle' => esc_html__('Control blog post title position from here.', 'restan'),
        ),
        array(
            'id'       => 'restan_post_details_custom_title',
            'type'     => 'text',
            'title'    => esc_html__('Blog Details Custom Title', 'restan'),
            'subtitle' => esc_html__('This title will show in Breadcrumb title.', 'restan'),
            'required' => array('restan_post_details_title_position', 'equals', 'below')
        ),
        array(
            'id'       => 'restan_display_post_tags',
            'type'     => 'switch',
            'title'    => esc_html__('Tags', 'restan'),
            'subtitle' => esc_html__('Switch On to Display Tags.', 'restan'),
            'default'  => true,
            'on'        => esc_html__('Enabled', 'restan'),
            'off'       => esc_html__('Disabled', 'restan'),
        ),
        array(
            'id'       => 'restan_post_details_share_options',
            'type'     => 'switch',
            'title'    => esc_html__('Share Options', 'restan'),
            'subtitle' => esc_html__('Control post share options from here. If you use this option then you will able to show or hide post share options.', 'restan'),
            'on'        => esc_html__('Show', 'restan'),
            'off'       => esc_html__('Hide', 'restan'),
            'default'   => '0',
        ),
        array(
            'id'       => 'restan_post_details_author_desc_trigger',
            'type'     => 'switch',
            'title'    => esc_html__('Biography Info', 'restan'),
            'subtitle' => esc_html__('Control biography info from here. If you use this option then you will able to show or hide biography info ( Default setting Show ).', 'restan'),
            'on'        => esc_html__('Show', 'restan'),
            'off'       => esc_html__('Hide', 'restan'),
            'default'   => '0',
        ),
        array(
            'id'       => 'restan_post_details_post_navigation',
            'type'     => 'switch',
            'title'    => esc_html__('Post Navigation', 'restan'),
            'subtitle' => esc_html__('Control post navigation from here. If you use this option then you will able to show or hide post navigation ( Default setting Show ).', 'restan'),
            'on'        => esc_html__('Show', 'restan'),
            'off'       => esc_html__('Hide', 'restan'),
            'default'   => true,
        ),
    )
));

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Meta Data', 'restan'),
    'id'         => 'restan_common_meta_data',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'       => 'restan_blog_meta_icon_color',
            'output'   => array('.blog-area .item .info .meta ul li i'),
            'type'     => 'color',
            'title'    => esc_html__('Blog Meta Icon Color', 'restan'),
            'subtitle' => esc_html__('Set Blog Meta Icon Color.', 'restan'),
        ),
        array(
            'id'       => 'restan_blog_meta_text_color',
            'output'   => array('.blog-area .item .info .meta ul li a'),
            'type'     => 'color',
            'title'    => esc_html__('Blog Meta Text Color', 'restan'),
            'subtitle' => esc_html__('Set Blog Meta Text Color.', 'restan'),
        ),
        array(
            'id'       => 'restan_blog_title_color',
            'output'   => array('.blog-area .item .info h3 a'),
            'type'     => 'color',
            'title'    => esc_html__('Blog Title Color', 'restan'),
            'subtitle' => esc_html__('Set Title Color.', 'restan'),
        ),
        array(
            'id'       => 'restan_blog_content_color',
            'output'   => array('.blog-area .item .info p'),
            'type'     => 'color',
            'title'    => esc_html__('Blog Content Color', 'restan'),
            'subtitle' => esc_html__('Set Content Color.', 'restan'),
        ),
        array(
            'id'       => 'restan_display_post_date',
            'type'     => 'switch',
            'title'    => esc_html__('Post Date', 'restan'),
            'subtitle' => esc_html__('Switch On to Display Post Date.', 'restan'),
            'default'  => true,
            'on'        => esc_html__('Enabled', 'restan'),
            'off'       => esc_html__('Disabled', 'restan'),
        ),
        array(
            'id'       => 'restan_display_admin',
            'type'     => 'switch',
            'title'    => esc_html__('Post Admin', 'restan'),
            'subtitle' => esc_html__('Switch On to Display Post Admin.', 'restan'),
            'default'  => true,
            'on'        => esc_html__('Enabled', 'restan'),
            'off'       => esc_html__('Disabled', 'restan'),
        ),
        array(
            'id'       => 'restan_display_post_views',
            'type'     => 'switch',
            'title'    => esc_html__('Post View Count', 'restan'),
            'subtitle' => esc_html__('Switch On to Display Post View Counter.', 'restan'),
            'default'  => true,
            'on'        => esc_html__('Enabled', 'restan'),
            'off'       => esc_html__('Disabled', 'restan'),
        ),
    )
));

/* Sidebar Start */
Redux::setSection($opt_name, array(
    'title'      => esc_html__('Sidebar Options', 'restan'),
    'id'         => 'restan_sidebar_options',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'      => 'restan_sidebar_bg_color',
            'type'    => 'color',
            'title'   => esc_html__('Widgets Background Color', 'restan'),
            'output'  => array('background'   => '.blog-area .sidebar .sidebar-item')
        ),
        array(
            'id'      => 'restan_sidebar_padding_margin_box_shadow_trigger',
            'type'    => 'switch',
            'title'   => esc_html__('Widgets Custom Box Shadow/Padding/Margin/border', 'restan'),
            'on'      => esc_html__('Show', 'restan'),
            'off'     => esc_html__('Hide', 'restan'),
            'default' => false
        ),
        array(
            'id'      => 'box-shadow',
            'type'    => 'box_shadow',
            'title'   => esc_html__('Box Shadow', 'restan'),
            'units'   => array('px', 'em', 'rem'),
            'output'  => ('.blog-area .sidebar .sidebar-item'),
            'opacity' => true,
            'rgba'    => true,
            'required' => array('restan_sidebar_padding_margin_box_shadow_trigger', 'equals', '1')
        ),
        array(
            'id'      => 'restan_sidebar_widget_margin',
            'type'    => 'spacing',
            'title'   => esc_html__('Widget Margin', 'restan'),
            'units'   => array('em', 'px'),
            'output'  => ('.blog-area .sidebar .sidebar-item'),
            'mode'    => 'margin',
            'required' => array('restan_sidebar_padding_margin_box_shadow_trigger', 'equals', '1')
        ),
        array(
            'id'      => 'restan_sidebar_widget_padding',
            'type'    => 'spacing',
            'title'   => esc_html__('Widget Padding', 'restan'),
            'units'   => array('em', 'px'),
            'output'  => ('.blog-area .sidebar .sidebar-item'),
            'mode'    => 'padding',
            'required' => array('restan_sidebar_padding_margin_box_shadow_trigger', 'equals', '1')
        ),
        array(
            'id'      => 'restan_sidebar_widget_border',
            'type'    => 'border',
            'title'   => esc_html__('Widget Border', 'restan'),
            'units'   => array('em', 'px'),
            'output'  => ('.blog-area .sidebar .sidebar-item'),
            'all'     => false,
            'required' => array('restan_sidebar_padding_margin_box_shadow_trigger', 'equals', '1')
        ),
        array(
            'id'      => 'restan_sidebar_widget_title_heading_tag',
            'type'     => 'select',
            'options'  => array(
                'h1'        => esc_html__('H1', 'restan'),
                'h2'        => esc_html__('H2', 'restan'),
                'h3'        => esc_html__('H3', 'restan'),
                'h4'        => esc_html__('H4', 'restan'),
                'h5'        => esc_html__('H5', 'restan'),
                'h6'        => esc_html__('H6', 'restan'),
            ),
            'default'  => 'h4',
            'title'   => esc_html__('Widget Title Tag', 'restan'),
        ),
        array(
            'id'      => 'restan_sidebar_widget_title_margin',
            'type'    => 'spacing',
            'title'   => esc_html__('Widget Title Margin', 'restan'),
            'mode'    => 'margin',
            'output'  => array('.blog-sidebar .widget .widget_title'),
            'units'   => array('em', 'px'),
        ),
        array(
            'id'      => 'restan_sidebar_widget_title_padding',
            'type'    => 'spacing',
            'title'   => esc_html__('Widget Title Padding', 'restan'),
            'mode'    => 'padding',
            'output'  => array('.blog-sidebar .widget .widget_title'),
            'units'   => array('em', 'px'),
        ),
        array(
            'id'       => 'restan_sidebar_widget_title_color',
            'output'   =>  array('.blog-area .sidebar h1,.blog-area .sidebar h2,.blog-area .sidebar h3,.blog-area .sidebar h4,.blog-area .sidebar h5,.blog-area .sidebar h6,.widget_block.widget_search form label'),
            'type'     => 'color',
            'title'    => esc_html__('Widget Title Color', 'restan'),
            'subtitle' => esc_html__('Set Widget Title Color.', 'restan'),
        )
    )
));
/* Sidebar End */

/* End blog Page */

// -> START Page Option
Redux::setSection($opt_name, array(
    'title'      => esc_html__('Page', 'restan'),
    'id'         => 'restan_page_page',
    'icon'  => 'el el-file',
    'fields'     => array(
        array(
            'id'       => 'restan_page_sidebar',
            'type'     => 'image_select',
            'title'    => esc_html__('Select layout', 'restan'),
            'subtitle' => esc_html__('Choose your page layout. If you use this option then you will able to choose three type of page layout ( Default no sidebar ). ', 'restan'),
            //Must provide key => value(array:title|img) pairs for radio options
            'options'  => array(
                '1' => array(
                    'alt' => esc_attr__('1 Column', 'restan'),
                    'img' => esc_url(get_template_directory_uri() . '/assets/img/no-sideber.png')
                ),
                '2' => array(
                    'alt' => esc_attr__('2 Column Left', 'restan'),
                    'img' => esc_url(get_template_directory_uri() . '/assets/img/left-sideber.png')
                ),
                '3' => array(
                    'alt' => esc_attr__('2 Column Right', 'restan'),
                    'img' => esc_url(get_template_directory_uri() . '/assets/img/right-sideber.png')
                ),

            ),
            'default'  => '1'
        ),
        array(
            'id'       => 'restan_page_layoutopt',
            'type'     => 'button_set',
            'title'    => esc_html__('Sidebar Settings', 'restan'),
            'subtitle' => esc_html__('Set page sidebar. If you use this option then you will able to set three type of sidebar ( Default no sidebar ).', 'restan'),
            //Must provide key => value pairs for options
            'options' => array(
                '1' => esc_html__('Page Sidebar', 'restan'),
                '2' => esc_html__('Blog Sidebar', 'restan')
            ),
            'default' => '1',
            'required'  => array('restan_page_sidebar', '!=', '1')
        ),
        array(
            'id'       => 'restan_page_title_switcher',
            'type'     => 'switch',
            'title'    => esc_html__('Title', 'restan'),
            'subtitle' => esc_html__('Switch enabled to display page title. Fot this option you will able to show / hide page title.  Default setting Enabled', 'restan'),
            'default'  => '1',
            'on'        => esc_html__('Enabled', 'restan'),
            'off'       => esc_html__('Disabled', 'restan'),
        ),
        array(
            'id'       => 'restan_page_title_tag',
            'type'     => 'select',
            'options'  => array(
                'h1'        => esc_html__('H1', 'restan'),
                'h2'        => esc_html__('H2', 'restan'),
                'h3'        => esc_html__('H3', 'restan'),
                'h4'        => esc_html__('H4', 'restan'),
                'h5'        => esc_html__('H5', 'restan'),
                'h6'        => esc_html__('H6', 'restan'),
            ),
            'default'  => 'h1',
            'title'    => esc_html__('Title Tag', 'restan'),
            'subtitle' => esc_html__('Select page title tag. If you use this option then you can able to change title tag H1 - H6 ( Default tag H1 )', 'restan'),
            'required' => array("restan_page_title_switcher", "equals", "1")
        ),
        array(
            'id'       => 'restan_allHeader_title_color',
            'type'     => 'color',
            'title'    => esc_html__('Title Color', 'restan'),
            'subtitle' => esc_html__('Set Title Color', 'restan'),
            'output'   => array('color' => '.breadcumb-title'),
        ),
        array(
            'id'       => 'restan_allHeader_bg',
            'type'     => 'background',
            'title'    => esc_html__('Background', 'restan'),
            'output'   => array('.breadcrumb-area'),
            'subtitle' => esc_html__('Setting page header background. If you use this option then you will able to set Background Color, Background Image, Background Repeat, Background Size, Background Attachment, Background Position.', 'restan'),
        ),
        array(
            'id'       => 'restan_allHeader_shape',
            'type'     => 'media',
            'title'    => esc_html__('Background Shape', 'restan'),
            'subtitle' => esc_html__('Setting page header shape.', 'restan'),
        ),
        array(
            'id'       => 'restan_enable_breadcrumb',
            'type'     => 'switch',
            'title'    => esc_html__('Breadcrumb Hide/Show', 'restan'),
            'subtitle' => esc_html__('Hide / Show breadcrumb from all pages and posts ( Default settings hide ).', 'restan'),
            'default'  => '1',
            'on'       => 'Show',
            'off'      => 'Hide',
        ),
        array(
            'id'       => 'restan_allHeader_breadcrumbtextcolor',
            'type'     => 'color',
            'title'    => esc_html__('Breadcrumb Color', 'restan'),
            'subtitle' => esc_html__('Choose page header breadcrumb text color here.If you user this option then you will able to set page breadcrumb color.', 'restan'),
            'required' => array("restan_page_title_switcher", "equals", "1"),
            'output'   => array('color' => '.breadcrumb-area .breadcrumb a, .breadcrumb-area .breadcrumb li'),
        ),
        array(
            'id'       => 'restan_allHeader_breadcrumbtextactivecolor',
            'type'     => 'color',
            'title'    => esc_html__('Breadcrumb Active Color', 'restan'),
            'subtitle' => esc_html__('Choose page header breadcrumb text active color here.If you user this option then you will able to set page breadcrumb active color.', 'restan'),
            'required' => array("restan_page_title_switcher", "equals", "1"),
            'output'   => array('color' => '.breadcrumb-area .breadcrumb li.active'),
        ),
        array(
            'id'       => 'restan_allHeader_dividercolor',
            'type'     => 'color',
            'output'   => array('background' => '.breadcrumb-area .breadcrumb li::after'),
            'title'    => esc_html__('Breadcrumb Divider Color', 'restan'),
            'subtitle' => esc_html__('Choose breadcrumb divider color.', 'restan'),
        ),
    ),
));
/* End Page option */

// -> START 404 Page

Redux::setSection($opt_name, array(
    'title'      => esc_html__('404 Page', 'restan'),
    'id'         => 'restan_404_page',
    'icon'       => 'el el-ban-circle',
    'fields'     => array(
        array(
            'id'       => 'restan_fof_title',
            'type'     => 'text',
            'title'    => esc_html__('Page Title', 'restan'),
            'subtitle' => esc_html__('Set Page Title', 'restan'),
            'default'  => esc_html__('404', 'restan'),
        ),
        array(
            'id'       => 'restan_fof_subtitle',
            'type'     => 'text',
            'title'    => esc_html__('Page Subtitle', 'restan'),
            'subtitle' => esc_html__('Set Page Subtitle ', 'restan'),
            'default'  => esc_html__('Oops! That page can\'t be found.', 'restan'),
        ),
        array(
            'id'       => 'restan_fof_description',
            'type'     => 'text',
            'title'    => esc_html__('Page Description', 'restan'),
            'subtitle' => esc_html__('Set Page Subtitle ', 'restan'),
            'default'  => esc_html__('Unfortunately, something went wrong and this page does not exist. Try using the search or return to the previous page.', 'restan'),
        ),
        array(
            'id'       => 'restan_fof_btn_text',
            'type'     => 'text',
            'title'    => esc_html__('Button Text', 'restan'),
            'subtitle' => esc_html__('Set Button Text ', 'restan'),
            'default'  => esc_html__('Return To Home', 'restan'),
        ),
        array(
            'id'       => 'restan_fof_text_color',
            'type'     => 'color',
            'output'   => array('.error-page-area .error-box h1'),
            'title'    => esc_html__('Title Color', 'restan'),
            'subtitle' => esc_html__('Pick a title color', 'restan'),
            'validate' => 'color'
        ),
        array(
            'id'       => 'restan_fof_subtitle_color',
            'type'     => 'color',
            'output'   => array('.error-page-area .error-box h2'),
            'title'    => esc_html__('Subtitle Color', 'restan'),
            'subtitle' => esc_html__('Pick a subtitle color', 'restan'),
            'validate' => 'color'
        ),
        array(
            'id'       => 'restan_404_shape_one',
            'type'     => 'media',
            'title'    => esc_html__('Background Shape One', 'restan'),
            'subtitle' => esc_html__('404 page shape one', 'restan'),
        ),
        array(
            'id'       => 'restan_404_shape_two',
            'type'     => 'media',
            'title'    => esc_html__('Background Shape Two', 'restan'),
            'subtitle' => esc_html__('404 page shape one', 'restan'),
        ),
    ),
));

// -> START Gallery
Redux::setSection($opt_name, array(
    'title'      => esc_html__('Gallery', 'restan'),
    'id'         => 'restan_gallery_widget',
    'icon'       => 'el el-gift',
    'fields'     => array(
        array(
            'id'          => 'restan_gallery_image_widget',
            'type'        => 'slides',
            'title'       => esc_html__('Add Gallery Image', 'restan'),
            'subtitle'    => esc_html__('Add gallery Image and url.', 'restan'),
            'show'        => array(
                'title'          => false,
                'description'    => false,
                'progress'       => false,
                'icon'           => false,
                'facts-number'   => false,
                'facts-title1'   => false,
                'facts-title2'   => false,
                'facts-number-2' => false,
                'facts-title3'   => false,
                'facts-number-3' => false,
                'url'            => true,
                'project-button' => false,
                'image_upload'   => true,
            ),
        ),
    ),
));
// -> START Subscribe
Redux::setSection($opt_name, array(
    'title'      => esc_html__('Subscribe', 'restan'),
    'id'         => 'restan_subscribe_page',
    'icon'       => 'el el-eject',
    'fields'     => array(

        array(
            'id'       => 'restan_subscribe_apikey',
            'type'     => 'text',
            'title'    => esc_html__('Mailchimp API Key', 'restan'),
            'subtitle' => esc_html__('Set mailchimp api key.', 'restan'),
        ),
        array(
            'id'       => 'restan_subscribe_listid',
            'type'     => 'text',
            'title'    => esc_html__('Mailchimp List ID', 'restan'),
            'subtitle' => esc_html__('Set mailchimp list id.', 'restan'),
        ),
    ),
));

/* End Subscribe */

// -> START Social Media

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Social', 'restan'),
    'id'         => 'restan_social_media',
    'icon'      => 'el el-globe',
    'desc'      => esc_html__('Social', 'restan'),
    'fields'     => array(
        array(
            'id'          => 'restan_social_links',
            'type'        => 'slides',
            'title'       => esc_html__('Social Profile Links', 'restan'),
            'subtitle'    => esc_html__('Add social icon and url.', 'restan'),
            'show'        => array(
                'title'          => true,
                'description'    => true,
                'progress'       => false,
                'facts-number'   => false,
                'facts-title1'   => false,
                'facts-title2'   => false,
                'facts-number-2' => false,
                'facts-title3'   => false,
                'facts-number-3' => false,
                'url'            => true,
                'project-button' => false,
                'image_upload'   => false,
            ),
            'placeholder'   => array(
                'icon'          => esc_html__('Icon (example: fa fa-facebook) ', 'restan'),
                'title'         => esc_html__('Social Icon Class', 'restan'),
                'description'   => esc_html__('Social Icon Title', 'restan'),
            ),
        ),
    ),
));

/* End social Media */


// -> START Footer Media
Redux::setSection($opt_name, array(
    'title'            => esc_html__('Footer', 'restan'),
    'id'               => 'restan_footer',
    'desc'             => esc_html__('restan Footer', 'restan'),
    'customizer_width' => '400px',
    'icon'              => 'el el-photo',
));

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Pre-built Footer / Footer Builder', 'restan'),
    'id'         => 'restan_footer_section',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'       => 'restan_footer_builder_trigger',
            'type'     => 'button_set',
            'default'  => 'prebuilt',
            'options'  => array(
                'footer_builder'        => esc_html__('Footer Builder', 'restan'),
                'prebuilt'              => esc_html__('Pre-built Footer', 'restan'),
            ),
            'title'    => esc_html__('Footer Builder', 'restan'),
        ),
        array(
            'id'       => 'restan_footer_builder_select',
            'type'     => 'select',
            'required' => array('restan_footer_builder_trigger', 'equals', 'footer_builder'),
            'data'     => 'posts',
            'args'     => array(
                'post_type'     => 'restan_footer'
            ),
            'on'       => esc_html__('Enabled', 'restan'),
            'off'      => esc_html__('Disable', 'restan'),
            'title'    => esc_html__('Select Footer', 'restan'),
            'subtitle' => esc_html__('First make your footer from footer custom types then select it from here.', 'restan')
        ),
        array(
            'id'       => 'restan_footerwidget_enable',
            'type'     => 'switch',
            'title'    => esc_html__('Footer Widget', 'restan'),
            'default'  => 0,
            'on'       => esc_html__('Enabled', 'restan'),
            'off'      => esc_html__('Disable', 'restan'),
            'required' => array('restan_footer_builder_trigger', 'equals', 'prebuilt'),
        ),
        array(
            'id'       => 'restan_footer_background',
            'type'     => 'background',
            'default'  => '#202942',
            'title'    => esc_html__('Footer Background', 'restan'),
            'subtitle' => esc_html__('Set footer background.', 'restan'),
            'output'   => array('.footer-custom-style'),
            'required' => array('restan_footerwidget_enable', '=', '1'),
        ),
        array(
            'id'       => 'restan_footer_background2',
            'type'     => 'color',
            'title'    => esc_html__('End Footer Background', 'restan'),
            'required' => array('restan_footerwidget_enable', '=', '1'),
            'output'   => array('background'   =>   'footer .f-items .f-item.contact-widget::after'),
        ),
        array(
            'id'       => 'restan_footer_widget_title_color',
            'type'     => 'color',
            'title'    => esc_html__('Footer Widget Title Color', 'restan'),
            'required' => array('restan_footerwidget_enable', '=', '1'),
            'output'   => array('.footer-custom-style h4'),
        ),
        array(
            'id'       => 'restan_footer_widget_anchor_color',
            'type'     => 'color',
            'title'    => esc_html__('Footer Widget Anchor Color', 'restan'),
            'required' => array('restan_footerwidget_enable', '=', '1'),
            'output'   => array('.footer-custom-style a'),
        ),
        array(
            'id'       => 'restan_footer_widget_anchor_hov_color',
            'type'     => 'color',
            'title'    => esc_html__('Footer Widget Anchor Hover Color', 'restan'),
            'required' => array('restan_footerwidget_enable', '=', '1'),
            'output'   => array('.footer-layout4 .footer-wid-wrap .widget_contact p a:hover,.footer-layout4 .footer-wid-wrap .widget-links ul li a:hover'),
        ),
        array(
            'id'       => 'restan_disable_footer_bottom',
            'type'     => 'switch',
            'title'    => esc_html__('Footer Bottom?', 'restan'),
            'default'  => 1,
            'on'       => esc_html__('Enabled', 'restan'),
            'off'      => esc_html__('Disable', 'restan'),
            'required' => array('restan_footer_builder_trigger', 'equals', 'prebuilt'),
        ),
        array(
            'id'       => 'restan_footer_bottom_background',
            'type'     => 'color',
            'title'    => esc_html__('Footer Bottom Background Color', 'restan'),
            'required' => array('restan_disable_footer_bottom', '=', '1'),
            'output'   => array('background-color'   =>   '.footer-bottom'),
        ),
        array(
            'id'       => 'restan_copyright_text',
            'type'     => 'text',
            'title'    => esc_html__('Copyright Text', 'restan'),
            'subtitle' => esc_html__('Add Copyright Text', 'restan'),
            'default'  => sprintf('Copyright <i class="fal fa-copyright"></i> %s <a href="%s">%s</a> All Rights Reserved by <a href="%s">%s</a>', date('Y'), esc_url('#'), __('restan.', 'restan'), esc_url('#'), __('Validthemes', 'restan')),
            'required' => array('restan_disable_footer_bottom', 'equals', '1'),
        ),
        array(
            'id'       => 'restan_footer_copyright_color',
            'type'     => 'color',
            'title'    => esc_html__('Footer Copyright Text Color', 'restan'),
            'subtitle' => esc_html__('Set footer copyright text color', 'restan'),
            'required' => array('restan_disable_footer_bottom', 'equals', '1'),
            'output'   => array('footer .footer-bottom p'),
        ),
        array(
            'id'       => 'restan_footer_copyright_acolor',
            'type'     => 'color',
            'title'    => esc_html__('Footer Copyright Ancor Color', 'restan'),
            'subtitle' => esc_html__('Set footer copyright ancor color', 'restan'),
            'required' => array('restan_disable_footer_bottom', 'equals', '1'),
            'output'   => array('footer .footer-bottom p a'),
        ),
        array(
            'id'       => 'restan_footer_copyright_a_hover_color',
            'type'     => 'color',
            'title'    => esc_html__('Footer Copyright Ancor Hover Color', 'restan'),
            'subtitle' => esc_html__('Set footer copyright ancor Hover color', 'restan'),
            'required' => array('restan_disable_footer_bottom', 'equals', '1'),
            'output'   => array('footer .footer-bottom p a:hover'),
        ),

    ),
));


/* End Footer Media */

// -> START Custom Css
Redux::setSection($opt_name, array(
    'title'      => esc_html__('Custom Css', 'restan'),
    'id'         => 'restan_custom_css_section',
    'icon'  => 'el el-css',
    'fields'     => array(
        array(
            'id'       => 'restan_css_editor',
            'type'     => 'ace_editor',
            'title'    => esc_html__('CSS Code', 'restan'),
            'subtitle' => esc_html__('Paste your CSS code here.', 'restan'),
            'mode'     => 'css',
            'theme'    => 'monokai',
        )
    ),
));

/* End custom css */



if (file_exists(dirname(__FILE__) . '/../README.md')) {
    $section = array(
        'icon'   => 'el el-list-alt',
        'title'  => __('Documentation', 'restan'),
        'fields' => array(
            array(
                'id'       => '17',
                'type'     => 'raw',
                'markdown' => true,
                'content_path' => dirname(__FILE__) . '/../README.md', // FULL PATH, not relative please
                //'content' => 'Raw content here',
            ),
        ),
    );
    Redux::setSection($opt_name, $section);
}
/*
     * <--- END SECTIONS
     */


/*
     *
     * YOU MUST PREFIX THE FUNCTIONS BELOW AND ACTION FUNCTION CALLS OR ANY OTHER CONFIG MAY OVERRIDE YOUR CODE.
     *
     */

/**
 * This is a test function that will let you see when the compiler hook occurs.
 * It only runs if a field    set with compiler=>true is changed.
 * */
if (!function_exists('compiler_action')) {
    function compiler_action($options, $css, $changed_values)
    {
        echo '<h1>The compiler hook has run!</h1>';
        echo "<pre>";
        print_r($changed_values); // Values that have changed since the last save
        echo "</pre>";
    }
}

/**
 * Custom function for the callback validation referenced above
 * */
if (!function_exists('redux_validate_callback_function')) {
    function redux_validate_callback_function($field, $value, $existing_value)
    {
        $error   = false;
        $warning = false;

        //do your validation
        if ($value == 1) {
            $error = true;
            $value = $existing_value;
        } elseif ($value == 2) {
            $warning = true;
            $value   = $existing_value;
        }

        $return['value'] = $value;

        if ($error == true) {
            $field['msg']    = 'your custom error message';
            $return['error'] = $field;
        }

        if ($warning == true) {
            $field['msg']      = 'your custom warning message';
            $return['warning'] = $field;
        }

        return $return;
    }
}

/**
 * Custom function for the callback referenced above
 */
if (!function_exists('redux_my_custom_field')) {
    function redux_my_custom_field($field, $value)
    {
        print_r($field);
        echo '<br/>';
        print_r($value);
    }
}

/**
 * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
 * Simply include this function in the child themes functions.php file.
 * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
 * so you must use get_template_directory_uri() if you want to use any of the built in icons
 * */
if (!function_exists('dynamic_section')) {
    function dynamic_section($sections)
    {
        //$sections = array();
        $sections[] = array(
            'title'  => __('Section via hook', 'restan'),
            'desc'   => __('<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'restan'),
            'icon'   => 'el el-paper-clip',
            // Leave this as a blank section, no options just some intro text set above.
            'fields' => array()
        );

        return $sections;
    }
}

/**
 * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
 * */
if (!function_exists('change_arguments')) {
    function change_arguments($args)
    {
        //$args['dev_mode'] = true;

        return $args;
    }
}

/**
 * Filter hook for filtering the default value of any given field. Very useful in development mode.
 * */
if (!function_exists('change_defaults')) {
    function change_defaults($defaults)
    {
        $defaults['str_replace'] = 'Testing filter hook!';

        return $defaults;
    }
}
