<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/bbs_root_dir.php";
include_once $bbs_root_dir . "/init.php";
include_once $bbs_root_dir . "/db.php";

try {
  $db = newDB();

  if (!isset($_POST["csrf_token"]) || !($_POST["csrf_token"] === $_SESSION['csrf_token'])) {
   $_SESSION['flash'] = "不正なリクエストです";
   exit();
  }

  $article=htmlspecialchars($_POST["article"], ENT_QUOTES);
  if(empty($article)) {
    redirect_to('/');
    $_SESSION['flash'] = "何か記事を書いてください";
    exit();
  }

  $name=htmlspecialchars($_POST["name"], ENT_QUOTES);
  if(empty($name)) {
    $name = "名無しさん";
  } else {
    $_SESSION['name'] = $name;
  }

  $sql = "insert into articles (name, article, create_at) values (?, ?, current_timestamp)";
  $stmt = $db->prepare($sql);
  $flag = $stmt->execute(array($name, $article));

  unset($db);
} catch (PDOException $e) {
  echo $e->getMessage();
}

redirect_to('/');
