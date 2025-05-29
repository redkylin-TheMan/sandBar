<?php
// echo '跳转成功';
// check-login.php
session_start();
header('Content-Type: application/json');

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
  echo json_encode([
    'logged_in' => true,
    'avatar_url' => $_SESSION['avatar']
  ]);
} else {
  echo json_encode(['logged_in' => false]);
}

?>