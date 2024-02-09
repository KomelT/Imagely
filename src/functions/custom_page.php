<?php

function imagely_menu_page() {
    add_menu_page(
        'Imagely',
        'Imagely',
        'manage_options',
        'imagely',
        'imagely_menu_page_render'
    );
}

function imagely_menu_page_render() {
    ?>
    <div class="wrap">
        <h2>Imagely</h2>
        <form method="post" action="options.php">
            <?php
            settings_fields('api-settings-group');
            do_settings_sections('api-settings');
            submit_button();
            ?>
        </form>
    </div>
    <?php
}

function register_imagely_menu_page_settings() {
    register_setting('api-settings-group', 'api_key');
    register_setting('api-settings-group', 'api_url');

    add_settings_section('api-settings-section', 'API Configuration', 'api_settings_section_callback', 'api-settings');

    add_settings_field('api-key-field', 'API Key', 'api_key_field_callback', 'api-settings', 'api-settings-section');
    add_settings_field('api-url-field', 'API URL', 'api_url_field_callback', 'api-settings', 'api-settings-section');
}

function api_settings_section_callback() {
    echo '<p>Enter your API configuration below.</p>';
}

function api_key_field_callback() {
    $api_key = get_option('api_key');
    echo '<input type="text" id="api_key" name="api_key" value="' . esc_attr($api_key) . '" />';
}

function api_url_field_callback() {
    $api_url = get_option('api_url');
    echo '<input type="text" id="api_url" name="api_url" value="' . esc_attr($api_url) . '" />';
}