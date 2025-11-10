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
 * Hook for Footer Content
 *
 * Hook restan_footer_content
 *
 * @Hooked restan_footer_content_cb 10
 *
 */
do_action('restan_footer_content');


wp_footer();
?>
</body>

</html>