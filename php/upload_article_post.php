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

// 检查是否提交了表单
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $conn->real_escape_string($_POST['title']);
    $content = $conn->real_escape_string($_POST['content']);
    $created_at = date('Y-m-d H:i:s'); // 获取当前时间
    $image_url = ''; // 这里可以根据需要添加图片上传功能

    // 插入数据到数据库
    $sql = "INSERT INTO articles (title, content, created_at, image_url) VALUES ('$title', '$content', '$created_at', '$image_url')";

    if ($conn->query($sql) === TRUE) {
        // 文章上传成功，跳转到 article_show_all.php 页面
        header("Location: ../article_show_all.php");
        exit;
    } else {
        echo "文章上传失败: " . $conn->error;
    }
}

$conn->close();