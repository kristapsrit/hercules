<?php

/**
 * Theme Setup functions
 * 
 * @package Hercules
 */

if (!function_exists('hercules_setup')) :
    add_action('after_setup_theme', 'hercules_setup');
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     */
    function hercules_setup()
    {

        /**
         * Make theme available for translation.
         * Translations can be placed in the /languages/ directory.
         */
        load_theme_textdomain('hercules', get_template_directory() . '/languages');

        /**
         * Add theme support for various features.
         */
        add_theme_support('post-thumbnails', ['post']);
        add_theme_support('custom-logo');
        add_theme_support('title-tag');
        add_theme_support('post-formats', array('quote', 'image', 'video'));
        add_theme_support('html5', array('search-form', 'caption', 'script', 'style'));
        add_theme_support('responsive-embeds');

        /**
         * Add support for two custom navigation menus.
         */
        register_nav_menus(array(
            'main-menu'   => 'Main Menu',
            'mobile-menu' => 'Mobile Menu',
            'footer-menu-1' => 'Footer Menu 1',
            'footer-menu-2' => 'Footer Menu 2',
            'footer-menu-3' => 'Footer Menu 3',
            'footer-menu-4' => 'Footer Menu 4',
            'footer-menu-5' => 'Footer Menu 5',
        ));

        register_sidebar(array(
            'name'          => __('Sidebar - 1', 'hercules'),
            'id'            => 'sidebar-1',
            'description'   => __('Custom sidebar', 'hercules'),
        ));

        register_sidebar(array(
            'name'          => __('Sidebar - 2', 'hercules'),
            'id'            => 'sidebar-2',
            'description'   => __('Custom sidebar', 'hercules'),
        ));
    }
endif;

/**
 *  Remove editor / thumbnails from page post type
 */

function hercules_remove_support()
{
    $post_type = 'page';
    remove_post_type_support($post_type, 'thumbnail');
}
add_action('init', 'hercules_remove_support', 100);
