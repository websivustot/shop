<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {
  $login = $_POST['login'];
  $pass = md5($_POST['pass']);
  $sql = "SELECT * FROM users WHERE name = '{$login}' AND password = '{$pass}'";
  if ($user = queryOne($sql)) {
    session_start();
    $_SESSION['user_id'] = $user['id'];
    //setcookie('user_id', $user['id'], time() + 60 * 2);
    header("Location: /catalog");
    exit;
  } else {
    $message = "Wrong login or password";
  }
}
echo render('login', ['message' => $message]);
?>
