<h1>Регистрация пользователя</h1>
<?php
  if ($user) {
    ?>
    <p>Привет, <?=$user['name']?>!</p>
    <?php
  } else {
    ?>
<form action="" method="post">
  <input type="text" name="newuser"><br>
  <input type="password" name="newpass"><br>
  <input type="submit" name="" value="Зарегистрировать">
</form>

    <?php
  }
 ?>

<a href="index.php">В каталог</a>
