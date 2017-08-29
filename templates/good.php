<h1><?=$name?></h1>
<img src="/img/<?=$img?>" alt="">
<p><?=$price?></p>
<p><?=$desc?></p>
<button type="button" onClick = "basket('<?=$id?>')">Добавить товар в корзину</button>
<button type="button" onClick = "showBasket('<?=$id?>')">Перейти в корзину</button>
<button type="button" onClick = "clearBasket('<?=$id?>')">Очистить корзину</button>
<div>
  <h2>Comments:</h2>
  <div><?php
  foreach ($comments as $comment) {
    echo("<p>{$comment['text']}</p>");
  }

  ?></div>
  <form class="" action="" method="post">
    <input type="text" name="comment" value="">
    <input type="hidden" name="id" value="<?=$id?>">
    <input type="submit" name="" value="Send comment">

  </form>
</div>
