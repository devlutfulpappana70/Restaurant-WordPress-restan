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
?>
<div id="page-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php

	/**
	 * page content 
	 * Comments Template
	 * @Hook  restan_page_content
	 *
	 * @Hooked restan_page_content_cb
	 * 
	 *
	 */
	do_action('restan_page_content');
	?>
</div>