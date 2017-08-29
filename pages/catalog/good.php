<?php
if ($_POST) {
  $comment = secur($_POST['comment']);
  $good_id = $_POST['id'];
  setComment($comment, $good_id);
}
if (isset($good_id)) {
  $good = getGood($good_id);
  $comments = getComments($good_id);
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
