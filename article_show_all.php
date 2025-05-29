<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>博客列表</title>
    <link rel="icon" href="images/sandI/logo-favicon-yellow.png" type="image/x-icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,300i">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/article.css">
    <link rel="stylesheet" href="css/fonts.css">

</head>

<body>
    <div class="preloader">
        <div class="preloader-body">
            <div class="cssload-container">
                <div class="cssload-speeding-wheel"></div>
            </div>
            <p>Loading...</p>
        </div>
    </div>

    <div class="page">
        <?php
        // 包含头部模块
        include 'moudle/header.php';

        // 启动会话
        session_start();
        // 包含数据库连接文件
        include 'php/databases_link.php';

        // 查询数据库获取博客列表
        $stmt = $conn->prepare("SELECT id, title, content, created_at, image_url FROM articles ORDER BY created_at DESC LIMIT 10");
        $stmt->execute();
        $result = $stmt->get_result();
        ?>

        <div class="container">
            <h1 class="page-title">博客列表</h1>
            <div class="blog-list">
                <?php while ($row = $result->fetch_assoc()): ?>
                    <div class="blog-item">
                        <div class="blog-image">
                            <img src="images/article_image/<?= htmlspecialchars($row['image_url']) ?>" alt="文章图片">
                        </div>
                        <div class="blog-content">
                            <h2 class="blog-title"><?= htmlspecialchars($row['title']) ?></h2>
                            <p class="blog-date"><?= htmlspecialchars($row['created_at']) ?></p>
                            <p class="blog-summary"><?= nl2br(htmlspecialchars(substr($row['content'], 0, 150))) ?>...</p>
                            <a href="article.php?article_id=<?= $row['id'] ?>" class="btn btn-primary">阅读全文</a>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>

        <?php
        // 包含底部模块
        include 'moudle/footer.php';
        ?>
        <script src="js/core.min.js"></script>
        <script src="js/script.js"></script>
    </div>
</body>

</html>