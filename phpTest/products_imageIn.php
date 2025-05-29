<?php
$servername = "localhost";
$username = "root";
$password = "123456";
$dbname = "sandbar";

// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);

// 检查连接
if ($conn->connect_error) {
  die("连接失败: " . $conn->connect_error);
}

// 假设你想更新 10 个商品的 image_url
for ($i = 1; $i <= 60; $i++) {
  $sql = "UPDATE products SET image_url = 'goods ($i).jpg' WHERE product_id=$i";

  if ($conn->query($sql) === TRUE) {
    echo "记录 $i 更新成功";
  } else {
    echo "记录 $i 更新失败: " . $conn->error;
  }
}

$conn->close();
?>