<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>个人主页(●´ω｀●)ゞ</title>
  <link rel="icon" href="images/sandI/logo-favicon-yellow.png" type="image/x-icon">
  <link rel="stylesheet" type="text/css"
    href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700,300i%7CRoboto:400,300i">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/fonts.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/personal_homepage.css">
</head>

<body>
  <!-- <div class="ie-panel"><a href="http://windows.microsoft.com/en-US/internet-explorer/"><img
        src="images/ie8-panel/warning_bar_0000_us.jpg" height="42" width="820"
        alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a>
  </div> -->
  <div class="preloader">
    <div class="preloader-body">
      <div class="cssload-container">
        <div class="cssload-speeding-wheel"></div>
      </div>
      <p>Loading...</p>
    </div>
  </div>


  <div class="page">
    <!-- 头部 -->

    <script>
      document.addEventListener('DOMContentLoaded', function() {


        // 检查用户登录状态的函数
        function checkLoginStatus() {
          // 跳转测试
          fetch('php/check-login.php')
            .then(response => response.json())
            .then(data => {
              if (data.logged_in) {
                // console.log('用户登录成功');

              } else {
                alert('您尚未登录，请登录')
                window.location.href = "login.php"
              }
            })
            .catch(error => console.error('Error:', error));
        }

        // 页面加载完成后检查登录状态
        checkLoginStatus();
      });
    </script>
    <?php
    include 'moudle/header.php';
    include 'php/databases_link.php';
    session_start();
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM users WHERE user_id=$user_id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      // 查找到用户
      $row = $result->fetch_assoc();
    } else {
      // 为查找到用户
      // 咱永远不知道用户会以什么样的bug卡到这个地方
      header("Location: http://sandbar/login.php");
    }

    ?>
    <!-- 头部 -->

    <!-- 页面内容 -->
    <div class="big-box row container">

      <div class="left col-3">
        <div class="information">
          <?
          echo '<img class="avatar" src="images/userAvatar/default/' . $row['avatar'] . '" alt="">';
          echo '<br>';
          echo '<div class="name-email">';
          echo '<p class="name">用户名：' . $row['username'] . '</p>';
          echo '<p class="email">邮箱：' . $row['email'] . '</p>';
          echo '</div>';
          ?>
          <br>
          <br>
          <form action="php/logout.php" method="POST">
            <button type="submit" class="logout">退出登录</button>
          </form>
        </div>
      </div>
      <div class="right col-9">
        <div class="welcomeTime">
          <p>亲爱的&nbsp;&nbsp;<span style="font-weight:bolder;color:#ffb83b"><? echo $row['username']; ?></span></p>
          <p id="current-time"></p>
          <?php
          // $current_time = time();
          // $create_at = strtotime($row['created_at']);
          // $total_time = $current_time - $create_at;
          // echo '<p class="jionTime">您已经加入我们 ' . date('d', $total_time) . ' 天 ' . date('H:i:s') . ' 了，非常感谢您的使用！！</p>';
          ?>
        </div>
        <div class="shopCartShow">
          <div class="line row">
            <div class="col-3 title-left">
              购物车
            </div>
            <div class="col title-right"></div>
          </div>
          <div class="shop-list">
            <?php include 'php/shopCarCom.php'; ?>
            <!-- 计算总价格并且输出商品详细信息 -->
            <div class="total-price">
              <p>总价格：</p>
              <p class="price">
                <? echo $total_price; ?>
                <br>

              </p>
              <!-- <button class="BoxInsideCenter">删除全部</button> -->
              <button class="BoxInsideCenter" onclick="removeAll_from_cart()">立即购买</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- 页面内容 -->

    <!-- 页脚部分 -->
    <?php include 'moudle/footer.php' ?>

    <!-- 页脚部分 -->

    <div class="snackbars" id="form-output-global"></div>
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        // 更新时间
        function updateTime() {
          fetch('php/get_time.php')
            .then(response => response.json())
            .then(data => {
              document.getElementById('current-time').textContent = data.time;

            })
            .catch(error => console.error("Error:", error));
        }
        // 每 1 秒更新一次时间
        setInterval(updateTime, 1000);
      });

      function removeFromCart(productId) {

        fetch(`php/remove_from_cart.php?product_id=${productId}`)
          .then(response => response.json())
          .then(data => {
            window.location.reload();
          })
          .catch(error => console.error("Error:", error));
      }

      function removeAll_from_cart() {
        fetch(`php/removeAll_from_cart.php`)
          .then(response => response.json())
          .then(data => {
            window.location.reload();
          })
          .catch(error => console.error("Error:", error));
      }

      // 商品更新数量
      function updateQuantity(action, productId) {
        var quantityChange = action === 'add' ? 1 : -1;
        var productname = `product` + productId;

        $.post('php/update_quantity.php', {
          product_id: productId,
          action: action,
          quantity_change: quantityChange
        }, function(data) {
          if (data.error) {
            alert(data.error);
          } else {
            // 更新页面上的数量显示
            var productOne = document.getElementById(productname);

            $(productOne).text(data.newQuantity);
          }
        }, 'json');
      }
    </script>
    <script src="/js/jquery-3.7.1.min.js"></script>
  </div>
  <script src="js/core.min.js"></script>
  <script src="js/script.js"></script>
  <script src="js/goods.js"></script>
</body>

</html>