<?php
include $_SERVER["DOCUMENT_ROOT"] . "/init.php";
include $_SERVER["DOCUMENT_ROOT"] . "/db.php";

try {
  $db = newDB();

  $name=$_POST["name"];
  $article=$_POST["article"];

  $sql = "insert into articles (name, article, create_at) values (?, ?, current_timestamp)";
  $stmt = $db->prepare($sql);
  $flag = $stmt->execute(array($name, $article));

  unset($db);
} catch (PDOException $e) {
  echo $e->getMessage();
}

$baseurl = (empty($_SERVER['HTTPS']) ? 'http://' : 'https://') . $_SERVER['HTTP_HOST'];
$url = $baseurl . '/';
header('Location: ' . $url);
