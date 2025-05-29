<?php
// logout.php
session_start(); // 确保会话已经启动

// 执行登出操作
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // 销毁会话中所有数据
  $_SESSION = array();
  // 重定向到登出页面
  session_destroy();
  header("Location: http://sandbar/login.php");
  exit;
}

// 关闭会话
?>