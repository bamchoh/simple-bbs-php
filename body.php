<?php
require $_SERVER["DOCUMENT_ROOT"] . "/bbs_root_dir.php";

include $bbs_root_dir . "/init.php";
include $bbs_root_dir . "/db.php";

try {
  if(!isset($_SESSION["count"])) {
    $_SESSION["count"] = 1;
  } else {
    $_SESSION["count"]++;
  }

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
  $smarty
    ->setTemplateDir($bbs_root_dir . '/templates')
    ->setCacheDir($bbs_root_dir . '/templates-cache')
    ->setCompileDir($bbs_root_dir . '/templates_c')
    ->setCacheDir($bbs_root_dir . '/tempaltes-cache')
    ->setConfigDir($bbs_root_dir . '/configs');
  $smarty->assign("messages", $messages);
  $smarty->assign("name", $_SESSION['name']);
  if(isset($_SESSION['flash'])) {
    $smarty->assign("flash", $_SESSION['flash']);
  } else {
    $smarty->assign("flash", "");
  }
  $smarty->assign("count", $_SESSION['count']);
  $smarty->assign("bbs_dir", $bbs_dir);

  $_SESSION['csrf_token'] = generate_secure_string();
  $smarty->assign("csrf_token", $_SESSION['csrf_token']);

  $smarty->display('index.tpl');

  unset($_SESSION['flash']);
  unset($db);
} catch (PDOException $e) {
  echo $e->getMessage();
}

