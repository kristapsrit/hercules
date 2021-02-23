<?php

/**
 * Casinos CPT 
 *
 * @package Hercules
 */

/**
 * Register casino CPT 
 */

function hercules_casinos_init()
{
    $labels = array(
        'name'                  => _x('Casinos', 'Post type general name', 'kentaurus'),
        'singular_name'         => _x('Casino', 'Post type singular name', 'kentaurus'),
        'menu_name'             => _x('Casinos', 'Admin Menu text', 'kentaurus'),
        'name_admin_bar'        => _x('Casino', 'Add New on Toolbar', 'kentaurus'),
    );

    $args = array(
        'labels' => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'casino'),
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => null,
        'menu_icon'          => 'dashicons-welcome-add-page',
        'supports'           => array('title', 'author', 'thumbnail', 'revisions'),
    );

    register_post_type('casino', $args);
}
add_action('init', 'hercules_casinos_init');
