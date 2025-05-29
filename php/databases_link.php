<?php
$servername = "localhost";
$username = "root";
$password = "123456";
$dbname = "sandbar";
// header("Content-Type: application/json; charset=utf-8");

// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);

// 检查连接
if ($conn->connect_error) {
  echo '链接失败';
  die("连接失败: " . $conn->connect_error);
} else {
}
