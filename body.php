<?php
include $_SERVER["DOCUMENT_ROOT"] . "/init.php";
include $_SERVER["DOCUMENT_ROOT"] . "/db.php";

try {
  $db = newDB();

  $sql = "select * from articles order by create_at desc";
  $res = $db->query($sql);

  $messages = array();
  foreach($res as $record) {
    $message = array(
      "name" => $record["name"],
      "create_at" => $record["create_at"],
      "article" => $record["article"],
    );
    array_push($messages, $message);
  }

  $smarty = new Smarty();
  $smarty->setTemplateDir('templates')->setCacheDir('templates-cache')->setCompileDir('templates_c')->setCacheDir('tempaltes-cache')->setConfigDir('configs');
  $smarty->assign("messages", $messages);
  $smarty->assign("name", $_SESSION['name']);
  $smarty->assign("flash", $_SESSION['flash']);
  $smarty->assign("count", $_SESSION['count']);
  $smarty->display('index.tpl');

  unset($_SESSION['flash']);
  unset($db);
} catch (PDOException $e) {
  echo $e->getMessage();
}

