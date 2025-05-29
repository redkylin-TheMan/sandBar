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
    $name = $conn->real_escape_string($_POST['name']);
    $message = $conn->real_escape_string($_POST['message']);

    // 插入数据到数据库
    $sql = "INSERT INTO guestbook (name, message) VALUES ('$name', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "留言成功！";
    } else {
        echo "留言失败: " . $conn->error;
    }
}

$conn->close();
