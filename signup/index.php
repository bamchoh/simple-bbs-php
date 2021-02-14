<?php
require $_SERVER["DOCUMENT_ROOT"] . "/bbs_root_dir.php";

include $bbs_root_dir . "/init.php";
include $bbs_root_dir . "/db.php";

$smarty = new Smarty();
$smarty
->setTemplateDir($bbs_root_dir . '/templates')
->setCacheDir($bbs_root_dir . '/templates-cache')
->setCompileDir($bbs_root_dir . '/templates_c')
->setCacheDir($bbs_root_dir . '/tempaltes-cache')
->setConfigDir($bbs_root_dir . '/configs');

$_SESSION['csrf_token'] = generate_secure_string();
$smarty->assign("csrf_token", $_SESSION['csrf_token']);
$smarty->assign("bbs_dir", $bbs_dir);

$smarty->display('signup.tpl');
