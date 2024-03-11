<?php
$client_key = 'awo0o1vaqyqauihy';
$client_secret = 'Zt9OS3rDXX3D6Mr2Hu6RpuWjRgD1EVdG';
$redirect_uri = 'https://berkansaglam.com/login.php';

if (isset($_GET['code'])) {
    $code = $_GET['code'];

    // Erişim jetonu (access token) almak için POST isteği yapın
    $token_url = 'https://open-api.tiktok.com/oauth/access_token/';
    $post_fields = [
        'client_key' => $client_key,
        'client_secret' => $client_secret,
        'code' => $code,
        'grant_type' => 'authorization_code',
        'redirect_uri' => $redirect_uri
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $token_url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post_fields));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    $response_data = json_decode($response, true);
    if (isset($response_data['access_token'])) {
        $access_token = $response_data['access_token'];
        echo "Access Token: " . $access_token;
    } else {
        echo "Error: " . $response_data['error_description'];
    }
}
?>
