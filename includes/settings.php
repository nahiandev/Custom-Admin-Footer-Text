<?php
/**
 * Plugin settings page
 */

// Add settings menu
add_action('admin_menu', 'custom_admin_footer_add_settings_page');
add_action('admin_init', 'custom_admin_footer_register_settings');

/**
 * Settings page under "Settings"
 */
function custom_admin_footer_add_settings_page()
{
    add_options_page(
        __('Admin Footer Text', 'custom-admin-footer'),
        __('Admin Footer', 'custom-admin-footer'),
        'manage_options',
        'custom-admin-footer',
        'custom_admin_footer_render_settings_page'
    );
}

/**
 * Register plugin settings
 */
function custom_admin_footer_register_settings()
{
    register_setting(
        'custom_admin_footer_settings',
        'custom_admin_footer_text',
        [
            'type'              => 'string',
            'sanitize_callback' => 'custom_admin_footer_sanitize_text',
            'default'           => '',
        ]
    );

    add_settings_section(
        'custom_admin_footer_section',
        __('Custom Footer Text', 'custom-admin-footer'),
        'custom_admin_footer_section_callback',
        'custom-admin-footer'
    );

    add_settings_field(
        'custom_admin_footer_field',
        __('Footer Text', 'custom-admin-footer'),
        'custom_admin_footer_field_callback',
        'custom-admin-footer',
        'custom_admin_footer_section'
    );
}

/**
 * Sanitize footer text (allows basic HTML)
 */
function custom_admin_footer_sanitize_text($input)
{
    return wp_kses_post($input); // Allow safe HTML tags
}

/**
 * Settings section description
 */
function custom_admin_footer_section_callback()
{
    echo '<p>' . __('Enter custom text to replace the default WordPress admin footer.', 'custom-admin-footer') . '</p>';
}

/**
 * Render the textarea input field
 */
function custom_admin_footer_field_callback()
{
    $value = get_option('custom_admin_footer_text', '');
    echo '<textarea name="custom_admin_footer_text" rows="3" class="large-text">' . esc_textarea($value) . '</textarea>';
    echo '<p class="description">' . __('HTML allowed (e.g., links, <code>&lt;strong&gt;</code>).', 'custom-admin-footer') . '</p>';
}

/**
 * Render the settings page
 */
function custom_admin_footer_render_settings_page()
{
    if (!current_user_can('manage_options')) {
        return;
    }

    // Enqueue admin CSS (optional)
    wp_enqueue_style(
        'custom-admin-footer-css',
        CUSTOM_ADMIN_FOOTER_URL . 'assets/css/admin.css',
        [],
        CUSTOM_ADMIN_FOOTER_VERSION
    );

    ?>
    <div class="wrap">
        <h1><?php esc_html_e('Admin Footer Text Settings', 'custom-admin-footer'); ?></h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('custom_admin_footer_settings');
            do_settings_sections('custom-admin-footer');
            submit_button(__('Save Changes', 'custom-admin-footer'));
    ?>
        </form>
    </div>
    <?php
}
