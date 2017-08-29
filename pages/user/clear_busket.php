<?php
if(isset($_SESSION['user_id'])) {
  if($_SERVER['REQUEST_METHOD'] == 'GET') {
    $user_id = $_SESSION['user_id'];
    if ($user_id == $_GET['user_id']) {
      unset($_SESSION['busket']);
      echo json_encode($result, JSON_UNESCAPED_UNICODE);
    }
    else {
      $result = array ('result' => 0);
      echo json_encode($result, JSON_UNESCAPED_UNICODE);
    }
  }
} else {
  header("Location: login.php");
  exit;
}
 ?>
