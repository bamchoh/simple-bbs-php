<?php
if(session_status() == PHP_SESSION_NONE) {
    session_start();
}

include_once $bbs_root_dir . "/vendor/autoload.php";
include_once $bbs_root_dir . "/utils.php";

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

