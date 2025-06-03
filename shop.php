<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>买买买(￣ ii ￣;)ﾌｰﾝ</title>
  <link rel="icon" href="images/sandI/logo-favicon-yellow.png" type="image/x-icon">
  <link rel="stylesheet" type="text/css"
    href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700,300i%7CRoboto:400,300i">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/fonts.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/shop.css">
  <style>
    /* 可以在这里添加一些内联样式进行快速调整 */
    body {
      background-color: #f8f9fa; /* 浅灰色背景 */
    }
  </style>
</head>

<body>
  <!-- 预加载器 -->
  <div class="preloader">
    <div class="preloader-body">
      <div class="cssload-container">
        <div class="cssload-speeding-wheel"></div>
      </div>
      <p>Loading...</p>
    </div>
  </div>

  <!-- 页面 -->
  <div class="page">
    <!-- 头部 -->
    <?php include 'moudle/header.php' ?>

    <!-- 主容器 -->
    <div class="container">
      <!-- 搜索栏 -->
      <form class="top text-center" action="shop_search.php" method="GET">
        <div class="search row justify-content-center">
          <div class="icon">
            <span class="fa fa-search col-1"></span>
          </div>
          <input type="text" name="keyword" class="col-8" placeholder="最近热搜：重岳同款跑步鞋" required>
          <button type="submit" class="col-2 button">搜索</button>
        </div>
      </form>

      <!-- 商品栏 -->
      <div class="goods container">
        <div class="right container row justify-content-center">
          <!-- 商品卡片 -->
          <!-- 用于输出所有的商品 -->
          <?php include 'php/products.php' ?>
          <!-- 商品卡片 -->
        </div>
      </div>
    </div>

    <!-- 页脚 -->
    <?php include 'moudle/footer.php' ?>
  </div>

  <!-- 全局消息提示 -->
  <div class="snackbars" id="form-output-global"></div>

  <!-- 脚本 -->
  <script src="js/core.min.js"></script>
  <script src="js/script.js"></script>
</body>

</html>