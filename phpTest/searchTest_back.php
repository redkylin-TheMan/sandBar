<?php

$servername = "localhost";
$username = "root";
$password = "123456";
$dbname = "sandbar";
// header("Content-Type: application/json; charset=utf-8");

// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);

// 检查连接
if ($conn->connect_error) {
    echo '链接失败';
    die("连接失败: " . $conn->connect_error);
} else {
}


// echo '数据库链接成功';
// 获取用户输入的关键词
$keyword = $_GET["keyword"] ?? ''; // 使用空字符串作为默认值，防止未定义错误
// 防止SQL注入
$safeKeyword = $conn->real_escape_string($keyword);

echo '防注入测试成功';

// 构建查询语句
$query = "SELECT * FROM products WHERE product_name LIKE '%$safeKeyword%' OR product_description LIKE '%$safeKeyword%'";
echo '语句查询成功';
// 执行查询
$result = $conn->query($query);

// 检查是否有匹配的商品
if ($result->num_rows > 0) {
    // 显示查询结果
    while ($row = $result->fetch_assoc()) {
        echo "<h2>{$row['product_name']}</h2>";
        echo "<p>{$row['product_description']}</p>";
        echo "<p>价格：{$row['price']}</p>";
        echo "<hr>";
    }
} else {
    echo "未找到相关商品。";
}

// 关闭数据库连接
$conn->close();
