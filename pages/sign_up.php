<?php
$user = [];
if($_POST) {
  $newuser = $_POST['newuser'];
  $newpass = md5($_POST['newpass']);
  $user = [$newuser,$newpass];
  setUser($user);
  $_SESSION['user_id'] = mysqli_insert_id($conn);
}

echo render('sign_up',['user' => $user]);
?>
