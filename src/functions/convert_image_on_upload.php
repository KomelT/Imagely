<?php

function convert_image_on_upload($file) {
    $api_url = 'YOUR_API_ENDPOINT';

    // Assume $file contains the file path
    $response = wp_remote_post($api_url, [
        'body' => [
            'image' => new CURLFile($file['tmp_name']),
        ],
        'headers' => [
            'Content-Type' => 'multipart/form-data'
        ]
    ]);

    if (is_wp_error($response)) {
        // Handle error
        $error_message = $response->get_error_message();
        error_log("Image conversion failed: $error_message");
        return $file; // return original file on error
    } else {
        // Check if API response is valid
        $body = wp_remote_retrieve_body($response);
        $decoded_body = json_decode($body, true);

        if (isset($decoded_body['converted_image'])) {
            // Assume 'converted_image' contains the URL of the new image
            $new_image_url = $decoded_body['converted_image'];

            // Replace the original file with the new one
            $new_image_data = file_get_contents($new_image_url);
            if ($new_image_data !== false) {
                file_put_contents($file['tmp_name'], $new_image_data);
            }
        }
    }

    return $file;
}