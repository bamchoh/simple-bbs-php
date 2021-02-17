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
        "name" => dh($record["name"]),
        "create_at" => $record["create_at"],
        "article" => dh($record["article"]),
      );
      array_push($messages, $message);
    }

    $data = array();

    $data["messages"] = $messages;
    $data["name"] = dh($_SESSION['name']);
    $data["flash"] = $_SESSION['flash'];
    $data["count"] = $_SESSION['count'];
    $data["bbs_dir"] = $bbs_dir;
    $data["csrf_token"] = $_SESSION['csrf_token'];

    $data_json = h(json_encode($data));

    unset($_SESSION['flash']);
    unset($db);

    require_once($bbs_root_dir . "/view/index.php");
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
