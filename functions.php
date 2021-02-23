<?php

/**
 *
 * Please do not make any edits to this file. All edits should be done in a child theme.
 *
 * @package Hercules
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

//Define theme version
define('HERCULES_VER', wp_get_theme()->get('Version'));

//Define template directory
define('HERCULES_TEMPLATE_DIR', get_template_directory());

//Define template directory uri
define('HERCULES_DIR_URI', get_template_directory_uri());

define('DEVELOPMENT', true);

//Include theme setup files
require_once HERCULES_TEMPLATE_DIR . '/inc/hercules-setup.php';

//Casino custom post type
require_once HERCULES_TEMPLATE_DIR . '/inc/hercules-casinos-cpt.php';

//General code for theme - scripts, styles
require_once HERCULES_TEMPLATE_DIR . '/inc/hercules-general.php';

//Helper functions
require_once HERCULES_TEMPLATE_DIR . '/inc/hercules-helper-functions.php';

//Include ACF setup files
require_once HERCULES_TEMPLATE_DIR . '/inc/hercules-acf-setup.php';

//Include ACF fields for theme
require_once HERCULES_TEMPLATE_DIR . '/inc/hercules-acf-fields.php';

//Include this file if remove slug option is enabled
if (get_field('casino_remove_slug', 'options')) {
    require_once HERCULES_TEMPLATE_DIR . '/inc/hercules-remove-casino-slug.php';
}
