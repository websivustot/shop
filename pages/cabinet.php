<?php
$user = getUser($_SESSION['user_id']);
echo render('cabinet', ['user' => $user]);
echo"cabinet";
 ?>
