<?php
session_start();

include $_SERVER["DOCUMENT_ROOT"] . "/vendor/autoload.php";
include $_SERVER["DOCUMENT_ROOT"] . "/utils.php";

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

