# Custom Admin Footer Text

![WordPress Plugin Version](https://img.shields.io/wordpress/plugin/v/custom-admin-footer-text?style=flat-round)

A lightweight WordPress plugin that replaces the default admin footer text ("Thank you for creating with WordPress") with your custom message. Perfect for agencies, freelancers, or anyone wanting to brand the WordPress admin area.

## Features

- ✅ Replace default admin footer text with custom content
- ✅ Supports HTML (links, bold text, etc.)
- ✅ Simple settings page under WordPress Settings
- ✅ Secure output escaping and sanitization
- ✅ Translation-ready (gettext/POT files supported)
- ✅ No database bloat (uses native WordPress options)

## Installation

1. Download the plugin ZIP file
2. Go to **WordPress Admin → Plugins → Add New → Upload Plugin**
3. Upload the ZIP file and click **Activate**
4. Navigate to **Settings → Admin Footer** to configure your text

Alternatively, upload the `custom-admin-footer` folder to `/wp-content/plugins/` via FTP.

## Configuration

1. After activation, go to **Settings → Admin Footer**
2. Enter your custom text in the textarea (HTML allowed)
3. Click **Save Changes**
4. The new text will appear in the bottom-right of all admin screens

## Screenshots

1. **Settings Page**  
   ![Settings Page](https://github.com/nahiandev/Custom-Admin-Footer-Text/blob/main/screenshots/Screenshot_1.png)

2. **Admin Footer Example**  
   ![Admin Footer in Action](https://github.com/nahiandev/Custom-Admin-Footer-Text/blob/main/screenshots/Screenshot_2.png)

## Advanced Usage

### PHP Filter Hook
Override the text programmatically:
```php
add_filter('custom_admin_footer_text', function($text) {
    return 'Custom text from code';
});
```

<hr>

## Hire the Developer

- [LinkedIn](https://www.linkedin.com/in/nahiandev/)