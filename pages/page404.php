<?php
$page = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
echo render('page404', ['page' => $page]);
 ?>
