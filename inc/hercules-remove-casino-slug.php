<?php

/**
 * Remove custom post type slug
 *
 * @package Hercules
 */


function hercules_remove_casino_slug($args, $post_type)
{
    // Make sure we're only modifying our desired post type.
    if ('casino' != $post_type)
        return $args;

    $args['rewrite'] = array('rewrite' => false);

    return $args;
}

add_filter('register_post_type_args', 'hercules_remove_casino_slug', 10, 2);


function hercules_remove_slug($post_link, $post, $leavename)
{
    if ('casino' != $post->post_type || 'publish' != $post->post_status) {
        return $post_link;
    }

    $post_link = str_replace('/' . $post->post_type . '/', '/', $post_link);

    return $post_link;
}

add_filter('post_type_link', 'hercules_remove_slug', 10, 3);


function hercules_parse_request($query)
{
    if (!$query->is_main_query() || 2 != count($query->query) || !isset($query->query['page'])) {
        return;
    }

    if (!empty($query->query['name'])) {
        $query->set('post_type', array('casino'));
    }
}

add_action('pre_get_posts', 'hercules_parse_request');
