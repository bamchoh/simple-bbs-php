<?php
function newDB() {
    $user = 'nginx';
    $pass = 'Pass_1234!';
    $dsn  = 'pgsql:dbname=articles;host=localhost';
    return new PDO($dsn, $user, $pass);
}