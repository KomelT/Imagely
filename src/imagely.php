<?php
if (!defined("ABSPATH")) {
    exit();
}

/**
 * Plugin Name: Imagely
 * Description: Wordpress plugin for converting images on upload
 * Plugin URI:  https://github.com/KomelT/Imagely
 * Version:     1.0.0
 * Author:      Tilen Komel
 * Author URI:  https://www.komelt.dev/
 * Text Domain: Imagely
 * License: GPLv3
 */

/* -----------------------------------------------------------------------------
Register Convert Image on Upload
----------------------------------------------------------------------------- */
require_once plugin_dir_path(__FILE__) . 'functions/convert_image_on_upload.php';
add_filter('wp_handle_upload_prefilter', 'functions/convert_image_on_upload');