<?php
/* =====================================
    Set helpful sytem folder paths
====================================== */
$doc_root = $_SERVER['DOCUMENT_ROOT'];
$site_root = trailingslashit( ( str_replace('\\', '/', $doc_root) ) );
$theme_path = trailingslashit( get_stylesheet_directory_uri() );
$css_path = ($theme_path . 'css');
$js_path = ($theme_path . 'js');
$images_path = ($theme_path . 'images');

/* =========================================================
    Reset wordpress gutenburg style defaults
========================================================= */
require 'functions-includes/reset-wp-block-defaults.php';

/* =========================================================
    Script/style file load functions
========================================================= */
require 'functions-includes/script-load-functions.php';


function get_page_link_by_slug($slug){
    return esc_url(get_permalink(get_page_by_path($slug)->ID));
}


/* ==============================
    Enqueue page resources
=============================== */
require 'functions-includes/enqueue-scripts-for-pages.php';


/* ==========================================
	NAVIGATION
============================================ */
require 'functions-includes/navigation.php';


/* ======================================
   REMOVE ITEMS FROM ADMIN BAR
====================================== */
require 'functions-includes/customize-admin-bar.php';


/* ======================================
   ADMIN AREA CSS
====================================== */
require 'functions-includes/customize-admin-area.php';


/* ===============================================
    Change hardcode 'width' caption images to 
    'max-width' props
=============================================== */
require 'functions-includes/change-width-to-max-width.php';


/* ==========================================================
    SEARCH ONLY POST TITLES 
    Kudos to this answer. 
    Surprisingly hard to find documentation for this.
========================================================== */
require 'functions-includes/search-only-post-titles.php';


/* =========================================================================
    Handles getting 'previous' and 'next' posts across custom post types 
========================================================================== */
require 'functions-includes/cross-post-type-prev-next-links.php';