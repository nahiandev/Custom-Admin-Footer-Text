<?php
/*
Plugin Name: Custom Admin Footer Text
Plugin URI: https://github.com/nahiandev/Custom-Admin-Footer-Text
Description: Change the default WordPress admin footer text.
Version: v1.0.0
Author: Ibne Nahian (@nahiandev)
Author URI: https://github.com/nahiandev/
License: MIT
Text Domain: custom-admin-footer
*/

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Define plugin constants
define('CUSTOM_ADMIN_FOOTER_VERSION', '1.0.0');
define('CUSTOM_ADMIN_FOOTER_DIR', plugin_dir_path(__FILE__));
define('CUSTOM_ADMIN_FOOTER_URL', plugin_dir_url(__FILE__));

// Include settings file
require_once CUSTOM_ADMIN_FOOTER_DIR . 'includes/settings.php';

// Initialize the plugin
add_action('plugins_loaded', 'custom_admin_footer_init');

function custom_admin_footer_init() {
    load_plugin_textdomain(
        'custom-admin-footer',
        false,
        dirname(plugin_basename(__FILE__)) . '/languages/'
    );

    add_filter('admin_footer_text', 'custom_admin_footer_text');
}

/**
 * Replace admin footer text
 */
function custom_admin_footer_text($text) {
    $custom_text = get_option('custom_admin_footer_text', '');

    if (!empty($custom_text)) {
        return wp_kses_post($custom_text);
    }

    return $text;
}