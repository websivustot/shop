<?php

  echo("<h1>Каталог</h1>");
  foreach ($goods as $index => $good):?>
      <div class="cell">
        <div><a href="/catalog/<?=$good['id']?>"><?=$good['name']?></a></div>
        <img src="/img/<?=$good['img']?>" alt="">
        <p>Цена: <?=$good['price']?></p>
        <button type="button" onClick = "basket('<?=$good['id']?>')">Добавить товар в корзину</button>
      </div>
<?php
endforeach;
?>
<br><button type="button" onClick = "showMore('<?=$good['id']?>')">Показать больше товаров</button>
    <button type="button" onClick = "showBasket()">Перейти в корзину</button>
    <button type="button" onClick = "clearBasket()">Очистить корзину</button>
