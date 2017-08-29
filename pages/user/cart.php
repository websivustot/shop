<?php
if(isset($_SESSION['user_id'])) {
  $basket = $_SESSION['basket'];
  var_dump($_SESSION['basket']);
  $goods = getGoods();
  echo render('cart', ['basket' => $basket,'goods' => $goods]);
} else {
  header("Location: login");
  exit;
}
 ?>
