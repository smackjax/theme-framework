<?php
// Loads common scripts and conditionally loads page specific scripts
function load_page_scripts(){
    global $post;
    global $page_titles;

    $lowercase_page_title = get_the_title($post);

    /* ==========================================
       Load common styles
    ========================================== */
    load_style('commons_style', 'common.style.css');
    load_script('commons_script', 'common.script.js');

    
    /* ==========================================
       Front page
    ========================================== */
    if(is_front_page() || is_page_template( 'front-page' ) || is_home()){
        super_simple_load('template_home', 'front-page');
    }

    /* =================================
       Other pages
    ================================= */
    // Archive
    else if(is_archive('todo-archive')) {
        super_simple_load('todo_archive_label', 'todo-archive');
    }
    else if ( is_single() ) {
        super_simple_load('base_single', 'todo-single');
    }
    // Specialized single
    else if (get_post_type($post) === 'custom-post-type'){
        super_simple_load('todo_ctp_name', 'ctp-filename');
    }
}
// Enqueue scripts
add_action( 'wp_enqueue_scripts', 'load_page_scripts' );