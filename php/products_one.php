<?php

// session_start();

// 获取商品 ID
$product_id = isset($_GET['product_id']) ? intval($_GET['product_id']) : 0;

// 检查商品 ID 是否有效
if ($product_id > 0) {
  // 连接数据库
  include 'databases_link.php';
  // 获取商品详细信息
  $sql = "SELECT * FROM products WHERE product_id=$product_id";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
  } else {
    echo "没有找到商品";
  }

  $conn->close();
} else {
  echo "无效的商品 ID";
}
?>