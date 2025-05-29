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

// 判断表单是否提交               
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
  // 存储用户信息进入数据表
  $username = $conn->real_escape_string($_POST['username']);
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $email = $conn->real_escape_string($_POST['email']);

  // 为用户随机选择头像
  $avatars = ['default_1.jpg', 'default_2.jpg', 'default_3.jpg', 'default_4.jpg', 'default_5.jpg', 'default_6.jpg', 'default_7.jpg'];
  $randomAvatar = $avatars[array_rand($avatars)];

  // 插入用户数据
  $sql = "INSERT INTO users (username, password, email,avatar) VALUES ('$username', '$password', '$email','$$randomAvatar')";


  if ($conn->query($sql) === TRUE) {
    // echo "新记录插入成功";
    // 登录成功，设置会话变量
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $username;
    $_SESSION['avatar'] = 'moudle/' . $randomAvatar;  //随机头像的相对路径完整url

    echo $_SESSION['loggedin'];
    echo $_SESSION['username'];
    echo $_SESSION['avatar'];

    header("Location: http://sandbar/login.php");

  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
}
?>