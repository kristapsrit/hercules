<?php

/**
 * General functions.
 *
 * @package Hercules
 */

/**
 * Register and Enqueue Styles.
 */

function hercules_register_styles()
{
    $css_path = HERCULES_TEMPLATE_DIR . '/dist/css/style.css';
    wp_enqueue_style('kentaurus-style', HERCULES_DIR_URI . '/dist/css/style.css', array(), filemtime($css_path));
}

add_action('wp_enqueue_scripts', 'hercules_register_styles');

/**
 * Register and Enqueue Scripts.
 */
function hercules_register_scripts()
{
    $js_path = HERCULES_TEMPLATE_DIR . '/dist/js/scripts.js';
    wp_enqueue_script('kentaurus-scripts', HERCULES_DIR_URI . '/dist/js/scripts.js', array('jquery'), filemtime($js_path), false);
}

add_action('wp_enqueue_scripts', 'hercules_register_scripts');
