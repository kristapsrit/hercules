<?php

/**
 * Helper functions.
 *
 * @package Hercules
 */


/**
 * Helper function to add correct margin for side navigation 
 */
function hercules_sidenav_margin()
{
    if (is_admin_bar_showing()) {
        echo "style='margin-top:92px';";
    } else {
        echo "style='margin-top:60px;'";
    }
}

/**
 * Function to add images in front of menu items
 */
function hercules_nav_menu_objects($items, $args)
{
    // loop
    foreach ($items as &$item) {
        // vars
        $icon = get_field('menu_icon', $item);
        // append icon
        if ($icon) {
            $item->title = "<img src='{$icon["url"]}' alt='{$icon["alt"]}' class='menu-icon'>" . "<span>" . $item->title . "</span>";
        }
    }
    return $items;
}
add_filter('wp_nav_menu_objects', 'hercules_nav_menu_objects', 10, 2);

/**
 * Custom excerpt lenght
 */

function hercules_custom_excerpt_length($length)
{
    return 20;
}
add_filter('excerpt_length', 'hercules_custom_excerpt_length', 999);

/**
 * Create footer menu
 */

function hercules_generate_footer_menu($name)
{
    $args = array(
        'theme_location' => "$name",
        'container' => 'div',
        'echo' => false,
    );

    $menu = "";

    $menu .= "<div class='footer-column'>";

    $menu .= "<span>";

    $menu .= wp_get_nav_menu_name($name);

    $menu .= "</span>";

    $menu .= wp_nav_menu($args);

    $menu .= "</div>";

    return $menu;
}

/**
 * Function that adds person schema to pages and posts
 */

function hercules_person_schema()
{
    $author_id = get_the_author_meta('ID');

    $author_name = get_field('author_name', 'user_' . $author_id);

    $knows_about = get_field('author_knows_about', 'user_' . $author_id);

    $schema = array(
        "@context" => "http://schema.org",
        "@type" => "Person",
        "name" => $author_name,
        "knowsAbout" => $knows_about,
    );

    if (is_singular('page') || is_singular('post'))
        echo '<script type="application/ld+json">' . json_encode($schema) . '</script>';
}

add_action('wp_head', 'hercules_person_schema');

/**
 * Function that generates author content for author page
 */


function hercules_generate_author_work($id, $type)
{
    $args = array(
        'post_type' => $type,
        'author' => $id,
        'posts_per_page' => 12,
    );

    $loop = new WP_Query($args);

    if ($loop->have_posts()) {
        while ($loop->have_posts()) {
            $loop->the_post();
            get_template_part('template-parts/author-page/author-posts');
        } // end while
    } // end if
    wp_reset_postdata();
}
