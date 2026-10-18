<?php
/**
 * Plugin Name: JVH Supply Core
 * Description: Custom functionality and split admin pages for JVH Supply.
 * Version: 1.0
 * Author: Ahsan
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Register Custom Admin Menu and Sub-Menus
 */
function jvh_supply_register_admin_menu() {
    add_menu_page(
        'JVH Supply Settings', 
        'JVH Supply', 
        'manage_options', 
        'jvh-supply', 
        'jvh_supply_theme_settings_callback', 
        'dashicons-store', 
        3
    );

    add_submenu_page( 'jvh-supply', 'Theme Settings', 'Theme Settings', 'manage_options', 'jvh-supply', 'jvh_supply_theme_settings_callback' );
    add_submenu_page( 'jvh-supply', 'Home Page Settings', 'Home Settings', 'manage_options', 'jvh-supply-home', 'jvh_supply_home_settings_callback' );
    add_submenu_page( 'jvh-supply', 'About Page Settings', 'About Settings', 'manage_options', 'jvh-supply-about', 'jvh_supply_about_settings_callback' );
    add_submenu_page( 'jvh-supply', 'Products Page Settings', 'Products Settings', 'manage_options', 'jvh-supply-products', 'jvh_supply_products_settings_callback' );
    add_submenu_page( 'jvh-supply', 'Contact Page Settings', 'Contact Settings', 'manage_options', 'jvh-supply-contact', 'jvh_supply_contact_settings_callback' );
}
add_action( 'admin_menu', 'jvh_supply_register_admin_menu' );

/**
 * Callback Functions loading separate files from admin/ folder
 */
function jvh_supply_theme_settings_callback() {
    require_once plugin_dir_path( __FILE__ ) . 'admin/theme-settings.php';
}
function jvh_supply_home_settings_callback() {
    require_once plugin_dir_path( __FILE__ ) . 'admin/home-settings.php';
}
function jvh_supply_about_settings_callback() {
    require_once plugin_dir_path( __FILE__ ) . 'admin/about-settings.php';
}
function jvh_supply_products_settings_callback() {
    require_once plugin_dir_path( __FILE__ ) . 'admin/products-settings.php';
}
function jvh_supply_contact_settings_callback() {
    require_once plugin_dir_path( __FILE__ ) . 'admin/contact-settings.php';
}

/**
 * Register Settings API fields (Phone, Email, Address, Header Logo, Footer Logo)
 */
function jvh_supply_register_settings() {
    // Header Settings Fields
    register_setting( 'jvh_theme_options_group', 'jvh_top_bar_text' );
    register_setting( 'jvh_theme_options_group', 'jvh_header_logo' );
    register_setting( 'jvh_theme_options_group', 'jvh_header_phone' );
    register_setting( 'jvh_theme_options_group', 'jvh_header_email' );

    // Footer Settings Fields
    register_setting( 'jvh_theme_options_group', 'jvh_footer_logo' );
    register_setting( 'jvh_theme_options_group', 'jvh_footer_desc' );
    register_setting( 'jvh_theme_options_group', 'jvh_footer_phone' );
    register_setting( 'jvh_theme_options_group', 'jvh_footer_email' );
    register_setting( 'jvh_theme_options_group', 'jvh_footer_address' );
    register_setting( 'jvh_theme_options_group', 'jvh_footer_hours' );
    register_setting( 'jvh_theme_options_group', 'jvh_footer_copyright' );
}
add_action( 'admin_init', 'jvh_supply_register_settings' );

/**
 * Enqueue WordPress Media Uploader Scripts in Admin Area
 */
function jvh_supply_admin_enqueue_scripts( $hook ) {
    // Only load on our plugin options page
    if ( strpos( $hook, 'jvh-supply' ) === false ) {
        return;
    }
    wp_enqueue_media();
}
add_action( 'admin_enqueue_scripts', 'jvh_supply_admin_enqueue_scripts' );