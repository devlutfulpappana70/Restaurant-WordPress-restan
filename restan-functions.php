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

// theme option callback
function restan_opt($id = null, $url = null)
{
    global $restan_opt;

    if ($id && $url) {

        if (isset($restan_opt[$id][$url]) && $restan_opt[$id][$url]) {
            return $restan_opt[$id][$url];
        }
    } else {
        if (isset($restan_opt[$id])  && $restan_opt[$id]) {
            return $restan_opt[$id];
        }
    }
}


// theme logo withour moble device

function restan_theme_logo()
{
    // escaping allow html
    $allowhtml = array(
        'a'    => array(
            'href' => array()
        ),
        'span' => array(),
        'i'    => array(
            'class' => array()
        )
    );
    $siteUrl = home_url('/');
    if (has_custom_logo()) {
        $custom_logo_id = get_theme_mod('custom_logo');
        $siteLogo = '';
        $siteLogo .= '<a class="logo" href="' . esc_url($siteUrl) . '">';
        $siteLogo .= restan_img_tag(array(
            "class" => "img-fluid",
            "url"   => esc_url(wp_get_attachment_image_url($custom_logo_id, 'full'))
        ));
        $siteLogo .= '</a>';

        return $siteLogo;
    } elseif (!restan_opt('restan_text_title') && restan_opt('restan_site_logo', 'url')) {

        $siteLogo = '<img class="logo" src="' . esc_url(restan_opt('restan_site_logo', 'url')) . '" alt="' . esc_attr(get_bloginfo('name')) . '" />';
        return '<a class="navbar-brand" href="' . esc_url($siteUrl) . '">' . $siteLogo . '</a>';
    } elseif (restan_opt('restan_text_title')) {
        return '<h2 class="logo-text"><a class="logo" href="' . esc_url($siteUrl) . '">' . wp_kses(restan_opt('restan_text_title'), $allowhtml) . '</a></h2>';
    } else {
        return '<h2 class="logo-text"><a class="logo" href="' . esc_url($siteUrl) . '">' . esc_html(get_bloginfo('name')) . '</a></h2>';
    }
}

// theme logo for mobile device
function restan_mobile_theme_logo()
{
    // escaping allow html
    $allowhtml = array(
        'a'    => array(
            'href' => array()
        ),
        'span' => array(),
        'i'    => array(
            'class' => array()
        )
    );
    $siteUrl = home_url('/');
    if (has_custom_logo()) {
        $custom_logo_id = get_theme_mod('custom_logo');
        $siteLogo = '';
        $siteLogo .= '<a class="logo" href="' . esc_url($siteUrl) . '">';
        $siteLogo .= restan_img_tag(array(
            "class" => "img-fluid",
            "url"   => esc_url(wp_get_attachment_image_url($custom_logo_id, 'full'))
        ));
        $siteLogo .= '</a>';

        return $siteLogo;
    } elseif (!restan_opt('restan_text_title') && restan_opt('restan_site_logo', 'url')) {

        $siteLogo = '<img class="logo" src="' . esc_url(restan_opt('restan_site_logo', 'url')) . '" alt="' . esc_attr(get_bloginfo('name')) . '" />';
        return '<a class="mob-logo" href="' . esc_url($siteUrl) . '">' . $siteLogo . '</a>';
    } elseif (restan_opt('restan_text_title')) {
        return '<h2 class="logo-text"><a class="logo" href="' . esc_url($siteUrl) . '">' . wp_kses(restan_opt('restan_text_title'), $allowhtml) . '</a></h2>';
    } else {
        return '<h2 class="logo-text"><a class="logo" href="' . esc_url($siteUrl) . '">' . esc_html(get_bloginfo('name')) . '</a></h2>';
    }
}
// custom meta id callback
function restan_meta($id = '')
{
    $value = get_post_meta(get_the_ID(), '_restan_' . $id, true);
    return $value;
}


// Blog Date Permalink
function restan_blog_date_permalink()
{
    $year  = get_the_time('Y');
    $month_link = get_the_time('m');
    $day   = get_the_time('d');
    $link = get_day_link($year, $month_link, $day);
    return $link;
}

//audio format iframe match
function restan_iframe_match()
{
    $audio_content = restan_embedded_media(array('audio', 'iframe'));
    $iframe_match = preg_match("/\iframe\b/i", $audio_content, $match);
    return $iframe_match;
}


//Post embedded media
function restan_embedded_media($type = array())
{
    $content = do_shortcode(apply_filters('the_content', get_the_content()));
    $embed   = get_media_embedded_in_content($content, $type);


    if (in_array('audio', $type)) {
        if (count($embed) > 0) {
            $output = str_replace('?visual=true', '?visual=false', $embed[0]);
        } else {
            $output = '';
        }
    } else {
        if (count($embed) > 0) {
            $output = $embed[0];
        } else {
            $output = '';
        }
    }
    return $output;
}


// WP post link pages
function restan_link_pages()
{
    wp_link_pages(array(
        'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__('Pages:', 'restan') . '</span>',
        'after'       => '</div>',
        'link_before' => '<span>',
        'link_after'  => '</span>',
        'pagelink'    => '<span class="screen-reader-text">' . esc_html__('Page', 'restan') . ' </span>%',
        'separator'   => '<span class="screen-reader-text">, </span>',
    ));
}

// image alt tag
function restan_image_alt($url = '')
{
    if ($url != '') {
        // attachment id by url
        $attachmentid = attachment_url_to_postid(esc_url($url));
        // attachment alt tag
        $image_alt = get_post_meta(esc_html($attachmentid), '_wp_attachment_image_alt', true);
        if ($image_alt) {
            return $image_alt;
        } else {
            $filename = pathinfo(esc_url($url));
            $alt = str_replace('-', ' ', $filename['filename']);
            return $alt;
        }
    } else {
        return;
    }
}


// Flat Content wysiwyg output with meta key and post id

function restan_get_textareahtml_output($content)
{
    global $wp_embed;

    $content = $wp_embed->autoembed($content);
    $content = $wp_embed->run_shortcode($content);
    $content = wpautop($content);
    $content = do_shortcode($content);

    return $content;
}

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */

function restan_pingback_header()
{
    if (is_singular() && pings_open()) {
        echo '<link rel="pingback" href="', esc_url(get_bloginfo('pingback_url')), '">';
    }
}
add_action('wp_head', 'restan_pingback_header');


// Excerpt More
function restan_excerpt_more($more)
{
    return '...';
}

add_filter('excerpt_more', 'restan_excerpt_more');


// restan comment template callback
function restan_comment_callback($comment, $args, $depth)
{

    $GLOBALS['comment'] = $comment; ?>

<div class="comment-item" id="comment-<?php comment_ID(); ?>">
    <?php if ($avarta = get_avatar($comment)) :
            printf('<div class="avatar">%1$s</div>', $avarta);
        endif; ?>
    <div class='content'>
        <div class="title">
            <?php
                if ($comment->user_id != '0') {
                    printf('<h5>%1$s</h5>', get_user_meta($comment->user_id, 'nickname', true));
                } else {
                    printf('<h5>%1$s</h5>', get_comment_author_link());
                }
                ?>
            <span><?php echo get_comment_date('j M Y'); ?></span>
            <span><?php $edit_reply_text = esc_html__('Edit', 'restan');
                        edit_comment_link('<i class="fal fa-pencil"></i>' . $edit_reply_text, '  ', ''); ?></span>
        </div>

        <?php comment_text() ?>
        <div class='comments-info'>
            <?php if ($comment->comment_approved == '0') : ?>
            <span class="unapproved"><?php esc_html_e('Your comment is awaiting moderation.', 'restan'); ?></span>
            <?php endif; ?>
            <?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth'], 'reply_text' => '<i class="fa fa-reply"></i>Reply'))) ?>
        </div>

    </div>
</div>
<?php
}

//body class
add_filter('body_class', 'restan_body_class');
function restan_body_class($classes)
{
    if (class_exists('ReduxFramework')) {
        $restan_blog_single_sidebar = restan_opt('restan_blog_single_sidebar');


        if (is_active_sidebar('restan-blog-sidebar')) {
            if ($restan_blog_single_sidebar == '2') {
                $classes[] = 'left-sidebar';
            } elseif ($restan_blog_single_sidebar == '3') {
                $classes[] = 'right-sidebar';
            } else {
                $classes[] = 'blog-standard';
            }
        } else {
            $classes[] = 'blog-standard';
        }

        $page_variant = get_post_meta(get_the_id(), '_restan_page_variant', true);

        if ($page_variant == '1') {
            $classes[] = 'color-style-two';
        } elseif ($page_variant == '2') {
            $classes[] = 'bg-dark';
        } elseif ($page_variant == '3') {
            $classes[] = 'color-style-two bg-dark';
        } else {
            $classes[] = '';
        }
    } else {
        if (!is_active_sidebar('restan-blog-sidebar')) {
            $classes[] = 'blog-standard';
        } else {
            $classes[] = 'right-sidebar';
        }
    }
    return $classes;
}


function restan_kses_allowed_html($tags, $context)
{
    switch ($context) {
        case 'restan_allowed_tags':
            $tags = array(
                'a' => array('href' => array(), 'class' => array()),
                'b' => array(),
                'br' => array(),
                'span' => array('class' => array(), 'data-count' => array()),
                'del' => array('class' => array(), 'data-count' => array()),
                'ins' => array('class' => array(), 'data-count' => array()),
                'bdi' => array('class' => array(), 'data-count' => array()),
                'img' => array('class' => array()),
                'i' => array('class' => array()),
                'p' => array('class' => array()),
                'ul' => array('class' => array()),
                'li' => array('class' => array()),
                'div' => array('class' => array()),
                'strong' => array(),
                'sup' => array(),
                'sub' => array(),
                'h5' => array(),
            );
            return $tags;
        default:
            return $tags;
    }
}

add_filter('wp_kses_allowed_html', 'restan_kses_allowed_html', 10, 2);




function restan_footer_global_option()
{

    // restan Footer Bottom Enable Disable
    if (class_exists('ReduxFramework')) {
        $restan_footer_bottom_active = restan_opt('restan_disable_footer_bottom');
    } else {
        $restan_footer_bottom_active = '1';
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
    );
    echo '<footer class="text-light footer-custom-style">';
    if ((is_active_sidebar('restan-footer-1') || is_active_sidebar('restan-footer-2') || is_active_sidebar('restan-footer-3') || is_active_sidebar('restan-footer-4'))) {
        echo '<div class="container">';
        echo '<div class="f-items default-padding">';
        echo '<div class="row">';
        if (is_active_sidebar('restan-footer-1')) {
            dynamic_sidebar('restan-footer-1');
        }
        if (is_active_sidebar('restan-footer-2')) {
            dynamic_sidebar('restan-footer-2');
        }
        if (is_active_sidebar('restan-footer-3')) {
            dynamic_sidebar('restan-footer-3');
        }
        if (is_active_sidebar('restan-footer-4')) {
            dynamic_sidebar('restan-footer-4');
        }
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
    if ($restan_footer_bottom_active == '1') {
        if (!empty(restan_opt('restan_copyright_text'))) {
            echo '<!-- Start Footer Bottom -->';
            echo '<div class="footer-bottom">';
            echo '<div class="container">';
            echo '<div class="row">';
            echo '<div class="col-lg-6">';
            echo '<p class="text-start">' . wp_kses(restan_opt('restan_copyright_text'), $allowhtml) . '</p>';
            echo '</div>';
            if (has_nav_menu('footer-menu')) {
                echo '<div class="col-lg-6 text-end link">';
                wp_nav_menu(array(
                    'theme_location'  => 'footer-menu',
                ));

                echo '</div>';
            }
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '<!-- End Footer Bottom -->';
        }
    }
    echo '</footer>';
}

function restan_social_icon()
{
    $restan_social_icon = restan_opt('restan_social_links');
    if (!empty($restan_social_icon) && isset($restan_social_icon)) {
        foreach ($restan_social_icon as $social_icon) {
            if (!empty($social_icon['title'])) {
                echo '<a href="' . esc_url($social_icon['url']) . '"><i class="' . esc_attr($social_icon['title']) . '"></i>' . esc_html($social_icon['description']) . '</a>';
            }
        }
    }
}

// global header
function restan_global_header_option()
{

    echo '<header>';
    echo '<!-- Start Navigation -->';
    echo '<nav class="navbar mobile-sidenav inc-shape navbar-common navbar-sticky navbar-default validnavs">';

    echo '<!-- Start Top Search -->';
    echo '<div class="top-search">';
    echo '<div class="container-xl">';
    echo '<div class="input-group">';
    echo '<span class="input-group-addon"><i class="fa fa-search"></i></span>';
    echo '<input type="text" class="form-control" placeholder="Search">';
    echo '<span class="input-group-addon close-search"><i class="fa fa-times"></i></span>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '<!-- End Top Search -->';

    echo '<div class="container d-flex justify-content-between align-items-center">   ';


    echo '<!-- Start Header Navigation -->';
    echo '<div class="navbar-header">';
    echo '<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">';
    echo '<i class="fa fa-bars"></i>';
    echo '</button>';
    echo restan_theme_logo();
    echo '</div>';
    echo '<!-- End Header Navigation -->';

    echo '<!-- Main Nav -->';
    echo '<div class="main-nav-content">';
    echo '<!-- Collect the nav links, forms, and other content for toggling -->';
    echo '<div class="collapse navbar-collapse" id="navbar-menu">';

    echo restan_mobile_theme_logo();
    echo '<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">';
    echo '<i class="fa fa-times"></i>';
    echo '</button>';

    if (has_nav_menu('primary-menu')) {
        wp_nav_menu(array(
            'theme_location'  => 'primary-menu',
            'container'       => 'ul',
            'menu_class'      => 'nav navbar-nav navbar-right',
            'fallback_cb'     => 'restan_Bootstrap_Navwalker::fallback',
            'items_wrap'      => '<ul data-in="fadeInDown" data-out="fadeOutUp" class="%2$s" id="%1$s">%3$s</ul>',
            'walker'          => new restan_Bootstrap_Navwalker(),
        ));
    }
    echo '</div><!-- /.navbar-collapse -->';

    echo '<!-- Overlay screen for menu -->';
    echo '<div class="overlay-screen"></div>';
    echo '<!-- End Overlay screen for menu -->';

    echo '</div>';
    echo '<!-- Main Nav -->';

    echo '</div>   ';
    echo '</nav>';
    echo '<!-- End Navigation -->';
    echo '</header>';
}

//Fire the wp_body_open action.
if (!function_exists('wp_body_open')) {
    function wp_body_open()
    {
        do_action('wp_body_open');
    }
}

//Remove Tag-Clouds inline style
add_filter('wp_generate_tag_cloud', 'restan_remove_tagcloud_inline_style', 10, 1);
function restan_remove_tagcloud_inline_style($input)
{
    return preg_replace('/ style=("|\')(.*?)("|\')/', '', $input);
}

function restan_setPostViews($postID)
{
    $count_key  = 'post_views_count';
    $count      = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    } else {
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

function restan_getPostViews($postID)
{
    $count_key  = 'post_views_count';
    $count      = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return __('0', 'restan');
    }
    return $count;
}

// password protected form
add_filter('the_password_form', 'restan_password_form', 10, 1);
function restan_password_form($output)
{
    $output = '<form action="' . esc_url(home_url('wp-login.php?action=postpass', 'login_post')) . '" class="post-password-form" method="post"><div class="theme-input-group">
        <input name="post_password" type="password" class="theme-input-style" placeholder="' . esc_attr__('Enter Password', 'restan') . '">
        <button type="submit" class="submit-btn btn-fill">' . esc_html__('Enter', 'restan') . '</button></div></form>';
    return $output;
}

/* This code filters the Categories archive widget to include the post count inside the link */
add_filter('wp_list_categories', 'restan_cat_count_span');
function restan_cat_count_span($links)
{
    $links = str_replace('</a> (', '</a> <span class="category-number">(', $links);
    $links = str_replace(')', ')</span>', $links);
    return $links;
}

/* This code filters the Archive widget to include the post count inside the link */
add_filter('get_archives_link', 'restan_archive_count_span');
function restan_archive_count_span($links)
{
    $links = str_replace('</a>&nbsp;(', '</a> <span class="category-number">(', $links);
    $links = str_replace(')', ')</span>', $links);
    return $links;
}


if (!function_exists('restan_blog_category')) {
    function restan_blog_category()
    {
        if (class_exists('ReduxFramework')) {
            $restan_display_post_category =  restan_opt('restan_display_post_category');
        } else {
            $restan_display_post_category = '1';
        }

        if ($restan_display_post_category) {
            $restan_post_categories = get_the_category();
            if (is_array($restan_post_categories) && !empty($restan_post_categories)) {
                if (restan_opt('restan_blog_style') == '2') {
                    $padding_class = 'mb-20';
                } else {
                    $padding_class = '';
                }
                echo '<div class="blog-category ' . esc_attr($padding_class) . '">';
                echo ' <a href="' . esc_url(get_term_link($restan_post_categories[0]->term_id)) . '">' . esc_html($restan_post_categories[0]->name) . '</a> ';
                echo '</div>';
            }
        }
    }
}

if (!function_exists('restan_get_nav_menu')) :
    function restan_get_nav_menu()
    {
        $menu_list = get_terms(array(
            'taxonomy' => 'nav_menu',
            'hide_empty' => true,
        ));
        $options = [];
        if (!empty($menu_list) && !is_wp_error($menu_list)) {
            foreach ($menu_list as $menu) {
                $options[$menu->slug] = $menu->name;
            }
            return $options;
        }
    }
endif;

if (! function_exists('restan_get_taxonoy')) :
    function restan_get_taxonoy($taxonoy)
    {
        $taxonomy_list = get_terms(array(
            'taxonomy' => $taxonoy,
            'hide_empty' => true,
        ));
        $options = [];
        if (! empty($taxonomy_list) && ! is_wp_error($taxonomy_list)) {
            foreach ($taxonomy_list as $taxonomy) {
                $options[$taxonomy->slug] = $taxonomy->name;
            }
            return $options;
        }
    }
endif;

// Add Extra Class On Comment Reply Button
function restan_custom_comment_reply_link($content)
{
    $extra_classes = 'replay-btn';
    return preg_replace('/comment-reply-link/', 'comment-reply-link ' . $extra_classes, $content);
}

add_filter('comment_reply_link', 'restan_custom_comment_reply_link', 99);

// Add Extra Class On Edit Comment Link
function restan_custom_edit_comment_link($content)
{
    $extra_classes = 'replay-btn';
    return preg_replace('/comment-edit-link/', 'comment-edit-link ' . $extra_classes, $content);
}

add_filter('edit_comment_link', 'restan_custom_edit_comment_link', 99);


function restan_post_classes($classes, $class, $post_id)
{
    if (get_post_type() === 'post') {
        if (!is_single()) {
            if (restan_opt('restan_blog_style') == '3') {
                $classes[] = "item grid-wide";
            } else {
                $classes[] = "single-item";
            }
        } else {
            $classes[] = "item";
        }
    } elseif (get_post_type() === 'page') {
        $classes[] = "page--item";
    }

    return $classes;
}
add_filter('post_class', 'restan_post_classes', 10, 3);

if (function_exists('register_block_style')) {
    register_block_style(
        'core/quote',
        array(
            'name'         => 'blue-quote',
            'label'        => __('Blue Quote', 'restan'),
            'is_default'   => true,
            'inline_style' => '.wp-block-quote.is-style-blue-quote { color: blue; }',
        )
    );
}

function restan_register_my_patterns()
{
    register_block_pattern(
        'wpdocs/my-example',
        array(
            'title'         => __('Block Pattern', 'restan'),
            'description'   => _x('This is my first block pattern', 'Block pattern description', 'restan'),
            'content'       => '<!-- wp:paragraph --><p>A single paragraph block style</p><!-- /wp:paragraph -->',
            'categories'    => array('text'),
            'keywords'      => array('cta', 'demo', 'example'),
            'viewportWidth' => 800,
        )
    );
}

add_action('init', 'restan_register_my_patterns');