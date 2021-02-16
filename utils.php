<?php
function redirect_to($uri) {
    global $bbs_dir;
    $baseurl = (empty($_SERVER['HTTPS']) ? 'http://' : 'https://') . $_SERVER['HTTP_HOST'];
    $url = $baseurl . $bbs_dir . $uri;
    header('Location: ' . $url);
}

function generate_secure_string() {
    return bin2hex(openssl_random_pseudo_bytes(16));
}

function dh($str) {
    return htmlspecialchars_decode($str, ENT_QUOTES);
}