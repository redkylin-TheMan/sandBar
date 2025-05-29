<?php
include 'databases_link.php';

$keyword = $_GET["keyword"] ?? ''; // 使用空字符串作为默认值，防止未定义错误
// 防止SQL注入
$safeKeyword = $conn->real_escape_string($keyword);
// echo '防注入测试成功';

$query = "SELECT * FROM products WHERE product_name LIKE '%$safeKeyword%' OR product_description LIKE '%$safeKeyword%'";


// 数据库查询语句，查询该页面需要的对应内容
$result = $conn->query($query);


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
    echo "<img class='nothing_img' src='/images/什么也没有呢.png'></img>";
}
$conn->close();
