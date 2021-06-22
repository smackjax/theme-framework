<?php
function remove_admin_menu_pages() {
    //Posts
    remove_menu_page( 'edit.php' );
    //Comments
    remove_menu_page( 'edit-comments.php' );
    //Appearance
    remove_menu_page( 'themes.php' );
    //Users
    remove_menu_page( 'users.php' );
    //Tools
    remove_menu_page( 'tools.php' );
    //Settings
    remove_menu_page( 'options-general.php' );
    // Pages
    remove_menu_page( 'edit.php?post_type=page' );
    // Plugins
    remove_menu_page( 'plugins.php' );
};

function remove_admin_toolbar_buttons($wp_admin_bar) {
	global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');
    $wp_admin_bar->remove_menu('new-content');
    $wp_admin_bar->remove_menu('search');
    $wp_admin_bar->remove_menu('edit');
}

// Check if user is admin
if( !current_user_can('administrator') ) { 
    // Remove side bar buttons
    add_action( 'admin_init', 'remove_admin_menu_pages' );
    // Remove toolbar buttons
    add_action('wp_before_admin_bar_render', 'remove_admin_toolbar_buttons', 999);
    // Remove custom field groups
    add_filter('acf/settings/show_admin', '__return_false');

}

