<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>博客列表</title>
    <link rel="icon" href="images/sandI/logo-favicon-yellow.png" type="image/x-icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,300i">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/article.css">
    <link rel="stylesheet" href="css/fonts.css">
    <style>
        /* 添加新的卡片样式 */
        .blog-list {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 30px;
            padding: 20px 0;
        }

        .blog-item {
            background: #fff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            cursor: pointer;
            position: relative;
        }

        .blog-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }

        .blog-image {
            height: 200px;
            overflow: hidden;
        }

        .blog-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .blog-item:hover .blog-image img {
            transform: scale(1.05);
        }

        .blog-content {
            padding: 20px;
        }

        .blog-title {
            font-size: 1.5rem;
            margin-bottom: 10px;
            color: #333;
            font-weight: 600;
        }

        .blog-date {
            font-size: 0.85rem;
            color: #777;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
        }

        .blog-date i {
            margin-right: 5px;
            color: #ffb83b;
        }

        .blog-summary {
            color: #555;
            line-height: 1.6;
            margin-bottom: 20px;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .read-more {
            display: inline-block;
            padding: 8px 20px;
            background: linear-gradient(45deg, #ffb83b, #ff9500);
            color: white;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
        }

        .read-more:hover {
            background: linear-gradient(45deg, #ff9500, #ff7b00);
            box-shadow: 0 3px 10px rgba(255, 152, 0, 0.3);
        }

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

        @media (max-width: 768px) {
            .blog-list {
                grid-template-columns: 1fr;
            }
        }

        
    </style>
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
                    <div class="blog-item" onclick="window.location.href='article.php?article_id=<?= $row['id'] ?>'">
                        <div class="blog-image">
                            <img src="images/article_image/<?= htmlspecialchars($row['image_url'])?>" alt="Blog Image">
                        </div>
                        <div class="blog-content">
                            <h2 class="blog-title"><?= htmlspecialchars($row['title']) ?></h2>
                            <p class="blog-date"><i class="far fa-calendar-alt"></i> <?= htmlspecialchars($row['created_at']) ?></p>
                            <p class="blog-summary"><?= nl2br(htmlspecialchars(substr($row['content'], 0, 150))) ?>...</p>
                            <a href="article.php?article_id=<?= $row['id'] ?>" class="read-more">阅读全文</a>
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
        <script>
            // 添加点击事件处理
            document.addEventListener('DOMContentLoaded', function() {
                const blogItems = document.querySelectorAll('.blog-item');
                
                blogItems.forEach(item => {
                    // 为整个卡片添加点击事件
                    item.addEventListener('click', function(e) {
                        // 如果点击的是阅读全文按钮，则不阻止默认行为
                        if (e.target.classList.contains('read-more')) {
                            return;
                        }
                        const link = item.querySelector('.read-more');
                        if (link) {
                            window.location.href = link.href;
                        }
                    });
                });
            });
        </script>
    </div>
</body>

</html>