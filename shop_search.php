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
        .card-title {
            height: 1.5rem;
            overflow: hidden;
            font-size: 1rem;
        }

        .card-body .price {
            color: #e4393c;
            font-size: 1.5rem;
            line-height: 1.5rem;
        }
    </style>
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
        <?php include 'moudle/header.php' ?>
        <!-- 头部 -->


        <div class="container">
            <!-- 搜索栏 -->
            <form class="top text-center" action="shop_search.php" method="GET">
                <div class="search row">
                    <div class="icon">
                        <span class=" fa-search col-1"></span>
                    </div>
                    <input type="text" name="keyword" class="col" placeholder="最近热搜：重岳同款跑步鞋" require>
                    <!-- <label for="></label> -->
                    <button type="submit" class="col-2 button">搜索</button>
                </div>
            </form>
            <!-- 搜索栏 -->

            <!-- 商品栏 -->
            <div class="goods container">

                <div class="right container row">

                    <!-- 商品部分 -->

                    <!-- 商品卡片 -->

                    <!-- 用于输出搜索到的所有的商品 -->
                    <?php include 'php/products_search.php' ?>

                    <!-- 商品卡片 -->
                </div>
                <!-- 商品栏 -->
            </div>
        </div>
    </div>


    <?php include 'moudle/footer.php' ?>


    <div class="snackbars" id="form-output-global"></div>

    <script src="js/core.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>