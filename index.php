<?php
require_once("config.php");
require_once(LIB_DIR . "libs.php");
require_once(CONFIG_DIR . "db.php");
session_start();
$path = parseRequest();
var_dump($path);

//
if(!isset($_SESSION['user_id']) && $path[0] . "/" . $path[1] != "login/index") {
  //var_dump($path);
  header("Location: /login");

  exit;
}

if ($path[0] == 'catalog') {
  if (isset($path[1]) && $path[1] != "index") {
    $good_id = $path[1];
    $pageName = PAGES_DIR . $path[0]. "/good.php";
  }
  else {
    $pageName = PAGES_DIR . $path[0]. "/index.php";
  }

}
else {
  $pageName = PAGES_DIR . implode("/", $path) . ".php";
}
//var_dump($pageName);
if(!file_exists($pageName)) {
  $pageName = PAGES_DIR . "page404.php";
}
include $pageName;

?>
