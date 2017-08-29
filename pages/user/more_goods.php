<?php

  if($_SERVER['REQUEST_METHOD'] == 'GET') {
    $good_id = $_GET['good_id'];
    var_dump($good_id);
    $goods = getGoods($good_id);
    echo json_encode($goods, JSON_UNESCAPED_UNICODE);
  }

 ?>
