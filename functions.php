<?php
/**
 * Theme functions file — keep this thin. Real logic lives in /inc/.
 * This is the pattern: functions.php just requires files, never gets bloated.
 */

if ( ! defined( 'ABSPATH' ) ) exit;

require_once get_template_directory() . '/inc/theme-setup.php';
require_once get_template_directory() . '/inc/enqueue.php';

// Uncomment when you add these files for a project:
// require_once get_template_directory() . '/inc/customizer.php';
// require_once get_template_directory() . '/inc/acf-blocks.php';
