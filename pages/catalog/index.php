<?php
if ($_POST) {
  $comment = secur($_POST['comment']);
  $good_id = $_POST['id'];
  setComment($comment, $good_id);
}
if ($_GET) {
  $number = $_GET['id'];
  $good = getGood($number);
  $comments = getComments($number);
  echo"!!!";
  echo render('good', [
    'name' => $good['name'],
    'price' => $good['price'],
    'img' => $good['img'],
    'desc' => $good['description'],
    'id' => $good['id'],
    'comments' => $comments
  ]);
}
else {
  $goods = getGoods();
  echo render('catalog', ['goods' => $goods]);
}

 ?>
