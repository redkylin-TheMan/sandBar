<?php
// get_time.php
include 'databases_link.php';
// 链接数据库

session_start();
header("Content-Type: application/json; charset=utf-8");
$user_id = $_SESSION['user_id'];

$getTime = "SELECT created_at FROM users where user_id=$user_id";
$result = $conn->query($getTime);
$row = $result->fetch_assoc();
// 获得创建时间

$current_time = time();
$created_at = strtotime($row['created_at']);
$total_time = $current_time - $created_at;
$nowTime = "您已经加入我们 " . date('d', $total_time) . " 天 " . date('H:i:s', $total_time) . " 了，非常感谢您的使用！！";
// $nowTime = "123";

// 获取当前时间并格式化为 JSON
echo json_encode(['time' => $nowTime]);
