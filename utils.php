<?php
function redirect_to($uri) {
    $baseurl = (empty($_SERVER['HTTPS']) ? 'http://' : 'https://') . $_SERVER['HTTP_HOST'];
    $url = $baseurl . $uri;
    header('Location: ' . $url);
}