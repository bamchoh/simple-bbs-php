<?php
function newDB() {
    $user = $_ENV["DB_USER"];
    $pass = $_ENV["DB_PASS"];
    $dsn  = $_ENV["DB_DNS"];
    return new PDO($dsn, $user, $pass);
}