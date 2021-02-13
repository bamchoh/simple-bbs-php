<?php
function redirect_to($uri) {
    global $bbs_dir;
    $baseurl = (empty($_SERVER['HTTPS']) ? 'http://' : 'https://') . $_SERVER['HTTP_HOST'];
    $url = $baseurl . $bbs_dir . $uri;
    header('Location: ' . $url);
}