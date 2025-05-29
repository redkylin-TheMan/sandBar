<?php


use LDAP\Result;


session_start();
$product_id = $_GET['product_id'];
// 接受传输过来的商品id

// echo $user_id;
// session_destroy();


// 检测用户登录状态
if (isset($_SESSION['user_id'])) {
  // 已登录
  echo '以登录';

  if ($product_id) {
    include '../php/databases_link.php';
    // 链接数据库

    $sql = "SELECT quantity FROM cart where user_id=$user_id AND product_id=$product_id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      // 如果购物车中已有该商品，则增加数量
      $quantity = $result->fetch_assoc()['quantity'] + 1;
      $sql = "UPDATE cart SET quantity=$quantity WHERE user_id=$user_id AND product_id=$product_id";
      if ($conn->query($sql)) {
        echo '商品信息更新成功';
      } else {
        echo '商品更新失败';
      }
    } else {
      // 如果购物车中没有该物品，则进行正常添加
      $sql = "INSERT INTO cart (user_id,product_id,quantity)VALUES($user_id,$product_id,1)";
      if ($conn->query($sql)) {
        echo '商品添加成功';
      } else {
        echo '商品添加失败';
      }
    }
    $conn->close();

  } else {
    echo '商品id错误';
  }

} else {
  echo '未登录';
}

echo '<br>';



?>