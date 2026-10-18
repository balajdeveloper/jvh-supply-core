<?php
/**
 * Plugin Name: JVH Supply Core
 * Description: Custom functionality, admin menus, and theme settings for JVH Supply.
 * Version: 1.0
 * Author: Balaj
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

/**
 * Register Custom Admin Menu and Sub-Menus
 */
if ( ! function_exists( 'jvh_supply_register_admin_menu' ) ) {
    function jvh_supply_register_admin_menu() {
        // Add main parent menu in WordPress sidebar
        add_menu_page(
            'JVH Supply Settings', 
            'JVH Supply', 
            'manage_options', 
            'jvh-supply', 
            'jvh_supply_theme_settings_page', 
            'dashicons-store', 
            3
        );

        // Add submenu pages
        add_submenu_page( 'jvh-supply', 'Theme Settings', 'Theme Settings', 'manage_options', 'jvh-supply', 'jvh_supply_theme_settings_page' );
        add_submenu_page( 'jvh-supply', 'Home Page Settings', 'Home Settings', 'manage_options', 'jvh-supply-home', 'jvh_supply_home_settings_page' );
        add_submenu_page( 'jvh-supply', 'About Page Settings', 'About Settings', 'manage_options', 'jvh-supply-about', 'jvh_supply_about_settings_page' );
        add_submenu_page( 'jvh-supply', 'Products Page Settings', 'Products Settings', 'manage_options', 'jvh-supply-products', 'jvh_supply_products_settings_page' );
        add_submenu_page( 'jvh-supply', 'Contact Page Settings', 'Contact Settings', 'manage_options', 'jvh-supply-contact', 'jvh_supply_contact_settings_page' );
    }
    add_action( 'admin_menu', 'jvh_supply_register_admin_menu' );
}

/**
 * Register Settings API Fields using an array to prevent data loss across tabs
 */
if ( ! function_exists( 'jvh_supply_register_settings' ) ) {
    function jvh_supply_register_settings() {
        register_setting( 
            'jvh_theme_options_group', 
            'jvh_theme_options', 
            'jvh_supply_sanitize_options' 
        );
    }
    add_action( 'admin_init', 'jvh_supply_register_settings' );
}

/**
 * Sanitize and Merge Options so data from other tabs doesn't get erased on submit
 */
if ( ! function_exists( 'jvh_supply_sanitize_options' ) ) {
    function jvh_supply_sanitize_options( $input ) {
        $old_options = get_option( 'jvh_theme_options', array() );
        if ( ! is_array( $old_options ) ) {
            $old_options = array();
        }
        return wp_parse_args( $input, $old_options );
    }
}

/**
 * Enqueue WordPress Media Uploader Scripts in Admin
 */
if ( ! function_exists( 'jvh_supply_admin_enqueue_scripts' ) ) {
    function jvh_supply_admin_enqueue_scripts( $hook ) {
        if ( strpos( $hook, 'jvh-supply' ) === false ) {
            return;
        }
        wp_enqueue_media();
    }
    add_action( 'admin_enqueue_scripts', 'jvh_supply_admin_enqueue_scripts' );
}

/**
 * Theme Settings Page with Tabs (Global, Header, Footer)
 */
if ( ! function_exists( 'jvh_supply_theme_settings_page' ) ) {
    function jvh_supply_theme_settings_page() {
        $active_tab = isset( $_GET['tab'] ) ? $_GET['tab'] : 'global_settings';
        ?>
        <div class="wrap">
            <h1>Theme Settings</h1>
            
            <!-- Tabs Navigation Links -->
            <h2 class="nav-tab-wrapper">
                <a href="?page=jvh-supply&tab=global_settings" class="nav-tab <?php echo $active_tab == 'global_settings' ? 'nav-tab-active' : ''; ?>">General Info (Global)</a>
                <a href="?page=jvh-supply&tab=header_settings" class="nav-tab <?php echo $active_tab == 'header_settings' ? 'nav-tab-active' : ''; ?>">Header Settings</a>
                <a href="?page=jvh-supply&tab=footer_settings" class="nav-tab <?php echo $active_tab == 'footer_settings' ? 'nav-tab-active' : ''; ?>">Footer Settings</a>
            </h2>

            <form method="post" action="options.php">
                <?php
                settings_fields( 'jvh_theme_options_group' );
                do_settings_sections( 'jvh-supply' );

                // Load separate settings file based on the active tab
                if ( $active_tab == 'global_settings' ) {
                    $global_file = plugin_dir_path( __FILE__ ) . 'admin/global-settings.php';
                    if ( file_exists( $global_file ) ) { include $global_file; }
                } elseif ( $active_tab == 'header_settings' ) {
                    $header_file = plugin_dir_path( __FILE__ ) . 'admin/header-settings.php';
                    if ( file_exists( $header_file ) ) { include $header_file; }
                } else {
                    $footer_file = plugin_dir_path( __FILE__ ) . 'admin/footer-settings.php';
                    if ( file_exists( $footer_file ) ) { include $footer_file; }
                }

                submit_button();
                ?>
            </form>
        </div>

        <!-- JavaScript for Media Uploader -->
        <script>
        jQuery(document).ready(function($){
            var file_frame;
            $('.upload_image_button').on('click', function(e){
                e.preventDefault();
                var button = $(this);
                var targetId = button.data('target');
                var previewId = button.data('preview');

                if (file_frame) { file_frame.open(); return; }

                file_frame = wp.media.frames.file_frame = wp.media({
                    title: 'Select or Upload Logo',
                    button: { text: 'Use this logo' },
                    multiple: false
                });

                file_frame.on('select', function(){
                    var attachment = file_frame.state().get('selection').first().toJSON();
                    $('#' + targetId).val(attachment.url);
                    $('#' + previewId).attr('src', attachment.url).show();
                });

                file_frame.open();
            });

            $('.remove_image_button').on('click', function(e){
                e.preventDefault();
                var targetId = $(this).data('target');
                var previewId = $(this).data('preview');
                $('#' + targetId).val('');
                $('#' + previewId).hide().attr('src', '');
            });
        });
        </script>
        <?php
    }
}

// Dummy callbacks for other sub-menus
if ( ! function_exists( 'jvh_supply_home_settings_page' ) ) { function jvh_supply_home_settings_page() { echo '<div class="wrap"><h1>Home Page Settings</h1></div>'; } }
if ( ! function_exists( 'jvh_supply_about_settings_page' ) ) { function jvh_supply_about_settings_page() { echo '<div class="wrap"><h1>About Page Settings</h1></div>'; } }
if ( ! function_exists( 'jvh_supply_products_settings_page' ) ) { function jvh_supply_products_settings_page() { echo '<div class="wrap"><h1>Products Page Settings</h1></div>'; } }
if ( ! function_exists( 'jvh_supply_contact_settings_page' ) ) { function jvh_supply_contact_settings_page() { echo '<div class="wrap"><h1>Contact Page Settings</h1></div>'; } }