<?php 
// Article
function custom_admin_area() {
    add_editor_style('css/post-styles.style.css');
    add_editor_style('css/custom-admin-area.style.css');
}
add_action( 'after_setup_theme', 'custom_admin_area' );

// Custom login area
function custom_login_area() {
    load_style('login_custom_style', "custom-login.style.css");
}
add_action( 'login_enqueue_scripts', 'custom_login_area' );

// Remove site health dashboard
function remove_site_health_dashboard_widget()
{
    remove_meta_box('dashboard_site_health', 'dashboard', 'normal');
}
add_action('wp_dashboard_setup', 'remove_site_health_dashboard_widget');