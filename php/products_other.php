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
  while ($product_other_row = $product_other_result->fetch_assoc()) {
    $i = 0;
    if ($random_array[$i] == $product_other_row['product_id']) {
      echo '    <div class="col other">';
      echo '    <img src="images/goods/goods (1).jpg" alt="">';
      echo '    <div class="word BoxInsideCenter">袜子</div>';
      echo '  </div>';
      $i++;
      echo $product_other_row['product_id'];
      echo $product_other_row['product_name'];
    }
  }
} else
  echo '数据没内容';

?>