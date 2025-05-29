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
    <link rel="icon" href="images/sandI/logo-favicon-yellow.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700,300i%7CRoboto:400,300i">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/article.css">
    <style>
        .content_image {
            /* position: relative; */
        }
        .more-content {
            display: none;
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