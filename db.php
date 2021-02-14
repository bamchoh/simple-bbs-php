<?php
function newDB() {
    $user = $_ENV["DB_USER"];
    $pass = $_ENV["DB_PASS"];
    $dsn  = $_ENV["DB_DSN"];
    $pdo  = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo;
}