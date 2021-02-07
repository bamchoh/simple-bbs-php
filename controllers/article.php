<?php
include $_SERVER["DOCUMENT_ROOT"] . "/init.php";
include $_SERVER["DOCUMENT_ROOT"] . "/db.php";

try {
  $db = newDB();

  $article=$_POST["article"];
  if(empty($article)) {
    redirect_to('/');
    $_SESSION['flash'] = "何か記事を書いてください";
    exit();
  }

  $name=$_POST["name"];
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
