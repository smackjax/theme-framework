<?php
// Custom function for "previous" and "next" post links being cross post-type
function custom_posttype_get_adjacent_ID($direction = 'next', $post_type = 'post', $current_post_id) {

    // Make sure post type is an array
    if( !is_array($post_type) ) $post_type = [$post_type];
    

    // Grab global wp_query
    global $wp_query;
    // Save current query
    $original_query = $wp_query;
    // Query args
    $query = [
        'post_type' => $post_type,
        'posts_per_page' => -1, 
        'orderby' => 'publish_date',
        'order' => 'DESC'
    ];
    // Run query
    $returned_query = new WP_Query( $query );

    $posts = $returned_query->posts;

    $postsLength = (count($posts) - 1);
    $currentIndex = 0;
    $index = 0;
    $result = 0;

    // Iterate all posts in order to find the current one
    foreach($posts as $p){
        if($p->ID == $current_post_id) $currentIndex = $index;
        $index++;
    }

    // Figure out needed index
    $new_index = 0;
    if($direction == 'prev') {
        $new_index = !$currentIndex ? $postsLength : $currentIndex - 1;
    } else {
        $new_index = $currentIndex == $postsLength ? 0 : $currentIndex + 1;
    }

     // Reset wp_query
     $wp_query = null;
     $wp_query = $original_query;
     wp_reset_postdata();  

    // Return post ID
    return $posts[$new_index]->ID;
}

// Get next link
function custom_next_post_link($current_post_id) {
    $found_post = custom_posttype_get_adjacent_ID('next', ['ctp-type-1', 'ctp-type-2'], $current_post_id);
    return get_permalink($found_post);
}

// Get previous link
function custom_prev_post_link($current_post_id) {
    $found_post = custom_posttype_get_adjacent_ID('prev', ['ctp-type-1', 'ctp-type-2'], $current_post_id);
    return get_permalink($found_post);
}