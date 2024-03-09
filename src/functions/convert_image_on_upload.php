<?php

function convert_image_on_upload($file) {
    $api_url = get_option('api_url');
    $api_key = get_option('api_key');

    $curl = curl_init($api_url . "/api/photo");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, ['file' => new CURLFile($file['tmp_name'], $file['type'], $file['name'])]);
    curl_setopt($curl, CURLOPT_HTTPHEADER, ["x-api-key: $api_key"]);

    // Execute the request
    $response = curl_exec($curl);
    $error = curl_error($curl);
    curl_close($curl);

    if ($error) {
        error_log("Photo compression failed: $error");
        return $file;
    } else {
        file_put_contents($file['tmp_name'], $response);
    }

    return $file;
}