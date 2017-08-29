<?php
function render($templateName, $params = [], $useLayout = true) {
  $content = renderTemplate($templateName, $params);
  if($useLayout){
    $content = renderTemplate('layout', ['content' => $content]);
  }
  return $content;
}

function renderTemplate($templateName, $params = []) {
  ob_start();
  extract($params);
  include TEMPLATES_DIR . $templateName . '.php';
  return ob_get_clean();
}

function getConnection() {
  static $conn = null;
  if (!$conn) {
    $config = include CONFIG_DIR . 'db.php';
    $conn = mysqli_connect($config['host'],
    $config['user'],$config['password'],$config['db']);
  }
  return $conn;
}

function secur($data) {
  $data = htmlspecialchars(strip_tags($data));
  return $data;
}

function execute($sql) {
  return mysqli_query(getConnection(), $sql);
}

function queryAll($sql) {
  var_dump($sql);
  return mysqli_fetch_all(execute($sql), MYSQLI_ASSOC);

}

function queryOne($sql) {
  return mysqli_fetch_all(execute($sql), MYSQLI_ASSOC)[0];
}

function getGoods($offset = 0){
  return queryAll("SELECT * FROM catalog.goods LIMIT 5 OFFSET $offset");
}

function getGood($number){
  return queryOne("SELECT * FROM catalog.goods WHERE id = $number");
}

function getComments($number){
  return queryAll("SELECT * FROM catalog.comments WHERE good_id = $number");
}

function setBusket($good_id, $user_id, $quantity) {
  return execute("INSERT INTO busket (good_id,user_id,quantity) VALUES ('$good_id','$user_id','$quantity')");
}

function setComment($comment, $good_id){
  return execute("INSERT INTO catalog.comments (text,good_id)
            VALUES ('$comment','$good_id')");
}

function setUser($user){
  return execute("INSERT INTO catalog.users (name,password)
            VALUES ('$user[0]','$user[1]')");
}

function getUser($number){
  return queryOne("SELECT * FROM catalog.users WHERE id = $number");
}

function parseRequest(){
  //var_dump($_SERVER['REQUEST_URI']);
  //var_dump(preg_replace(["#^/#"], "", $_SERVER['REQUEST_URI']));
  if(!$path = preg_replace(["#^/#"], "", $_SERVER['REQUEST_URI'])){
    $path = "catalog";
  }
  $res = explode("/", $path);
  if($res[0] == ''){
    $res[0] = "index";
  }
  if (!$res[1]) {
    $res[1] = "index";
  }
  else {
    $res[1] = strtok($res[1], ".php?");
  }
  return $res;
}
 ?>
