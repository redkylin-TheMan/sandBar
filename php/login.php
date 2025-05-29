<?php
include 'databases_link.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
  $username = $conn->real_escape_string($_POST['username']);
  $password = $_POST['password'];

  // echo $username . '   ' . $password;

  $sql = "SELECT password FROM users WHERE username = '$username'";
  $result = $conn->query($sql);
  // echo $result;

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
      // echo "登录成功";
      // 这里可以设置session或cookie来保持登录状态

      session_start();   //开始会话
      if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
        $usernameFromForm = $_POST['username'];
        $passwordFromForm = $_POST['password'];


        // 这里应该有更安全的密码验证方式，比如使用password_verify()
        if ($usernameFromForm == $username && $passwordFromForm == $password) {

          // 通过用户的用户名查找对应的头像路径
          $sql2 = "SELECT avatar,user_id from users where username='$usernameFromForm'";
          $result = $conn->query($sql2);
          $row = $result->fetch_assoc();
          // echo $row['avatar'];

          // 登录成功，设置用户会话变量
          $_SESSION['loggedin'] = true;
          $_SESSION['username'] = $usernameFromForm;
          $_SESSION['avatar'] = $row['avatar'];
          $_SESSION['user_id'] = $row['user_id'];

          // 重定向到主页
          header("Location: http://sandbar/index.php");
          exit();
        } else {
          echo "用户名或密码错误";
        }
      }
    } else {
      echo "密码错误";
    }
  } else {
    echo "用户名不存在";
  }
}

$conn->close();


?>