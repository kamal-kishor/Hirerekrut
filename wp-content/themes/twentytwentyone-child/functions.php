<?php
require get_theme_file_path('/api/search-route.php');
// require get_theme_file_path('/api/search-route-crud.php');

function enqueue_parent_styles(){
    wp_enqueue_style('parent-style', get_template_directory_uri().'/style.css');
}
add_action('wp_enqueue_scripts', 'enqueue_parent_styles');

function wp_custom_new_menu(){
    register_nav_menus(
        array(
            'custom-menu' => __('Custom Menu'),
            'custom-footer-first' => __('custom footer first menu'),
            'custom-footer-two' => __('custom footer second menu'),
            'Login-Menu' => __('Custom Login Menu')
        )
    );
}
add_action('init', 'wp_custom_new_menu');

function custom_menu(){
    add_menu_page(
        'Page Title',
        'Custom Menu',
        'edit_posts',
        'menu_slug',
        'page_callback_function',
        'dashicons-media-spreadsheet'
    );
}
add_action('admin_menu','custom_menu');
