<?php
session_start(); // 确保会话已经启动
include 'databases_link.php';
$product_id = $_GET['product_id'];
$user_id = $_SESSION['user_id'];
// 获取要删除的商品 ID和用户ID
// 在购物车里的表查询对应的商品id
$dropSelect = "SELECT * from cart where user_id=$user_id AND product_id=$product_id";
$result = $conn->query($dropSelect);
if ($result->num_rows > 0) {
  // echo json_encode(['message' => '商品查找成功']);
  $dropProduct = "delete from cart where user_id=$user_id AND product_id=$product_id";
  if ($conn->query($dropProduct))
    echo json_encode(['message' => '商品删除成功']);
  else
    echo json_encode(['message' => '商品删除失败']);
} else
  echo json_encode(['message' => '商品查找失败']);
$conn->close();
?>