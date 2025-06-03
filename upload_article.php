<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>上传文章</title>
    <link rel="icon" href="images/sandI/logo-favicon-yellow.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700,300i%7CRoboto:400,300i">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        /* 页面标题样式 */
       .page-title {
            text-align: center;
            margin: 40px 0;
            font-size: 2.5rem;
            color: #333;
            position: relative;
        }

       .page-title:after {
            content: '';
            display: block;
            width: 80px;
            height: 4px;
            background: linear-gradient(45deg, #ffb83b, #ff9500);
            margin: 15px auto;
            border-radius: 2px;
        }

        /* 表单容器样式 */
       .form-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* 提交按钮样式 */
       .btn-primary {
            background: linear-gradient(45deg, #ffb83b, #ff9500);
            border: none;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

       .btn-primary:hover {
            background: linear-gradient(45deg, #ff9500, #ff7b00);
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

    <div class="page">
        <!-- 头部 -->
        <?php include 'moudle/header.php' ?>

        <div class="container">
            <h1 class="page-title">上传文章</h1>
            <div class="form-container">
                <form action="php/upload_article_post.php" method="post">
                    <div class="form-group">
                        <label for="title">标题</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="form-group">
                        <label for="content">文章内容</label>
                        <textarea class="form-control" id="content" name="content" rows="10" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">提交文章</button>
                </form>
            </div>
        </div>

        <!-- 底部 -->
        <?php include 'moudle/footer.php' ?>
    </div>

    <script src="js/core.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>