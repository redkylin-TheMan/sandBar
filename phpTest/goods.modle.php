<?php
session_start();

// 获取商品 ID
$product_id = isset($_GET['product_id']) ? intval($_GET['product_id']) : 0;

// 检查商品 ID 是否有效
if ($product_id > 0) {
  // 连接数据库
  $servername = "localhost";
  $username = "your_username";
  $password = "your_password";
  $dbname = "your_dbname";

  $conn = new mysqli($servername, $username, $password, $dbname);

  // 检查连接
  if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
  }

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
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>商品详情</title>
</head>

<body>
  <?php
  if (isset($row)) {
    echo "<h1>" . $row['product_name'] . "</h1>";
    echo "<p>" . $row['product_description'] . "</p>";
    echo "<p>价格: " . $row['price'] . "</p>";
    echo "<p>库存: " . $row['stock_quantity'] . "</p>";
    echo "<img src='" . $row['image_url'] . "' alt='商品图片'>";
  }
  ?>
</body>

</html>