<?php
  echo("<h1>Корзина</h1>");
  if ($basket){
  foreach ($goods as $index => $good):?>
<?php foreach($basket as $position) {
  if ($good['id'] == $position['good']) {?>
      <div class="cell">
        <div><a href="?id=<?=$good['id']?>"><?=$good['name']?></a></div>
        <img src="/img/<?=$good['img']?>" alt="">
        <p>Цена: <?=$good['price']?></p>
        <p>Количество: <?=$position['quantity']?></p>
      </div>
<?php
    }
  }
endforeach;
}
else {
  echo("Корзина пуста.");
}
?>
<br>
    <button type="button" onClick = "clearBasket('<?=$good['id']?>')">Очистить корзину</button>
    <br>
    <a href="/">В каталог</a>
