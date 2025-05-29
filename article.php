<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include 'php/databases_link.php';
$article_id = $_GET['article_id'];

// 查找文章数据
$find_article = "SELECT * from articles where id = $article_id;";
$result = $conn->query($find_article);
$row = $result->fetch_assoc();

// 处理评论提交
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['comment'])) {
    $comment_text = $conn->real_escape_string($_POST['comment']);
    $insert_comment = "INSERT INTO comments (article_id, comment_text) VALUES ($article_id, '$comment_text')";
    $conn->query($insert_comment);
}

// 获取文章评论
$find_comments = "SELECT * from comments where article_id = $article_id ORDER BY created_at DESC";
$comments_result = $conn->query($find_comments);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $row['title']; ?></title>
    <link rel="stylesheet" href="css/article.css">
    <link rel="icon" href="images/sandI/logo-favicon-yellow.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700,300i%7CRoboto:400,300i">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        .content_image {
            /* position: relative; */
        }
        .more-content {
            display: none;
        }
        /* 文章容器样式 */
 
.inside_container {
    background-color: #fff;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    margin-bottom: 30px;
}

/* 文章标题样式 */
.title {
    font-size: 2.5em;
    color: #333;
    margin-bottom: 10px;
}

/* 文章创建时间样式 */
.created_at {
    font-size: 0.9em;
    color: #777;
    margin-bottom: 20px;
}

/* 文章内容样式 */
.article-content {
    font-size: 1.1em;
    line-height: 1.6;
    color: #555;
}

/* 查看更多按钮样式 */
button {
    background-color: #ffb83b;
    border: none;
    color: white;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    margin-top: 20px;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: #ffa500;
}

/* 评论区样式 */
.comment-section {
    background-color: #f9f9f9;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.comment-section h3 {
    font-size: 1.8em;
    color: #333;
    margin-bottom: 20px;
}

.comment-section form textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    margin-bottom: 20px;
    resize: vertical;
}

.comment-section form button {
    background-color: #ffb83b;
    border: none;
    color: white;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.comment-section form button:hover {
    background-color: #ffa500;
}

/* 评论样式 */
.comment {
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
}

.comment p {
    font-size: 1.1em;
    line-height: 1.6;
    color: #555;
    margin-bottom: 10px;
}

.comment small {
    font-size: 0.9em;
    color: #777;
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
        include 'moudle/header.php';
        ?>
        <div class="container">
            <br>
            <div class="inside_container">
                <h2 class="title"><?php echo $row['title']; ?></h2>
                <p class="created_at"><?php echo $row['created_at'] ?></p>
                <img class="content_image" src="images/article_image/<?php echo $row['image_url'] ?>" alt="">
                <br>
                <br>
                <?php
                $lines = explode("\n", $row['content']);
                $first_ten_lines = array_slice($lines, 0, 10);
                $remaining_lines = array_slice($lines, 10);
                echo '<p class="article-content">' . implode("\n", $first_ten_lines) . '</p>';
                if (!empty($remaining_lines)) {
                    echo '<p class="more-content article-content">' . implode("\n", $remaining_lines) . '</p>';
                    echo '<button onclick="showMore()">查看更多</button>';
                }
                ?>
            </div>

            <!-- 评论区 -->
            <div class="comment-section">
                <h3>评论区</h3>
                <form method="post" action="">
                    <textarea name="comment" placeholder="写下你的评论" required></textarea>
                    <button type="submit">提交评论</button>
                </form>
                <?php
                if ($comments_result->num_rows > 0) {
                    while ($comment = $comments_result->fetch_assoc()) {
                        echo '<div class="comment">';
                        echo '<p>' . $comment['comment_text'] . '</p>';
                        echo '<small>' . $comment['created_at'] . '</small>';
                        echo '</div>';
                    }
                } else {
                    echo '<p>暂无评论。</p>';
                }
                ?>
            </div>
        </div>
        <?php
        include 'moudle/footer.php';
        ?>
        <script>
            function showMore() {
                const moreContent = document.querySelector('.more-content');
                const button = event.target;
                moreContent.style.display = 'block';
                button.style.display = 'none';
            }
        </script>
        <script src="js/core.min.js"></script>
        <script src="js/script.js"></script>
    </div>
</body>

</html>