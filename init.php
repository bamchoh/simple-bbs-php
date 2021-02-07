<?php
session_start();

if(!isset($_SESSION["count"])) {
    $_SESSION["count"] = 1;
} else {
    $_SESSION["count"]++;
}

include $_SERVER["DOCUMENT_ROOT"] . "/vendor/autoload.php";
include $_SERVER["DOCUMENT_ROOT"] . "/utils.php";

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

