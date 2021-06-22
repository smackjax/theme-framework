<?php 
function get_stripped_nav_items($theme_location) {
    // Returns responsive header html
    $nav_opts = [
        'container' => false,
        'theme_location' => 'main_menu',
        'echo' => false,
        'items_wrap' => '%3$s',
        'item_spacing' => 'discard',
        'fallback_cb' => false
    ];
    $wp_nav_items = wp_nav_menu($nav_opts);

    // Returns nav items only allowing <a> and <span>
    return strip_tags($wp_nav_items, '<a> <span>');
}

// Yes, I know you can pass this as one array. This is more straight forward to me.
if (function_exists('register_nav_menu')) 
{ 
    register_nav_menu('main_menu', 'Header');
}
