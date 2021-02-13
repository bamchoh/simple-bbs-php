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
  $smarty->setTemplateDir('templates')->setCacheDir('templates-cache')->setCompileDir('templates_c')->setCacheDir('tempaltes-cache')->setConfigDir('configs');
  $smarty->assign("messages", $messages);
  $smarty->assign("name", $_SESSION['name']);
  if(isset($_SESSION['flash'])) {
    $smarty->assign("flash", $_SESSION['flash']);
  }
  $smarty->assign("count", $_SESSION['count']);
  $smarty->assign("bbs_dir", $bbs_dir);
  $smarty->display('index.tpl');

  unset($_SESSION['flash']);
  unset($db);
} catch (PDOException $e) {
  echo $e->getMessage();
}

