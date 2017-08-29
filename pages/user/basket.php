<?php
if(isset($_SESSION['user_id'])) {
  if($_SERVER['REQUEST_METHOD'] == 'GET') {
    $user_id = $_SESSION['user_id'];
    $good_id = $_GET['good_id'];
    $quantity = $_GET['quantity'];
    $basket = ['good' => $good_id, 'user' => $user_id, 'quantity' => $quantity];
    if (setBusket($good_id, $user_id, $quantity)) {
      $_SESSION['basket'][] = $basket;
      //var_dump($_SESSION['busket']);
      $result = array ('result' => 1);
    }
    else {
      $result = array ('result' => 0);
    }
    $result = json_encode($result, JSON_UNESCAPED_UNICODE);
    echo render('basket', [
      'result' => $result
    ], false);
  }
} else {
  header("Location: login");
  exit;
}
 ?>
