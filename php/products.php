<?php
include 'databases_link.php';

$sql = "SELECT product_id, product_name, product_description, price, stock_quantity, brand_name, category, image_url FROM products";
// 数据库查询语句，查询该页面需要的对应内容
$result = $conn->query($sql);


if ($result->num_rows > 0) {
  // 输出数据
  while ($row = $result->fetch_assoc()) {

    echo '    <a class="goods-item card" href="goods1.php?product_id=' . $row['product_id'] . '">';
    echo '    <img src="./images/goods/' . $row['image_url'] . '" alt="asdasd">';
    echo '    <div class="card-body">';
    echo '    <h5 class="card-title price"> ' . $row['price'] . '￥</h5>';
    echo '      <h5 class="card-title goods_title">' . $row['product_name'] . '</h5>';
    echo '      <p class="card-text">' . $row['product_description'] . '</p>';
    echo '      <p class="brand">' . $row['brand_name'] . ' <img src="./images/icon/客服.png" alt=""></p>';
    echo '    </div>';
    echo '  </a>';
  }
} else {
  echo "0 结果";
}
$conn->close();
?>