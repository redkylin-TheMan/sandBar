<?
// 查找随机的商品
include 'databases_link.php';

$find_product_other = "SELECT * FROM `products`";
$product_other_result = $conn->query($find_product_other);
//查找商品表里面的所有数据

//创建一个数组
$random_array = array();
//根据商品表的数量随机出四个随机数
for ($i = 0; $i < 4; $i++) {
  $random_array[$i] = rand(1, 44);
}

if ($product_other_result->num_rows > 0) {
  $count = 0;
  while ($product_other_row = $product_other_result->fetch_assoc()) {
    if (in_array($product_other_row['product_id'], $random_array)) {
      echo '<div class="product">';
      echo '<img src="images/goods/' . $product_other_row['image_url'] . '" alt="">';
      echo '<div class="product-name">' . $product_other_row['product_name'] . '</div>';
      echo '</div>';
      $count++;
      if ($count >= 4) {
        break;
      }
    }
  }
} else {
  echo '数据没内容';
}

?>