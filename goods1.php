<!DOCTYPE html>
<html lang="en">

<?
session_start();
// echo '<pre>';
// print_r($_SESSION);
// echo '</pre>';
// session_destroy();
?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>商品详情页面(●´ω｀●)ゞ</title>
  <link rel="icon" href="images/sandI/logo-favicon-yellow.png" type="image/x-icon">
  <link rel="stylesheet" type="text/css"
    href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700,300i%7CRoboto:400,300i">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/fonts.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/shop.css">
  <link rel="stylesheet" href="css/goods.css">

  <style>
    .other img {
      position: relative;
      width: 100%;
    }

    .other .word {
      background-color: #ffb83b;
      font-size: 1rem;
      color: white;
      font-weight: bolder
    }
  </style>
</head>

<body>
  <?php
  include 'php/products_one.php'
    ?>
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
    <?php include 'moudle/header.php' ?>

    <!-- 头部 -->
    <div class="container">
      <!-- 搜索栏 -->
      <div class="top text-center">
        <div class="search row">
          <span class="icon fa-search col-1"></span>
          <input type="text" class="col" placeholder="最近热搜：重岳同款跑步鞋">
          <!-- <label for="></label> -->
          <span class="col-2 button">搜索</span>
        </div>
      </div>
      <!-- 搜索栏 -->

      <div class="line line1 row">
        <div class="col-2 left">商品详情</div>
        <div class="col right"></div>
      </div>

      <div class="container goods row">
        <!-- 商品图片 里面还要包含预览 -->
        <div class="image col-4">
          <!-- 商品图片 -->

          <?php
          echo '<img class="bigPic" src="./images/goods/' . $row['image_url'] . '" alt="">';
          ?>
          <!-- <img class="bigPic" src="./images/goods/goods (1).jpg" alt=""> -->
          <!-- 其他商品图片 -->
        </div>
        <!-- 商品详情 里面包含 -->

        <div class="details col-6">
          <?
          echo '<h5 class="title">' . $row['product_description'] . '</h5>';
          ?>
          <div class="buy-summary row">
            <div class="col-2 left">
              <p>价格：</p>
              <p>优惠券：</p>
              <p>促销：</p>
            </div>
            <div class="col right">
              <?
              echo '<p class="price">￥' . $row['price'] . '</p>'
                ?>
              <div class="discount">
                <span class="leftS"></span>
                <p class="">满200-30</p>
                <span class="rightS"></span>
              </div>
              <div class="promotino">
                <p>反正就是一大堆的促销内容</p>
              </div>
            </div>
          </div>
          <!-- 配送地点 -->
          <div class="meail row">
            <div class="left col-2">
              <p>配送至：</p>
            </div>
            <input type="text" id="location" placeholder="请输入地址">
            <?
            echo '<button class="buy_now" onclick="buy(' . $row['product_id'] . ')">立即购买</button>';
            echo '<button class="buy_later" onclick="addToCar(' . $row['product_id'] . ')">加入购物车</button>';
            ?>
          </div>

        </div>
        <!-- 侧边推荐 -->
        <div class="other-goods col-2">
        </div>
      </div>

      <!-- 页脚部分 -->
      <?php include 'moudle/footer.php' ?>

      <!-- 页脚部分 -->

      <div class="snackbars" id="form-output-global"></div>

    </div>
    <script src="js/core.min.js"></script>
    <script src="js/script.js"></script>
    <script src="js/goods.js"></script>

    <script>
      function addToCar(product_id) {
        fetch(`/php/addToCar.php?product_id=${product_id}`)
          .then(Response => Response.json())
          .then(data => {
            alert(data.message)
            if (data.message == '请先登录')
              window.location.href = 'login.php'
          })
          .catch(error => console.error('Error:', error));
      }
      function buy(product_id) {

      }

    </script>

</body>

</html>